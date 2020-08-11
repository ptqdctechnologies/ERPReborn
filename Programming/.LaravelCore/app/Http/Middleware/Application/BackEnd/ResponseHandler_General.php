<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    class ResponseHandler_General
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            return $this->CheckAllStage($next($request));
            }
        
        private function CheckAllStage($varResponse)
            {
            echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
            return $varResponse;
            }
        }
    }

?>