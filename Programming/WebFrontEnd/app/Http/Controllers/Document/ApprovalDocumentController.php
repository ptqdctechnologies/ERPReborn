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

        $varAPIWebToken = Session::get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'userAction.documentWorkFlow.approvalStage.setUserApprovalAcceptation',
            'latest',
            [
                'entities' => [
                    "businessDocument_RefID" => (int) $businessDocument_ID,
                    "remarks" => "test",
                    "approverEntity_RefID" => (int) $SessionWorkerCareerInternal_RefID
                ]
            ]
        );
    }
}
