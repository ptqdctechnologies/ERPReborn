<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AdvanceSettlementController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        Session::forget("SessionAdvanceSetllementRequester");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];

        return view('Advance.Advance.Transactions.CreateAdvanceSettlement', $compact);
    }

    public function store(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $input = $request->all();
        dd($input);
        // $GetBusinessDoc = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken,
        //     'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName',
        //     'latest',
        //     [
        //         'parameter' => [
        //             'name' => 'Advance Form'
        //         ]
        //     ]
        // ); 

        // $VarSelectWorkFlow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken,
        //     'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
        //     'latest',
        //     [
        //         'parameter' => [
        //             'businessDocumentType_RefID' => (int)$GetBusinessDoc['data']['businessDocumentType_RefID'],
        //             'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
        //             'combinedBudget_RefID' => (int)$input['var_combinedBudget_RefID']
        //         ]
        //     ]
        // );


        // if ($VarSelectWorkFlow['metadata']['HTTPStatusCode'] != "200" || count($VarSelectWorkFlow['data']) == 0) {

        //     $compact = [
        //         "message" => "WorkflowError"
        //     ];

        //     return response()->json($compact);
        // } else {

        $count_product = count($input['var_product_id']);
        $advanceDetail = [];
        for ($n = 0; $n < $count_product; $n++) {
            $advanceDetail[$n] = [
                'entities' => [
                    "advancePaymentDetail_RefID" => 195000000000001,
                    "product_RefID" => (int) $input['var_product_id'][$n],
                    "quantity" => (float) $input['var_quantity'][$n],
                    "quantityUnit_RefID" => (int) $input['var_qty_id'][$n],
                    "expenseClaimProductUnitPriceCurrency_RefID" => 62000000000001,
                    "expenseClaimProductUnitPriceCurrencyValue" => 235000.00,
                    "expenseClaimProductUnitPriceCurrencyExchangeRate" => 1,
                    "returnProductUnitPriceCurrency_RefID" => 62000000000001,
                    "returnProductUnitPriceCurrencyValue" => 1000.00,
                    "returnProductUnitPriceCurrencyExchangeRate" => 1,
                    "remarks" => 'Catatan Pertama'
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
                    "documentDateTimeTZ" => '2023-10-25',
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
                    "remarks" => $input['var_remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $advanceDetail
                        ]
                    ]
                ]
            ]
        );

        // return $this->SelectWorkFlow($varData, $SessionWorkerCareerInternal_RefID, $VarSelectWorkFlow);
        // }
    }

    public function StoreValidateAdvanceSettlementBeneficiary(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $beneficiary_id = $request->input('beneficiary_id');
        $beneficiary = $request->input('beneficiary');
        $beneficiary_id2 = $request->input('beneficiary_id2');
        $advance_RefID = $request->input('advance_RefID');

        $data = Session::get("SessionAdvanceSetllementRequester");
        if (Session::has("SessionAdvanceSetllementRequester")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $advance_RefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                if ($beneficiary_id != $beneficiary_id2 && $beneficiary_id2 != "") {
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

                    Session::push("SessionAdvanceSetllementRequester", $advance_RefID);
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


            Session::push("SessionAdvanceSetllementRequester", $advance_RefID);
        }
        $compact = [
            'status' => $status,
            'beneficiary_id' => $beneficiary_id,
            'beneficiary' => $beneficiary,
            'DataAdvanceList' => $varDataAdvanceList['data'],
        ];

        return response()->json($compact);
    }

    public function AdvanceByBudgetID(Request $request)
    {
        $project_code = $request->input('project_code');
        $varAPIWebToken = Session::get('SessionLogin');
        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
                ],
                false
            );
        }

        $DataListAdvance = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $num = 0;
        $filteredArray = [];
        for ($i = 0; $i < count($DataListAdvance); $i++) {
            if ($DataListAdvance[$i]['CombinedBudget_RefID'] == $project_code) {
                $filteredArray[$num] = $DataListAdvance[$i];
                $num++;
            }
        }

        return response()->json($filteredArray);
    }

    public function AdvanceSettlementListData(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
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
            'data' => $varDataAdvanceRequest['data'],
        ];

        return response()->json($compact);
    }

    public function AdvanceSettlementListDataById(Request $request)
    {
        $advance_RefID = $request->input('var_recordID');
        $varAPIWebToken = Session::get('SessionLogin');
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
        return response()->json($varDataAdvanceList['data']);
    }

    public function AdvanceSettlementListCartRevision(Request $request)
    {
        $var_recordID = $request->input('var_recordID');
        $varAPIWebToken = Session::get('SessionLogin');
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
        return response()->json($varData['data']);
    }


    public function RevisionAdvanceSettlementIndex(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        Session::forget("SessionAdvanceSetllementRequester");

        $varDataAdvanceSettlementRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getAdvance',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchAsfNumberRevisionId,
                ]
            ]
        );

        $compact = [
            'dataRevisi' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['general'],
            'trano' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchAsfNumberRevisionId,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
        ];

        return view('Advance.Advance.Transactions.RevisionAdvanceSettlement', $compact);
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }
}
