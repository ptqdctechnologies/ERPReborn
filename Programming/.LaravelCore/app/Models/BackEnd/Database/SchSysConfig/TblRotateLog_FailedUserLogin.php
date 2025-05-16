<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysConfig                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchSysConfig
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblRotateLog_FailedUserLogin                                                                                 |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► TblRotateLog_FailedUserLogin                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblRotateLog_FailedUserLogin extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-23                                                                                           |
        | ▪ Creation Date   : 2021-07-23                                                                                           |
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
        |      ▪ (string) varLoginUser ► Login User (Mandatory)                                                                    |
        |      ▪ (string) varLoginPassword ► Login Password (Mandatory)                                                            |
        |      ▪ (string) varLoginDateTimeTZ ► Login DateTimeTZ (Mandatory)                                                        |
        |      ▪ (string) varNavigatorUserAgent ► Navigator User Agent (Mandatory)                                                 |
        |      ▪ (string) varNavigatorPlatform ► Navigator Platform (Mandatory)                                                    |
        |      ▪ (string) varHostIPAddress ► Host IP Address (Mandatory)                                                           |
        |      ▪ (string) varHostMACAddress ► Host MAC Address (Mandatory)                                                         |
        |      ▪ (string) varHostName ► Host Name (Mandatory)                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null,
            string $varLoginUser = null, string $varLoginPassword = null, string $varLoginDateTimeTZ = null, string $varNavigatorUserAgent = null, string $varNavigatorPlatform = null, string $varHostIPAddress = null, string $varHostMACAddress = null, string $varHostName = null)
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
                            [$varLoginUser, 'varchar'],
                            [$varLoginPassword, 'varchar'],
                            [$varLoginDateTimeTZ, 'timestamptz'], 
                            [$varNavigatorUserAgent, 'varchar'],
                            [$varNavigatorPlatform, 'varchar'], 
                            [$varHostIPAddress, 'cidr'], 
                            [$varHostMACAddress, 'macaddr'],
                            [$varHostName, 'character varying']
                        ],
                        )
                    );

            return
                $varReturn;
            }
        }
    }