<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_Warehouse_Acquisition                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_Warehouse_Acquisition
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData-Warehouse-Acquisition ► Non Specific Table                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_Log_FileUpload_ObjectDetail                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2024-08-20                                                                                           |
        | ▪ Last Update     : 2024-08-20                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Log Riwayat Transaksi                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Log_FileUpload_ObjectDetail(
            $varUserSession, int $varBranchID,
            int $varLog_FileUpload_Pointer_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-Warehouse-Acquisition.Func_GetDataList_Log_FileUpload_ObjectDetail',
                            [
                                [$varBranchID, 'bigint'],

                                [$varLog_FileUpload_Pointer_RefID, 'bigint'],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                if (count($varReturn['data']) > 0) {
                    for ($i = 0, $iMax = count($varReturn['data']); $i != $iMax; $i++) {
//                dd($varReturn['data'][$i]);
                        /*
                        $varReturn['data'][$i]['Content'] = 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                $varUserSession, 
                                $varReturn['data'][$i]['Content']       
                                );                    
                        
                        */
                        /*
                        $varReturn['data'][$i]['Content'] = 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                $varUserSession, 
                                $varReturn['data'][$i]['Content']       
                                );
                         * 
                         */                    
                        }

                    return
                        $varReturn;
                    }
                else
                    {
                    return [];
                    }
                }
            catch (\Exception $ex) {
//                return [];
                }
            }

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

            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-Warehouse-Acquisition.Func_Device_PersonAccess_GetLastRecordDateTimeTZ',
                        [
                            [$varGoodsIdentity_RefID, 'bigint'],
                            [$varTimeZoneOffset, 'varchar']
                        ]
                        )
                    );
            return $varReturn['data'][0]['Func_Device_PersonAccess_GetLastRecordDateTimeTZ'];
            }
        }
    }