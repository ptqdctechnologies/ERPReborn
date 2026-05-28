<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('Master.Product.Transactions.IndexProduct');
    }

    public function create()
    {
        return view('Master.Product.Transactions.CreateProduct');
    }

    public function store(Request $request)
    {
    }

    public function revision(Request $request)
    {
        return view('Master.Product.Transactions.RevisionProduct');
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function RevisionProduct()
    {
    }

    public function ReportProductSummary(Request $request)
    {
    }
}