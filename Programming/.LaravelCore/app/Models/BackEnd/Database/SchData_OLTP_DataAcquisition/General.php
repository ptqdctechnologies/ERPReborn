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
        public function getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, int $varGoodsIdentityID, string $varTimeZoneOffset = null)
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
                        [$varGoodsIdentityID, 'bigint'],
                        [$varTimeZoneOffset, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0]['Func_Device_PersonAccess_GetLastRecordDateTimeTZ'];
            }
        }
    }