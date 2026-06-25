<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    // Tampilkan daftar semua post
    public function index(Request $request)
    {
        $var = $request->query('var', 0);
        $varAPIWebToken = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Sales Invoice Form');

        return view('Finance.Invoice.Transactions.CreateInvoice', [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
            'documentType_RefID' => $documentTypeRefID
        ]);
    }

    public function RevisionInvoice(Request $request)
    {
        try {
            $var = $request->query('var', 0);
            $varAPIWebToken = Session::get('SessionLogin');
            $documentTypeRefID = $this->GetBusinessDocumentsType('Sales Invoice Form');

            return view('Finance.Invoice.Transactions.RevisionInvoice', [
                'var' => $var,
                'varAPIWebToken' => $varAPIWebToken,
                'documentType_RefID' => $documentTypeRefID
            ]);
        } catch (\Throwable $th) {
            Log::error("Revision Invoice Function Error: " . $th->getMessage());

            return redirect()->route('Invoice.index', ['var' => 1])->with('NotFound', 'Process Error');
        }
    }

    public function ReportInvoiceSummary(Request $request)
    {
        return view('Finance.Invoice.Reports.ReportInvoiceSummary');
    }

    // Tampilkan form untuk membuat post baru
    public function create()
    {
        //
    }

    // Simpan post baru ke database
    public function store(Request $request)
    {
        //
        // 'transaction.create.finance.setSalesInvoice', 
        // 'latest',
        // //-----[ METADATA ]-----(  END  )-----
        // //-----[ DATA ]-----( START )-----
        // [
        // "entities" => [
        //     "documentDateTimeTZ" => '2026-06-18',
        //     "log_FileUpload_Pointer_RefID" => 91000000000001,
        //     "combinedBudget_RefID" => 46000000000001,
        //     "customer_RefID" => 125000000000001,
        //     "currency_RefID" => 62000000000001,
        //     "vatStatus" => 1,
        //     "vatValue" => 10,
        //     "vatNumber" => '01.234.567.8-999.000',
        //     "remarks" => 'My Remarks',
        //     "additionalData" => [
        //         "itemList" => [
        //             "items" => [
        //                     [
        //                     "entities" => [
        //                         "combinedBudgetSectionDetail_RefID" => 169000000000001,
        //                         "value" => 15080000.00
        //                             ]
        //                     ]
        //                 ]
        //             ]
        //         ]
        //     ]
        // ]
    }

    // Tampilkan satu post berdasarkan ID
    public function show($id)
    {
        //
    }

    // Tampilkan form untuk edit post
    public function edit($id)
    {
        //
    }

    // Update post di database
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus post dari database
    public function destroy($id)
    {
        //
    }
}
