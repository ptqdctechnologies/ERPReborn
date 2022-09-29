<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvanceSettlementController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("SessionAdvanceSetllement");
        $request->session()->forget("SessionAdvanceSetllementRequester");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
        ];

        return view('Advance.Advance.Transactions.CreateAdvanceSettlement', $compact);
    }

    public function StoreValidateAdvanceSettlement(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putProductId');
        $data = $request->session()->get("SessionAdvanceSetllement");
        if ($request->session()->has("SessionAdvanceSetllement")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionAdvanceSetllement", $val);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionAdvanceSetllement", $val);
        }

        return response()->json($status);
    }
    public function StoreValidateAdvanceSettlement2(Request $request)
    {
        $messages = $request->session()->get("SessionAdvanceSetllement");
        $val = $request->input('putProductId');
        if (($key = array_search($val, $messages)) !== false) {
            unset($messages[$key]);
            $newClass = array_values($messages);
            $request->session()->put("SessionAdvanceSetllement", $newClass);
        }
    }

    public function StoreValidateAdvanceSettlementRequester(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $requester_id = $request->input('requester_id');
        $requester_name = $request->input('requester_name');
        $requester_id2 = $request->input('requester_id2');
        $advance_RefID = $request->input('advance_RefID');

        $data = $request->session()->get("SessionAdvanceSetllementRequester");
        if ($request->session()->has("SessionAdvanceSetllementRequester")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $advance_RefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                if($requester_id != $requester_id2 && $requester_id2 != ""){
                    $status = 500;
                }else{

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
            'requester_id' => $requester_id,
            'requester_name' => $requester_name,
            'DataAdvanceList' => $varDataAdvanceList['data'],
        ];

        return response()->json($compact);
    }

    public function AdvanceSettlementListData(Request $request)
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


    public function RevisionAdvanceSettlementIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvance");
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
        // dd($varDataAdvanceSettlementRevision);
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'dataAdvancenumber' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchAsfNumberRevisionId,
        ];

        return view('Advance.Advance.Transactions.RevisionAdvanceSettlement', $compact);
    }
}
