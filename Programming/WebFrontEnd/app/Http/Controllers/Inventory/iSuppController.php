<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class iSuppController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessioniSupp");

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'dataProject' => $varDataProject['data']['data'],
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
        // $input = $request->all();
        // $count_product = count($input['var_product_id']);

        // $varAPIWebToken = $request->session()->get('SessionLogin');

        // $advanceDetail = [];
        // for ($n = 0; $n < $count_product; $n++) {
        //     $advanceDetail[$n] = [
        //         'entities' => [
        //             "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
        //             "product_RefID" => (int) $input['var_product_id'][$n],
        //             "quantity" => (float) $input['var_quantity'][$n],
        //             "quantityUnit_RefID" => 73000000000001,
        //             "productUnitPriceCurrency_RefID" => 62000000000001,
        //             "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //             "productUnitPriceCurrencyExchangeRate" => 1,
        //             "remarks" => 'Catatan Detail'
        //         ]
        //     ];
        // }

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken,
        //     'transaction.create.finance.setAdvance',
        //     'latest',
        //     [
        //         'entities' => [
        //             "documentDateTimeTZ" => $input['var_date'],
        //             "log_FileUpload_Pointer_RefID" => 91000000000001,
        //             "requesterWorkerJobsPosition_RefID" => (int)$input['var_request_name_id'],
        //             "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
        //             "beneficiaryBankAccount_RefID" => 167000000000001,
        //             "internalNotes" => 'My Internal Notes',
        //             "remarks" => $input['var_remark'],
        //             "additionalData" => [
        //                 "itemList" => [
        //                     "items" => $advanceDetail
        //                 ]
        //             ]
        //         ]
        //     ]
        // );

        $compact = [
            "advnumber" => "ADV-testing-00111",
        ];

        return response()->json($compact);
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
        
        return view('Inventory.iSupp.Transactions.RevisioniSupp', $compact);
    }
}
