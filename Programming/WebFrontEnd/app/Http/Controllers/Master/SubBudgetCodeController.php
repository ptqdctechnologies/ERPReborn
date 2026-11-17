<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SubBudgetCodeController extends Controller
{
    public function index(Request $request)
    {
        return view('Master.SubBudgetCode.Transactions.index');
    }

    public function create()
    {
        return view('Master.SubBudgetCode.Transactions.create');
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

    public function indexGroup(Request $request)
    {
        return view('Master.SubBudgetGroup.Transactions.index');
    }

    public function createGroup()
    {
        return view('Master.SubBudgetGroup.Transactions.create');
    }
}