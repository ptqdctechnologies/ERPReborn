<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SelectWorkFlow(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

            $dataInput = $request->all();
            if (isset($dataInput['dataInput_Log_FileUpload_Pointer_RefID_Action'])) {
                unset($dataInput['dataInput_Log_FileUpload_Pointer_RefID_Action']);
            }
            $DocumentTypeID = $dataInput['DocumentTypeID'];
            $Sys_ID_Advance = 0;
            if (isset($dataInput['Sys_ID_Advance'])) {
                $Sys_ID_Advance = $dataInput['Sys_ID_Advance'];
                Session::put('dataInputUpdate' . $DocumentTypeID . $dataInput['Sys_ID_Advance'], $dataInput);
            } else {
                Session::put('dataInputStore' . $DocumentTypeID, $dataInput);
            }

            $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
                'latest',
                [
                    'parameter' => [
                        'businessDocumentType_RefID' => (int)$DocumentTypeID,
                        'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                        'combinedBudget_RefID' => (int) $dataInput['var_combinedBudget_RefID']
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
                    "Sys_ID_Advance" => $Sys_ID_Advance,
                    "message" => $message
                ];

                return response()->json($compact);
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function SubmitWorkflow($businessDocument_RefID, $workFlowPath_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $VarSubmitWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ResubmitWorkflow($businessDocument_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            $VarSubmitWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.setUserResubmission',
                'latest',
                [
                    'entities' => [
                        "businessDocument_RefID" => (int) $businessDocument_RefID,
                        "remarks" => $comment,
                        "approverEntity_RefID" => (int) $approverEntity_RefID
                    ]
                ]
            );

            $compact = [
                "documentNumber" => $documentNumber,
            ];


            //RESET REDIS DATA LIST ADVANCE
            $this->FunctionResetRedisAdvance();

            //RESET REDIS SHOW DOCUMENT APPROVAL
            $this->FunctionResetRedisDocumentApproval($approverEntity_RefID);
            $this->FunctionResetRedisDocumentApproval($nextApprover_RefID);

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function FunctionResetRedisAdvance()
    {
        try {
            Redis::del("DataListAdvance");
            Redis::del("DataListAdvanceDetailComplex");
            Redis::del("ReportAdvanceSummary");

            return true;
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function FunctionResetRedisDocumentApproval($nextApprover_RefID)
    {
        try {

            Redis::del("RedisGetMyDocument" . $nextApprover_RefID);
            Redis::del("ShowMyDocumentListData" . $nextApprover_RefID);

            return true;
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function CheckingWorkflow(Request $request)
    {
        try {
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
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
