<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportMaterialReceiveSummary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use App\Services\Inventory\MaterialReceiveService;
use App\Services\WorkflowService;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class MaterialReceiveController extends Controller
{
    protected $materialReceiveService, $workflowService;

    public function __construct(MaterialReceiveService $materialReceiveService, WorkflowService $workflowService)
    {
        $this->materialReceiveService = $materialReceiveService;
        $this->workflowService = $workflowService;
    }

    public function ReportMaterialReceiveSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionMaterialReceiveNumber");
        $dataMR = Session::get("MaterialReceiveReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataMR' => $dataMR
        
        ];
        // dump($dataMR);

        return view('Inventory.MaterialReceive.Reports.ReportMaterialReceiveSummary', $compact);
    }

    public function ReportMaterialReceiveSummaryData( $project_code){
        
            
        try {
            // Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.supplyChain.getWarehouseInboundOrderSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' => $project_code,
                        'DeliveryFrom_RefID' => NULL,
                        'DeliveryTo_RefID' => NULL
                    ],
                     'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                        ]
                ]
            );
            
            // Log::error("Error at " ,$filteredArray);
            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');

            }
            Session::put("MaterialReceiveReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("MaterialReceiveReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMaterialReceiveSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            // $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "") {
                Session::forget("MaterialReceiveReportSummaryDataPDF");
                Session::forget("MaterialReceiveReportSummaryDataExcel");
                
                return redirect()->route('MaterialReceive.ReportMaterialReceiveSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportMaterialReceiveSummaryData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PDeliveryOrderSummaryReportDataPDF");
            //     Session::forget("PDeliveryOrderSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('MaterialReceive.ReportMaterialReceiveSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportMaterialReceiveSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("MaterialReceiveReportSummaryDataPDF");
            $dataExcel = Session::get("MaterialReceiveReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataMR = Session::get("MaterialReceiveReportSummaryDataPDF");
                    // dd($dataMR);

                    $pdf = PDF::loadView('Inventory.MaterialReceive.Reports.ReportMaterialReceiveSummary_pdf', ['dataMR' => $dataMR])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Material Receive Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportMaterialReceiveSummary, 'Export Report Material Receive Summary.xlsx');
                }
            } else {
                return redirect()->route('MaterialReceive.ReportMaterialReceiveSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function index(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionMaterialReceive");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 0,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 0,
        ];
        return view('Inventory.MaterialReceive.Transactions.CreateMaterialReceive', $compact);
    }

    public function StoreValidateMaterialReceive(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReceive");
        if ($request->session()->has("SessionMaterialReceive")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionMaterialReceive", $val);
                $request->session()->push("SessionMaterialReceive", $val2);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionMaterialReceive", $val);
            $request->session()->push("SessionMaterialReceive", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateMaterialReceive2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReceive");
        if ($request->session()->has("SessionMaterialReceive")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    unset($data[$i]);
                    unset($data[$i + 1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionMaterialReceive", $newClass);
                }
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $response = $this->materialReceiveService->create($request);

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

    public function MaterialReceiveListData(Request $request)
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

    public function MaterialReceiveListDataPO(Request $request)
    {
        $advance_RefID = $request->input('purchase_order_id');
        $varAPIWebToken = Session::get('SessionLogin');

        // DATA REVISION ADVANCE
        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $advance_RefID,
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

        $num = 0;
        $filteredArray = [];

        foreach ($collection as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        return response()->json($filteredArray);
    }

    public function MaterialReceiveListdataMR(Request $request)
    {
        $advance_RefID = $request->input('delivery_order_id');
        $varAPIWebToken = Session::get('SessionLogin');

        // DATA REVISION ADVANCE
        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $advance_RefID,
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

        $num = 0;
        $filteredArray = [];

        foreach ($collection as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        return response()->json($filteredArray);
    }

    public function RevisionMaterialReceiveIndex(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $response = $this->materialReceiveService->getDetail($request->modal_material_receive_id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $data = $response['data'];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'header'            => [
                    'combinedBudget_RefID'          => $data[0]['combinedBudget_RefID'] ?? '',
                    'combinedBudgetCode'            => $data[0]['combinedBudgetCode'] ?? '',
                    'combinedBudgetName'            => $data[0]['combinedBudgetName'] ?? '',
                    'combinedBudgetSectionCode'     => $data[0]['combinedBudgetSectionCode'] ?? '',
                    'combinedBudgetSectionName'     => $data[0]['combinedBudgetSectionName'] ?? '',
                    'warehouseInboundOrderRefID'    => $data[0]['warehouseInboundOrder_RefID'] ?? '',
                    'materialReceiveNumber'         => $data[0]['businessDocumentNumber'] ?? '',
                    'transporterRefID'              => $data[0]['transporter_RefID'] ?? '',
                    'deliveryFromRefID'             => $data[0]['deliveryFrom_RefID'] ?? '',
                    'deliveryFromNonRefID'          => $data[0]['deliveryFrom_NonRefID']['Address'] ?? '',
                    'deliveryToRefID'               => $data[0]['deliveryTo_RefID'] ?? '',
                    'deliveryToNonRefID'            => $data[0]['deliveryTo_NonRefID']['Address'] ?? '',
                    'fileID'                        => $data[0]['log_FileUpload_Pointer_RefID'] ?? null,
                    'remarks'                       => $data[0]['remarks'] ?? '',
                ],
                'dataDetail'        => $data,
            ];

            // dump($compact);

            return view('Inventory.MaterialReceive.Transactions.RevisionMaterialReceive', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function UpdateMaterialReceive(Request $request) 
    {
        try {
            $response = $this->materialReceiveService->updates($request);

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
        dd($input);
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function MaterialReceiveListCartRevision(Request $request)
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

    public function SearchDeliveryOrder(Request $request)
    {
        Session::forget("SessionDeliveryOrderRequestSupplier");
        Session::forget("SessionDeliveryOrderRequestSupplierID");

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

    public function MaterialReceiveList()
    {
        try {
            $response = $this->materialReceiveService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at MaterialReceiveList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}