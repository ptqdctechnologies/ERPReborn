<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Master\Warehouse\WarehouseService;
use App\Http\Requests\Master\Warehouse\StoreWarehouse;

class WarehouseController extends Controller
{
    protected $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function type()
    {
        $response = $this->warehouseService->typePicklist();

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json([
                'data' => [],
                'status' => $response['metadata']['HTTPStatusCode']
            ]);
        }

        return response()->json([
            'data' => $response['data']['data'],
            'status' => $response['metadata']['HTTPStatusCode']
        ]);
    }

    public function index()
    {
        return view('Master.Warehouse.Transactions.index');
    }

    public function create()
    {
        return view('Master.Warehouse.Transactions.create');
    }

    public function store(StoreWarehouse $request)
    {
        return response()->json($request->all());
    }

    public function revision(Request $request)
    {
        return view('Master.Warehouse.Transactions.revision');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function picklist(Request $request)
    {
        $response = $this->warehouseService->picklist();

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
    }

    public function export(Request $request)
    {
    }
}