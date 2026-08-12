<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    public function index()
    {
        return view('Master.Rate.Transactions.index');
    }

    public function create()
    {
        return view('Master.Rate.Transactions.create');
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function revision(Request $request)
    {
        $compact = [
            'currencyRefID' => '62000000000001',
            'currencyCode' => 'IDR',
            'currencyName' => 'Indonesian Rupiah',
            'rate' => 16000,
            'startDate' => '08/04/2026',
            'endDate' => '08/10/2026'
        ];

        return view('Master.Rate.Transactions.revision', $compact);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}