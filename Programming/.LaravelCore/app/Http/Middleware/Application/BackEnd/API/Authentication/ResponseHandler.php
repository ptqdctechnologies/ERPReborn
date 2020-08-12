<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class ResponseHandler
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            return $this->CheckAllStage($next($request));
            }
        
        private function CheckAllStage($varResponse)
            {
            //--->Add Header
            $varResponse->header('Access-Control-Allow-Origin', '*');
            $varResponse->header('xxx', 'sssyahhhhhxxxxxx');
//            echo "<br><br>";
//            var_dump($varResponse);
//            echo "<br><br>";
            return $varResponse;
            }
        }
    }

?>