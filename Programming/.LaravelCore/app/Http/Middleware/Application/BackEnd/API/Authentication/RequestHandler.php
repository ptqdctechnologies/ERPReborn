<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class RequestHandler
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            return $this->CheckAllStage($request, $next);
            }

        private function CheckAllStage(&$varObjRequest, &$varObjNext)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varDataSeparatorTag = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR');
            $varClientServerDateTimeLagTolerance = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TIME_LAG_TOLERANCE_CLIENT_SERVER');
            $varTTL = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TIME_EXPIRED_REQUEST');
            try {
                $varServerCurrentUnixTime=\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession);
                //---> HTTP Header Check
                $varHTTPHeader = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader($varUserSession, $varObjRequest);
//var_dump($varHTTPHeader);
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
                $varReturn = $varObjNext($varObjRequest);
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