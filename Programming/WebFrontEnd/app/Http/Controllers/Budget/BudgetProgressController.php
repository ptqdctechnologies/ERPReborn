<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BudgetProgressController extends Controller
{
    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function index(Request $request)
    {
        return view('Budget.BudgetProgress.Transactions.index');
    }

    public function create()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Budget.BudgetProgress.Transactions.create', $compact);
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function revision()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'combinedBudgetRefID' => '46000000000033',
            'combinedBudgetCode' => 'Q000062',
            'combinedBudgetName' => 'XL Microcell 2007'
        ];

        return view('Budget.BudgetProgress.Transactions.revision', $compact);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}