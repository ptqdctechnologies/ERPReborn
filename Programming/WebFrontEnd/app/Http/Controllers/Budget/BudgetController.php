<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;
use Illuminate\Support\Facades\Session;

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

    public function PreviewModifyBudget(Request $request) {
        try {
            // PIC
            $PIC                = $request->session()->get("SessionLoginName");

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

            // VALUE DEDUCTIVE CO
            $valueDeductiveCO   = $request->value_co_deductive;

            // FILES
            $files              = $request->uploaded_files;

            $compact = [
                'pic'               => $PIC,
                'budgetID'          => $budgetID,
                'budgetCode'        => $budgetCode,
                'budgetName'        => $budgetName,
                'subBudgetID'       => $subBudgetID,
                'subBudgetCode'     => $subBudgetCode,
                'subBudgetName'     => $subBudgetName,
                'reason'            => $reason,
                'additionalCO'      => $additionalCO,
                'currencyID'        => $currencyID,
                'currencySymbol'    => $currencySymbol,
                'currencyName'      => $currencyName,
                'idrRate'           => $idrRate,
                'valueAdditionalCO' => $valueAdditionalCO,
                'valueDeductiveCO'  => $valueDeductiveCO,
                'files'             => $files,
                'dataTable'         => [
                    'sectionOne'    => [
                        'firstRow'  => [
                            'description'   => 'Customer Oder (CO)',
                            'valuta'        => 'IDR',
                            'origin'        => 465000000,
                            'previous'      => 465000000,
                            'addSubt'       => $additionalCO == "yes" ? $valueAdditionalCO ? +$valueAdditionalCO : -$valueDeductiveCO : 0,
                            'totalCurrent'  => $additionalCO == "yes" ? $valueAdditionalCO ? 465000000 + $valueAdditionalCO : 465000000 - $valueDeductiveCO : 465000000
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                    ],
                    'sectionTwo'    => [
                        'firstRow'  => [
                            'description'   => 'Add(Subt) Cost',
                            'valuta'        => 'IDR',
                            'origin'        => 376712000,
                            'previous'      => 376712000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 376712000
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => '',
                            'valuta'        => '',
                            'origin'        => 'Recorded Cost',
                            'previous'      => 0,
                            'addSubt'       => '',
                            'totalCurrent'  => ''
                        ],
                        'fourthRow' => [
                            'description'   => '',
                            'valuta'        => '',
                            'origin'        => 'Balanced Budget',
                            'previous'      => 0,
                            'addSubt'       => '',
                            'totalCurrent'  => ''
                        ],
                        'fifthRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 376712000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 376712000
                        ]
                    ],
                    'sectionThree'  => [
                        'firstRow'  => [
                            'description'   => 'Gross Margin',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 79288000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 79288000
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => 0,
                            'previous'      => 0,
                            'addSubt'       => 0,
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => 0,
                            'previous'      => 79288000,
                            'addSubt'       => 0,
                            'totalCurrent'  => 79288000
                        ],
                    ],
                    'sectionFour'  => [
                        'firstRow'  => [
                            'description'   => 'Gross Margin',
                            'valuta'        => '%',
                            'origin'        => 0,
                            'previous'      => 17.39,
                            'addSubt'       => '',
                            'totalCurrent'  => 17.39
                        ],
                        'secondRow' => [
                            'description'   => 'Gross Margin Movement',
                            'valuta'        => '%',
                            'origin'        => 17.39,
                            'previous'      => 0,
                            'addSubt'       => '',
                            'totalCurrent'  => ''
                        ],
                    ],
                    'sectionFive'  => [
                        'firstRow'  => [
                            'description'   => 'Recorded Cost',
                            'valuta'        => 'IDR',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                        'secondRow' => [
                            'description'   => '',
                            'valuta'        => 'Cross Currency',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                        'thirdRow' => [
                            'description'   => 'Total',
                            'valuta'        => 'IDR',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                        'fourthRow' => [
                            'description'   => 'Actual Gross Margin',
                            'valuta'        => '%',
                            'origin'        => '',
                            'previous'      => '',
                            'addSubt'       => '',
                            'totalCurrent'  => 0
                        ],
                    ],
                ]
            ];

            dd($compact);

            return view('Budget.Budget.Transactions.PreviewModifyBudget', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at PreviewModifyBudget: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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
