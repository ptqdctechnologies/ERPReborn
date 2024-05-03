<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class CheckDocumentController extends Controller
{
    // FUNCTION INDEX 
    public function index()
    {
        $compact = [
            'var' => 0,
            'businessDocument_RefID' => "",
            'businessDocumentNumber' => "",
            'sourceData' => 0,
            'submitter_ID' => 0,
            'statusDocument' => 0,
            'statusHeader' => "Yes",

        ];

        return view('Documents.Transactions.IndexCheckDocument', $compact);
    }

    public function FileAttachmentCheckDocument(Request $request){
        //FILE ATTACHMENT 

        $businessDocumentForm_RefID = $request->input('businessDocumentForm_RefID');

        $varAPIWebToken = Session::get('SessionLogin');
        $fileAttachment = 
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                    'transaction.read.dataResume.master.getBusinessDocumentFormAndLinkageFileUpload', 
                    'latest', 
                    [
                    'parameter' => [
                        'businessDocumentForm_RefID' => (int) $businessDocumentForm_RefID
                        ]
                    ]
            );

        return response()->json($fileAttachment['data'][0]['entities']['itemList'][0]['entities']['itemList'][0]['entities']['itemList']);
    }

    // FUNCTION FOR SHOW DOCUMENT BY ID 
    public function GetAllDocumentType($varAPIWebToken, $Document, $filterType, $sourceData, $statusHeader)
    {
        try {

            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
            $varAPIWebToken = Session::get('SessionLogin');

            // if (Redis::get("DataListAdvanceDetailComplex") == null) {
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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


                if (Redis::get("ApprovementHistoryList". $businessDocument_ID) == null) {
                    // dd("d");
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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
                }
    
                $DataWorkflowHistory = json_decode(
                    \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        "ApprovementHistoryList" . $businessDocument_ID
                    ),
                    true
                );

                // dd($DataWorkflowHistory);

                if (count($DataWorkflowHistory) > 0) {
                    $submitter_ID = $DataWorkflowHistory[0]['ApproverEntity_RefID'];
                    $nextApprover = $DataWorkflowHistory[count($DataWorkflowHistory) - 1]['NextApproverEntity_RefID'];
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
            }

            $compact = [
                'dataHeader' => $filteredArray[0],
                'dataDetail' => $filteredArray,
                'businessDocument_RefID' => $filteredArray[0]['Sys_ID_Advance'],
                'businessDocumentNumber' => $filteredArray[0]['DocumentNumber'],
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
        $sourceData = 0;
        $statusHeader = "Yes";
        if (isset($businessDocument_RefID) || isset($businessDocumentNumber)) {
            if (isset($businessDocument_RefID)) {

                // CALL FUNCTION SHOW DATA BY ID
                $filterType = "ID";
                $varDataWorkflow = $this->GetAllDocumentType($varAPIWebToken, $businessDocument_RefID, $filterType, $sourceData, $statusHeader);
            } else {
                // // CALL FUNCTION SHOW DATA BY NUMBER
                $filterType = "Number";
                $varDataWorkflow = $this->GetAllDocumentType($varAPIWebToken, $businessDocumentNumber, $filterType, $sourceData, $statusHeader);
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

    // FUNCTION FOR SHOW DOCUMENT BY CLICK DATA IN MY DOCUMENT 
    public function ShowDocumentByID(Request $request)
    {
        try {
            $businessDocument_RefID = (int) $request->input('businessDocument_RefID');

            $varAPIWebToken = $request->session()->get('SessionLogin');

            $filterType = "ID";
            $sourceData = 1;
            $statusHeader = "No";
            // CALL FUNCTION SHOW DATA BY ID
            $varDataWorkflow = $this->GetAllDocumentType($varAPIWebToken, $businessDocument_RefID, $filterType, $sourceData, $statusHeader);
            
            if ($varDataWorkflow['status'] == "success") {
                return view('Documents.Transactions.IndexCheckDocument', $varDataWorkflow);
            } else {
                return redirect()->route('MyDocument.index')->with('NotFound', 'Data Not Found');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // FUNCTION FOR SHOW LIST DATA BY DOCUMENT TYPE 
    public function ShowDocumentListData(Request $request)
    {
        $DocumentType = $request->input('DocumentType');

        // if (Redis::get("CheckDocumentTypeID" . $DocumentType) == null) {
        $varAPIWebToken = Session::get('SessionLogin');
        \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.resume.master.getBusinessDocumentFilterByDocumentTypeID',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$DocumentType
                ]
            ],
            false
        );
        // }


        $varData = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "CheckDocumentTypeID" . $DocumentType
            ),
            true
        );

        return response()->json($varData);
    }
}
