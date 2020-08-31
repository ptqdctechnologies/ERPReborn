<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//---[ Default ERP Reborn (Front End & Back End) ]---(START)------
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('auth', ['get', 'post'], '\App\Http\Controllers\Application\BackEnd\System\Authentication\Controller_Main@getUserAuthentication');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('gateway', ['get', 'post'], '\App\Http\Controllers\Application\BackEnd\System\Core\Controller_Main_APIGateway@getRoute');


//\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('gateway', ['get', 'post'], '\App\Http\Controllers\Application\BackEnd\SandBox\SendWSResponse@sendResponse');










\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('service.core.userAuthentication/{name}/{password}', 'get', '\App\Http\Controllers\Application\BackEnd\System\Core\Controller_Main@getUserAuthentication');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('webservices', ['get', 'post'], '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@webServices');


//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----
