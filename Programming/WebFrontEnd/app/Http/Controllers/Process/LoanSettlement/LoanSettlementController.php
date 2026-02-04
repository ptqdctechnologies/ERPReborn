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
use App\Services\Process\Loan\LoanSettlementService;

class LoanSettlementController extends Controller
{
    public function __construct(LoanSettlementService $loanSettlementService)
    {
        $this->loanSettlementService  = $loanSettlementService;
    }

    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Loan Settlement Form');

        return view('Process.LoanSettlement.Transactions.CreateLoanSettlement', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function RevisionLoanSettlement(Request $request)
    {
        $varAPIWebToken         = Session::get('SessionLogin');
        $loanSettlementRefID    = $request->input('modal_loan_settlement_id');
        $documentTypeRefID      = $this->GetBusinessDocumentsTypeFromRedis('Loan Settlement Revision Form');

        $response = $this->loanSettlementService->getDetail($loanSettlementRefID);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            throw new \Exception('Failed to fetch Detail Loan Settlement');
        }

        $dataLoanSettlementDetail = $response['data']['data'];

        $compact = [
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID,
            'header'                => [
                'loanType'          => '-',
                'creditorDebitor'   => '-',
                'currencyID'        => $dataLoanSettlementDetail[0]['Currency_RefID'],
                'currencyCode'      => $dataLoanSettlementDetail[0]['ISOCode'],
                'currencyExchange'  => $dataLoanSettlementDetail[0]['CurrencyExchangeRate'],
                'bankID'            => '-',
                'bankCode'          => '-',
                'bankName'          => '-',
                'bankAccountID'     => '-',
                'bankAccountCode'   => '-',
                'bankAccountName'   => '-',
                'loanDate'          => '-',
                'loanPrinciple'     => '-',
                'lendingRate'       => '-',
                'loanTotal'         => '-',
                'loanTerm'          => '-',
                'remark'            => $dataLoanSettlementDetail[0]['Notes']
            ],
            'detail'                => [
                'settlementValue'   => $dataLoanSettlementDetail[0]['PrincipleSettlement'],
                'penaltyValue'      => $dataLoanSettlementDetail[0]['PenaltySettlement'],
                'interestValue'     => $dataLoanSettlementDetail[0]['InterestSettlement'],
                'COASettlementID'   => '-',
                'COASettlementCode' => $dataLoanSettlementDetail[0]['COA_Settlement_Code'],
                'COASettlementName' => $dataLoanSettlementDetail[0]['COA_Settlement_Name'],
                'COAPenaltyID'      => '-',
                'COAPenaltyCode'    => $dataLoanSettlementDetail[0]['COA_Penalty_Code'],
                'COAPenaltyName'    => $dataLoanSettlementDetail[0]['COA_Penalty_Name'],
                'COAInterestID'     => '-',
                'COAInterestCode'   => $dataLoanSettlementDetail[0]['COA_Interest_Code'],
                'COAInterestName'   => $dataLoanSettlementDetail[0]['COA_Interest_Name'],
            ]
        ];

        return view('Process.LoanSettlement.Transactions.RevisionLoanSettlement', $compact);
    }

    public function ReportLoanSettlementSummary(Request $request)
    {
        return view('Process.LoanSettlement.Reports.ReportLoanSettlementSummary');
    }

    public function ReportLoanSettlementSummaryStore(Request $request)
    {
        try {
            $date           = $request->loanSettlementDate;
            $budget         = [
                "id"        => $request->budget_id,
                "code"      => $request->budget_code,
            ];

            $response = $this->loanSettlementService->getLoanSettlementSummary(
                $budget['code'],
                null,
                null,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Loan Settlement Summary Report');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Loan Settlement Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
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

    // Simpan post baru ke database
    public function store(Request $request)
    {
        try {
            $response = $this->loanSettlementService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Loan Settlement');
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Loan Settlement Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
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
        try {
            $response = $this->loanSettlementService->updates($request, $id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Revision Loan Settlement');
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Loan Settlement Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
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
