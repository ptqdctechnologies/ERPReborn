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
            ],
            false
        );

        $nextApprover = 0;
        $status = $varDataApprovalAcceptation['metadata']['HTTPStatusCode'];

        if($varDataNextApprover['metadata']['HTTPStatusCode'] == 200){
            $nextApprover = $varDataNextApprover['data'][0]['nextApproverEntity_RefID'];
            if ($nextApprover == 0) {
                $status = "Final";
            }
        }
        
        $compact = [
            "status" => $status
        ];

        //RESET REDIS SHOW DOCUMENT APPROVAL
        $this->FunctionResetRedisDocumentApproval($SessionWorkerCareerInternal_RefID, $businessDocument_ID);
        $this->FunctionResetRedisDocumentApproval($nextApprover, $businessDocument_ID);

        return response()->json($compact);
    }

    public function ApprovalRejected(Request $request)
    {
        $businessDocument_ID = (int)$request->input('businessDocument_ID');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $remarks = $request->input('comment');
        $submitter_ID = $request->input('submitter_ID');
        $varAPIWebToken = Session::get('SessionLogin');

        $varDataApprovalRejected = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserApprovalRejection',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID" => (int) $businessDocument_ID,
                    "remarks" => $remarks,
                    "approverEntity_RefID" => (int) $SessionWorkerCareerInternal_RefID
                ]
            ]
        );

        $compact = [
            "status" => $varDataApprovalRejected['metadata']['HTTPStatusCode'],
        ];

        //RESET REDIS SHOW DOCUMENT APPROVAL
        $this->FunctionResetRedisDocumentApproval($SessionWorkerCareerInternal_RefID, $businessDocument_ID);
        $this->FunctionResetRedisDocumentApproval($submitter_ID, $businessDocument_ID);

        return response()->json($compact);
    }
}
