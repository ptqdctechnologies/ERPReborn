<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class ApprovalDocumentController extends Controller
{
    public function ApprovalAccepted(Request $request)
    {
        $businessDocument_ID = (int)$request->input('businessDocument_ID');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $remarks = $request->input('comment');


        $varAPIWebToken = Session::get('SessionLogin');
        $varDataApprovalAcceptation = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserApprovalAcceptation',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID" => (int) $businessDocument_ID,
                    "remarks" => $remarks,
                    "approverEntity_RefID" => (int) $SessionWorkerCareerInternal_RefID
                ]
            ]
        );

        $varDataNextApprover = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.getCurrentAndNextStage',
            'latest',
            [
                'parameter' => [
                    'businessDocument_RefID' => (int) $businessDocument_ID
                ]
            ]
        );
        $nextApprover = $varDataNextApprover['data'][0]['nextApproverEntity_RefID'];

        $compact = [
            "status" => $varDataApprovalAcceptation['metadata']['HTTPStatusCode'],
        ];

        //RESET REDIS SHOW DOCUMENT APPROVAL
        $this->FunctionResetRedisDocumentCurrentApproval($SessionWorkerCareerInternal_RefID);
        $this->FunctionResetRedisDocumentNextApproval($nextApprover);

        return response()->json($compact);
    }
}
