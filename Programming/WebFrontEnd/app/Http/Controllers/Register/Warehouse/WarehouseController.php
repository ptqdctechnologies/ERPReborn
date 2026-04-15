<?php

namespace App\Http\Controllers\Register\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Function\FunctionController;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataWarehouse = json_decode((new FunctionController)->getWarehouse()->content(), true);

        return view('Register.Warehouse.Transactions.index', compact('dataWarehouse'));
    }

    public function create()
    {
        return view('Register.Warehouse.Transactions.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function EditWarehouse(Request $request)
    {

        $dataWarehouse = json_decode((new FunctionController)->getWarehouse()->content(), true);
        $collection = collect($dataWarehouse);
        $collection = $collection->where('Sys_ID', $request->warehouse_id);

        foreach ($collection->all() as $collections) {
            $dataWarehouse = $collections;
        }

        return view('Register.Warehouse.Transactions.edit', compact('dataWarehouse'));
    }


    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    public function WarehousePickList(Request $request)
    {
        $token = Session::get('SessionLogin');

        $response = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'dataPickList.supplyChain.getWarehouse',
            'latest',
            ['parameter' => null],
            false
        );

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
