<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\ExportExcel\MasterData\ExportSupplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Master\Supplier\StoreSupplier;
use App\Http\Requests\Master\Supplier\StoreSupplierSpecialization;
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
                    'status' => 'FINAL APPROVED'
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

    public function picklist(Request $request)
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

    public function summary(Request $request)
    {
        $limit = $request->input('length', 10);
        $offset = $request->input('start', 0);
        $draw = $request->input('draw');
        $search = $request->input('search.value');

        $response = $this->supplierService->getSummary(
            $search,
            $limit,
            $offset
        );

        $status = $response['metadata']['HTTPStatusCode'];

        $data = [];
        $total = 0;

        if ($status == 200) {
            $data = $response['data']['data'] ?? [];
            $total = $response['data']['totalRecords'] ?? count($data);
        }

        return response()->json([
            'draw' => intval($draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data
        ]);
    }

    public function export(Request $request)
    {
        try {
            $dataReport = json_decode($request->dataReport, true);
            $type = $request->printType;

            if ($dataReport) {
                if ($type === "PDF") {
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportSupplier($dataReport), 'Supplier.xlsx');
                } else {
                    throw new \Exception('Failed to Export PR to PO Report');
                }
            } else {
                throw new \Exception('Suppliers Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Export Supplier Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }

    public function subCategoryStore(StoreSupplierSpecialization $request)
    {
        try {
            $code = $request->input('supplier_category_name_modal');
            $name = $request->input('specialization');

            $response = $this->supplierService->createSubCategory($code, $name);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Category Supplier => ' . $response['data']['message']);
            }

            $documentNumbers = array_map(
                function ($code, $name) {
                    return "{$code} - {$name}";
                },
                $response['data']['subCategoryCode'],
                $response['data']['subCategoryName']
            );

            $compact = [
                "documentNumber" => $documentNumbers,
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Category Supplier Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }
}