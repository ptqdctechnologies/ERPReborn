<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Master\SpecializationSupplier\SpecializationSupplierService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Master\Supplier\StoreSupplierSpecialization;

class SpecializationSupplierController extends Controller
{
    protected $specializationSupplierService;

    public function __construct(SpecializationSupplierService $specializationSupplierService)
    {
        $this->specializationSupplierService = $specializationSupplierService;
    }

    public function index(Request $request)
    {
        return view('Master.SpecializationSupplier.Transactions.index');
    }

    public function create()
    {
    }

    public function store(StoreSupplierSpecialization $request)
    {
        try {
            $code = $request->input('supplier_category_name_modal');
            $name = $request->input('specialization');

            $response = $this->specializationSupplierService->create($code, $name);

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

    public function revision(Request $request)
    {
        try {
            $token = Session::get('SessionLogin');
            $specializationSupplierRefID = $request->input('modal_specialization_supplier_id');

            $response = $this->specializationSupplierService->getDetail($specializationSupplierRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Specialization Supplier');
            }

            $details = $response['data']['data'] ?? [];
            $data = $details[0] ?? [];
            $compact = [
                'varAPIWebToken' => $token,
                'categoryCode' => $data['CategoryCode'],
                'specializationRefID' => $data['Sys_ID'],
                'specializationCode' => $data['Code'],
                'specializationName' => $data['Name'],
                'specializationStatus' => 1
            ];

            return view('Master.SpecializationSupplier.Transactions.revision', $compact);
        } catch (\Throwable $th) {
            Log::error('Revision Specialization Supplier Error', [
                'message' => $th->getMessage(),
                'specializationSupplierRefID' => ''
            ]);

            return redirect()
                ->route('SpecializationSupplier.index')
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $categoryCode = $request->input('category_code');
            $code = $request->input('sub_category_code');
            $name = $request->input('sub_category_name');
            $status = $request->input('sub_category_status');

            $response = $this->specializationSupplierService->update($id, $categoryCode, $code, $name, $status);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Sub Category Supplier => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data']['subCategoryCode'] . ' - ' . $response['data']['subCategoryName'],
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Sub Category Supplier Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function destroy($id)
    {
    }

    public function picklist()
    {
        $response = $this->specializationSupplierService->getPickList();

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
}