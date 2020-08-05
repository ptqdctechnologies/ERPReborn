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
            $varDataSeparatorTag = '<DataSeparator>';
            $varClientServerDateTimeLagTolerance = (5*60);
            $varTTL = 500;

            
            echo \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(000000, getcwd(), 'config/Application/BackEnd/environment.txt');
            
            
            //echo "<br>".(strcmp(substr('\ddd\ddd\ddd', 0, 1), '\\')==0 ? '' : '\\')  ."<br>";
            
            //echo "<br>".(strcmp(substr('dddd/ddd/', strlen('dddd/ddd/')-1, 1), '/')==0 ? substr('dddd/ddd/', 0, strlen('dddd/ddd/')-1) : 'dddd/ddd/')."<br>";
            
            
            try {
                $varServerCurrentUnixTime=\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession);

                echo "<br>-------------MIDDLEWARE-------------<br>";
                $varHTTPHeader = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader($varUserSession, $varObjRequest);
                var_dump($varHTTPHeader);

                //---> HTTP Header Check
                //--->---> Check Date Time on HTTP Header
                    if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'date', $varHTTPHeader)==false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request date and time not specified on HTTP Header']));
                    }
                //--->---> Check Date Time Difference on HTTP Header
                if(!(($varServerCurrentUnixTime-$varClientServerDateTimeLagTolerance) <= (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date'])) && ($varServerCurrentUnixTime+$varClientServerDateTimeLagTolerance) >= (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date']))))
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request date and time difference between Server and Client is not within tolerance ( ±'.$varClientServerDateTimeLagTolerance.' seconds )']));                    
                    }
                //--->---> Check Content-MD5 on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'content-md5', $varHTTPHeader)==false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request Content-MD5 not found on HTTP Header']));
                    }
                //--->---> Check X-Request-Unique-ID on HTTP Header ---> Untuk menangani Idempotency
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'x-request-unique-id', $varHTTPHeader)==false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request Unique ID not specified on HTTP Header']));
                    }
                //--->---> Check Expired DateTime
                if($varServerCurrentUnixTime > ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'expires', $varHTTPHeader)==true) ? (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['expires'])) : (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date']) + $varTTL)))
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request has expired']));
                    }                   
                //--->---> Check Content Integrity
                if(strcmp($varHTTPHeader['content-md5'], base64_encode(md5(json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)), true))) != 0)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Content integrity is invalid']));
                    }
                echo "<br>-------------MIDDLEWARE-------------<br>";
                return $varObjNext($varObjRequest);  
                }
            catch (\Exception $ex) {
                $varMessageHeading = '('.\App\Helpers\ZhtHelper\General\Helper_DateTime::getGMTDateTime($varUserSession, 'd M Y H:i:s').' GMT) '.\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID().' Error Message ► ';
                $varDataMessage = explode($varDataSeparatorTag, $ex->getMessage());                
                abort($varDataMessage[0], $varMessageHeading.$varDataMessage[1]);
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