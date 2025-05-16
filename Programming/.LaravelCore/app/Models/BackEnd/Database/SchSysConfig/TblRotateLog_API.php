<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysConfig                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchSysConfig
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblRotateLog_API                                                                                             |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► TblRotateLog_API                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblRotateLog_API extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function __construct()
            {
            parent::__construct(__CLASS__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2021-07-23                                                                                           |
        | ▪ Creation Date   : 2021-07-23                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation (Optional)                                                 |
        |      ▪ (string) varHostIPAddress ► Host IP Address (Mandatory)                                                           |
        |      ▪ (string) varURL ► Destination URL (Mandatory)                                                                     |
        |      ▪ (string) varNavigatorUserAgent ► Navigator User Agent (Mandatory)                                                 |
        |      ▪ (string) varRequestDateTimeTZ ► Request DateTimeTZ (Mandatory)                                                    |
        |      ▪ (string) varRequestHTTPHeader ► Request HTTP Header (Mandatory)                                                   |
        |      ▪ (string) varRequestHTTPBody ► Request HTTP Body (Mandatory)                                                       |
        |      ▪ (string) varResponseDateTimeTZ ► Response DateTimeTZ (Mandatory)                                                  |
        |      ▪ (int)    varResponseHTTPStatus ► Response HTTP Status (Mandatory)                                                 |
        |      ▪ (string) varResponseHTTPHeader ► Response HTTP Header (Mandatory)                                                 |
        |      ▪ (string) varResponseHTTPBody ► Response HTTP Body (Mandatory)                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, 
            string $varHostIPAddress, string $varURL, string $varNavigatorUserAgent, string $varRequestDateTimeTZ, string $varRequestHTTPHeader, string $varRequestHTTPBody, string $varResponseDateTimeTZ, int $varResponseHTTPStatus = null, string $varResponseHTTPHeader = null, string $varResponseHTTPBody = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_TblRotateLog_API_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [null, 'bigint'],
                            [$varSysDataAnnotation, 'varchar'],
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

            return
                $varReturn;
            }
        }
    }

?>