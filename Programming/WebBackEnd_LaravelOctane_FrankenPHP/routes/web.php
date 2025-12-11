<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('welcome');
        }
    );

/*
Route::get(
    '/getPHPInformation',
        [
        \App\Http\Controllers\Application\BackEnd\System\Notification\Engines\webDisplayPage\getPHPInformation\v1\getPHPInformation::class,
        'main'
        ]
    );
*/

\App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setRoute(
    'getPHPInformation',
    'get',
    '\App\Http\Controllers\Application\BackEnd\System\Notification\Engines\webDisplayPage\getPHPInformation\v1\getPHPInformation@main'
    );