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

class PurchaseRequisitionController extends Controller
{
    protected $purchaseRequisitionService, $workflowService;

    public function __construct(PurchaseRequisitionService $purchaseRequisitionService, WorkflowService $workflowService)
    {
        $this->purchaseRequisitionService = $purchaseRequisitionService;
        $this->workflowService = $workflowService;
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
        return view('Purchase.PurchaseRequisition.Transactions.CreatePurchaseRequisition', $compact);
    }
    public function ReportPurchaseRequisitionSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisitionNumber");
        $dataPO = Session::get("PurchaseRequisitionReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataPO' => $dataPO
        
        ];
        // dump($compact);

        return view('Purchase.PurchaseRequisition.Reports.ReportPurchaseRequisitionSummary', $compact);
    }

    public function ReportPurchaseRequisitionSummaryData( $project_code, $site_code){
        
            
        try {
            Log::error("Error at ",[$project_code, $site_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.supplyChain.getPurchaseRequisitionSummary', 
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
            Session::put("PurchaseRequisitionReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("PurchaseRequisitionReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportPurchaseRequisitionSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            $site_code = $request->site_code_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "" && $site_code == "") {
                Session::forget("PurchaseRequisitionReportSummaryDataPDF");
                Session::forget("PurchaseRequisitionReportSummaryDataExcel");
                
                return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportPurchaseRequisitionSummaryData($project_code, $site_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PPurchaseRequisitionSummaryReportDataPDF");
            //     Session::forget("PPurchaseRequisitionSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    public function PrintExportReportPurchaseRequisitionSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("PurchaseRequisitionReportSummaryDataPDF");
            $dataExcel = Session::get("PurchaseRequisitionReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataPO = Session::get("PurchaseRequisitionReportSummaryDataPDF");
                    // dd($dataPO);

                    $pdf = PDF::loadView('Purchase.PurchaseRequisition.Reports.PrintReportPurchaseRequisitionSummary', ['dataPO' => $dataPO])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Purchase Requisition Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportPurchaseRequisitionSummary, 'Export Report Purchase Requisition Summary.xlsx');
                }
            } else {
                return redirect()->route('PurchaseRequisition.ReportPurchaseRequisitionSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
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

    public function ReportPRtoPOData( $project_code, $site_code){
        
            
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
            Session::put("PurchaseRequisitionReportSummaryDataExcel", $filteredArray['data']['data']);
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
                Session::forget("PurchaseRequisitionReportSummaryDataExcel");
                
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
        try {
            $dataPDF = Session::get("ReportPRtoPODataPDF");
            $dataExcel = Session::get("PurchaseRequisitionReportSummaryDataExcel");

            
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

    public function store(Request $request)
    {
        try {
            $response = $this->purchaseRequisitionService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseWorkflow);
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at store: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
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

    public function RevisionPurchaseRequest(Request $request)
    {
        $request->session()->forget("SessionPurchaseRequisition");

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $response       = $this->purchaseRequisitionService->getDetail($request->modal_purchase_requisition_id);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json($response);
        }

        $data = $response['data']['data'];

        // dump($data);

        $convertDate = new DateTime($data[0]['deliveryDateTimeTZ']);

        $compact = [
            'varAPIWebToken'        => $varAPIWebToken,
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

        // dump($compact);

        return view('Purchase.PurchaseRequisition.Transactions.RevisionPurchaseRequisition', $compact);
    }

    public function UpdatePurchaseRequest(Request $request)
    {
        try {
            $response = $this->purchaseRequisitionService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseWorkflow);
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $ProcReqDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $ProcReqDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => $input['var_remark'][$n],
                    ]
                ];
            }
        }

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.supplyChain.setPurchaseRequisition',
            'latest',
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => $input['var_date'],
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "remarks" => 'My Remarks',
                    "additionalData" => [
                        "itemList" => [
                            "items" => $ProcReqDetail
                        ]
                    ]
                ]
            ]
        );


        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function ProcReqListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $ProcReqRefID = $request->input('ProcReqRefID');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $ProcReqRefID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return response()->json($varData['data']);
    }
}