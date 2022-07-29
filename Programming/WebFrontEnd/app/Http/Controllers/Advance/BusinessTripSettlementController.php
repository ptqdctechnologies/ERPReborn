<?php

namespace App\Http\Controllers\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class BusinessTripSettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        $varData2 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getWorker', 
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

        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'data2' => $varData2['data'],
            'var' => $var,
        ];
        
        return view('Advance.BussinesTrip.Transactions.createBSF', $compact);
    }

    public function BSFtoBRF()
    {
        return view('Advance.BussinesTrip.Transactions.BSFtoBRF');
    }

    public function fundBRF()
    {
        return view('Advance.BussinesTrip.Transactions.fundBRF');
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
        $data = json_decode($request->getContent(), true);
        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'filenames' => $v['filenames']

            ));
        }
        $data2 = json_decode($request->getContent(), true);
        $dataAll2 = array();

        foreach ($data2 as $i => $v) {

            array_push($dataAll2, array(
                'origin_budget' => $v['origin_budget'],
                'projectcode' => $v['projectcode'],
                'projectname' => $v['projectname'],
                'subprojectc' => $v['subprojectc'],
                'subprojectn' => $v['subprojectn'],
                'beneficiary' => $v['beneficiary'],
                'bank_name' => $v['bank_name'],
                'account_name' => $v['account_name'],
                'account_number' => $v['account_number'],
                'internal_notes' => $v['internal_notes'],
                'requestNameArf' => $v['requestNameArf'],
                'putWorkId' => $v['putWorkId'],
                'putWorkName' => $v['putWorkName'],
                'putProductId' => $v['putProductId'],
                'putProductName' => $v['putProductName'],
                'putQty' => $v['putQty'],
                'putQtys' => $v['putQtys'],
                'putUom' => $v['putUom'],
                'putPrice' => $v['putPrice'],
                'putCurrency' => $v['putCurrency'],
                'totalArfDetails' => $v['totalArfDetails'],
                'putRemark' => $v['putRemark'],

            ));
            break;
        }
        return response()->json($dataAll2);
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
    public function RevisionBsfIndex(Request $request)
    {
        return view('Advance.BussinesTrip.Transactions.revisionBSF');
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