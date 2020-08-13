<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class ResponseHandler
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
//$request->headers->remove('X-Powered-By');
//$request->headers->remove('x-powered-by');

//$request->header('Server', 'xxx');

//$request->headers->add(['zzz' => 'zzz']);
            return $this->CheckAllStage($next($request));
            }
        
        private function CheckAllStage($varResponse)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varResponse->header('Content-MD5', \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, $varResponse->getContent()));
            return $varResponse;
            }
        }
    }

?>