<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\DocumentTypeMapper;

class CheckDocumentController extends Controller
{
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
                $documentType === 'Person Business Trip Form' ||
                $documentType === 'Person Business Trip Settlement Form' || 
                $documentType === 'Reimbursement Form' || 
                $documentType === 'Sallary Allocation Form' || 
                $documentType === 'Timesheet Form' ||
                $documentType === 'Warehouse Inbound Order Form'
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
                'transactionForm'           => $businessDocumentTypeName,
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
        $id         = $request->input('id');
        $docNum     = $request->input('docNum');
        $docName    = $request->input('docName');

        $varAPIWebToken = Session::get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataWarehouse.read.dataList.log.getTransactionHistory',
            'latest',
            [
                'parameter' => [
                    'source_RefID' => (int) $id
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        dd($varData);

        $collection = collect($varData['data']);
        $collection = $collection->sort();

        // HEADER
        $header = $collection->where('type', 'Header');

        $dataHeader = [];
        foreach ($header as $headers) {
            $dataHeader[] = $headers;
        }

        //DETAIL
        $detail = $collection->where('type', 'Detail');
        $groupedByDetail = $detail->groupBy('source_RefPID');

        $dataDetail = [];
        foreach ($groupedByDetail as $groupedByDetails) {
            $dataDetail[] = $groupedByDetails;
        }

        // dd($dataDetail);

        $compact = [
            'data'              => $varData['data'],
            'documentNumber'    => $docNum,
            'documentName'      => $docName,
            'dataHeader'        => $dataHeader,
            'dataDetail'        => $dataDetail
        ];

        if ($docName == "Advance Form") {
            return view('Documents.Transactions.LogTransaction.LogTransactionAdvance', $compact);
        } else if ($docName == "Purchase Order Form") {
            return view('Documents.Transactions.LogTransaction.LogTransactionPurchaseOrder', $compact);
        }
    }
}