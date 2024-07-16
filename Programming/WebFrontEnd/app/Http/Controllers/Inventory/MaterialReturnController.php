<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class MaterialReturnController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("SessionMaterialReturn");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'statusRevisi' => 0,
        ];

        return view('Inventory.MaterialReturn.Transactions.CreateMaterialReturn', $compact);
    }
    public function ReportMatReturnSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 1;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        // PERUBAHAN WISNU
        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
                ],
                false
            );
        }

        // PERUBAHAN WISNU
        $DataListAdvance = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
            'dataListAdvance' => !empty($DataListAdvance) ? $DataListAdvance : []
        ];

        return view('Inventory.MaterialReturn.Reports.ReportMatReturnSummary', $compact);
    }

    public function ReportMatReturnDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 1;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        // PERUBAHAN WISNU
        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
                ],
                false
            );
        }

        // PERUBAHAN WISNU
        $DataListAdvance = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
            'dataListAdvance' => !empty($DataListAdvance) ? $DataListAdvance : []
        ];

        return view('Inventory.MaterialReturn.Reports.ReportMatReturnDetail', $compact);
    }

    public function StoreValidateiMaterialReturn(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReturn");
        if ($request->session()->has("SessionMaterialReturn")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionMaterialReturn", $val);
                $request->session()->push("SessionMaterialReturn", $val2);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionMaterialReturn", $val);
            $request->session()->push("SessionMaterialReturn", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateiMaterialReturn2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReturn");
        if ($request->session()->has("SessionMaterialReturn")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    unset($data[$i]);
                    unset($data[$i + 1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionMaterialReturn", $newClass);
                }
            }
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    public function MaterialReturnListData(Request $request)
    {
        try {

            if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
                    ],
                    false
                );
            }

            $DataListAdvance = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DataListAdvance"
                ),
                true
            );


            $collection = collect($DataListAdvance);

            $project_id = $request->project_id;
            $site_id = $request->site_id;

            if ($project_id != "") {
                $collection = $collection->where('CombinedBudget_RefID', $project_id);
            }
            if ($site_id != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $site_id);
            }

            $collection = $collection->all();

            return response()->json($collection);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    public function MaterialReturnByDorID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');
        $varDataAdvanceList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $var_recordID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varDataAdvanceList);
        $compact = [
            'DataAdvanceList' => $varDataAdvanceList['data'],
        ];
        return response()->json($compact);
    }

    public function RevisionMaterialReturnIndex(Request $request)
    {
        try {

            $mr_RefID = $request->mr_RefID;
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION ADVANCE
            if (Redis::get("DataListAdvanceDetailComplex") == null) {
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvanceDetailComplex',
                    'latest',
                    [
                        'parameter' => [
                            'advance_RefID' => (int) $mr_RefID,
                        ],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ],
                    false
                );
            }

            $DataAdvanceDetailComplex = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DataListAdvanceDetailComplex"
                ),
                true
            );

            $collection = collect($DataAdvanceDetailComplex);
            $collection = $collection->where('Sys_ID_Advance', $mr_RefID);

            $num = 0;
            $filteredArray = [];

            foreach ($collection as $collections) {
                $filteredArray[$num] = $collections;
                $num++;
            }

            if ($filteredArray[0]['Log_FileUpload_Pointer_RefID'] == 0) {
                $dataDetailFileAttachment = null;
            } else {
                $dataDetailFileAttachment = $filteredArray[0]['Log_FileUpload_Pointer_RefID'];
            }

            for ($i = 0; $i < count($filteredArray); $i++) {
                unset($filteredArray[$i]['FileAttachment']);
            }

            //DOCUMENT TYPE ID ADVANCE
            $DocumentType = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DocumentType"
                ),
                true
            );
            $collection = collect($DocumentType);
            $collection = $collection->where('Name', "Advance Form");
            foreach ($collection->all() as $collections) {
                $DocumentTypeID = $collections['Sys_ID'];
            }

            $remark = $filteredArray[0]['Remarks'];
            $filteredArray[0]['Remarks'] = "";

            $compact = [
                'dataHeader' => $filteredArray[0],
                'dataDetail' => $filteredArray,
                'remark' => $remark,
                'dataFileAttachment' => $dataDetailFileAttachment,
                'DocumentTypeID' => $DocumentTypeID,
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 1,
            ];
            return view('Inventory.MaterialReturn.Transactions.RevisionMaterialReturn', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }

    }
    public function MaterialReturnListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $var_recordID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return response()->json($varData['data']);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
    }
}
