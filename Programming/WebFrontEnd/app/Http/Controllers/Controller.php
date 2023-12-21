<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SelectWorkFlow(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        $dataInput = $request->all();
        if (isset($dataInput['dataInput_Log_FileUpload_Pointer_RefID_Action'])) {
            unset($dataInput['dataInput_Log_FileUpload_Pointer_RefID_Action']);
        }

        $DocumentTypeID = $dataInput['DocumentTypeID'];

        Session::put('dataInput' . $DocumentTypeID, $dataInput);

        $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
            'latest',
            [
                'parameter' => [
                    'businessDocumentType_RefID' => (int)$DocumentTypeID,
                    'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                    'combinedBudget_RefID' => (int)$dataInput['var_combinedBudget_RefID']
                ]
            ]
        );

        if ($VarSelectWorkFlow['metadata']['HTTPStatusCode'] != "200" || count($VarSelectWorkFlow['data']) == 0) {

            $compact = [
                "message" => "WorkflowError"
            ];

            return response()->json($compact);
        } else {



            if (count(collect($VarSelectWorkFlow['data'])) > 1) {
                $message =  "MoreThanOne";
            } else {
                $message =  "OnlyOne";
            }

            $compact = [
                "data" => $VarSelectWorkFlow['data'],
                "workFlowPath_RefID" => $VarSelectWorkFlow['data'][0]['sys_ID'],
                "nextApprover_RefID" => $VarSelectWorkFlow['data'][0]['nextApprover_RefID'],
                "approverEntity_RefID" => $SessionWorkerCareerInternal_RefID,
                "documentTypeID" => $DocumentTypeID,
                "message" => $message
            ];

            return response()->json($compact);
        }
    }

    public function StoreWorkFlow($businessDocument_RefID, $workFlowPath_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $VarStoreWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserSubmission',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID" => (int)$businessDocument_RefID,
                    "workFlowPath_RefID" => (int)$workFlowPath_RefID,
                    "remarks" => $comment,
                    "approverEntity_RefID" => (int)$approverEntity_RefID
                ]
            ]
        );

        $compact = [
            "documentNumber" => $documentNumber,
        ];


        //RESET REDIS DATA LIST ADVANCE
        $this->FunctionResetRedisAdvance();

        //RESET REDIS SHOW DOCUMENT APPROVAL
        $this->FunctionResetRedisDocumentApproval($nextApprover_RefID);

        return response()->json($compact);
    }

    public function FunctionResetRedisAdvance()
    {

        Redis::del("DataListAdvance");
        Redis::del("DataListAdvanceDetailComplex");
        Redis::del("ReportAdvanceSummary");

        return true;
    }

    public function FunctionResetRedisDocumentApproval($nextApprover_RefID)
    {
        Redis::del("RedisGetMyDocument" . $nextApprover_RefID);
        Redis::del("ShowMyDocumentListData" . $nextApprover_RefID);

        return true;
    }

    public function CheckingWorkflow(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeID = $request->documentTypeID;
        $combinedBudget_RefID = $request->combinedBudget_RefID;
        
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
            'latest',
            [
                'parameter' => [
                    'businessDocumentType_RefID' => (int)$documentTypeID,
                    'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                    'combinedBudget_RefID' => (int)$combinedBudget_RefID
                ]
            ],
            false
        );

        return response()->json($VarSelectWorkFlow['metadata']['HTTPStatusCode']);
    }
}
