<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

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

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        // dd($varData);die;
        $num = 0;
        if ($varData['metadata']['HTTPStatusCode'] == '200') {
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
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

    public function create(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.master.getCurrency', 
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
            'data' => $varData['data'],
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

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.budgeting.setBudgetExpenseLineCeiling',
            'latest',
            [
                'entities' => [
                    'budgetExpenseLine_RefID' => (int)$request->budgetExpenseLine_RefID,
                    'validStartDateTimeTZ' => $start,
                    'validFinishDateTimeTZ' => $end,
                    'currency_RefID' => (int)$request->currency_RefID,
                    'currencyExchangeRate' => (int)$request->rate,
                    'currencyValue' => (int)$request->value,
                ]
            ]
        );
        return redirect('BudgetExpenseLineCeiling?BudgetExpenseLineId=' . $request->budgetExpenseLine_RefID);
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
            'transaction.delete.budgeting.setBudgetExpenseLineCeiling',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect('BudgetExpenseLineCeiling?BudgetExpenseLineId=' . $_GET['BudgetExpenseLineId']);
    }
}
