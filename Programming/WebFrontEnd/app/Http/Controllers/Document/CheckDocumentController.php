<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\Document\DocumentTypeMapper;
use App\Services\Document\CheckDocumentService;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Purchase\PurchaseOrderService;
use App\Services\Inventory\DeliveryOrderService;
use App\Services\Process\BusinessTrip\BusinessTripService;
use App\Http\Controllers\ExportExcel\Purchase\ExportReportPurchaseOrderDetail;

class CheckDocumentController extends Controller
{
    protected $checkDocumentService, $purchaseOrderService, $deliveryOrderService, $businessTripService;

    public function __construct(
        BusinessTripService $businessTripService,
        CheckDocumentService $checkDocumentService, 
        PurchaseOrderService $purchaseOrderService, 
        DeliveryOrderService $deliveryOrderService)
    {
        $this->businessTripService = $businessTripService;
        $this->checkDocumentService = $checkDocumentService;
        $this->purchaseOrderService = $purchaseOrderService;
        $this->deliveryOrderService = $deliveryOrderService;
    }

    public function index()
    {
        $compact = [
            'var' => 0,
            // 'businessDocument_RefID' => "",
            // 'businessDocumentNumber' => "",
            // 'businessDocumentType_Name' => "",
            'sourceData' => 0,
            'submitter_ID' => 0,
            'statusDocument' => 0,
            'statusHeader' => "Yes",
        ];

        return view('Documents.Transactions.IndexCheckDocument', $compact);
    }

