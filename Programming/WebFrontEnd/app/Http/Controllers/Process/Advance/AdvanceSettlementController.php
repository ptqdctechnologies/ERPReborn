<?php

namespace App\Http\Controllers\Process\Advance;

use App\Http\Controllers\ExportExcel\AdvanceSettlement\ExportReportAdvanceSettlementSummary;
use App\Http\Controllers\ExportExcel\AdvanceSettlement\ExportReportAdvanceSettlementDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\AdvanceSettlementService;
use App\Services\WorkflowService;

class AdvanceSettlementController extends Controller
{
    protected $advanceSettlementService, $workflowService;

    public function __construct(AdvanceSettlementService $advanceSettlementService, WorkflowService $workflowService)
    {
        $this->advanceSettlementService = $advanceSettlementService;
        $this->workflowService = $workflowService;
    }

    public function index(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        Session::forget("SessionAdvanceSetllementBeneficiary");
        Session::forget("SessionAdvanceSetllementBeneficiaryID");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 0,
        ];

        return view('Process.Advance.AdvanceSettlement.Transactions.CreateAdvanceSettlement', $compact);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->advanceSettlementService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($responseWorkflow);
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at store: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function SearchAdvanceRequest(Request $request)
    {
        Session::forget("SessionAdvanceSetllementBeneficiary");
        Session::forget("SessionAdvanceSetllementBeneficiaryID");
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
        $benificiary = $request->input('benificiary');
        $trano = $request->input('trano');

        if ($budget_code != "") {
            $collection = $collection->filter(function ($item) use ($budget_code) {
                return strpos($item['CombinedBudgetCode'], $budget_code) !== false;
            });
        }
        if ($sub_budget_code != "") {
            $collection = $collection->filter(function ($item) use ($sub_budget_code) {
                return strpos($item['CombinedBudgetSectionCode'], $sub_budget_code) !== false;
            });
        }
        if ($requester != "") {
            $collection = $collection->filter(function ($item) use ($requester) {
                return strpos($item['RequesterWorkerName'], $requester) !== false;
            });
        }

        if ($benificiary != "") {
            $collection = $collection->filter(function ($item) use ($benificiary) {
                return strpos($item['BeneficiaryWorkerName'], $benificiary) !== false;
            });
        }
        if ($trano != "") {
            $collection = $collection->filter(function ($item) use ($trano) {
                return strpos($item['DocumentNumber'], $trano) !== false;
            });
        }

        return response()->json($collection->all());
    }

