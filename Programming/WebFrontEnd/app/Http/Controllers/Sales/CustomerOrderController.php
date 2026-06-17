<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Imports\CustomerOrderImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Services\Sales\CustomerOrderService;

class CustomerOrderController extends Controller
{
    protected $customerOrderService;

    public function __construct(CustomerOrderService $customerOrderService)
    {
        $this->customerOrderService = $customerOrderService;
    }

    public function download()
    {
        $file = public_path('files/template-customer-order.xlsx');

        return response()->download($file);
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        $import = new CustomerOrderImport;
        $data = Excel::toCollection($import, $request->file('excel_file'));

        $rows = $data[0];

        return response()->json([
            'status' => true,
            'rows' => $rows,
        ]);
    }

    public function index()
    {
        return view('Sales.CustomerOrder.Transactions.index');
    }

    public function create(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Form');

        // dump($varAPIWebToken);

        return view('Sales.CustomerOrder.Transactions.create', [
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function Revision(Request $request)
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Revision Form');

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentType_RefID' => $documentTypeRefID,
            ];

            return view('Sales.CustomerOrder.Transactions.RevisionCustomerOrder', $compact);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function ReportCustomerOrderSummary(Request $request)
    {
        $isSubmitButton = Session::get('isButtonReportCustomerOrderSummary');
        $dataSummary = $isSubmitButton ? Session::get('dataReportCustomerOrderSummary') : [];

        return view('Sales.CustomerOrder.Reports.ReportCustomerOrderSummary', [
            'dataSummary' => $dataSummary
        ]);
    }

    public function ReportCustomerOrderSummaryStore(Request $request)
    {
        try {
            $project = [
                'id' => $request->budget_id,
                'name' => $request->budget_name,
            ];

            $site = [
                'id' => $request->sub_budget_id,
                'name' => $request->sub_budget_name,
            ];

            $date = $request->customer_order_date_range;

            $response = $this->customerOrderService->summaryReport($project, $site, $date);

            if ($response === null) {
                throw new \Exception('Failed to fetch Report Customer Order Summary');
            }

            Session::put("isButtonReportCustomerOrderSummary", true);
            Session::put("dataReportCustomerOrderSummary", $response);

            return redirect()->route('CustomerOrder.ReportSummary');
        } catch (\Throwable $th) {
            Log::error("Report Customer Order Summary Store Function Error: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ReportCustomerOrderToInvoice(Request $request)
    {
        return view('Sales.CustomerOrder.Reports.ReportCustomerOrderToInvoice');
    }
}