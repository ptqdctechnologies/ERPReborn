<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BudgetExpenseLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudgetExpenseLine', 
        'latest', 
        [
        'parameter' => [
            'budgetExpense_RefID' => (int)$request->BudgetExpenseId,
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
            'BudgetExpenseId' => $request->BudgetExpenseId,
        ];
        // dd($varData);
        return view('Budget.BudgetExpenseLine.Transactions.index', $compact);
    }
    public function GetBudgetExpense(Request $request)
    {
        $BudgetId = $request->input('BudgetId2');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudgetExpense', 
        'latest', 
        [
        'parameter' => [
            'budget_RefID' => (int)$BudgetId,
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
            'budgetExpense_RefID' => $_GET['BudgetExpenseId']
        ];
        return view('Budget.BudgetExpenseLine.Transactions.create', $compact);
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

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.budgeting.setBudgetExpenseLine', 
        'latest', 
        [
        'entities' => [
            'budgetExpense_RefID' => (int)$request->budgetExpense_RefID,
            'name' => $request->name,
            'code' => $request->code
            ]
        ]
        );
        return redirect('BudgetExpenseLine?BudgetExpenseId='.$request->budgetExpense_RefID);
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
        
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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
        
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.delete.budgeting.setBudgetExpenseLine', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return redirect('BudgetExpenseLine?BudgetExpenseId='.$_GET['BudgetExpenseId']);
    }
}
