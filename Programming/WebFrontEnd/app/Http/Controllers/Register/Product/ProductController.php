<?php

namespace App\Http\Controllers\Register\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
 use App\Http\Controllers\Function\FunctionController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProduct = json_decode((new FunctionController)->getProduct()->content(), true);
        // dd($dataProduct);
        return view('Register.Product.Transactions.index', compact('dataProduct'));
    }
}
