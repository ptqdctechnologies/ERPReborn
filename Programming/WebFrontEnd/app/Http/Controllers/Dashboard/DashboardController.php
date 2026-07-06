<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barcode_1d = DNS1D::getBarcodeHTML('ERP123456789', 'C128', 2, 50, 'black');

        $qrcode_2d = DNS2D::getBarcodeHTML('https://www.qdc.co.id', 'QRCODE', 5, 5);

        $qrcode_png = DNS2D::getBarcodePNG('Bisa di-scan!', 'QRCODE');

        return view('Dashboard.index',  compact('barcode_1d', 'qrcode_2d', 'qrcode_png'));
    }
}