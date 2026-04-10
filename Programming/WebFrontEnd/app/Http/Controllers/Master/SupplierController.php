<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        return view('Master.Supplier.Transactions.IndexSupplier');
    }

    public function create()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        return view('Master.Supplier.Transactions.CreateSupplier', [
            'varAPIWebToken' => $varAPIWebToken
        ]);
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