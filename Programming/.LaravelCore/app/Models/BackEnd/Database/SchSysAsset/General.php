<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysAsset                                                                                  |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchSysAsset
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchSysAsset ► Non Specific Table                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General //extends \Illuminate\Database\Eloquent\Model
        {


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getData_APIWebToken_IsExist                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-09                                                                                           |
        | ▪ Creation Date   : 2023-01-09                                                                                           |
        | ▪ Description     : Mendapatkan Eksistansi dari API Web Token                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (int)     varAPIWebToken ► API Web Token                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getData_APIWebToken_IsExist($varUserSession, $varAPIWebToken)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetData_APIWebToken_IsExist',
                    [
                        [$varAPIWebToken, 'varchar']
                    ]
                    )
                );
            return
                [
                'SignExist' => (boolean) $varReturn['Data'][0]['Func_GetData_APIWebToken_IsExist']                
                ];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getData_FileUpload_IsFileAlreadyExist                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2022-08-03                                                                                           |
        | ▪ Description     : Mendapatkan Master File Record Upload                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varArchiveRecordID ► Archive Record ID                                                                   |
        |      ▪ (int)    varStagingAreaRecordPK ► Staging Area Record Primary Key                                                 |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (int)    varFileSize ► File Size (Mandatory)                                                                      |
        |      ▪ (string) varFileMIME ► File MIME (Mandatory)                                                                      |
        |      ▪ (string) varFileExtension ► FileExtension (Mandatory)                                                             |
        |      ▪ (int)    varFileLastModifiedUnixTimestamp ► File Last Modified Unix Timestamp (Mandatory)                         |
        |      ▪ (string) varContentBase64Hash ► Content Base64 Hash (Mandatory)                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getData_FileUpload_IsFileAlreadyExist(
            $varUserSession, 
            int $varArchiveRecordID = null, int $varStagingAreaRecordPK = null, string $varFileName = null, int $varFileSize = null, string $varFileMIME = null, string $varFileExtension = null, int $varFileLastModifiedUnixTimestamp = null, string $varContentBase64Hash = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetData_FileUpload_isFileAlreadyExist',
                    [
                        [$varArchiveRecordID, 'bigint'],
                        [$varStagingAreaRecordPK, 'bigint'],

                        [$varFileName, 'character varying'],
                        [$varFileSize, 'bigint'],
                        [$varFileMIME, 'character varying'],
                        [$varFileExtension, 'character varying'],
                        [$varFileLastModifiedUnixTimestamp, 'bigint'],
                        [$varContentBase64Hash, 'character varying']
                    ]
                    )
                );
            return $varReturn['Data'][0]['Func_GetData_FileUpload_isFileAlreadyExist'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getData_FileUpload_MasterFileRecord                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2022-08-03                                                                                           |
        | ▪ Description     : Mendapatkan Master File Record Upload                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varArchiveRecordID ► Archive Record ID                                                                   |
        |      ▪ (int)    varStagingAreaRecordPK ► Staging Area Record Primary Key                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getData_FileUpload_MasterFileRecord($varUserSession, int $varLog_FileUpload_Pointer_RefID = null, int $varRotateLog_FileUploadStagingArea_RefRPK = null, array $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = null)
            {
            if(!$varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID) {
                $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = [];
                }
            
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetData_FileUpload_MasterFileRecord',
                    [
                        [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        [$varRotateLog_FileUploadStagingArea_RefRPK, 'bigint'],
                        [
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getSQLSyntax_Source_NumberArrayToBigIntArray(
                                $varUserSession, 
                                $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID
                                ),
                            'bigint[]'
                        ]
                    ]
                    )
                );
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileEntities_StagingArea                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
        | ▪ Description     : Mendapatkan File Entities Staging Area                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getFileEntities_StagingArea($varUserSession, int $varRPK)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetFileEntities_StagingArea',
                    [
                        [$varRPK, 'bigint']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCloudStorageFilesList                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File Cloud Storage                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getCloudStorageFilesList($varUserSession, int $varRotateLog_FileUploadStagingArea_RefRPK, string $varArrayPhysicalName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetDataList_CloudStorageFiles',
                    [
                        [$varRotateLog_FileUploadStagingArea_RefRPK, 'bigint'],
                        [$varArrayPhysicalName, 'varchar[]'],
                    ]
                    )
                );
            return $varReturn['Data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getHash_SHA256                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-01                                                                                           |
        | ▪ Creation Date   : 2022-08-1                                                                                            |
        | ▪ Description     : Mendapatkan Hash SHA256                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getHash_SHA256($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_General_Hash_SHA256',
                    [
                        [$varData, 'bytea']
                    ]
                    )
                );
            return  $varReturn['Data'][0]['Func_General_Hash_SHA256'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLocalStorageSubDirectoriesList                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Sub Direktori Cloud Storage                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getLocalStorageSubDirectoriesList($varUserSession, string $varArrayPhysicalName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetDataList_LocalStorageSubDirectories',
                    [
                        [$varArrayPhysicalName, 'varchar[]'],
                    ]
                    )
                );
            return $varReturn['Data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getLocalStorageFilesList                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File Cloud Storage                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getLocalStorageFilesList($varUserSession, int $varRotateLog_FileUploadStagingArea_RefRPK, string $varArrayPhysicalName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetDataList_LocalStorageFiles',
                    [
                        [$varRotateLog_FileUploadStagingArea_RefRPK, 'bigint'],
                        [$varArrayPhysicalName, 'varchar[128]'],
                    ]
                    )
                );
            return $varReturn['Data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCloudStorageSubDirectoriesList                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Sub Direktori Cloud Storage                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getCloudStorageSubDirectoriesList($varUserSession, string $varArrayPhysicalName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysAsset.Func_GetDataList_CloudStorageSubDirectories',
                    [
                        [$varArrayPhysicalName, 'varchar[]'],
                    ]
                    )
                );
            return $varReturn['Data'];
            }
        }
    }