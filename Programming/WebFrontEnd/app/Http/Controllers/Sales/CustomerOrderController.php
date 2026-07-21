<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Imports\CustomerOrderImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Services\Sales\CustomerOrderService;
use App\Http\Controllers\ExportExcel\CustomerOrder\ExportReportCustomerOrder;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerOrderController extends Controller
{
    protected $customerOrderService;

    public function __construct(CustomerOrderService $customerOrderService)
    {
        $this->customerOrderService = $customerOrderService;
    }

    public function download(Request $request)
    {
        $type = $request->input('customer_order_type');

        if ($type == "SUB_BUDGET_BASE") {
            $file = public_path('files/template-customer-order.xlsx');
        } else {
            $file = public_path('files/template-customer-order-product.xlsx');
        }

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
        // return response()->json($request->all());

        try {
            $response = $this->customerOrderService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Customer Order => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Customer Order Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->customerOrderService->update($id, $request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Customer Order => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Customer Order Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function destroy($id)
    {
    }

    public function picklist(Request $request)
    {
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $offset = floor($start / $length) + 1;
        $limit = $length;

        $searchValue = $request->input('search.value');

        $formatted = [
            'pagination' => [
                'pageSize' => (int) $limit,
                'pageShow' => (int) $offset
            ],
            'dataFilter' => [
                'businessDocumentNumber' => $searchValue,   //'WHIn/QDC',
                'documentDateStart' => NULL,        //'2026-01-01'
                'documentDateFinish' => NULL,       //'2026-12-31'
                'requesterName' => NULL,            //'Adhe'
                'combinedBudget' => NULL,           //'Q000062'
                'combinedBudgetSection' => NULL     //'240'
            ],
        ];

        $response = $this->customerOrderService->picklist($formatted);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            ]);
        }

        $loanData = $response['data']['data'];

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $loanData['header']['dataCount'],
            'recordsFiltered' => $loanData['header']['dataCount'],
            'data' => $loanData['content']['itemList']
        ]);
    }

    public function Revision(Request $request)
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $customerRefID = $request->input('modal_customer_order_id');
            $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Revision Form');

            $response = $this->customerOrderService->getDetail($customerRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Customer Order');
            }

            $details = $response['data']['data'] ?? [];
            $header = $details[0] ?? [];

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'documentType_RefID' => $documentTypeRefID,
                'customerOrder_RefID' => $header['CustomerOrder_RefID'] ?? '',
                'header' => [
                    'type' => $header['Type'] ?? '',
                    'combinedBudget_RefID' => $header['CombinedBudget_RefID'] ?? '',
                    'combinedBudgetCode' => $header['CombinedBudgetCode'] ?? '',
                    'combinedBudgetName' => $header['CombinedBudgetName'] ?? '',
                    'currency_RefID' => $header['Currency_RefID'] ?? '',
                    'currencyCode' => $header['CurrencyISOCode'] ?? '',
                    'currencyName' => $header['CurrencyName'] ?? '',
                    'vatStatus' => $header['VatStatus'] ?? '',
                    'vatRatio' => $header['VatRatio'] ?? ''
                ],
                'details' => $details
            ];

            return view('Sales.CustomerOrder.Transactions.revision', $compact);
        } catch (\Throwable $th) {
            Log::error('Customer Order Index Error', [
                'message' => $th->getMessage(),
                'customerRefID' => $request->input('customer_order_id')
            ]);

            return redirect()
                ->route('CustomerOrder.index', ['var' => 1])
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function ReportCustomerOrderSummary(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Sales.CustomerOrder.Reports.ReportCustomerOrderSummary', $compact);
    }

    public function ReportCustomerOrderSummaryStore(Request $request)
    {
        try {
            $limit = $request->input('length', 10);
            $offset = $request->input('start', 0);
            $draw = $request->input('draw');
            $search = $request->input('search.value');

            $budgetCode = $request->input('budget_code');
            $subBudgetCode = $request->input('sub_budget_code');
            $date = $request->input('customer_order_date');

            $response = $this->customerOrderService->summary(
                $budgetCode,
                $subBudgetCode,
                $date,
                $limit,
                $offset
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Customer Order Summary');
            }

            $totalRecords = $response['data']['totalRecords'] ?? $response['data']['rowCount'];

            $compact = [
                'status' => $response['metadata']['HTTPStatusCode'],
                'data' => $response['data']['data'],
                'draw' => intval($draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalRecords
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Customer Order Summary Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    public function PrintExportReportCustomerOrder(Request $request)
    {
        try {
            ini_set('memory_limit', '512M');
            set_time_limit(180);

            $dataCustomerOrderSummary = json_decode($request->dataReport, true);
            $type = $request->printType;

            if ($dataCustomerOrderSummary) {
                if ($type === "PDF") {
                    $pdf = PDF::loadView('Sales.CustomerOrder.Reports.ReportCustomerOrderSummary_pdf', ['dataCustomerOrder' => $dataCustomerOrderSummary])
                        ->setPaper('a4', 'landscape');

                    $pdf->output();

                    $dom_pdf = $pdf->getDomPDF();
                    $canvas = $dom_pdf->get_canvas();
                    $width = $canvas->get_width();
                    $height = $canvas->get_height();
                    $canvas->page_text($width - 88, $height - 35, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
                    $canvas->page_text(34, $height - 35, "Print by " . $request->session()->get("SessionLoginName"), null, 10, array(0, 0, 0));

                    return $pdf->download('Export Report Customer Order.pdf');
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportReportCustomerOrder($dataCustomerOrderSummary), 'Export Report Customer Order.xlsx');
                } else {
                    throw new \Exception('Failed to Export Customer Order Report');
                }
            } else {
                throw new \Exception('Customer Order Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Print Export Report Customer Order Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function ReportCustomerOrderToInvoice(Request $request)
    {
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Sales.CustomerOrder.Reports.ReportCustomerOrderToInvoice', $compact);
    }
}