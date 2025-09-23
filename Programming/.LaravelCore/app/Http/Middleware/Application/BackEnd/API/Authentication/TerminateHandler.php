<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class TerminateHandler
        {
        public function handle(\Illuminate\Http\Request $varObjRequest, \Closure $next)
            {
            return $next($varObjRequest);
            }
            
        public function terminate($varObjRequest, $varObjResponse)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            //---> Store API Access Request to Database
            (new \App\Models\Database\SchSysConfig\TblRotateLog_API())->setDataInsert(
                $varUserSession, 
                null,
                \App\Helpers\ZhtHelper\General\Helper_Network::getClientIPAddress($varUserSession), 
                url()->current(), 
                $_SERVER['HTTP_USER_AGENT'], 
                \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_Header($varUserSession, $varObjRequest, 'agent-datetime'),
                    \App\Helpers\ZhtHelper\General\Helper_DateTime::getHourOfTimeZoneOffset($varUserSession, 'Asia/Jakarta')
                    ), 
                json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_Header($varUserSession, $varObjRequest)), 
                \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession, $varObjRequest), 
                \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header($varUserSession, $varObjResponse, 'date'),
                    \App\Helpers\ZhtHelper\General\Helper_DateTime::getHourOfTimeZoneOffset($varUserSession, 'Asia/Jakarta')
                    ),
                \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_HTTPStatusCode($varUserSession, $varObjResponse), 
                json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header($varUserSession, $varObjResponse)), 
                \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent($varUserSession, $varObjResponse)
                );

/*            $varSQL = "
                SELECT 
                    \"SignRecordID\" AS \"Sys_RPK\"
                FROM 
                    \"SchSysConfig\".\"Func_TblRotateLog_API_SET\"(
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, \App\Helpers\ZhtHelper\General\Helper_Network::getClientIPAddress($varUserSession)))."::cidr, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, url()->current()))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, $_SERVER['HTTP_USER_AGENT']))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone($varUserSession, \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_Header($varUserSession, $varObjRequest, 'date'), \App\Helpers\ZhtHelper\General\Helper_DateTime::getHourOfTimeZoneOffset($varUserSession, 'Asia/Jakarta'))))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_Header($varUserSession, $varObjRequest))))."::json, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession, $varObjRequest)))."::varchar, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone($varUserSession, \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header($varUserSession, $varObjResponse, 'date'), \App\Helpers\ZhtHelper\General\Helper_DateTime::getHourOfTimeZoneOffset($varUserSession, 'Asia/Jakarta'))))."::timestamptz, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForBigInteger($varUserSession, \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_HTTPStatusCode($varUserSession, $varObjResponse)))."::smallint, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, json_encode(\App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header($varUserSession, $varObjResponse))))."::json, 
                        ".(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getStringLiteralConvertForVarChar($varUserSession, \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent($varUserSession, $varObjResponse)))."::varchar
                        )
                ";
            $varDBData = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, $varSQL);*/
//            file_put_contents(getcwd().'./../tmp/1.txt', $varSQL);
//            $x = $varDBData['data'][0]['Sys_RPK'];
            }
        }
    }

?>