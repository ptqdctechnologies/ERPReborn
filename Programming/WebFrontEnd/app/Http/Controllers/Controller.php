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

    public function SelectWorkFlow($input, $varData)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID', 
            'latest',
            [
            'parameter' => [
                'businessDocumentType_RefID' => (int)$varData['data']['businessDocument']['businessDocumentType_RefID'],
                'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                'combinedBudget_RefID' => (int)$input['var_combinedBudget_RefID'],
                ]
            ]
            );
        // if(count(collect($VarSelectWorkFlow['data'])) > 1){
        if(count(collect($VarSelectWorkFlow['data'])) == 1){

            $compact = [
                "data"=> $VarSelectWorkFlow['data'],
                "input" => $input,
                "varData" => $varData,
                "VarSelectWorkFlow" => $VarSelectWorkFlow,
                "message" => "SelectWorkFlow"
            ];
    
            return response()->json($compact); 

        }
        else{
            
            $varAPIWebToken = Session::get('SessionLogin');
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
                "approverEntity_RefID" => (int)$input['request_name_id'],
                ]
            ]
            );
            
            $compact = [
                "advnumber"=> $varData['data']['businessDocument']['documentNumber'],
            ];

            return response()->json($compact); 
            
        }

    }

    public function StoreWorkFlow(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $sys_ID = $request->sys_ID;
        $input = $request->input;
        $varData = $request->varData;
        $VarSelectWorkFlow = $request->VarSelectWorkFlow;
        
        // dd($VarSelectWorkFlow);

        $varAPIWebToken = Session::get('SessionLogin');
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
            "approverEntity_RefID" => (int)$input['request_name_id'],
            ]
        ]
        );
        
        $compact = [
            "advnumber"=> $varData['data']['businessDocument']['documentNumber'],
        ];

        return response()->json($compact); 
        
    }

}
