<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Master\CategorySupplier\CategorySupplierService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Master\Supplier\StoreSupplierCategory;

class CategorySupplierController extends Controller
{
    protected $categorySupplierService;

    public function __construct(CategorySupplierService $categorySupplierService)
    {
        $this->categorySupplierService = $categorySupplierService;
    }

    public function index(Request $request)
    {
        return view('Master.CategorySupplier.Transactions.index');
    }

    public function create()
    {
    }

    public function store(StoreSupplierCategory $request)
    {
        try {
            $code = $request->input('supplier_category_code');
            $name = $request->input('supplier_category_name');

            $response = $this->categorySupplierService->create($code, $name);

            Log::error("Store Category Supplier Function Error: ", [$request->all()]);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Category Supplier => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data']['categoryCode'] . " - " . $response['data']['categoryName'],
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
            $categorySupplierRefID = $request->input('modal_category_supplier_id');

            $response = $this->categorySupplierService->getDetail($categorySupplierRefID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Category Supplier');
            }

            $details = $response['data']['data'] ?? [];
            $data = $details[0] ?? [];
            $compact = [
                'varAPIWebToken' => $token,
                'categoryRefID' => $data['Sys_ID'],
                'categoryCode' => $data['Code'],
                'categoryName' => $data['Name'],
                'categoryStatus' => 1,
            ];

            return view('Master.CategorySupplier.Transactions.revision', $compact);
        } catch (\Throwable $th) {
            Log::error('Revision Category Supplier Error', [
                'message' => $th->getMessage(),
                'categorySupplierRefID' => ''
            ]);

            return redirect()
                ->route('CategorySupplier.index')
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $code = $request->input('category_code');
            $name = $request->input('category_name');
            $status = $request->input('category_status');

            $response = $this->categorySupplierService->update($id, $code, $name, $status);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Category Supplier => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data'][0]['categoryCode'] . ' - ' . $response['data'][0]['categoryName'],
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Category Supplier Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function destroy($id)
    {
    }

    public function picklist(Request $request)
    {
        $response = $this->categorySupplierService->getPickList();

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

    public function picklistWithSpecialization(Request $request)
    {
        $response = $this->categorySupplierService->getPicklistWithSpecialization();

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