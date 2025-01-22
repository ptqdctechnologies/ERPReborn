<?php

namespace App\Http\Controllers\Process\BusinessTrip;

use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripSettlementSummary;
use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripSettlementDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class BusinessTripSettlementController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripSettllementRequester");
        $request->session()->forget("SessionBusinessTripSettllementRequesterID");
        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusAdvanceRevisi' => 0,
            'statusPrRevisi' => 0,
            'statusPr' => 0,
            'statusRevisi' => 0,
        ];
        
        return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.CreateBusinessTripSettlement', $compact);
    }

    public function StoreValidateBusinessTripSettlementRequester(Request $request)
    {
        
        $tamp = 0;
        $tamp2 = 0;
        $status = 200;
        $varDataAdvanceList['data'] = [];
        $requester_id = $request->input('requester_id');
        $requester_name = $request->input('requester_name');
        $bussinesTripRefID = $request->input('bussinesTripRefID');

        $data = Session::get("SessionBusinessTripSettllementRequester");
        $dataID = Session::get("SessionBusinessTripSettllementRequesterID");
        if (Session::has("SessionBusinessTripSettllementRequester")) {
            for ($i = 0; $i < count($data); $i++) {
                if ($data[$i] == $bussinesTripRefID) {
                    $tamp = 1;
                }
            }
            if ($tamp == 0) {
                for ($i = 0; $i < count($dataID); $i++) {
                    if ($dataID[$i] != $requester_id) {
                        $status = 500;
                        $tamp2 = 1;
                        break;
                    }
                }

                if ($tamp2 == 0){

                    $varDataAdvanceList = $this->BussinesTripDetailComplexByRequesterID($bussinesTripRefID);

                    Session::push("SessionBusinessTripSettllementRequester", $bussinesTripRefID);
                    Session::push("SessionBusinessTripSettllementRequesterID", $requester_id);
                }
            } else {
                $status = 501;
            }
        } else {

            $varDataAdvanceList = $this->BussinesTripDetailComplexByRequesterID($bussinesTripRefID);

            Session::push("SessionBusinessTripSettllementRequester", $bussinesTripRefID);
            Session::push("SessionBusinessTripSettllementRequesterID", $requester_id);
        }
        $compact = [
            'status' => $status,
            'requester_id' => $requester_id,
            'requester_name' => $requester_name,
            'data' => $varDataAdvanceList,
        ];

        return response()->json($compact);
    }

    public function BussinesTripDetailComplexByRequesterID($bussinesTripRefID)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $filteredArray = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.finance.getAdvance',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int) $bussinesTripRefID,
                ],
            ],
            false
        );

        // dd($filteredArray['data'][0]['document']['content']['details']['itemList']);
        return $filteredArray['data'][0]['document']['content']['details']['itemList'];
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
        $count_product = count($input['var_product_id']);

        $varAPIWebToken = $request->session()->get('SessionLogin');

        // $advanceDetail = [];
        // for($n =0; $n < $count_product; $n++){
        //     $advanceDetail[$n] = [
        //     'entities' => [
        //             "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
        //             "product_RefID" => (int) $input['var_product_id'][$n],
        //             "quantity" => (float) $input['var_quantity'][$n],
        //             "quantityUnit_RefID" => 73000000000001,
        //             "productUnitPriceCurrency_RefID" => 62000000000001,
        //             "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
        //             "productUnitPriceCurrencyExchangeRate" => 1,
        //             "remarks" => 'test jumat'
        //         ]
        //     ];
        // }

        // $varData = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.create.finance.setAdvance', 
        //     'latest', 
        //     [
        //     'entities' => [
        //         "documentDateTimeTZ" => $input['var_date'],
        //         "log_FileUpload_Pointer_RefID" => 91000000000001,
        //         "requesterWorkerJobsPosition_RefID" => (int)$input['request_name_id'],
        //         "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
        //         "beneficiaryBankAccount_RefID" => 167000000000001,
        //         "internalNotes" => 'My Internal Notes',
        //         "remarks" => $input['var_remark'],
        //         "additionalData" => [
        //             "itemList" => [
        //                 "items" => $advanceDetail
        //                 ]
        //             ]
        //         ]
        //     ]                    
        //     );

        $compact = [
            "advnumber" => 'ASF-0000001',
        ];

        return response()->json($compact);
    }

    public function BusinessTripRequestByBudgetID(Request $request)
    {
        $projectcode = $request->input('projectcode');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceRequest = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.finance.getAdvance', 
        'latest', 
        [
        'parameter' => null,
        'SQLStatement' => [
            'pick' => null,
            'sort' => null,
            'filter' => '"CombinedBudget_RefID" = '.$projectcode.'',
            'paging' => null
            ]
        ]
        );
        
        $compact = [
            'DataAdvanceRequest' => $varDataAdvanceRequest['data'],
        ];
        return response()->json($compact);
    }

    public function BusinessTripSettlementListData(Request $request)
    {
        
        try {

            // if (Redis::get("DataListAdvance") == null) {
                $varAPIWebToken = Session::get('SessionLogin');
                Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
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
            // }

            $DataListAdvance = json_decode(
                Helper_Redis::getValue(
                    Helper_Environment::getUserSessionID_System(),
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

    public function SearchBusinessTripRequest(Request $request)
    {
        Session::forget("SessionBusinessTripSettllementRequester");
        Session::forget("SessionBusinessTripSettllementRequesterID");

        if (Redis::get("DataListAdvance") == null) {
            $varAPIWebToken = Session::get('SessionLogin');
            Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
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
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "DataListAdvance"
            ),
            true
        );

        $collection = collect($DataListAdvance);

        $budget_code = $request->input('budget_code');
        $sub_budget_code = $request->input('sub_budget_code');
        $requester = $request->input('requester');
        $trano = $request->input('trano');

        if ($budget_code != "") {
            $collection = $collection->filter(function ($item) use ($budget_code) {
                return strpos($item['combinedBudgetCode'], $budget_code) !== false;
            });
        }
        if ($sub_budget_code != "") {
            $collection = $collection->filter(function ($item) use ($sub_budget_code) {
                return strpos($item['combinedBudgetSectionCode'], $sub_budget_code) !== false;
            });
        }
        if ($requester != "") {
            $collection = $collection->filter(function ($item) use ($requester) {
                return strpos($item['requesterWorkerName'], $requester) !== false;
            });
        }
        if ($trano != "") {
            $collection = $collection->filter(function ($item) use ($trano) {
                return strpos($item['documentNumber'], $trano) !== false;
            });
        }

        return response()->json($collection->all());
    }

    public function BusinessTripSettlementListDataById(Request $request)
    {
        $advance_RefID = $request->input('var_recordID');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varDataAdvanceList = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        // dd($varDataAdvanceList);

        return response()->json($varDataAdvanceList['data']);
    }

    public function BusinessTripSettlementListCartRevision(Request $request)
    {
        $var_recordID = $request->input('var_recordID');
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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
    
    public function RevisionBusinessTripSettlementIndex(Request $request)
    {
        // $varAPIWebToken = $request->session()->get('SessionLogin');
        // $request->session()->forget("SessionBusinessTripSettllement");
        // $request->session()->forget("SessionBusinessTripSettllementRequester");

        // $varDataAdvanceSettlementRevision = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'report.form.documentForm.finance.getAdvance', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'recordID' => (int) $request->searchBsfNumberRevisionId,
        //         ]
        //     ]
        //     );

        // // dd($varDataAdvanceSettlementRevision);
        // $compact = [
        //     'dataRevisi' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['general'],
        //     'trano' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
        //     'var_recordID' => $request->searchBsfNumberRevisionId,
        //     'varAPIWebToken' => $varAPIWebToken,
        //     'statusRevisi' => 1,
        // ];

        // return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.RevisionBusinessTripSettlement', $compact);

        try {

            $searchBsfNumberRevisionId = $request->input('searchBsfNumberRevisionId');
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION
            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $searchBsfNumberRevisionId,
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
            // dd($filteredArray);
            $compact = [
                'dataHeader' => $filteredArray['data'][0]['document']['header'],
                'dataContent' => $filteredArray['data'][0]['document']['content']['general'],
                'dataDetail' => $filteredArray['data'][0]['document']['content']['details']['itemList'],
                'varAPIWebToken' => $varAPIWebToken,
                'statusRevisi' => 1,
                'statusFinalApprove' => "No",
            ];
            return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.RevisionBusinessTripSettlement', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function ReportBusinessTripSettlementSummary(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportReportBusinessTripSettlementSummarySubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportReportBusinessTripSettlementSummary', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];
    
            return view('Process.BusinessTrip.BusinessTripSettlement.Reports.ReportBusinessTripSettlementSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripSettlementSummary Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripSettlementSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position) 
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $getReportAdvanceSummary    = null;

            // if (!Helper_Redis::getValue($varAPIWebToken, "ReportAdvanceSummary")) {
            //     $getReportAdvanceSummary = Helper_APICall::setCallAPIGateway(
            //         Helper_Environment::getUserSessionID_System(),
            //         $varAPIWebToken,
            //         'report.form.documentForm.finance.getReportAdvanceSummary',
            //         'latest',
            //         [
            //             'parameter' => [
            //                 'dataFilter' => [
            //                     'budgetID' => 1,
            //                     'subBudgetID' => 1,
            //                     'workID' => 1,
            //                     'productID' => 1,
            //                     'beneficiaryID' => 1,
            //                 ]
            //             ]
            //         ],
            //         false
            //     );
            // } else {
            //     $getReportAdvanceSummary = Helper_Redis::getValue($varAPIWebToken, "ReportAdvanceSummary");
            // }

            // DUMMY DATA
            $getReportAdvanceSummary = [
                [
                    "DocumentNumber" => "BSF-24000229",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Faiz Haems Muda",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Presentasi project Tanjung Pinang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Tanjung Pinang",
                    "TotalAdvance" => "937764.00",
                    "TotalExpenseClaimCart" => "213932.00",
                    "TotalAmountDueToCompanyCart" => "723832.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000228",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Choerul",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training teknisi Merauke",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Merauke",
                    "TotalAdvance" => "1437396.00",
                    "TotalExpenseClaimCart" => "456123.00",
                    "TotalAmountDueToCompanyCart" => "981273.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000227",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Nuryadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Pangkal Pinang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Pangkal Pinang",
                    "TotalAdvance" => "8365231.00",
                    "TotalExpenseClaimCart" => "6712398.00",
                    "TotalAmountDueToCompanyCart" => "1652833.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000226",
                    "DocumentDateTimeTZ" => "2024-12-26 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Choerul",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Gorontalo",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Gorontalo",
                    "TotalAdvance" => "14483674.00",
                    "TotalExpenseClaimCart" => "6571282.00",
                    "TotalAmountDueToCompanyCart" => "7912392.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000225",
                    "DocumentDateTimeTZ" => "2024-12-26 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting vendor Bengkulu",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Bengkulu",
                    "TotalAdvance" => "1010000.00",
                    "TotalExpenseClaimCart" => "120000.00",
                    "TotalAmountDueToCompanyCart" => "890000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000224",
                    "DocumentDateTimeTZ" => "2024-12-25 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Audit site Kendari",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Kendari",
                    "TotalAdvance" => "960000.00",
                    "TotalExpenseClaimCart" => "320000.00",
                    "TotalAmountDueToCompanyCart" => "640000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000223",
                    "DocumentDateTimeTZ" => "2024-12-24 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Jatiagung Sidoarjo Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Fauzi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training team Jambi",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Jambi",
                    "TotalAdvance" => "1000000.00",
                    "TotalExpenseClaimCart" => "190000.00",
                    "TotalAmountDueToCompanyCart" => "810000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000222",
                    "DocumentDateTimeTZ" => "2024-12-23 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Faiz Haems Muda",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Instalasi perangkat Ternate",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Ternate",
                    "TotalAdvance" => "980000.00",
                    "TotalExpenseClaimCart" => "260000.00",
                    "TotalAmountDueToCompanyCart" => "720000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000221",
                    "DocumentDateTimeTZ" => "2024-12-20 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Choerul",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting koordinasi Mataram",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Mataram",
                    "TotalAdvance" => "820000.00",
                    "TotalExpenseClaimCart" => "150000.00",
                    "TotalAmountDueToCompanyCart" => "670000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000220",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Balikpapan",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Balikpapan",
                    "TotalAdvance" => "890000.00",
                    "TotalExpenseClaimCart" => "180000.00",
                    "TotalAmountDueToCompanyCart" => "710000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000219",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Achmad Yunadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Kupang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Kupang",
                    "TotalAdvance" => "950000.00",
                    "TotalExpenseClaimCart" => "210000.00",
                    "TotalAmountDueToCompanyCart" => "740000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000218",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "221",
                    "CombinedBudgetSectionName" => "Halat Medan",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Presentasi project Samarinda",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Samarinda",
                    "TotalAdvance" => "870000.00",
                    "TotalExpenseClaimCart" => "270000.00",
                    "TotalAmountDueToCompanyCart" => "600000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000217",
                    "DocumentDateTimeTZ" => "2024-12-18 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Fauzi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting vendor Malang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Malang",
                    "TotalAdvance" => "950000.00",
                    "TotalExpenseClaimCart" => "130000.00",
                    "TotalAmountDueToCompanyCart" => "820000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000216",
                    "DocumentDateTimeTZ" => "2024-12-17 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Faiz Haems Muda",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Audit site Sorong",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Sorong",
                    "TotalAdvance" => "930000.00",
                    "TotalExpenseClaimCart" => "340000.00",
                    "TotalAmountDueToCompanyCart" => "590000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000215",
                    "DocumentDateTimeTZ" => "2024-12-13 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Choerul",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training teknisi Padang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Padang",
                    "TotalAdvance" => "860000.00",
                    "TotalExpenseClaimCart" => "110000.00",
                    "TotalAmountDueToCompanyCart" => "750000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000214",
                    "DocumentDateTimeTZ" => "2024-12-13 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Instalasi perangkat Banjarmasin",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Banjarmasin",
                    "TotalAdvance" => "930000.00",
                    "TotalExpenseClaimCart" => "290000.00",
                    "TotalAmountDueToCompanyCart" => "640000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000213",
                    "DocumentDateTimeTZ" => "2024-12-12 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "240",
                    "CombinedBudgetSectionName" => "Cendana Andalas",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Agnes Sutedja",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Nuryadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Pontianak",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Pontianak",
                    "TotalAdvance" => "930000.00",
                    "TotalExpenseClaimCart" => "210000.00",
                    "TotalAmountDueToCompanyCart" => "720000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000212",
                    "DocumentDateTimeTZ" => "2024-12-11 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "248",
                    "CombinedBudgetSectionName" => "Bukit Pakis Sby Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Adhe Kurniawan",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting koordinasi Pekanbaru",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Pekanbaru",
                    "TotalAdvance" => "1030000.00",
                    "TotalExpenseClaimCart" => "140000.00",
                    "TotalAmountDueToCompanyCart" => "890000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000211",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "248",
                    "CombinedBudgetSectionName" => "Bukit Pakis Sby Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Ambon",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Ambon",
                    "TotalAdvance" => "880000.00",
                    "TotalExpenseClaimCart" => "180000.00",
                    "TotalAmountDueToCompanyCart" => "700000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000210",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "248",
                    "CombinedBudgetSectionName" => "Bukit Pakis Sby Infill",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Achmad Yunadi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training team Yogyakarta",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Yogyakarta",
                    "TotalAdvance" => "990000.00",
                    "TotalExpenseClaimCart" => "300000.00",
                    "TotalAmountDueToCompanyCart" => "690000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000209",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Salim",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Presentasi project Denpasar",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Denpasar",
                    "TotalAdvance" => "860000.00",
                    "TotalExpenseClaimCart" => "150000.00",
                    "TotalAmountDueToCompanyCart" => "710000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000208",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Adhe Kurniawan",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi Palembang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Palembang",
                    "TotalAdvance" => "850000.00",
                    "TotalExpenseClaimCart" => "270000.00",
                    "TotalAmountDueToCompanyCart" => "580000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000207",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aden Bagus",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Audit site Jayapura",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Jayapura",
                    "TotalAdvance" => "1080000.00",
                    "TotalExpenseClaimCart" => "320000.00",
                    "TotalAmountDueToCompanyCart" => "760000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000206",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Faiz Haems Muda",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting koordinasi Semarang",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Semarang",
                    "TotalAdvance" => "920000.00",
                    "TotalExpenseClaimCart" => "200000.00",
                    "TotalAmountDueToCompanyCart" => "720000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000205",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Fauzi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Maintenance BTS Manado",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Manado",
                    "TotalAdvance" => "940000.00",
                    "TotalExpenseClaimCart" => "130000.00",
                    "TotalAmountDueToCompanyCart" => "810000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000204",
                    "DocumentDateTimeTZ" => "2024-12-06 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Aldi Mulyadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Training teknisi Bandung",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Bandung",
                    "TotalAdvance" => "1030000.00",
                    "TotalExpenseClaimCart" => "140000.00",
                    "TotalAmountDueToCompanyCart" => "890000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000203",
                    "DocumentDateTimeTZ" => "2024-12-05 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agus Nuryadi",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Instalasi perangkat Makassar",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Makassar",
                    "TotalAdvance" => "1010000.00",
                    "TotalExpenseClaimCart" => "240000.00",
                    "TotalAmountDueToCompanyCart" => "770000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000202",
                    "DocumentDateTimeTZ" => "2024-12-04 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Ahmad Choerul",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Meeting vendor Surabaya",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Surabaya",
                    "TotalAdvance" => "970000.00",
                    "TotalExpenseClaimCart" => "300000.00",
                    "TotalAmountDueToCompanyCart" => "670000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000201",
                    "DocumentDateTimeTZ" => "2024-12-03 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Survey lokasi BTS Medan",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Medan",
                    "TotalAdvance" => "870000.00",
                    "TotalExpenseClaimCart" => "150000.00",
                    "TotalAmountDueToCompanyCart" => "720000.00",
                ],
                [
                    "DocumentNumber" => "BSF-24000200",
                    "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "235",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Abdul Rachman",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Agnes Sutedja",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "BT Pak Sagala presentasi HTLS Batam",
                    "DepartingFrom" => "Jakarta",
                    "DestinationTo" => "Batam",
                    "TotalAdvance" => "8365231.00",
                    "TotalExpenseClaimCart" => "6712398.00",
                    "TotalAmountDueToCompanyCart" => "1652833.00",
                ],
            ];

            // dd($getReportAdvanceSummary);

            $reportData = is_string($getReportAdvanceSummary) ? json_decode($getReportAdvanceSummary, true) : $getReportAdvanceSummary;

            $filteredData = array_filter($reportData, function ($item) use ($project_code, $site_name, $requester_name, $beneficiary_name) {
                return 
                    (empty($project_code)     || $item['CombinedBudgetCode'] == $project_code) &&
                    (empty($site_name)        || $item['CombinedBudgetSectionName'] == $site_name) &&
                    (empty($requester_name)   || $item['RequesterWorkerName'] == $requester_name) &&
                    (empty($beneficiary_name) || $item['BeneficiaryWorkerName'] == $beneficiary_name);

                    // (empty($project_id)     || $item['CombinedBudget_RefID'] == $project_id) &&
                    // (empty($site_id)        || $item['CombinedBudgetSection_RefID'] == $site_id) &&
                    // (empty($requester_id)   || $item['RequesterWorkerJobsPosition_RefID'] == $requester_id) &&
                    // (empty($beneficiary_id) || $item['BeneficiaryWorkerJobsPosition_RefID'] == $beneficiary_id);
            });

            // dd($project_code, $site_name, $requester_name, $beneficiary_name);

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
                return $carry + ($item['TotalAdvance'] ?? 0);
            }, 0);

            $totalExpense = array_reduce($filteredData, function ($carry, $item) {
                return $carry + ($item['TotalExpenseClaimCart'] ?? 0);
            }, 0);

            $totalAmount = array_reduce($filteredData, function ($carry, $item) {
                return $carry + ($item['TotalAmountDueToCompanyCart'] ?? 0);
            }, 0);

            $compact = [
                'dataDetail'            => $filteredData,
                'budgetCode'            => $project_code,
                'budgetName'            => $project_name,
                'budgetId'              => $project_id,
                'siteCode'              => $site_code,
                'siteName'              => $site_name,
                'siteId'                => $site_id,
                'requesterName'         => $requester_name,
                'requesterId'           => $requester_id,
                'requesterPosition'     => $requester_position,
                'beneficiaryName'       => $beneficiary_name,
                'beneficiaryId'         => $beneficiary_id,
                'beneficiaryPosition'   => $beneficiary_position,
                'total'                 => $totalAdvance,
                'totalExpense'          => $totalExpense,
                'totalAmount'           => $totalAmount,
            ];

            Session::put("isButtonReportReportBusinessTripSettlementSummarySubmit", true);
            Session::put("dataReportReportBusinessTripSettlementSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripSettlementSummaryData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripSettlementSummaryStore(Request $request) 
    {
        try {
            $project_code           = $request->project_code_second;
            $project_name           = $request->project_name_second;
            $project_id             = $request->project_id_second;

            $site_id                = $request->site_id_second;
            $site_code              = $request->site_code_second;
            $site_name              = $request->site_name_second;
            
            $requester_id           = $request->worker_id_second;
            $requester_name         = $request->worker_name_second;
            $requester_position     = $request->worker_position_second;

            $beneficiary_id         = $request->beneficiary_second_id;
            $beneficiary_name       = $request->beneficiary_second_person_name;
            $beneficiary_position   = $request->beneficiary_second_person_position;

            if (!$project_id && !$site_id && !$requester_id && !$beneficiary_id) {
                Session::forget("isButtonReportReportBusinessTripSettlementSummarySubmit");
                Session::forget("dataReportReportBusinessTripSettlementSummary");

                return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            $compact = $this->ReportBusinessTripSettlementSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementSummary');
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripSettlementSummaryStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportBusinessTripSettlementSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportReportBusinessTripSettlementSummary");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportReportBusinessTripSettlementSummarySubmit");
                Session::forget("dataReportReportBusinessTripSettlementSummary");
        
                return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripSettlement.Reports.ReportBusinessTripSettlementSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Settlement Summary.pdf');
                } else {
                    return Excel::download(new ExportReportBusinessTripSettlementSummary, 'Export Report Business Trip Settlement Summary.xlsx');
                }
            } else {
                return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportBusinessTripSettlementSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripSettlementDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripSettlementDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripSettlementDetail', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.BusinessTrip.BusinessTripSettlement.Reports.ReportBusinessTripSettlementDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripSettlementDetailData($project_code, $project_name_second, $site_code, $site_name_second, $bsf_number, $bsf_id)
    {
        try {
            $varAPIWebToken         = Session::get('SessionLogin');
            // $getReportAdvanceDetail = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken, 
            //     'report.form.documentForm.finance.getAdvance', 
            //     'latest',
            //     [
            //         'parameter' => [
            //             'recordID' => (int) $advance_id
            //         ]
            //     ]
            // );

            // 820011-0000 | Equipment Rent
            // 820015-0000 | Travelling
            // 820005-0000 | Travel & Fares/Business Trip
            // 820003-0000 | Communication/Telephone
            // 820001-0000 | Salaries
            // XX          | Others

            $getReportAdvanceDetail = [
                'data' => [
                    "0" => [
                        "document" => [
                            "header" => [
                                "recordID"                      => "76000000000002",
                                "title"                         => "Advance Form",
                                "number"                        => "Adv/QDC/2022/000239",
                                "version"                       => "0",
                                "date"                          => "2024-12-16",
                                "businessDocumentType_RefID"    => "77000000000057",
                                "brfNumber"                     => "BRF-24000212",
                                "brfDate"                       => "2024-11-16",
                                "brfTotal"                      => '3890000'
                            ],
                            "content" => [
                                "general" => [
                                    "budget" => [
                                        "multipleSource" => false,
                                        "combinedBudget_RefIDList" => [
                                            "0" => "46000000000033"
                                        ],
                                        "combinedBudgetCodeList" => [
                                            "0" => "Q000062"
                                        ],
                                        "combinedBudgetNameList" => [
                                            "0" => "XL Microcell 2007"
                                        ],
                                        "combinedBudgetSection_RefIDList" => [
                                            "0" => "143000000000307"
                                        ],
                                        "combinedBudgetSectionCodeList" => [
                                            "0" => "240"
                                        ],
                                        "combinedBudgetSectionNameList" => [
                                            "0" => "Cendana Andalas"
                                        ],
                                    ],
                                    "businessDocument" => [
                                        "businessDocumentList" => [
                                            "recordID"  => "74000000020307",
                                            "formBusinessDocumentNumber_RefID" => "76000000000002",
                                            "type_RefID" => "77000000000057",
                                            "typeName" => "Advance Form",
                                            "number" => "Adv/QDC/2022/000239",
                                            "version" => "0",
                                            "dateTimeTZ" => "2022-12-13T00:00:00+07:00"
                                        ],
                                    ],
                                    "workFlow" => [
                                        "historyList" => [
                                            "0" => null
                                        ]
                                    ],
                                    "bankAccount" => [
                                        "beneficiary" => [
                                            "bankAccount_RefID" => "167000000000001",
                                            "bankName" => "Bank Central Asia",
                                            "bankAccountNumber" => "0063032911",
                                            "bankAcronym" => "BCA",
                                            "bankAccountName" => "PT QDC Technologies"
                                        ]
                                    ],
                                    "involvedPersons" => [
                                        "0" => [
                                            "sequence" => "1",
                                            "requesterWorkerJobsPosition_RefID" => "164000000000001",
                                            "requesterWorkerFullName" => "Abdollah Syani Siregar",
                                            "requesterWorkerName" => "Abdollah Syani Siregar",
                                            "requesterWorkerFullJobsPositionTitle" => "",
                                            "requesterWorkerJobsPositionName" => null,
                                            "requesterWorkerDepartmentName" => null,
                                            "beneficiaryWorkerJobsPosition_RefID" => "25000000000439",
                                            "beneficiaryWorkerFullName" => null,
                                            "beneficiaryWorkerName" => "Abdul Rachman",
                                            "beneficiaryWorkerFullJobsPositionTitle" => null,
                                            "beneficiaryWorkerJobsPositionName" => null,
                                            "beneficiaryWorkerDepartmentName" => null,
                                        ]
                                    ],
                                    "internalNotes" => "My Internal Notes",
                                    "remarks" => "test jumat"
                                ],
                                "details" => [
                                    "itemList" => [
                                        "0" => [
                                            "index" => 1,
                                            "dataSource" => "SchData-OLTP-Finance.TblAdvanceDetail",
                                            "recordID" => "82000000000003",
                                            "entities" => [
                                                "product_RefID" => "820015-0000",
                                                "productName" => "Travel & Fares/Business Trip",
                                                "quantity" => "2",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "6000000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033",
                                                "transport" => "2450000",
                                                "allowance" => "2000000",
                                                "entertainment" => "200000",
                                                "other" => "3000000",
                                                "transport_company" => "3450000",
                                                "allowance_company" => "3000000",
                                                "entertainment_company" => "300000",
                                                "other_company" => "5000000",
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    "1" => [
                        "document" => [
                            "header" => [
                                "recordID"                      => "76000000000002",
                                "title"                         => "Advance Form",
                                "number"                        => "Adv/QDC/2022/000239",
                                "version"                       => "0",
                                "date"                          => "2024-12-20",
                                "businessDocumentType_RefID"    => "77000000000057",
                                "brfNumber"                     => "BRF-24000215",
                                "brfDate"                       => "2024-12-01",
                                "brfTotal"                      => '2745000'
                            ],
                            "content" => [
                                "general" => [
                                    "budget" => [
                                        "multipleSource" => false,
                                        "combinedBudget_RefIDList" => [
                                            "0" => "46000000000033"
                                        ],
                                        "combinedBudgetCodeList" => [
                                            "0" => "Q000062"
                                        ],
                                        "combinedBudgetNameList" => [
                                            "0" => "XL Microcell 2007"
                                        ],
                                        "combinedBudgetSection_RefIDList" => [
                                            "0" => "143000000000307"
                                        ],
                                        "combinedBudgetSectionCodeList" => [
                                            "0" => "240"
                                        ],
                                        "combinedBudgetSectionNameList" => [
                                            "0" => "Cendana Andalas"
                                        ],
                                    ],
                                    "businessDocument" => [
                                        "businessDocumentList" => [
                                            "recordID"  => "74000000020307",
                                            "formBusinessDocumentNumber_RefID" => "76000000000002",
                                            "type_RefID" => "77000000000057",
                                            "typeName" => "Advance Form",
                                            "number" => "Adv/QDC/2022/000239",
                                            "version" => "0",
                                            "dateTimeTZ" => "2022-12-13T00:00:00+07:00"
                                        ],
                                    ],
                                    "workFlow" => [
                                        "historyList" => [
                                            "0" => null
                                        ]
                                    ],
                                    "bankAccount" => [
                                        "beneficiary" => [
                                            "bankAccount_RefID" => "167000000000001",
                                            "bankName" => "Bank Rakyat Indonesia",
                                            "bankAccountNumber" => "005301004453305",
                                            "bankAcronym" => "BRI",
                                            "bankAccountName" => "PT QDC Technologies"
                                        ]
                                    ],
                                    "involvedPersons" => [
                                        "0" => [
                                            "sequence" => "1",
                                            "requesterWorkerJobsPosition_RefID" => "164000000000001",
                                            "requesterWorkerFullName" => "Agnes Sutedja",
                                            "requesterWorkerName" => "Agnes Sutedja",
                                            "requesterWorkerFullJobsPositionTitle" => "",
                                            "requesterWorkerJobsPositionName" => null,
                                            "requesterWorkerDepartmentName" => null,
                                            "beneficiaryWorkerJobsPosition_RefID" => "25000000000439",
                                            "beneficiaryWorkerFullName" => null,
                                            "beneficiaryWorkerName" => "Ahmad Choerul",
                                            "beneficiaryWorkerFullJobsPositionTitle" => null,
                                            "beneficiaryWorkerJobsPositionName" => null,
                                            "beneficiaryWorkerDepartmentName" => null,
                                        ]
                                    ],
                                    "internalNotes" => "My Internal Notes",
                                    "remarks" => "Settlement BT Pak Choerul"
                                ],
                                "details" => [
                                    "itemList" => [
                                        "0" => [
                                            "index" => 1,
                                            "dataSource" => "SchData-OLTP-Finance.TblAdvanceDetail",
                                            "recordID" => "82000000000003",
                                            "entities" => [
                                                "product_RefID" => "820011-0000",
                                                "productName" => "Equipment Rent",
                                                "quantity" => "2",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "2150000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033",
                                                "transport" => "2600000",
                                                "allowance" => "2200000",
                                                "entertainment" => "250000",
                                                "other" => "3100000",
                                                "transport_company" => "3500000",
                                                "allowance_company" => "3100000",
                                                "entertainment_company" => "350000",
                                                "other_company" => "5100000",
                                            ]
                                        ],
                                        "1" => [
                                            "index" => 2,
                                            "dataSource" => "SchData-OLTP-Finance.TblAdvanceDetail",
                                            "recordID" => "82000000000003",
                                            "entities" => [
                                                "product_RefID" => "820003-0000",
                                                "productName" => "Communication/Telephone",
                                                "quantity" => "1",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "300000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033",
                                                "transport" => "2700000",
                                                "allowance" => "2300000",
                                                "entertainment" => "300000",
                                                "other" => "3200000",
                                                "transport_company" => "3600000",
                                                "allowance_company" => "3200000",
                                                "entertainment_company" => "400000",
                                                "other_company" => "5200000",
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    "2" => [
                        "document" => [
                            "header" => [
                                "recordID"                      => "76000000000002",
                                "title"                         => "Advance Form",
                                "number"                        => "Adv/QDC/2022/000239",
                                "version"                       => "0",
                                "date"                          => "2024-12-25",
                                "businessDocumentType_RefID"    => "77000000000057",
                                "brfNumber"                     => "BRF-24000225",
                                "brfDate"                       => "2024-12-07",
                                "brfTotal"                      => '4240000'
                            ],
                            "content" => [
                                "general" => [
                                    "budget" => [
                                        "multipleSource" => false,
                                        "combinedBudget_RefIDList" => [
                                            "0" => "46000000000033"
                                        ],
                                        "combinedBudgetCodeList" => [
                                            "0" => "Q000062"
                                        ],
                                        "combinedBudgetNameList" => [
                                            "0" => "XL Microcell 2007"
                                        ],
                                        "combinedBudgetSection_RefIDList" => [
                                            "0" => "143000000000307"
                                        ],
                                        "combinedBudgetSectionCodeList" => [
                                            "0" => "240"
                                        ],
                                        "combinedBudgetSectionNameList" => [
                                            "0" => "Cendana Andalas"
                                        ],
                                    ],
                                    "businessDocument" => [
                                        "businessDocumentList" => [
                                            "recordID"  => "74000000020307",
                                            "formBusinessDocumentNumber_RefID" => "76000000000002",
                                            "type_RefID" => "77000000000057",
                                            "typeName" => "Advance Form",
                                            "number" => "Adv/QDC/2022/000239",
                                            "version" => "0",
                                            "dateTimeTZ" => "2022-12-13T00:00:00+07:00"
                                        ],
                                    ],
                                    "workFlow" => [
                                        "historyList" => [
                                            "0" => null
                                        ]
                                    ],
                                    "bankAccount" => [
                                        "beneficiary" => [
                                            "bankAccount_RefID" => "167000000000001",
                                            "bankName" => "Bank Negara Indonesia",
                                            "bankAccountNumber" => "779207704",
                                            "bankAcronym" => "BNI",
                                            "bankAccountName" => "PT QDC Technologies"
                                        ]
                                    ],
                                    "involvedPersons" => [
                                        "0" => [
                                            "sequence" => "1",
                                            "requesterWorkerJobsPosition_RefID" => "164000000000001",
                                            "requesterWorkerFullName" => "Eka Bagus Dwi Putra",
                                            "requesterWorkerName" => "Eka Bagus",
                                            "requesterWorkerFullJobsPositionTitle" => "",
                                            "requesterWorkerJobsPositionName" => null,
                                            "requesterWorkerDepartmentName" => null,
                                            "beneficiaryWorkerJobsPosition_RefID" => "25000000000439",
                                            "beneficiaryWorkerFullName" => null,
                                            "beneficiaryWorkerName" => "Belina Lindarwani",
                                            "beneficiaryWorkerFullJobsPositionTitle" => null,
                                            "beneficiaryWorkerJobsPositionName" => null,
                                            "beneficiaryWorkerDepartmentName" => null,
                                        ]
                                    ],
                                    "internalNotes" => "My Internal Notes",
                                    "remarks" => "Settlement BT Pak Eka Bagus"
                                ],
                                "details" => [
                                    "itemList" => [
                                        "0" => [
                                            "index" => 1,
                                            "dataSource" => "SchData-OLTP-Finance.TblAdvanceDetail",
                                            "recordID" => "82000000000003",
                                            "entities" => [
                                                "product_RefID" => "820001-0000",
                                                "productName" => "Salaries",
                                                "quantity" => "1",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "15000000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033",
                                                "transport" => "2800000",
                                                "allowance" => "2400000",
                                                "entertainment" => "350000",
                                                "other" => "3300000",
                                                "transport_company" => "3700000",
                                                "allowance_company" => "3300000",
                                                "entertainment_company" => "450000",
                                                "other_company" => "5300000",
                                            ]
                                        ],
                                        "1" => [
                                            "index" => 2,
                                            "dataSource" => "SchData-OLTP-Finance.TblAdvanceDetail",
                                            "recordID" => "82000000000003",
                                            "entities" => [
                                                "product_RefID" => "XX",
                                                "productName" => "Others",
                                                "quantity" => "3",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "500000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033",
                                                "transport" => "2900000",
                                                "allowance" => "2500000",
                                                "entertainment" => "400000",
                                                "other" => "3400000",
                                                "transport_company" => "3800000",
                                                "allowance_company" => "3400000",
                                                "entertainment_company" => "500000",
                                                "other_company" => "5400000",
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                ]
            ];

            $indexing = -1;
            switch ($bsf_number) {
                case "BSF-24000208":
                    $indexing = 0;
                    break;
                case "BSF-24000209":
                    $indexing = 1;
                    break;
                default:
                    $indexing = 2;
                    break;
            }

            $splitResponse = $getReportAdvanceDetail['data'][$indexing]['document'];

            $totalBSF = array_reduce($splitResponse['content']['details']['itemList'], function ($carry, $item) {
                return $carry + ($item['entities']['transport'] + $item['entities']['allowance'] + $item['entities']['entertainment'] + $item['entities']['other'] + $item['entities']['transport_company'] + $item['entities']['allowance_company'] + $item['entities']['entertainment_company'] + $item['entities']['other_company'] ?? 0);
            }, 0);

            $compact = [
                'dataHeader'    => $splitResponse['header'],
                'dataDetails'   => $splitResponse['content'],
                'budgetCode'    => $project_code, 
                'budgetName'    => $project_name_second,
                'siteCode'      => $site_code,
                'siteName'      => $site_name_second,
                'bsfNumber'     => $bsf_number,
                'bsfId'         => $bsf_id,
                'totalBSF'      => $totalBSF
            ];

            Session::put("isButtonReportBusinessTripSettlementDetailSubmit", true);
            Session::put("dataReportBusinessTripSettlementDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripSettlementDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripSettlementDetailStore(Request $request) 
    {
        try {
            $project_code           = $request->bsf_number_budget;
            $project_name_second    = $request->bsf_number_budget_name;

            $site_code              = $request->bsf_number_sub_budget;
            $site_name_second       = $request->bsf_number_sub_budget_name;

            $bsf_number             = $request->bsf_number_trano;
            $bsf_id                 = $request->bsf_number_id;

            if (!$bsf_id) {
                Session::forget("isButtonReportBusinessTripSettlementDetailSubmit");
                Session::forget("dataReportBusinessTripSettlementDetail");

                return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementDetail')->with('NotFound', 'BSF Number Cannot Be Empty');
            }

            $compact = $this->ReportBusinessTripSettlementDetailData($project_code, $project_name_second, $site_code, $site_name_second, $bsf_number, $bsf_id);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementDetail');
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripSettlementDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportBusinessTripSettlementDetail(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportBusinessTripSettlementDetail");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportBusinessTripSettlementDetailSubmit");
                Session::forget("dataReportBusinessTripSettlementDetail");

                return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementDetail')->with('NotFound', 'BSF Number Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripSettlement.Reports.ReportBusinessTripSettlementDetail_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Settlement Detail.pdf');
                } else {
                    return Excel::download(new ExportReportBusinessTripSettlementDetail, 'Export Report Business Trip Settlement Detail.xlsx');
                }
            } else {
                return redirect()->route('BusinessTripSettlement.ReportBusinessTripSettlementDetail')->with('NotFound', 'BSF Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportBusinessTripSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}