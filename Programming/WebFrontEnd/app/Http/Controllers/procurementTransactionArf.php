<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class procurementTransactionArf extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionArf");

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
            'transaction.read.dataList.master.getPerson', 
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

        return view('Advance.Advance.Transactions.createARF', $compact);

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
        $count_product = count($input['var_product_id']);
        $input_product = array();
        // $input_header = array(
        //     'var_budget_code'	=> $input['var_budget_code'],
        //     'var_sub_budget_code'	=> $input['var_sub_budget_code'],
        //     'var_request_name_id'	=> $input['var_request_name_id'],
        //     'var_remark'	=> $input['var_remark'],
            
        // );
        
        // $input_product = array();
        // if ($count_product > 0 && isset($count_product)) {
        //     for ($n = 0; $n < $count_product; $n++) {
        //         $input_product['var_product_id'] = $input['var_product_id'][$n];
        //         $input_product['var_product_name'] = $input['var_product_name'][$n];
        //         $input_product['var_quantity'] = $input['var_quantity'][$n];
        //         $input_product['var_uom'] = $input['var_uom'][$n];
        //         $input_product['var_price'] = $input['var_price'][$n];
        //         $input_product['var_totalPrice'] = $input['var_totalPrice'][$n];
        //         $input_product['var_currency'] = $input['var_currency'][$n];
        //         $input_product['var_combinedBudget'] = $input['var_combinedBudget'][$n];    

        //         print_r($input_product);
        //     }
        // }
                    
        

        // die;
        // if ($count_product > 0 && isset($count_product)) {
        //     for ($n = 0; $n < $count_product; $n++) {

                $varAPIWebToken = $request->session()->get('SessionLogin');
                $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.finance.setAdvance', 
                'latest', 
                [
                'entities' => [
                    "documentDateTimeTZ" => '2022-03-07',
                    "log_FileUpload_Pointer_RefID" => 91000000000001,
                    "requesterPerson_RefID" => (int)$input['var_request_name_id'],
                    "beneficiaryPerson_RefID" => 25000000000439,
                    "beneficiaryBankAccount_RefID" => 167000000000001,
                    "internalNotes" => 'My Internal Notes',
                    "remarks" => $input['var_remark'],
                    "additionalData" => NULL,
                    ]
                ]                    
                );
        //     }
        // }
        // var_dump($varData);
    }

    public function StoreValidateArf(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('putProductName');
        $data = $request->session()->get("SessionArf");
        if($request->session()->has("SessionArf")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionArf", $val);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionArf", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateArf2(Request $request)
    {
        $messages = $request->session()->get("SessionArf");
        $val = $request->input('putProductName');
        if (($key = array_search($val, $messages)) !== false) {
            unset($messages[$key]);
            $newClass = array_values($messages);
            $request->session()->put("SessionArf", $newClass);
        }
    }

    public function revisionArfIndex(Request $request)
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

        return view('Advance.Advance.Transactions.revisionARF', $compact);
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

    
}
