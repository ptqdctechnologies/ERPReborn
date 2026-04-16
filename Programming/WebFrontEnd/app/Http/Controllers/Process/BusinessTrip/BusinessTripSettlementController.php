<?php

namespace App\Http\Controllers\Process\BusinessTrip;

use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripSettlementSummary;
use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripSettlementDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Process\BusinessTrip\BusinessTripSettlementService;
use App\Services\WorkflowService;

class BusinessTripSettlementController extends Controller
{
    protected $businessTripSettlementService, $workflowService;

    public function __construct(BusinessTripSettlementService $businessTripSettlementService, WorkflowService $workflowService)
    {
        $this->businessTripSettlementService = $businessTripSettlementService;
        $this->workflowService = $workflowService;
    }

    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Settlement Form');

        return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.CreateBusinessTripSettlement', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->businessTripSettlementService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Business Trip Settlement');
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
                // "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Business Trip Settlement Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function getBusinessTripSettlementList(Request $request)
    {
        try {
            $response = $this->businessTripSettlementService->dataPickList();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            return response()->json($response['data']['data']);
        } catch (\Throwable $th) {
            Log::error("Error at getBusinessTripList: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function RevisionBusinessTripSettlementIndex(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $businessTripSettlement_RefID = $request->input('bsf_number_id');
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Settlement Revision Form');

            $response = $this->businessTripSettlementService->getDetail($businessTripSettlement_RefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $dataResponse = $response['data']['data'];
            $mappingDataSettlementDetails = array_map(function ($item) {
                return [
                    'Sys_ID' => $item['Sys_ID'],
                    'AmountCurrency_RefID' => $item['AmountCurrency_RefID'],
                    'AmountCurrencyValue' => $item['AmountCurrencyValue'],
                    'AmountCurrencyExchangeRate' => $item['AmountCurrencyExchangeRate'],
                    'PersonBusinessTripSequenceDetail_RefID' => $item['PersonBusinessTripSequenceDetail_RefID'],
                    'BusinessTripCostComponentEntity_RefID' => $item['BusinessTripCostComponentEntity_RefID']
                ];
            }, $dataResponse);

            // dd($dataResponse);
            // dd($mappingDataSettlementDetails);

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentType_RefID' => $documentTypeRefID,
                'businessTripSettlementID' => $dataResponse[0]['PersonBusinessTripSettlement_RefID'],
                'businessTripSettlementNumber' => $dataResponse[0]['DocumentNumber'],
                'requester' => [
                    'id' => $dataResponse[0]['RequesterWorkerJobsPosition_RefID'],
                    'name' => $dataResponse[0]['RequesterWorkerName'],
                    'position' => $dataResponse[0]['RequesterWorkerPosition'],
                    'contact' => $dataResponse[0]['RequesterWorkerContact']
                ],
                'dataSettlementDetails' => $mappingDataSettlementDetails,
                'remark' => $dataResponse[0]['Remarks'],
            ];

            // dump($dataResponse);

            return view('Process.BusinessTrip.BusinessTripSettlement.Transactions.RevisionBusinessTripSettlement', $compact);
        } catch (\Throwable $th) {
            Log::error("Revision Business Trip Settlement Index Function Error: " . $th->getMessage());

            return redirect()->route('BusinessTripSettlement.index', ['var' => 1])->with('NotFound', 'Process Error');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->businessTripSettlementService->updates($request, $id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            // $responseWorkflow = $this->workflowService->submit(
            //     $response['data'][0]['businessDocument']['businessDocument_RefID'],
            //     $request->workFlowPath_RefID,
            //     $request->comment,
            //     $request->approverEntity,
            // );

            // if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
            //     return response()->json($responseWorkflow);
            // }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
                // "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Business Trip Settlement Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripSettlementSummary(Request $request)
    {

        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Form'); // Person Business Trip Settlement Form
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.BusinessTrip.BusinessTripSettlement.Reports.ReportBusinessTripSettlementSummary', $compact);
    }

    public function ReportBusinessTripSettlementSummaryStore(Request $request)
    {
        try {
            $date = $request->bsfDate;
            $requester = $request->requester_id;
            $budget = $request->budget_code;
            $subBudget = $request->site_code;

            $response = $this->businessTripSettlementService->getBusinessTripSettlementSummary(
                $budget,
                $subBudget,
                $requester,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Business Trip Settlement Summary');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Business Trip Request Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportBusinessTripSettlementSummary(Request $request)
    {
        try {
            $type = $request->printType;
            $dataBusinessTripSettlement = json_decode($request->dataReport, true);

            if ($dataBusinessTripSettlement) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripSettlement.Reports.ReportBusinessTripSettlementSummary_pdf', ['dataReport' => $dataBusinessTripSettlement])
                        ->setPaper('a4', 'landscape');

                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Purchase Order to Account Payable.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportBusinessTripSettlementSummary($dataBusinessTripSettlement), 'Export Report PO to DO.xlsx');
                } else {
                    throw new \Exception('Failed to Export Report Business Trip');
                }
            } else {
                throw new \Exception('Business Trip Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Business Trip Settlement Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportBusinessTripSettlementDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripSettlementDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripSettlementDetail', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
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
            $varAPIWebToken = Session::get('SessionLogin');
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
                                "recordID" => "76000000000002",
                                "title" => "Advance Form",
                                "number" => "Adv/QDC/2022/000239",
                                "version" => "0",
                                "date" => "2024-12-16",
                                "businessDocumentType_RefID" => "77000000000057",
                                "brfNumber" => "BRF-24000212",
                                "brfDate" => "2024-11-16",
                                "brfTotal" => '3890000'
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
                                            "recordID" => "74000000020307",
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
                                "recordID" => "76000000000002",
                                "title" => "Advance Form",
                                "number" => "Adv/QDC/2022/000239",
                                "version" => "0",
                                "date" => "2024-12-20",
                                "businessDocumentType_RefID" => "77000000000057",
                                "brfNumber" => "BRF-24000215",
                                "brfDate" => "2024-12-01",
                                "brfTotal" => '2745000'
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
                                            "recordID" => "74000000020307",
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
                                "recordID" => "76000000000002",
                                "title" => "Advance Form",
                                "number" => "Adv/QDC/2022/000239",
                                "version" => "0",
                                "date" => "2024-12-25",
                                "businessDocumentType_RefID" => "77000000000057",
                                "brfNumber" => "BRF-24000225",
                                "brfDate" => "2024-12-07",
                                "brfTotal" => '4240000'
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
                                            "recordID" => "74000000020307",
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
                'dataHeader' => $splitResponse['header'],
                'dataDetails' => $splitResponse['content'],
                'budgetCode' => $project_code,
                'budgetName' => $project_name_second,
                'siteCode' => $site_code,
                'siteName' => $site_name_second,
                'bsfNumber' => $bsf_number,
                'bsfId' => $bsf_id,
                'totalBSF' => $totalBSF
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
            $project_code = $request->bsf_number_budget;
            $project_name_second = $request->bsf_number_budget_name;

            $site_code = $request->bsf_number_sub_budget;
            $site_name_second = $request->bsf_number_sub_budget_name;

            $bsf_number = $request->bsf_number_trano;
            $bsf_id = $request->bsf_number_id;

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

                    $canvas = $dom_pdf->get_canvas();
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