<?php

namespace App\Http\Controllers\Admin\Workflow;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WorkflowController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvance");
        
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
        ];
        return view('Admin.Workflow.Transactions.CreateWorkflow', $compact);
    }

    public function WorkflowRoute(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvance");
        
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'start' => ['Aldi', 'Mul', 'Yadi', 'Utsman'],
            'intermediate' => ['Toni', 'Muhammad'],
            'end' => ['Deden', 'Agus']
        ];
        return view('Admin.Workflow.Transactions.CreateWorkflowRoute', $compact);
    }

    public function WorkflowRouteStore(Request $request)
    {
        $input = $request->all();
        dd($input);
        // for($n =0; $n < $count_product; $n++){
        //     $advanceDetail[$n] = [
        //     'entities' => [
        //             "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
        //             "product_RefID" => (int) $input['var_product_id'][$n],
        //             "quantity" => (float) $input['var_quantity'][$n],
        //             "quantityUnit_RefID" => 73000000000001,
        //             "productUnitPriceCurrency_RefID" => 62000000000001,
        //             "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //             "productUnitPriceCurrencyExchangeRate" => 1,
        //             "remarks" => 'Catatan'
        //         ]
        //     ];
        // }
        // dd($varData);

        // $compact = [
        //     "advnumber"=> $varData['data']['businessDocument']['documentNumber'],
        // ];

        // return response()->json($compact); 
    }

    public function StoreValidateAdvance(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionAdvance");
        if($request->session()->has("SessionAdvance")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionAdvance", $val);
                $request->session()->push("SessionAdvance", $val2);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionAdvance", $val);
            $request->session()->push("SessionAdvance", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateAdvance2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionAdvance");

        if($request->session()->has("SessionAdvance")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    unset($data[$i]);
                    unset($data[$i+1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionAdvance", $newClass);
                }
            }
        }
    }

    public function AdvanceListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

    public function RevisionAdvanceIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvance");

        $varDataAdvanceRevision = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->searchArfNumberRevisionId,
            ]
        ]
        );

        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'log_FileUpload_Pointer_RefID' => $varDataAdvanceRevision['data'][0]['document']['content']['attachmentFiles']['main']['log_FileUpload_Pointer_RefID'],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'var_recordID' => $request->searchArfNumberRevisionId,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 1,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 1,
        ];

        return view('Advance.Advance.Transactions.RevisionAdvanceRequest', $compact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
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
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.update.finance.setAdvance', 
            'latest', 
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => '2022-03-07',
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => (int)$input['request_name_id'],
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

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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
            $request->session()->push("SessionAdvance", (string)$varDatas['combinedBudget_SubSectionLevel1_RefID']);
            $request->session()->push("SessionAdvance", (string)$varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
    
}
