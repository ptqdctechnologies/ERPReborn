<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\ExportExcel\Inventory\ExportReportDOSummary;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportDODetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use App\Services\Inventory\DeliveryOrderService;
use App\Services\WorkflowService;

class DeliveryOrderController extends Controller
{
    protected $deliveryOrderService, $workflowService;
    public function __construct(DeliveryOrderService $deliveryOrderService, WorkflowService $workflowService)
    {
        $this->deliveryOrderService = $deliveryOrderService;
        $this->workflowService      = $workflowService;
    }

    public function index(Request $request)
    {

        Session::forget("SessionDeliveryOrderSupplier");
        Session::forget("SessionDeliveryOrderSupplierID");
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'statusRevisi' => 0,
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Inventory.DeliveryOrder.Transactions.CreateDeliveryOrder', $compact);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->deliveryOrderService->create($request);

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

    public function updates(Request $request)
    {
        try {
            $varAPIWebToken                     = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
            $revisionDeliveryOrderData          = $request->all();
            Log::error("revisionDeliveryOrderData: ", [$revisionDeliveryOrderData]);
            $deliveryOrderDetail                = json_decode($revisionDeliveryOrderData['storeData']['deliveryOrderDetail'], true);
            $fileID                             = $revisionDeliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $revisionDeliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] : null;

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.update.supplyChain.setDeliveryOrder',
                'latest',
                [
                'recordID' => (int) $revisionDeliveryOrderData['storeData']['do_id'],
                'entities' => [
                    "documentDateTimeTZ"                => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID"      => $fileID,
                    "requesterWorkerJobsPosition_RefID" => (int) $SessionWorkerCareerInternal_RefID,
                    "transporter_RefID"                 => (int) $revisionDeliveryOrderData['storeData']['transporter_id'],
                    "deliveryDateTimeTZ"                => null,
                    "deliveryFrom_RefID"                => null,
                    "deliveryFrom_NonRefID"             => $revisionDeliveryOrderData['storeData']['delivery_from'],
                    "deliveryTo_RefID"                  => null,
                    "deliveryTo_NonRefID"               => $revisionDeliveryOrderData['storeData']['delivery_to'],
                    "remarks"                           => $revisionDeliveryOrderData['storeData']['var_remark'],
                    "additionalData"    => [
                        "itemList"      => [
                            "items"     => $deliveryOrderDetail
                            ]
                        ]
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varData);
            }

            Log::error("varData: ", [$varData]);

            return $this->ResubmitWorkflow(
                $varData['data'][0]['businessDocument']['businessDocument_RefID'],
                $revisionDeliveryOrderData['comment'],
                $revisionDeliveryOrderData['approverEntity'],
                $revisionDeliveryOrderData['nextApprover'],
                $varData['data'][0]['businessDocument']['documentNumber']
            );
        } catch (\Throwable $th) {
            Log::error("Error at update: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDOSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportDOSummarySubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportDOSummary', []) : [];

        $compact = [
            'varAPIWebToken' => [],
            'dataReport' => $dataReport
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDOSummary', $compact);
    }

    public function ReportDOSummaryData($projectId, $siteId, $projectCode, $projectName)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.documentForm.finance.getReportAdvanceSummary',
                'latest',
                [
                    'parameter' => [
                        'dataFilter' => [
                            'budgetID' => 1,
                            'subBudgetID' => 1,
                            'workID' => 1,
                            'productID' => 1,
                            'beneficiaryID' => 1,
                        ]
                    ]
                ],
                false
            );

            $DataReportAdvanceSummary = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "ReportAdvanceSummary"
                ),
                true
            );

            $collection = collect($DataReportAdvanceSummary);

