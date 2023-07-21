<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSessionTimeout
{
    public function handle($request, Closure $next)
    {
        // if($request->path() == "logout"){
        //     $request->session()->forget('SessionLogin');
        //     return redirect('/')->with(['error' => 'You have to login first']);
        // }

        // return $next($request);
    }
}
