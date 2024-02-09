<?php

namespace App\Http\Controllers\Process\Advance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AdvanceSettlementController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        Session::forget("SessionAdvanceSetllementBeneficiary");
        Session::forget("SessionAdvanceSetllementBeneficiaryID");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];

        return view('Process.Advance.AdvanceSettlement.Transactions.CreateAdvanceSettlement', $compact);
    }

    public function store(Request $request)
    {

        $varAPIWebToken = Session::get('SessionLogin');

        $input = $request->all();
        // dd($input);


        $count_product_expense = 0;
        $count_product_amount = 0;

        if (isset($input['var_product_id_expense'])) {
            $count_product_expense = count($input['var_product_id_expense']);
        }
        $count_product_amount = 0;
        if (isset($input['var_product_id_amount'])) {
            $count_product_amount = count($input['var_product_id_amount']);
        }

        $advanceSettlementDetail = [];

        $count_product = $count_product_amount;
        if ($count_product_expense > $count_product_amount) {
            $count_product = $count_product_expense;
        }

        for ($n = 0; $n < $count_product; $n++) {

            $productIdExpense = 0;
            if (isset($input['var_product_id_expense'][$n])) {
                $productIdExpense = $input['var_product_id_expense'][$n];
            }
            $productIdAmount = 0;
            if (isset($input['var_product_id_amount'][$n])) {
                $productIdAmount = $input['var_product_id_amount'][$n];
            }
            $quantityExpense = 0;
            if (isset($input['var_quantity_expense'][$n])) {
                $quantityExpense = $input['var_quantity_expense'][$n];
            }
            $quantityAmount = 0;
            if (isset($input['var_quantity_amount'][$n])) {
                $quantityAmount = $input['var_quantity_amount'][$n];
            }
            $quantityIdExpense = 0;
            if (isset($input['var_qty_id_expense'][$n])) {
                $quantityIdExpense = $input['var_qty_id_expense'][$n];
            }
            $quantityIdAmount = 0;
            if (isset($input['var_quantity_id_amount'][$n])) {
                $quantityIdAmount = $input['var_quantity_id_amount'][$n];
            }
            $currencyIdExpense = 0;
            if (isset($input['var_currency_id_expense'][$n])) {
                $currencyIdExpense = $input['var_currency_id_expense'][$n];
            }
            $currencyIdAmount = 0;
            if (isset($input['var_currency_id_amount'][$n])) {
                $currencyIdAmount = $input['var_currency_id_amount'][$n];
            }
            $priceExpense = 0;
            if (isset($input['var_price_expense'][$n])) {
                $priceExpense = $input['var_price_expense'][$n];
            }
            $priceAmount = 0;
            if (isset($input['var_price_amount'][$n])) {
                $priceAmount = $input['var_price_amount'][$n];
            }
            $exchangeRateIdExpense = 0;
            if (isset($input['var_exchange_rate_id_expense'][$n])) {
                $exchangeRateIdExpense = $input['var_exchange_rate_id_expense'][$n];
            }
            $exchangeRateIdAmount = 0;
            if (isset($input['var_exchange_rate_id_amount'][$n])) {
                $exchangeRateIdAmount = $input['var_exchange_rate_id_amount'][$n];
            }

            $advanceSettlementDetail[$n] = [
                'entities' => [
                    "advanceDetail_RefID" => (int) $var_advance_detail_id,
                    "product_RefID" => (int) $productIdExpense,
                    "quantity" => (float) $quantityExpense,
                    "quantityUnit_RefID" => (int) $quantityIdExpense,
                    "expenseClaimProductUnitPriceCurrency_RefID" => (int) $currencyIdExpense,
                    "expenseClaimProductUnitPriceCurrencyValue" => (float) $priceExpense,
                    "expenseClaimProductUnitPriceCurrencyExchangeRate" => (int) $exchangeRateIdExpense,
                    "returnProductUnitPriceCurrency_RefID" => (int) $currencyIdAmount,
                    "returnProductUnitPriceCurrencyValue" => (float) $priceAmount,
                    "returnProductUnitPriceCurrencyExchangeRate" => (int) $exchangeRateIdAmount,
                    "remarks" => 'Catatan Pertamax'
                ]
            ];
        }
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.finance.setAdvanceSettlement',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ" => $input['var_date'],
                    "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
                    "remarks" => $input['remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $advanceSettlementDetail
                        ]
                    ]
                ]
            ]
        );


        // $varAPIWebToken = Session::get('SessionLogin');

        // $input = $request->all();
        // // dd($input);


        // $count_product_expense = 0;
        // $count_product_amount = 0;

        // if (isset($input['var_product_id_expense'])) {
        //     $count_product_expense = count($input['var_product_id_expense']);
        // }
        // $count_product_amount = 0;
        // if (isset($input['var_product_id_amount'])) {
        //     $count_product_amount = count($input['var_product_id_amount']);
        // }

        // $advanceSettlementDetail = [];

        // $count_product = $count_product_amount;
        // if ($count_product_expense > $count_product_amount) {
        //     $count_product = $count_product_expense;
        // }

        // for ($n = 0; $n < $count_product; $n++) {

        //     $productIdExpense = 0;
        //     if (isset($input['var_product_id_expense'][$n])) {
        //         $productIdExpense = $input['var_product_id_expense'][$n];
        //     }
        //     $productIdAmount = 0;
        //     if (isset($input['var_product_id_amount'][$n])) {
        //         $productIdAmount = $input['var_product_id_amount'][$n];
        //     }
        //     $quantityExpense = 0;
        //     if (isset($input['var_quantity_expense'][$n])) {
        //         $quantityExpense = $input['var_quantity_expense'][$n];
        //     }
        //     $quantityAmount = 0;
        //     if (isset($input['var_quantity_amount'][$n])) {
        //         $quantityAmount = $input['var_quantity_amount'][$n];
        //     }
        //     $quantityIdExpense = 0;
        //     if (isset($input['var_qty_id_expense'][$n])) {
        //         $quantityIdExpense = $input['var_qty_id_expense'][$n];
        //     }
        //     $quantityIdAmount = 0;
        //     if (isset($input['var_quantity_id_amount'][$n])) {
        //         $quantityIdAmount = $input['var_quantity_id_amount'][$n];
        //     }
        //     $currencyIdExpense = 0;
        //     if (isset($input['var_currency_id_expense'][$n])) {
        //         $currencyIdExpense = $input['var_currency_id_expense'][$n];
        //     }
        //     $currencyIdAmount = 0;
        //     if (isset($input['var_currency_id_amount'][$n])) {
        //         $currencyIdAmount = $input['var_currency_id_amount'][$n];
        //     }
        //     $priceExpense = 0;
        //     if (isset($input['var_price_expense'][$n])) {
        //         $priceExpense = $input['var_price_expense'][$n];
        //     }
        //     $priceAmount = 0;
        //     if (isset($input['var_price_amount'][$n])) {
        //         $priceAmount = $input['var_price_amount'][$n];
        //     }
        //     $exchangeRateIdExpense = 0;
        //     if (isset($input['var_exchange_rate_id_expense'][$n])) {
        //         $exchangeRateIdExpense = $input['var_exchange_rate_id_expense'][$n];
        //     }
        //     $exchangeRateIdAmount = 0;
        //     if (isset($input['var_exchange_rate_id_amount'][$n])) {
        //         $exchangeRateIdAmount = $input['var_exchange_rate_id_amount'][$n];
        //     }

        //     $advanceSettlementDetail[$n] = [
        //         'entities' => [
        //             "advanceDetail_RefID" => (int) $var_advance_detail_id,
        //             "product_RefID" => (int) $productIdExpense,
        //             "quantity" => (float) $quantityExpense,
        //             "quantityUnit_RefID" => (int) $quantityIdExpense,
        //             "expenseClaimProductUnitPriceCurrency_RefID" => (int) $currencyIdExpense,
        //             "expenseClaimProductUnitPriceCurrencyValue" => (float) $priceExpense,
        //             "expenseClaimProductUnitPriceCurrencyExchangeRate" => (int) $exchangeRateIdExpense,
        //             "returnProductUnitPriceCurrency_RefID" => (int) $currencyIdAmount,
        //             "returnProductUnitPriceCurrencyValue" => (float) $priceAmount,
        //             "returnProductUnitPriceCurrencyExchangeRate" => (int) $exchangeRateIdAmount,
        //             "remarks" => 'Catatan Pertamax'
        //         ]
        //     ];
        // }
        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken,
        //     'transaction.create.finance.setAdvanceSettlement',
        //     'latest',
        //     [
        //         'entities' => [
        //             "documentDateTimeTZ" => $input['var_date'],
        //             "log_FileUpload_Pointer_RefID" => (int)$input['dataInput_Log_FileUpload_Pointer_RefID'],
        //             "requesterWorkerJobsPosition_RefID" => (int)$input['beneficiary_id'],
        //             "remarks" => $input['remark'],
        //             "additionalData" => [
        //                 "itemList" => [
        //                     "items" => $advanceSettlementDetail
        //                 ]
        //             ]
        //         ]
        //     ]
        // );

        // return $this->SelectWorkFlow($varData, $SessionWorkerCareerInternal_RefID, $VarSelectWorkFlow);
        // }
    }

    public function StoreValidateAdvanceSettlementBeneficiary(Request $request)
    {
        
        $tamp = 0;
        $tamp2 = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $beneficiary_id = $request->input('beneficiary_id');
        $beneficiary = $request->input('beneficiary');
        $advance_RefID = $request->input('advance_RefID');

        $data = Session::get("SessionAdvanceSetllementBeneficiary");
        $dataID = Session::get("SessionAdvanceSetllementBeneficiaryID");
        if (Session::has("SessionAdvanceSetllementBeneficiary")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $advance_RefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                for ($i = 0; $i < count($dataID); $i++) {
                    if ($dataID[$i] != $beneficiary_id) {
                        $status = 500;
                        $tamp2 = 1;
                        break;
                    }
                }

                if ($tamp2 == 0){

                    $varDataAdvanceList = $this->AdvanceDetailComplexByBeneficiaryID($advance_RefID);

                    Session::push("SessionAdvanceSetllementBeneficiary", $advance_RefID);
                    Session::push("SessionAdvanceSetllementBeneficiaryID", $beneficiary_id);
                }
            } else {
                $status = 501;
            }
        } else {

            $varDataAdvanceList = $this->AdvanceDetailComplexByBeneficiaryID($advance_RefID);

            Session::push("SessionAdvanceSetllementBeneficiary", $advance_RefID);
            Session::push("SessionAdvanceSetllementBeneficiaryID", $beneficiary_id);
        }
        $compact = [
            'status' => $status,
            'beneficiary_id' => $beneficiary_id,
            'beneficiary' => $beneficiary,
            'data' => $varDataAdvanceList,
        ];

        return response()->json($compact);
    }

    public function AdvanceDetailComplexByBeneficiaryID($advance_RefID)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        if (Redis::get("DataListAdvanceDetailComplex") == null) {
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceDetailComplex',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => 1,
                    ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $DataAdvanceDetailComplex = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvanceDetailComplex"
            ),
            true
        );

        $collection = collect($DataAdvanceDetailComplex);
        $collection = $collection->where('Sys_ID_Advance', $advance_RefID);


        $filteredArray = [];
        $num = 0;
        foreach ($collection->all() as $collections) {
            $filteredArray[$num] = $collections;
            $num++;
        }

        return $filteredArray;
    }
    public function SearchAdvanceRequest(Request $request)
    {
        Session::forget("SessionAdvanceSetllementBeneficiary");
        Session::forget("SessionAdvanceSetllementBeneficiaryID");
        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvance',
                'latest',
                [
                    'parameter' => null,
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $DataListAdvance = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $collection = collect($DataListAdvance);

        $budget_code = $request->input('budget_code');
        $sub_budget_code = $request->input('sub_budget_code');
        $requester = $request->input('requester');
        $benificiary = $request->input('benificiary');
        $trano = $request->input('trano');

        if ($budget_code != "") {
            $collection = $collection->filter(function ($item) use ($budget_code) {
                return strpos($item['CombinedBudgetCode'], $budget_code) !== false;
            });
        }
        if ($sub_budget_code != "") {
            $collection = $collection->filter(function ($item) use ($sub_budget_code) {
                return strpos($item['CombinedBudgetSectionCode'], $sub_budget_code) !== false;
            });
        }
        if ($requester != "") {
            $collection = $collection->filter(function ($item) use ($requester) {
                return strpos($item['RequesterWorkerName'], $requester) !== false;
            });
        }

        if ($benificiary != "") {
            $collection = $collection->filter(function ($item) use ($benificiary) {
                return strpos($item['BeneficiaryWorkerName'], $benificiary) !== false;
            });
        }
        if ($trano != "") {
            $collection = $collection->filter(function ($item) use ($trano) {
                return strpos($item['DocumentNumber'], $trano) !== false;
            });
        }

        return response()->json($collection->all());
    }

    public function AdvanceSettlementListData(Request $request)
    {
        try {

            if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.finance.getAdvance',
                    'latest',
                    [
                        'parameter' => null,
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                        ]
                    ],
                    false
                );
            }

            $DataListAdvance = json_decode(
                \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "DataListAdvance"
                ),
                true
            );


            $collection = collect($DataListAdvance);

            $project_id = $request->project_id;
            $site_id = $request->site_id;

            if ($project_id != "") {
                $collection = $collection->where('CombinedBudget_RefID', $project_id);
            }
            if ($site_id != "") {
                $collection = $collection->where('CombinedBudgetSection_RefID', $site_id);
            }

            $collection = $collection->all();

            return response()->json($collection);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function AdvanceSettlementListDataById(Request $request)
    {
        $advance_RefID = $request->input('var_recordID');
        $varAPIWebToken = Session::get('SessionLogin');
        $varDataAdvanceList = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $advance_RefID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return response()->json($varDataAdvanceList['data']);
    }

    public function AdvanceSettlementListCartRevision(Request $request)
    {
        $var_recordID = $request->input('var_recordID');
        $varAPIWebToken = Session::get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $var_recordID,
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


    public function RevisionAdvanceSettlementIndex(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        Session::forget("SessionAdvanceSetllementBeneficiary");
        Session::forget("SessionAdvanceSetllementBeneficiaryID");

        $varDataAdvanceSettlementRevision = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getAdvance',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $request->searchAsfNumberRevisionId,
                ]
            ]
        );

        $compact = [
            'dataRevisi' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['general'],
            'trano' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
            'var_recordID' => $request->searchAsfNumberRevisionId,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
        ];

        return view('Process.Advance.AdvanceSettlement.Transactions.RevisionAdvanceSettlement', $compact);
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }
}
