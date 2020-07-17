<?php

namespace App\Http\Middleware\Application\FrontEnd
    {
    use Closure;
    
    class RequestHandler_General
        {
        public function handle($request, Closure $next)
            {
            $varRequest = $next($request);
            
            return $varRequest;
            }
        }
    }

?>