<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class DeliveryOrderController extends Controller
{
    
    public function index(Request $request)
    {
        
        $request->session()->forget("SessionDeliveryOrderID");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'statusRevisi' => 0,
        ];
        
        return view('Inventory.DeliveryOrder.Transactions.CreateDeliveryOrder', $compact);
    }
    public function ReportDOSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDOSummary', $compact);
    }
    public function ReportDODetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Inventory.DeliveryOrder.Reports.ReportDODetail', $compact);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }
    public function DeliveryOrderListData(Request $request)
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

    public function DeliveryOrderListDataDor(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceSettlement = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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

        return response()->json($varDataAdvanceSettlement['data']);
    }

    public function DeliveryOrderByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
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
            'filter' => '"CombinedBudget_RefID" = '.$projectcode.'',
            'paging' => null
            ]
        ]
        );
        
        $compact = [
            'DataAdvanceRequest' => $varDataAdvanceRequest['data'],
        ];
        return response()->json($compact);
    }

    public function DeliveryOrderByDorID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 500;
        $varDataDorList['data'] = [];
        $sys_id = $request->input('sys_id');

        $data = $request->session()->get("SessionDeliveryOrderID");

        if ($request->session()->has("SessionDeliveryOrderID")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $sys_id) {
                    $tamp = 1;
                }
            }
        }

        if ($tamp == 0) {

            $varDataDorList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetail',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $sys_id,
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ]
            );
            $request->session()->push("SessionDeliveryOrderID", $sys_id);
            $status = 200;
        }

        $compact = [
            'DataDorList' => $varDataDorList['data'],
            'sys_id' => $sys_id,
            'status' => $status,
        ];
        return response()->json($compact);
    }

    public function RevisionDeliveryOrderIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        

        $varDataAdvanceRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'report.form.documentForm.finance.getAdvance', 
        'latest',
        [
        'parameter' => [
            'recordID' => (int) $request->searcDoNumberRevisionId,
            ]
        ]
        );
        // dd($varDataAdvanceRevision);
        $compact = [
            'dataAdvanceRevisions' => $varDataAdvanceRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataRequester' => $varDataAdvanceRevision['data'][0]['document']['content']['involvedPersons']['requester'],
            'trano' => $varDataAdvanceRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searcDoNumberRevisionId,
            'statusRevisi' => 0,
        ];
        
        return view('Inventory.DeliveryOrder.Transactions.RevisionDeliveryOrder', $compact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        dd($input);
    }

    public function DeliveryOrderListCartRevision(Request $request)
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
}
