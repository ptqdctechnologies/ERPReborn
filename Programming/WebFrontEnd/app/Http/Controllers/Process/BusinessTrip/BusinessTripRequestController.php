<?php

namespace App\Http\Controllers\Process\BusinessTrip;

use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripRequestSummary;
use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripRequestDetail;
use App\Http\Controllers\ExportExcel\Process\ExportReportBusinessTripToBSF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Process\BusinessTrip\BusinessTripService;
use App\Services\WorkflowService;
use Carbon\Carbon;

class BusinessTripRequestController extends Controller
{
    protected $businessTripService, $workflowService;

    public function __construct(BusinessTripService $businessTripService, WorkflowService $workflowService)
    {
        $this->businessTripService = $businessTripService;
        $this->workflowService = $workflowService;
    }

    public function calculateTotal($filteredData, $key)
    {
        return array_reduce($filteredData, function ($carry, $item) use ($key) {
            return $carry + ($item[$key] ?? 0);
        }, 0);
    }

    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Form');

        return view('Process.BusinessTrip.BusinessTripRequest.Transactions.CreateBusinessTripRequest', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->businessTripService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Business Trip Request');
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Workflow Business Trip Request');
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Business Trip Request Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function detail(Request $request)
    {
        try {
            $personBusinessTripRefID = $request->person_business_trip_id;

            $response = $this->businessTripService->getDetail($personBusinessTripRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Detail Business Trip Request Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function UpdatesBusinessTripRequest(Request $request)
    {
        try {
            $response = $this->businessTripService->updates($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data'][0]['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseWorkflow);
            }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Business Trip Request Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
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
            $varAPIWebToken = Session::get('SessionLogin');
            $personBusinessTripRefID = $request->input('brf_number_id');
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Revision Form');

            $response = $this->businessTripService->getDetail($personBusinessTripRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            // $responseTripSequence = $this->businessTripService->getPersonBusinessTripSequence($personBusinessTripRefID);

            // if ($responseTripSequence['metadata']['HTTPStatusCode'] !== 200) {
            //     return response()->json($responseTripSequence);
            // }

            $responseTripSequenceDetail = $this->businessTripService->getPersonBusinessTripSequenceDetail($personBusinessTripRefID);

            if ($responseTripSequenceDetail['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseTripSequenceDetail);
            }

            $dataResponse = $response['data']['data'];
            // $dataTripSequence       = $responseTripSequence['data']['data'];
            $dataTripSequenceDetail = $responseTripSequenceDetail['data']['data'];

            // dump($dataResponse);
            // dump($dataTripSequenceDetail);

            $compact = [
                'varAPIWebToken' => $varAPIWebToken ?? '',
                'documentType_RefID' => $documentTypeRefID,
                'combinedBudgetSectionDetail_RefID' => $dataResponse[0]['CombinedBudgetSectionDetail_RefID'],
                'workStructure_RefID' => $dataResponse[0]['WorkStructure_RefID'] ?? '',
                'workTemp' => $dataResponse[0]['WorkCode'] . ' - ' . $dataResponse[0]['WorkName'],
                'product_RefID' => $dataResponse[0]['Product_RefID'] ?? '',
                'personBusinessTripRefID' => $dataResponse[0]['PersonBusinessTrip_RefID'], // $dataTripSequence[0]['personBusinessTrip_RefID'],
                'personBusinessTripDetailRefID' => $dataResponse[0]['Sys_ID'], // $dataTripSequence[0]['sys_ID'],
                'budget' => [
                    'id' => $dataResponse[0]['CombinedBudget_RefID'], // $dataTripSequence[0]['combinedBudget_RefID'][0] ?? '-',
                    'code' => $dataResponse[0]['CombinedBudgetCode'], // $dataTripSequence[0]['combinedBudgetCode'] ?? '-',
                    'name' => $dataResponse[0]['CombinedBudgetName'], // $dataTripSequence[0]['combinedBudgetName'] ?? '-'
                ],
                'subBudget' => [
                    'id' => $dataResponse[0]['CombinedBudgetSection_RefID'], // $dataTripSequence[0]['combinedBudgetSection_RefID'][0] ?? '-',
                    'code' => $dataResponse[0]['CombinedBudgetSectionCode'], // $dataTripSequence[0]['combinedBudgetSectionCode'] ?? '-',
                    'name' => $dataResponse[0]['CombinedBudgetSectionName'], // $dataTripSequence[0]['combinedBudgetSectionName'] ?? '-'
                ],
                'fileID' => $dataResponse[0]['Log_FileUpload_Pointer_RefID'],
                'requester' => [
                    'id' => $dataResponse[0]['RequesterWorkerJobsPosition_RefID'], // $dataTripSequence[0]['requesterWorkerJobsPosition_RefID'] ?? '-',
                    'name' => $dataResponse[0]['RequesterWorkerName'], // $dataTripSequence[0]['requesterWorkerName'] ?? '-',
                    'position' => $dataResponse[0]['RequesterWorkerPosition'],
                    'contact' => $dataResponse[0]['RequesterWorkerContact']
                ],
                'dateTravel' => [
                    'commence' => $dataResponse[0]['StartDateTimeTZ'] ? Carbon::parse($dataResponse[0]['StartDateTimeTZ'])->format('Y-m-d') : '-', // $dataTripSequence[0]['startDateTimeTZ'] ? Carbon::parse($dataTripSequence[0]['startDateTimeTZ'])->format('Y-m-d') : '-',
                    'end' => $dataResponse[0]['FinishDateTimeTZ'] ? Carbon::parse($dataResponse[0]['FinishDateTimeTZ'])->format('Y-m-d') : '-' // $dataTripSequence[0]['finishDateTimeTZ'] ? Carbon::parse($dataTripSequence[0]['finishDateTimeTZ'])->format('Y-m-d') : '-'
                ],
                'departing' => [
                    'from' => $dataResponse[0]['DeparturePoint'],
                    'to' => $dataResponse[0]['DestinationPoint']
                ],
                'reason' => $dataResponse[0]['ReasonToTravel'],
                'total' => [
                    'brf' => $dataResponse[0]['AmountBaseCurrencyValue'], // $dataTripSequence[0]['amountBaseCurrencyValue'] ?? 0,
                    'payment' => 118670.07,
                ],
                'dataTripBudgetDetails' => $dataTripSequenceDetail,
                'payment' => [
                    'directVendor' => [
                        'value' => 30000.20,
                        'bankName' => [
                            'id' => 166000000000002,
                            'code' => 'BRI',
                            'name' => 'Bank Rakyat Indonesia'
                        ],
                        'bankAccount' => [
                            'id' => 167000000000042,
                            'number' => 044101001553563,
                            'name' => 'PT QDC Technologies'
                        ],
                    ],
                    'corpCard' => [
                        'value' => 59184.20,
                        'bankName' => [
                            'id' => 166000000000005,
                            'code' => 'BCA',
                            'name' => 'Bank Central Asia'
                        ],
                        'bankAccount' => [
                            'id' => 167000000000064,
                            'number' => 5520579321,
                            'name' => 'Belina Lindarwani'
                        ],
                    ],
                    'other' => [
                        'value' => 29485.67,
                        'beneficiary' => [
                            'id' => 164000000000559,
                            'positionID' => 25000000000559,
                            'position' => 'General Manager',
                            'name' => 'Adhe Kurniawan'
                        ],
                        'bankName' => [
                            'id' => 166000000000002,
                            'code' => 'BRI',
                            'name' => 'Bank Rakyat Indonesia'
                        ],
                        'bankAccount' => [
                            'id' => 167000000000042,
                            'number' => 044101001553563,
                            'name' => 'PT QDC Technologies'
                        ],
                    ],
                ]
            ];

            return view('Process.BusinessTrip.BusinessTripRequest.Transactions.RevisionBusinessTripRequest', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportBusinessTripRequestSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.BusinessTrip.BusinessTripRequest.Reports.ReportBusinessTripRequestSummary', $compact);
    }

    public function ReportBusinessTripRequestSummaryStore(Request $request)
    {
        try {
            $date = $request->brfDate;
            $requester = $request->requester_id;
            $beneficiary = $request->beneficiary_id;
            $budget = $request->budget_code;
            $subBudget = $request->site_code;

            $response = $this->businessTripService->getBusinessTripSummary(
                $budget,
                $subBudget,
                $requester,
                $beneficiary,
                $date
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Advance Summary Report');
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

    public function PrintExportReportBusinessTripRequestSummary(Request $request)
    {
        try {
            $type = $request->printType;
            $dataBusinessTrip = json_decode($request->dataReport, true);

            if ($dataBusinessTrip) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripRequest.Reports.ReportBusinessTripRequestSummary_pdf', ['dataReport' => $dataBusinessTrip])
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
                    return Excel::download(new ExportReportBusinessTripRequestSummary($dataBusinessTrip), 'Export Report PO to DO.xlsx');
                } else {
                    throw new \Exception('Failed to Export Report Business Trip');
                }
            } else {
                throw new \Exception('Business Trip Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Business Trip Request Summary Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportBusinessTripRequestDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripRequestDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripRequestDetail', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
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

            $getReportAdvanceDetail = [
                'data' => [
                    "0" => [
                        "document" => [
                            "header" => [
                                "recordID" => "76000000000002",
                                "title" => "Advance Form",
                                "number" => "Adv/QDC/2022/000239",
                                "version" => "0",
                                "date" => "2022-12-13",
                                "businessDocumentType_RefID" => "77000000000057"
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
                'dataHeaderOne' => [
                    'brfId' => $brf_id,
                    'brfNumber' => $brf_trano,
                    'budgetCode' => $brf_budget,
                    'budgetName' => $brf_budget_name,
                    'siteCode' => $brf_sub_budget,
                    'siteName' => $brf_sub_budget_name,
                    'productID' => '820005-0000',
                    'productName' => 'Travel & Fares/Business Trip',
                    'dateCommence' => '2024-12-18',
                    'dateEnd' => '2024-12-20',
                    'dateBRF' => '2024-12-12',
                    'contactPhone' => '0896734873',
                    'bankType' => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAcronym'],
                    'bankAccountNumber' => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAccountNumber'],
                    'bankAccountName' => $splitResponse['content']['general']['bankAccount']['beneficiary']['bankAccountName'],
                    'requester' => $splitResponse['content']['general']['involvedPersons'][0]['requesterWorkerName'],
                    'beneficiary' => $splitResponse['content']['general']['involvedPersons'][0]['beneficiaryWorkerName'],
                    'departingFrom' => 'Jakarta',
                    'destinationTo' => 'Batam',
                ],
                'dataHeaderTwo' => [
                    'totalAllowance' => '240000.00',
                    'totalEntertainment' => '100000.00',
                    'totalOther' => '100000.00',
                    'totalTransport' => '3450000.00',
                    'totalAccommodation' => '0.00',
                    'totalBusinessTrip' => '3890000.00',
                ],
                'dataHeaderThree' => [
                    'reason' => 'Silahturahmi PLN JBT dan cari info tender batam beserta info lain'
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
            $brf_trano = $request->brf_number_trano;
            $brf_id = $request->brf_number_id;
            $brf_budget = $request->brf_number_budget;
            $brf_budget_name = $request->brf_number_budget_name;
            $brf_sub_budget = $request->brf_number_sub_budget;
            $brf_sub_budget_name = $request->brf_number_sub_budget_name;

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
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Process.BusinessTrip.BusinessTripToBSF.Reports.ReportBusinessTripToBSF', $compact);
    }

    public function ReportBusinessTripToBSFStore(Request $request)
    {
        try {
            $date = $request->brfToBsfDate;
            $budgetCode = $request->budget_code;
            $siteCode = $request->site_code;
            $requesterID = $request->requester_id;
            $businessTripID = $request->business_trip_id;
            $businessTripSettlementID = $request->business_trip_settlement_id;

            $response = $this->businessTripService->getBusinessTripToBSFSummary(
                $budgetCode,
                $siteCode,
                $date,
                $requesterID,
                $businessTripID,
                $businessTripSettlementID
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Business Trip To BSF Report');
            }

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Business Trip To BSF Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportBusinessTripToBSF(Request $request)
    {
        try {
            $dataReport = Session::get("dataReportBusinessTripToBSF");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportBusinessTripToBSFSubmit");
                Session::forget("dataReportBusinessTripToBSF");

                return redirect()->route('BusinessTripRequest.ReportBusinessTripToBSF')->with('NotFound', 'Budget, Sub Budget, & Requester Cannot Be Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.BusinessTrip.BusinessTripToBSF.Reports.ReportBusinessTripToBSF_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Business Trip To BSF.pdf');
                } else {
                    return Excel::download(new ExportReportBusinessTripToBSF, 'Export Business Trip To BSF.xlsx');
                }
            } else {
                return redirect()->route('BusinessTripRequest.ReportBusinessTripToBSF')->with('NotFound', 'Budget, Sub Budget, & Requester Cannot Be Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportBusinessTripToBSF Function Error at " . $th->getMessage());
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

                    $canvas = $dom_pdf->get_canvas();
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