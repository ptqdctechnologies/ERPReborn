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

            $varAuditDriver = strtolower((string) env('AUDIT_LOG_DRIVER', 'both'));
            $varWriteDB     = in_array($varAuditDriver, ['db',   'both'], true);
            $varWriteLoki   = in_array($varAuditDriver, ['loki', 'both'], true);

            $varIPAddress       = \App\Helpers\ZhtHelper\General\Helper_Network::getClientIPAddress($varUserSession);
            $varURL             = url()->current();
            $varMethod          = $varObjRequest->getMethod();
            $varUserAgent       = $_SERVER['HTTP_USER_AGENT'] ?? null;
            $varRequestHeaders  = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_Header($varUserSession, $varObjRequest);
            $varRequestBody     = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession, $varObjRequest);
            $varResponseHeaders = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header($varUserSession, $varObjResponse);
            $varResponseStatus  = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_HTTPStatusCode($varUserSession, $varObjResponse);
            $varResponseBody    = \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_BodyContent($varUserSession, $varObjResponse);

            $varRequestDateTimeTZ = \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone(
                $varUserSession,
                \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest_Header($varUserSession, $varObjRequest, 'agent-datetime'),
                \App\Helpers\ZhtHelper\General\Helper_DateTime::getHourOfTimeZoneOffset($varUserSession, 'Asia/Jakarta')
                );
            $varResponseDateTimeTZ = \App\Helpers\ZhtHelper\General\Helper_DateTime::getTimeStampTZConvert_GMTToOtherTimeZone(
                $varUserSession,
                \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::getResponse_Header($varUserSession, $varObjResponse, 'date'),
                \App\Helpers\ZhtHelper\General\Helper_DateTime::getHourOfTimeZoneOffset($varUserSession, 'Asia/Jakarta')
                );

            if ($varWriteDB)
                {
                (new \App\Models\Database\SchSysConfig\TblRotateLog_API())->setDataInsert(
                    $varUserSession,
                    null,
                    $varIPAddress,
                    $varURL,
                    $varUserAgent,
                    $varRequestDateTimeTZ,
                    json_encode($varRequestHeaders),
                    $varRequestBody,
                    $varResponseDateTimeTZ,
                    $varResponseStatus,
                    json_encode($varResponseHeaders),
                    $varResponseBody
                    );
                }

            if ($varWriteLoki)
                {
                try
                    {
                    \Illuminate\Support\Facades\Log::channel('audit_api')->info('api_access', [
                        'phase'            => 'auth',
                        'session_id'       => $varUserSession,
                        'ip'               => $varIPAddress,
                        'url'              => $varURL,
                        'method'           => $varMethod,
                        'user_agent'       => $varUserAgent,
                        'request_dt'       => $varRequestDateTimeTZ,
                        'request_headers'  => $varRequestHeaders,
                        'request_body'     => $varRequestBody,
                        'response_dt'      => $varResponseDateTimeTZ,
                        'response_status'  => $varResponseStatus,
                        'response_headers' => $varResponseHeaders,
                        'response_body'    => $varResponseBody,
                    ]);
                    }
                catch (\Throwable $e)
                    {
                    \Illuminate\Support\Facades\Log::channel('single')->warning(
                        'Loki audit emit failed (Authentication)',
                        ['error' => $e->getMessage()]
                        );
                    }
                }
            }
        }
    }

?>
