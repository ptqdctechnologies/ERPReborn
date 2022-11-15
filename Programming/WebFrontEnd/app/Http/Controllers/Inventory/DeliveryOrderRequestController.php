<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class DeliveryOrderRequestController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("SessionDeliveryOrderRequest");
        
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
        ];
        
        return view('Inventory.DeliveryOrderRequest.Transactions.CreateDeliveryOrderRequest', $compact);

    }

    public function StoreValidateDeliveryOrderRequest(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionDeliveryOrderRequest");
        if($request->session()->has("SessionDeliveryOrderRequest")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionDeliveryOrderRequest", $val);
                $request->session()->push("SessionDeliveryOrderRequest", $val2);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionDeliveryOrderRequest", $val);
            $request->session()->push("SessionDeliveryOrderRequest", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateDeliveryOrderRequest2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionDeliveryOrderRequest");
        if($request->session()->has("SessionDeliveryOrderRequest")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    unset($data[$i]);
                    unset($data[$i+1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionDeliveryOrderRequest", $newClass);
                }
            }
        }
    }

    public function store(Request $request)
    {
        echo "d";die;
    }

    public function DeliveryOrderRequestListData(Request $request)
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
    
    public function DeliveryOrderRequestListDataByID(Request $request)
    {
        $advance_RefID = $request->input('var_recordID');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $advance_RefID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varDataAdvanceList);
        return response()->json($varDataAdvanceList['data']);
    }

    public function DeliveryOrderRequestByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
        $varAPIWebToken = $request->session()->get('SessionLogin');

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        // \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        // $varAPIWebToken, 
        // 'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail', 
        // 'latest', 
        // [
        // 'parameter' => [
        //     'purchaseRequisition_RefID' => 83000000000001
        //     ],
        // 'SQLStatement' => [
        //     'pick' => null,
        //     'sort' => null,
        //     'filter' => null,
        //     'paging' => null
        //     ]
        // ]
        // );
        // dd($varData);
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

    public function DeliveryOrderRequestByPrID(Request $request)
    {
        $pr_RefID = $request->input('pr_RefID');
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.finance.getAdvanceDetail',
        'latest',
        [
            'parameter' => [
                'advance_RefID' => (int) $pr_RefID,
            ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
            ]
        ]
        );
    
        $compact = [
            'varData' => $varData['data'],
        ];
        return response()->json($compact);
    }

    public function RevisionDeliveryOrderRequestIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionDeliveryOrderRequest");

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->searcDorNumberRevisionId,
            ]
        ]
        );
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'dataAdvancenumber' => $varDataAdvanceRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searcDorNumberRevisionId,
        ];

        
        return view('Inventory.DeliveryOrderRequest.Transactions.RevisionDeliveryOrderRequest', $compact);
    }

    public function DeliveryOrderRequestListCartRevision(Request $request)
    {
        $var_recordID = $request->input('var_recordID');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $var_recordID,
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
            $request->session()->push("SessionDeliveryOrderRequest", (string)$varDatas['combinedBudget_SubSectionLevel1_RefID']);
            $request->session()->push("SessionDeliveryOrderRequest", (string)$varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
}
