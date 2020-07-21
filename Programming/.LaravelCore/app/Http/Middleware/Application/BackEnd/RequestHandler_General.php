<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    use Closure;
    
    class RequestHandler_General
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            $varRequest = $next($request);

            $varParameterValue = \App\Helpers\ZhtHelper\General\Helper_Array::getOnlyArrayValueWithoutKey($request->route()->parameters());
            var_dump($varParameterValue);
            
            //var_dump($request->route()->parameters());
            //var_dump($varRequest);
            
            //dd("Before Middleware");
                        
            return $varRequest;
            }
        }
    }

?>