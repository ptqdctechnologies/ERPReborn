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
        | ▪ Method Name     : getArchivedFileObjectInformation                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-03                                                                                           |
        | ▪ Creation Date   : 2023-10-03                                                                                           |
        | ▪ Description     : Mendapatkan Informasi atas Objek File yang berada dalam Archive Cloud                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (int)    varLogFileUploadObjectDetailID ► Log File Upload Object Detail ID                                        |
        |        ----------------------------------------                                                                          |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getArchivedFileObjectInformation($varUserSession, int $varLogFileUploadObjectDetailID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    '
                    SELECT 
                            ("JSONData"->\'entities\'->\'processedData\'->\'entities\'->>\'fileName\')::varchar AS "FileName",
                            ("JSONData"->\'entities\'->\'processedData\'->\'entities\'->>\'fileSize\')::bigint AS "FileSize",
                            ("JSONData"->\'entities\'->\'processedData\'->\'entities\'->>\'fileMIME\')::varchar AS "FileMIME"
                    FROM 
                            "SchData-OLTP-DataAcquisition"."Func_GetDataEntities_Log_FileUpload_ObjectDetail"(
                                    6000000000001::bigint, 
                                    \'{'.$varLogFileUploadObjectDetailID.'}\'::bigint[]
                                    ) AS "JSONData"
                    '
                    );
                return $varReturn['Data'][0];
                }
            catch (\Exception $ex) {
                return [];
                }
            }
        
        public function getJSONAdditionalData_Log_FileUpload_PointerHistory($varUserSession, array $varArrayID = null)
            {
            try {
                if(!$varArrayID)
                    {
                    $varArrayID = [];
                    }

                $varPostgreArrayID = '';
                for($i=0, $iMax=count($varArrayID); $i != $iMax; $i++)
                    {
                    if ($i != 0) {
                        $varPostgreArrayID .= ', ';
                        }
                    $varPostgreArrayID .= $varArrayID[$i];
                    }
                $varPostgreArrayID = '{'.$varPostgreArrayID.'}';

                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_GetJSONAdditionalData_Log_FileUpload_PointerHistory',
                        [
                            [$varPostgreArrayID, 'bigint[]']
                        ]
                        )
                    );
                return $varReturn['Data'][0]['Func_GetJSONAdditionalData_Log_FileUpload_PointerHistory'];
                } 
            catch (\Exception $ex) {
                return [];
                }
            }
        
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_LogFileUploadObjectDetail                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-09                                                                                           |
        | ▪ Creation Date   : 2022-08-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Log File Upload Object Detail                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Object_RefID  ► Log File Upload Object Reference ID                                    |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_LogFileUploadObjectDetail(
            $varUserSession, int $varBranchID, int $varLog_FileUpload_Object_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_GetDataList_Log_FileUpload_ObjectDetail',
                        [
                            [$varBranchID, 'bigint'],
                            [$varLog_FileUpload_Object_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );                
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }
            
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_LogFileUploadPointerHistory                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-18                                                                                           |
        | ▪ Creation Date   : 2022-08-18                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Log File Upload Pointer History                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_LogFileUploadPointerHistory(
            $varUserSession, int $varBranchID, int $varLog_FileUpload_Pointer_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_GetDataList_Log_FileUpload_PointerHistory',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_LogFileUploadPointerHistoryDetail                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-09                                                                                           |
        | ▪ Creation Date   : 2022-08-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Log File Upload Pointer History Detail                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_PointerHistory_RefID ► Log File Upload Pointer History Reference ID                    |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_LogFileUploadPointerHistoryDetail(
            $varUserSession, int $varBranchID, int $varLog_FileUpload_PointerHistory_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_GetDataList_Log_FileUpload_PointerHistoryDetail',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varLog_FileUpload_PointerHistory_RefID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        public function getList_LogFileUploadObjectByExistantion(
            $varUserSession, int $varBranchID, int $varLog_FileUpload_PointerHistory_RefID = null)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_General_ListLogFileUploadObjectByExistantion',
                        [
                            [$varBranchID, 'bigint' ],
                            [$varLog_FileUpload_PointerHistory_RefID, 'bigint' ]
                        ]
                        )
                    );
                return $varReturn['Data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileUpload_DataMovementFromStagingAreaToArchieve                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-08-09                                                                                           |
        | ▪ Last Update     : 2022-08-09                                                                                           |
        | ▪ Description     : Mendapatkan Data JSON untuk perpindahan file dari Cloud Staging Area ke Cloud Archive berdasarkan    |
        |                     Master File Record                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varLogFileUploadPointerRefID ► Log File Upload Pointer Reference ID                                      |
        |      ▪ (int)    varStagingAreaRecordPK ► Staging Area Record Primary Key                                                 |
        |      ▪ (array)  varDeleteCandidate_RefIDArray ► Array Delete Candidate Reference ID                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getFileUpload_DataMovementFromStagingAreaToArchieve($varUserSession, int $varLogFileUploadPointerRefID, int $varStagingAreaRecordPK = null, $varDeleteCandidate_RefIDArray)
            {
            $varSQL = '
                SELECT
                    "SubSQL"."JSONData",
                    "SubSQL"."FilePath"
                FROM
                    (
                    SELECT
                        JSON_BUILD_OBJECT(
                            \'itemList\',
                                JSON_BUILD_OBJECT(
                                    \'items\', "SubSQL"."JSONData"
                                    )
                            )::json AS "JSONData",
                        "SubSQL"."FilePath"
                    FROM
                        (
                        SELECT
                            (
                            \'[\' || 
                            STRING_AGG(
                                "SubSQL"."JSONData"::varchar,
                                \',\'
                                ) ||
                            \']\'
                            )::json AS "JSONData",
                            (
                            \'[\' || 
                            STRING_AGG(
                                (\'"\' || "SubSQL"."FilePath" || \'"\')::varchar,
                                \',\'
                                ) ||
                            \']\'
                            )::json AS "FilePath"
                        FROM
                            (
                            SELECT 
                                JSON_BUILD_OBJECT(
                                    \'recordID\', NULL,
                                    \'entities\',
                                        JSON_BUILD_OBJECT(
                                            \'log_FileUpload_Object_RefID\', null,
                                            \'rotateLog_FileUploadStagingAreaDetail_RefRPK\', "RecordReference",
                                            \'sequence\', "Sequence",
                                            \'name\', "Name",
                                            \'size\', "Size",
                                            \'MIME\', "MIME",
                                            \'extension\', "Extension",
                                            \'lastModifiedDateTimeTZ\', "LastModifiedDateTimeTZ",
                                            \'lastModifiedUnixTimestamp\', "LastModifiedUnixTimestamp",
                                            \'hashMethod_RefID\', "HashMethod_RefID",
                                            \'contentBase64Hash\', "ContentBase64Hash",
                                            \'dataCompression_RefID\', NULL,
                                            \'stagingAreaFilePath\', "FilePath"
                                            )
                                    ) AS "JSONData",
                                "FilePath",
                                ROW_NUMBER () OVER (
                                    ORDER BY
                                        "Sequence" ASC
                                    ) AS "OrderSequence"
                            FROM
                                (
                                SELECT
                                    *
                                FROM
                                    "SchSysAsset"."Func_GetData_FileUpload_MasterFileRecord"(
                                        '.(!$varLogFileUploadPointerRefID ? 'NULL' : $varLogFileUploadPointerRefID).'::bigint, 
                                        '.(!$varStagingAreaRecordPK ? 'NULL' : $varStagingAreaRecordPK).'::bigint, 
                                        '.
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getSQLSyntax_Source_NumberArrayToBigIntArray(
                                            $varUserSession, 
                                            $varDeleteCandidate_RefIDArray).
                                        '::bigint[]
                                        )
                                WHERE
                                    "SignExistOnArchive" = FALSE
                                ) AS "SubSQL"
                            ) AS "SubSQL"
                        ) AS "SubSQL"
                    ) AS "SubSQL"
                ';

            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQL
                )['Data'][0]['JSONData'];

            return $varReturn;
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isThumbnailsExist                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-26                                                                                           |
        | ▪ Creation Date   : 2022-08-26                                                                                           |
        | ▪ Description     : Get Existantion Thumbnails                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varID ► Record ID                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isThumbnailsExist($varUserSession, int $varLog_FileUpload_ObjectDetail_RefID)
            {
            try {
                $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_General_IsThumbnailsExist',
                        [
                            [$varLog_FileUpload_ObjectDetail_RefID, 'bigint']
                        ]
                        )
                    );
                return $varReturn['Data'][0]['Func_General_IsThumbnailsExist'];
                } 
            catch (\Exception $ex) {
                return [];
                }
            }



        }
    }