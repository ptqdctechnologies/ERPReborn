<?php

namespace App\Http\Controllers\Master\PrivilageMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

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

}
