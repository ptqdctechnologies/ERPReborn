<?php

namespace App\Http\Middleware\Application\BackEnd\API\Gateway
    {
    class RequestHandler
        {
        public function handle(\Illuminate\Http\Request $varObjRequest, \Closure $next)
            {
            //dd($varObjRequest->header());
            return
                $this->CheckAllStage(
                    $varObjRequest,
                    $next
                    );
            }

        private function CheckAllStage(&$varObjRequest, &$varObjNext)
            {
//------------< BLOCKING >------------------
            $varAPIExecutionStartDateTime = (new \DateTime());
//------------< BLOCKING >------------------

            //-----[ PARAMETER INITIALIZING ]-----( START )-----

                //---> Initializing : varUserSession
                    $varUserSession =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();

                //---> Initializing : varDataSeparatorTag
                    $varDataSeparatorTag =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                            $varUserSession,
                            'TAG_DATA_SEPARATOR'
                            );

                //---> Initializing : varClientServerDateTimeLagTolerance
                    $varClientServerDateTimeLagTolerance =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                            $varUserSession,
                            'TIME_LAG_TOLERANCE_CLIENT_SERVER'
                            );

                //---> Initializing : varTTL
                    $varTTL =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                            $varUserSession,
                            'TIME_EXPIRED_REQUEST'
                            );

            //-----[ PARAMETER INITIALIZING ]-----(  END  )-----
            
            try {
                //---> Initializing : $varServerCurrentUnixTime
                    $varServerCurrentUnixTime =
                        \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime(
                            $varUserSession
                            );

                //---> Initializing : HTTP Header Check
                    $varHTTPHeader =
                        \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader(
                            $varUserSession,
                            $varObjRequest
                            );

                //--->---> Check Authorization on HTTP Header
                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'authorization', $varHTTPHeader) == false)
                        {
                        throw 
                            new \Exception(
                                implode (
                                    $varDataSeparatorTag, 
                                    [403, 'HTTP Authorization Request not found in HTTP Header']
                                    )
                                );
                        }

                //--->---> Check Authorization Mode on HTTP Header  
                    if (strcmp(strtolower(substr($varHTTPHeader['authorization'], 0, 6)), 'bearer') != 0)
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'HTTP Authorization Requests must be in Bearer Mode']
                                    )
                                );
                        }

                //--->---> Check API Web Token Existence
                    if ((new \App\Models\Cache\General\APIWebToken())->isDataExist(
                        $varUserSession, 
                        (explode(' ', $varHTTPHeader['authorization']))[1]
                        ) == false)
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'API Web Token does not exist']
                                    )
                                );
                        }
                    //--->---> Check API Web Token Expiry
                    else
                        {
                        if ((new \App\Models\Cache\General\APIWebToken())->isDataExpired(
                            $varUserSession,
                            (explode(' ', $varHTTPHeader['authorization']))[1]
                            ) == true)
                            {
                            throw
                                new \Exception(
                                    implode(
                                        $varDataSeparatorTag, 
                                        [403, 'API Web Token has been expired']
                                        )
                                    );
                            }
                        }

                //--->---> Check Date Time on HTTP Header
                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'agent-datetime', $varHTTPHeader)==false)
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'Request date and time not specified on HTTP Header']
                                    )
                                );
                        }

                //--->---> Check Date Time Difference on HTTP Header
                    if (!(($varServerCurrentUnixTime-$varClientServerDateTimeLagTolerance) <= (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime'])) && ($varServerCurrentUnixTime+$varClientServerDateTimeLagTolerance) >= (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime']))))
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'Request date and time difference between Server and Client is not within tolerance ( ±'.$varClientServerDateTimeLagTolerance.' seconds )']
                                    )
                                );
                        }

                //--->---> Check Content-MD5 on HTTP Header
                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'x-content-md5', $varHTTPHeader) == false)
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'Request Content-MD5 not found on HTTP Header']
                                    )
                                );
                        }

                //--->---> Check X-Request-Unique-ID on HTTP Header ---> Untuk menangani Idempotency
                    if (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'x-request-id', $varHTTPHeader) == false)
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'Request ID not specified on HTTP Header']
                                    )
                                );
                        }

                //--->---> Check Expired DateTime
                    if ($varServerCurrentUnixTime > ((\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'expires', $varHTTPHeader)==true) ? (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['expires'])) : (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime']) + $varTTL)))
                        {
                        throw
                            new \Exception(
                                implode(
                                    $varDataSeparatorTag, 
                                    [403, 'Request has expired']
                                    )
                                );
                        }



/*


 */

/*
//{"metadata":{"API":{"key":"transaction.read.dataList.master.getEntityBankAccount","version":"latest"}},"data":{"parameter":{"entity_RefID":164000000000439},"SQLStatement":{"pick":"*","sort":null,"filter":"\"BankName\" ILIKE '%Rakyat%' AND \"BankAccountName\" ILIKE '%Teguh%' ","paging":null}}}
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Content integrity is invalid ---> '.
                            "<br>HTTP MD5 Header : ".$varHTTPHeader['x-content-md5'].
                            "<br>Data Load : ".\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)).
                            "<br><br>".
                            base64_encode(md5('{"metadata":{"API":{"key":"transaction.read.dataList.master.getEntityBankAccount","version":"latest"}},"data":{"parameter":{"entity_RefID":164000000000439},"SQLStatement":{"pick":"*","sort":null,"filter":"\"BankName\" ILIKE \'%Rakyat%\' AND \"BankAccountName\" ILIKE \'%Teguh%\' ","paging":null}}}')).
                            ''
                            ]));
*/

                    
/*                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Content integrity is invalid ---> '.  
                            "<br>HTTP MD5 Header : ".$varHTTPHeader['x-content-md5'].
                            "<br>HTTP MD5 Header Raw : ".base64_decode($varHTTPHeader['x-content-md5']).
                            "<br>Data Load : ".\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)).
                                                       
                            "<br><br>".\App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession))) .'<br><br>---> '.
                            base64_encode(md5(\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)))) .'--->'.
                            //base64_encode(md5('{"metadata":{"API":{"key":"transaction.create.master.setBloodAglutinogenType","version":"latest"}},"data":{"entities":{"type":null}}}'))
                            //base64_encode(md5('{"metadata":{"API":{"key":"environment.general.session.getData","version":"latest"}},"data":{}}'))
                            base64_encode(md5('{"metadata":{"API":{"key":"environment.general.session.getData","version":"latest"}},"data":{}}'))
//                                              '{"metadata":{"API":{"key":"environment.general.session.getData","version":"latest"}},"data":[]}'
                            ]));
*/








/*
//------------< BLOCKING >------------------
    dd (
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getDifferenceOfDateTimeTZString(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
            \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_PHPDateTimeToDateTimeTZString(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
            )
        );
//------------< BLOCKING >------------------
*/                  
                    
                    
/*
// BIKIN LAMBAT (START)
                //--->---> Check Content Integrity
                    if (strcmp(
                        $varHTTPHeader['x-content-md5'], 
                        \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5(
                            $varUserSession, 
                            \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession))
                            )) != 0
                        )
// if (1 == 1 )
                        {

                        throw new \Exception(implode($varDataSeparatorTag,
                            [403, 'Content integrity is invalid']));

    /*
                        throw new \Exception(implode($varDataSeparatorTag,
                            [403, 'Content integrity is invalid ---> '.
                            "<br>HTTP MD5 Header : ".$varHTTPHeader['x-content-md5'].
                            "<br>HTTP MD5 Header Raw : ".base64_decode($varHTTPHeader['x-content-md5']).
                            "<br><br>Data Load : ".\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)).
                            "<br>".
                            "<br>Processing HTTP MD5 Header : ".base64_encode(md5(\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)))).
                            "<br>Processing HTTP MD5 Header Raw : ".md5(\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession))).
                            "<br><br>Comparison<br>".$varHTTPHeader['x-content-md5']."<br>".base64_encode(md5(\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)))).
                            "<br><br>".
                            "<br>Result : ".strcmp((string) $varHTTPHeader['x-content-md5'], (string) base64_encode(md5(\GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession)))) ).
                            "<br><br>".\App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession))).
                            ""
                            ]));
                        }
    */                                                                    
// BIKIN LAMBAT (END)

                //--->---> Check Content Integrity
                    if (strcmp(
                        $varHTTPHeader['x-content-md5'], 
                        \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5(
                            $varUserSession, 
                            \GuzzleHttp\json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession))
                            )) != 0
                        )
                        {
                        throw new \Exception(implode($varDataSeparatorTag,
                            [403, 'Content integrity is invalid']));
                        }

                //---> Finish
                $varReturn =
                    $varObjNext($varObjRequest);
                }

            catch (\Exception $ex) {
                $varDataMessage =
                    explode(
                        $varDataSeparatorTag,
                        $ex->getMessage()
                        );

                $varReturn =
                    \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse(
                        $varUserSession,
                        $varDataMessage[0],
                        $varDataMessage[1]
                        );
                }

            return
                $varReturn;
            }
        }
    }