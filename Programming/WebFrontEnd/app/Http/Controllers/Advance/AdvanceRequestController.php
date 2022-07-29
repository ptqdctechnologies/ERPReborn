<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class AdvanceRequestController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        
        $request->session()->forget("SessionAdvance");
        
        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        $varDataWorker = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
        
            // dd($varDataAdvanceRequest);
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'dataWorker' => $varDataWorker['data'],
            'dataAdvanceRequest' => $varDataAdvanceRequest['data'],
            'var' => $var,
        ];
        return view('Advance.Advance.Transactions.CreateAdvanceRequest', $compact);

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);

        $varAPIWebToken = $request->session()->get('SessionLogin');
        
        $advanceDetail = [];
        for($n =0; $n < $count_product; $n++){
            $advanceDetail[$n] = [
            'entities' => [
                    "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                    "product_RefID" => (int) $input['var_product_id'][$n],
                    "quantity" => (float) $input['var_quantity'][$n],
                    "quantityUnit_RefID" => 73000000000001,
                    "productUnitPriceCurrency_RefID" => 62000000000001,
                    "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                    "productUnitPriceCurrencyExchangeRate" => 1,
                    "remarks" => 'Catatan Detail'
                ]
            ];
        }

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.create.finance.setAdvance', 
            'latest', 
            [
            'entities' => [
                "documentDateTimeTZ" => '2022-03-07',
                "log_FileUpload_Pointer_RefID" => 91000000000001,
                "requesterWorkerJobsPosition_RefID" => (int)$input['var_request_name_id'],
                "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
                "beneficiaryBankAccount_RefID" => 167000000000001,
                "internalNotes" => 'My Internal Notes',
                "remarks" => $input['var_remark'],
                "additionalData" => [
                    "itemList" => [
                        "items" => $advanceDetail
                        ]
                    ]
                ]
            ]                    
            );

        $compact = [
            "advnumber"=> "ADV-testing-00111",
        ];

        return response()->json($compact); 
    }

    public function StoreValidateAdvance(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putProductId');
        $data = $request->session()->get("SessionAdvance");
        if($request->session()->has("SessionAdvance")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionAdvance", $val);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionAdvance", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateAdvance2(Request $request)
    {
        $messages = $request->session()->get("SessionAdvance");
        $val = $request->input('putProductId');
        if($request->session()->has("SessionAdvance")){
            if (($key = array_search($val, $messages)) !== false) {
                unset($messages[$key]);
                $newClass = array_values($messages);
                $request->session()->put("SessionAdvance", $newClass);
            }
        }
    }

    public function RevisionAdvanceIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvance");
        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        $varDataWorker = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'report.form.documentForm.finance.getAdvance', 
            'latest',
            [
            'parameter' => [
                'recordID' => (int) $request->searchArfNumberRevisionId,
                ]
            ]
            );
        // dd($varDataAdvanceRevision);
        // dd($varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester']);
        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'dataWorker' => $varDataWorker['data'],
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataAdvanceRequest' => $varDataAdvanceRequest['data'],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'dataJobPosition' => $varDataAdvanceRevision['data'],
            'var_recordID' => $request->searchArfNumberRevisionId,
        ];

        return view('Advance.Advance.Transactions.RevisionAdvanceRequest', $compact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $advanceDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for($n =0; $n < $count_product; $n++){
                $advanceDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => 'Catatan'
                    ]
                ];
            }
        }
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.update.finance.setAdvance', 
            'latest', 
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => '2022-03-07',
                    "log_FileUpload_Pointer_RefID" => 91000000000001,
                    "requesterWorkerJobsPosition_RefID" => (int)$input['var_request_name_id'],
                    "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
                    "beneficiaryBankAccount_RefID" => 167000000000001,
                    "internalNotes" => 'My Internal Notes',
                    "remarks" => $input['var_remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $advanceDetail
                            ]
                        ]
                    ]
                ]                   
        );
        $compact = [
            "status"=>true,
        ];

        return response()->json($compact); 
    }
    public function AdvanceListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $advance_RefID = $request->input('advance_RefID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
        // dd($varData);

        foreach($varData['data'] as $varDatas){
            $request->session()->push("SessionAdvance", (string) $varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
    
}
