<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Finance\AccountPayableService;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class AccountPayableController extends Controller
{
    protected $accountPayableService;

    public function __construct(AccountPayableService $accountPayableService)
    {
        $this->accountPayableService    = $accountPayableService;
    }

    public function index() 
    {
        return view('');
    }

    public function ReportAccountPayableSummary() 
    {
        $isSubmitButton = Session::get('isButtonReportAccountPayableSummary');
        $dataReport     = $isSubmitButton ? Session::get('dataReportAccountPayableSummary') : [];

        $compact = [
            'dataReport' => $dataReport
        ];

        return view('Finance.AccountPayable.Reports.ReportAccountPayableSummary', $compact);
    }

    public function ReportAccountPayableSummaryStore(Request $request)
    {
        try {
            $project = [
                'id'        => $request->project_id_second,
                'code'      => $request->project_code_second,
                'name'      => $request->project_name_second,
            ];

            $site = [
                'id'        => $request->site_id_second,
                'code'      => $request->site_code_second,
                'name'      => $request->site_name_second,
            ];

            $supplier = [
                'id'        => $request->supplier_id,
                'code'      => $request->supplier_code,
                'address'   => $request->supplier_address,
            ];

            $date           = $request->input('date');

            // dd($project, $site, $supplier, $date);

            if (!$project['id']) {
                Session::forget("isButtonReportAccountPayableSummary");
                Session::forget("dataReportAccountPayableSummary");

                return redirect()->route('AccountPayable.ReportAccountPayableSummary')->with('NotFound', 'Budget Cannot Be Empty');
            }

            $response = $this->accountPayableService->summaryReport($project, $site, $supplier, $date);

            if ($response === null) {
                return redirect()->back()->with('NotFound', 'Data Not Found');
            }

            Session::put("isButtonReportAccountPayableSummary", true);
            Session::put("dataReportAccountPayableSummary", $response);

            return redirect()->route('AccountPayable.ReportAccountPayableSummary');
        } catch (\Throwable $th) {
            Log::error("Store Account Payable Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function PrintExportReportAccountPayableSummary(Request $request) 
    {
        try {
            $dataReport = Session::get("dataReportAccountPayableSummary");
            $print_type = $request->print_type;

            if ($print_type == "PDF") {
                $pdf = PDF::loadView('Finance.AccountPayable.Reports.ReportAccountPayableSummary_pdf', ['dataReport' => $dataReport])->setPaper('a4', 'landscape');
                $pdf->output();
                $dom_pdf = $pdf->getDomPDF();

                $canvas = $dom_pdf ->get_canvas();
                $width = $canvas->get_width();
                $height = $canvas->get_height();
                $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                return $pdf->download('Account Payable Summary.pdf');
            } else {

            }
        } catch (\Throwable $th) {
            Log::error("Print Export Account Payable Function Error: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}