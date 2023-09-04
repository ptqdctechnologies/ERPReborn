<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckDocumentController extends Controller
{
    public function index(Request $request)
    {
        $compact = [
            'var' => 0,
            'businessDocument_RefID' => "",
            'businessDocumentNumber' => "",

        ];

        return view('Documents.Transactions.index', $compact);
    }

    public function ShowDocument(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.resume.master.getBusinessDocumentDispositionHistory',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$request->input('businessDocument_RefID')
                ]
            ]
        );

        $compact = [
            'var' => 1,
            'dataWorkflow' => $varDataWorkflow['data']['document'],
            'TransactionMenu' => $varDataWorkflow['data']['document']['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'][0]['entities']['businessDocumentTypeName'],
            'businessDocument_RefID' => $varDataWorkflow['data']['document']['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'][0]['entities']['businessDocument_RefID'],
            'businessDocumentNumber' => $varDataWorkflow['data']['document']['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'][0]['entities']['businessDocumentNumber'],
        ];

        return view('Documents.Transactions.index', $compact);
    }

    public function ShowDocumentByID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.resume.master.getBusinessDocumentDispositionHistory',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$request->input('businessDocument_RefID')
                ]
            ]
        );
        // dd($varDataWorkflow);
        $compact = [
            'var' => 1,
            'dataWorkflow' => $varDataWorkflow['data']['document'],
            'TransactionMenu' => $varDataWorkflow['data']['document']['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'][0]['entities']['businessDocumentTypeName'],
            'businessDocument_RefID' => $varDataWorkflow['data']['document']['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'][0]['entities']['businessDocument_RefID'],
            'businessDocumentNumber' => $varDataWorkflow['data']['document']['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'][0]['entities']['businessDocumentNumber'],
        ];

        return view('Documents.Transactions.index', $compact);
    }

    public function ShowDocumentListData(Request $request)
    {
        $DocumentType = $request->input('DocumentType');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = $request->session()->get('SessionWorkerCareerInternal_RefID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.resume.master.getBusinessDocumentIssuanceDisposition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$SessionWorkerCareerInternal_RefID,
                    'dataFilter' => [
                        'businessDocumentNumber' => null,
                        'businessDocumentType_RefID' => (int)$DocumentType,
                        'combinedBudget_RefID' => null
                    ]
                ]
            ]
        );

        $compact = [
            'data' => $varData['data'][0]['document']['content']['itemList']['ungrouped'],
        ];

        return response()->json($compact);
    }
}
