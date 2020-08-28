<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\PostgreSQL\SchSysConfig                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\PostgreSQL\SchSysConfig
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblRotateLog_API                                                                                             |
    | ▪ Description : Menangani Models PostgreSQL ► TblRotateLog_API                                                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblRotateLog_API extends \App\Models\PostgreSQL\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varHostIPAddress ► Host IP Address                                                                       |
        |      ▪ (string) varURL ► Destination URL                                                                                 |
        |      ▪ (string) varNavigatorUserAgent ► Navigator User Agent                                                             |
        |      ▪ (string) varRequestDateTimeTZ ► Request DateTimeTZ                                                                |
        |      ▪ (string) varRequestHTTPHeader ► Request HTTP Header                                                               |
        |      ▪ (string) varRequestHTTPBody ► Request HTTP Body                                                                   |
        |      ▪ (string) varResponseDateTimeTZ ► Response DateTimeTZ                                                              |
        |      ▪ (int)    varResponseHTTPStatus ► Response HTTP Status                                                             |
        |      ▪ (string) varResponseHTTPHeader ► Response HTTP Header                                                             |
        |      ▪ (string) varResponseHTTPBody ► Response HTTP Body                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert($varUserSession, string $varHostIPAddress, string $varURL, string $varNavigatorUserAgent, string $varRequestDateTimeTZ, string $varRequestHTTPHeader, string $varRequestHTTPBody, string $varResponseDateTimeTZ, int $varResponseHTTPStatus = null, string $varResponseHTTPHeader = null, string $varResponseHTTPBody = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.Func_TblRotateLog_API_SET',
                    [
                        [$varHostIPAddress, 'cidr'],
                        [$varURL, 'character varying'],
                        [$varNavigatorUserAgent, 'character varying'],
                        [$varRequestDateTimeTZ, 'timestamp with time zone'],
                        [$varRequestHTTPHeader, 'json'], 
                        [$varRequestHTTPBody, 'character varying'],
                        [$varResponseDateTimeTZ, 'timestamp with time zone'], 
                        [$varResponseHTTPStatus, 'smallint'], 
                        [$varResponseHTTPHeader, 'json'],
                        [$varResponseHTTPBody, 'character varying']
                    ],
                    )
                );
            return $varReturn;
            }
        }
    }

?>