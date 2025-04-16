<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\ExportExcel\Inventory\ExportReportDOSummary;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportDODetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class DeliveryOrderController extends Controller
{

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
            $varAPIWebToken = Session::get('SessionLogin');
            $deliveryOrderData = $request->all();
            $deliveryOrderDetail = json_decode($deliveryOrderData['storeData']['deliveryOrderDetail'], true);
            $fileID = $deliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $deliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] : null;

            $transformedDetails = [];
            foreach ($deliveryOrderDetail as $entity) {
                $transformedDetails[] = [
                    "entities" => [
                        "referenceDocument_RefID"   => null,
                        "quantity"                  => (float) str_replace(',', '', $entity['quantity']),
                        "quantityUnit_RefID"        => (int) $entity['quantityUnit_RefID'],
                        "remarks"                   => $entity['remarks'],
                        "underlyingDetail_RefID"    => (int) $entity['underlyingDetail_RefID'],
                    ]
                ];
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.supplyChain.setDeliveryOrder',
                'latest',
                [
                    'entities' => [
                        "documentDateTimeTZ"                => $deliveryOrderData['storeData']['var_date'],
                        "log_FileUpload_Pointer_RefID"      => $fileID,
                        "requesterWorkerJobsPosition_RefID" => null,
                        "remarks"                           => $deliveryOrderData['storeData']['var_remark'],
                        "transporter_RefID"                 => (int) $deliveryOrderData['storeData']['transporter_id'],
                        "deliveryFrom_RefID"                => null,
                        "deliveryFromManualAddress"         => $deliveryOrderData['storeData']['delivery_from'],
                        "deliveryTo_RefID"                  => null,
                        "deliveryToManualAddress"           => $deliveryOrderData['storeData']['delivery_to'],
                        "additionalData"                    => [
                            "itemList"                      => [
                                "items"                     => $transformedDetails
                            ]
                        ]
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varData);
            }

            return $this->SubmitWorkflow(
                $varData['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
                $request->nextApprover,
                $varData['data']['businessDocument']['documentNumber']
            );
        } catch (\Throwable $th) {
            Log::error("Error at store: " . $th->getMessage());
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

            $DocumentType = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
                    "DocumentType"
                ),
                true
            );

            // dump($varData['data']);

            $compact = [
                // 'DocumentTypeID' => $DocumentTypeID,
                'varAPIWebToken' => $varAPIWebToken,
                'Data'           => $varData['data']
            ];

            // dump($compact['Data']);

            return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
        } catch (\Throwable $th) {
            Log::error("RevisionDeliveryOrderIndex Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
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




    //UPDATE


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
}
