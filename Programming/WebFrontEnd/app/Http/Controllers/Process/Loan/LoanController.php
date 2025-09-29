<?php


namespace App\Http\Controllers\Process\Loan;

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

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $var            = 0;
        if (!empty($_GET['var'])) {
            $var = $_GET['var'];
        }

        $compact = [
            'var'               => $var,
            'varAPIWebToken'    => $varAPIWebToken,
        ];

        return view('Process.Loan.Transactions.CreateLoan', $compact);
    }

    public function ReportLoantoLoanSettlement(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionReimbursementNumber");
        $dataloantosettle = Session::get("LoanSettlementReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataloantosettle' => $dataloantosettle
        
        ];
        // dump($dataloantosettle);

        return view('Process.Loan.Reports.ReportLoantoLoanSettlement', $compact);
    }

    public function ReportLoantoLoanSettlementData( $project_code)
    {        
        try {
            Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getLoanToLoanSettlementSummary', 
                'latest',
                [
                    'parameter' => [
                        // 'CombinedBudgetCode' => 'Q000062',
                        // 'CombinedBudgetSectionCode' => '235',
                        'CombinedBudgetCode' => NULL,
                        'CombinedBudgetSectionCode' => NULL,
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

    public function ReportLoantoLoanSettlementStore(Request $request)
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
                
                return redirect()->route('Loan.ReportLoantoLoanSettlement')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportLoantoLoanSettlementData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PReimbursementSummaryReportDataPDF");
            //     Session::forget("PReimbursementSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('Loan.ReportLoantoLoanSettlement');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
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
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionReimbursementNumber");
        $dataLoan = Session::get("LoanReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataLoan' => $dataLoan
        
        ];
        // dump($dataLoan);

        return view('Process.Loan.Reports.ReportLoanSummary', $compact);
    }

    public function ReportLoanSummaryData( $project_code)
    {        
        try {
            Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getLoanSummary', 
                'latest',
                [
                    'parameter' => [
                        // 'CombinedBudgetCode' => 'Q000062',
                        // 'Creditor_RefID' => 166000000000001,
                        // 'Debitor_RefID' => 25000000000001,
                        'CombinedBudgetCode' => NULL,
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
            Session::put("LoanReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("LoanReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportLoanSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            // $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "") {
                Session::forget("LoanReportSummaryDataPDF");
                Session::forget("LoanReportSummaryDataExcel");
                
                return redirect()->route('Loan.ReportLoanSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportLoanSummaryData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PReimbursementSummaryReportDataPDF");
            //     Session::forget("PReimbursementSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('Loan.ReportLoanSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportLoanSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("LoanReportSummaryDataPDF");
            $dataExcel = Session::get("LoanReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataLoan = Session::get("LoanReportSummaryDataPDF");
                    // dd($dataLoan);

                    $pdf = PDF::loadView('Process.Loan.Reports.ReportLoanSummary_pdf', ['dataLoan' => $dataLoan])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Loan Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportLoanSummary, 'Export Report Loan Summary.xlsx');
                }
            } else {
                return redirect()->route('Loan.ReportLoanSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
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
    // public function ReportLoantoLoanSettlement(Request $request)
    // {
    //     try {
    //         $varAPIWebToken = Session::get('SessionLogin');
    //         $isSubmitButton = $request->session()->get('isButtonReportLoantoLoanSettlementSubmit');

    //         $dataReport = $isSubmitButton ? $request->session()->get('dataReportLoantoLoanSettlement', []) : [];

    //         $compact = [
    //             'varAPIWebToken'    => $varAPIWebToken,
    //             'dataReport'        => $dataReport
    //         ];

    //         return view('Process.Loan.Reports.ReportLoantoLoanSettlement', $compact);
    //     } catch (\Throwable $th) {
    //         Log::error("ReportLoantoLoanSettlement Function Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }

    // public function ReportLoantoLoanSettlementData($project, $site, $requester)
    // {
    //     try {
    //         // Budget
    //         // 46000000000033, "XL Microcell 2007"
    //         // 46000000000009, "Nokia 2G CME & TI Project"

    //         // Sub Budget
    //         // 143000000000305, "Ampang Kuranji - Padang"
    //         // 143000000000308, "Bukit Pakis Sby Infill"

    //         // Requester
    //         // 164000000000521, "Fabrian Danang Destiyara"
    //         // 164000000000155, "M. Fikri Caesarandi Hasibuan"

    //         $dataDummy = [
    //             // Fabrian Danang Destiyara
    //             [
    //                 "Sys_ID" => 76000000000059,
    //                 "DocumentNumber" => "LN/QDC/2025/000015",
    //                 "DocumentDateTimeTZ" => "2024-07-03 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000521,
    //                 "RequesterWorkerName" => "Fabrian Danang Destiyara",
    //                 "TotalAdvance" => "4875412.00",
    //                 "TotalPayment" => "4875412.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000015",
    //                 "DocumentASFDateTimeTZ" => "2024-07-03 00:00:00+07",
    //                 "TotalSettlement" => "4875412.00",
    //                 "TotalExpenseClaim" => "4674312.00",
    //                 "TotalAmountCompany" => "201100.00",
    //                 "Description" => "Settlement Biaya Penyambungan Listrik Baru",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000060,
    //                 "DocumentNumber" => "LN/QDC/2025/000014",
    //                 "DocumentDateTimeTZ" => "2024-07-09 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000521,
    //                 "RequesterWorkerName" => "Fabrian Danang Destiyara",
    //                 "TotalAdvance" => "2768450.00",
    //                 "TotalPayment" => "2768450.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000014",
    //                 "DocumentASFDateTimeTZ" => "2024-07-09 00:00:00+07",
    //                 "TotalSettlement" => "2768450.00",
    //                 "TotalExpenseClaim" => "2589320.00",
    //                 "TotalAmountCompany" => "179130.00",
    //                 "Description" => "Settlement biaya pindah panel beton di gudang",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000061,
    //                 "DocumentNumber" => "LN/QDC/2025/000013",
    //                 "DocumentDateTimeTZ" => "2024-07-16 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000521,
    //                 "RequesterWorkerName" => "Fabrian Danang Destiyara",
    //                 "TotalAdvance" => "5689450.00",
    //                 "TotalPayment" => "5689450.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000013",
    //                 "DocumentASFDateTimeTZ" => "2024-07-16 00:00:00+07",
    //                 "TotalSettlement" => "5689450.00",
    //                 "TotalExpenseClaim" => "5471364.00",
    //                 "TotalAmountCompany" => "218086.00",
    //                 "Description" => "Settlement Biaya Perbaikan Motor untuk dibawa ke Pangkalan Bun",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000062,
    //                 "DocumentNumber" => "LN/QDC/2025/000012",
    //                 "DocumentDateTimeTZ" => "2024-07-05 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000521,
    //                 "RequesterWorkerName" => "Fabrian Danang Destiyara",
    //                 "TotalAdvance" => "1476312.00",
    //                 "TotalPayment" => "1476312.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000012",
    //                 "DocumentASFDateTimeTZ" => "2024-07-05 00:00:00+07",
    //                 "TotalSettlement" => "1476312.00",
    //                 "TotalExpenseClaim" => "1350874.00",
    //                 "TotalAmountCompany" => "125438.00",
    //                 "Description" => "Settlement Biaya Warmeking Surat Kuasa Jaminan",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000063,
    //                 "DocumentNumber" => "LN/QDC/2025/000011",
    //                 "DocumentDateTimeTZ" => "2024-07-19 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000521,
    //                 "RequesterWorkerName" => "Fabrian Danang Destiyara",
    //                 "TotalAdvance" => "6254399.00",
    //                 "TotalPayment" => "6254399.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000011",
    //                 "DocumentASFDateTimeTZ" => "2024-07-19 00:00:00+07",
    //                 "TotalSettlement" => "6254399.00",
    //                 "TotalExpenseClaim" => "6021648.00",
    //                 "TotalAmountCompany" => "232751.00",
    //                 "Description" => "Settlement Operasional Crane (Jakarta-Semarang)",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             // M. Fikri Caesarandi Hasibuan
    //             [
    //                 "Sys_ID" => 76000000000059,
    //                 "DocumentNumber" => "LN/QDC/2025/000005",
    //                 "DocumentDateTimeTZ" => "2024-07-03 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000155,
    //                 "RequesterWorkerName" => "M. Fikri Caesarandi Hasibuan",
    //                 "TotalAdvance" => "3589710.00",
    //                 "TotalPayment" => "3589710.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000005",
    //                 "DocumentASFDateTimeTZ" => "2024-07-03 00:00:00+07",
    //                 "TotalSettlement" => "3589710.00",
    //                 "TotalExpenseClaim" => "3454672.00",
    //                 "TotalAmountCompany" => "135038.00",
    //                 "Description" => "Settlement Biaya Penyambungan Listrik Baru",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000060,
    //                 "DocumentNumber" => "LN/QDC/2025/000004",
    //                 "DocumentDateTimeTZ" => "2024-07-09 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000155,
    //                 "RequesterWorkerName" => "M. Fikri Caesarandi Hasibuan",
    //                 "TotalAdvance" => "1295614.00",
    //                 "TotalPayment" => "1295614.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000004",
    //                 "DocumentASFDateTimeTZ" => "2024-07-09 00:00:00+07",
    //                 "TotalSettlement" => "1295614.00",
    //                 "TotalExpenseClaim" => "1234125.00",
    //                 "TotalAmountCompany" => "61489.00",
    //                 "Description" => "Settlement biaya pindah panel beton di gudang",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000061,
    //                 "DocumentNumber" => "LN/QDC/2025/000003",
    //                 "DocumentDateTimeTZ" => "2024-07-16 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000155,
    //                 "RequesterWorkerName" => "M. Fikri Caesarandi Hasibuan",
    //                 "TotalAdvance" => "5618352.00",
    //                 "TotalPayment" => "5618352.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000003",
    //                 "DocumentASFDateTimeTZ" => "2024-07-16 00:00:00+07",
    //                 "TotalSettlement" => "5618352.00",
    //                 "TotalExpenseClaim" => "5245289.00",
    //                 "TotalAmountCompany" => "373063.00",
    //                 "Description" => "Settlement Biaya Perbaikan Motor untuk dibawa ke Pangkalan Bun",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000062,
    //                 "DocumentNumber" => "LN/QDC/2025/000002",
    //                 "DocumentDateTimeTZ" => "2024-07-05 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000155,
    //                 "RequesterWorkerName" => "M. Fikri Caesarandi Hasibuan",
    //                 "TotalAdvance" => "850237.00",
    //                 "TotalPayment" => "850237.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000002",
    //                 "DocumentASFDateTimeTZ" => "2024-07-05 00:00:00+07",
    //                 "TotalSettlement" => "850237.00",
    //                 "TotalExpenseClaim" => "812568.00",
    //                 "TotalAmountCompany" => "37669.00",
    //                 "Description" => "Settlement Biaya Warmeking Surat Kuasa Jaminan",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //             [
    //                 "Sys_ID" => 76000000000063,
    //                 "DocumentNumber" => "LN/QDC/2025/000001",
    //                 "DocumentDateTimeTZ" => "2024-07-19 00:00:00+07",
    //                 "CombinedBudgetCode" => "Q000062",
    //                 "CombinedBudgetName" => "XL Microcell 2007",
    //                 "CombinedBudgetSectionCode" => "254",
    //                 "CombinedBudgetSectionName" => "Ampang Kuranji - Padang",
    //                 "RequesterWorkerJobsPosition_RefID" => 164000000000155,
    //                 "RequesterWorkerName" => "M. Fikri Caesarandi Hasibuan",
    //                 "TotalAdvance" => "7014213.00",
    //                 "TotalPayment" => "7014213.00",
    //                 "Status" => "Final Approval",
    //                 "DocumentASFNumber" => "LNS/QDC/2025/000001",
    //                 "DocumentASFDateTimeTZ" => "2024-07-19 00:00:00+07",
    //                 "TotalSettlement" => "7014213.00",
    //                 "TotalExpenseClaim" => "6810928.00",
    //                 "TotalAmountCompany" => "203285.00",
    //                 "Description" => "Settlement Operasional Crane (Jakarta-Semarang)",
    //                 "StatusASF" => "Final Approval",
    //                 "TotalAdvancePayment" => "0.00",
    //                 "TotalAdvanceSettlement" => "0.00",
    //                 "CombinedBudget_RefID" => 46000000000033,
    //                 "CombinedBudgetSection_RefID" => 143000000000305,
    //             ],
    //         ];

    //         $filteredData = array_filter($dataDummy, function ($item) use ($project, $site, $requester) {
    //             return 
    //                 (empty($project['id'])      || $item['CombinedBudget_RefID'] == $project['id']) &&
    //                 (empty($site['id'])         || $item['CombinedBudgetSection_RefID'] == $site['id']) &&
    //                 (empty($requester['id'])    || $item['RequesterWorkerJobsPosition_RefID'] == $requester['id']);
    //         });

    //         $compact = [
    //             'project'                   => $project,
    //             'site'                      => $site,
    //             'requester'                 => $requester,
    //             'dataDetail'                => $filteredData,
    //             'totalAdvance'              => $this->calculateTotal($filteredData, 'TotalAdvance'),
    //             'totalPayment'              => $this->calculateTotal($filteredData, 'TotalPayment'),
    //             'totalSettlement'           => $this->calculateTotal($filteredData, 'TotalSettlement'),
    //             'totalExpenseClaim'         => $this->calculateTotal($filteredData, 'TotalExpenseClaim'),
    //             'totalAmountCompany'        => $this->calculateTotal($filteredData, 'TotalAmountCompany'),
    //             'totalAdvancePayment'       => $this->calculateTotal($filteredData, 'TotalAdvancePayment'),
    //             'totalAdvanceSettlement'    => $this->calculateTotal($filteredData, 'TotalAdvanceSettlement'),
    //         ];

    //         Session::put("isButtonReportLoantoLoanSettlementSubmit", true);
    //         Session::put("dataReportLoantoLoanSettlement", $compact);

    //         return $compact;
    //     } catch (\Throwable $th) {
    //         Log::error("ReportLoantoLoanSettlementData Function Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }

    // public function ReportLoantoLoanSettlementStore(Request $request)
    // {
    //     try {
    //         $project = [
    //             'id'        => $request->project_id_second,
    //             'code'      => $request->project_code_second,
    //             'name'      => $request->project_name_second,
    //         ];

    //         $site = [
    //             'id'        => $request->site_id_second,
    //             'code'      => $request->site_code_second,
    //             'name'      => $request->site_name_second,
    //         ];

    //         $requester = [
    //             'id'        => $request->worker_id_second,
    //             'name'      => $request->worker_name_second,
    //             'position'  => $request->worker_position_second,
    //         ];

    //         if (!$project['id'] && !$site['id'] && !$requester['id']) {
    //             Session::forget("isButtonReportLoantoLoanSettlementSubmit");
    //             Session::forget("dataReportLoantoLoanSettlement");

    //             return redirect()->route('Loan.ReportLoantoLoanSettlement')->with('NotFound', 'Budget, Sub Budget, & Requester Cannot Be Empty');
    //         }

    //         $compact = $this->ReportLoantoLoanSettlementData($project, $site, $requester);

    //         if ($compact === null || empty($compact)) {
    //             return redirect()->back()->with('NotFound', 'Data Not Found');
    //         }

    //         return redirect()->route('Loan.ReportLoantoLoanSettlement');
    //     } catch (\Throwable $th) {
    //         Log::error("ReportLoantoLoanSettlementStore Function Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }

    // public function PrintExportReportLoantoLoanSettlement(Request $request)
    // {
    //     try {
    //         $dataReport = Session::get("dataReportLoantoLoanSettlement");
    //         // $print_type = $request->print_type;
    //         // $project_code_second_trigger = $request->project_code_second_trigger;
    //         // dd($project_code_second_trigger);

    //         // if ($project_code_second_trigger == null) {
    //         //     Session::forget("isButtonReportLoantoLoanSettlementSubmit");
    //         //     Session::forget("dataReportLoantoLoanSettlement");

    //         //     return redirect()->route('Loan.ReportLoantoLoanSettlement')->with('NotFound', 'Budget, Sub Budget, & Requester Cannot Be Empty');
    //         // }

    //         if ($dataReport) {
    //             $print_type = $request->print_type;
    //             if ($print_type === "PDF") {
    //                 $pdf = PDF::loadView('Process.Loan.Reports.ReportLoantoLoanSettlement_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
    //                 $pdf->output();
    //                 $dom_pdf = $pdf->getDomPDF();

    //                 $canvas = $dom_pdf ->get_canvas();
    //                 $width = $canvas->get_width();
    //                 $height = $canvas->get_height();
    //                 $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
    //                 $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

    //                 return $pdf->download('Export Loan to Loan Settlement.pdf');
    //             } else {
    //                 return Excel::download(new ExportReportLoantoLoanSettlement, 'Export Advance To ASF.xlsx');
    //             }
    //         } else {
    //             return redirect()->route('Loan.ReportLoantoLoanSettlement')->with('NotFound', 'Budget, Sub Budget, & Requester Cannot Be Empty');
    //         }

    //     } catch (\Throwable $th) {
    //         Log::error("PrintExportReportLoantoLoanSettlement Function Error at " . $th->getMessage());
    //         return redirect()->back()->with('NotFound', 'Process Error');
    //     }
    // }
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