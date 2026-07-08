<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Master\CategorySupplier\CategorySupplierService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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

    public function store(Request $request)
    {
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
                'categoryName' => $data['Name']
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
    }

    public function destroy($id)
    {
    }
}