<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\ExportExcel\Inventory\ExportReportDeliveryOrderSummary;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportDOToMaterialReceive;
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
    public function ReportDOToMaterialReceive(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessiondotoMRNumber");
        $dataDOtoMR = Session::get("dotoMRReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataDOtoMR' => $dataDOtoMR
        
        ];
        // dump($dataDOtoMR);

        return view('Inventory.DeliveryOrder.Reports.ReportDOToMaterialReceive', $compact);
    }

    public function ReportDOToMaterialReceiveData($project_code, $site_code)
    {        
        try {
            Log::error("Error at ",[$project_code, $site_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.supplyChain.getDeliveryOrderToWarehouseInboundOrderSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' =>  $project_code,
                        'CombinedBudgetSectionCode' =>  $site_code,
                        // 'Warehouse_RefID' => NULL
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
            Session::put("dotoMRReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("dotoMRReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDOToMaterialReceiveStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            $site_code = $request->site_code_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "" && $site_code == "") {
                Session::forget("dotoMRReportSummaryDataPDF");
                Session::forget("dotoMRReportSummaryDataExcel");
                
                return redirect()->route('DeliveryOrder.ReportDOToMaterialReceive')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportDOToMaterialReceiveData($project_code, $site_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PDeliveryOrderSummaryReportDataPDF");
            //     Session::forget("PDeliveryOrderSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('DeliveryOrder.ReportDOToMaterialReceive');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
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

                    $canvas = $dom_pdf ->get_canvas();
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
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionDeliveryOrderNumber");
        $dataDO = Session::get("DeliveryOrderReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataDO' => $dataDO
        
        ];
        // dump($dataDO);

        return view('Inventory.DeliveryOrder.Reports.ReportDeliveryOrderSummary', $compact);
    }
    public function ReportDeliveryOrderSummaryData($project_code, $site_code, $start_date = null, $end_date = null)
    {        
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $filters = [];
            if ($start_date && $end_date) {
                $filters[] = [
                    "condition" => "Between",
                    "field" => "date",
                    "value" => [
                        "from" => $start_date,
                        "to"   => $end_date,
                    ]
                ];
            }

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.supplyChain.getDeliveryOrderSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode'        => $project_code,
                        'CombinedBudgetSectionCode' => $site_code,
                        'Warehouse_RefID'           => NULL
                    ],
                    'SQLStatement' => [
                        'pick'   => null,
                        'sort'   => null,
                        'filter' => $filters ?: null,
                        'paging' => null
                    ]
                ]
            );

            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            Session::put("DeliveryOrderReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("DeliveryOrderReportSummaryDataExcel", $filteredArray['data']['data']);

            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportDeliveryOrderSummaryStore(Request $request)
    {
        try {
            $project_code = $request->project_code_second;
            $site_code    = $request->site_code_second;
            $date_range   = $request->input('date');

            $start_date = $end_date = null;

            if ($date_range) {
                // format input: "DD/MM/YYYY - DD/MM/YYYY"
                [$start, $end] = explode(' - ', $date_range);
                $start_date = \Carbon\Carbon::createFromFormat('d/m/Y', trim($start))->format('Y-m-d 00:00:00+07');
                $end_date   = \Carbon\Carbon::createFromFormat('d/m/Y', trim($end))->format('Y-m-d 23:59:59+07');
            }

            if (empty($project_code) && empty($site_code)) {
                Session::forget("DeliveryOrderReportSummaryDataPDF");
                Session::forget("DeliveryOrderReportSummaryDataExcel");
                return redirect()->route('DeliveryOrder.ReportDeliveryOrderSummary')->with('NotFound', 'Cannot Empty');
            }

            // simpan filter ke session
            Session::put('ReportDeliveryOrderSummaryFilter', [
                'project_code' => $project_code,
                'site_code'    => $site_code,
                'start_date'   => $start_date,
                'end_date'     => $end_date,
            ]);

            $this->ReportDeliveryOrderSummaryData($project_code, $site_code, $start_date, $end_date);

            return redirect()->route('DeliveryOrder.ReportDeliveryOrderSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // public function ReportDeliveryOrderSummaryData( $project_code, $site_code)
    // {        
    //     try {
    //         Log::error("Error at ",[$project_code, $site_code]);

    //         $varAPIWebToken = Session::get('SessionLogin');

    //         $filteredArray = Helper_APICall::setCallAPIGateway(
    //             Helper_Environment::getUserSessionID_System(),
    //             $varAPIWebToken, 
    //             'report.form.documentForm.supplyChain.getDeliveryOrderSummary', 
    //             'latest',
    //             [
    //                 'parameter' => [
    //                     'CombinedBudgetCode' =>  $project_code,
    //                     'CombinedBudgetSectionCode' =>  $site_code,
    //                     'Warehouse_RefID' => NULL
    //                 ],
    //                  'SQLStatement' => [
    //                     'pick' => null,
    //                     'sort' => null,
    //                     'filter' => null,
    //                     'paging' => null
    //                     ]
    //             ]
    //         );
            
    //         Log::error("Error at " ,$filteredArray);
    //         if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
    //             return redirect()->back()->with('NotFound', 'Process Error');

    //         }
    //         Session::put("DeliveryOrderReportSummaryDataPDF", $filteredArray['data']['data']);
    //         Session::put("DeliveryOrderReportSummaryDataExcel", $filteredArray['data']['data']);
    //         return $filteredArray['data']['data'];
    //     }
    //     catch (\Throwable $th) {
    //         Log::error("Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }

    // public function ReportDeliveryOrderSummaryStore(Request $request)
    // {
    //     // tes;
    //     try {
    //         $project_code = $request->project_code_second;
    //         $site_code = $request->site_id_second;

    //         $statusHeader = "Yes";
    //         Log::error("Error at " ,[$request->all()]);
    //         if ($project_code == "" && $site_code == "") {
    //             Session::forget("DeliveryOrderReportSummaryDataPDF");
    //             Session::forget("DeliveryOrderReportSummaryDataExcel");
                
    //             return redirect()->route('DeliveryOrder.ReportDeliveryOrderSummary')->with('NotFound', 'Cannot Empty');
    //         }

    //         $compact = $this->ReportDeliveryOrderSummaryData($project_code, $site_code);
    //         // dd($compact);
    //         // if ($compact['dataHeader'] == []) {
    //         //     Session::forget("PDeliveryOrderSummaryReportDataPDF");
    //         //     Session::forget("PDeliveryOrderSummaryReportDataExcel");

    //         //     return redirect()->back()->with('NotFound', 'Data Not Found');
    //         // }

    //         return redirect()->route('DeliveryOrder.ReportDeliveryOrderSummary');
    //     } catch (\Throwable $th) {
    //         Log::error("Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }

    public function PrintExportReportDeliveryOrderSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("DeliveryOrderReportSummaryDataPDF");
            $dataExcel = Session::get("DeliveryOrderReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataDO = Session::get("DeliveryOrderReportSummaryDataPDF");
                    // dd($dataDO);

                    $pdf = PDF::loadView('Inventory.DeliveryOrder.Reports.ReportDeliveryOrderSummary_pdf', ['dataDO' => $dataDO])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Delivery Order Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportDeliveryOrderSummary, 'Export Report Delivery Order Summary.xlsx');
                }
            } else {
                return redirect()->route('DeliveryOrder.DeliveryOrderSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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
            $response = $this->deliveryOrderService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->resubmit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
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
            Log::error("Error at update: " . $th->getMessage());
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

            $response = $this->deliveryOrderService->getDetail($request->do_RefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $data = $response['data']['data'];

            $compact = [
                'varAPIWebToken'                => $varAPIWebToken,
                'header'                        => [
                    'combinedBudget_RefID'      => $data[0]['combinedBudget_RefID'] ?? '',
                    'combinedBudgetCode'        => $data[0]['combinedBudgetCode'] ?? '',
                    'combinedBudgetName'        => $data[0]['combinedBudgetName'] ?? '',
                    'combinedBudgetSectionCode' => $data[0]['combinedBudgetSectionCode'] ?? '',
                    'combinedBudgetSectionName' => $data[0]['combinedBudgetSectionName'] ?? '',
                    'doNumber'                  => $data[0]['documentNumber'] ?? '',
                    'doID'                      => $data[0]['deliveryOrder_RefID'] ?? '',
                    'doDetailID'                => $data[0]['deliveryOrderDetail_ID'] ?? '',
                    'deliveryFrom'              => $data[0]['deliveryFrom_NonRefID']['Address'] ?? '',
                    'deliveryFromID'            => $data[0]['deliveryFrom_RefID'] ?? '',
                    'deliveryTo'                => $data[0]['deliveryTo_NonRefID']['Address'] ?? '',
                    'deliveryToID'              => $data[0]['deliveryTo_RefID'] ?? '',
                    'transporterID'             => $data[0]['transporter_RefID'] ?? '',
                    'transporterCode'           => $data[0]['transporterCode'] ?? '',
                    'transporterName'           => $data[0]['transporterName'] ?? '',
                    'transporterPhone'          => $data[0]['transporterPhone'] ?? '',
                    'transporterFax'            => $data[0]['transporterFax'] ?? '',
                    'transporterContact'        => $data[0]['transporterContactPerson'] ?? '',
                    'transporterHandphone'      => $data[0]['transporterHandphone'] ?? '',
                    'transporterAddress'        => $data[0]['transporterAddress'] ?? '',
                    'fileID'                    => $data[0]['log_FileUpload_Pointer_RefID'] ?? null,
                    'remarks'                   => $data[0]['remarks'] ?? '',
                ],
                'data'                          => $data
            ];

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
}
