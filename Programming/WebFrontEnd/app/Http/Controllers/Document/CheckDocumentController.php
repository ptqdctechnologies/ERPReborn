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
            'document_number' => '',
            'sys_id' => '',
            'businessDocument_RefID' => '',
            'linkReportTransaction' => ''
            
        ];
        
        return view('Documents.Transactions.index', $compact);
    }
    
    public function ShowDocument(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varLinkReportTransaction = $request->input('linkReportTransaction');
     
        $varDataWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'report.form.documentForm.sysConfig.getLogBusinessDocumentWorkFlowPathHistory', 
            'latest',
            [
            'parameter' => [
                'recordID' => (int)$request->input('businessDocument_RefID')
                ]
            ]
            );
            
        // dd($varDataWorkflow);


        $varDataDocument = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken,
        $varLinkReportTransaction,
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->input('sys_id'),
            ]
        ]
        );

        // dd($varDataDocument['data'][0]['document']);

        $compact = [
            'var' => 1,
            'TransactionMenu' => $request->input('TransactionMenu'),
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
            'data' => $varDataDocument['data'][0]['document'],
            'dataWorkflow' => $varDataWorkflow['data'][0]['document'],
            'document_number' => $request->input('document_number'),
            'sys_id' => $request->input('sys_id'),
            'businessDocument_RefID' => $request->input('businessDocument_RefID'),
            'linkReportTransaction' => $request->input('linkReportTransaction'),
        ];

        return view('Documents.Transactions.index', $compact);
        
    }

    public function ShowDocumentByID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varLinkReportTransaction = $request->input('linkReportTransaction');
     
        $varDataWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'report.form.documentForm.sysConfig.getLogBusinessDocumentWorkFlowPathHistory', 
            'latest',
            [
            'parameter' => [
                'recordID' => (int)$request->input('businessDocument_RefID')
                ]
            ]
            );
            
        // dd($varDataWorkflow);


        $varDataDocument = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken,
        $varLinkReportTransaction,
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->input('sys_id'),
            ]
        ]
        );

        // dd($varDataDocument['data'][0]['document']);

        $compact = [
            'var' => 1,
            'TransactionMenu' => $request->input('TransactionMenu'),
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
            'data' => $varDataDocument['data'][0]['document'],
            'dataWorkflow' => $varDataWorkflow['data'][0]['document'],
            'document_number' => $request->input('document_number'),
            'sys_id' => $request->input('sys_id'),
            'businessDocument_RefID' => $request->input('businessDocument_RefID'),
            'linkReportTransaction' => $request->input('linkReportTransaction'),
        ];

        return view('Documents.Transactions.index', $compact);
    }
}
