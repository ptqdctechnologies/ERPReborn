<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class procurementTransactionProcurementRequest extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionProcurementRequest");

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        $varDataProcurementRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisition',
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
        // dd($varDataProcurementRequest);

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'dataProcurementRequest' => $varDataProcurementRequest['data'],
            'var' => $var,
        ];
        return view('Purchase.ProcurementRequest.Transactions.CreateProcurementRequest', $compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $count_product = count($input['var_product_id']);

        $varAPIWebToken = $request->session()->get('SessionLogin');

        $ProcurementRequestDetail = [];
        for ($n = 0; $n < $count_product; $n++) {
            $ProcurementRequestDetail[$n] = [
                "entities" => [
                    "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                    "product_RefID" => (int) $input['var_product_id'][$n],
                    "quantity" => (int) $input['var_quantity'][$n],
                    "quantityUnit_RefID" => 73000000000001,
                    "productUnitPriceCurrency_RefID" => 62000000000001,
                    "productUnitPriceCurrencyValue" => (int) $input['var_price'][$n],
                    "productUnitPriceCurrencyExchangeRate" => 1,
                    "remarks" => $input['var_remark'][$n],
                ]
            ];
        }

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.supplyChain.setPurchaseRequisition',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ" => '2022-03-07',
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "remarks" => 'My Remarks',
                    "additionalData" => [
                        "itemList" => [
                            "items" => $ProcurementRequestDetail
                        ]
                    ]
                ]
            ]
        );

        $compact = [
            "advnumber" => "ADV-testing-00111",
        ];

        return response()->json($compact);
    }

    public function StoreValidateProcurementRequest(Request $request)
    {
        $tamp = 0;
        $status = 200;
        $val = $request->input('putProductId');
        $data = $request->session()->get("SessionProcurementRequest");
        if ($request->session()->has("SessionProcurementRequest")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $val) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $request->session()->push("SessionProcurementRequest", $val);
            } else {
                $status = 500;
            }
        } else {
            $request->session()->push("SessionProcurementRequest", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateProcurementRequest2(Request $request)
    {
        $messages = $request->session()->get("SessionProcurementRequest");
        $val = $request->input('putProductId');
        if (($key = array_search($val, $messages)) !== false) {
            unset($messages[$key]);
            $newClass = array_values($messages);
            $request->session()->put("SessionProcurementRequest", $newClass);
        }
    }

    public function RevisionPrIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionProcurementRequest");

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        $varDataProcurementRequest = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisition',
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
        $varDataProcReqRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchPrNumberRevisionId
                ]
            ]
        );
        // dd($varDataProcReqRevision);


        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'dataProcurementRequest' => $varDataProcurementRequest['data'],
            'dataProcReqRevision' => $varDataProcReqRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'var_recordID' => $request->searchPrNumberRevisionId,
        ];

        return view('Purchase.ProcurementRequest.Transactions.RevisionProcurementRequest', $compact);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);/
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $ProcReqDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $ProcReqDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (int) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (int) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => $input['var_remark'][$n],
                    ]
                ];
            }
        }

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.supplyChain.setPurchaseRequisition',
            'latest',
            [
                'recordID' => (int)$input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => '2022-03-07',
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "remarks" => 'My Remarks',
                    "additionalData" => [
                        "itemList" => [
                            "items" => $ProcReqDetail
                        ]
                    ]
                ]
            ]
        );


        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function ProcReqListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $ProcReqRefID = $request->input('ProcReqRefID');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $ProcReqRefID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varData);
        foreach ($varData['data'] as $varDatas) {
            $request->session()->push("SessionProcurementRequest", (string) $varDatas['product_RefID']);
        }
        return response()->json($varData['data']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
