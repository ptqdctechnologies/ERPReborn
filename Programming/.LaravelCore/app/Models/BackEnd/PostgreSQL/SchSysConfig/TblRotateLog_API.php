<?php

namespace App\Models\PostgreSQL\SchSysConfig
    {
    class TblRotateLog_API extends \Illuminate\Database\Eloquent\Model
        {
        public function setInsert($varUserSession, string $varHostIPAddress, string $varURL, string $varNavigatorUserAgent, string $varRequestDateTimeTZ, string $varRequestHTTPHeader, string $varRequestHTTPBody, string $varResponseDateTimeTZ, int $varResponseHTTPStatus = null, string $varResponseHTTPHeader = null, string $varResponseHTTPBody = null)
            {
            $varDBData = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.Func_TblRotateLog_API_SET',
                    ['cidr', 'character varying', 'character varying', 'timestamp with time zone', 'json', 'character varying', 'timestamp with time zone', 'smallint', 'json', 'character varying'],
                    [$varHostIPAddress, $varURL, $varNavigatorUserAgent, $varRequestDateTimeTZ, $varRequestHTTPHeader, $varRequestHTTPBody, $varResponseDateTimeTZ, $varResponseHTTPStatus, $varResponseHTTPHeader, $varResponseHTTPBody]
                    )
                );
            return $varDBData;
            }
        }
    }