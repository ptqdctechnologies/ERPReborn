<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckDocumentController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $compact = [
            'var' => 0,
            'TransactionMenu' => 0,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
            'document_number' => ''
        ];
        
        return view('Documents.Transactions.index', $compact);
    }
    public function ShowDocument(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varLinkReportTransaction = $request->linkReportTransaction;
     
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        $varLinkReportTransaction,
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->sys_id,
            ]
        ]
        );

        // dd($varData['data'][0]['document']);

        $compact = [
            'var' => 1,
            'TransactionMenu' => $request->TransactionMenu,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
            'data' => $varData['data'][0]['document'],
            'document_number' => $request->document_number
        ];

        return view('Documents.Transactions.index', $compact);
    }
}
