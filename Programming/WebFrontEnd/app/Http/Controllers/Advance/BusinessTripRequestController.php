<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class BusinessTripRequestController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripRequest");
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken
        ];
    
        return view('Advance.BusinessTrip.Transactions.CreateBusinessTripRequest', $compact);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }
    
    public function BusinessTripRequestListData(Request $request)
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
    
    public function RevisionBusinessTripRequestIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripRequest");

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->searchBrfNumberRevisionId,
            ]
        ]
        );
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'var_recordID' => $request->searchBrfNumberRevisionId,
        ];
        return view('Advance.BusinessTrip.Transactions.RevisionBusinessTripRequest', $compact);
    }

    public function BusinessTripRequestListCartRevision(Request $request)
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
            $request->session()->push("SessionBusinessTripRequest", (string)$varDatas['combinedBudget_SubSectionLevel1_RefID']);
            $request->session()->push("SessionBusinessTripRequest", (string)$varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
}