<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BudgetCodeController extends Controller
{
    public function index(Request $request)
    {
        return view('Master.BudgetCode.Transactions.index');
    }

    public function create()
    {
        return view('Master.BudgetCode.Transactions.create');
    }

    public function store(Request $request)
    {
    }

    public function revision(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}