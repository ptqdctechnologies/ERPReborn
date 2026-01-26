<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Illuminate\Support\Facades\Log;

class ApprovalDocumentController extends Controller
{
    public function ApprovalAccepted(Request $request)
    {
        try {
            $remarks                            = $request->input('comment');
            $varAPIWebToken                     = Session::get('SessionLogin');
            $varUserSessionID                   = Helper_Environment::getUserSessionID_System();
            $businessDocument_ID                = (int)$request->input('businessDocument_ID');
            $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');

            $varDataApprovalAcceptation = Helper_APICall::setCallAPIGateway(
                $varUserSessionID,
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.setUserApprovalAcceptation',
                'latest',
                [
                    'entities' => [
                        "businessDocument_RefID"    => (int) $businessDocument_ID,
                        "remarks"                   => $remarks,
                        "approverEntity_RefID"      => (int) $SessionWorkerCareerInternal_RefID
                    ]
                ]
            );

            $varDataNextApprover = Helper_APICall::setCallAPIGateway(
                $varUserSessionID,
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
        } catch (\Throwable $th) {
            Log::error("Error at ApprovalAccepted: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ApprovalRejected(Request $request)
    {
        try {
            $varAPIWebToken                     = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');

            $remarks                            = $request->input('comment');
            $submitter_ID                       = $request->input('submitter_ID');
            $businessDocument_ID                = (int) $request->input('businessDocument_ID');

            $varDataApprovalRejected = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.setUserApprovalRejection',
                'latest',
                [
                    'entities' => [
                        "businessDocument_RefID"    => (int) $businessDocument_ID,
                        "remarks"                   => $remarks,
                        "approverEntity_RefID"      => (int) $SessionWorkerCareerInternal_RefID
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
        } catch (\Throwable $th) {
            Log::error("Error at ApprovalRejected: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
        
    }
}
