<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class BudgetController extends Controller
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
        // dd($varData);
        return view('Budget.Budget.Transactions.index', ['data' => $varData['data']]);
    }

    public function ModifyBudget(Request $request) {
        return view('Budget.Budget.Transactions.ModifyBudget');
    }

    public function ModifyBudgetStore(Request $request) {
        try {
            // BUDGET CODE
            $budgetID           = $request->project_id;
            $budgetCode         = $request->project_code;
            $budgetName         = $request->project_name;

            // SUB BUDGET CODE
            $subBudgetID        = $request->site_id;
            $subBudgetCode      = $request->site_code;
            $subBudgetName      = $request->site_name;

            // REASON FOR MODIFY
            $reason             = $request->reason_modify;

            // ADDITIONAL CO
            $additionalCO       = $request->additional_co;

            // CURRENCY
            $currencyID         = $request->currency_id;
            $currencySymbol     = $request->currency_symbol;
            $currencyName       = $request->currency_name;

            // IDR RATE
            $idrRate            = $request->value_idr_rate;

            // VALUE ADDITIONAL CO
            $valueAdditionalCO  = $request->value_co_additional;

            // VALUE ADDITIONAL CO
            $valueDeductiveCO   = $request->value_co_deductive;

            // FILES
            $files              = $request->uploaded_files;

            $compact = [
                'budgetID'          => $budgetID,
                'budgetCode'        => $budgetCode,
                'budgetName'        => $budgetName,
                'subBudgetID'       => $subBudgetID,
                'subBudgetCode'     => $subBudgetCode,
                'subBudgetName'     => $subBudgetName,
                'reason'            => $reason,
                'additionalCO'      => $additionalCO,
                'currency'          => $currency,
                'valueAdditionalCO' => $valueAdditionalCO,
                'files'             => $files,
            ];

            return redirect()->route('Budget.PreviewModifyBudget', $compact);
            
        } catch (\Throwable $th) {
            Log::error("Error at ModifyBudget: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PreviewModifyBudget(Request $request) {
        // if (!$request->has(['budgetID', 'budgetCode', 'budgetName', 'subBudgetID', 'subBudgetCode', 'subBudgetName', 'reason', 'additionalCO', 'currency', 'valueAdditionalCO', 'files'])) {
        //     return redirect()->route('Budget.ModifyBudget')->with('NotFound', 'Data not found. Please fill in the data first.');
        // }

        $compact = [
            'budgetID'          => $request->budgetID,
            'budgetCode'        => $request->budgetCode,
            'budgetName'        => $request->budgetName,
            'subBudgetID'       => $request->subBudgetID,
            'subBudgetCode'     => $request->subBudgetCode,
            'subBudgetName'     => $request->subBudgetName,
            'reason'            => $request->reason,
            'additionalCO'      => $request->additionalCO,
            'currency'          => $request->currency,
            'valueAdditionalCO' => $request->valueAdditionalCO,
            'files'             => $request->files,
        ];

        return view('Budget.Budget.Transactions.PreviewModifyBudget');
    }

    public function create()
    {
        return view('Budget.Budget.Transactions.create');
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
        'transaction.create.budgeting.setBudget', 
        'latest', 
        [
        'entities' => [
            'name' => $request->name,
            'validStartDateTimeTZ' => $start,
            'validFinishDateTimeTZ' => $end
            ]
        ]
        );
        return redirect()->route('Budget.index');
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
        'transaction.read.dataRecord.budgeting.getBudget', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
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
        $start = date('Y-m-d h:m:s+07', strtotime($request->start));
        $end = date('Y-m-d h:m:s+07', strtotime($request->end));
        
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
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.delete.budgeting.setBudget', 
        'latest', 
        [
        'recordID' => (int)$id
        ]
        );
        return redirect()->route('Budget.index');
    }
}
