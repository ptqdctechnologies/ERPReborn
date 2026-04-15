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
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportBusinessTripToBSFSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportBusinessTripToBSF', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
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
                    (empty($project['id']) || $item['CombinedBudget_RefID'] == $project['id']) &&
                    (empty($site['id']) || $item['CombinedBudgetSection_RefID'] == $site['id']) &&
                    (empty($requester['id']) || $item['RequesterWorkerJobsPosition_RefID'] == $requester['id']);
            });

            $compact = [
                'project' => $project,
                'site' => $site,
                'requester' => $requester,
                'dataDetail' => $filteredData,
                'totalTravel' => $this->calculateTotal($filteredData, 'TotalTravel'),
                'totalAllowance' => $this->calculateTotal($filteredData, 'TotalAllowance'),
                'totalEntertainment' => $this->calculateTotal($filteredData, 'TotalEntertainment'),
                'totalOther' => $this->calculateTotal($filteredData, 'TotalOther'),
                'totalPayment' => $this->calculateTotal($filteredData, 'TotalPayment'),
                'totalBSFTravel' => $this->calculateTotal($filteredData, 'TotalBSFTravel'),
                'totalBSFAllowance' => $this->calculateTotal($filteredData, 'TotalBSFAllowance'),
                'totalBSFEntertainment' => $this->calculateTotal($filteredData, 'TotalBSFEntertainment'),
                'totalBSFOther' => $this->calculateTotal($filteredData, 'TotalBSFOther'),
                'totalExpenseClaimTravel' => $this->calculateTotal($filteredData, 'TotalExpenseClaimTravel'),
                'totalExpenseClaimAllowance' => $this->calculateTotal($filteredData, 'TotalExpenseClaimAllowance'),
                'totalExpenseClaimEntertainment' => $this->calculateTotal($filteredData, 'TotalExpenseClaimEntertainment'),
                'totalExpenseClaimOther' => $this->calculateTotal($filteredData, 'TotalExpenseClaimOther'),
                'totalAmountToCompanyTravel' => $this->calculateTotal($filteredData, 'TotalAmountToCompanyTravel'),
                'totalAmountToCompanyAllowance' => $this->calculateTotal($filteredData, 'TotalAmountToCompanyAllowance'),
                'totalAmountToCompanyEntertainment' => $this->calculateTotal($filteredData, 'TotalAmountToCompanyEntertainment'),
                'totalAmountToCompanyOther' => $this->calculateTotal($filteredData, 'TotalAmountToCompanyOther'),
                'totalBusinessTripPayment' => $this->calculateTotal($filteredData, 'TotalBusinessTripPayment'),
                'totalBusinessTripSettlement' => $this->calculateTotal($filteredData, 'TotalBusinessTripSettlement'),
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
                'id' => $request->project_id_second,
                'code' => $request->project_code_second,
                'name' => $request->project_name_second,
            ];

            $site = [
                'id' => $request->site_id_second,
                'code' => $request->site_code_second,
                'name' => $request->site_name_second,
            ];

            $requester = [
                'id' => $request->worker_id_second,
                'name' => $request->worker_name_second,
                'position' => $request->worker_position_second,
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