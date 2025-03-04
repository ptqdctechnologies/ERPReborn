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

    // FUNCTION FOR SHOW DOCUMENT BY ID 
    public function GetAllDocumentType($varAPIWebToken, $Document, $filterType, $sourceData, $statusHeader, $businessDocumentType_Name)
    {
        try {

            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
            $varAPIWebToken = Session::get('SessionLogin');

            // if (Redis::get("DataListAdvanceDetailComplex") == null) {
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
            // }

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

            $num = 0;
            $filteredArray = [];

            foreach ($collection as $collections) {
                $filteredArray[$num] = $collections;
                $num++;
            }

            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
            $statusApprover = "No";
            $nextApprover = 0;
            $submitter_ID = 0;
            $businessDocument_ID = 0;
            $statusDocument = 0;
            $DataWorkflowHistory = [];

            if (count($filteredArray) != 0) {
                $businessDocument_ID = $filteredArray[0]['BusinessDocument_RefID'];


                // if (Redis::get("ApprovementHistoryList". $businessDocument_ID) == null) {
                // dd("d");
                $DataWorkflowHistory = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'userAction.documentWorkFlow.approvalStage.getApprovementHistoryList',
                    'latest',
                    [
                        'parameter' => [
                            'businessDocument_RefID' => (int) $businessDocument_ID
                        ]
                    ],
                    false
                );
                // }


                // $DataWorkflowHistory = json_decode(
                //     Helper_Redis::getValue(
                //         Helper_Environment::getUserSessionID_System(),
                //         "ApprovementHistoryList" . $businessDocument_ID
                //     ),
                //     true
                // );

                $DataWorkflowHistory = $DataWorkflowHistory['data'];

                if (count($DataWorkflowHistory) > 0) {
                    $submitter_ID = $DataWorkflowHistory[0]['approverEntity_RefID'];
                    $nextApprover = $DataWorkflowHistory[count($DataWorkflowHistory) - 1]['nextApproverEntity_RefID'];
                    $cek = 0;
                } else {
                    $cek = 1;
                }

                if ($sourceData == 0) {
                    $statusApprover = "No";
                } else if ($SessionWorkerCareerInternal_RefID == $nextApprover && $SessionWorkerCareerInternal_RefID != $submitter_ID) {
                    $statusApprover = "Yes";
                } else if ($SessionWorkerCareerInternal_RefID == $submitter_ID && $nextApprover == 0) {
                    $statusApprover = "Resubmit";
                }

                if ($nextApprover == 0 && $cek == 0) {
                    $statusDocument = 1;
                } else if ($nextApprover == 0 && $cek == 1) {
                    $statusDocument = 2;
                }

                if (is_null($businessDocumentType_Name)) {
                    $businessDocumentType_Name = $filteredArray[0]['BusinessDocumentType_Name'];
                }
            }

            $compact = [
                'dataHeader' => $filteredArray[0],
                'dataDetail' => $filteredArray,
                'businessDocument_RefID' => $filteredArray[0]['Sys_ID_Advance'],
                'businessDocumentNumber' => $filteredArray[0]['DocumentNumber'],
                'businessDocumentType_Name' => $businessDocumentType_Name,
                'DataWorkflowHistory' => $DataWorkflowHistory,
                'statusApprover' => $statusApprover,
                'businessDocument_ID' => $businessDocument_ID,
                'submitter_ID' => $submitter_ID,
                'Log_FileUpload_Pointer_RefID' => $filteredArray[0]['Log_FileUpload_Pointer_RefID'],
                'sourceData' => $sourceData,
                'statusHeader' => $statusHeader,
                'status' => "success",
                'var' => 1,
                'statusDocument' => $statusDocument
            ];

            return $compact;
        } catch (\Throwable $th) {
            // Log::error("Error at " . $th->getMessage());
            // return redirect()->route('CheckDocument.index')->with('NotFound', 'Process Error');

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
                // // CALL FUNCTION SHOW DATA BY NUMBER
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
    public function GetAllDocumentTypeByID($varAPIWebToken, $formDocumentNumber_RefID)
    {
        try {
            $varAPIWebToken                     = Session::get('SessionLogin');
            $sessionID                          = Helper_Environment::getUserSessionID_System();
            $sessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
            $statusApprover                     = "NO";
            $title                              = '-';
            
            $cacheKey                           = "DataListAdvanceDetailComplex_{$formDocumentNumber_RefID}";
            $DataAdvanceDetailComplex           = json_decode(Helper_Redis::getValue($sessionID, $cacheKey), true);
            
            if (!$DataAdvanceDetailComplex) {
                Helper_APICall::setCallAPIGateway(
                    $sessionID,
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvanceDetailComplex',
                    'latest',
                    [
                        'parameter' => [
                            'advance_RefID' => $formDocumentNumber_RefID,
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
                
                $DataAdvanceDetailComplex = json_decode(Helper_Redis::getValue($sessionID, "DataListAdvanceDetailComplex"), true);
                
                if ($DataAdvanceDetailComplex) {
                    Helper_Redis::setValue($sessionID, $cacheKey, json_encode($DataAdvanceDetailComplex), 300); // Cache 5 menit
                }
            }

            if (!$DataAdvanceDetailComplex || empty($DataAdvanceDetailComplex[0]['BusinessDocument_RefID'])) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            $businessDocumentRefID  = (int) $DataAdvanceDetailComplex[0]['BusinessDocument_RefID'];
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
                    'dataHeader'        => $DataAdvanceDetailComplex,
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

            if ($DataAdvanceDetailComplex[0]['BusinessDocumentType_Name'] === "Advance Form") {
                $title = "ADVANCE FORM";
            }

            return [
                'varAPIWebToken'            => $varAPIWebToken,
                'statusApprover'            => $statusApprover,
                'submitter_ID'              => $submitter_ID,
                'title'                     => $title,
                'businessDocument_RefID'    => $DataAdvanceDetailComplex[0]['BusinessDocument_RefID'],
                'dataHeader'                => $DataAdvanceDetailComplex,
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
            $formDocumentNumber_RefID   = (int) $request->input('businessDocument_RefID'); // => formDocumentNumber_RefID
            $businessDocumentTypeName   = $request->input('businessDocumentTypeName');

            if (!$formDocumentNumber_RefID) {
                return redirect()->back()->with('error', 'Invalid Document ID');
            }

            $varDataWorkflow = $this->GetAllDocumentTypeByID($varAPIWebToken, $formDocumentNumber_RefID);

            // dump($varDataWorkflow); 

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
        Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.resume.master.getBusinessDocumentFilterByDocumentTypeID',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$DocumentTypeID
                ]
            ],
            false
        );
        // }

        $varData = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "CheckDocumentTypeID" . $DocumentTypeID
            ),
            true
        );

        $compact = [
            "data" => $varData,
            "DocumentTypeName" => $DocumentTypeName
        ];

        return response()->json($compact);
    }

    //LOG TRANSACTION
    public function LogTransaction(Request $request)
    {
        $id = $request->input('id');
        $docNum = $request->input('docNum');
        $docName = $request->input('docName');

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
            'data' => $varData['data'],
            'documentNumber' => $docNum,
            'documentName' => $docName,
            'dataHeader' => $dataHeader,
            'dataDetail' => $dataDetail
        ];

        if ($docName == "Advance Form") {
            return view('Documents.Transactions.LogTransaction.LogTransactionAdvance', $compact);
        } else if ($docName == "Purchase Order Form") {
            return view('Documents.Transactions.LogTransaction.LogTransactionPurchaseOrder', $compact);
        }
    }
}