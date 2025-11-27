<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Imports\CustomerOrderImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class CustomerOrderController extends Controller
{
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

    public function index(Request $request)
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');
        $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Form');

        return view('Sales.CustomerOrder.Transactions.CreateCustomerOrder', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken,
            'documentType_RefID'    => $documentTypeRefID
        ]);
    }

    public function Revision(Request $request) 
    {
        try {
            $varAPIWebToken     = $request->session()->get('SessionLogin');
            $documentTypeRefID  = $this->GetBusinessDocumentsTypeFromRedis('Sales Order Revision Form');

            $compact = [
                'varAPIWebToken'        => $varAPIWebToken,
                'documentType_RefID'    => $documentTypeRefID,
            ];

            return view('Sales.CustomerOrder.Transactions.RevisionCustomerOrder', $compact);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function ReportCustomerOrderSummary(Request $request) 
    {
        return view('Sales.CustomerOrder.Reports.ReportCustomerOrderSummary');
    }

    public function ReportCustomerOrderToInvoice(Request $request)
    {
        return view('Sales.CustomerOrder.Reports.ReportCustomerOrderToInvoice');
    }
}