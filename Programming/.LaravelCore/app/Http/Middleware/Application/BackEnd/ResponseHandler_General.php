<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    use Closure;
    
    class ResponseHandler_General
        {
        public function handle($request, Closure $next)
            {
            $varResponse = $next($request);
            
            return $varResponse;
            }
        }
    }

?>