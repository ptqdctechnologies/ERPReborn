<?php

namespace App\Http\Middleware\Application\FrontEnd
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