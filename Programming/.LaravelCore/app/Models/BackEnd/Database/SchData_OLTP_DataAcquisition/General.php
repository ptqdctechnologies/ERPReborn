<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysConfig                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_DataAcquisition
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_DataAcquisition ► Non Specific Table                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General //extends \Illuminate\Database\Eloquent\Model
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDevicePersonAccess_LastRecordDateTimeTZ                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-05-27                                                                                           |
        | ▪ Last Update     : 2021-05-27                                                                                           |
        | ▪ Description     : Mendapatkan Data Tanggal Terakhir dari Alat Akses Personal                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varGoodsIdentity_RefID ► Goods Identity Reference ID                                                     |
        |      ▪ (string) varTimeZoneOffset ► TimeZone Offset                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, int $varGoodsIdentity_RefID, string $varTimeZoneOffset = null)
            {
            if(!$varTimeZoneOffset)
                {
                $varTimeZoneOffset = 'UTC';                
                }

            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchData-OLTP-DataAcquisition.Func_Device_PersonAccess_GetLastRecordDateTimeTZ',
                    [
                        [$varGoodsIdentity_RefID, 'bigint'],
                        [$varTimeZoneOffset, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0]['Func_Device_PersonAccess_GetLastRecordDateTimeTZ'];
            }


        }
    }