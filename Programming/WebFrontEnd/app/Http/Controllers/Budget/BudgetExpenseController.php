<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class BudgetExpenseController extends Controller
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
        'transaction.read.dataList.budgeting.getBudgetExpense', 
        'latest', 
        [
        'parameter' => [
            'budget_RefID' => (int)$request->BudgetId,
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
        $num = 0;
        if($varData['metadata']['HTTPStatusCode'] == '200'){
            $num = 1;
        }

        $compact = [
            'data' => $varData['data'],
            'num' => $num,
            'budget_RefID' => $request->BudgetId,
        ];
        
        return view('Budget.BudgetExpense.Transactions.index', $compact);
    }
    public function GetBudget(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudget', 
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
        return response()->json($varData['data']);
    }
    public function create(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.budgeting.getBudgetExpenseGroup', 
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
        $varData2 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'dataPickList.humanResource.getOrganizationalDepartment', 
        'latest',
        [
        'parameter' => [
            ]
        ]
        );
        // dd($varData2['data']['data']);
        $compact = [
            'budget_RefID' => $_GET['budget_RefID'],
            'data' => $varData['data'],
            'data2' => $varData2['data']['data']
        ];
        // dd($varData);
        return view('Budget.BudgetExpense.Transactions.create', $compact);
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
        'transaction.create.budgeting.setBudgetExpense', 
        'latest', 
        [
        'entities' => [
            'budget_RefID' => (int)$request->budget_RefID,
            'budgetExpenseGroup_RefID' => (int)$request->budgetExpenseGroup_RefID,
            'budgetExpenseOwner_RefID' => (int)$request->budgetExpenseOwner_RefID
            ]
        ]
        );
        // dd($varData);
        return redirect('BudgetExpense?BudgetId='.$request->budget_RefID);
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
    public function edit(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataRecord.budgeting.getBudgetExpense', 
        'latest', 
        [
        'recordID' => (int)$id,
        ]
        );
        return view('Budget.BudgetExpense.Transactions.edit')->with('data', $varData['data']);
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
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.update.budgeting.setBudgetExpense', 
        'latest', 
        [
        'recordID' => (int)$id,
        'entities' => [
            'budget_RefID' => $request->budget_RefID,
            'budgetExpenseGroup_RefID' => 109000000000001,
            'budgetExpenseOwner_RefID' => 111000000000001
            ]
        ]
        );
        // dd($varData);
        return redirect('BudgetExpense?BudgetId='.$request->budget_RefID);
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
        'transaction.delete.budgeting.setBudgetExpense', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return redirect('BudgetExpense?BudgetId='.$_GET['budget_RefID']);
    }
}
