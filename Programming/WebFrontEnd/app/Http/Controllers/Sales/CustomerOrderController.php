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

    public function picklist()
    {
        $response = $this->customerOrderService->getPickList();

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data']['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }

    public function Revision(Request $request)
    {
        try {
            $varAPIWebToken = $request->session()->get('SessionLogin');
            $customerRefID = $request->input('customer_order_id');
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
                    'combinedBudget_RefID' => $header['CombinedBudget_RefID'] ?? '',
                    'combinedBudgetCode' => $header['CombinedBudgetCode'] ?? '',
                    'combinedBudgetName' => $header['CombinedBudgetName'] ?? '',
                    'currency_RefID' => $header['Currency_RefID'] ?? '',
                    'currencyCode' => $header['CurrencyISOCode'] ?? '',
                    'currencyName' => $header['CurrencyName'] ?? '',
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

            $response = $this->customerOrderService->summaryReport(
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