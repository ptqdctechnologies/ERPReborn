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

    public function StoreValidateDeliveryOrder2(Request $request)
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

    public function DeliveryOrderListDataDor(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceSettlement = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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

        return response()->json($varDataAdvanceSettlement['data']);
    }

    public function DeliveryOrderByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
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
            'filter' => '"CombinedBudget_RefID" = '.$projectcode.'',
            'paging' => null
            ]
        ]
        );
        
        $compact = [
            'DataAdvanceRequest' => $varDataAdvanceRequest['data'],
        ];
        return response()->json($compact);
    }

    public function RevisionDeliveryOrderIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionDeliveryOrder");

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->searcDoNumberRevisionId,
            ]
        ]
        );
        // dd($varDataAdvanceRevision);
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'dataAdvancenumber' => $varDataAdvanceRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searcDoNumberRevisionId,
        ];
        
        return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
    }

    public function update(Request $request, $id)
    {
        // $input = $request->all();
        // $count_product = count($input['var_product_id']);
        // $varAPIWebToken = $request->session()->get('SessionLogin');

        // $advanceDetail = [];
        // if ($count_product > 0 && isset($count_product)) {
        //     for($n =0; $n < $count_product; $n++){
        //         $advanceDetail[$n] = [
        //             'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
        //             'entities' => [
        //                 "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
        //                 "product_RefID" => (int) $input['var_product_id'][$n],
        //                 "quantity" => (float) $input['var_quantity'][$n],
        //                 "quantityUnit_RefID" => 73000000000001,
        //                 "productUnitPriceCurrency_RefID" => 62000000000001,
        //                 "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //                 "productUnitPriceCurrencyExchangeRate" => 1,
        //                 "remarks" => 'Catatan'
        //             ]
        //         ];
        //     }
        // }
        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.update.finance.setAdvance', 
        //     'latest', 
        //     [
        //         'recordID' => (int)$input['var_recordID'],
        //         'entities' => [
        //             "documentDateTimeTZ" => '2022-03-07',
        //             "log_FileUpload_Pointer_RefID" => 91000000000001,
        //             "requesterWorkerJobsPosition_RefID" => (int)$input['request_name_id'],
        //             "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
        //             "beneficiaryBankAccount_RefID" => 167000000000001,
        //             "internalNotes" => 'My Internal Notes',
        //             "remarks" => $input['var_remark'],
        //             "additionalData" => [
        //                 "itemList" => [
        //                     "items" => $advanceDetail
        //                     ]
        //                 ]
        //             ]
        //         ]                   
        // );
        // $compact = [
        //     "status"=>true,
        // ];

        return response()->json($compact); 
    }

    public function DeliveryOrderListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $do_RefID = $request->input('do_RefID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.finance.getAdvanceDetail', 
        'latest', 
        [
        'parameter' => [
            'advance_RefID' => (int) $do_RefID,
            ],
        'SQLStatement' => [
            'pick' => null,
            'sort' => null,
            'filter' => null,
            'paging' => null
            ]
        ]
        );
        // dd($varData);
        foreach($varData['data'] as $varDatas){
            $request->session()->push("SessionDeliveryOrder", (string)$varDatas['combinedBudget_SubSectionLevel1_RefID']);
            $request->session()->push("SessionDeliveryOrder", (string)$varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
}
