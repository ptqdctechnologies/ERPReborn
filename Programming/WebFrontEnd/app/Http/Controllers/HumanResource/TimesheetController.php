<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\ExportExcel\Timesheet\ExportReportTimesheetSummary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\HumanResource\TimesheetService;
use App\Services\WorkflowService;

class TimesheetController extends Controller
{
    protected $timesheetService, $workflowService;

    public function __construct(TimesheetService $timesheetService, WorkflowService $workflowService)
    {
        $this->timesheetService = $timesheetService;
        $this->workflowService  = $workflowService;
    }

    public function ReportTimesheetSummary(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $isSubmitButton = $request->session()->get('isButtonReportTimesheetSummarySubmit');

            $dataReport = $isSubmitButton ? $request->session()->get('dataReportTimesheetSummary', []) : [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'dataReport' => $dataReport
            ];
    
            return view('HumanResource.Timesheet.Reports.ReportTimesheetSummary', $compact);
        } catch (\Throwable $th) {
            Log::error("ReportTimesheetSummary Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportTimesheetSummaryData($project_id, $site_id, $project_name, $project_code, $site_code) 
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $getReportTimesheetSummary    = null;

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
            $getReportTimesheetSummary = [
                [
                    
                    "DocumentNumber"                      => "PR/QDC/2023/25000280",
                    "DocumentDateTimeTZ"                  => "2024-12-05 00:00:00+07",
                    "Product_ID"                          => 720077-0000,
                    "Description"                         => "Pengiriman Material Dari Bogor ke Tanjung Priuk (Container 20ft -Stuffing Luar) Cap 25 Ton",
                    "TotalAdvance"                        => "720000",
                    "CurrencyName"                        => "IDR",
                    "DepartingFrom"                       => "-",
                    "DestinationTo"                       => "-",
                    "TotalExpenseClaimCart"               => "0",
                    "TotalAmountDueToCompanyCart"         => "0",
                    "remark"                              => "720000",

                    "Sys_ID"                              => 76000000000054,
                    "CombinedBudgetCode"                  => "Q000062",
                    "CombinedBudgetName"                  => "XL Microcell 2007",
                    "CombinedBudgetSectionCode"           => "235",
                    "CombinedBudgetSectionName"           => "Ampang Kuranji - Padang",
                    "RequesterWorkerJobsPosition_RefID"   => 164000000000023,
                    "RequesterWorkerName"                 => "Adhe Kurniawan",
                    "BeneficiaryWorkerJobsPosition_RefID" => 164000000000023,
                    "BeneficiaryWorkerName"               => "",
                    "CombinedBudget_RefID"                => 46000000000033,
                    "CombinedBudgetSection_RefID"         => 143000000000305,                    
                ],
                
            ];

            $reportData = is_string($getReportTimesheetSummary) ? json_decode($getReportTimesheetSummary, true) : $getReportTimesheetSummary;

            // $filteredData = array_filter($reportData, function ($item) use ($project_id, $site_id, $requester_id, $beneficiary_id) {
            //     return 
            //         (empty($project_id)     || $item['CombinedBudget_RefID'] == $project_id) &&
            //         (empty($site_id)        || $item['CombinedBudgetSection_RefID'] == $site_id) &&
            //         (empty($requester_id)   || $item['RequesterWorkerJobsPosition_RefID'] == $requester_id) &&
            //         (empty($beneficiary_id) || $item['BeneficiaryWorkerJobsPosition_RefID'] == $beneficiary_id);
            // });

            // $totalAdvance = array_reduce($filteredData, function ($carry, $item) {
            // $totalAdvance = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalAdvance'] ?? 0);
            // }, 0);

            // $totalExpense = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalExpenseClaimCart'] ?? 0);
            // }, 0);

            // $totalAmount = array_reduce($reportData, function ($carry, $item) {
            //     return $carry + ($item['TotalAmountDueToCompanyCart'] ?? 0);
            // }, 0);

            $compact = [
                // 'dataDetail'        => $filteredData,
                'dataDetail'        => $reportData,
                'budgetCode'        => $project_code,
                'budgetName'        => $project_name,
                'siteCode'          => $site_code,
                'requesterName'     => "",
                'beneficiaryName'   => "",
                'total'             => 0,
                'totalExpense'      => 0,
                'totalAmount'       => 0,
            ];

            Session::put("isButtonReportTimesheetSummarySubmit", true);
            Session::put("dataReportTimesheetSummary", $compact);

            return $compact;
        } catch (\Throwable $th) {
            Log::error("ReportTimesheetSummaryData Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportTimesheetSummaryStore(Request $request) 
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

            // dd($project_code, $project_name);

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
                Session::forget("isButtonReportTimesheetSummarySubmit");
                Session::forget("dataReportTimesheetSummary");
        
                return redirect()->route('Timesheet.ReportTimesheetSummary')->with('NotFound', $message);
            }

            $compact = $this->ReportTimesheetSummaryData($project_id, $site_id, $project_name, $project_code, $site_code);
            // dd($compact);
            if ($compact === null || empty($compact)) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }
            
            return redirect()->route('Timesheet.ReportTimesheetSummary');
        } catch (\Throwable $th) {
            Log::error("ReportTimesheetSummaryStore Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportTimesheetSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportTimesheetSummary");
            $print_type = $request->print_type;
            $project_code_second_trigger = $request->project_code_second_trigger;

            if ($project_code_second_trigger == null) {
                Session::forget("isButtonReportTimesheetSummarySubmit");
                Session::forget("dataReportTimesheetSummary");

                return redirect()->route('PurchasOrder.ReportTimesheetSummary')->with('NotFound', 'Budget, & Sub Budget Cannot Empty');
            }

            if ($dataReport) {
                if ($print_type === "PDF") {
                    $pdf = PDF::loadView('HumanResource.Timesheet.Reports.ReportTimesheetSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report PO to DO.pdf');
                } else {
                    return Excel::download(new ExportReportTimesheetSummary, 'Export Report PO to DO.xlsx');
                }
            } else {
                return redirect()->route('Timesheet.ReportTimesheetSummary')->with('NotFound', 'Budget, & Sub Budget Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("PrintExportReportTimesheetSummary Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var'               => $var,
            'statusRevisi'      => 0,
            'varAPIWebToken'    => $varAPIWebToken
        ];

        // dump($compact);

        return view('HumanResources.Timesheet.Transactions.index', $compact);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $response = $this->timesheetService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($response);
            }

            $responseWorkflow = $this->workflowService->submit(
                $response['data']['businessDocument']['businessDocument_RefID'],
                $request->workFlowPath_RefID,
                $request->comment,
                $request->approverEntity,
            );

            if ($responseWorkflow['metadata']['HTTPStatusCode'] !== 200) {
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

    public function storeActivity(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.humanResource.setPersonWorkTimeSheetActivity', 
        'latest', 
        [
        'entities' => [
            'personWorkTimeSheet_RefID' => (int) $request->timesheet2,
            'projectSectionItem_RefID' => (int) $request->timesheet2,
            'startDateTimeTZ' => $request->startDate3,
            'finishDateTimeTZ' => $request->finishDate3,
            'activity' => $request->activity3,
            'colorText' => $request->textColor3,
            'colorBackground' => $request->backgroundColor3
            ]
        ]
        );
        
        return redirect()->route('Timesheet.index')->with('message', 'Timesheet successfully created ...');
    }

    public function updates(Request $request)
    {
        // echo $request->backgroundColor2;die;
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.update.humanResource.setPersonWorkTimeSheet', 
        'latest', 
        [
        'recordID' => (int) $request->timesheetId,
        'entities' => [
            'documentDateTimeTZ' => $request->startDate2,
            'person_RefID' => (int) $request->behalfOf2,
            'startDateTimeTZ' => $request->startDate2,
            'finishDateTimeTZ' => $request->finishDate2,
            'project_RefID' => (int) $request->ProjectEvent2,
            'colorText' => $request->textColor2,
            'colorBackground' => $request->backgroundColor2
            ]
        ]
        );
        
        return redirect()->route('Timesheet.index')->with('message', 'Timesheet successfully updated ...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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

    public function RevisionTimesheet(Request $request)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $timesheet_RefID    = $request->timesheet_RefID;

            return view('HumanResources.Timesheet.Transactions.RevisionTimesheet');
        } catch (\Throwable $th) {
            Log::error("RevisionTimesheet Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