    public function getDetailTransactionNumber($request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $sessionID      = Helper_Environment::getUserSessionID_System();
            $documentType   = $request['businessDocumentTypeName'] ?? '';
            $referenceId    = isset($request['transDetail_RefID']) ? (int) $request['transDetail_RefID'] : null;

            if (!$referenceId || !$documentType) {
                return redirect()->back()->with('NotFound', 'Invalid request data.');
            }

            $apiConfig = DocumentTypeMapper::getApiConfig($documentType, $referenceId);

            if (!$apiConfig) {
                return redirect()->back()->with('NotFound', 'Unsupported document type.');
            }

            if (
                $documentType === 'DO From Internal Use' ||
                $documentType === 'DO From Stock Movement' ||
                $documentType === 'Loan Form' ||
                $documentType === 'Loan Settlement Form' ||
                $documentType === 'Modify Budget Form' ||
                $documentType === 'Person Business Trip Settlement Form' || 
                $documentType === 'Sales Invoice Form' || 
                $documentType === 'Sallary Allocation Form'
            ) {
                // JUST FOR TRIGGER, WHEN API KEY NOT READY
                $responseData = [
                    'metadata' => [
                        'HTTPStatusCode' => 200
                    ],
                    'data' => [
                        [
                            'dummy' => 'Hello World'
                        ],
                    ],
                ];
            } else {
                $responseData = Helper_APICall::setCallAPIGateway(
                    $sessionID,
                    $varAPIWebToken,
                    $apiConfig['key'],
                    'latest',
                    [
                        'parameter' => $apiConfig['parameter'],
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

            if ($responseData['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', value: 'API Error.');
            }

            $dataDetail             = $responseData['data']['data'] ?? $responseData['data'] ?? [];
            $businessDocumentRefID  = $dataDetail[0]['BusinessDocument_RefID'] ?? $dataDetail[0]['businessDocument_RefID'] ?? $apiConfig['businessDocument_RefID']; // Dummy: $apiConfig['businessDocument_RefID']

            $compact = [
                'dataDetail'            => $dataDetail,
                'businessDocumentRefID' => $businessDocumentRefID,
            ];

            return $compact;
        } catch (\Throwable $th) {
            Log::error("Error at getDetailTransactionNumber: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function getWorkflowHistory($businessDocumentRefID)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $sessionID      = Helper_Environment::getUserSessionID_System();

            $responseData = Helper_APICall::setCallAPIGateway(
                $sessionID,
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.getApprovementHistoryList',
                'latest',
                [
                    'parameter' => ['businessDocument_RefID' => (int) $businessDocumentRefID]
                ],
                false
            );

            if ($responseData['metadata']['HTTPStatusCode'] !== 200) {
                return [
                    [
                        'remarks' => 'ini data dummy', 
                        'workFlowPathActionName' => 'Rejection To Resubmit',
                        'approvalDateTimeTZ' => '2025-09-29 10:31:00.113 +0700',
                        'approverEntityName' => 'Teguh Pratama Januzir Sukin',
                        'approverEntityFullJobPositionTitle' => 'Manager'
                    ]
                ];
                // return redirect()->back()->with('NotFound', value: 'Workflow History API Error.');
            }

            // dd($responseData);

            return $responseData['data'];
        } catch (\Throwable $th) {
            Log::error("Error at getWorkflowHistory: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');//throw $th;
        }
    }

    private function determineApproverStatus($workflowHistory, $sourceData)
    {
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        if ($sourceData === 0) {
            return "No";
        }

        $submitterId = $workflowHistory[0]['approverEntity_RefID'] ?? 0;
        $nextApproverId = $workflowHistory ? $workflowHistory[count($workflowHistory) - 1]['nextApproverEntity_RefID'] : 0;

        if ($SessionWorkerCareerInternal_RefID === $nextApproverId && $SessionWorkerCareerInternal_RefID !== $submitterId) {
            return "YES";
        }

        if ($SessionWorkerCareerInternal_RefID === $submitterId && ($nextApproverId === 0 || !$nextApproverId)) {
            return "RESUBMIT";
        }

        return "NO";
    }

    private function determineDocumentStatus($workflowHistory)
    {
        if (empty($workflowHistory)) {
            return 2;
        }

        $nextApproverId = $workflowHistory[count($workflowHistory) - 1]['nextApproverEntity_RefID'] ?? 0;
        return $nextApproverId === 0 ? 1 : 0;
    }

    public function ShowDocument(Request $request)
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $businessDocumentNumber     = $request->input('businessDocumentNumber');
            $businessDocumentTypeName   = $request->input('businessDocumentType_Name');
            $transDetail_RefID          = $request->input('businessDocument_RefID');
            $sourceData                 = 0;

            // dd([
            //     'transDetail_RefID'          => $transDetail_RefID,
            //     'businessDocumentTypeName'   => $businessDocumentTypeName,
            //     'businessDocumentNumber'     => $businessDocumentNumber,
            // ]);

            if (!$businessDocumentNumber || !$businessDocumentTypeName || !$transDetail_RefID) {
                return redirect()->back()->with('error', 'Data Not Found');
            }

            $collection = $this->getDetailTransactionNumber([
                'businessDocumentTypeName'  => $businessDocumentTypeName,
                'transDetail_RefID'         => $transDetail_RefID
            ]);

            // dd($collection);

            if (count($collection['dataDetail']) === 0) {
                return redirect()->back()->with('error', 'Data Not Found');
            }

            $workflowHistory = $this->getWorkflowHistory($collection['businessDocumentRefID']);

            // dd($workflowHistory);

            if (count($workflowHistory) === 0) {
                return redirect()->back()->with('error', 'Data Not Found');
            }

            // dd($collection, $workflowHistory);

            $approverStatus     = $this->determineApproverStatus($workflowHistory, $sourceData);

            // dd($approverStatus);

            $documentStatus     = $this->determineDocumentStatus($workflowHistory);

            // dd($documentStatus);

            $formatData = DocumentTypeMapper::formatData($businessDocumentTypeName, $collection['dataDetail'][0]);

            // dd($formatData);

            $compactTransactionHistory = [];
            if (isset($formatData['dataHeader']['dateUpdate']) && $formatData['dataHeader']['dateUpdate'] ?? isset($formatData['dataHeader']['DateUpdate']) && $formatData['dataHeader']['DateUpdate']) {
                $responseGetTransactionHistory = $this->checkDocumentService->getTransactionHistory($transDetail_RefID);

                if ($responseGetTransactionHistory['metadata']['HTTPStatusCode'] !== 200) {
                    return redirect()->back()->with('error', 'Data Not Found');
                }

                $urlGetTransactionHistory = DocumentTypeMapper::getHistoryPage($businessDocumentTypeName);

                // dd($urlGetTransactionHistory);

                if (!$urlGetTransactionHistory) {
                    return redirect()->back()->with('NotFound', 'Page Not Found');
                }

                $collectionGetTransactionHistory = collect($responseGetTransactionHistory['data']['data'])->sort();

                $dataHeaderGetTransactionHistory = $collectionGetTransactionHistory->where('type', 'Header')->values()->all();

                $dataDetailGetTransactionHistory = $collectionGetTransactionHistory->where('type', 'Detail')
                    ->groupBy(fn ($item) => $item['content']['sys_PID'])
                    ->values()
                    ->all();
                
                $compactTransactionHistory = [
                    'dataHeaderTransactionHistory'      => $dataHeaderGetTransactionHistory,
                    'dataDetailGetTransactionHistory'   => $dataDetailGetTransactionHistory
                ];
            }

            // dd($compactTransactionHistory);

            $compact = [
                'varAPIWebToken'                => $varAPIWebToken,
                'sourceData'                    => $sourceData,
                'var'                           => 1,
                'transactionForm'               => $businessDocumentTypeName,
                'transactionNumber'             => $businessDocumentNumber,
                'transactionDetail_RefID'       => $transDetail_RefID,
                'dataWorkFlows'                 => $workflowHistory,
                'statusDocument'                => $documentStatus,
                'approverStatus'                => $approverStatus,
                'page'                          => 'Document Tracking',
                'dataDetails'                   => $collection['dataDetail'],
            ] + $formatData + $compactTransactionHistory;

            // dump($compact);

            return view('Documents.Transactions.IndexCheckDocument', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at ShowDocument: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ShowDocumentByID(Request $request)
    {
        try {
            $varAPIWebToken             = $request->session()->get('SessionLogin');
            $transDetail_RefID          = $request->input('formDocumentNumber_RefID');
            $businessDocumentTypeName   = $request->input('businessDocumentTypeName');
            $businessDocument_RefID     = $request->input('businessDocument_RefID');
            $sourceData                 = 0; // "NO"

            // dd([
            //     'transDetail_RefID' => $transDetail_RefID,
            //     'businessDocumentTypeName'=> $businessDocumentTypeName,
            //     'businessDocument_RefID' => $businessDocument_RefID,
            // ]);

            if (!$transDetail_RefID || !$businessDocumentTypeName || !$businessDocument_RefID) {
                return redirect()->back()->with('error', 'Data Not Found');
            }

            $collection = $this->getDetailTransactionNumber([
                'businessDocumentTypeName'  => $businessDocumentTypeName,
                'transDetail_RefID'         => $transDetail_RefID,
            ]);

            // dd($collection);

            if (count($collection['dataDetail']) === 0) {
                return redirect()->back()->with('error', 'Data Not Found');
            }

            $workflowHistory    = $this->getWorkflowHistory($collection['businessDocumentRefID']);

            // dd($collection, $workflowHistory);

            if (count($workflowHistory) === 0) {
                return redirect()->back()->with('error', 'Data Not Found');
            }

            $approverStatus     = $this->determineApproverStatus($workflowHistory, $sourceData);
            $documentStatus     = $this->determineDocumentStatus($workflowHistory);

            $formatData = DocumentTypeMapper::formatData($businessDocumentTypeName, $collection['dataDetail'][0]);

            $compactTransactionHistory = [];
            if (isset($formatData['dataHeader']['dateUpdate']) && $formatData['dataHeader']['dateUpdate']) {
                $responseGetTransactionHistory = $this->checkDocumentService->getTransactionHistory($transDetail_RefID);

                if ($responseGetTransactionHistory['metadata']['HTTPStatusCode'] !== 200) {
                    return redirect()->back()->with('error', 'Data Not Found');
                }

                $urlGetTransactionHistory = DocumentTypeMapper::getHistoryPage($businessDocumentTypeName);

                if (!$urlGetTransactionHistory) {
                    return redirect()->back()->with('NotFound', 'Page Not Found');
                }

                $collectionGetTransactionHistory = collect($responseGetTransactionHistory['data']['data'])->sort();

                $dataHeaderGetTransactionHistory = $collectionGetTransactionHistory->where('type', 'Header')->values()->all();

                $dataDetailGetTransactionHistory = $collectionGetTransactionHistory->where('type', 'Detail')
                    ->groupBy(fn ($item) => $item['content']['sys_PID'])
                    ->values()
                    ->all();
                
                $compactTransactionHistory = [
                    'dataHeaderTransactionHistory'      => $dataHeaderGetTransactionHistory,
                    'dataDetailGetTransactionHistory'   => $dataDetailGetTransactionHistory
                ];
            }

            $compact = [
                'varAPIWebToken'            => $varAPIWebToken,
                'var'                       => 1,
                'dataDetails'               => $collection['dataDetail'],
                'dataWorkFlows'             => $workflowHistory,
                'transactionDetail_RefID'   => $transDetail_RefID,
                'statusApprover'            => $approverStatus,
                'statusDocument'            => $documentStatus,
                'transactionForm'           => $businessDocumentTypeName,
                'page'                      => 'My Document'
            ] + $formatData + $compactTransactionHistory;

            // dd($compact);

            return view('Documents.Transactions.IndexCheckDetailDocument',$compact);
        } catch (\Throwable $th) {
            Log::error("Error at ShowDocumentByID: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ShowDocumentListData(Request $request)
    {
        $DocumentTypeID = $request->input('DocumentTypeID');
        $DocumentTypeName = $request->input('DocumentTypeName');

        switch ($DocumentTypeName) {
            case "Account Payable":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 211000000000026,
                                'sys_Text'  => 'AP/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 82750194,
                                'sys_Text'  => 'AP/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "DO From Internal Use":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'DOI/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'DOI/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "DO From Stock Movement":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'DOS/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'DOS/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "Loan Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'LN/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'LN/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "Loan Settlement Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'LNS/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'LNS/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "Modify Budget Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'MOB/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'MOB/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "Person Business Trip Settlement Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'BTStl/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'BTStl/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "Sallary Allocation Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'SA/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'SA/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            case "Sales Invoice Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 73810928,
                                'sys_Text'  => 'Inv/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 90381924,
                                'sys_Text'  => 'Inv/QDC/2025/000002',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                        ]
                    ]
                ];
                break;
            default:
                $varAPIWebToken = Session::get('SessionLogin');
                $varData = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'dataPickList.master.getBusinessDocumentFormLatestVersion',
                    'latest',
                    [
                        'parameter' => [
                            'businessDocumentType_RefID' => (int)$DocumentTypeID
                        ]
                    ],
                    false
                );
                break;
        }

        $compact = [
            "data" => $varData['data']['data'],
            "DocumentTypeName" => $DocumentTypeName
        ];

        return response()->json($compact);
    }

    public function LogTransaction(Request $request)
    {
        try {
            $id         = $request->input('id');
            $docNum     = $request->input('docNum');
            $docName    = $request->input('docName');
            $page       = $request->input('page');

            // dd($id, $docNum, $docName, $page);

            $response   = $this->checkDocumentService->getTransactionHistory($id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $url = DocumentTypeMapper::getHistoryPage($docName);

            if (!$url) {
                return redirect()->back()->with('NotFound', 'Page Not Found');
            }

            $collection = collect($response['data']['data'])->sort();

            $dataHeader = $collection->where('type', 'Header')->values()->all();

            $dataDetail = $collection->where('type', 'Detail')
                ->groupBy(fn ($item) => $item['content']['sys_PID'])
                ->values()
                ->all();

            $urlPage = $page == "Document Tracking" ? "CheckDocument.ShowDocument" : "CheckDocument.ShowDocumentByID";

            $compact = [
                'data'              => $response['data'],
                'documentNumber'    => $docNum,
                'documentName'      => $docName,
                'dataHeader'        => $dataHeader,
                'dataDetail'        => $dataDetail,
                'urlPage'           => $urlPage
            ];

            // dump($compact);

            return view($url, $compact);
        } catch (\Throwable $th) {
            Log::error("LogTransaction Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function export(Request $request) 
    {
        try {
            $printType          = $request->print_type;
            $transactionRefID   = $request->transaction_RefID;
            $transactionType    = $request->transactionType;

            if ($transactionType === "DELIVERY ORDER") {
                $response = $this->deliveryOrderService->getDetail($transactionRefID);
            } else {
                $response = $this->purchaseOrderService->getDetail($transactionRefID);
            }

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $dataDetail = $response['data']['data'] ?? $response['data'];

            // dd($dataDetail);

            $arrData = [];
            if ($transactionType === "DELIVERY ORDER") {
                $arrData = [
                    'viewPDF'       => 'Inventory.DeliveryOrder.Reports.ReportDODetail_pdf',
                    'filenamePDF'   => 'Delivery Order.pdf',
                ];
            } else {
                $arrData = [
                    'viewPDF'       => 'Purchase.PurchaseOrder.Reports.ReportPurchaseOrderDetail_pdf',
                    'filenamePDF'   => 'Purchase Order.pdf',
                ];
            }

            // dd($arrData);

            if ($printType == "PDF") {
                $pdf = PDF::loadView($arrData['viewPDF'], ['dataReport' => $dataDetail])->setPaper('a4', 'portrait');
                $pdf->output();
                $dom_pdf = $pdf->getDomPDF();

                $canvas = $dom_pdf ->get_canvas();
                $width  = $canvas->get_width();
                $height = $canvas->get_height();
                $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                return $pdf->download($arrData['filenamePDF']);
            } else {
                if ($transactionType === "PURCHASE ORDER") {
                    return Excel::download(new ExportReportPurchaseOrderDetail($dataDetail), 'Purchase Order.xlsx');
                }
            }
        } catch (\Throwable $th) {
            Log::error("Export Check Document Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}