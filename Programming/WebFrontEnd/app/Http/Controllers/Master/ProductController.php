<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Services\Master\Product\ProductService;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Master\Product\StoreProduct;
use App\Http\Controllers\ExportExcel\MasterData\ExportProduct;

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
        try {
            $token = Session::get('SessionLogin');
            $productID = $request->input('modal_product_id');

            $response = $this->productService->getDetail($productID);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Product');
            }

            $details = $response['data']['data'] ?? [];
            $header = $details[0] ?? [];
            $compact = [
                'token' => $token,
                'productRefID' => $header['Sys_ID'] ?? '',
                'header' => [
                    'productCode' => $header['ProductCode'] ?? '',
                    'productName' => $header['ProductName'] ?? '',
                    'unitOfMeasureID' => $header['UnitOfMeasure_RefID'] ?? '',
                    'unitOfMeasureName' => $header['UnitOfMeasureName'] ?? '',
                    'categoryID' => $header['Category_RefID'] ?? '',
                    'categoryName' => $header['CategoryName'] ?? '',
                    'subCategoryID' => $header['SubCategory_RefID'] ?? '',
                    'subCategoryName' => $header['SubCategoryName'] ?? '',
                ]
            ];

            return view('Master.Product.Transactions.RevisionProduct', $compact);
        } catch (\Throwable $th) {
            Log::error('Revision Product Error', [
                'message' => $th->getMessage(),
                'productRefID' => ''
            ]);

            return redirect()
                ->route('Product.index')
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->productService->update(
                $id,
                $request->category_value,
                $request->sub_category_value,
                $request->product_name,
                $request->uom_value
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Product');
            }

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Product Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function destroy($id)
    {
    }

    public function export(Request $request)
    {
        try {
            $dataReport = json_decode($request->dataReport, true);
            $type = $request->printType;

            if ($dataReport) {
                if ($type === "PDF") {
                } else if ($type === "EXCEL") {
                    return Excel::download(new ExportProduct($dataReport), 'Product.xlsx');
                } else {
                    throw new \Exception('Failed to Export Product');
                }
            } else {
                throw new \Exception('Products Data is Empty');
            }
        } catch (\Throwable $th) {
            Log::error("Export Product Function Error: " . $th->getMessage());

            return response()->json(['statusCode' => 400]);
        }
    }
}