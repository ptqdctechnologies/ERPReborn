<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//---[ Default ERP Reborn (Front End & Back End) ]---(START)------

Route::get('showLogOutput', function () {
    return view('zhtHelperLogOutputShow');
    })->middleware('web');
    
Route::get('showLogError', function () {
    return view('zhtHelperLogErrorShow');
    })->middleware('web');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('sendRequest', 'get', '\App\Http\Controllers\Application\FrontEnd\SandBox\SendWSRequest@SendRequest', 'webWithoutCSRF');

//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----