<?php


namespace App\Http\Controllers\Process\LoanSettlement;

use App\Http\Controllers\ExportExcel\Process\ExportReportLoanSettlementSummary;
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
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionReimbursementNumber");
        $dataLoanSettle = Session::get("LoanSettlementReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataLoanSettle' => $dataLoanSettle
        
        ];
        // dump($dataLoanSettle);

        return view('Process.LoanSettlement.Reports.ReportLoanSettlementSummary', $compact);
    }

    public function ReportLoanSettlementSummaryData( $project_code)
    {        
        try {
            Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getLoanSettlementSummary', 
                'latest',
                [
                    'parameter' => [
                        // 'CombinedBudgetCode' => 'Q000062',
                        // 'CombinedBudgetSectionCode' => '235',
                        // 'Creditor_RefID' => 166000000000001,
                        // 'Debitor_RefID' => 25000000000001,
                        'CombinedBudgetCode' => NULL,
                        'CombinedBudgetSectionCode' => NULL,
                        'Creditor_RefID' => NULL,
                        'Debitor_RefID' => NULL,
                    ],
                     'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                        ]
                ]
            );
            
            Log::error("Error at " ,$filteredArray);
            if ($filteredArray['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');

            }
            Session::put("LoanSettlementReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("LoanSettlementReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSettlementSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            // $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "") {
                Session::forget("LoanSettlementReportSummaryDataPDF");
                Session::forget("LoanSettlementReportSummaryDataExcel");
                
                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportLoanSettlementSummaryData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PReimbursementSummaryReportDataPDF");
            //     Session::forget("PReimbursementSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('LoanSettlement.ReportLoanSettlementSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportLoanSettlementSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("LoanSettlementReportSummaryDataPDF");
            $dataExcel = Session::get("LoanSettlementReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataLoanSettle = Session::get("LoanSettlementReportSummaryDataPDF");
                    // dd($dataLoanSettle);

                    $pdf = PDF::loadView('Process.LoanSettlement.Reports.ReportLoanSettlementSummary_pdf', ['dataLoanSettle' => $dataLoanSettle])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Loan Settlement Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportLoanSettlementSummary, 'Export Report Loan Settlement Summary.xlsx');
                }
            } else {
                return redirect()->route('LoanSettlement.ReportLoanSettlementSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
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
