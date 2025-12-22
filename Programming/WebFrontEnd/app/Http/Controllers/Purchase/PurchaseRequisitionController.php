<?php

namespace App\Http\Controllers\Purchase;

use DateTime;
use App\Http\Controllers\ExportExcel\PurchaseRequisition\ExportReportPurchaseRequisitionSummary;
use App\Http\Controllers\ExportExcel\PurchaseRequisition\ExportReportPRtoPO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\Purchase\PurchaseRequisitionService;
use App\Services\WorkflowService;
use Carbon\Carbon;

class PurchaseRequisitionController extends Controller
{
    protected $purchaseRequisitionService, $workflowService;

    public function __construct(PurchaseRequisitionService $purchaseRequisitionService, WorkflowService $workflowService)
    {
        $this->purchaseRequisitionService = $purchaseRequisitionService;
        $this->workflowService = $workflowService;
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Purchase Requisition Form');

        return view('Purchase.PurchaseRequisition.Transactions.CreatePurchaseRequisition', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->purchaseRequisitionService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Purchase Request');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Create Purchase Request');
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Purchase Requesition Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function RevisionPurchaseRequest(Request $request)
    {
        try {
            $varAPIWebToken     = $request->session()->get('SessionLogin');
            $purchaseRequestID  = $request->modal_purchase_requisition_id;
            $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Purchase Requisition Revision Form');

            $response           = $this->purchaseRequisitionService->getDetail($purchaseRequestID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Purchase Request');
            }

            $data = $response['data']['data'];

            $convertDate = new DateTime($data[0]['deliveryDateTimeTZ']);

            $compact = [
                'varAPIWebToken'        => $varAPIWebToken,
                'documentTypeRefID'     => $documentTypeRefID,
                'header'                => [
                    'purchaseRequestID' => $data[0]['purchaseRequisition_RefID'] ?? '-',
                    'budgetID'          => $data[0]['combinedBudget_RefID'] ?? '-',
                    'budgetName'        => $data[0]['combinedBudgetName'] ?? '-',
                    'budgetCode'        => $data[0]['combinedBudgetCode'] ?? '-',
                    'subBudgetID'       => $data[0]['combinedBudgetSection_RefID'] ?? '-',
                    'subBudgetName'     => $data[0]['combinedBudgetSectionName'] ?? '-',
                    'subBudgetCode'     => $data[0]['combinedBudgetSectionCode'] ?? '-',
                    'deliverToID'       => $data[0]['deliveryTo_RefID'] ?? '-',
                    'deliverToCode'     => $data[0]['deliveryToCode'] ?? '-',
                    'deliverToName'     => $data[0]['deliveryToName'] ?? '-',
                    'dateOfDelivery'    => $convertDate->format('Y-m-d') ?? '', 
                    'remarks'           => nl2br(e($data[0]['remarks'])) ?? '-',
                    'fileId'            => $data[0]['log_FileUpload_Pointer_RefID'] ?? null,
                ],
                'detail'                => $data
            ];

            return view('Purchase.PurchaseRequisition.Transactions.RevisionPurchaseRequisition', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Purchase Request Error: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function UpdatePurchaseRequest(Request $request)
    {
        try {
            $response = $this->purchaseRequisitionService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Purchase Request');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Revision Purchase Request');
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Purchase Requesition Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function PurchaseRequisitionListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataPurchaseRequisition = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => null,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        $compact = [
            'data' => $varDataPurchaseRequisition['data'],
        ];
            
        return response()->json($compact);
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        REPORTS                                                                           |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function ReportPurchaseRequisitionSummary(Request $request)
    {
        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionSummary');
    }

    public function ReportPurchaseRequisitionSummaryStore(Request $request)
    {
        try {
            $date           = $request->prDate;
            $budget         = [
                "id"        => $request->budget_id,
                "code"      => $request->budget_code,
            ];
            $subBudget      = [
                "id"        => $request->site_id,
                "code"      => $request->site_code,
            ];

            $response = $this->purchaseRequisitionService->getPurchaseRequisitionSummary(
                $budget['code'], 
                $subBudget['code'],
                $date 
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Advance Summary Report');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Purchase Requisition Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportPurchaseRequisitionSummary(Request $request)
    {
        try {
            $type                       = $request->printType;
            $budgetName                 = $request->budgetName;
            $subBudgetName              = $request->subBudgetName;
            $prDate                     = $request->prDate;
            $dataPurchaseRequestSummary = json_decode($request->dataReport, true);

            if ($dataPurchaseRequestSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequestSummary_pdf', [
                        'dataPR'        => $dataPurchaseRequestSummary, 
                        'budgetName'    => $budgetName,
                        'subBudgetName' => $subBudgetName,
                        'prDate'        => $prDate
                        ])->setPaper('a4', 'landscape');
                    
                    $pdf->output();
                    $dom_pdf    = $pdf->getDomPDF();
                    $canvas     = $dom_pdf ->get_canvas();
                    $width      = $canvas->get_width();
                    $height     = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Purchase Request Summary.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportPurchaseRequisitionSummary($dataPurchaseRequestSummary), 'Export Report Purchase Request Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Purchase Request Summary Report');
                }
            } else {
                throw new \Exception('Purchase Request Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Purchase Request Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportPRtoPO(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisitionNumber");
        $dataPRtoPO = Session::get("ReportPRtoPODataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataPRtoPO' => $dataPRtoPO
        
        ];
        // dump($compact);

        return view('Purchase.PurchaseRequisition.Reports.ReportPRtoPO', $compact);
    }

    public function ReportPRtoPOData( $project_code, $site_code)
    {
        try {
            Log::error("Error at ",[$project_code, $site_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.supplyChain.getPurchaseRequisitionToPurchaseOrderSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' =>  $project_code,
                        'CombinedBudgetSectionCode' =>  $site_code,
                        'Supplier_RefID' => NULL
                        // 'PurchaseRequisition_RefID' => (int) $PurchaseRequisition_refID
                    ],
                     'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                        ]
                ]
            );
            
            Log::error("Error at " ,$filteredArray);
            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');

            }
            Session::put("ReportPRtoPODataPDF", $filteredArray['data']['data']);
            Session::put("dataReportPRtoPO", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPRtoPOStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "" && $site_code == "") {
                Session::forget("ReportPRtoPODataPDF");
                Session::forget("dataReportPRtoPO");
                
                return redirect()->route('PurchaseRequisition.ReportPRtoPO')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportPRtoPOData($project_code, $site_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PPurchaseRequisitionSummaryReportDataPDF");
            //     Session::forget("PPurchaseRequisitionSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('PurchaseRequisition.ReportPRtoPO');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportPRtoPO(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);
        try {
            $dataPDF = Session::get("ReportPRtoPODataPDF");
            $dataExcel = Session::get("dataReportPRtoPO");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataPRtoPO = Session::get("ReportPRtoPODataPDF");
                    // dd($dataPRtoPO);

                    $pdf = PDF::loadView('Purchase.PurchaseRequisition.Reports.ReportPRtoPO_pdf', ['dataPRtoPO' => $dataPRtoPO])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report PR to PO .pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportPRtoPO, 'Export Report PR to PO .xlsx');
                }
            } else {
                return redirect()->route('PurchaseRequisition.ReportPRtoPO')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    
    public function ReportPurchaseRequisitionDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseOrderPrNumber");
        $request->session()->forget("SessionPurchaseOrder");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => []
        ];

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionDetail', $compact);
    }
}