<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class MyDocumentController extends Controller
{
    public function index(Request $request)
    {
        return view('Documents.Transactions.IndexMyDocument');
    }

    public function MyDocumentListDataFilter(Request $request)
    {
        $trano = $request->trano;
        $projectid = $request->projectid;
        $DocumentType = $request->DocumentType;

        if ($trano == "") {
            $trano = null;
        } else {
            $trano = $trano;
        }
        if ($projectid == "") {
            $projectid = null;
        } else {
            $projectid = (int)$projectid;
        }
        if ($DocumentType == "") {
            $DocumentType = null;
        } else {
            $DocumentType = (int)$DocumentType;
        }

        $SessionWorkerCareerInternal_RefID = $request->session()->get('SessionWorkerCareerInternal_RefID');
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.resume.master.getBusinessDocumentIssuanceDisposition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $SessionWorkerCareerInternal_RefID,
                    'dataFilter' => [
                        'businessDocumentNumber' => $trano,
                        'businessDocumentType_RefID' => $DocumentType,
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
        // dd(Redis::get("RedisDataMaster"));
        // dd(Redis::command('TTL', ['Testing']));
        // dd(Redis::flushDB());    
        // dd(Redis::keys("*"));
        // dd(Redis::get('Pro'));
        // dd(json_decode(Redis::get("Product"), true));

        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');
        $varAPIWebToken = Session::get('SessionLogin');
        
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
                        'businessDocumentType_RefID' => null,
                        'combinedBudget_RefID' => null
                    ]
                ]
            ]
        );

        dd($varData);
        $ShowMyDocumentListData = Cache::remember('ShowMyDocumentListData', 480, function () use ($SessionWorkerCareerInternal_RefID, $varAPIWebToken) {

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
                            'businessDocumentType_RefID' => null,
                            'combinedBudget_RefID' => null
                        ]
                    ]
                ]
            );

            $compact = [
                'data' => $varData['data'][0]['document']['content']['itemList']['ungrouped'],
            ];

            return $compact;
        });
        return response()->json($ShowMyDocumentListData);
    }
}
