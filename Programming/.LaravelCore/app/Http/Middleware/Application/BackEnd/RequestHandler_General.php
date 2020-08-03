<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    use Closure;
    
    class RequestHandler_General
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            //$headers = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader(000000, $request);
            //var_dump($headers);
            /*$headers = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getClientAgent(000000, $request);
            echo "<br><br>".$headers;
            $headers = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getCookies(000000, $request);
            echo "<br><br>";
            var_dump($headers);
            $headers = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getXSRFToken(000000, $request);
            echo "<br><br>".$headers;*/
            return $this->CheckAllStage($request, $next);
            }

        private function CheckAllStage(&$varObjRequest, &$varObjNext)
            {
            $varUserSession = 000000;
            $varTTL = 500;
            
            
            try {
                echo "<br>-------------MIDDLEWARE-------------<br>";
                $varHTTPHeader = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader($varUserSession, $varObjRequest);
                var_dump($varHTTPHeader);
                
                //$varRequestUnixTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date']);
                //$varExpiresUnixTime = ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist('expires', $varHTTPHeader)==true) ? (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['expires'])) : (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date']) + $varTTL));
                //---> Check Expired DateTime
                if(\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession) > ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist('expires', $varHTTPHeader)==true) ? (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['expires'])) : (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date']) + $varTTL)))
                    {
                    throw new \Exception('Request has expired');
                    }                   
                //---> Check Content Integrity
                if(strcmp($varHTTPHeader['content-md5'], base64_encode(md5(json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)), true))) != 0)
                    {
                    throw new \Exception('Content integrity is invalid');
                    }
                echo "<br>-------------MIDDLEWARE-------------<br>";
                return $varObjNext($varObjRequest);          
                }
            catch (\Exception $ex) {
                $varMessageHeading = '('.\App\Helpers\ZhtHelper\General\Helper_DateTime::getGMTDateTime($varUserSession, 'd M Y H:i:s').' GMT) '.\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID().' Error Message ► ';
                switch($ex->getMessage())
                    {
                    case 'Request has expired':
                        {
                        abort(403, $varMessageHeading.$ex->getMessage());
                        break;
                        }
                    case 'Content integrity is invalid':
                        {
                        abort(403, $varMessageHeading.$ex->getMessage());
                        break;
                        }
                    default:
                        {
                        break;
                        }
                    }
                }
            }



        public function handlexxx(\Illuminate\Http\Request $request, \Closure $next)
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