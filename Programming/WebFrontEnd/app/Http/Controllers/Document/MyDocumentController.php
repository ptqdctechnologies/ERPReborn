<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyDocumentController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varBusinessDocumentType = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getBusinessDocumentType',
            'latest',
            [
                'parameter' => [],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        $compact = [
            'varBusinessDocumentType' => $varBusinessDocumentType['data'],
        ];
        return view('Documents.Transactions.MyDocument', $compact);
    }

    public function MyDocumentListDataFilter(Request $request)
    {
        $trano = $request->trano;
        $projectid = $request->projectid;
        $document_type = $request->document_type;

        if($trano == ""){
            $trano = null;
        }
        else{
            $trano = $trano;
        }
        if($projectid == ""){
            $projectid = null;
        }
        else{
            $projectid = (int)$projectid;
        }
        if($document_type == ""){
            $document_type = null;
        }
        else{
            $document_type = (int)$document_type;
        }

        $SessionWorkerCareerInternal_RefID = $request->session()->get('SessionWorkerCareerInternal_RefID');
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.master.getBusinessDocumentIssuanceDisposition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $SessionWorkerCareerInternal_RefID,
                    'dataFilter' => [
                        'businessDocumentNumber' => $trano,
                        'businessDocumentType_RefID' => $document_type,
                        'combinedBudget_RefID' => $projectid
                    ]
                ]
            ]
        );
        
        $compact = [
            'data' => $varData['data'][0]['document']['content']['itemList']['ungrouped'],
        ];
        return response()->json($compact);
    }

    public function ShowMyDocumentListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = $request->session()->get('SessionWorkerCareerInternal_RefID');
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.master.getBusinessDocumentIssuanceDisposition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$SessionWorkerCareerInternal_RefID,
                    'dataFilter' => [
                        'businessDocumentNumber' => null,
                        'businessDocumentType_RefID' => null,
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
