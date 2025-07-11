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

class CheckDocumentController extends Controller
{
    protected $checkDocumentService;

    public function __construct(CheckDocumentService $checkDocumentService)
    {
        $this->checkDocumentService = $checkDocumentService;
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
                $documentType === 'Loan Form' ||
                $documentType === 'Loan Settlement Form' ||
                $documentType === 'Modify Budget Form' ||
                $documentType === 'Person Business Trip Form' ||
                $documentType === 'Person Business Trip Settlement Form' || 
                $documentType === 'Reimbursement Form' || 
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
                return redirect()->back()->with('NotFound', value: 'Workflow History API Error.');
            }

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
            $documentStatus     = $this->determineDocumentStatus($workflowHistory);

            $formatData = DocumentTypeMapper::formatData($businessDocumentTypeName, $collection['dataDetail'][0]);

            // dd($formatData);

            $compact = [
                'varAPIWebToken'            => $varAPIWebToken,
                'sourceData'                => $sourceData,
                'var'                       => 1,
                'transactionForm'           => $businessDocumentTypeName,
                'transactionNumber'         => $businessDocumentNumber,
                'transactionDetail_RefID'   => $transDetail_RefID,
                'dataWorkFlows'             => $workflowHistory,
                'statusDocument'            => $documentStatus,
                'approverStatus'            => $approverStatus,
                'page'                      => 'Document Tracking',
                'dataDetails'               => $collection['dataDetail']
            ] + $formatData;

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
            $sourceData                 = "NO";

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

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'var'               => 1,
                'dataDetails'       => $collection['dataDetail'],
                'dataWorkFlows'     => $workflowHistory,
                'statusApprover'    => $approverStatus,
                'documentStatus'    => $documentStatus,
                'transactionForm'   => $businessDocumentTypeName,
                'page'              => 'My Document'
            ] + $formatData;

            // dump($compact);

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
            case "Reimbursement Form":
                $varData = [
                    'data' => [
                        'data' => [
                            [
                                'sys_ID'    => 12345678,
                                'sys_Text'  => 'REM/QDC/2025/000001',
                                'combinedBudgetCode' => 'Q000196',
                                'combinedBudgetSectionCode' => 'Q000062 ► 235'
                            ],
                            [
                                'sys_ID'    => 23456781,
                                'sys_Text'  => 'REM/QDC/2025/000002',
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

            $response   = $this->checkDocumentService->getTransactionHistory($id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            // dd($response);

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
}