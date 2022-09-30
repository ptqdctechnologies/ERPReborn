<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class iSuppController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("SessioniSupp");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
        ];
        return view('Inventory.iSupp.Transactions.CreateiSupp', $compact);
    }

    public function StoreValidateiSupp(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('productiSuppDetail');
        $data = $request->session()->get("SessioniSupp");
        if ($request->session()->has("SessioniSupp")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessioniSupp", $val);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessioniSupp", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateiSupp2(Request $request)
    {
        $messages = $request->session()->get("SessioniSupp");
        $val = $request->input('productiSuppDetail');
        if (($key = array_search($val, $messages)) !== false) {
            unset($messages[$key]);
            $newClass = array_values($messages);
            $request->session()->put("SessioniSupp", $newClass);
        }
    }

    public function store(Request $request)
    {
    }

    public function ISuppListData(Request $request)
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

    public function RevisioniSupp(Request $request)
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
        
        return view('Inventory.iSupp.Transactions.RevisioniSupp', $compact);
    }
}
