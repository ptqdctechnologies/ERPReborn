<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class CheckDocumentController extends Controller
{
    // FUNCTION INDEX 
    public function index()
    {
        $compact = [
            'var' => 0,
            'businessDocument_RefID' => "",
            'businessDocumentNumber' => "",
            'businessDocumentType_Name' => "",
            'sourceData' => 0,
            'submitter_ID' => 0,
            'statusDocument' => 0,
            'statusHeader' => "Yes",
        ];

        return view('Documents.Transactions.IndexCheckDocument', $compact);
    }

    public function FileAttachmentCheckDocument(Request $request)
    {
        //FILE ATTACHMENT 

        $businessDocumentForm_RefID = $request->input('businessDocumentForm_RefID');

        $varAPIWebToken = Session::get('SessionLogin');
        $fileAttachment =
            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataResume.master.getBusinessDocumentFormAndLinkageFileUpload',
                'latest',
                [
                    'parameter' => [
                        'businessDocumentForm_RefID' => (int) $businessDocumentForm_RefID
                    ]
                ],
                false
            );

        $data = [];
        if ($fileAttachment['metadata']['HTTPStatusCode'] == 200) {
            $data = $fileAttachment['data'][0]['entities']['itemList'][0]['entities']['itemList'][0]['entities']['itemList'];
        }
        $compact = [
            "status" => $fileAttachment['metadata']['HTTPStatusCode'],
            'data' => $data
        ];
        return response()->json($compact);
    }

    // GET ADVANCE DETAIL
    private function FetchAdvanceDetails($varAPIWebToken, $Document, $filterType)
    {
        Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetailComplex',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => $Document,
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

        $DataAdvanceDetailComplex = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DataListAdvanceDetailComplex"
            ),
            true
        );

        $collection = collect($DataAdvanceDetailComplex);
        if ($filterType == "ID") {
            $collection = $collection->where('Sys_ID_Advance', $Document);
        } else if ($filterType == "Number") {
            $collection = $collection->where('DocumentNumber', $Document);
        }

        return $collection->values()->toArray();
    }

    // GET DELIVERY ORDER DETAIL
    private function FetchDeliveryOrderDetails($varAPIWebToken, $Document, $filterType)
    {
        $DataDeliveryOrderDetail = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
            'latest',
            [
                'parameter' => [
                    'deliveryOrder_RefID' => (int) $Document
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        // dd($Document, $DataDeliveryOrderDetail);

        return $DataDeliveryOrderDetail['data'];
    }

    // GET WORKFLOW HISTORY
    private function FetchWorkflowHistory($varAPIWebToken, $businessDocumentRefID)
    {
        $workflowHistory = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.getApprovementHistoryList',
            'latest',
            [
                'parameter' => ['businessDocument_RefID' => $businessDocumentRefID]
            ],
            false
        );

        // dd($workflowHistory);

        return $workflowHistory['data'] ?? [];
    }

    // VALIDATE APPROVER STATUS
    private function DetermineApproverStatus($workflowHistory, $sourceData)
    {
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        if ($sourceData === 0) {
            return "No";
        }

        $submitterId = $workflowHistory[0]['approverEntity_RefID'] ?? 0;
        $nextApproverId = $workflowHistory ? $workflowHistory[count($workflowHistory) - 1]['nextApproverEntity_RefID'] : 0;

        if ($SessionWorkerCareerInternal_RefID === $nextApproverId && $SessionWorkerCareerInternal_RefID !== $submitterId) {
            return "Yes";
        }

        if ($SessionWorkerCareerInternal_RefID === $submitterId && $nextApproverId === 0) {
            return "Resubmit";
        }

        return "No";
    }

    // VALIDATE DOCUMENT STATUS
    private function DetermineDocumentStatus($workflowHistory)
    {
        if (empty($workflowHistory)) {
            return 2;
        }

        $nextApproverId = $workflowHistory[count($workflowHistory) - 1]['nextApproverEntity_RefID'] ?? 0;
        return $nextApproverId === 0 ? 1 : 0;
    }

    // MANIPULATE RESPONSE
    private function composeResponse($advanceDetails, $workflowHistory, $approverStatus, $documentStatus, $businessDocumentTypeName, $sourceData, $statusHeader)
    {
        $varAPIWebToken     = Session::get('SessionLogin');
        $firstDetail        = [];
        $businessDocument   = $workflowHistory[0];
        $businessDocument_RefID = '';
        $businessDocumentNumber = '';

        if ($businessDocumentTypeName === "Delivery Order Form") {
            $firstDetail = $advanceDetails;
            $businessDocument_RefID = $advanceDetails[0]['DeliveryOrder_ID'];
            $businessDocumentNumber = $advanceDetails[0]['DocumentNumber'];
        } else {
            $firstDetail = [$advanceDetails[0]];
            $businessDocument_RefID = $advanceDetails[0]['Sys_ID_Advance'];
            $businessDocumentNumber = $advanceDetails[0]['DocumentNumber'];
        }

        return [
            'varAPIWebToken'                => $varAPIWebToken,
            'dataHeader'                    => $firstDetail,
            'dataDetail'                    => $advanceDetails,
            'businessDocument_RefID'        => $businessDocument_RefID,
            'businessDocumentNumber'        => $businessDocumentNumber,
            'businessDocumentType_Name'     => $businessDocumentTypeName,
            'dataWorkFlows'                 => $workflowHistory,
            'statusApprover'                => $approverStatus,
            'businessDocument_ID'           => $firstDetail['BusinessDocument_RefID'] ?? $businessDocument['businessDocument_RefID'],
            'submitter_ID'                  => $workflowHistory[0]['approverEntity_RefID'] ?? 0,
            'Log_FileUpload_Pointer_RefID'  => $firstDetail['Log_FileUpload_Pointer_RefID'] ?? '',
            'sourceData'                    => $sourceData,
            'statusHeader'                  => $statusHeader,
            'status'                        => 'success',
            'var'                           => 1,
            'statusDocument'                => $documentStatus
        ];
    }

    // FUNCTION FOR SHOW DOCUMENT BY ID 
    public function GetAllDocumentType($varAPIWebToken, $Document, $filterType, $sourceData, $statusHeader, $businessDocumentTypeName)
    {
        try {
            if ($businessDocumentTypeName === "Delivery Order Form") {
                $collection = $this->FetchDeliveryOrderDetails($varAPIWebToken, $Document, $filterType);
            } else {
                $collection = $this->FetchAdvanceDetails($varAPIWebToken, $Document, $filterType);
            }

            if (empty($collection)) {
                return ['status' => 'error'];
            }

            $workflowData   = $this->FetchWorkflowHistory($varAPIWebToken, $collection[0]['BusinessDocument_RefID']);
            $approverStatus = $this->DetermineApproverStatus($workflowData, $sourceData);
            $documentStatus = $this->DetermineDocumentStatus($workflowData);

            return $this->composeResponse(
                $collection,
                $workflowData,
                $approverStatus,
                $documentStatus,
                $businessDocumentTypeName,
                $sourceData,
                $statusHeader
            );
        } catch (\Throwable $th) {
            $compact = [
                'status' => "error"
            ];

            return $compact;
        }
    }

    // FUNCTION FOR SHOW DOCUMENT FORM SUBMIT IN CHECK DOCUMENT 
    public function ShowDocument(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $businessDocumentNumber = $request->input('businessDocumentNumber');
        $businessDocument_RefID = $request->input('businessDocument_RefID');
        $businessDocumentType_Name = $request->input('businessDocumentType_Name');

        $sourceData = 0;
        $statusHeader = "Yes";
        if (isset($businessDocument_RefID) || isset($businessDocumentNumber)) {
            if (isset($businessDocument_RefID)) {
                // CALL FUNCTION SHOW DATA BY ID
                $filterType = "ID";
                $varDataWorkflow = $this->GetAllDocumentType($varAPIWebToken, $businessDocument_RefID, $filterType, $sourceData, $statusHeader, $businessDocumentType_Name);
            } else {
                // CALL FUNCTION SHOW DATA BY NUMBER
                $filterType = "Number";
                $varDataWorkflow = $this->GetAllDocumentType($varAPIWebToken, $businessDocumentNumber, $filterType, $sourceData, $statusHeader, null);
            }

            if ($varDataWorkflow['status'] == "success") {
                return view('Documents.Transactions.IndexCheckDocument', $varDataWorkflow);
            } else {
                return redirect()->route('CheckDocument.index')->with('NotFound', 'Data Not Found');
            }
        } else {
            return redirect()->route('CheckDocument.index')->with('NotFound', 'Data Cannot Empty');
        }
    }

    // FUNCTION FOR SHOW DOCUMENT BY ID FROM MY DOCUMENT PAGES
    public function GetAllDocumentTypeByID($varAPIWebToken, $formDocumentNumber_RefID, $businessDocument_RefID, $dataAPI)
    {
        try {
            $varAPIWebToken                     = Session::get('SessionLogin');
            $sessionID                          = Helper_Environment::getUserSessionID_System();
            $sessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
            $statusApprover                     = "NO";
            
            $cacheKey                           = "DataListDetail_{$formDocumentNumber_RefID}";
            $DataDetail                         = json_decode(Helper_Redis::getValue($sessionID, $cacheKey), true);

            if (!$DataDetail) {
                $varData = Helper_APICall::setCallAPIGateway(
                    $sessionID,
                    $varAPIWebToken,
                    $dataAPI['key'],
                    'latest',
                    [
                        'parameter' => $dataAPI['parameter'],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ],
                    false
                );

                if ($varData['metadata']['HTTPStatusCode'] === 200) {
                    Helper_Redis::setValue($sessionID, $cacheKey, json_encode($varData['data']), 300); // Cache 5 menit
                    $DataDetail = $varData['data'];
                } else {
                    return redirect()->back()->with('NotFound', 'Error');
                }
            }

            if (!$DataDetail) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            $businessDocumentRefID  = (int) $businessDocument_RefID;
            $cacheKeyWorkflow       = "WorkflowHistory_{$businessDocumentRefID}";
            $DataWorkflowHistory    = json_decode(Helper_Redis::getValue($sessionID, $cacheKeyWorkflow), true);

            if (!$DataWorkflowHistory) {
                $DataWorkflowHistory = Helper_APICall::setCallAPIGateway(
                    $sessionID,
                    $varAPIWebToken,
                    'userAction.documentWorkFlow.approvalStage.getApprovementHistoryList',
                    'latest',
                    [
                        'parameter' => [
                            'businessDocument_RefID' => $businessDocumentRefID
                        ]
                    ],
                    false
                );

                if (!empty($DataWorkflowHistory['data'])) {
                    Helper_Redis::setValue($sessionID, $cacheKeyWorkflow, json_encode($DataWorkflowHistory['data']), 300);
                    $DataWorkflowHistory = $DataWorkflowHistory['data'];
                } else {
                    $DataWorkflowHistory = [];
                }
            }

            if (!isset($DataWorkflowHistory[0])) {
                return [
                    'statusApprover'    => $statusApprover,
                    'dataHeader'        => $DataDetail,
                    'dataWorkFlows'     => []
                ];
            }

            $submitter_ID = $DataWorkflowHistory[0]['approverEntity_RefID'] ?? null;
            $nextApprover = end($DataWorkflowHistory);

            if ($sessionWorkerCareerInternal_RefID == ($nextApprover['nextApproverEntity_RefID'] ?? null) && $sessionWorkerCareerInternal_RefID != $submitter_ID) {
                $statusApprover = "YES";
            } else if ($sessionWorkerCareerInternal_RefID == $submitter_ID && ($nextApprover['nextApproverEntity_RefID'] ?? null) == 0) {
                $statusApprover = "RESUBMIT";
            } 

            return [
                'varAPIWebToken'            => $varAPIWebToken,
                'statusApprover'            => $statusApprover,
                'submitter_ID'              => $submitter_ID,
                'title'                     => $dataAPI['title'],
                'businessDocument_RefID'    => $businessDocumentRefID,
                'dataHeader'                => $DataDetail,
                'dataWorkFlows'             => $DataWorkflowHistory
            ];
        } catch (\Throwable $th) {
            Log::error("Error at GetAllDocumentTypeByID: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // FUNCTION FOR SHOW DOCUMENT BY CLICK DATA IN MY DOCUMENT 
    public function ShowDocumentByID(Request $request)
    {
        try {
            $varAPIWebToken             = $request->session()->get('SessionLogin');
            $formDocumentNumber_RefID   = (int) $request->input('formDocumentNumber_RefID'); // => 
            $businessDocumentTypeName   = $request->input('businessDocumentTypeName');
            $businessDocument_RefID   = $request->input('businessDocument_RefID');
            $API                        = ["key" => "", "parameter" => [], "title" => ""];

            if (!$formDocumentNumber_RefID) {
                return redirect()->back()->with('error', 'Invalid Document ID');
            }

            if ($businessDocumentTypeName === "Advance Form") {
                $API['key'] = "transaction.read.dataList.finance.getAdvanceDetail";
                $API['parameter'] = ['advance_RefID' => (int) $formDocumentNumber_RefID];
                $API['title'] = "ADVANCE FORM";
            } else if ($businessDocumentTypeName === "Delivery Order Form") {
                $API['key'] = "transaction.read.dataList.supplyChain.getDeliveryOrderDetail";
                $API['parameter'] = ['deliveryOrder_RefID' => (int) $formDocumentNumber_RefID];
                $API['title'] = "DELIVERY ORDER FORM";
            }

            $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $formDocumentNumber_RefID, $businessDocument_RefID, $API);

            if (!is_array($varDataWorkflow)) {
                return $varDataWorkflow; 
            }

            return view('Documents.Transactions.IndexCheckDetailDocument', $varDataWorkflow);
        } catch (\Throwable $th) {
            Log::error("Error at ShowDocumentByID: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // FUNCTION FOR SHOW LIST DATA BY DOCUMENT TYPE 
    public function ShowDocumentListData(Request $request)
    {
        $DocumentTypeID = $request->input('DocumentTypeID');
        $DocumentTypeName = $request->input('DocumentTypeName');

        if ($DocumentTypeID == 77000000000045) {
            $DocumentTypeID = 77000000000057;
        }

        // if (Redis::get("CheckDocumentTypeID" . $DocumentType) == null) {
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
        // }

        // $varData = json_decode(
        //     Helper_Redis::getValue(
        //         Helper_Environment::getUserSessionID_System(),
        //         "CheckDocumentTypeID" . $DocumentTypeID
        //     ),
        //     true
        // );

        $compact = [
            "data" => $varData['data'],
            "DocumentTypeName" => $DocumentTypeName
        ];

        return response()->json($compact);
    }

    //LOG TRANSACTION
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

        // dump($compact);

        if ($docName == "Advance Form") {
            return view('Documents.Transactions.LogTransaction.LogTransactionAdvance', $compact);
        } else if ($docName == "Purchase Order Form") {
            return view('Documents.Transactions.LogTransaction.LogTransactionPurchaseOrder', $compact);
        }
    }

    // [OLD] FUNCTION FOR SHOW DOCUMENT BY ID
    // public function GetAllDocumentType($varAPIWebToken, $Document, $filterType, $sourceData, $statusHeader, $businessDocumentType_Name)
    // {
    //     try {

    //         $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
    //         $varAPIWebToken = Session::get('SessionLogin');

    //         // if (Redis::get("DataListAdvanceDetailComplex") == null) {
    //         Helper_APICall::setCallAPIGateway(
    //             Helper_Environment::getUserSessionID_System(),
    //             $varAPIWebToken,
    //             'transaction.read.dataList.finance.getAdvanceDetailComplex',
    //             'latest',
    //             [
    //                 'parameter' => [
    //                     'advance_RefID' => $Document,
    //                 ],
    //                 'SQLStatement' => [
    //                     'pick' => null,
    //                     'sort' => null,
    //                     'filter' => null,
    //                     'paging' => null
    //                 ]
    //             ],
    //             false
    //         );
    //         // }

    //         $DataAdvanceDetailComplex = json_decode(
    //             Helper_Redis::getValue(
    //                 Helper_Environment::getUserSessionID_System(),
    //                 "DataListAdvanceDetailComplex"
    //             ),
    //             true
    //         );


    //         $collection = collect($DataAdvanceDetailComplex);
    //         if ($filterType == "ID") {
    //             $collection = $collection->where('Sys_ID_Advance', $Document);
    //         } else if ($filterType == "Number") {
    //             $collection = $collection->where('DocumentNumber', $Document);
    //         }

    //         $num = 0;
    //         $filteredArray = [];

    //         foreach ($collection as $collections) {
    //             $filteredArray[$num] = $collections;
    //             $num++;
    //         }

    //         $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
    //         $statusApprover = "No";
    //         $nextApprover = 0;
    //         $submitter_ID = 0;
    //         $businessDocument_ID = 0;
    //         $statusDocument = 0;
    //         $DataWorkflowHistory = [];

    //         if (count($filteredArray) != 0) {
    //             $businessDocument_ID = $filteredArray[0]['BusinessDocument_RefID'];


    //             // if (Redis::get("ApprovementHistoryList". $businessDocument_ID) == null) {
    //             // dd("d");
    //             $DataWorkflowHistory = Helper_APICall::setCallAPIGateway(
    //                 Helper_Environment::getUserSessionID_System(),
    //                 $varAPIWebToken,
    //                 'userAction.documentWorkFlow.approvalStage.getApprovementHistoryList',
    //                 'latest',
    //                 [
    //                     'parameter' => [
    //                         'businessDocument_RefID' => (int) $businessDocument_ID
    //                     ]
    //                 ],
    //                 false
    //             );
    //             // }


    //             // $DataWorkflowHistory = json_decode(
    //             //     Helper_Redis::getValue(
    //             //         Helper_Environment::getUserSessionID_System(),
    //             //         "ApprovementHistoryList" . $businessDocument_ID
    //             //     ),
    //             //     true
    //             // );

    //             $DataWorkflowHistory = $DataWorkflowHistory['data'];

    //             if (count($DataWorkflowHistory) > 0) {
    //                 $submitter_ID = $DataWorkflowHistory[0]['approverEntity_RefID'];
    //                 $nextApprover = $DataWorkflowHistory[count($DataWorkflowHistory) - 1]['nextApproverEntity_RefID'];
    //                 $cek = 0;
    //             } else {
    //                 $cek = 1;
    //             }

    //             if ($sourceData == 0) {
    //                 $statusApprover = "No";
    //             } else if ($SessionWorkerCareerInternal_RefID == $nextApprover && $SessionWorkerCareerInternal_RefID != $submitter_ID) {
    //                 $statusApprover = "Yes";
    //             } else if ($SessionWorkerCareerInternal_RefID == $submitter_ID && $nextApprover == 0) {
    //                 $statusApprover = "Resubmit";
    //             }

    //             if ($nextApprover == 0 && $cek == 0) {
    //                 $statusDocument = 1;
    //             } else if ($nextApprover == 0 && $cek == 1) {
    //                 $statusDocument = 2;
    //             }

    //             if (is_null($businessDocumentType_Name)) {
    //                 $businessDocumentType_Name = $filteredArray[0]['BusinessDocumentType_Name'];
    //             }
    //         }

    //         $compact = [
    //             'varAPIWebToken' => $varAPIWebToken,
    //             'dataHeader' => [$filteredArray[0]],
    //             'dataDetail' => $filteredArray,
    //             'businessDocument_RefID' => $filteredArray[0]['Sys_ID_Advance'],
    //             'businessDocumentNumber' => $filteredArray[0]['DocumentNumber'],
    //             'businessDocumentType_Name' => $businessDocumentType_Name,
    //             'dataWorkFlows' => $DataWorkflowHistory,
    //             'statusApprover' => $statusApprover,
    //             'businessDocument_ID' => $businessDocument_ID,
    //             'submitter_ID' => $submitter_ID,
    //             'Log_FileUpload_Pointer_RefID' => $filteredArray[0]['Log_FileUpload_Pointer_RefID'],
    //             'sourceData' => $sourceData,
    //             'statusHeader' => $statusHeader,
    //             'status' => "success",
    //             'var' => 1,
    //             'statusDocument' => $statusDocument
    //         ];

    //         return $compact;
    //     } catch (\Throwable $th) {
    //         // Log::error("Error at " . $th->getMessage());
    //         // return redirect()->route('CheckDocument.index')->with('NotFound', 'Process Error');

    //         $compact = [
    //             'status' => "error"
    //         ];

    //         return $compact;
    //     }
    // }
}