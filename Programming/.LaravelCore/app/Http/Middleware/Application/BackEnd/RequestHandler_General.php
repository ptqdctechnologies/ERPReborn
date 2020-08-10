<?php

namespace App\Http\Middleware\Application\BackEnd
    {
    class RequestHandler_General
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            return $this->CheckAllStage($request, $next);
            }

        private function CheckAllStage(&$varObjRequest, &$varObjNext)
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
            
            $varUserSession = 000000;
            $varDataSeparatorTag = '<DataSeparator>';
            $varClientServerDateTimeLagTolerance = (5*60);
            $varTTL = 500;
            //echo \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath(000000, getcwd(), 'config/Application/BackEnd/environment.txt');
            try {
                $varServerCurrentUnixTime=\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession);
//                echo "<br>-------------MIDDLEWARE-------------<br>";
//                echo "<br>";
//                var_dump($varHTTPHeader);
//                echo "<br>";
                $varHTTPHeader = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader($varUserSession, $varObjRequest);
                //---> HTTP Header Check
                //--->---> Check Date Time on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'datexxx', $varHTTPHeader)==false)
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
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'x-request-id', $varHTTPHeader)==false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request ID not specified on HTTP Header']));
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
                //echo "<br>-------------MIDDLEWARE-------------<br>";
                //return $varObjNext($varObjRequest);                
                $varReturn = $varObjNext($varObjRequest);
                //return $varReturn;
                }
            catch (\Exception $ex) {
                $varMessageHeading = '('.\App\Helpers\ZhtHelper\General\Helper_DateTime::getGMTDateTime($varUserSession, 'd M Y H:i:s').' GMT) '.\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID().' Error Message ► ';
                $varDataMessage = explode($varDataSeparatorTag, $ex->getMessage());                
                $varReturn = abort($varDataMessage[0], $varMessageHeading.$varDataMessage[1]);
                //$varReturn = response()->json(['error' => $varMessageHeading.$varDataMessage[1]], $varDataMessage[0]);
                }
            return $varReturn;
            }
        }
    }

?>