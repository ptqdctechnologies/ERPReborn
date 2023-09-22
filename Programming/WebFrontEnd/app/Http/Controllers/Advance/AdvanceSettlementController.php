<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvanceSettlementController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvanceSetllementRequester");
    
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
        $input = $request->all();
        dd($input);
        $compact = [
            "advnumber" => 'ASF-0000001',
        ];

        return response()->json($compact);
    }

    public function StoreValidateAdvanceSettlementBeneficiary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $beneficiary_id = $request->input('beneficiary_id');
        $beneficiary_name = $request->input('beneficiary_name');
        $beneficiary_id2 = $request->input('beneficiary_id2');
        $advance_RefID = $request->input('advance_RefID');

        $data = $request->session()->get("SessionAdvanceSetllementRequester");
        if ($request->session()->has("SessionAdvanceSetllementRequester")) {
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

                    $request->session()->push("SessionAdvanceSetllementRequester", $advance_RefID);
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
            

            $request->session()->push("SessionAdvanceSetllementRequester", $advance_RefID);
        }
        $compact = [
            'status' => $status,
            'beneficiary_id' => $beneficiary_id,
            'beneficiary_name' => $beneficiary_name,
            'DataAdvanceList' => $varDataAdvanceList['data'],
        ];

        return response()->json($compact);
    }

    public function AdvanceByBudgetID(Request $request)
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

    public function AdvanceSettlementListData(Request $request)
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
        $compact = [
            'data' => $varDataAdvanceRequest['data'],
        ];
            
        return response()->json($compact);
    }

    public function AdvanceSettlementListDataById(Request $request)
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
        return response()->json($varDataAdvanceList['data']);
    }

    public function AdvanceSettlementListCartRevision(Request $request)
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
        return response()->json($varData['data']);
    }


    public function RevisionAdvanceSettlementIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvanceSetllementRequester");

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
