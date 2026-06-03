<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Services\Master\Product\ProductService;
use App\Http\Requests\Master\Product\StoreProduct;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        return view('Master.Product.Transactions.IndexProduct');
    }

    public function create()
    {
        return view('Master.Product.Transactions.CreateProduct');
    }

    public function store(StoreProduct $request)
    {
        try {
            $response = $this->productService->create(
                $request->category_value,
                $request->sub_category_value,
                $request->product_name,
                $request->uom_value,
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Product => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Product Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function revision(Request $request)
    {
        return view('Master.Product.Transactions.RevisionProduct');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function RevisionProduct()
    {
    }

    public function ReportProductSummary(Request $request)
    {
    }
}