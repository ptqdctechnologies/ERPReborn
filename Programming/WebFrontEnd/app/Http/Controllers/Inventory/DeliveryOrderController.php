<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class DeliveryOrderController extends Controller
{
    
    public function index(Request $request)
    {
        $request->session()->forget("SessionDeliveryOrder");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
        ];
        
        return view('Inventory.DeliveryOrder.Transactions.CreateDeliveryOrder', $compact);
    }

    public function StoreValidateDeliveryOrderRequest(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionDeliveryOrder");
        if($request->session()->has("SessionDeliveryOrder")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionDeliveryOrder", $val);
                $request->session()->push("SessionDeliveryOrder", $val2);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionDeliveryOrder", $val);
            $request->session()->push("SessionDeliveryOrder", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateDeliveryOrderRequest2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionDeliveryOrder");
        if($request->session()->has("SessionDeliveryOrder")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    unset($data[$i]);
                    unset($data[$i+1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionDeliveryOrder", $newClass);
                }
            }
        }
    }

    public function store(Request $request)
    {
       
    }

    public function DeliveryOrderListData(Request $request)
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

    public function RevisionDeliveryOrder(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionDeliveryOrder");

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
            'dataAdvanceRequest' => $varDataAdvanceRequest['data']
        ];
        
        return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
    }
}
