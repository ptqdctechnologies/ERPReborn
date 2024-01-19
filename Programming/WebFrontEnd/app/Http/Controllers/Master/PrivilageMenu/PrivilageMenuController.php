<?php

namespace App\Http\Controllers\Master\PrivilageMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class PrivilageMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Master.PrivilageMenu.Transactions.index');
    }


    public function store(Request $request)
    {
        dd($request->all());
    }
}
