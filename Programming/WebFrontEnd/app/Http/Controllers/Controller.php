<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SelectWorkFlow($varData, $approverEntity_RefID, $VarSelectWorkFlow)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        if (count(collect($VarSelectWorkFlow['data'])) > 1) {

            $compact = [
                "data" => $VarSelectWorkFlow['data'],
                "businessDocument_RefID" => $varData['data']['businessDocument']['businessDocument_RefID'],
                "documentNumber" => $varData['data']['businessDocument']['documentNumber'],
                "approverEntity_RefID" => $approverEntity_RefID,
                "message" => "SelectWorkFlow"
            ];

            return response()->json($compact);
        } else {

            $VarStoreWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.setUserSubmission',
                'latest',
                [
                    'entities' => [
                        "businessDocument_RefID" => (int)$varData['data']['businessDocument']['businessDocument_RefID'],
                        "workFlowPath_RefID" => (int)$VarSelectWorkFlow['data'][0]['sys_ID'],
                        "remarks" => null,
                        "approverEntity_RefID" => (int)$approverEntity_RefID,
                    ]
                ]
            );

            $compact = [
                "documentNumber" => $varData['data']['businessDocument']['documentNumber'],
            ];

            return response()->json($compact);
        }
    }

    public function StoreWorkFlow(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $workFlowPath_RefID = $request->workFlowPath_RefID;
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
        
        // dd($VarStoreWorkFlow);

        $compact = [
            "documentNumber" => $documentNumber,
        ];

        return response()->json($compact);
    }
}
