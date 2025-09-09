<?php


namespace App\Http\Controllers\Process\LoanSettlement;

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

class LoanSettlementController extends Controller
{
    public function ReportLoanSettlementSummary(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportLoanSettlementSummarySubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportLoanSettlementSummary', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Process.LoanSettlement.Reports.ReportLoanSettlementSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementSummary Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position) 
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
                    "DocumentNumber" => "LNS/QDC/2025/000229",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "LN/QDC/2025/000030",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "Bank Mandiri",
                    "CombinedBudgetSectionName" => "PT QDC Technoogies",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Faiz Haems Muda",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Partially Settled",
                    "DepartingFrom" => "0",
                    "DestinationTo" => "Tanjung Pinang",
                    "DirectToVendor" => "100000000",
                    "ByCorpCard" => "100000000",
                ],
                [
                    "DocumentNumber" => "LNS/QDC/2025/000229",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "LN/QDC/2025/000029",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "PT QDC Technoogies",
                    "CombinedBudgetSectionName" => "Eka",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Faiz Haems Muda",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Payroll Deduction",
                    "DepartingFrom" => "0",
                    "DestinationTo" => "Tanjung Pinang",
                    "DirectToVendor" => "5000000",
                    "ByCorpCard" => "5000000",
                ],
                [
                    "DocumentNumber" => "LNS/QDC/2025/000229",
                    "DocumentDateTimeTZ" => "2024-12-27 00:00:00+07",
                    "TotalBusinessTrip" => "LN/QDC/2025/000028",
                    "Sys_ID" => 76000000000054,
                    "CombinedBudgetCode" => "Q000062",
                    "CombinedBudgetName" => "XL Microcell 2007",
                    "CombinedBudgetSectionCode" => "Bank Rakyat Indonesia (BRI)",
                    "CombinedBudgetSectionName" => "PT QDC Technoogies",
                    "RequesterWorkerJobsPosition_RefID" => 164000000000023,
                    "RequesterWorkerName" => "Ahmad Faiz Haems Muda",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName" => "Abdul Rachman",
                    "CurrencyName" => "IDR",
                    "Product_ID" => 88000000000527,
                    "CombinedBudget_RefID" => 46000000000033,
                    "CombinedBudgetSection_RefID" => 143000000000305,
                    "remark" => "Partially Settled",
                    "DepartingFrom" => "0",
                    "DestinationTo" => "Tanjung Pinang",
                    "DirectToVendor" => "500000000",
                    "ByCorpCard" => "500000000",
                ],
                
            ];

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

            Session::put("isButtonReportLoanSettlementSummarySubmit", true);
            Session::put("dataReportLoanSettlementSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementSummaryData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementSummaryStore(Request $request) 
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
                Session::forget("isButtonReportLoanSettlementSummarySubmit");
                Session::forget("dataReportLoanSettlementSummary");

                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            $compact = $this->ReportLoanSettlementSummaryData($project_id, $site_id, $requester_id, $beneficiary_id, $project_name, $project_code, $site_code, $requester_name, $beneficiary_name, $site_name, $requester_position, $beneficiary_position);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('LoanSettlement.ReportLoanSettlementSummary');
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementSummaryStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportLoanSettlementSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportLoanSettlementSummary");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportLoanSettlementSummarySubmit");
                Session::forget("dataReportLoanSettlementSummary");
        
                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Be Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.LoanSettlement.Reports.ReportLoanSettlementSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Request Summary.pdf');
                } else {
                    return Excel::download(new ExportReportLoanSettlementSummary, 'Export Report Business Trip Request Summary.xlsx');
                }
            } else {
                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Budget, Sub Budget, Requester, & Beneficiary Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportLoanSettlementSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportLoanSettlementDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportLoanSettlementDetail', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.LoanSettlement.Reports.ReportLoanSettlementDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementDetailData($brf_trano, $brf_id, $brf_budget, $brf_budget_name, $brf_sub_budget, $brf_sub_budget_name)
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

            Session::put("isButtonReportLoanSettlementDetailSubmit", true);
            Session::put("dataReportLoanSettlementDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementDetailStore(Request $request)
    {
        try {
            $brf_trano              = $request->brf_number_trano;
            $brf_id                 = $request->brf_number_id;
            $brf_budget             = $request->brf_number_budget;
            $brf_budget_name        = $request->brf_number_budget_name;
            $brf_sub_budget         = $request->brf_number_sub_budget;
            $brf_sub_budget_name    = $request->brf_number_sub_budget_name;

            if (!$brf_id) {
                Session::forget("isButtonReportLoanSettlementDetailSubmit");
                Session::forget("dataReportLoanSettlementDetail");

                return redirect()->route('LoanSettlement.ReportLoanSettlementDetail')->with('NotFound', 'BRF Number Cannot Be Empty');
            }

            $compact = $this->ReportLoanSettlementDetailData($brf_trano, $brf_id, $brf_budget, $brf_budget_name, $brf_sub_budget, $brf_sub_budget_name);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('LoanSettlement.ReportLoanSettlementDetail');
        } catch (\Throwable $th) {
            Log::error("ReportLoanSettlementDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
