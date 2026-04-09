<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        return view('Master.Supplier.Transactions.IndexSupplier');
    }

    public function create()
    {
        return view('Master.Supplier.Transactions.CreateSupplier');
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}