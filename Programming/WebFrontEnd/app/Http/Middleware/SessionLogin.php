<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('SessionLogin')){
            return redirect('/')->with(['error' => 'You have to login first']);
        }
        return $next($request);
    }
}
