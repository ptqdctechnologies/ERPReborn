<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    use Closure;
    
    class RequestHandler_General
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            echo "<br>-------------MIDDLEWARE-------------<br>";
            
            //var_dump($next->varUserSession);
            
             //dd($request->route()->computedMiddleware);
             $y = (array) $request->route()->controller;
             dd($y["\x00*\x00middleware"][1]['options']);
            
            $x = $next;
            
            
            var_dump($x);
            
            $varRequest = $next($request);
            //var_dump($request->route()->parameters());

            $varParameterValue = \App\Helpers\ZhtHelper\General\Helper_Array::getOnlyArrayValueWithoutKey(000000, $request->route()->parameters());
            var_dump($varParameterValue);
            
            //var_dump($request->route()->parameters());
            //var_dump($varRequest);
            
            //dd("Before Middleware");
                        
            echo "<br>-------------MIDDLEWARE-------------<br>";
            return $varRequest;
        
            
            
            }
            
        
        }
    }

?>