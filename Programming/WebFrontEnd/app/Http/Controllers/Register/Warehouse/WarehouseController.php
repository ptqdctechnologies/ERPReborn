<?php

namespace App\Http\Controllers\Register\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Function\FunctionController;

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
}
