<?php

namespace App\Http\Controllers\Process\Reimbursement;

use Illuminate\Http\Request;
use App\Http\Controllers\ExportExcel\Process\ExportReportReimbursementDetail;
use App\Http\Controllers\ExportExcel\Process\ExportReportReimbursementSummary;
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

class ReimbursementController extends Controller
{
    public function index(Request $request)
    {
        
    }

    public function ReportReimbursementSummary(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionReimbursementNumber");
        $dataRem = Session::get("ReimbursementReportSummaryDataPDF");

        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }
        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'statusRevisi' => 1,
            'statusHeader' => "Yes",
            'statusDetail' => 1,
            'dataHeader' => [],
            'dataRem' => $dataRem
        
        ];
        // dump($dataRem);

        return view('Process.Reimbursement.Reports.ReportReimbursementSummary', $compact);
    }

    public function ReportReimbursementSummaryData( $project_code)
    {        
        try {
            Log::error("Error at ",[$project_code]);

            $varAPIWebToken = Session::get('SessionLogin');

            $filteredArray = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.documentForm.finance.getReimbursementSummary', 
                'latest',
                [
                    'parameter' => [
                        'CombinedBudgetCode' => $project_code,
                        'Vendor_RefID' => NULL
                        // 'CombinedBudgetCode' =>  $project_code,
                        // 'CombinedBudgetSectionCode' =>  $site_code,
                        // 'Warehouse_RefID' => NULL
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
            Session::put("ReimbursementReportSummaryDataPDF", $filteredArray['data']['data']);
            Session::put("ReimbursementReportSummaryDataExcel", $filteredArray['data']['data']);
            return $filteredArray['data']['data'];
        }
        catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportReimbursementSummaryStore(Request $request)
    {
        // tes;
        try {
            $project_code = $request->project_code_second;
            // $site_code = $request->site_id_second;

            $statusHeader = "Yes";
            Log::error("Error at " ,[$request->all()]);
            if ($project_code == "") {
                Session::forget("ReimbursementReportSummaryDataPDF");
                Session::forget("ReimbursementReportSummaryDataExcel");
                
                return redirect()->route('Reimbursement.ReportReimbursementSummary')->with('NotFound', 'Cannot Empty');
            }

            $compact = $this->ReportReimbursementSummaryData($project_code);
            // dd($compact);
            // if ($compact['dataHeader'] == []) {
            //     Session::forget("PReimbursementSummaryReportDataPDF");
            //     Session::forget("PReimbursementSummaryReportDataExcel");

            //     return redirect()->back()->with('NotFound', 'Data Not Found');
            // }

            return redirect()->route('Reimbursement.ReportReimbursementSummary');
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportReimbursementSummary(Request $request)
    {
        try {
            $dataPDF = Session::get("ReimbursementReportSummaryDataPDF");
            $dataExcel = Session::get("ReimbursementReportSummaryDataExcel");

            
            if ($dataPDF && $dataExcel) {
                $print_type = $request->print_type;
                if ($print_type == "PDF") {
                    $dataRem = Session::get("ReimbursementReportSummaryDataPDF");
                    // dd($dataRem);

                    $pdf = PDF::loadView('Process.Reimbursement.Reports.ReportReimbursementSummary_pdf', ['dataRem' => $dataRem])->setPaper('a4', 'landscape');
                    $pdf->output();
                    $dom_pdf = $pdf->getDomPDF();

                    $canvas = $dom_pdf ->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Reimbursement Summary.pdf');
                } else if ($print_type == "Excel") {
                    return Excel::download(new ExportReportReimbursementSummary, 'Export Report Reimbursement Summary.xlsx');
                }
            } else {
                return redirect()->route('Reimbursement.ReimbursementSummary')->with('NotFound', 'Data Cannot Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}