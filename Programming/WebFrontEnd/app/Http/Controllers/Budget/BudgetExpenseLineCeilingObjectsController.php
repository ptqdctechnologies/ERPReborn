<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class BudgetExpenseLineCeilingObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudgetExpenseLineCeilingObjects', 
        'latest', 
        [
        'parameter' => [
            'budgetExpenseLineCeiling_RefID' => (int)$request->BudgetExpenseLineCeilingId,
            ],
        'SQLStatement' => [
            'pick' => null,
            'sort' => null,
            'filter' => null,
            'paging' => null
            ]
        ]
        );
        $num = 0;
        if ($varData['metadata']['HTTPStatusCode'] == '200') {
            $num = 1;
        }

        $compact = [
            'data' => $varData['data'],
            'num' => $num,
            'BudgetExpenseLineCeilingId' => $request->BudgetExpenseLineCeilingId,
        ];
        
        return view('Budget.BudgetExpenseLineCeilingObjects.Transactions.index', $compact);
    }
    public function GetBudgetExpenseLineCeiling(Request $request)
    {
        $BudgetExpenseLineId = $request->input('BudgetExpenseLineId2');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.budgeting.getBudgetExpenseLineCeiling',
            'latest',
            [
                'parameter' => [
                    'budgetExpenseLine_RefID' => (int)$BudgetExpenseLineId,
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
        return response()->json($varData['data']);
    }
    public function create()
    {
        $compact = [
            'BudgetExpenseLineCeilingId' => $_GET['BudgetExpenseLineCeilingId']
        ];
        return view('Budget.BudgetExpenseLineCeilingObjects.Transactions.create', $compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.budgeting.setBudgetExpenseLineCeilingObjects', 
        'latest', 
        [
        'entities' => [
            'budgetExpenseLineCeiling_RefID' => 106000000000001,
            'product_RefID' => 88000000000001,
            'quantity' => 2,
            'quantityUnit_RefID' => 73000000000001,
            'productUnitPriceCurrency_RefID' => 62000000000001,
            'productUnitPriceCurrencyExchangeRate' => 1.00,
            'productUnitPriceCurrencyValue' => 1500000
            ]
        ]
        );
        // dd($varData);
        return redirect('BudgetExpenseLineCeilingObjects?BudgetExpenseLineCeilingId=' . $request->BudgetExpenseLineCeilingId);
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
    public function edit(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataRecord.budgeting.getBudget', 
        'latest', 
        [
        'recordID' => 103000000000001
        ]
        );
        // dd($varData);die;
        return view('Budget.Budget.Transactions.edit')->with('data', $varData['data']);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.delete.budgeting.setBudgetExpenseLineCeilingObjects', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return redirect('BudgetExpenseLineCeilingObjects?BudgetExpenseLineCeilingId=' . $_GET['BudgetExpenseLineCeilingId']);
    }
}
