<?php

namespace App\Http\Controllers\Setting\Mode;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ColorModeController extends Controller
{
    public function ColorMode(Request $request)
    {
        $value = $request->input('value');
        Session::put('ColorMode', $value);
        return response()->json(true);
    }
}
