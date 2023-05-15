<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class BusinessTripSettlementController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripSettllement");
        $request->session()->forget("SessionBusinessTripSettllementRequester");
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 0,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 0,
        ];
        
        return view('Advance.BusinessTrip.Transactions.CreateBusinessTripSettlement', $compact);
    }

    public function StoreValidateBusinessTripSettlement(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionBusinessTripSettllement");
        if($request->session()->has("SessionBusinessTripSettllement")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionBusinessTripSettllement", $val);
                $request->session()->push("SessionBusinessTripSettllement", $val2);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionBusinessTripSettllement", $val);
            $request->session()->push("SessionBusinessTripSettllement", $val2);
        }

        return response()->json($status);
    }
    public function StoreValidateBusinessTripSettlement2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionBusinessTripSettllement");
        if($request->session()->has("SessionBusinessTripSettllement")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    unset($data[$i]);
                    unset($data[$i+1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionBusinessTripSettllement", $newClass);
                }
            }
        }
    }

    public function StoreValidateBusinessTripSettlementRequester(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $requester_id = $request->input('requester_id');
        $requester_name = $request->input('requester_name');
        $requester_id2 = $request->input('requester_id2');
        $advance_RefID = $request->input('advance_RefID');

        $data = $request->session()->get("SessionBusinessTripSettllementRequester");
        if ($request->session()->has("SessionBusinessTripSettllementRequester")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $advance_RefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                if ($requester_id != $requester_id2 && $requester_id2 != "") {
                    $status = 500;
                } else {

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

                    $request->session()->push("SessionBusinessTripSettllementRequester", $advance_RefID);
                }
            } else {
                $status = 501;
            }
        } else {

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

            $request->session()->push("SessionBusinessTripSettllementRequester", $advance_RefID);
        }
        // dd($varDataAdvanceList['data']);
        $compact = [
            'status' => $status,
            'requester_id' => $requester_id,
            'requester_name' => $requester_name,
            'DataAdvanceList' => $varDataAdvanceList['data'],
        ];

        return response()->json($compact);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
        $count_product = count($input['var_product_id']);

        $varAPIWebToken = $request->session()->get('SessionLogin');

        // $advanceDetail = [];
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
        //             "remarks" => 'test jumat'
        //         ]
        //     ];
        // }

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.create.finance.setAdvance', 
        //     'latest', 
        //     [
        //     'entities' => [
        //         "documentDateTimeTZ" => $input['var_date'],
        //         "log_FileUpload_Pointer_RefID" => 91000000000001,
        //         "requesterWorkerJobsPosition_RefID" => (int)$input['request_name_id'],
        //         "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
        //         "beneficiaryBankAccount_RefID" => 167000000000001,
        //         "internalNotes" => 'My Internal Notes',
        //         "remarks" => $input['var_remark'],
        //         "additionalData" => [
        //             "itemList" => [
        //                 "items" => $advanceDetail
        //                 ]
        //             ]
        //         ]
        //     ]                    
        //     );

        $compact = [
            "advnumber" => 'ASF-0000001',
        ];

        return response()->json($compact);
    }

    public function BusinessTripRequestByBudgetID(Request $request)
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

    public function BusinessTripSettlementListData(Request $request)
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

    public function BusinessTripSettlementListDataById(Request $request)
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

    public function BusinessTripSettlementListCartRevision(Request $request)
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
            $request->session()->push("SessionBusinessTripSettllement", (string)$varDatas['combinedBudget_SubSectionLevel1_RefID']);
            $request->session()->push("SessionBusinessTripSettllement", (string)$varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
    
    public function RevisionBusinessTripSettlementIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripSettllement");
        $request->session()->forget("SessionBusinessTripSettllementRequester");

        $varDataAdvanceSettlementRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getAdvance',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchBsfNumberRevisionId,
                ]
            ]
        );
        // dd($varDataAdvanceSettlementRevision);
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'log_FileUpload_Pointer_RefID' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['attachmentFiles']['main']['log_FileUpload_Pointer_RefID'],
            'dataRequester' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'trano' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchBsfNumberRevisionId,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
        ];

        return view('Advance.BusinessTrip.Transactions.RevisionBusinessTripSettlement', $compact);
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
        $count_product = count($input['var_product_id']);
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
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }
}