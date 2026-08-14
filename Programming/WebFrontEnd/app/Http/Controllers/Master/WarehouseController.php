<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        try {
            $response = $this->warehouseService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Warehouse => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Warehouse Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
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
        $start = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);

        $formatLimit = $length > 0 ? $length : null;

        $offset = $formatLimit
            ? (int) floor($start / $formatLimit) + 1
            : 1;

        $code = $request->input('warehouse_code');
        $name = $request->input('warehouse_name');
        $warehouseTypeRefID = $request->input('warehouseType_RefID');
        $searchValue = $request->input('search.value');

        $formatted = [
            'pagination' => [
                'pageSize' => $formatLimit,
                'pageShow' => (int) $offset
            ],
            'dataFilter' => [
                'name' => $name,
                'code' => $code ? $code : $searchValue,
                'warehouseType_RefID' => $warehouseTypeRefID ? (int) $warehouseTypeRefID : null
            ],
        ];

        $response = $this->warehouseService->picklist($formatted);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            ]);
        }

        $workData = $response['data']['data'];

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $workData['header']['dataCount'],
            'recordsFiltered' => $workData['header']['dataCount'],
            'data' => $workData['content']['itemList']
        ]);
    }

    public function summary(Request $request)
    {
    }

    public function export(Request $request)
    {
    }
}