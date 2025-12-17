<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get(
    '/user',
    function (Request $request) {
        return $request->user();
        }
    )->middleware('auth:sanctum');
*/

\App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setRoute (
    'auth',
    ['get', 'post'],
    '\App\Http\Controllers\Application\BackEnd\RouteGateway\Engines\getAuthenticationRoute\v1\getAuthenticationRoute@main'
    );

\App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setRoute (
    'gateway',
    ['get', 'post'],
    '\App\Http\Controllers\Application\BackEnd\RouteGateway\Engines\getGeneralRoute\v1\getGeneralRoute@main'
    );

