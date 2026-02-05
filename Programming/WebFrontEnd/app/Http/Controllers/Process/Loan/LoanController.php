<?php

namespace App\Http\Controllers\Process\Loan;

use Carbon\Carbon;
use App\Http\Controllers\ExportExcel\Process\ExportReportLoanDetail;
use App\Http\Controllers\ExportExcel\Process\ExportReportLoanSummary;
use App\Http\Controllers\ExportExcel\Process\ExportReportLoantoLoanSettlement;
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
use App\Services\Process\Loan\LoanService;
use App\Services\WorkflowService;

class LoanController extends Controller
{
    protected $advanceRequestService, $workflowService;

    public function __construct(LoanService $loanService, WorkflowService $workflowService)
    {
        $this->loanService      = $loanService;
        $this->workflowService  = $workflowService;
    }

    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Loan Form');

        return view('Process.Loan.Transactions.CreateLoan', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function store(Request $request) 
    {
        try {
            $response = $this->loanService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Loan');
            }

            if ($request->budget_id) {
                $responseWorkflow = $this->workflowService->submit(
                    $response['data']['businessDocument']['businessDocument_RefID'],
                    $request->workFlowPath_RefID,
                    $request->comment,
                    $request->approverEntity,
                );

                if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                    throw new \Exception('Failed to fetch Submit Workflow Create Advance Request => ' . $responseWorkflow['data']['message']);
                }
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $request->budget_id ? $responseWorkflow['metadata']['HTTPStatusCode'] : $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Loan Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->loanService->updates($request, $id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Revision Loan');
            }

            $compact = [
                "documentNumber"    => $response['data'][0]['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Loan Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function DetailLoan(Request $request) 
    {
        try {
            $id = $request->id;

            $response = $this->loanService->getDetail($id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Loan');
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Detail Loan Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function RevisionLoan(Request $request)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $loanRefID          = $request->input('modal_loan_id');
            $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Loan Form'); // Loan Revision Form

            $response = $this->loanService->getDetail($loanRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Loan');
            }

            $dataLoanDetail = $response['data']['data'];
            $loanDate       = $dataLoanDetail[0]['LoanDate'] ? Carbon::parse($dataLoanDetail[0]['LoanDate'])->toDateString() : '';

            $compact = [
                'varAPIWebToken'            => $varAPIWebToken,
                'documentTypeRefID'         => $documentTypeRefID,
                'loanRefID'                 => $dataLoanDetail[0]['Loan_RefID'] ?? '',
                'loanDetailRefID'           => $dataLoanDetail[0]['Sys_ID'] ?? '',
                'header'                    => [
                    'combinedBudgetRefID'   => $dataLoanDetail[0]['CombinedBudget_RefID'] ?? '',
                    'combinedBudgetName'    => $dataLoanDetail[0]['CombinedBudgetName'] ?? '',
                    'combinedBudgetCode'    => $dataLoanDetail[0]['CombinedBudgetCode'] ?? '',
                    'loanType'              => $dataLoanDetail[0]['LoanType'] ?? '',
                    'creditorRefID'         => $dataLoanDetail[0]['Creditor_RefID'] ?? '',
                    'creditorName'          => $dataLoanDetail[0]['CreditorName'] ?? '',
                    'debitorRefID'          => $dataLoanDetail[0]['Debitor_RefID'] ?? '',
                    'debitorName'           => $dataLoanDetail[0]['DebitorName'] ?? '',
                    'currencyRefID'         => $dataLoanDetail[0]['Currency_RefID'] ?? '',
                    'currencyCode'          => $dataLoanDetail[0]['ISOCode'] ?? '',
                    'currencyName'          => $dataLoanDetail[0]['CurrencyName'] ?? '',
                    'bankAccount_RefID'     => $dataLoanDetail[0]['BankAccount_RefID'] ?? '',
                    'bankAccountNumber'     => $dataLoanDetail[0]['BankAccountNumber'] ?? '',
                    'bankAccountName'       => $dataLoanDetail[0]['BankAccountName'] ?? '',
                    'currencyExchangeRate'  => $dataLoanDetail[0]['CurrencyExchangeRate'] ?? '',
                    'principleLoan'         => (int) $dataLoanDetail[0]['PrincipleLoan'] ?? '',
                    'lendingRate'           => (int) $dataLoanDetail[0]['LendingRate'] ?? '',
                    'loanDate'              => $loanDate,
                    'loanTotal'             => (int) $dataLoanDetail[0]['TotalLoan'] ?? '',
                    'loanTerm'              => (int) $dataLoanDetail[0]['LoanTerm'] ?? '',
                    'remark'                => $dataLoanDetail[0]['Notes'] ?? '',
                    'coaRefID'              => $dataLoanDetail[0]['COA_RefID'] ?? '',
                    'coaName'               => $dataLoanDetail[0]['COA_Name'] ?? '',
                    'coaCode'               => $dataLoanDetail[0]['COA_Code'] ?? '',
                ]
            ];

            return view('Process.Loan.Transactions.RevisionLoan', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Loan Function Error: " . $th->getMessage());

            return redirect()->route('Loan.index', ['var' => 1])->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoantoLoanSettlement(Request $request)
    {
        return view('Process.Loan.Reports.ReportLoantoLoanSettlement');
    }

    public function ReportLoantoLoanSettlementStore(Request $request)
    {
        try {
            $date           = $request->loanToSettlementDate;
            $budget         = [
                "id"        => $request->budget_id,
                "code"      => $request->budget_code,
            ];

            $response = $this->loanService->getLoanToLoanSettlementSummary(
                $budget['code'],
                null,
                null,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Loan To Loan Settlement Summary Report');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Loan To Loan Settlement Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportLoantoLoanSettlement(Request $request)
    {
        try {
            $dataPDF = Session::get("LoanSettlementReportSummaryDataPDF");
            $dataExcel = Session::get("LoanSettlementReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataloantosettle = Session::get("LoanSettlementReportSummaryDataPDF");
                    // dd($dataloantosettle);

                    $pdf = PDF::loadView('Process.Loan.Reports.ReportLoantoLoanSettlement_pdf', ['dataloantosettle' => $dataloantosettle])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Loan to Loan Settlement.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportLoantoLoanSettlement, 'Export Report Loan to Loan Settlement.xlsx');
                }
            } else {
                return redirect()->route('Loan.ReportLoantoLoanSettlement')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSummary(Request $request)
    {
        return view('Process.Loan.Reports.ReportLoanSummary');
    }

    public function ReportLoanSummaryStore(Request $request)
    {
        try {
            $date           = $request->loanDate;
            $budget         = [
                "id"        => $request->budget_id,
                "code"      => $request->budget_code,
            ];

            $response = $this->loanService->getLoanSummary(
                $budget['code'],
                null,
                null,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Loan Summary Report');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Loan Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportLoanSummary(Request $request)
    {
        try {
            $dataLoanSummary    = json_decode($request->dataReport, true);
            $type               = $request->printType;

            if ($dataLoanSummary) {
                if ($type === "PDF") {
                    
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportLoanSummary($dataLoanSummary), 'Export Report Loan Summary.xlsx');
                } else {
                    throw new \Exception('Failed to Export Loan Summary Report');
                }
            } else {
                throw new \Exception('Loan Summary Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Loan Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function LoanListData(Request $request)
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
    
    public function calculateTotal($filteredData, $key) {
        return array_reduce($filteredData, function ($carry, $item) use ($key) {
            return $carry + ($item[$key] ?? 0);
        }, 0);
    }

    public function ReportLoanDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportLoanDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportLoanDetail', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.Loan.Reports.ReportLoanDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportLoanDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanDetailData($project_code, $project_name_second, $site_code, $site_name_second, $bsf_number, $bsf_id)
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

            Session::put("isButtonReportLoanDetailSubmit", true);
            Session::put("dataReportLoanDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportLoanDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanDetailStore(Request $request) 
    {
        try {
            $project_code           = $request->bsf_number_budget;
            $project_name_second    = $request->bsf_number_budget_name;

            $site_code              = $request->bsf_number_sub_budget;
            $site_name_second       = $request->bsf_number_sub_budget_name;

            $bsf_number             = $request->bsf_number_trano;
            $bsf_id                 = $request->bsf_number_id;

            if (!$bsf_id) {
                Session::forget("isButtonReportLoanDetailSubmit");
                Session::forget("dataReportLoanDetail");

                return redirect()->route('Loan.ReportLoanDetail')->with('NotFound', 'BSF Number Cannot Be Empty');
            }

            $compact = $this->ReportLoanDetailData($project_code, $project_name_second, $site_code, $site_name_second, $bsf_number, $bsf_id);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('Loan.ReportLoanDetail');
        } catch (\Throwable $th) {
            Log::error("ReportLoanDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportLoanDetail(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportLoanDetail");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportLoanDetailSubmit");
                Session::forget("dataReportLoanDetail");

                return redirect()->route('Loan.ReportLoanDetail')->with('NotFound', 'BSF Number Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.Loan.Reports.ReportLoanDetail_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Business Trip Settlement Detail.pdf');
                } else {
                    return Excel::download(new ExportReportLoanDetail, 'Export Report Business Trip Settlement Detail.xlsx');
                }
            } else {
                return redirect()->route('Loan.ReportLoanDetail')->with('NotFound', 'BSF Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportLoanDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}