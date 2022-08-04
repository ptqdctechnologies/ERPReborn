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


//Route::get(
//    'fileUploadDelete',
//    '\App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\general\deleteFile\v1@mainByGet'
//    );
        //->middleware('web');

//\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('fileUploadDelete/{APIWebToken}/{EncryptedData}/{Signature}', 'get', '\App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\general\deleteFile\v1\deleteFile@mainByGet');
        
//---[ Main System ]---(START)---
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('gatewayOfGetMethod/{APIWebToken}/{Signature}/{EncryptedData}', 'get', '\App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\gatewayOfGetMethod\v1\gatewayOfGetMethod@main');
//---[ Main System ]---( END )---








//---> Telegram Bot
//Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::match(['get', 'post'], '/botman', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Botman@handle');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testHTMLDOM', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testHTMLDOM');


//testTelegramBot

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testTelegramBot', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testTelegramBot');

//---[ Default ERP Reborn (Front End & Back End) ]---(START)------
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('sendRequest', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\SendWSRequest@SendRequest');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testAja', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testAja');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testPDF', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testPDF');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testUpload', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testUpload');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testExcel', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testExcel');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testEMail', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testEMail');


\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testModelDatabase', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testModelDatabase');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testMinIO', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testMinIO');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testRedis', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testRedis');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testJQuery', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testJQuery');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testSDK', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testSDK');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('testClass', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@testClass');



\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('test', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@test');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('test2', 'get', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@test2');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('showLogOutput', 'get', 'zhtHelperLogOutputShow', 'web');
\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('showLogError', 'get', 'zhtHelperLogErrorShow', 'web');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('login', 'get', '\App\Http\Controllers\Application\BackEnd\System\Authentication\Controller_Main@getUserAuthentication');

\App\Helpers\ZhtHelper\System\Helper_LaravelRoute::setRoute('getJSUnixTime', 'get', '\App\Http\Controllers\Application\BackEnd\System\Environment\Controller_Main@getJSUnixTime');

//Route::get('showLogOutput', function () {
//    return view('zhtHelperLogOutputShow');
//    })->middleware('web');
//Route::get('showLogError', function () {
//    return view('zhtHelperLogErrorShow');
//    })->middleware('web');
//Route::get('test', '\App\Http\Controllers\Application\BackEnd\SandBox\Controller_Main@init');

//---[ Default ERP Reborn (Front End & Back End) ]---(FINISH)-----
