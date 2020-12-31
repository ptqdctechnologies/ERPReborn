<?php

namespace App\Http\Middleware\Application\BackEnd\API\Gateway
    {
    class RequestHandler
        {
        public function handle(\Illuminate\Http\Request $varObjRequest, \Closure $next)
            {
            return $this->CheckAllStage($varObjRequest, $next);
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
                
                //--->---> Check Authorization on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'authorization', $varHTTPHeader) == false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'HTTP Authorization Request not found in HTTP Header']));
                    }
                //--->---> Check Authorization Mode on HTTP Header  
                if(strcmp(strtolower(substr($varHTTPHeader['authorization'], 0, 6)), 'bearer')!=0)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'HTTP Authorization Requests must be in Bearer Mode']));
                    }
                //--->---> Check API Web Token Existence
                if((new \App\Models\Cache\General\APIWebToken())->isDataExist($varUserSession, (explode(' ', $varHTTPHeader['authorization']))[1]) == false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'API Web Token does not exist']));
                    }
                //--->---> Check API Web Token Expiry
                else
                    {
                    if((new \App\Models\Cache\General\APIWebToken())->isDataExpired($varUserSession, (explode(' ', $varHTTPHeader['authorization']))[1]) == true)
                        {
                        throw new \Exception(implode($varDataSeparatorTag, 
                            [403, 'API Web Token has been expired']));
                        }
                    }
                //--->---> Check Date Time on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'agent-datetime', $varHTTPHeader)==false)
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request date and time not specified on HTTP Header']));                    
                    }
                //--->---> Check Date Time Difference on HTTP Header
                if(!(($varServerCurrentUnixTime-$varClientServerDateTimeLagTolerance) <= (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime'])) && ($varServerCurrentUnixTime+$varClientServerDateTimeLagTolerance) >= (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime']))))
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
                if($varServerCurrentUnixTime > ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'expires', $varHTTPHeader)==true) ? (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['expires'])) : (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime']) + $varTTL)))
                    {
                    throw new \Exception(implode($varDataSeparatorTag, 
                        [403, 'Request has expired']));
                    }
                //--->---> Check Content Integrity
                if(strcmp($varHTTPHeader['content-md5'], \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)))) != 0)
                    {
                    
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Content integrity is invalid']));
/*
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Content integrity is invalid ---> '.  
                            $varHTTPHeader['content-md5']. '---> '.
                            \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession))) .'---> '.
                            \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)) .'--->'.
                            base64_encode(md5('{"metadata":{"API":{"key":"transaction.create.master.setBloodAglutinogenType","version":"latest"}},"data":{"entities":{"type":null}}}'))
                            ]));
*/                            
                    }                
                $varReturn = $varObjNext($varObjRequest);
                } 
            catch (\Exception $ex) {
                $varDataMessage = explode($varDataSeparatorTag, $ex->getMessage());
                $varReturn = \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $varDataMessage[0], $varDataMessage[1]);
                }
            return $varReturn;
            }
        }
    }