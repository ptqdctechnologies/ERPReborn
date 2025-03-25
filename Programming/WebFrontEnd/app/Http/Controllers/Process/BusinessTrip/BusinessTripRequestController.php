<?php

namespace App\Http\Controllers\Process\BusinessTrip;

use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripRequestSummary;
use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripRequestDetail;
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

class BusinessTripRequestController extends Controller
{
    public function calculateTotal($filteredData, $key) {
        return array_reduce($filteredData, function ($carry, $item) use ($key) {
            return $carry + ($item[$key] ?? 0);
        }, 0);
    }

    public function index(Request $request)
    {   
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionBusinessTripRequest");

        $var = 0;
        if(!empty($_GET['var'])){
           $var =  $_GET['var'];
        }
        
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];
    
        return view('Process.BusinessTrip.BusinessTripRequest.Transactions.CreateBusinessTripRequest', $compact);
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $input = $request->all();

        $TransportationTypeID = array_map('intval', explode(',', $input['TransportTypeApplicable']));
        $detailBrf = [];

        //DETAIL
        $count_product = count($input['var_product_id']);
        for($n =0; $n < $count_product; $n++){
            $detailBrf[$n] = [
                [
                'entities' => [
                    'businessTripCostComponentEntity_RefID' => 81000000000001,
                    'amountCurrency_RefID' => (int)$input['var_currency_id'][$n],
                    'amountCurrencyValue' => (int)$input['var_allowance'][$n],
                    'amountCurrencyExchangeRate' => 1,
                    'remarks' => ''                                    
                    ]                                   
                ],
                [
                'entities' => [
                    'businessTripCostComponentEntity_RefID' => 81000000000003,
                    'amountCurrency_RefID' => (int)$input['var_currency_id'][$n],
                    'amountCurrencyValue' => (int)$input['var_accomodation'][$n],
                    'amountCurrencyExchangeRate' => 1,
                    'remarks' => ''                                    
                    ]                                   
                ],
                [
                'entities' => [
                    'businessTripCostComponentEntity_RefID' => 81000000000004,
                    'amountCurrency_RefID' => (int)$input['var_currency_id'][$n],
                    'amountCurrencyValue' => (int)$input['var_other'][$n],
                    'amountCurrencyExchangeRate' => 1,
                    'remarks' => ''  
                    ]
                ],
            ];
        }

        // dd($detailBrf);

