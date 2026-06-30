<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Finance\Invoice\StoreInvoice;

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
    public function store(StoreInvoice $request)
    {
        try {
            $token = Session::get('SessionLogin');

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $token,
                'transaction.create.finance.setSalesInvoice',
                'latest',
                [
                    "entities" => [
                        "documentDateTimeTZ" => date('Y-m-d'),
                        "log_FileUpload_Pointer_RefID" => null,
                        "combinedBudget_RefID" => (int) $request->budget_id,
                        "customer_RefID" => null,
                        "currency_RefID" => null,
                        "vatStatus" => null,
                        "vatValue" => $request->vatValue ? $request->vatValue : 0,
                        "vatNumber" => null,
                        "remarks" => $request->remarks,
                        "additionalData" => [
                            "itemList" => [
                                "items" => $request->invoiceDetails
                            ]
                        ]
                    ]
                ]
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Invoice => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Invoice Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
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
