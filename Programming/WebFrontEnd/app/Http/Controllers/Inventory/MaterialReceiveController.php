<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class MaterialReceiveController extends Controller
{
    public function index(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionMaterialReceive");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 0,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 0,
        ];
        return view('Inventory.MaterialReceive.Transactions.CreateMaterialReceive', $compact);
    }

    public function StoreValidateMaterialReceive(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReceive");
        if ($request->session()->has("SessionMaterialReceive")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionMaterialReceive", $val);
                $request->session()->push("SessionMaterialReceive", $val2);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionMaterialReceive", $val);
            $request->session()->push("SessionMaterialReceive", $val2);
        }

        return response()->json($status);
    }

    public function StoreValidateMaterialReceive2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionMaterialReceive");
        if ($request->session()->has("SessionMaterialReceive")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val && $data[$i + 1] == $val2) {
                    unset($data[$i]);
                    unset($data[$i + 1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionMaterialReceive", $newClass);
                }
            }
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    public function MaterialReceiveListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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

        return response()->json($varDataAdvanceRequest['data']);
    }

    public function MaterialReceiveListDataPO(Request $request)
    {
        $advance_RefID = $request->input('purchase_order_id');
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
                        'advance_RefID' => (int) $advance_RefID,
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
        $collection = $collection->where('Sys_ID_Advance', $advance_RefID);

        $num = 0;
        $filteredArray = [];

        foreach ($collection as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        return response()->json($filteredArray);
    }

    public function MaterialReceiveListDataDO(Request $request)
    {
        $advance_RefID = $request->input('delivery_order_id');
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
                        'advance_RefID' => (int) $advance_RefID,
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
        $collection = $collection->where('Sys_ID_Advance', $advance_RefID);

        $num = 0;
        $filteredArray = [];

        foreach ($collection as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        return response()->json($filteredArray);
    }


    public function RevisionMaterialReceiveIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionMaterialReceive");

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getAdvance',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchMaterialReceiveNumberRevisionId,
                ]
            ]
        );
        // dd($varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0]);
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'logFileUploadPointer_RefID' => $varDataAdvanceRevision['data'][0]['document']['content']['attachmentFiles']['main']['logFileUploadPointer_RefID'],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'var_recordID' => $request->searchMaterialReceiveNumberRevisionId,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 0,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 1,
        ];

        return view('Inventory.MaterialReceive.Transactions.RevisionMaterialReceive', $compact);
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function MaterialReceiveListCartRevision(Request $request)
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



    public function SearchDeliveryOrder(Request $request)
    {
        Session::forget("SessionDeliveryOrderRequestSupplier");
        Session::forget("SessionDeliveryOrderRequestSupplierID");

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

        $budget_code = $request->input('budget_code');
        $sub_budget_code = $request->input('sub_budget_code');
        $supplier = $request->input('supplier');
        $trano = $request->input('trano');

        if ($budget_code != "") {
            $collection = $collection->filter(function ($item) use ($budget_code) {
                return strpos($item['CombinedBudgetCode'], $budget_code) !== false;
            });
        }
        if ($sub_budget_code != "") {
            $collection = $collection->filter(function ($item) use ($sub_budget_code) {
                return strpos($item['CombinedBudgetSectionCode'], $sub_budget_code) !== false;
            });
        }
        if ($supplier != "") {
            $collection = $collection->filter(function ($item) use ($supplier) {
                return strpos($item['RequesterWorkerName'], $supplier) !== false;
            });
        }
        if ($trano != "") {
            $collection = $collection->filter(function ($item) use ($trano) {
                return strpos($item['DocumentNumber'], $trano) !== false;
            });
        }

        return response()->json($collection->all());
    }
}
