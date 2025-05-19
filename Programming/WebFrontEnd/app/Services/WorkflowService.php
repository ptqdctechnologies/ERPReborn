<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WorkflowService
{
    public function submit($businessDocument_RefID, $workFlowPath_RefID, $remarks, $approverEntity_RefID)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserSubmission',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID"    => (int) $businessDocument_RefID,
                    "workFlowPath_RefID"        => (int) $workFlowPath_RefID,
                    "remarks"                   => $remarks,
                    "approverEntity_RefID"      => (int) $approverEntity_RefID
                ]
            ]
        );
    }
}