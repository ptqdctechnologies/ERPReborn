<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class RequestHandler
        {
        public function handle(\Illuminate\Http\Request $varObjRequest, \Closure $next)
            {
            //echo "------";
            //var_dump($next);
            //return $next($varObjRequest);
            return $this->CheckAllStage($varObjRequest, $next);
            }

        private function CheckAllStage(&$varObjRequest, &$varObjNext)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $varDataSeparatorTag = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR');
            $varClientServerDateTimeLagTolerance = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TIME_LAG_TOLERANCE_CLIENT_SERVER');
            $varTTL = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TIME_EXPIRED_REQUEST');
            \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] entering', [
                'separator_tag' => $varDataSeparatorTag,
                'lag_tolerance' => $varClientServerDateTimeLagTolerance,
                'ttl'           => $varTTL,
            ]);
            try {
                $varServerCurrentUnixTime=\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession);
                //---> HTTP Header Check
                $varHTTPHeader = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::getHeader($varUserSession, $varObjRequest);

                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] headers received', [
                    'server_unix_time'     => $varServerCurrentUnixTime,
                    'header_keys'          => array_keys(is_array($varHTTPHeader) ? $varHTTPHeader : []),
                    'agent-datetime'       => $varHTTPHeader['agent-datetime'] ?? '<missing>',
                    'x-content-md5'        => $varHTTPHeader['x-content-md5']  ?? '<missing>',
                    'x-request-id'         => $varHTTPHeader['x-request-id']   ?? '<missing>',
                    'expires'              => $varHTTPHeader['expires']        ?? '<missing>',
                ]);

                //--->---> Check Date Time on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'agent-datetime', $varHTTPHeader)==false)
                    {
                    \Illuminate\Support\Facades\Log::warning('[Auth.RequestHandler] FAIL: agent-datetime missing');
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Request date and time not specified on HTTP Header']));
                    }
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] step 1 PASS: agent-datetime present');

                //--->---> Check Date Time Difference on HTTP Header
                $varClientUnixTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['agent-datetime']);
                $varMinAccepted = $varServerCurrentUnixTime - $varClientServerDateTimeLagTolerance;
                $varMaxAccepted = $varServerCurrentUnixTime + $varClientServerDateTimeLagTolerance;
                $varWithinTolerance = ($varMinAccepted <= $varClientUnixTime && $varMaxAccepted >= $varClientUnixTime);
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] time comparison', [
                    'agent_datetime_header' => $varHTTPHeader['agent-datetime'],
                    'client_unix_time'      => $varClientUnixTime,
                    'client_unix_time_type' => gettype($varClientUnixTime),
                    'server_unix_time'      => $varServerCurrentUnixTime,
                    'min_accepted'          => $varMinAccepted,
                    'max_accepted'          => $varMaxAccepted,
                    'within_tolerance'      => $varWithinTolerance,
                ]);
                if(!$varWithinTolerance)
                    {
                    \Illuminate\Support\Facades\Log::warning('[Auth.RequestHandler] FAIL: time out of tolerance');
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Request date and time difference between Server and Client is not within tolerance ( ±'.$varClientServerDateTimeLagTolerance.' seconds )']));
                    }
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] step 2 PASS: time within tolerance');

                //--->---> Check Content-MD5 on HTTP Header
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'x-content-md5', $varHTTPHeader)==false)
                    {
                    \Illuminate\Support\Facades\Log::warning('[Auth.RequestHandler] FAIL: x-content-md5 missing');
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Request X-Content-MD5 not found on HTTP Header']));
                    }
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] step 3 PASS: x-content-md5 present');

                //--->---> Check X-Request-Unique-ID on HTTP Header ---> Untuk menangani Idempotency
                if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'x-request-id', $varHTTPHeader)==false)
                    {
                    \Illuminate\Support\Facades\Log::warning('[Auth.RequestHandler] FAIL: x-request-id missing');
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Request ID not specified on HTTP Header']));
                    }
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] step 4 PASS: x-request-id present');

                //--->---> Check Expired DateTime
                $varExpiresUnixTime = (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'expires', $varHTTPHeader)==true)
                    ? \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['expires'])
                    : \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varHTTPHeader['date'] ?? '') + $varTTL;
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] expires comparison', [
                    'expires_unix_time'     => $varExpiresUnixTime,
                    'expires_unix_type'     => gettype($varExpiresUnixTime),
                    'server_unix_time'      => $varServerCurrentUnixTime,
                    'is_expired'            => ($varServerCurrentUnixTime > $varExpiresUnixTime),
                ]);
                if($varServerCurrentUnixTime > $varExpiresUnixTime)
                    {
                    \Illuminate\Support\Facades\Log::warning('[Auth.RequestHandler] FAIL: request expired');
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Request has expired']));
                    }
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] step 5 PASS: not expired');

                //--->---> Check Content Integrity
                $varRawBody       = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);
                $varReencodedBody = \GuzzleHttp\json_encode($varRawBody);
                $varComputedMD5   = \App\Helpers\ZhtHelper\General\Helper_HTTPHeader::generateContentMD5($varUserSession, $varReencodedBody);
                $varMD5Match      = (strcmp($varHTTPHeader['x-content-md5'], $varComputedMD5) == 0);
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] content integrity check', [
                    'header_md5'        => $varHTTPHeader['x-content-md5'],
                    'computed_md5'      => $varComputedMD5,
                    'md5_match'         => $varMD5Match,
                    'reencoded_body'    => is_string($varReencodedBody) ? substr($varReencodedBody, 0, 200) : gettype($varReencodedBody),
                    'reencoded_length'  => is_string($varReencodedBody) ? strlen($varReencodedBody) : null,
                    'raw_body_type'     => gettype($varRawBody),
                ]);
                if(!$varMD5Match)
                    {
                    \Illuminate\Support\Facades\Log::warning('[Auth.RequestHandler] FAIL: content integrity mismatch');
                    throw new \Exception(implode($varDataSeparatorTag,
                        [403, 'Content integrity is invalid']));
                    }
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] step 6 PASS: content integrity OK — handing off to next()');

                $varReturn = $varObjNext($varObjRequest);
                \Illuminate\Support\Facades\Log::info('[Auth.RequestHandler] next() returned', [
                    'return_type' => gettype($varReturn),
                    'status'      => method_exists($varReturn, 'status') ? $varReturn->status() : null,
                ]);
                }
            catch (\Throwable $ex) {
                \Illuminate\Support\Facades\Log::error('[Auth.RequestHandler] exception caught', [
                    'class'   => get_class($ex),
                    'message' => $ex->getMessage(),
                    'file'    => $ex->getFile(),
                    'line'    => $ex->getLine(),
                ]);
                $varDataMessage = explode($varDataSeparatorTag, $ex->getMessage());
                $varReturn = \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, $varDataMessage[0] ?? 500, $varDataMessage[1] ?? $ex->getMessage());
                }
            return $varReturn;
            }
        }
    }

?>