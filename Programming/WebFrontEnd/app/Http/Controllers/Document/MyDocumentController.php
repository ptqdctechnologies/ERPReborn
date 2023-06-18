<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyDocumentController extends Controller
{
    public function index()
    {
        return view('Documents.Transactions.MyDocument');
    }

    public function MyDocumentListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
        $compact = [
            'data' => $varData['data'],
        ];
        return response()->json($compact);
    }

    public function MyDocumentListDataFilter(Request $request)
    {

        $filter = "";
        $trano = $request->trano;
        $projectid = $request->projectid;
        $document_type = $request->document_type;

        if($trano != "" && $projectid != ""){
            $filter = $trano;
            $filter = $projectid;
        }
        else if($trano != ""){
            $filter = $trano;
        }
        else if($projectid != ""){
            $filter = $projectid;
        }

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvance',
            // $document_type,
            'latest',
            [
                'parameter' => null,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    // 'filter' => null,
                    // 'filter' => '"Sys_ID" = '.$filter.'',
                    'filter' => '"CombinedBudget_RefID" = '.$filter.'',
                    'paging' => null
                ]
            ]
        );
        // dd($varData);
        $compact = [
            'data' => $varData['data'],
        ];
        return response()->json($compact);
    }
}
