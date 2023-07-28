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

        $filter = null;
        $document_type = "transaction.read.dataList.finance.getAdvance";
        $trano = $request->trano;
        $projectid = $request->projectid;
        $document_type = $request->document_type;


        if ($trano != "" && $projectid != "" && $document_type != "") {
            $filter = trim('"businessDocumentNumber" = ' . $trano . ' AND "CombinedBudget_RefID" = ' . $projectid . ' AND "businessDocumentType_RefID" = ' . $document_type . ' ');
        } else if ($trano != "") {
            $filter = trim('"businessDocumentNumber" ILIKE \'%' . $trano . '%\' ');
        } else if ($projectid != "") {
            $filter = trim('"CombinedBudget_RefID" = ' . $projectid . ' ');
        }

        $SessionWorkerCareerInternal_RefID = $request->session()->get('SessionWorkerCareerInternal_RefID');
        // $varAPIWebToken = $request->session()->get('SessionLogin');
        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken,
        //     'report.form.documentForm.master.getBusinessDocumentIssuanceDisposition',
        //     'latest',
        //     [
        //         'parameter' => [
        //             'recordID' => (int)$SessionWorkerCareerInternal_RefID
                    
        //         ]
        //     ]
        // );

        $compact = [
            'data' => $varData['data'],
        ];
        return response()->json($compact);
    }
}
