<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class procurementTransactionPR extends Controller
{

    public function teststores(Request $request)
    {

        
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        // dd($varData);

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

        $compact = [
            'data' => $varData['data']['data'],
            'data2' => $varData2['data'],
        ];

        return view('Purchase.ProcurementRequest.Transactions.createPR', $compact);

    }

    public function index2(Request $request)
    {
        $projectcode = $request->input('projectcode');

        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.project.getProjectSectionItem', 
            'latest',
            [
            'parameter' => [
                'project_RefID' => (int)$projectcode
                ]
            ]
        );
    
        
        return response()->json($varData['data']['data']);
    }

    public function index3(Request $request)
    {
        $sitecode = $request->input('sitecode');

        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'report.form.resume.budgeting.getCombinedBudgetSectionUnsegmentedDetail', 
            'latest', 
            [
            'parameter' => [
                'combinedBudgetSection_RefID' => (int)$sitecode,
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
    public function PRlistcancel()
    {
        return redirect()->back();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = json_decode($request->getContent(), true);
        // $dataAll = array();

        // foreach ($data as $i => $v) {

        //     array_push($dataAll, array(
        //         'filenames' => $v['filenames']

        //     ));
        // }
        $data2 = json_decode($request->getContent(), true);
        $dataAll2 = array();

        foreach ($data2 as $i => $v) {

            array_push($dataAll2, array(
                // 'origin_budget' => $v['origin_budget'],
                'projectcode' => $v['projectcode'],
                'projectname' => $v['projectname'],
                'sitecode' => $v['sitecode'],
                'sitecode2' => $v['sitecode2'],
                'beneficiary' => $v['beneficiary'],
                'bank_name' => $v['bank_name'],
                'account_name' => $v['account_name'],
                'account_number' => $v['account_number'],
                'internal_notes' => $v['internal_notes'],
                'request_name' => $v['request_name'],
                'putProductId' => $v['putProductId'],
                'putProductName' => $v['putProductName'],
                'putQty' => $v['putQty'],
                'putQtys' => $v['putQtys'],
                'putUom' => $v['putUom'],
                'putPrice' => $v['putPrice'],
                'putCurrency' => $v['putCurrency'],
                'totalArfDetails' => $v['totalArfDetails'],
                'putRemark' => $v['putRemark'],
                'trano' => $v['trano'],

            ));
            break;
        }
        return response()->json($dataAll2);
    }

    public function store2(Request $request)
    {
        echo "DATA FAILED";die;
    }

    public function teststore(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        dd($varData);
        return response()->json($varData['data']['optionList']);
    }

    public function teststore2(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        return response()->json($varData['data']['optionList'][0]['userRole']);
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


    public function tests(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'lastProductId' => $v['lastProductId'],
                'lastProductName' => $v['lastProductName'],
                'lastQty' => $v['lastQty'],
                'lastUom' => $v['lastUom'],
                'lastPrice' => $v['lastPrice'],
                'lastCurrency' => $v['lastCurrency'],
                'totalArfDetails' => $v['totalArfDetails'],
                'lastRemark' => $v['lastRemark'],

            ));
        }
        dd($dataAll);
        // return view('ProcurementAndCommercial.Transactions.ARF.createARF');
    }

    public function revisionPRIndex(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        // dd($varData);

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

        $compact = [
            'data' => $varData['data']['data'],
            'data2' => $varData2['data'],
        ];

        return view('Purchase.ProcurementRequest.Transactions.RevisionPR', $compact);
    }

    public function submitData(Request $request)
    {
        $input = $request->all();
        $count_product = count($input['var_product_id']);

        $input_header = array(
            'var_budget_code'	=> $input['var_budget_code'],
            'var_budget_code2'	=> $input['var_budget_code2'],
            'var_sub_budget_code'	=> $input['var_sub_budget_code'],
            'var_sub_budget_code2'	=> $input['var_sub_budget_code2'],
            // 'var_request_name'	=> $input['var_request_name'],
            // 'var_beneficiary'	=> $input['var_beneficiary'],
            // 'var_internal_notes'	=> $input['var_internal_notes'],
            // 'var_bank_name'	=> $input['var_bank_name'],
            // 'var_account_name'	=> $input['var_account_name'],
            // 'var_account_number'	=> $input['var_account_number']
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