<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Master\Supplier\StoreSupplier;
use App\Services\Master\Supplier\SupplierService;

class SupplierController extends Controller
{
    protected $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index(Request $request)
    {
        return view('Master.Supplier.Transactions.IndexSupplier');
    }

    public function create()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Master.Supplier.Transactions.CreateSupplier', $compact);
    }

    public function store(StoreSupplier $request)
    {
        try {
            $response = $this->supplierService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Supplier => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Supplier Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function revision(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $supplierRefID = $request->input('modal_supplier_id');

            $response = $this->supplierService->getDetail($supplierRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Supplier');
            }

            $details = $response['data']['data'] ?? [];
            $header = $details[0] ?? [];
            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
                'supplierRefID' => $header['Supplier_RefID'] ?? '',
                'headerSupplier' => [
                    'supplierName' => $header['SupplierName'] ?? '',
                    'taxID' => $header['Tax_ID'] ?? '',
                    'phoneNumber' => $header['PhoneNumber'] ?? '',
                    'email' => $header['Email'] ?? '',
                    'country' => $header['Country'] ?? '',
                    'province' => $header['Province'] ?? '',
                    'city' => $header['City'] ?? '',
                    'address' => $header['Address'] ?? '',
                    'legalEntityRefID' => $header['LegalEntity'] ?? '',
                    'contactPerson' => $header['ContactPerson'] ?? '',
                    'bankRefID' => $header['Bank_RefID'] ?? '',
                    'bankName' => $header['BankName'] ?? '',
                    'bankAcronym' => $header['BankAcronym'] ?? '',
                    'accountNumber' => $header['AccountNumber'] ?? '',
                    'accountName' => $header['AccountName'] ?? '',
                    'remark' => $header['Remark'] ?? '',
                ],
            ];

            return view('Master.Supplier.Transactions.RevisionSupplier', $compact);
        } catch (\Throwable $th) {
            Log::error('Revision Supplier Error', [
                'message' => $th->getMessage(),
                'supplierRefID' => ''
            ]);

            return redirect()
                ->route('Supplier.index')
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function SupplierPickList(Request $request)
    {
        $supplierID = $request->input('supplier_id');

        $response = $this->supplierService->getPickList($supplierID);

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

    public function SupplierSummary(Request $request)
    {
        $supplierID = $request->input('supplier_id');

        $response = $this->supplierService->getSummary($supplierID);

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }
}