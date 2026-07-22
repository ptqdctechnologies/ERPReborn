<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('Master.Warehouse.Transactions.index');
    }

    public function create()
    {
        return view('Master.Warehouse.Transactions.create');
    }

    public function store(Request $request)
    {
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
    }

    public function summary(Request $request)
    {
    }

    public function export(Request $request)
    {
    }
}