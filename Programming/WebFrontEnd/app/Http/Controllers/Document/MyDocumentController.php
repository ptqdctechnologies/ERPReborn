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

    public function MyDocumentListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        // dd($varBusinessDocumentType);
        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'report.form.documentForm.master.getBusinessDocumentIssuanceDisposition', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'recordID' => 164000000000196
        //         ]
        //     ]
        //     );

        // dd($varData['data'][0]['document']['content']['itemList']['ungrouped']);
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
            'data' => $varData['data']
        ];
        return response()->json($compact);
    }

    public function MyDocumentListDataFilter(Request $request)
    {

        $filter = null;
        $document_type = "transaction.read.dataList.finance.getAdvance";
        $trano = $request->trano;
        $projectid = $request->projectid;

        if ($request->document_type != "") {
            $document_type = $request->document_type;
        }

        if ($trano != "" && $projectid != "") {
            $filter = trim('"DocumenNumber" = ' . $trano . ' AND "CombinedBudget_RefID" = ' . $projectid . ' ');
            $filter = $projectid;
        } else if ($trano != "") {
            $filter = trim('"DocumenNumber" ILIKE \'%' . $trano . '%\' ');
        } else if ($projectid != "") {
            $filter = trim('"CombinedBudget_RefID" = ' . $projectid . ' ');
        }

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            $document_type,
            // "transaction.read.dataList.finance.getAdvance",
            'latest',
            [
                'parameter' => null,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => $filter,
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
