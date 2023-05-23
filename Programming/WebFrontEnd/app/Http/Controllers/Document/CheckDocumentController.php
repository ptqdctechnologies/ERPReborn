<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckDocumentController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
        
        return view('Documents.Transactions.index', $compact);
    }
    public function ShowDocument(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
     
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        // 'report.form.documentForm.supplyChain.getPurchaseRequisition',
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->sys_id,
            ]
        ]
        );
        
        // dd($varData);

        $compact = [
            'var' => 0,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
            'data' => $varData['data'][0]['document'],
        ];

        return view('Documents.Transactions.index', $compact);
    }
        

    //     return redirect()->route('CheckDocument.index', $compact);

    // }

}