        //HEADER
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.create.humanResource.setPersonBusinessTrip', 
            'latest', 
            [
                'entities' => 
                [
                    "documentDateTimeTZ" => $input['var_date'],
                    'combinedBudgetSectionDetail_RefID' => (int) $input['var_combinedBudgetSectionDetail_RefID'],
                    'paymentDisbursementMethod_RefID' => (int) $input['paymentApplicable'],
                    "additionalData" => [
                        "itemList" => [
                            'items' => [
                                    [
                                    'entities' => [
                                        'sequence' => 1,
                                        'requesterWorkerJobsPosition_RefID' => (int)$input['request_name_id'],
                                        'startDateTimeTZ' => $input['dateCommance'],
                                        'finishDateTimeTZ' => $input['dateEnd'],
                                        'businessTripAccommodationArrangementsType_RefID' =>  (int)$input['accomodationArrange'],
                                        'businessTripTransportationType_RefIDArray' => $TransportationTypeID,
                                        'remarks' => 'Catatan',
                                        'additionalData' => [
                                            'itemList' => [
                                                'items' =>  $detailBrf
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]                    
        );

        dd($varData);


        // $compact = [
        //     "brfnumber"=> $varData['data']['recordID'],
        // ];

        // return response()->json($compact); 
    }
    
    public function BusinessTripRequestListData(Request $request)
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
    
    public function RevisionBusinessTripRequestIndex(Request $request)
    {
        try {
            // $searchBrfNumberRevisionId = $request->input('searchBrfNumberRevisionId');
            $varAPIWebToken = Session::get('SessionLogin');

            // // DATA REVISION
            // $filteredArray = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken,
            //     'transaction.read.dataList.finance.getAdvanceReport',
            //     'latest',
            //     [
            //         'parameter' => [
            //             'advance_RefID' => (int) $searchBrfNumberRevisionId,
            //         ],
            //         'SQLStatement' => [
            //             'pick' => null,
            //             'sort' => null,
            //             'filter' => null,
            //             'paging' => null
            //         ]
            //     ],
            //     false
            // );
            // // dd($filteredArray);
            $compact = [
                // 'dataHeader' => $filteredArray['data'][0]['document']['header'],
                // 'dataContent' => $filteredArray['data'][0]['document']['content']['general'],
                // 'dataDetail' => $filteredArray['data'][0]['document']['content']['details']['itemList'],
                'varAPIWebToken' => $varAPIWebToken,
                // 'statusRevisi' => 1,
                // 'statusFinalApprove' => "No",
            ];
            return view('Process.BusinessTrip.BusinessTripRequest.Transactions.RevisionBusinessTripRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function BusinessTripRequestListCartRevision(Request $request)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $advance_RefID = $request->input('advance_RefID');

        $varData = Helper_APICall::setCallAPIGateway(
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
        return response()->json($varData['data']);
    }

    public function ReportBusinessTripRequestSummary(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripRequestSummarySubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripRequestSummary', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Process.BusinessTrip.BusinessTripRequest.Reports.ReportBusinessTripRequestSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestSummary Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripRequestSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position) 
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

            // DUMMY DATA (2 PAGE)
            $getReportAdvanceSummary = [
                [
                    "DocumentNumber" => "BRF-24000229",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "6300000.00",
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
                    "DirectToVendor" => "11632633.83",
                    "ByCorpCard" => "5095132.82",
                ],
                [
                    "DocumentNumber" => "BRF-24000228",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "8400000.00",
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
                    "DirectToVendor" => "12993994.42",
                    "ByCorpCard" => "4296891.03",
                ],
                [
                    "DocumentNumber" => "BRF-24000227",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "5900000.00",
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
                    "DirectToVendor" => "2389051.36",
                    "ByCorpCard" => "8143150.32",
                ],
                [
                    "DocumentNumber" => "BRF-24000226",
                    "DocumentDateTimeTZ" => "2024-12-26 00:00:00+07",
                    "TotalBusinessTrip" => "7600000.00",
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
                    "DirectToVendor" => "6054697.34",
                    "ByCorpCard" => "12253790.16",
                ],
                [
                    "DocumentNumber" => "BRF-24000225",
                    "DocumentDateTimeTZ" => "2024-12-26 00:00:00+07",
                    "TotalBusinessTrip" => "5200000.00",
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
                    "DirectToVendor" => "9761372.59",
                    "ByCorpCard" => "10151969.28",
                ],
                [
                    "DocumentNumber" => "BRF-24000224",
                    "DocumentDateTimeTZ" => "2024-12-25 00:00:00+07",
                    "TotalBusinessTrip" => "6900000.00",
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
                    "DirectToVendor" => "4566099.89",
                    "ByCorpCard" => "5316023.26",
                ],
                [
                    "DocumentNumber" => "BRF-24000223",
                    "DocumentDateTimeTZ" => "2024-12-24 00:00:00+07",
                    "TotalBusinessTrip" => "4700000.00",
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
                    "DirectToVendor" => "5247421.23",
                    "ByCorpCard" => "1215213.85",
                ],
                [
                    "DocumentNumber" => "BRF-24000222",
                    "DocumentDateTimeTZ" => "2024-12-23 00:00:00+07",
                    "TotalBusinessTrip" => "8100000.00",
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
                    "DirectToVendor" => "555701.37",
                    "ByCorpCard" => "1085223.38",
                ],
                [
                    "DocumentNumber" => "BRF-24000221",
                    "DocumentDateTimeTZ" => "2024-12-20 00:00:00+07",
                    "TotalBusinessTrip" => "5600000.00",
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
                    "DirectToVendor" => "9846572.38",
                    "ByCorpCard" => "7405033.38",
                ],
                [
                    "DocumentNumber" => "BRF-24000220",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "TotalBusinessTrip" => "7300000.00",
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
                    "DirectToVendor" => "412834.03",
                    "ByCorpCard" => "7023584.36",
                ],
                [
                    "DocumentNumber" => "BRF-24000219",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "TotalBusinessTrip" => "6400000.00",
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
                    "DirectToVendor" => "8144604.62",
                    "ByCorpCard" => "1742125.93",
                ],
                [
                    "DocumentNumber" => "BRF-24000218",
                    "DocumentDateTimeTZ" => "2024-12-19 00:00:00+07",
                    "TotalBusinessTrip" => "7100000.00",
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
                    "DirectToVendor" => "1678891.67",
                    "ByCorpCard" => "11445578.27",
                ],
                [
                    "DocumentNumber" => "BRF-24000217",
                    "DocumentDateTimeTZ" => "2024-12-18 00:00:00+07",
                    "TotalBusinessTrip" => "4900000.00",
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
                    "DirectToVendor" => "13076269.64",
                    "ByCorpCard" => "3469770.83",
                ],
                [
                    "DocumentNumber" => "BRF-24000216",
                    "DocumentDateTimeTZ" => "2024-12-17 00:00:00+07",
                    "TotalBusinessTrip" => "8800000.00",
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
                    "DirectToVendor" => "3636630.76",
                    "ByCorpCard" => "1019176.27",
                ],
                [
                    "DocumentNumber" => "BRF-24000215",
                    "DocumentDateTimeTZ" => "2024-12-13 00:00:00+07",
                    "TotalBusinessTrip" => "5300000.00",
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
                    "DirectToVendor" => "5584803.97",
                    "ByCorpCard" => "1074832.13",
                ],
                [
                    "DocumentNumber" => "BRF-24000214",
                    "DocumentDateTimeTZ" => "2024-12-13 00:00:00+07",
                    "TotalBusinessTrip" => "6700000.00",
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
                    "DirectToVendor" => "11699956.83",
                    "ByCorpCard" => "981594.58",
                ],
                [
                    "DocumentNumber" => "BRF-24000213",
                    "DocumentDateTimeTZ" => "2024-12-12 00:00:00+07",
                    "TotalBusinessTrip" => "7800000.00",
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
                    "DirectToVendor" => "6191598.49",
                    "ByCorpCard" => "2423840.88",
                ],
                [
                    "DocumentNumber" => "BRF-24000212",
                    "DocumentDateTimeTZ" => "2024-12-11 00:00:00+07",
                    "TotalBusinessTrip" => "5100000.00",
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
                    "DirectToVendor" => "3990965.70",
                    "ByCorpCard" => "895938.52",
                ],
                [
                    "DocumentNumber" => "BRF-24000211",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "8200000.00",
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
                    "DirectToVendor" => "4290339.17",
                    "ByCorpCard" => "2207263.87",
                ],
                [
                    "DocumentNumber" => "BRF-24000210",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "6200000.00",
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
                    "DirectToVendor" => "6506060.02",
                    "ByCorpCard" => "6407582.00",
                ],
                [
                    "DocumentNumber" => "BRF-24000209",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "7500000.00",
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
                    "DirectToVendor" => "4580540.68",
                    "ByCorpCard" => "7677468.37",
                ],
                [
                    "DocumentNumber" => "BRF-24000208",
                    "DocumentDateTimeTZ" => "2024-12-10 00:00:00+07",
                    "TotalBusinessTrip" => "5800000.00",
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
                    "DirectToVendor" => "9812027.67",
                    "ByCorpCard" => "4722046.68",
                ],
                [
                    "DocumentNumber" => "BRF-24000207",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "TotalBusinessTrip" => "9000000.00",
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
                    "DirectToVendor" => "9217656.66",
                    "ByCorpCard" => "1818964.19",
                ],
                [
                    "DocumentNumber" => "BRF-24000206",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "TotalBusinessTrip" => "4200000.00",
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
                    "DirectToVendor" => "8767743.46",
                    "ByCorpCard" => "2790922.28",
                ],
                [
                    "DocumentNumber" => "BRF-24000205",
                    "DocumentDateTimeTZ" => "2024-12-09 00:00:00+07",
                    "TotalBusinessTrip" => "8500000.00",
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
                    "DirectToVendor" => "9445254.91",
                    "ByCorpCard" => "11937158.49",
                ],
                [
                    "DocumentNumber" => "BRF-24000204",
                    "DocumentDateTimeTZ" => "2024-12-06 00:00:00+07",
                    "TotalBusinessTrip" => "3800000.00",
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
                    "DirectToVendor" => "7185994.58",
                    "ByCorpCard" => "513655.62",
                ],
                [
                    "DocumentNumber" => "BRF-24000203",
                    "DocumentDateTimeTZ" => "2024-12-05 00:00:00+07",
                    "TotalBusinessTrip" => "7200000.00",
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
                    "DirectToVendor" => "5075630.00",
                    "ByCorpCard" => "1780691.21",
                ],
                [
                    "DocumentNumber" => "BRF-24000202",
                    "DocumentDateTimeTZ" => "2024-12-04 00:00:00+07",
                    "TotalBusinessTrip" => "5500000.00",
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
                    "DirectToVendor" => "668860.66",
                    "ByCorpCard" => "9816691.90",
                ],
                [
                    "DocumentNumber" => "BRF-24000201",
                    "DocumentDateTimeTZ" => "2024-12-03 00:00:00+07",
                    "TotalBusinessTrip" => "4500000.00",
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
                    "DirectToVendor" => "163579.34",
                    "ByCorpCard" => "3944147.35",
                ],
                [
                    "DocumentNumber" => "BRF-24000200",
                    "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
                    "TotalBusinessTrip" => "6000000.00",
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
                    "DirectToVendor" => "1906782.56",
                    "ByCorpCard" => "789801.69",
                ],
            ];

            // DUMMY DATA (2 PAGE)
            // $getReportAdvanceSummary = [
            //     [
            //         "DocumentNumber" => "BRF-24000200",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "6000000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "BT Pak Sagala presentasi HTLS Batam",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Batam"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000201",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "4500000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Survey lokasi BTS Medan",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Medan"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000202",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5500000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Meeting vendor Surabaya",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Surabaya"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000203",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "7200000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Instalasi perangkat Makassar",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Makassar"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000204",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "3800000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Training teknisi Bandung",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Bandung"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000205",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "8500000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Maintenance BTS Manado",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Manado"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000206",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "4200000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Meeting koordinasi Semarang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Semarang"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000207",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "9000000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Audit site Jayapura",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Jayapura"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000208",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5800000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Survey lokasi Palembang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Palembang"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000209",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "7500000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Presentasi project Denpasar",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Denpasar"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000210",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "6200000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Training team Yogyakarta",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Yogyakarta",
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000211",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "8200000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Maintenance BTS Ambon",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Ambon"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000212",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5100000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Meeting koordinasi Pekanbaru",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Pekanbaru"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000213",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "7800000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Survey lokasi Pontianak",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Pontianak"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000214",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "6700000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Instalasi perangkat Banjarmasin",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Banjarmasin"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000215",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5300000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Training teknisi Padang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Padang"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000216",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "8800000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Audit site Sorong",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Sorong"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000217",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "4900000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Meeting vendor Malang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Malang"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000218",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "7100000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Presentasi project Samarinda",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Samarinda"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000219",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "6400000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Maintenance BTS Kupang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Kupang"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000220",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "7300000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Survey lokasi Balikpapan",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Balikpapan"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000221",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5600000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Meeting koordinasi Mataram",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Mataram"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000222",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "8100000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Instalasi perangkat Ternate",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Ternate"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000223",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "4700000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Training team Jambi",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Jambi"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000224",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "6900000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Audit site Kendari",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Kendari"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000225",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5200000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Meeting vendor Bengkulu",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Bengkulu"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000226",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "7600000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Survey lokasi Gorontalo",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Gorontalo"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000227",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "5900000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Maintenance BTS Pangkal Pinang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Pangkal Pinang"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000228",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "8400000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Training teknisi Merauke",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Merauke"
            //     ],
            //     [
            //         "DocumentNumber" => "BRF-24000229",
            //         "DocumentDateTimeTZ" => "2024-12-02 00:00:00+07",
            //         "TotalBusinessTrip" => "6300000.00",
            //         "Sys_ID" => 76000000000054,
            //         "CombinedBudgetCode" => "Q000062",
            //         "CombinedBudgetName" => "XL Microcell 2007",
            //         "CombinedBudgetSectionCode" => "235",
            //         "CombinedBudgetSectionName" => $site_name,
            //         "RequesterWorkerJobsPosition_RefID" => 164000000000023,
            //         "RequesterWorkerName" => $requester_name,
            //         "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
            //         "BeneficiaryWorkerName" => $beneficiary_name,
            //         "CurrencyName" => "IDR",
            //         "Product_ID" => 88000000000527,
            //         "CombinedBudget_RefID" => 46000000000033,
            //         "CombinedBudgetSection_RefID" => 143000000000305,
            //         "remark" => "Presentasi project Tanjung Pinang",
            //         "DepartingFrom" => "Jakarta",
            //         "DestinationTo" => "Tanjung Pinang"
            //     ]
            // ];

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

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
                return $carry + ($item['TotalAdvance'] ?? 0);
            }, 0);

            $compact = [
                // 'dataDetail'         => $filteredData,
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
            ];

            Session::put("isButtonReportBusinessTripRequestSummarySubmit", true);
            Session::put("dataReportBusinessTripRequestSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestSummaryData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripRequestSummaryStore(Request $request) 
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
                Session::forget("isButtonReportBusinessTripRequestSummarySubmit");
                Session::forget("dataReportBusinessTripRequestSummary");

                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            $compact = $this->ReportBusinessTripRequestSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestSummary');
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestSummaryStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportBusinessTripRequestSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportBusinessTripRequestSummary");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportBusinessTripRequestSummarySubmit");
                Session::forget("dataReportBusinessTripRequestSummary");
        
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripRequest.Reports.ReportBusinessTripRequestSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Request Summary.pdf');
                } else {
                    return Excel::download(new ExportReportBusinessTripRequestSummary, 'Export Report Business Trip Request Summary.xlsx');
                }
            } else {
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportBusinessTripRequestSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripRequestDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripRequestDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripRequestDetail', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.BusinessTrip.BusinessTripRequest.Reports.ReportBusinessTripRequestDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripRequestDetailData($brf_trano, $brf_id, $brf_budget, $brf_budget_name, $brf_sub_budget, $brf_sub_budget_name)
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

            $getReportAdvanceDetail = [
                'data' => [
                    "0" => [
                        "document" => [
                            "header" => [
                                "recordID"                      => "76000000000002",
                                "title"                         => "Advance Form",
                                "number"                        => "Adv/QDC/2022/000239",
                                "version"                       => "0",
                                "date"                          => "2022-12-13",
                                "businessDocumentType_RefID"    => "77000000000057"
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
                                                "product_RefID" => "88000000000927",
                                                "productName" => "PLN - Biaya Penyambungan",
                                                "quantity" => "0.5",
                                                "quantityUnit_RefID" => "73000000000024",
                                                "quantityUnitName" => "kva",
                                                "productUnitPriceBaseCurrencyValue" => "12000000",
                                                "priceCurrency_RefID" => "62000000000001",
                                                "priceCurrencyISOCode" => "IDR",
                                                "priceBaseCurrencyValue" => "6000000",
                                                "combinedBudgetSectionDetail_RefID" => "169000000000030",
                                                "combinedBudget_RefID" => "46000000000033"
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            $splitResponse = $getReportAdvanceDetail['data'][0]['document'];

            $compact = [
                'dataHeaderOne'     => [
                    'brfId'             => $brf_id,
                    'brfNumber'         => $brf_trano,
                    'budgetCode'        => $brf_budget,
                    'budgetName'        => $brf_budget_name,
                    'siteCode'          => $brf_sub_budget,
                    'siteName'          => $brf_sub_budget_name,
                    'productID'         => '820005-0000',
                    'productName'       => 'Travel & Fares/Business Trip',
                    'dateCommence'      => '2024-12-18',
                    'dateEnd'           => '2024-12-20',
                    'dateBRF'           => '2024-12-12',
                    'contactPhone'      => '0896734873',
                    'bankType'          => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAcronym'],
                    'bankAccountNumber' => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAccountNumber'],
                    'bankAccountName'   => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAccountName'],
                    'requester'         => $splitResponse['content']['general']['involvedPersons'][0]['requesterWorkerName'],
                    'beneficiary'       => $splitResponse['content']['general']['involvedPersons'][0]['beneficiaryWorkerName'],
                    'departingFrom'     => 'Jakarta',
                    'destinationTo'     => 'Batam',
                ],
                'dataHeaderTwo'     => [
                    'totalAllowance'        => '240000.00',
                    'totalEntertainment'    => '100000.00',
                    'totalOther'            => '100000.00',
                    'totalTransport'        => '3450000.00',
                    'totalAccommodation'    => '0.00',
                    'totalBusinessTrip'     => '3890000.00',
                ],
                'dataHeaderThree'   => [
                    'reason'    => 'Silahturahmi PLN JBT dan cari info tender batam beserta info lain'
                ],
            ];

            Session::put("isButtonReportBusinessTripRequestDetailSubmit", true);
            Session::put("dataReportBusinessTripRequestDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripRequestDetailStore(Request $request)
    {
        try {
            $brf_trano              = $request->brf_number_trano;
            $brf_id                 = $request->brf_number_id;
            $brf_budget             = $request->brf_number_budget;
            $brf_budget_name        = $request->brf_number_budget_name;
            $brf_sub_budget         = $request->brf_number_sub_budget;
            $brf_sub_budget_name    = $request->brf_number_sub_budget_name;

            if (!$brf_id) {
                Session::forget("isButtonReportBusinessTripRequestDetailSubmit");
                Session::forget("dataReportBusinessTripRequestDetail");

                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail')->with('NotFound', 'BRF Number Cannot Be Empty');
            }

            $compact = $this->ReportBusinessTripRequestDetailData($brf_trano, $brf_id, $brf_budget, $brf_budget_name, $brf_sub_budget, $brf_sub_budget_name);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail');
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripToBSF(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripToBSFSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripToBSF', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.BusinessTrip.BusinessTripToBSF.Reports.ReportBusinessTripToBSF', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripToBSF Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripToBSFData($project, $site, $requester) 
    {
        try {
            $dataDummy = [
                [
                    "Sys_ID" => 76000000000001,
                    "DocumentNumber" => "BRF-25000063",
                    "DocumentDateTimeTZ" => "2024-05-10 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "1000000.00",
                    "TotalAllowance" => "950000.00",
                    "TotalEntertainment" => "500000.00",
                    "TotalOther" => "300000.00",
                    "TotalPayment" => "2450000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-06-01 00:00:00+07",
                    "DateEndTravel" => "2024-06-05 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000054",
                    "DocumentBSFDateTimeTZ" => "2024-06-10 00:00:00+07",
                    "TotalBSFTravel" => "1000000.00",
                    "TotalBSFAllowance" => "950000.00",
                    "TotalBSFEntertainment" => "500000.00",
                    "TotalBSFOther" => "300000.00",
                    "TotalExpenseClaimTravel" => "1000000.00",
                    "TotalExpenseClaimAllowance" => "950000.00",
                    "TotalExpenseClaimEntertainment" => "500000.00",
                    "TotalExpenseClaimOther" => "300000.00",
                    "TotalAmountToCompanyTravel" => "1000000.00",
                    "TotalAmountToCompanyAllowance" => "950000.00",
                    "TotalAmountToCompanyEntertainment" => "500000.00",
                    "TotalAmountToCompanyOther" => "300000.00",
                    "Description" => "BT Ares Antar Procurement untuk Sourcing mandor ke Purwodadi",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000002,
                    "DocumentNumber" => "BRF-25000064",
                    "DocumentDateTimeTZ" => "2024-05-15 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "2000000.00",
                    "TotalAllowance" => "1900000.00",
                    "TotalEntertainment" => "1200000.00",
                    "TotalOther" => "800000.00",
                    "TotalPayment" => "5900000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-06-06 00:00:00+07",
                    "DateEndTravel" => "2024-06-10 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000055",
                    "DocumentBSFDateTimeTZ" => "2024-06-15 00:00:00+07",
                    "TotalBSFTravel" => "2000000.00",
                    "TotalBSFAllowance" => "1900000.00",
                    "TotalBSFEntertainment" => "1200000.00",
                    "TotalBSFOther" => "800000.00",
                    "TotalExpenseClaimTravel" => "2000000.00",
                    "TotalExpenseClaimAllowance" => "1900000.00",
                    "TotalExpenseClaimEntertainment" => "1200000.00",
                    "TotalExpenseClaimOther" => "800000.00",
                    "TotalAmountToCompanyTravel" => "2000000.00",
                    "TotalAmountToCompanyAllowance" => "1900000.00",
                    "TotalAmountToCompanyEntertainment" => "1200000.00",
                    "TotalAmountToCompanyOther" => "800000.00",
                    "Description" => "BT Pak Sagala presentasi HTLS Batam",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000003,
                    "DocumentNumber" => "BRF-25000065",
                    "DocumentDateTimeTZ" => "2024-05-20 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "750000.00",
                    "TotalAllowance" => "500000.00",
                    "TotalEntertainment" => "300000.00",
                    "TotalOther" => "200000.00",
                    "TotalPayment" => "1750000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-06-11 00:00:00+07",
                    "DateEndTravel" => "2024-06-15 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000056",
                    "DocumentBSFDateTimeTZ" => "2024-06-20 00:00:00+07",
                    "TotalBSFTravel" => "750000.00",
                    "TotalBSFAllowance" => "500000.00",
                    "TotalBSFEntertainment" => "300000.00",
                    "TotalBSFOther" => "200000.00",
                    "TotalExpenseClaimTravel" => "750000.00",
                    "TotalExpenseClaimAllowance" => "500000.00",
                    "TotalExpenseClaimEntertainment" => "300000.00",
                    "TotalExpenseClaimOther" => "200000.00",
                    "TotalAmountToCompanyTravel" => "750000.00",
                    "TotalAmountToCompanyAllowance" => "500000.00",
                    "TotalAmountToCompanyEntertainment" => "300000.00",
                    "TotalAmountToCompanyOther" => "200000.00",
                    "Description" => "BT Pak Eddy - Kolega Qdc untuk meeting dengan Pertamina RU IV Cilacap",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000004,
                    "DocumentNumber" => "BRF-25000066",
                    "DocumentDateTimeTZ" => "2024-05-25 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "3500000.00",
                    "TotalAllowance" => "3200000.00",
                    "TotalEntertainment" => "1500000.00",
                    "TotalOther" => "1200000.00",
                    "TotalPayment" => "10400000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-06-16 00:00:00+07",
                    "DateEndTravel" => "2024-06-20 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000057",
                    "DocumentBSFDateTimeTZ" => "2024-06-25 00:00:00+07",
                    "TotalBSFTravel" => "3500000.00",
                    "TotalBSFAllowance" => "3200000.00",
                    "TotalBSFEntertainment" => "1500000.00",
                    "TotalBSFOther" => "1200000.00",
                    "TotalExpenseClaimTravel" => "3500000.00",
                    "TotalExpenseClaimAllowance" => "3200000.00",
                    "TotalExpenseClaimEntertainment" => "1500000.00",
                    "TotalExpenseClaimOther" => "1200000.00",
                    "TotalAmountToCompanyTravel" => "3500000.00",
                    "TotalAmountToCompanyAllowance" => "3200000.00",
                    "TotalAmountToCompanyEntertainment" => "1500000.00",
                    "TotalAmountToCompanyOther" => "1200000.00",
                    "Description" => "Antar Pak anugerah ke bandung",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000005,
                    "DocumentNumber" => "BRF-25000067",
                    "DocumentDateTimeTZ" => "2024-05-30 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "5000000.00",
                    "TotalAllowance" => "4500000.00",
                    "TotalEntertainment" => "2000000.00",
                    "TotalOther" => "1500000.00",
                    "TotalPayment" => "13000000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-06-21 00:00:00+07",
                    "DateEndTravel" => "2024-06-25 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000058",
                    "DocumentBSFDateTimeTZ" => "2024-06-30 00:00:00+07",
                    "TotalBSFTravel" => "5000000.00",
                    "TotalBSFAllowance" => "4500000.00",
                    "TotalBSFEntertainment" => "2000000.00",
                    "TotalBSFOther" => "1500000.00",
                    "TotalExpenseClaimTravel" => "5000000.00",
                    "TotalExpenseClaimAllowance" => "4500000.00",
                    "TotalExpenseClaimEntertainment" => "2000000.00",
                    "TotalExpenseClaimOther" => "1500000.00",
                    "TotalAmountToCompanyTravel" => "5000000.00",
                    "TotalAmountToCompanyAllowance" => "4500000.00",
                    "TotalAmountToCompanyEntertainment" => "2000000.00",
                    "TotalAmountToCompanyOther" => "1500000.00",
                    "Description" => "Silahturahmi PLN JBT dan cari info tender jatiluhur beserta info lain",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000006,
                    "DocumentNumber" => "BRF-25000068",
                    "DocumentDateTimeTZ" => "2024-06-05 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "3000000.00",
                    "TotalAllowance" => "2700000.00",
                    "TotalEntertainment" => "1300000.00",
                    "TotalOther" => "1000000.00",
                    "TotalPayment" => "8000000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-06-26 00:00:00+07",
                    "DateEndTravel" => "2024-06-30 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000059",
                    "DocumentBSFDateTimeTZ" => "2024-07-05 00:00:00+07",
                    "TotalBSFTravel" => "3000000.00",
                    "TotalBSFAllowance" => "2700000.00",
                    "TotalBSFEntertainment" => "1300000.00",
                    "TotalBSFOther" => "1000000.00",
                    "TotalExpenseClaimTravel" => "3000000.00",
                    "TotalExpenseClaimAllowance" => "2700000.00",
                    "TotalExpenseClaimEntertainment" => "1300000.00",
                    "TotalExpenseClaimOther" => "1000000.00",
                    "TotalAmountToCompanyTravel" => "3000000.00",
                    "TotalAmountToCompanyAllowance" => "2700000.00",
                    "TotalAmountToCompanyEntertainment" => "1300000.00",
                    "TotalAmountToCompanyOther" => "1000000.00",
                    "Description" => "Site Visit pembangunan GI Sebuku New 30 MVA",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000007,
                    "DocumentNumber" => "BRF-25000069",
                    "DocumentDateTimeTZ" => "2024-06-10 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "800000.00",
                    "TotalAllowance" => "700000.00",
                    "TotalEntertainment" => "400000.00",
                    "TotalOther" => "250000.00",
                    "TotalPayment" => "2150000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-07-01 00:00:00+07",
                    "DateEndTravel" => "2024-07-05 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000060",
                    "DocumentBSFDateTimeTZ" => "2024-07-10 00:00:00+07",
                    "TotalBSFTravel" => "800000.00",
                    "TotalBSFAllowance" => "700000.00",
                    "TotalBSFEntertainment" => "400000.00",
                    "TotalBSFOther" => "250000.00",
                    "TotalExpenseClaimTravel" => "800000.00",
                    "TotalExpenseClaimAllowance" => "700000.00",
                    "TotalExpenseClaimEntertainment" => "400000.00",
                    "TotalExpenseClaimOther" => "250000.00",
                    "TotalAmountToCompanyTravel" => "800000.00",
                    "TotalAmountToCompanyAllowance" => "700000.00",
                    "TotalAmountToCompanyEntertainment" => "400000.00",
                    "TotalAmountToCompanyOther" => "250000.00",
                    "Description" => "Meeting dengan Pertamina",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000008,
                    "DocumentNumber" => "BRF-25000070",
                    "DocumentDateTimeTZ" => "2024-06-15 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "2200000.00",
                    "TotalAllowance" => "2100000.00",
                    "TotalEntertainment" => "1000000.00",
                    "TotalOther" => "500000.00",
                    "TotalPayment" => "5800000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-07-06 00:00:00+07",
                    "DateEndTravel" => "2024-07-10 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000061",
                    "DocumentBSFDateTimeTZ" => "2024-07-15 00:00:00+07",
                    "TotalBSFTravel" => "2200000.00",
                    "TotalBSFAllowance" => "2100000.00",
                    "TotalBSFEntertainment" => "1000000.00",
                    "TotalBSFOther" => "500000.00",
                    "TotalExpenseClaimTravel" => "2200000.00",
                    "TotalExpenseClaimAllowance" => "2100000.00",
                    "TotalExpenseClaimEntertainment" => "1000000.00",
                    "TotalExpenseClaimOther" => "500000.00",
                    "TotalAmountToCompanyTravel" => "2200000.00",
                    "TotalAmountToCompanyAllowance" => "2100000.00",
                    "TotalAmountToCompanyEntertainment" => "1000000.00",
                    "TotalAmountToCompanyOther" => "500000.00",
                    "Description" => "Submission Tender Pembangunan ext kapasitor bay trafo GI pbun",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000009,
                    "DocumentNumber" => "BRF-25000071",
                    "DocumentDateTimeTZ" => "2024-06-20 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "900000.00",
                    "TotalAllowance" => "850000.00",
                    "TotalEntertainment" => "400000.00",
                    "TotalOther" => "300000.00",
                    "TotalPayment" => "2450000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-07-11 00:00:00+07",
                    "DateEndTravel" => "2024-07-15 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000062",
                    "DocumentBSFDateTimeTZ" => "2024-07-20 00:00:00+07",
                    "TotalBSFTravel" => "900000.00",
                    "TotalBSFAllowance" => "850000.00",
                    "TotalBSFEntertainment" => "400000.00",
                    "TotalBSFOther" => "300000.00",
                    "TotalExpenseClaimTravel" => "900000.00",
                    "TotalExpenseClaimAllowance" => "850000.00",
                    "TotalExpenseClaimEntertainment" => "400000.00",
                    "TotalExpenseClaimOther" => "300000.00",
                    "TotalAmountToCompanyTravel" => "900000.00",
                    "TotalAmountToCompanyAllowance" => "850000.00",
                    "TotalAmountToCompanyEntertainment" => "400000.00",
                    "TotalAmountToCompanyOther" => "300000.00",
                    "Description" => "Site Visit GI Pangkalan Bun dengan Bank BRI (Pak Khamdan)",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
                [
                    "Sys_ID" => 76000000000010,
                    "DocumentNumber" => "BRF-25000072",
                    "DocumentDateTimeTZ" => "2024-06-25 00:00:00+07",
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "CombinedBudgetSectionCode" => "254",
                    "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000521,
                    "RequesterWorkerName" => "Fabrian Danang Destiyara",
                    "TotalTravel" => "5500000.00",
                    "TotalAllowance" => "5000000.00",
                    "TotalEntertainment" => "2500000.00",
                    "TotalOther" => "1800000.00",
                    "TotalPayment" => "14800000.00",
                    "Status" => "Final Approval",
                    "DateCommenceTravel" => "2024-07-16 00:00:00+07",
                    "DateEndTravel" => "2024-07-20 00:00:00+07",
                    "DocumentBSFNumber" => "BSF-25000063",
                    "DocumentBSFDateTimeTZ" => "2024-07-25 00:00:00+07",
                    "TotalBSFTravel" => "5500000.00",
                    "TotalBSFAllowance" => "5000000.00",
                    "TotalBSFEntertainment" => "2500000.00",
                    "TotalBSFOther" => "1800000.00",
                    "TotalExpenseClaimTravel" => "5500000.00",
                    "TotalExpenseClaimAllowance" => "5000000.00",
                    "TotalExpenseClaimEntertainment" => "2500000.00",
                    "TotalExpenseClaimOther" => "1800000.00",
                    "TotalAmountToCompanyTravel" => "5500000.00",
                    "TotalAmountToCompanyAllowance" => "5000000.00",
                    "TotalAmountToCompanyEntertainment" => "2500000.00",
                    "TotalAmountToCompanyOther" => "1800000.00",
                    "Description" => "Antar Pak Redi ke BDG, Cilacap dan Indramayu",
                    "StatusBSF" => "Final Approval",
                    "TotalBusinessTripPayment" => "0.00",
                    "TotalBusinessTripSettlement" => "0.00",
                ],
            ];

            $filteredData = array_filter($dataDummy, function ($item) use ($project, $site, $requester) {
                return 
                    (empty($project['id'])      || $item['CombinedBudget_RefID'] == $project['id']) &&
                    (empty($site['id'])         || $item['CombinedBudgetSection_RefID'] == $site['id']) &&
                    (empty($requester['id'])    || $item['RequesterWorkerJobsPosition_RefID'] == $requester['id']);
            });

            $compact = [
                'project'                           => $project,
                'site'                              => $site,
                'requester'                         => $requester,
                'dataDetail'                        => $filteredData,
                'totalTravel'                       => $this->calculateTotal($filteredData, 'TotalTravel'),
                'totalAllowance'                    => $this->calculateTotal($filteredData, 'TotalAllowance'),
                'totalEntertainment'                => $this->calculateTotal($filteredData, 'TotalEntertainment'),
                'totalOther'                        => $this->calculateTotal($filteredData, 'TotalOther'),
                'totalPayment'                      => $this->calculateTotal($filteredData, 'TotalPayment'),
                'totalBSFTravel'                    => $this->calculateTotal($filteredData, 'TotalBSFTravel'),
                'totalBSFAllowance'                 => $this->calculateTotal($filteredData, 'TotalBSFAllowance'),
                'totalBSFEntertainment'             => $this->calculateTotal($filteredData, 'TotalBSFEntertainment'),
                'totalBSFOther'                     => $this->calculateTotal($filteredData, 'TotalBSFOther'),
                'totalExpenseClaimTravel'           => $this->calculateTotal($filteredData, 'TotalExpenseClaimTravel'),
                'totalExpenseClaimAllowance'        => $this->calculateTotal($filteredData, 'TotalExpenseClaimAllowance'),
                'totalExpenseClaimEntertainment'    => $this->calculateTotal($filteredData, 'TotalExpenseClaimEntertainment'),
                'totalExpenseClaimOther'            => $this->calculateTotal($filteredData, 'TotalExpenseClaimOther'),
                'totalAmountToCompanyTravel'        => $this->calculateTotal($filteredData, 'TotalAmountToCompanyTravel'),
                'totalAmountToCompanyAllowance'     => $this->calculateTotal($filteredData, 'TotalAmountToCompanyAllowance'),
                'totalAmountToCompanyEntertainment' => $this->calculateTotal($filteredData, 'TotalAmountToCompanyEntertainment'),
                'totalAmountToCompanyOther'         => $this->calculateTotal($filteredData, 'TotalAmountToCompanyOther'),
                'totalBusinessTripPayment'          => $this->calculateTotal($filteredData, 'TotalBusinessTripPayment'),
                'totalBusinessTripSettlement'       => $this->calculateTotal($filteredData, 'TotalBusinessTripSettlement'),
            ];

            Session::put("isButtonReportBusinessTripToBSFSubmit", true);
            Session::put("dataReportBusinessTripToBSF", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripToBSFData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripToBSFStore(Request $request)
    {
        try {
            $project = [
                'id'        => $request->project_id_second,
                'code'      => $request->project_code_second,
                'name'      => $request->project_name_second,
            ];

            $site = [
                'id'        => $request->site_id_second,
                'code'      => $request->site_code_second,
                'name'      => $request->site_name_second,
            ];

            $requester = [
                'id'        => $request->worker_id_second,
                'name'      => $request->worker_name_second,
                'position'  => $request->worker_position_second,
            ];

            if (!$project['id'] && !$site['id'] && !$requester['id']) {
                Session::forget("isButtonReportBusinessTripToBSFSubmit");
                Session::forget("dataReportBusinessTripToBSF");

                return redirect()->route('BusinessTripRequest.ReportBusinessTripToBSF')->with('NotFound', 'Budget, Sub Budget, & Requester Cannot Be Empty');
            }

            $compact = $this->ReportBusinessTripToBSFData($project, $site, $requester);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('BusinessTripRequest.ReportBusinessTripToBSF');
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripToBSFStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportBusinessTripRequestDetail(Request $request) 
    {
        try {
            $project_code_second_trigger = $request->project_code_second_trigger;
            $dataReport = Session::get("dataReportBusinessTripRequestDetail");
            $print_type = $request->print_type;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportBusinessTripRequestDetailSubmit");
                Session::forget("dataReportBusinessTripRequestDetail");
        
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail')->with('NotFound', 'BRF Number Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripRequest.Reports.ReportBusinessTripRequestDetail_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Request Detail.pdf');
                } else {
                    return Excel::download(new ExportReportBusinessTripRequestDetail, 'Export Report Business Trip Request Detail.xlsx');
                }
            } else {
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail')->with('NotFound', 'BRF Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportBusinessTripRequestDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}