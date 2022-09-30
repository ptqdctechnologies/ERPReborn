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

    public function StoreValidateDeliveryOrder(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('productIdDorDetail');
        $data = $request->session()->get("SessionDeliveryOrder");
        if($request->session()->has("SessionDeliveryOrder")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionDeliveryOrder", $val);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionDeliveryOrder", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateDeliveryOrder2(Request $request)
    {
        $messages = $request->session()->get("SessionDeliveryOrder");
        $val = $request->input('productIdDorDetail');
        if (($key = array_search($val, $messages)) !== false) {
            unset($messages[$key]);
            $newClass = array_values($messages);
            $request->session()->put("SessionDeliveryOrder", $newClass);
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
