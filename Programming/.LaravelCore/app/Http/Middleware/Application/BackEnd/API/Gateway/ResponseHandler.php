<?php

namespace App\Http\Middleware\Application\BackEnd\API\Gateway
    {
    class ResponseHandler
        {
        public function handle(\Illuminate\Http\Request $varObjRequest, \Closure $next)
            {
            //dd($varObjRequest->header());
            return
                $this->CheckAllStage($next($varObjRequest));
            }
        
        private function CheckAllStage($varResponse)
            {
            $varUserSession =
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            
            $varResponse->header(
                'X-Content-MD5',
                \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, $varResponse->getContent())
                );

            return
                $varResponse;
            }
        }
    }

?>