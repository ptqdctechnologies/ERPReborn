<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class BudgetExpenseLineCeilingController extends Controller
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
        'transaction.read.dataList.budgeting.getBudgetExpenseLineCeiling', 
        'latest', 
        [
        'parameter' => [
            'budgetExpenseLine_RefID' => (int)$request->BudgetExpenseLineId,
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
        if($varData['metadata']['HTTPStatusCode'] == '200'){
            $num = 1;
        }

        $compact = [
            'data' => $varData['data'],
            'num' => $num,
            'BudgetExpenseLineId' => $request->BudgetExpenseLineId,
        ];
        
        return view('Budget.BudgetExpenseLineCeiling.Transactions.index', $compact);
    }

    public function GetBudgetExpenseLine(Request $request)
    {
        $BudgetId = $request->input('BudgetExpenseId2');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudgetExpenseLine', 
        'latest', 
        [
        'parameter' => [
            'budgetExpense_RefID' => (int)$BudgetId,
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
            'budgetExpenseLine_RefID' => $_GET['BudgetExpenseLineId']
        ];
        return view('Budget.BudgetExpenseLineCeiling.Transactions.create', $compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = date('Y-m-d h:m:s+07', strtotime($request->start));
        $end = date('Y-m-d h:m:s+07', strtotime($request->end));
        
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.budgeting.setBudgetExpenseCeiling', 
        'latest', 
        [
        'entities' => [
            'budgetExpenseLine_RefID' => (int)$request->budgetExpenseLine_RefID,
            'validStartDateTimeTZ' => $start,
            'validFinishDateTimeTZ' => $end,
            'currency_RefID' => 62000000000001,
            'currencyExchangeRate' => (int)$request->rate,
            'currencyValue' => (int)$request->value,
            ]
        ]
        );
        dd($varData);
        return redirect('BudgetExpenseLineCeiling?BudgetExpenseLineId='.$request->budgetExpenseLine_RefID);
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
        'transaction.delete.budgeting.setBudgetExpenseLineCeiling', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return redirect('BudgetExpenseLineCeiling?BudgetExpenseLineId='.$_GET['BudgetExpenseLineId']);
    }
}
