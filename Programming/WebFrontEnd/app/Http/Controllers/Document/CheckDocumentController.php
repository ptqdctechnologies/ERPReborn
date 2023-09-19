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
        $SessionWorkerCareerInternal_RefID = $request->session()->get('SessionWorkerCareerInternal_RefID');
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $documentNumber = $request->input('businessDocumentNumber');

        if(isset($documentNumber)){
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.resume.master.getBusinessDocumentIssuanceDisposition',
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $SessionWorkerCareerInternal_RefID,
                        'dataFilter' => [
                            'businessDocumentNumber' => $documentNumber,
                            'businessDocumentType_RefID' => null,
                            'combinedBudget_RefID' => null
                        ]
                    ]
                ]
            );
            
            if(!isset($varData['data'][0]['document']['content']['itemList']['ungrouped'])){
                return redirect()->route('CheckDocument.index');
            }
            else{
                $businessDocument_RefID = (int) $varData['data'][0]['document']['content']['itemList']['ungrouped'][0]['entities']['formDocumentNumber_RefID'];
    
                $varDataWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'report.form.documentForm.general.getAllDocumentType', 
                    'latest',
                    [
                    'parameter' => [
                        'recordID' => $businessDocument_RefID
                        ]
                    ]
                    );
    
                $compact = [
                    'var' => 1,
                    'dataWorkflow' => $varDataWorkflow['data'][0]['document']['content']['general']['workFlow']['historyList'],
                    'dataTransaction' => $varDataWorkflow['data'][0]['document'],
                    'businessDocument_RefID' => $varDataWorkflow['data'][0]['document']['header']['recordID'],
                    'businessDocumentNumber' => $varDataWorkflow['data'][0]['document']['header']['number'],
                    'businessDocumentTitle' => $varDataWorkflow['data'][0]['document']['header']['title'],
                ];
    
                return view('Documents.Transactions.index', $compact);
            }
        }
        else{
            return redirect()->route('CheckDocument.index');
        }

        
    }

    public function ShowDocumentByID(Request $request)
    {
        $businessDocument_RefID = (int) $request->input('businessDocument_RefID');

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataWorkflow = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'report.form.documentForm.general.getAllDocumentType', 
            'latest',
            [
            'parameter' => [
                'recordID' => $businessDocument_RefID
                ]
            ]
            );

        $compact = [
            'var' => 1,
            'dataWorkflow' => $varDataWorkflow['data'][0]['document']['content']['general']['workFlow']['historyList'],
            'dataTransaction' => $varDataWorkflow['data'][0]['document'],
            'businessDocument_RefID' => $varDataWorkflow['data'][0]['document']['header']['recordID'],
            'businessDocumentNumber' => $varDataWorkflow['data'][0]['document']['header']['number'],
            'businessDocumentTitle' => $varDataWorkflow['data'][0]['document']['header']['title'],
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