    public function AdvanceSettlementListData(Request $request)
    {
        try {

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

    public function RevisionAdvanceSettlementIndex(Request $request)
    {

        try {
            Session::forget("SessionAdvanceSetllementBeneficiary");
            Session::forget("SessionAdvanceSetllementBeneficiaryID");
            
            $AdvanceSattlement_RefID = $request->input('AdvanceSattlement_RefID');
            $varAPIWebToken = Session::get('SessionLogin');

            // // DATA REVISION ADVANCE
            // $filteredArray = Helper_APICall::setCallAPIGateway(
            //     Helper_Environment::getUserSessionID_System(),
            //     $varAPIWebToken,
            //     'transaction.read.dataList.finance.getAdvanceReport',
            //     'latest',
            //     [
            //         'parameter' => [
            //             'advance_RefID' => (int) $AdvanceSattlement_RefID,
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
            
            $compact = [
            //     'dataHeader' => $filteredArray['data'][0]['document']['header'],
            //     'dataContent' => $filteredArray['data'][0]['document']['content']['general'],
            //     'dataDetail' => $filteredArray['data'][0]['document']['content']['details']['itemList'],
                'varAPIWebToken' => $varAPIWebToken,
            //     'statusRevisi' => 1,
            //     'statusFinalApprove' => "No",
            ];
            return view('Process.Advance.AdvanceSettlement.Transactions.RevisionAdvanceSettlement', $compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }

        // $varAPIWebToken = Session::get('SessionLogin');
        // Session::forget("SessionAdvanceSetllementBeneficiary");
        // Session::forget("SessionAdvanceSetllementBeneficiaryID");

        // $varDataAdvanceSettlementRevision = Helper_APICall::setCallAPIGateway(
        //     Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken,
        //     'report.form.documentForm.finance.getAdvance',
        //     'latest',
        //     [
        //         'parameter' => [
        //             'recordID' => (int) $request->searchAsfNumberRevisionId,
        //         ]
        //     ]
        // );

        // $compact = [
        //     'dataRevisi' => $varDataAdvanceSettlementRevision['data'][0]['document']['content']['general'],
        //     'trano' => $varDataAdvanceSettlementRevision['data'][0]['document']['header']['number'],
        //     'var_recordID' => $request->searchAsfNumberRevisionId,
        //     'varAPIWebToken' => $varAPIWebToken,
        //     'statusRevisi' => 1,
        // ];
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function ReportAdvanceSettlementSummary(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportAdvanceSettlementSummarySubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportAdvanceSettlementSummary', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementSummary Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementSummaryData($project_id, $site_id, $project_name, $project_code, $site_code) 
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
                    "DocumentNumber"                      => "ASF01-24000082",
                    "DocumentDateTimeTZ"                  => "2024-12-05 00:00:00+07",
                    "TotalAdvance"                        => "110000.00",
                    "TotalExpenseClaimCart"               => "213932.00",
                    "TotalAmountDueToCompanyCart"         => "723832.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam",
                    "Description"                         => "Settlement pettycash project siak parsial 1"
                ],
                [
                    "DocumentNumber"                      => "ASF01-24000083",
                    "DocumentDateTimeTZ"                  => "2024-12-04 00:00:00+07",
                    "TotalAdvance"                        => "406982.00",
                    "TotalExpenseClaimCart"               => "456123.00",
                    "TotalAmountDueToCompanyCart"         => "981273.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Sholehah",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam",
                    "Description"                         => "Settlement Sewa Motor Parsial 1"
                ],
                [
                    "DocumentNumber"                      => "ASF01-24000084",
                    "DocumentDateTimeTZ"                  => "2024-12-03 00:00:00+07",
                    "TotalAdvance"                        => "1200000.00",
                    "TotalExpenseClaimCart"               => "6712398.00",
                    "TotalAmountDueToCompanyCart"         => "1652833.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Grace Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam",
                    "Description"                         => "Settlement Parsial 1 Sewa Kontrakan Siak"
                ],
                [
                    "DocumentNumber"                      => "ASF01-24000085",
                    "DocumentDateTimeTZ"                  => "2024-12-02 00:00:00+07",
                    "TotalAdvance"                        => "6000000.00",
                    "TotalExpenseClaimCart"               => "6571282.00",
                    "TotalAmountDueToCompanyCart"         => "7912392.00",
                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Yogi",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CurrencyName"                        => "IDR",
                    "Product_ID"                          => 88000000000527,
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,
                    "remark"                              => "",
                    "DepartingFrom"                       => "Jakarta",
                    "DestinationTo"                       => "Batam",
                    "Description"                         => "Settlement Parsial 1 Sewa Kontrakan"
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

            $totalExpense = array_reduce($reportData, function ($carry, $item) {
                return $carry + ($item['TotalExpenseClaimCart'] ?? 0);
            }, 0);

            $totalAmount = array_reduce($reportData, function ($carry, $item) {
                return $carry + ($item['TotalAmountDueToCompanyCart'] ?? 0);
            }, 0);

            $compact = [
                // 'dataDetail'        => $filteredData,
                'dataDetail'        => $reportData,
                'budgetCode'        => $project_code,
                'budgetName'        => $project_name,
                'siteCode'          => $site_code,
                'requesterName'     => "",
                'beneficiaryName'   => "",
                'total'             => $totalAdvance,
                'totalExpense'      => $totalExpense,
                'totalAmount'       => $totalAmount,
            ];

            Session::put("isButtonReportAdvanceSettlementSummarySubmit", true);
            Session::put("dataReportAdvanceSettlementSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementSummaryData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementSummaryStore(Request $request) 
    {
        try {
            $project_code       = $request->project_code_second;
            $project_name       = $request->project_name_second;
            $project_id         = $request->project_id_second;

            $site_id            = $request->site_id_second;
            $site_code          = $request->site_code_second;

            // $requester_id       = $request->worker_id_second;
            // $requester_name     = $request->worker_name_second;

            // $beneficiary_id     = $request->beneficiary_second_id;
            // $beneficiary_name   = $request->beneficiary_second_person_name;

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            // if (!$requester_id) {
            //     $errors[] = 'Requester';
            // }
            // if (!$beneficiary_id) {
            //     $errors[] = 'Beneficiary';
            // }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportAdvanceSettlementSummarySubmit");
                Session::forget("dataReportAdvanceSettlementSummary");
        
                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportAdvanceSettlementSummaryData($project_id, $site_id, $project_name, $project_code, $site_code);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementSummary');
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementSummaryStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAdvanceSettlementSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportAdvanceSettlementSummary");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportAdvanceSettlementSummarySubmit");
                Session::forget("dataReportAdvanceSettlementSummary");

                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementSummary')->with('NotFound', 'Budget, & Sub Budget Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance Settlement Summary.pdf');
                } else {
                    return Excel::download(new ExportReportAdvanceSettlementSummary, 'Export Report Advance Settlement Summary.xlsx');
                }
            } else {
                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementSummary')->with('NotFound', 'Budget, & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportAdvanceSettlementSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementDetail(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportAdvanceSettlementDetailSubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportAdvanceSettlementDetail', []) : [];

            $compact = [
                'varAPIWebToken'    => $varAPIWebToken,
                'dataReport'        => $dataReport
            ];

            return view('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementDetail', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementDetailData($advance_id, $project_code, $site_code, $advance_document, $project_name_second, $site_name_second)
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
                return $carry + ($item['entities']['priceBaseCurrencyValue'] * $item['entities']['quantity'] ?? 0);
            }, 0);

            $compact = [
                'dataHeader'    => $splitResponse['header'],
                'dataDetails'   => $splitResponse['content'],
                'budgetCode'    => $project_code, 
                'budgetName'    => $project_name_second,
                'siteCode'      => $site_code,
                'siteName'      => $site_name_second,
                'advanceNumber' => $advance_document,
                'total'         => $totalAdvance
            ];

            Session::put("isButtonReportAdvanceSettlementDetailSubmit", true);
            Session::put("dataReportAdvanceSettlementDetail", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementDetailData Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportAdvanceSettlementDetailStore(Request $request) 
    {
        try {
            $project_code           = $request->project_code_second;
            $project_id             = $request->project_id_second;
            $project_name_second    = $request->project_name_second;

            $site_code              = $request->site_code_second;
            $site_id                = $request->site_id_second;
            $site_name_second       = $request->site_name_second;
            
            $advance_document   = $request->modal_advance_document_number;
            $advance_id         = $request->modal_advance_id;

            $errors = [];

            if (!$project_id) {
                $errors[] = 'Budget';
            }
            if (!$site_id) {
                $errors[] = 'Sub Budget';
            }
            if (!$advance_id) {
                $errors[] = 'ASF Number';
            }

            if (!empty($errors)) {
                $message = implode(', ', $errors) . ' Cannot Be Empty';
            }

            if (isset($message)) {
                Session::forget("isButtonReportAdvanceSettlementDetailSubmit");
                Session::forget("dataReportAdvanceSettlementDetail");
        
                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail')->with('NotFound', $message);
            }

            $compact = $this->ReportAdvanceSettlementDetailData($advance_id, $project_code, $site_code, $advance_document, $project_name_second, $site_name_second);

            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail');
        } catch (\Throwable $th) {
            Log::error("ReportAdvanceSettlementDetailStore Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAdvanceSettlementDetail(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportAdvanceSettlementDetail");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportAdvanceSettlementDetailSubmit");
                Session::forget("dataReportAdvanceSettlementDetail");

                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail')->with('NotFound', 'Budget, & Sub Budget Cannot Be Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('Process.Advance.AdvanceSettlement.Reports.ReportAdvanceSettlementDetail_pdf', ['dataReport' => $dataReport]);
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Advance Settlement Detail.pdf');
                } else {
                    return Excel::download(new ExportReportAdvanceSettlementDetail, 'Export Report Advance Settlement Detail.xlsx');
                }
            } else {
                return redirect()->route('AdvanceSettlement.ReportAdvanceSettlementDetail')->with('NotFound', 'Budget, Sub Budget, & ASF Number Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportAdvanceSettlementDetail Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
