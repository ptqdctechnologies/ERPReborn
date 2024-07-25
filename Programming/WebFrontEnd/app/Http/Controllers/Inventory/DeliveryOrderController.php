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

class DeliveryOrderController extends Controller
{

    public function index(Request $request)
    {

        Session::forget("SessionDeliveryOrderSupplier");
        Session::forget("SessionDeliveryOrderSupplierID");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'statusRevisi' => 0,
        ];

        return view('Inventory.DeliveryOrder.Transactions.CreateDeliveryOrder', $compact);
    }

    public function ReportDOSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportDOSummarySubmit');

        $dataDetail = $isSubmitButton ? $request->session()->get('dataDetailReportDOSummary', []) : [];

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'dataDetail' => $dataDetail
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDOSummary', $compact);
    }

    public function ReportDOSummaryData($id) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $id,
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

            if (!isset($filteredArray['data'][0]['document']['header'])) {
                throw new \Exception('Data not found in the API response.');
            }

            $getHeaderData = $filteredArray['data'][0]['document']['header'];

            $varDataExcel = [
                [
                    'no'        => 1,
                    'DORNumber' => $getHeaderData['number'],
                    'productId' => $getHeaderData['recordID'],
                    'qty'       => $getHeaderData['date'],
                    'unitPrice' => $getHeaderData['recordID'],
                    'total'     => $getHeaderData['businessDocumentType_RefID'],
                ]
            ];

            $compact = [
                'dataHeader' => $getHeaderData,
                'dataExcel'  => $varDataExcel
            ];

            Session::put("isButtonReportDOSummarySubmit", true);
            Session::put("dataDetailReportDOSummary", $compact['dataHeader']);
            Session::put("dataPDFReportDOSummary", $compact['dataHeader']);
            Session::put("dataExcelReportDOSummary", $compact['dataExcel']);

            return $compact;
        } catch (\Throwable $th) {
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDOSummaryStore(Request $request) 
    {
        try {
            $budgetID       = $request->budget_id;
            $subBudgetID    = $request->advance_RefID;
            // $subBudgetID    = $request->sub_budget_id;

            if (!$budgetID && !$subBudgetID) {
                Session::forget("isButtonReportDOSummarySubmit");
                Session::forget("dataDetailReportDOSummary");
                Session::forget("dataPDFReportDOSummary");
                Session::forget("dataExcelReportDOSummary");

                return redirect()->route('Inventory.ReportDOSummary')->with('NotFound', 'Budget & Sub Budget Cannot Empty');
            }

            $compact = $this->ReportDOSummaryData($subBudgetID);

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
            $dataDetail = Session::get("dataDetailReportDOSummary");

            if ($dataDetail) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDOSummary_pdf', compact('dataDetail'));
                    $pdf->setPaper('A4', 'portrait');
    
                    // Preview PDF
                    // return $pdf->stream('Export_Report_Delivery_Order_Request_Detail.pdf');
    
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

            $filteredArray = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $id,
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

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Data not found in the API response.');
            }

            $getData = $filteredArray['data'][0]['document'];

            $dataDetails = [];
            $i = 0;
            $totalQty = 0;
            foreach ($getData['content']['details']['itemList'] as $dataReports) {
                $totalQty += $dataReports['entities']['quantity'];
            
                $dataDetails[$i]['no']         = $i + 1;
                $dataDetails[$i]['doNumber']   = $dataReports['entities']['product_RefID'];
                $dataDetails[$i]['productId']  = $dataReports['entities']['priceCurrency_RefID'];
                $dataDetails[$i]['qty']        = $dataReports['entities']['quantity'];
                $dataDetails[$i]['uom']        = 'Set';
                $dataDetails[$i]['remark']     = $dataReports['entities']['quantityUnitName'];
                $i++;
            }

            $compact = [
                'dataHeader'    => $getData['header'],
                'dataDetail'    => $dataDetails,
                'totalQty'      => $totalQty
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

            if ($compact === null || empty($compact['dataHeader'])) {
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
                    $canvas->page_text($width - 85, 94, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text($width / 2.5, $height - 20, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
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

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    public function DeliveryOrderListData(Request $request)
    {
        try {

            if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        $varDataAdvanceSettlement = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
        $varDataAdvanceRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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

            $varDataDorList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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

            $do_RefID = $request->do_RefID;
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION ADVANCE
            if (Redis::get("DataListAdvanceDetailComplex") == null) {
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvanceDetailComplex',
                    'latest',
                    [
                        'parameter' => [
                            'advance_RefID' => (int) $do_RefID,
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
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DataListAdvanceDetailComplex"
                ),
                true
            );

            $collection = collect($DataAdvanceDetailComplex);
            $collection = $collection->where('Sys_ID_Advance', $do_RefID);

            $num = 0;
            $filteredArray = [];

            foreach ($collection as $collections) {
                $filteredArray[$num] = $collections;
                $num++;
            }

            if ($filteredArray[0]['Log_FileUpload_Pointer_RefID'] == 0) {
                $dataDetailFileAttachment = null;
            } else {
                $dataDetailFileAttachment = $filteredArray[0]['Log_FileUpload_Pointer_RefID'];
            }

            for ($i = 0; $i < count($filteredArray); $i++) {
                unset($filteredArray[$i]['FileAttachment']);
            }

            //DOCUMENT TYPE ID ADVANCE
            $DocumentType = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DocumentType"
                ),
                true
            );
            $collection = collect($DocumentType);
            $collection = $collection->where('Name', "Advance Form");
            foreach ($collection->all() as $collections) {
                $DocumentTypeID = $collections['Sys_ID'];
            }

            $remark = $filteredArray[0]['Remarks'];
            $filteredArray[0]['Remarks'] = "";

            $compact = [
                'dataHeader' => $filteredArray[0],
                'dataDetail' => $filteredArray,
                'remark' => $remark,
                'dataFileAttachment' => $dataDetailFileAttachment,
                'DocumentTypeID' => $DocumentTypeID,
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 1,
            ];
            return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
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

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
