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

    public function SelectWorkFlow($varData, $approverEntity_RefID, $VarSelectWorkFlow)
    {

        if (count(collect($VarSelectWorkFlow['data'])) > 1) {
            $message =  "MoreThanOne";
        } else {
            $message =  "OnlyOne";
        }

        $compact = [
            "data" => $VarSelectWorkFlow['data'],
            "workFlowPath_RefID" => $VarSelectWorkFlow['data'][0]['sys_ID'],
            "nextApprover_RefID" => $VarSelectWorkFlow['data'][0]['nextApprover_RefID'],
            "businessDocument_RefID" => $varData['data']['businessDocument']['businessDocument_RefID'],
            "documentNumber" => $varData['data']['businessDocument']['documentNumber'],
            "approverEntity_RefID" => $approverEntity_RefID,
            "message" => $message
        ];

        return response()->json($compact);
    }

    public function StoreWorkFlow(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $workFlowPath_RefID = $request->workFlowPath_RefID;
        $nextApprover_RefID = $request->nextApprover_RefID;
        $businessDocument_RefID = $request->businessDocument_RefID;
        $documentNumber = $request->documentNumber;
        $approverEntity_RefID = $request->approverEntity_RefID;
        $comment = $request->comment;

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

}
