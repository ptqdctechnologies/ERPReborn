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

            $searchBrfNumberRevisionId = $request->input('searchBrfNumberRevisionId');
            $varAPIWebToken = Session::get('SessionLogin');

            // DATA REVISION
            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.finance.getAdvanceReport',
                'latest',
                [
                    'parameter' => [
                        'advance_RefID' => (int) $searchBrfNumberRevisionId,
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
            return view('Process.BusinessTrip.BusinessTripRequest.Transactions.RevisionBusinessTripRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }

        // $varAPIWebToken = $request->session()->get('SessionLogin');
        // $request->session()->forget("SessionBusinessTripRequest");

        // $varDataAdvanceRevision = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'report.form.documentForm.finance.getAdvance', 
        //     'latest',
        //     [
        //     'parameter' => [
        //         'recordID' => (int) $request->input('searchBrfNumberRevisionId'),
        //         ]
        //     ]
        //     );
        // // dd($varDataAdvanceRevision);
        // $compact = [
        //     'dataRevisi' => $varDataAdvanceRevision['data'][0]['document']['content']['general'],
        //     'var_recordID' => $request->input('searchBrfNumberRevisionId'),
        //     'varAPIWebToken' => $varAPIWebToken,
        //     'statusRevisi' => 1,
        //     'trano' => $varDataAdvanceRevision['data'][0]['document']['header']['number'],
        // ];
        // return view('Process.BusinessTrip.BusinessTripRequest.Transactions.RevisionBusinessTripRequest', $compact);
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

            // dump($request->session()->get('dataReportBusinessTripRequestSummary', []));

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

    public function ReportBusinessTripRequestSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name) 
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
                    "DocumentNumber"                      => "BRF-24000203",
                    "DocumentDateTimeTZ"                  => "2024-12-05 00:00:00+07",
                    "TotalAdvance"                        => "110000.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => $beneficiary_name,
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam"
                ],
                [
                    "DocumentNumber"                      => "BRF-24000202",
                    "DocumentDateTimeTZ"                  => "2024-12-04 00:00:00+07",
                    "TotalAdvance"                        => "406982.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Sholehah",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => $beneficiary_name,
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "BT Pak Sagala presentasi HTLS Batam",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam"
                ],
                [
                    "DocumentNumber"                      => "BRF-24000201",
                    "DocumentDateTimeTZ"                  => "2024-12-03 00:00:00+07",
                    "TotalAdvance"                        => "1200000.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Grace Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => $beneficiary_name,
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam"
                ],
                [
                    "DocumentNumber"                      => "BRF-24000200",
                    "DocumentDateTimeTZ"                  => "2024-12-02 00:00:00+07",
                    "TotalAdvance"                        => "6000000.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => $requester_name,
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => $beneficiary_name,
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "BT Pak Sagala presentasi HTLS Batam",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam"
                ],
            ];

            $reportData = is_string($getReportAdvanceSummary) ? json_decode($getReportAdvanceSummary, true) : $getReportAdvanceSummary;

            // $filteredData = array_filter($reportData, function ($item) use ($project_id, $site_id, $requester_id, $beneficiary_id) {
            //     return 
            //         (empty($project_id)     || $item['CombinedBudget_RefID'] == $project_id) &&
            //         (empty($site_id)        || $item['CombinedBudgetSection_RefID'] == $site_id) &&
            //         (empty($requester_id)   || $item['RequesterWorkerJobsPosition_RefID'] == $requester_id) &&
            //         (empty($beneficiary_id) || $item['BeneficiaryWorkerJobsPosition_RefID'] == $beneficiary_id);
            // });

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            $totalAdvance = array_reduce($reportData, function ($carry, $item) {
                return $carry + ($item['TotalAdvance'] ?? 0);
            }, 0);

            $compact = [
                // 'dataDetail'        => $filteredData,
                'dataDetail'        => $reportData,
                'budgetCode'        => $project_code,
                'budgetName'        => $project_name,
                'siteCode'          => $site_code,
                'requesterName'     => $requester_name,
                'beneficiaryName'   => $beneficiary_name,
                'total'             => $totalAdvance,
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
            $project_code       = $request->project_code_second;
            $project_name       = $request->project_name_second;
            $project_id         = $request->project_id_second;

            $site_id            = $request->site_id_second;
            $site_code          = $request->site_code_second;

            $requester_id       = $request->worker_id_second;
            $requester_name     = $request->worker_name_second;

            $beneficiary_id     = $request->beneficiary_second_id;
            $beneficiary_name   = $request->beneficiary_second_person_name;

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            if (!$requester_id) {
                $errors[] = 'Requester';
            }
            if (!$beneficiary_id) {
                $errors[] = 'Beneficiary';
            }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportBusinessTripRequestSummarySubmit");
                Session::forget("dataReportBusinessTripRequestSummary");
        
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportBusinessTripRequestSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name);

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

            if (!$project_code_second_trigger) {
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

    public function ReportBusinessTripRequestDetailData($advance_id, $project_code, $site_code, $advance_document, $project_name, $site_name)
    {
        try {
            $varAPIWebToken         = Session::get('SessionLogin');
            $getReportAdvanceDetail = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getAdvance', 
                'latest',
                [
                    'parameter' => [
                        'recordID' => (int) $advance_id
                    ]
                ]
            );

            $splitResponse = $getReportAdvanceDetail['data'][0]['document'];

            $totalAdvance = array_reduce($splitResponse['content']['details']['itemList'], function ($carry, $item) {
                return $carry + ($item['entities']['priceBaseCurrencyValue'] ?? 0);
            }, 0);

            $compact = [
                'dataHeaderOne'     => [
                    'brfNumber'         => 'BRF-24000203',
                    'budgetCode'        => $project_code,
                    'budgetName'        => $project_name,
                    'siteCode'          => $site_code,
                    'siteName'          => $site_name,
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
            $project_code       = $request->project_code_second;
            $project_id         = $request->project_id_second;
            $project_name       = $request->project_name_second;

            $site_code          = $request->site_code_second;
            $site_id            = $request->site_id_second;
            $site_name          = $request->site_name_second;
            
            $advance_document   = $request->modal_advance_document_number;
            $advance_id         = $request->modal_advance_id;

            // dd($project_code, $project_id, $site_code, $site_id, $advance_document, $advance_id);

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            if (!$advance_id) {
                $errors[] = 'BRF Number';
            }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportBusinessTripRequestDetailSubmit");
                Session::forget("dataReportBusinessTripRequestDetail");
        
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail')->with('NotFound', $message);
            }

            $compact = $this->ReportBusinessTripRequestDetailData($advance_id, $project_code, $site_code, $advance_document, $project_name, $site_name);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail');
        } catch (\Throwable $th) {
            Log::error("ReportBusinessTripRequestDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportBusinessTripRequestDetail(Request $request) 
    {
        try {
            $project_code_second_trigger = $request->project_code_second_trigger;
            $dataReport = Session::get("dataReportBusinessTripRequestDetail");
            $print_type = $request->print_type;

            if (!$project_code_second_trigger) {
                Session::forget("isButtonReportBusinessTripRequestDetailSubmit");
                Session::forget("dataReportBusinessTripRequestDetail");
        
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail')->with('NotFound', 'Budget, Sub Budget, & BRF Number Cannot Be Empty');
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
                return redirect()->route('BusinessTripRequest.ReportBusinessTripRequestDetail')->with('NotFound', 'Budget, Sub Budget, & Advance Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportBusinessTripRequestDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}