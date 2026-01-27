<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\ExportExcel\Inventory\ExportReportMaterialReturnSummary;
use App\Http\Controllers\ExportExcel\Inventory\ExportReportMaterialReturnDetail;
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
use App\Services\Inventory\MaterialReturnService;
use App\Services\Master\BusinessDocumentType\BusinessDocumentTypeService;

class MaterialReturnController extends Controller
{
    protected $materialReturnService, $businessDocumentTypeService;

    public function __construct(
        BusinessDocumentTypeService $businessDocumentTypeService, 
        MaterialReturnService $materialReturnService
    ) {
        $this->materialReturnService        = $materialReturnService;
        $this->businessDocumentTypeService  = $businessDocumentTypeService;
    }

    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsType('Warehouse Outbound Order Form');

        return view('Inventory.MaterialReturn.Transactions.CreateMaterialReturn', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->materialReturnService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Material Return');
            }

            // $responseWorkflow = $this->workflowService->submit(
            //     $response['data']['businessDocument']['businessDocument_RefID'],
            //     $request->workFlowPath_RefID,
            //     $request->comment,
            //     $request->approverEntity,
            // );

            // if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
            //     throw new \Exception('Failed to fetch Submit Workflow Create Material Return');
            // }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Material Return Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function update(Request $request, $id)
    {
        return response()->json($request);
    }

    public function List() 
    {
        try {
            $response = $this->materialReturnService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch List Material Return');
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("List Material Return Function Error: " . $th->getMessage());

            return response()->json([]);
        }
    }

