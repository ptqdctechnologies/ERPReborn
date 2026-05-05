<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\ExportExcel\Inventory\ExportReportDeliveryOrderSummary;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportDOToMaterialReceive;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportDODetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\Inventory\DeliveryOrderService;
use App\Services\WorkflowService;

class DeliveryOrderController extends Controller
{
    protected $deliveryOrderService, $workflowService;

    public function __construct(DeliveryOrderService $deliveryOrderService, WorkflowService $workflowService)
    {
        $this->deliveryOrderService = $deliveryOrderService;
        $this->workflowService = $workflowService;
    }

    public function FormatText($text)
    {
        $result = strtolower($text);
        $result = str_replace("_", " ", $result);
        $result = ucwords($result);


        if ($text == "PERMANENT" || $text == "RENT") {
            $resultRefID = match ($text) {
                "RENT" => 0,
                default => 1,
            };
        } else {
            $resultRefID = match ($text) {
                "PURCHASE_ORDER" => 0,
                "INTERNAL_USE" => 1,
                default => 2,
            };
        }

        return [
            'id' => $resultRefID,
            'text' => $result
        ];
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsType('Delivery Order Form');

        return view('Inventory.DeliveryOrder.Transactions.CreateDeliveryOrder', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->deliveryOrderService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Delivery Order');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Create Delivery Order');
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Delivery Order Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function updates(Request $request)
    {
        try {
            $response = $this->deliveryOrderService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Revision Delivery Order');
            }

            // $responseWorkflow = $this->workflowService->resubmit(
            //     $response['data'][0]['businessDocument']['businessDocument_RefID'],
            //     $request->comment,
            //     $request->approverEntity,
            // );

            // if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
            //     throw new \Exception('Failed to fetch Submit Workflow Revision Delivery Order');
            // }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at update: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function RevisionDeliveryOrderIndex(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $documentTypeRefID = $this->GetBusinessDocumentsType('Delivery Order Revision Form');

            $response = $this->deliveryOrderService->getDetail($request->do_RefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $data = $response['data']['data'];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentTypeRefID' => $documentTypeRefID,
                'header' => [
                    'combinedBudget_RefID' => $data[0]['combinedBudget_RefID'] ?? '',
                    'combinedBudgetCode' => $data[0]['combinedBudgetCode'] ?? '',
                    'combinedBudgetName' => $data[0]['combinedBudgetName'] ?? '',
                    'combinedBudgetSectionCode' => $data[0]['combinedBudgetSectionCode'] ?? '',
                    'combinedBudgetSectionName' => $data[0]['combinedBudgetSectionName'] ?? '',
                    'doNumber' => $data[0]['documentNumber'] ?? '',
                    'doID' => $data[0]['deliveryOrder_RefID'] ?? '',
                    'doDetailID' => $data[0]['deliveryOrderDetail_ID'] ?? '',
                    'deliveryDate' => $data[0]['deliveryDateTimeTZ'] ?? '',
                    'deliveryFrom' => $data[0]['deliveryFrom_NonRefID']['Address'] ?? '',
                    'deliveryFromID' => $data[0]['deliveryFrom_RefID'] ?? '',
                    'deliveryTo' => $data[0]['deliveryTo_NonRefID']['Address'] ?? '',
                    'deliveryToID' => $data[0]['deliveryTo_RefID'] ?? '',
                    'transporterID' => $data[0]['transporter_RefID'] ?? '',
                    'transporterCode' => $data[0]['transporterCode'] ?? '',
                    'transporterName' => $data[0]['transporterName'] ?? '',
                    'transporterPhone' => $data[0]['transporterPhone'] ?? '',
                    'transporterFax' => $data[0]['transporterFax'] ?? '',
                    'transporterContact' => $data[0]['transporterContactPerson'] ?? '',
                    'transporterHandphone' => $data[0]['transporterHandphone'] ?? '',
                    'transporterAddress' => $data[0]['transporterAddress'] ?? '',
                    'fileID' => $data[0]['log_FileUpload_Pointer_RefID'] ?? null,
                    'type' => $data[0]['type'] ? $this->FormatText($data[0]['type']) : null,
                    'status' => $data[0]['stockMovementStatus'] ? $this->FormatText($data[0]['stockMovementStatus']) : null,
                    'requesterID' => $data[0]['stockMovementRequester_RefID'] ?? null,
                    'requesterName' => $data[0]['stockMovementRequesterName'] ?? null,
                    'requesterPosition' => $data[0]['stockMovementRequesterPosition'] ?? null,
                    'remarks' => $data[0]['remarks'] ?? '',
                ],
                'data' => $data
            ];

            return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
        } catch (\Throwable $th) {
            Log::error("RevisionDeliveryOrderIndex Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function StockDetail(Request $request)
    {
        try {
            $response = $this->deliveryOrderService->stockDetail($request->combinedBudget_RefID, $request->warehouse_RefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Stock Detail Delivery Order');
            }

            return response()->json($response['data']);
        } catch (\Throwable $th) {
            Log::error("Stock Detail Delivery Order Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        REPORTS                                                                           |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function ReportDOToMaterialReceive(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Delivery Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDOToMaterialReceive', $compact);
    }

    public function ReportDOToMaterialReceiveStore(Request $request)
    {
        try {
            $date = $request->poToDoDate;
            $budget = $request->budget_code;

            $response = $this->deliveryOrderService->getDeliveryOrderToMaterialReceive(
                $budget,
                $date,
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Report Delivery Order To Material Receive');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Delivery Order To Material Receive Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportDOToMaterialReceive(Request $request)
    {
        try {
            $dataPDF = Session::get("dotoMRReportSummaryDataPDF");
            $dataExcel = Session::get("dotoMRReportSummaryDataExcel");


            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataDOtoMR = Session::get("dotoMRReportSummaryDataPDF");
                    // dd($dataDO);

                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDOToMaterialReceive_pdf', ['dataDOtoMR' => $dataDOtoMR])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report DO to MR.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportDOToMaterialReceive, 'Export Report DO to MR.xlsx');
                }
            } else {
                return redirect()->route('DeliveryOrder.ReportDOToMaterialReceive')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDeliveryOrderSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Delivery Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDeliveryOrderSummary', $compact);
    }

    public function ReportDeliveryOrderSummaryStore(Request $request)
    {
        try {
            $date = $request->doDate;
            $warehouse = $request->warehouse_id;
            $budget = [
                "id" => $request->budget_id,
                "code" => $request->budget_code,
            ];
            $subBudget = [
                "id" => $request->site_id,
                "code" => $request->site_code,
            ];

            $response = $this->deliveryOrderService->getDeliveryOrderSummary(
                $budget['code'],
                $subBudget['code'],
                $warehouse,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Delivery Order Summary Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Delivery Order Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportDeliveryOrderSummary(Request $request)
    {
        try {
            $type = $request->printType;
            $budgetName = $request->budgetName;
            $subBudgetName = $request->subBudgetName;
            $warehouseName = $request->warehouseName;
            $doDate = $request->doDate;
            $dataDeliveryOrderSummary = json_decode($request->dataReport, true);

            if ($dataDeliveryOrderSummary) {
                if ($type == "PDF") {
                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDeliveryOrderSummary_pdf', [
                        'dataDO' => $dataDeliveryOrderSummary,
                        'budgetName' => $budgetName,
                        'subBudgetName' => $subBudgetName,
                        'warehouseName' => $warehouseName,
                        'doDate' => $doDate
                    ])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Delivery Order Summary.pdf');
                } else if ($type == "EXCEL") {
                    return Excel::download(new ExportReportDeliveryOrderSummary($dataDeliveryOrderSummary, $budgetName, $subBudgetName, $warehouseName, $doDate), 'Export Report Delivery Order Summary.xlsx');
                }
            } else {
                throw new \Exception('Delivery Order Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Delivery Order Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportDODetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportDODetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportDODetail', []) : [];

        $compact = [
            'varAPIWebToken' => [],
            'dataReport' => $dataReport
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDODetail', $compact);
    }

    public function ReportDODetailData($id)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.documentForm.finance.getAdvance',
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $id
                    ]
                ]
            );

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Data not found in the API response.');
            }

            $getData = $filteredArray['data'][0]['document'];

            // DATA HEADER
            $dataHeaders = [
                'doNumber' => 'DO01-53000004',
                'budget' => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                'budgetName' => $getData['content']['general']['budget']['combinedBudgetNameList'][0],
                'subBudget' => $getData['content']['general']['budget']['combinedBudgetSectionCodeList'][0],
                'date' => $getData['header']['date'],
                'transporter' => "VDR-2594 - Aman Jaya",
                'deliveryFrom' => "QDC",
                'deliveryTo' => 'Gudang Tigaraksa',
                'PIC' => $getData['content']['general']['involvedPersons'][0]['requesterWorkerName'],
            ];

            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += $dataReports['entities']['quantity'];

                $dataDetails[$i]['no'] = $i + 1;
                $dataDetails[$i]['dorNumber'] = "DOR1-23000004";
                $dataDetails[$i]['productId'] = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productName'] = $dataReports['entities']['productName'];
                $dataDetails[$i]['qty'] = number_format($dataReports['entities']['quantity'], 2, ',', '.');
                $dataDetails[$i]['uom'] = 'Set';
                $dataDetails[$i]['remark'] = $dataReports['entities']['quantityUnitName'];
                $i++;
            }

            $compact = [
                'dataHeader' => $dataHeaders,
                'dataDetail' => $dataDetails,
                'totalQty' => number_format($totalQty, 2, ',', '.'),
            ];

            Session::put("isButtonReportDODetailSubmit", true);
            Session::put("dataReportDODetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportDODetailData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDODetailStore(Request $request)
    {
        try {
            $advanceRefID = $request->advance_RefID;
            $advanceNumber = $request->advance_number;

            if (!$advanceRefID && !$advanceNumber) {
                Session::forget("isButtonReportDODetailSubmit");
                Session::forget("dataReportDODetail");

                return redirect()->route('Inventory.ReportDODetail')->with('NotFound', 'DO Number Cannot Empty');
            }

            $compact = $this->ReportDODetailData($advanceRefID);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Inventory.ReportDODetail');
        } catch (\Throwable $th) {
            Log::error("Error at ReportDODetailStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportDODetail(Request $request)
    {
        try {
            $dataReport = Session::get("dataReportDODetail");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDODetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Delivery Order Detail.pdf');
                } else {
                    return Excel::download(new ExportReportDODetail, 'Export Report Delivery Order Detail.xlsx');
                }
            } else {
                return redirect()->route('Inventory.ReportDODetail')->with('NotFound', 'DO Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportDODetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
