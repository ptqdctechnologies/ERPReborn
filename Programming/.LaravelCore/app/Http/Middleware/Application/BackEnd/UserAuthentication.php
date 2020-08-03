<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    use Closure;
    
    class UserAuthentication
        {
        public function handle($request, Closure $next)
            {
/*            if (!empty(session('authenticated'))) {
                $request->session()->put('authenticated', time());
                return $next($request);
                }
 *
 */
            //return redirect('/login');
            return $next($request);
            }
        }
    }