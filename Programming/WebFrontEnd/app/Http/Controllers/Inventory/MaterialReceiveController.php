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
use Carbon\Carbon;
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

    public function ReportMatReceivetoMatReturn(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportMaterialReturnSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportMaterialReturn', []) : [];

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'dataReport' => $dataReport
        ];

        return view('Inventory.MaterialReceive.Reports.ReportMatReceivetoMatReturn', $compact);
    }

    public function ReportMatReceivetoMatReturnData(
        $projectId, 
        $siteId, 
        $projectCode, 
        $projectName,
        $subBudgetCode,
        $subBudgetName,
        $subBudgetAddress,
        $subBudgetID2,
        $subBudgetCode2,
        $subBudgetName2,
        $subBudgetAddress2
    ) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            // Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken,
            //     'report.form.documentForm.finance.getReportAdvanceSummary',
            //     'latest',
            //     [
            //         'parameter' => [
            //             'dataFilter' => [
            //                 'budgetID' => 1,
            //                 'subBudgetID' => 1,
            //                 'workID' => 1,
            //                 'productID' => 1,
            //                 'beneficiaryID' => 1,
            //             ]
            //         ]
            //     ],
            //     false
            // );

            // $DataReportAdvanceSummary = json_decode(
            //     Helper_Redis::getValue(
            //         Helper_Environment::getUserSessionID_System(),
            //         "ReportAdvanceSummary"
            //     ),
            //     true
            // );

            $collection = collect([
                [
                    'DocumentNumber'        => 'MR/QDC/2025/0000006',
                    'ProductCode'           => '1000416',
                    'ProductName'           => 'Cable NYY',
                    'CombinedBudget_RefID'  => $projectId,
                    'CombinedBudgetCode'    => $projectCode,
                    'CombinedBudgetName'    => $projectName,
                    'TotalAdvance'          => 5.00,
                    'DocumentDateTimeTZ'    => '2025-05-16 14:36:22.706103+07',
                    'SourceCode'            => $subBudgetCode,
                    'SourceName'            => $subBudgetName,
                    'DestinationCode'       => $subBudgetCode2,
                    'DestinationName'       => $subBudgetName2,
                    'Remark'                => 'Kondisi barang sesuai dan dipacking dalam box',
                    'UOM'                   => 'pcs'
                ],
                [
                    'DocumentNumber'        => 'MR/QDC/2025/0000007',
                    'ProductCode'           => '313344-0000',
                    'ProductName'           => 'Charger-200A plus dioda dropper',
                    'CombinedBudget_RefID'  => $projectId,
                    'CombinedBudgetCode'    => $projectCode,
                    'CombinedBudgetName'    => $projectName,
                    'TotalAdvance'          => 20.00,
                    'DocumentDateTimeTZ'    => '2025-05-17 10:54:22.706103+07',
                    'SourceCode'            => $subBudgetCode,
                    'SourceName'            => $subBudgetName,
                    'DestinationCode'       => $subBudgetCode2,
                    'DestinationName'       => $subBudgetName2,
                    'Remark'                => 'Kondisi barang sesuai',
                    'UOM'                   => 'pcs'
                ],
                [
                    'DocumentNumber'        => 'MR/QDC/2025/0000008',
                    'ProductCode'           => '211096-0000',
                    'ProductName'           => 'Steel Support Apparatus',
                    'CombinedBudget_RefID'  => $projectId,
                    'CombinedBudgetCode'    => $projectCode,
                    'CombinedBudgetName'    => $projectName,
                    'TotalAdvance'          => 10.00,
                    'DocumentDateTimeTZ'    => '2025-05-18 17:49:22.706103+07',
                    'SourceCode'            => $subBudgetCode,
                    'SourceName'            => $subBudgetName,
                    'DestinationCode'       => $subBudgetCode2,
                    'DestinationName'       => $subBudgetName2,
                    'Remark'                => 'Kondisi barang sesuai',
                    'UOM'                   => 'kg'
                ],
            ]);

            if ($projectId != "") {
                $collection = $collection->where('CombinedBudget_RefID', $projectId);
            }
            // if ($siteId != "") {
            //     $collection = $collection->where('CombinedBudgetSection_RefID', $siteId);
            // }

            $collection = $collection->all();

            $dataHeaders = [
                'budget'        => $projectCode . " - " . $projectName
            ];

            $dataDetails = [];
            $i = 0;
            $total = 0;
            foreach ($collection as $collections) {
                $total                                  += $collections['TotalAdvance'];

                $dataDetails[$i]['no']                  = $i + 1;
                $dataDetails[$i]['budgetCode']          = $collections['CombinedBudgetCode'];
                $dataDetails[$i]['budgetName']          = $collections['CombinedBudgetName'];
                $dataDetails[$i]['productCode']         = $collections['ProductCode'];
                $dataDetails[$i]['productName']         = $collections['ProductName'];
                $dataDetails[$i]['documentNumber']      = $collections['DocumentNumber'];
                $dataDetails[$i]['sourceCode']          = $collections['SourceCode'];
                $dataDetails[$i]['sourceName']          = $collections['SourceName'];
                $dataDetails[$i]['destinationCode']     = $collections['DestinationCode'];
                $dataDetails[$i]['destinationName']     = $collections['DestinationName'];
                $dataDetails[$i]['uom']                 = $collections['UOM'];
                $dataDetails[$i]['remark']              = $collections['Remark'];
                $dataDetails[$i]['date']                = date('d-m-Y', strtotime($collections['DocumentDateTimeTZ']));
                $dataDetails[$i]['total']               = number_format($collections['TotalAdvance'], 2);
                $i++;
            }

            $compact = [
                'dataHeader'            => $dataHeaders,
                'dataDetail'            => $dataDetails,
                'total'                 => number_format($total, 2),
            ];

            Session::put("isButtonReportMaterialReturnSubmit", true);
            Session::put("dataReportMaterialReturn", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReceivetoMatReturnData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReceivetoMatReturnStore(Request $request) 
    {
        try {
            // BUDGET
            $budgetID       = $request->budget_id;
            $budget         = $request->budget;
            $budgetName     = $request->budget_name;

            // SOURCE WAREHOUSE
            $subBudgetID        = $request->sub_budget_id;
            $subBudgetCode      = $request->sub_budget;
            $subBudgetName      = $request->sub_budget_name;
            $subBudgetAddress   = $request->sub_budget_address;

            // DESTINATION WAREHOUSE
            $subBudgetID2       = $request->sub_budget_id2;
            $subBudgetCode2     = $request->sub_budget2;
            $subBudgetName2     = $request->sub_budget_name2;
            $subBudgetAddress2  = $request->sub_budget_address2;

            // dd($request->all());

            // if (!$budgetID && !$subBudgetID && !$subBudgetID2) {
            //     $message = 'Budget, Source Warehouse, & Destination Warehouse Cannot Empty';
            // } else if ($budgetID && !$subBudgetID) {
            //     $message = 'Sub Budget Cannot Empty';
            // } 

            // if (isset($message)) {
            //     Session::forget("isButtonReportMaterialReturnSubmit");
            //     Session::forget("dataReportMaterialReturn");
        
            //     return redirect()->route('Inventory.ReportMatReceivetoMatReturn')->with('NotFound', $message);
            // }

            $compact = $this->ReportMatReceivetoMatReturnData(
                $budgetID, 
                $subBudgetID, 
                $budget, 
                $budgetName,
                $subBudgetCode,
                $subBudgetName,
                $subBudgetAddress,
                $subBudgetID2,
                $subBudgetCode2,
                $subBudgetName2,
                $subBudgetAddress2
            );

            // dd($compact);

            if ($compact === null || empty($compact['dataHeader'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Inventory.ReportMatReceivetoMatReturn');
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReceivetoMatReturnStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportMatReceivetoMatReturn(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportMaterialReturn");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.MaterialReceive.Reports.ReportMatReceivetoMatReturn_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
                    return $pdf->download('Export Report Material Receive Summary.pdf');
                } else {
                    return Excel::download(new ExportReportMaterialReturnSummary, 'Export Report Material Receive Summary.xlsx');
                }
            } else {
                return redirect()->route('Inventory.ReportMatReceivetoMatReturn')->with('NotFound', 'Budget, Source Warehouse, Destination Warehouse Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportMatReceivetoMatReturn: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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

    public function ReportMaterialReceiveSummaryData( $project_code)
    {
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
        try {
            $receivedID     = $request->received_id;
            $deliveryFromID = $request->delivery_from_id;
            $deliveryToID   = $request->delivery_to_id;
            $date           = $request->mrDate;
            $budget         = [
                "id"        => $request->budget_id,
                "code"      => $request->budget_code,
            ];

            $response = $this->materialReceiveService->getMaterialReceiveSummary(
                $budget['code'], 
                $receivedID,
                $deliveryFromID,
                $deliveryToID,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Material Receive Summary Report');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Material Receive Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportMaterialReceiveSummary(Request $request)
    {
        try {
            $type                   = $request->printType;
            $budgetName             = $request->budgetName;
            $receivedName           = $request->receivedName;
            $deliveryFromName       = $request->deliveryFromName;
            $deliveryToName         = $request->deliveryToName;
            $mrDate                 = $request->mrDate;
            $materialReceiveSummary = json_decode($request->dataReport, true);

            if ($materialReceiveSummary) {
                if ($type == "PDF") {
                    $pdf = PDF::loadView('Inventory.MaterialReceive.Reports.ReportMaterialReceiveSummary_pdf', [
                        'dataMR'            => $materialReceiveSummary,
                        'budgetName'        => $budgetName,
                        'receivedName'      => $receivedName,
                        'deliveryFromName'  => $deliveryFromName,
                        'deliveryToName'    => $deliveryToName,
                        'mrDate'            => $mrDate
                        ])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Material Receive Summary.pdf');
                } else if ($type == "EXCEL") {
                    return Excel::download(new ExportReportMaterialReceiveSummary($materialReceiveSummary, $budgetName, $receivedName, $deliveryFromName, $deliveryToName, $mrDate), 'Export Report Material Receive Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Material Receive Summary Report');
                }
            } else {
                throw new \Exception('Material Receive Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Material Receive Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Warehouse Inbound Order Form');

        return view('Inventory.MaterialReceive.Transactions.CreateMaterialReceive', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
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

    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function MaterialReceiveDetail(Request $request) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $response = $this->materialReceiveService->getDetail($request->materialReceive_RefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch material receive detail');
            }

            return response()->json($response);
        } catch (\Throwable $th) {
            Log::error("Error at MaterialReceiveDetail: " . $th->getMessage());
            
            $compact = [
                'metadata'  => [
                    'metadata'  => [
                        'HTTPStatusCode' => 500
                    ]
                ],
                'message'   => 'Terjadi kesalahan saat memproses material receive detail. Silakan coba lagi nanti.'
            ];

            return response()->json($compact);
        }
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
            $receiveDate = $data[0]['receiveDateTimeTZ'] ? Carbon::parse($data[0]['receiveDateTimeTZ'])->toDateString() : '';

            // dump($data);

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
                    'receiveDate'                   => $receiveDate,
                    'warehouseRefID'                => $data[0]['warehouse_RefID'] ?? '',
                    'warehouseName'                 => $data[0]['warehouseName'] ?? '',
                    'warehouseAddress'              => $data[0]['warehouseAddress'] ?? '',
                    'deliveryDate'                  => $data[0]['deliveryDateTimeTZ'] ?? '',
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