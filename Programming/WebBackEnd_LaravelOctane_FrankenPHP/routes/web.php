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

\App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setRoute (
    'getPHPInformation',
    'get',
    '\App\Http\Controllers\Application\BackEnd\System\Notification\Engines\webDisplayPage\getPHPInformation\v1\getPHPInformation@main'
    );

//-----[ Example Code - Dynamic Route ]----------------------------------------------( START )-----
/*
    $varAPIWebToken = 
        'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoid2lzbnUudHJlbmdnb25vIiwiaWF0IjoxNzYyODI5MzY2fQ.YTA1ZDAwOWQ5YTk4MWQ1YTExNDI0ZjFlZmUzMDFjNzM4MjFkOGM1N2JiODY5YWVjZWZiOTQ2ZjdjZDhkYmI4YQ';

    \App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setDynamicRoute_Examples_APICall(
        ///\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        111,
        $varAPIWebToken
        );
*/

$varUserSession = 1;
$varAPIWebToken = 1;

\App\Http\Helpers\ZhtHelper\General\System\Helper_LaravelRoute::setDynamicRoute_Examples_APICall (
    $varUserSession,
    $varAPIWebToken
    );

//-----[ Example Code - Dynamic Route ]----------------------------------------------(  END  )-----
