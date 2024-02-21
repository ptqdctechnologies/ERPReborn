<?php

namespace App\Http\Controllers\Register\ChartOfAccount;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Function\FunctionController;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataChartOfAccount = json_decode((new FunctionController)->getWarehouse()->content(), true);

        return view('Register.ChartOfAccount.Transactions.index', compact('dataChartOfAccount'));
    }

    public function create()
    {
        return view('Register.ChartOfAccount.Transactions.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function EditChartOfAccount(Request $request)
    {

        $dataChartOfAccount = json_decode((new FunctionController)->getWarehouse()->content(), true);
        $collection = collect($dataChartOfAccount);
        $collection = $collection->where('Sys_ID', $request->ChartOfAccount_id);

        foreach ($collection->all() as $collections) {
            $dataChartOfAccount = $collections;
        }

        return view('Register.ChartOfAccount.Transactions.edit', compact('dataChartOfAccount'));
    }


    public function update(Request $request, $id)
    {
        dd($request->all());
    }
}
