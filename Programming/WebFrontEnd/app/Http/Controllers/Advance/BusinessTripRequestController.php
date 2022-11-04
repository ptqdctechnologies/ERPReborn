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

    // public function StoreValidateBusinessTripRequest(Request $request)
    // {
    //     $tamp = 0; $status = 200;
    //     $val = $request->input('putWorkId');
    //     $val2 = $request->input('putProductId');
    //     $data = $request->session()->get("SessionBusinessTripRequest");
    //     if($request->session()->has("SessionBusinessTripRequest")){
    //         for($i = 0; $i < count($data); $i++){
    //             if($data[$i] == $val && $data[$i+1] == $val2){
    //                 $tamp = 1;
    //             }
    //         }
    //         if($tamp == 0){
    //             $request->session()->push("SessionBusinessTripRequest", $val);
    //             $request->session()->push("SessionBusinessTripRequest", $val2);
    //         }
    //         else{
    //             $status = 500;
    //         }
    //     }
    //     else{
    //         $request->session()->push("SessionBusinessTripRequest", $val);
    //         $request->session()->push("SessionBusinessTripRequest", $val2);
    //     }

    //     return response()->json($status);
    // }

    // public function StoreValidateBusinessTripRequest2(Request $request)
    // {
    //     $val = $request->input('putWorkId');
    //     $val2 = $request->input('putProductId');
    //     $data = $request->session()->get("SessionBusinessTripRequest");
    //     if($request->session()->has("SessionBusinessTripRequest")){
    //         for($i = 0; $i < count($data); $i++){
    //             if($data[$i] == $val && $data[$i+1] == $val2){
    //                 unset($data[$i]);
    //                 unset($data[$i+1]);
    //                 $newClass = array_values($data);
    //                 $request->session()->put("SessionBusinessTripRequest", $newClass);
    //             }
    //         }
    //     }
    // }

    public function BusinessTripListData(Request $request)
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
}