    public function UpdateRevisionMaterialReturn(Request $request) 
    {
        try {
            $response = $this->materialReturnService->update($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Material Return');
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("UpdateRevisionMaterialReturn Material Return Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function RevisionMaterialReturnIndex(Request $request)
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $response       = $this->materialReturnService->getDetail($request->material_return_id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Material Return');
            }

            $data = $response['data'];

            $compact = [
                'varAPIWebToken'                    => $varAPIWebToken,
                'header'                            => [
                    'warehouseOutboundOrder_RefID'  => $data[0]['WarehouseOutboundOrder_RefID'] ?? '',
                    'materialReturn_RefID'          => $data[0]['Sys_ID'] ?? '',
                    'materialReturnNumber'          => $data[0]['BusinessDocumentNumber'] ?? '',
                    'combinedBudget_RefID'          => $data[0]['CombinedBudget_RefID'] ?? '',
                    'combinedBudgetCode'            => $data[0]['CombinedBudgetCode'] ?? '',
                    'combinedBudgetName'            => $data[0]['CombinedBudgetName'] ?? '',
                    'transporter_RefID'             => $data[0]['Transporter_RefID'] ?? '',
                    'transporterCode'               => $data[0]['TransporterCode'] ?? '',
                    'transporterName'               => $data[0]['TransporterName'] ?? '',
                    'transporterAddress'            => $data[0]['TransporterAddress'] ?? '-',
                    'transporterContactPerson'      => $data[0]['TransporterContactPerson'] ?? '-',
                    'transporterHandphone'          => $data[0]['TransporterHandphone'] ?? '-',
                    'transporterPhone'              => $data[0]['TransporterPhone'] ?? '-',
                    'transporterFax'                => $data[0]['TransporterFax'] ?? '-',
                    'remarks'                       => $data[0]['Remarks'] ?? ''
                ],
                'detail'                            => $data
            ];

            return view('Inventory.MaterialReturn.Transactions.RevisionMaterialReturn', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMaterialReturnSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $isSubmitButton = $request->session()->get('isButtonReportMaterialReturnSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportMaterialReturn', []) : [];

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'dataReport' => $dataReport
        ];

        return view('Inventory.MaterialReturn.Reports.ReportMatReturnSummary', $compact);
    }

    public function ReportMatReturnSummaryData(
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
            Log::error("Error at ReportMatReturnSummaryData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReturnSummaryStore(Request $request) 
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
        
            //     return redirect()->route('MaterialReturn.ReportMaterialReturnSummary')->with('NotFound', $message);
            // }

            $compact = $this->ReportMatReturnSummaryData(
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

            return redirect()->route('MaterialReturn.ReportMaterialReturnSummary');
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReturnSummaryStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportMatReturnSummary(Request $request) {
        try {
            $dataReport = Session::get("dataReportMaterialReturn");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.MaterialReturn.Reports.ReportMatReturnSummary_pdf', ['dataReport' => $dataReport]);
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
                return redirect()->route('MaterialReturn.ReportMaterialReturnSummary')->with('NotFound', 'Budget, Source Warehouse, Destination Warehouse Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportMatReturnSummary: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReturnDetail(Request $request)
    {
        $varAPIWebToken         = $request->session()->get('SessionLogin');
        $isSubmitButton         = $request->session()->get('isButtonReportMatReturnDetailSubmit');

        $dataReport = $isSubmitButton ? $request->session()->get('dataReportMatReturnDetail', []) : [];

        $compact = [
            'varAPIWebToken' => [],
            'dataReport'     => $dataReport
        ];

        return view('Inventory.MaterialReturn.Reports.ReportMatReturnDetail', $compact);
    }

    public function ReportMatReturnDetailData($id) 
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            // $filteredArray = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken, 
            //     'report.form.documentForm.finance.getAdvance', 
            //     'latest',
            //     [
            //         'parameter' => [
            //             'recordID' => (int) $id
            //         ]
            //     ]
            // );

            // if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
            //     throw new \Exception('Data not found in the API response.');
            // }

            // $getData = $filteredArray['data'][0]['document'];

            $getData = [
                'header' => [
                    'date' => '2025-05-16'
                ],
                'content' => [
                    'general' => [
                        'budget' => [
                            'combinedBudgetCodeList' => ['Q000062'],
                            'combinedBudgetNameList' => ['XL Microcell 2007'],
                            'combinedBudgetSectionCodeList' => ['235 - Ampang Kuranji - Padang']
                        ],
                        'involvedPersons' => [
                            [
                                'requesterWorkerName' => 'Iswahyuni'
                            ]
                        ]
                    ],
                    'details' => [
                        'itemList' => [
                            [
                                'entities' => [
                                    'product_RefID' => '1000416',
                                    'productName' => 'Cable NYY',
                                    'quantity' => 5,
                                    'quantityUnitName' => 'pcs',
                                    'remarks' => 'Kondisi barang sesuai dan dipacking dalam box'
                                ]
                            ],
                            [
                                'entities' => [
                                    'product_RefID' => '313344-0000',
                                    'productName' => 'Charger-200A plus dioda dropper',
                                    'quantity' => 20,
                                    'quantityUnitName' => 'pcs',
                                    'remarks' => 'Kondisi barang sesuai'
                                ]
                            ],
                            [
                                'entities' => [
                                    'product_RefID' => '211096-0000',
                                    'productName' => 'Steel Support Apparatus',
                                    'quantity' => 10,
                                    'quantityUnitName' => 'kg',
                                    'remarks' => 'Kondisi barang sesuai'
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            // DATA HEADER
            $dataHeaders = [
                'mrNumber'      => 'MR/QDC/2025/0000006',
                'doNumber'      => 'DO/QDC/2025/0000010',
                'budget'        => $getData['content']['general']['budget']['combinedBudgetCodeList'][0],
                'budgetName'    => $getData['content']['general']['budget']['combinedBudgetNameList'][0],
                'subBudget'     => $getData['content']['general']['budget']['combinedBudgetSectionCodeList'][0],
                'date'          => $getData['header']['date'],
                'transporter'   => "VDR-2594 - Aman Jaya",
                'deliveryFrom'  => "Gudang Mampang",
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
                $dataDetails[$i]['uom']         = $dataReports['entities']['quantityUnitName'];
                $dataDetails[$i]['remark']      = $dataReports['entities']['remarks'];
                $i++;
            }

            $compact = [
                'dataHeader'    => $dataHeaders,
                'dataDetail'    => $dataDetails,
                'totalQty'      => number_format($totalQty, 2, ',', '.'),
            ];

            Session::put("isButtonReportMatReturnDetailSubmit", true);
            Session::put("dataReportMatReturnDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReturnDetailData: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportMatReturnDetailStore(Request $request) 
    {
        try {
            $advanceRefID   = $request->advance_RefID;
            $advanceNumber  = $request->advance_number;

            if (!$advanceRefID && !$advanceNumber) {
                Session::forget("isButtonReportMatReturnDetailSubmit");
                Session::forget("dataReportMatReturnDetail");

                return redirect()->route('Inventory.ReportMatReturnDetail')->with('NotFound', 'MR Number Cannot Empty');
            }

            $compact = $this->ReportMatReturnDetailData($advanceRefID);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Inventory.ReportMatReturnDetail');
        } catch (\Throwable $th) {
            Log::error("Error at ReportMatReturnDetailStore: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportMatReturnDetail(Request $request) {
        try {
            $dataReport = Session::get("dataReportMatReturnDetail");

            if ($dataReport) {
                if ($request->print_type == "PDF") {
                    $pdf = PDF::loadView('Inventory.MaterialReturn.Reports.ReportMatReturnDetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));
    
                    return $pdf->download('Export Report Material Receive Detail.pdf');
                } else {
                    return Excel::download(new ExportReportMaterialReturnDetail, 'Export Report Material Receive Detail.xlsx');
                }
            } else {
                return redirect()->route('Inventory.ReportMatReturnDetail')->with('NotFound', 'MR Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at PrintExportReportMatReturnDetail: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