            if ($projectId != "") {
                $collection = $collection->where('CombinedBudget_RefID', $projectId);
            }
            if ($siteId != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $siteId);
            }

            $collection = $collection->all();

            $dataHeaders = [
                'budget'        => $projectCode . " - " . $projectName
            ];

            $dataDetails = [];
            $i = 0;
            $total = 0;
            foreach ($collection as $collections) {
                $total              += $collections['TotalAdvance'];

                $dataDetails[$i]['no']                  = $i + 1;
                $dataDetails[$i]['DONumber']            = "DO01-23000004";
                $dataDetails[$i]['budgetCode']          = $collections['CombinedBudgetCode'];
                $dataDetails[$i]['date']                = date('d-m-Y', strtotime($collections['DocumentDateTimeTZ']));
                $dataDetails[$i]['total']               = number_format($collections['TotalAdvance'], 2);
                $i++;
            }

            $compact = [
                'dataHeader'            => $dataHeaders,
                'dataDetail'            => $dataDetails,
                'total'                 => number_format($total, 2),
            ];

            Session::put("isButtonReportDOSummarySubmit", true);
            Session::put("dataReportDOSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportDOSummaryData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDOSummaryStore(Request $request) 
    {
        try {
            $budget         = $request->budget;
            $budgetID       = $request->budget_id;
            $budgetName     = $request->budget_name;
            $subBudgetID    = $request->sub_budget_id;

            if (!$budgetID && !$subBudgetID) {
                $message = 'Budget & Sub Budget Cannot Empty';
            } else if ($budgetID && !$subBudgetID) {
                $message = 'Sub Budget Cannot Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportDOSummarySubmit");
                Session::forget("dataReportDOSummary");

                return redirect()->route('Inventory.ReportDOSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportDOSummaryData($budgetID, $subBudgetID, $budget, $budgetName);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Inventory.ReportDOSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportDOSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportDOSummary(Request $request) {
        try {
            $dataReport = Session::get("dataReportDOSummary");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDOSummary_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
                    return $pdf->download('Export Report Delivery Order Summary.pdf');
                } else {
                    return Excel::download(new ExportReportDOSummary, 'Export Report Delivery Order Summary.xlsx');
                }
            } else {
                return redirect()->route('Inventory.ReportDOSummary')->with('NotFound', 'Budget & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportDOSummary: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDODetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportDODetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportDODetail', []) : [];

        $compact = [
            'varAPIWebToken'    => [],
            'dataReport'        => $dataReport
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
                'doNumber'      => 'DO01-53000004',
                'budget'        => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                'budgetName'    => $getData['content']['general']['budget']['combinedBudgetNameList'][0],
                'subBudget'     => $getData['content']['general']['budget']['combinedBudgetSectionCodeList'][0],
                'date'          => $getData['header']['date'],
                'transporter'   => "VDR-2594 - Aman Jaya",
                'deliveryFrom'  => "QDC",
                'deliveryTo'    => 'Gudang Tigaraksa',
                'PIC'           => $getData['content']['general']['involvedPersons'][0]['requesterWorkerName'],
            ];

            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += $dataReports['entities']['quantity'];
            
                $dataDetails[$i]['no']          = $i + 1;
                $dataDetails[$i]['dorNumber']   = "DOR1-23000004";
                $dataDetails[$i]['productId']   = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productName'] = $dataReports['entities']['productName'];
                $dataDetails[$i]['qty']         = number_format($dataReports['entities']['quantity'], 2, ',', '.');
                $dataDetails[$i]['uom']         = 'Set';
                $dataDetails[$i]['remark']      = $dataReports['entities']['quantityUnitName'];
                $i++;
            }

            $compact = [
                'dataHeader'    => $dataHeaders,
                'dataDetail'    => $dataDetails,
                'totalQty'      => number_format($totalQty, 2, ',', '.'),
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
            $advanceRefID   = $request->advance_RefID;
            $advanceNumber  = $request->advance_number;

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

    public function PrintExportReportDODetail(Request $request) {
        try {
            $dataReport = Session::get("dataReportDODetail");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDODetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
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

    public function DeliveryOrderListData(Request $request)
    {
        try {

            if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvance',
                    'latest',
                    [
                        'parameter' => null,
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ],
                    false
                );
            }

            $DataListAdvance = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "DataListAdvance"
                ),
                true
            );


            $collection = collect($DataListAdvance);

            $project_id = $request->project_id;
            $site_id = $request->site_id;

            if ($project_id != "") {
                $collection = $collection->where('CombinedBudget_RefID', $project_id);
            }
            if ($site_id != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $site_id);
            }

            $collection = $collection->all();

            return response()->json($collection);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function DeliveryOrderListDataDor(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceSettlement = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvance',
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

        return response()->json($varDataAdvanceSettlement['data']);
    }

    public function DeliveryOrderByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvance',
            'latest',
            [
                'parameter' => null,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => '"CombinedBudget_RefID" = ' . $projectcode . '',
                    'paging' => null
                ]
            ]
        );

        $compact = [
            'DataAdvanceRequest' => $varDataAdvanceRequest['data'],
        ];
        return response()->json($compact);
    }

    public function DeliveryOrderByDorID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 500;
        $varDataDorList['data'] = [];
        $sys_id = $request->input('sys_id');

        $data = $request->session()->get("SessionDeliveryOrderID");

        if ($request->session()->has("SessionDeliveryOrderID")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $sys_id) {
                    $tamp = 1;
                }
            }
        }

        if ($tamp == 0) {

            $varDataDorList = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetail',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $sys_id,
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ]
            );
            $request->session()->push("SessionDeliveryOrderID", $sys_id);
            $status = 200;
        }

        $compact = [
            'DataDorList' => $varDataDorList['data'],
            'sys_id' => $sys_id,
            'status' => $status,
        ];
        return response()->json($compact);
    }

    public function RevisionDeliveryOrderIndex(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $do_RefID       = $request->do_RefID;

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
                'latest',
                [
                    'parameter' => [
                        'deliveryOrder_RefID' => (int) $do_RefID
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varData);
            }

            $data = $varData['data']['data'];

            $compact = [
                'varAPIWebToken'            => $varAPIWebToken,
                'header'                    => [
                    'combinedBudget_RefID'  => $data[0]['combinedBudget_RefID'] ?? '46000000000033',
                    'doNumber'              => $data[0]['documentNumber'] ?? '',
                    'doID'                  => $data[0]['deliveryOrder_RefID'] ?? '',
                    'doDetailID'            => $data[0]['deliveryOrderDetail_ID'] ?? '',
                    'deliveryFrom'          => $data[0]['deliveryFrom_NonRefID']['Address'] ?? '',
                    'deliveryFromID'        => $data[0]['deliveryFrom_RefID'] ?? '',
                    'deliveryTo'            => $data[0]['deliveryTo_NonRefID']['Address'] ?? '',
                    'deliveryToID'          => $data[0]['deliveryTo_RefID'] ?? '',
                    'transporterID'         => $data[0]['transporter_RefID'] ?? '',
                    'transporterCode'       => '',
                    'transporterName'       => $data[0]['transporterName'] ?? '',
                    'transporterPhone'      => $data[0]['transporterPhone'] ?? '',
                    'transporterFax'        => $data[0]['transporterFax'] ?? '',
                    'transporterContact'    => $data[0]['transporterContactPerson'] ?? '',
                    'transporterHandphone'  => $data[0]['transporterHandphone'] ?? '',
                    'transporterAddress'    => $data[0]['transporterAddress'] ?? '',
                    'fileID'                => $data[0]['log_FileUpload_Pointer_RefID'] ?? null,
                    'remarks'               => $data[0]['remarks'] ?? '',
                ],
                'data'                      => $data
            ];

            // dump($data);

            return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
        } catch (\Throwable $th) {
            Log::error("RevisionDeliveryOrderIndex Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function DeliveryOrderListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $var_recordID,
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

    public function StoreValidateDeliveryOrderSupplier(Request $request)
    {
        $tamp = 0;
        $tamp2 = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $supplier_id = $request->input('supplier_id');
        $supplier = $request->input('supplier');
        $delivery_order_request_id = $request->input('delivery_order_request_id');

        $data = Session::get("SessionDeliveryOrderSupplier");
        $dataID = Session::get("SessionDeliveryOrderSupplierID");

        if (Session::has("SessionDeliveryOrderSupplier")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $delivery_order_request_id) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                for ($i = 0; $i < count($dataID); $i++) {
                    if ($dataID[$i] != $supplier_id) {
                        $status = 500;
                        $tamp2 = 1;
                        break;
                    }
                }

                if ($tamp2 == 0) {

                    $varDataAdvanceList = $this->DeliveryOrderComplexBySupplierID($delivery_order_request_id);

                    Session::push("SessionDeliveryOrderSupplier", $delivery_order_request_id);
                    Session::push("SessionDeliveryOrderSupplierID", $supplier_id);
                }
            } else {
                $status = 501;
            }
        } else {

            $varDataAdvanceList = $this->DeliveryOrderComplexBySupplierID($delivery_order_request_id);

            Session::push("SessionDeliveryOrderSupplier", $delivery_order_request_id);
            Session::push("SessionDeliveryOrderSupplierID", $supplier_id);
        }
        $compact = [
            'status' => $status,
            'supplier_id' => $supplier_id,
            'supplier' => $supplier,
            'data' => $varDataAdvanceList,
        ];

        return response()->json($compact);
    }

    public function DeliveryOrderComplexBySupplierID($advance_RefID)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => 1,
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $DataAdvanceDetailComplex = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DataListAdvanceDetailComplex"
            ),
            true
        );

        $collection = collect($DataAdvanceDetailComplex);
        $collection = $collection->where('Sys_ID_Advance', $advance_RefID);


        $filteredArray = [];
        $num = 0;
        foreach ($collection->all() as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        return $filteredArray;
    }

    public function SearchDeliveryOrderRequest(Request $request)
    {
        Session::forget("SessionDeliveryOrderSupplier");
        Session::forget("SessionDeliveryOrderSupplierID");

        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvance',
                'latest',
                [
                    'parameter' => null,
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $DataListAdvance = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $collection = collect($DataListAdvance);

        $budget_code = $request->input('budget_code');
        $sub_budget_code = $request->input('sub_budget_code');
        $supplier = $request->input('supplier');
        $trano = $request->input('trano');

        if ($budget_code != "") {
            $collection = $collection->filter(function ($item) use ($budget_code) {
                return strpos($item['CombinedBudgetCode'], $budget_code) !== false;
            });
        }
        if ($sub_budget_code != "") {
            $collection = $collection->filter(function ($item) use ($sub_budget_code) {
                return strpos($item['CombinedBudgetSectionCode'], $sub_budget_code) !== false;
            });
        }
        if ($supplier != "") {
            $collection = $collection->filter(function ($item) use ($supplier) {
                return strpos($item['RequesterWorkerName'], $supplier) !== false;
            });
        }
        if ($trano != "") {
            $collection = $collection->filter(function ($item) use ($trano) {
                return strpos($item['DocumentNumber'], $trano) !== false;
            });
        }

        return response()->json($collection->all());
    }

    public function ReportDOToMaterialReceive(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportDOToMaterialReceiveSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportDOToMaterialReceive', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];
    
            return view('Inventory.DeliveryOrder.Reports.ReportDOToMaterialReceive', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportDOToMaterialReceive Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDOToMaterialReceiveData($project_id, $site_id, $project_name, $project_code, $site_code)
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $getReportPOtoDO    = null;

            // if (!Helper_Redis::getValue($varAPIWebToken, "ReportAdvanceSummary")) {
            //     $getReportAdvanceSummary = Helper_APICall::setCallAPIGateway(
            //         Helper_Environment::getUserSessionID_System(),
            //         $varAPIWebToken,
            //         'report.form.documentForm.finance.getReportAdvanceSummary',
            //         'latest',
            //         [
            //             'parameter' => [
            //                 'dataFilter' => [
            //                     'budgetID' => 1,
            //                     'subBudgetID' => 1,
            //                     'workID' => 1,
            //                     'productID' => 1,
            //                     'beneficiaryID' => 1,
            //                 ]
            //             ]
            //         ],
            //         false
            //     );
            // } else {
            //     $getReportAdvanceSummary = Helper_Redis::getValue($varAPIWebToken, "ReportAdvanceSummary");
            // }

            // DUMMY DATA
            $getReportPOtoDO = [
                [
                    
                    "DocumentNumber"                      => "MR/QDC/2025/000015",
                    "DocumentDateTimeTZ"                  => "2024-12-05 00:00:00+07",
                    "TotalAdvance"                        => "2024-12-09 00:00:00+07",
                    "TotalExpenseClaimCart"               => "100.00",
                    "TotalAmountDueToCompanyCart"         => "DO/QDC/2025/000124",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "Batu Split 2/3",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam",
                    "DepartingFromMR"                     => "Jakarta",
                    "DestinationToMR"                     => "Batam",
                    "Description"                         => "111003-0000"
                ],
                [
                    
                    "DocumentNumber"                      => "MR/QDC/2025/000016",
                    "DocumentDateTimeTZ"                  => "2024-12-06 00:00:00+07",
                    "TotalAdvance"                        => "2024-12-10 00:00:00+07",
                    "TotalExpenseClaimCart"               => "110.00",
                    "TotalAmountDueToCompanyCart"         => "DO/QDC/2025/000125",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "Cable NYY",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Bekasi",
                    "DepartingFromMR"                     => "Jakarta",
                    "DestinationToMR"                     => "Bekasi",
                    "Description"                         => "111003-0001"
                ],
                [
                    
                    "DocumentNumber"                      => "MR/QDC/2025/000017",
                    "DocumentDateTimeTZ"                  => "2024-12-07 00:00:00+07",
                    "TotalAdvance"                        => "2024-12-11 00:00:00+07",
                    "TotalExpenseClaimCart"               => "120.00",
                    "TotalAmountDueToCompanyCart"         => "DO/QDC/2025/000126",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "Kabel grounding BCC 50mm",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Medan",
                    "DepartingFromMR"                     => "Jakarta",
                    "DestinationToMR"                     => "Medan",
                    "Description"                         => "111003-0002"
                ],
                [
                    
                    "DocumentNumber"                      => "MR/QDC/2025/000018",
                    "DocumentDateTimeTZ"                  => "2024-12-08 00:00:00+07",
                    "TotalAdvance"                        => "2024-12-12 00:00:00+07",
                    "TotalExpenseClaimCart"               => "130.00",
                    "TotalAmountDueToCompanyCart"         => "DO/QDC/2025/000127",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "Bus Bar 300 x 100 x 10 + Isolator Keramik 40 x 50 ( 2ea )",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Bekasi",
                    "DestinationTo"                       => "Jakarta",
                    "DepartingFromMR"                     => "Bekasi",
                    "DestinationToMR"                     => "Jakarta",
                    "Description"                         => "111003-0003"
                ],
                [
                    
                    "DocumentNumber"                      => "MR/QDC/2025/000019",
                    "DocumentDateTimeTZ"                  => "2024-12-09 00:00:00+07",
                    "TotalAdvance"                        => "2024-12-13 00:00:00+07",
                    "TotalExpenseClaimCart"               => "140.00",
                    "TotalAmountDueToCompanyCart"         => "DO/QDC/2025/000128",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "Flexible 20 mm",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Bekasi",
                    "DestinationTo"                       => "Jakarta",
                    "DepartingFromMR"                     => "Bekasi",
                    "DestinationToMR"                     => "Jakarta",
                    "Description"                         => "111003-0004"
                ],
            ];

            $reportData = is_string($getReportPOtoDO) ? json_decode($getReportPOtoDO, true) : $getReportPOtoDO;

            // $filteredData = array_filter($reportData, function ($item) use ($project_id, $site_id, $requester_id, $beneficiary_id) {
            //     return 
            //         (empty($project_id)     || $item['CombinedBudget_RefID'] == $project_id) &&
            //         (empty($site_id)        || $item['CombinedBudgetSection_RefID'] == $site_id) &&
            //         (empty($requester_id)   || $item['RequesterWorkerJobsPosition_RefID'] == $requester_id) &&
            //         (empty($beneficiary_id) || $item['BeneficiaryWorkerJobsPosition_RefID'] == $beneficiary_id);
            // });

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            // $totalAdvance = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalAdvance'] ?? 0);
            // }, 0);

            // $totalExpense = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalExpenseClaimCart'] ?? 0);
            // }, 0);

            // $totalAmount = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalAmountDueToCompanyCart'] ?? 0);
            // }, 0);

            $compact = [
                // 'dataDetail'        => $filteredData,
                'dataDetail'        => $reportData,
                'budgetCode'        => $project_code,
                'budgetName'        => $project_name,
                'siteCode'          => $site_code,
                'requesterName'     => "",
                'beneficiaryName'   => "",
                'total'             => 0,
                'totalExpense'      => 0,
                'totalAmount'       => 0,
            ];

            Session::put("isButtonReportDOToMaterialReceiveSubmit", true);
            Session::put("dataReportDOToMaterialReceive", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportDOToMaterialReceiveData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDOToMaterialReceiveStore(Request $request)
    {
        try {
            $project_code       = $request->project_code_second;
            $project_name       = $request->project_name_second;
            $project_id         = $request->project_id_second;

            $site_id            = $request->site_id_second;
            $site_code          = $request->site_code_second;

            // $requester_id       = $request->worker_id_second;
            // $requester_name     = $request->worker_name_second;

            // $beneficiary_id     = $request->beneficiary_second_id;
            // $beneficiary_name   = $request->beneficiary_second_person_name;

            // dd($project_code, $project_name);

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            // if (!$requester_id) {
            //     $errors[] = 'Requester';
            // }
            // if (!$beneficiary_id) {
            //     $errors[] = 'Beneficiary';
            // }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportDOToMaterialReceiveSubmit");
                Session::forget("dataReportDOToMaterialReceive");

                return redirect()->route('Inventory.ReportDOToMaterialReceive')->with('NotFound', $message);
            }

            $compact = $this->ReportDOToMaterialReceiveData($project_id, $site_id, $project_name, $project_code, $site_code);
            // dd($compact);
            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('Inventory.ReportDOToMaterialReceive');
        } catch (\Throwable $th) {
            Log::error("ReportDOToMaterialReceiveStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportDOToMaterialReceive(Request $request) {
        
    }
}
