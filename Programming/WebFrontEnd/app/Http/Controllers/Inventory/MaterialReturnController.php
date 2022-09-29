<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class MaterialReturnController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $request->session()->forget("SessionMaterialReturn");

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        // dd($varData);

        $varData2 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getWorker', 
            'latest', 
            [
            'parameter' => null,
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
        );

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'data2' => $varData2['data'],
            'var' => $var,
        ];

        return view('Inventory.MaterialReturn.Transactions.CreateMaterialReturn', $compact);
    }
    
    public function StoreValidateiMaterialReturn(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('ProductId');
        $data = $request->session()->get("SessionMaterialReturn");
        if($request->session()->has("SessionMaterialReturn")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionMaterialReturn", $val);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionMaterialReturn", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateiMaterialReturn2(Request $request)
    {
        $messages = $request->session()->get("SessionMaterialReturn");
        $val = $request->input('ProductId');
        if($request->session()->has("SessionMaterialReturn")){
            if (($key = array_search($val, $messages)) !== false) {
                unset($messages[$key]);
                $newClass = array_values($messages);
                $request->session()->put("SessionMaterialReturn", $newClass);
            }
        }
    }

    public function MaterialReturnListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.finance.getAdvance', 
            'latest', 
            [
            'parameter' => null,
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );
            
        return response()->json($varDataAdvanceRequest['data']);
    }

    public function RevisionMaterialReturn(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionDeliveryOrder");

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        $varDataAdvanceRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.finance.getAdvance', 
            'latest', 
            [
            'parameter' => null,
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );

        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'dataAdvanceRequest' => $varDataAdvanceRequest['data']
        ];
        
        return view('Inventory.MaterialReturn.Transactions.RevisionMaterialReturn', $compact);
    }
}
