<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\General\Helper_Encode;

class WorkflowService
{
    public function create($request): mixed
    {
        $token = Session::get('SessionLogin');

        $detailData = $request->input('workflow_detail_data');
        $data = json_decode($detailData, true);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.sysConfig.setAppObject_WorkFlow_TreeStyle',
            'latest',
            [
                'entities' => [
                    "JSONDataInitGraph" =>
                        Helper_Encode::getJSONEncode(
                            Helper_Environment::getUserSessionID_System(),
                            $data
                        ),
                    "remarks" => null
                ]
            ]
        );
    }

    public function submit($businessDocument_RefID, $workFlowPath_RefID, $remarks, $approverEntity_RefID): mixed
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $varWorkerCareerInternal = Session::get('SessionWorkerCareerInternal_RefID');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserSubmission',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID" => (int) $businessDocument_RefID,
                    "workFlowPath_RefID" => (int) $workFlowPath_RefID,
                    "remarks" => $remarks,
                    "approverEntity_RefID" => (int) $varWorkerCareerInternal
                ]
            ]
        );
    }

    public function resubmit($businessDocument_RefID, $comment, $approverEntity_RefID): mixed
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $varWorkerCareerInternal = Session::get('SessionWorkerCareerInternal_RefID');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserResubmission',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID" => (int) $businessDocument_RefID,
                    "remarks" => $comment,
                    "approverEntity_RefID" => (int) $varWorkerCareerInternal
                ]
            ]
        );
    }
}