<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TaxReconController extends Controller
{
    public function index(Request $request) 
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');

        return view('Accounting.TaxRecon.Transactions.CreateTaxRecon', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
