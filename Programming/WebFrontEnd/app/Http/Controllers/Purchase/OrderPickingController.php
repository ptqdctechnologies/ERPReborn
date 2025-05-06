<?php
namespace App\Http\Controllers\Purchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class OrderPickingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionOrderPickingPrNumber");
        $request->session()->forget("SessionOrderPicking");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.OrderPicking.Transactions.CreateOrderPicking', $compact);
    }
    public function ReportPoSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionOrderPickingPrNumber");
        $request->session()->forget("SessionOrderPicking");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.OrderPicking.Reports.ReportOrderPickingSummary', $compact);
    }
    public function ReportPoDetail(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionOrderPickingPrNumber");
        $request->session()->forget("SessionOrderPicking");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.OrderPicking.Reports.ReportOrderPickingDetail', $compact);
    }

    public function ReportOPtoDO(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseOrderPrNumber");
        $request->session()->forget("SessionPurchaseOrder");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.OrderPicking.Reports.ReportOrderPickingtoDO', $compact);
    }

    public function ReportStockMovementtoDO(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseOrderPrNumber");
        $request->session()->forget("SessionPurchaseOrder");
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'var' => $var,
            'statusRevisi' => 1,
        ];

        return view('Purchase.OrderPicking.Reports.ReportStockMovementtoDO', $compact);
    }
    public function StoreValidateOrderPickingPrNumber(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $tamp = 0;
        $status = 200;
        $varDataPurchaseRequisitionList['data'] = [];
        $var_RefID = $request->input('var_RefID');


        $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $var_RefID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varDataPurchaseRequisitionList);

        $data = $request->session()->get("SessionOrderPickingPrNumber");
        if ($request->session()->has("SessionOrderPickingPrNumber")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $var_RefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
                    'latest',
                    [
                        'parameter' => [
                            'purchaseRequisition_RefID' => (int) $var_RefID
                        ],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ]
                );
                $request->session()->push("SessionOrderPickingPrNumber", $var_RefID);
            } else {
                $status = 501;
            }
        } else {
            $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
                'latest',
                [
                    'parameter' => [
                        'purchaseRequisition_RefID' => (int) $var_RefID
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ]
            );

            $request->session()->push("SessionOrderPickingPrNumber", $var_RefID);
        }

        $compact = [
            'status' => $status,
            'DataPurchaseRequisitionList' => $varDataPurchaseRequisitionList['data'],
        ];

        return response()->json($compact);
    }

    public function StoreValidateOrderPicking(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionOrderPicking");
        if($request->session()->has("SessionOrderPicking")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionOrderPicking", $val);
                $request->session()->push("SessionOrderPicking", $val2);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionOrderPicking", $val);
            $request->session()->push("SessionOrderPicking", $val2);
        }

        return response()->json($status);

    }
    public function StoreValidateOrderPicking2(Request $request)
    {
        $val = $request->input('putWorkId');
        $val2 = $request->input('putProductId');
        $data = $request->session()->get("SessionOrderPicking");
        if($request->session()->has("SessionOrderPicking")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val && $data[$i+1] == $val2){
                    unset($data[$i]);
                    unset($data[$i+1]);
                    $newClass = array_values($data);
                    $request->session()->put("SessionOrderPicking", $newClass);
                }
            }
        }
    }

    public function OrderPickingListData(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataPurchaseRequisition = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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
        $compact = [
            'data' => $varDataPurchaseRequisition['data'],
        ];
            
        return response()->json($compact);
    }
    public function OrderPickingByPrID(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var_recordID = $request->input('var_recordID');
        $varDataPurchaseRequisitionList = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseRequisition_RefID' => (int) $var_recordID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        // dd($varDataPurchaseRequisitionList);
        $compact = [
            'DataPurchaseList' => $varDataPurchaseRequisitionList['data'],
        ];
        return response()->json($compact);
    }
    public function RevisionOrderPickingIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionPurchaseRequisition");

        $varDataOrderPickingRevision = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.supplyChain.getPurchaseRequisition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchPONumberRevisionId
                ]
            ]
        );
        // dd($varDataProcReqRevision);
        
        $compact = [
            'dataOrderPickingRevision' => $varDataOrderPickingRevision['data'][0]['document']['content']['itemList']['ungrouped'][0],
            'dataPurchaOrdernumber' => $varDataOrderPickingRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchPONumberRevisionId,
        ];

        return view('Purchase.Purchase.Transactions.RevisionOrderPicking', $compact);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

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
    public function revisionAsfIndex(Request $request)
    {   
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        
        return view('Advance.Advance.Transactions.revisionASF', ['data' => $varData['data']['data']]);
    }


    public function addListCartPO(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'trano' => $v['trano'],
                'productId' => $v['productId'],
                'productName' => $v['productName'],
                'uom' => $v['uom'],
                'qty' => $v['qty'],
                'unit_Price' => $v['unit_Price'],
                'ppn_value' => $v['ppn_value'],
                'total' => $v['total']
            ));
        }
        return response()->json($dataAll);
    }

    public function submitData(Request $request)
    {
        $input = $request->all();
        dd($input);die;
        $count_product = count($input['var_product_id']);

        $input_header = array(
            'var_budget_code'	=> $input['var_budget_code'],
            'var_budget_code2'	=> $input['var_budget_code2'],
            'var_sub_budget_code'	=> $input['var_sub_budget_code'],
            'var_sub_budget_code2'	=> $input['var_sub_budget_code2'],
            'var_request_name'	=> $input['var_request_name'],
            'var_beneficiary'	=> $input['var_beneficiary'],
            'var_internal_notes'	=> $input['var_internal_notes'],
            'var_bank_name'	=> $input['var_bank_name'],
            'var_account_name'	=> $input['var_account_name'],
            'var_account_number'	=> $input['var_account_number']
        );

        print_r($input_header);

        $input_product = array(); 
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $input_product['var_product_id'] = $input['var_product_id'][$n];
                $input_product['var_product_name'] = $input['var_product_name'][$n];
                $input_product['var_quantity'] = $input['var_quantity'][$n];
                $input_product['var_uom'] = $input['var_uom'][$n];
                $input_product['var_price'] = $input['var_price'][$n];
                $input_product['var_totalPrice'] = $input['var_totalPrice'][$n];
                $input_product['var_currency'] = $input['var_currency'][$n];
                $input_product['var_remark'] = $input['var_remark'][$n];
                
                print_r($input_product);
            }
        }
    }
}       