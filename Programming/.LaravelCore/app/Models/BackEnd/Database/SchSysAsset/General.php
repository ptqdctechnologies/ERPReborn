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
        public function getData_APIWebToken_IsExist(
            $varUserSession,
            $varAPIWebToken)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
                'SignExist' => (boolean) $varReturn['data'][0]['Func_GetData_APIWebToken_IsExist']                
                ];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getData_APIWebToken_ByUserSessionID                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-08-01                                                                                           |
        | ▪ Creation Date   : 2023-08-01                                                                                           |
        | ▪ Description     : Mendapatkan API Web Token berdasarkan ID User Session                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string)  varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getData_APIWebToken_ByUserSessionID(
            $varUserSession)
            {
            $varReturn = 
                //\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                //    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_GetData_APIWebToken_ByUserSessionID',
                        [
                            [$varUserSession, 'bigint']
                        ]
                //        )
                    );
            dd($varReturn);
            
            return $varReturn['data'][0]['Func_GetData_APIWebToken_ByUserSessionID'];
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

            return 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion(
                    $varUserSession, 
                    $varReturn['data'][0]['Func_GetData_FileUpload_isFileAlreadyExist']
                    );
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getData_WorkFlow_IsUserAllowed                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-02-24                                                                                           |
        | ▪ Creation Date   : 2026-02-24                                                                                           |
        | ▪ Description     : Mendapatkan Status Hak Akses Workflow dari User                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (int)     varAPIWebToken ► API Web Token                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getData_WorkFlow_IsUserAllowed(
            $varUserSession,
            int $varBranchRefID, int $varUserRefID, int $varBusinessDocumentTypeRefID, int $varCombinedBudgetRefID,
            string $varMode = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_GetData_WorkFlow_IsUserAllowed',
                        [
                            [$varBranchRefID, 'bigint'],

                            [$varUserRefID, 'bigint'],
                            [$varBusinessDocumentTypeRefID, 'bigint'],
                            [$varCombinedBudgetRefID, 'bigint'],

                            [$varMode, 'varchar']
                        ]
                        )
                    );

            return
                [
                'SignAllowed' => (boolean) $varReturn['data'][0]['Func_GetData_WorkFlow_IsUserAllowed']                
                ];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isRecordDeleted                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2024-09-03                                                                                           |
        | ▪ Last Update     : 2024-09-03                                                                                           |
        | ▪ Description     : Mengecek Apakah Record Terhapus didalam database                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isRecordDeleted(
            $varUserSession,
            int $varRecordID)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysAsset.FuncSys_DataCheck_RecordDeletion',
                            [
                                [$varRecordID, 'bigint']
                            ]
                            )                            
                        );
                
                $varReturn['data'][0] = [
                    'signDelete' => $varReturn['data'][0]['SignDelete'],
                    'message' => $varReturn['data'][0]['Message']
                    ];
                }
            catch (\Exception $ex) {
                //return [];
                }

            return 
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isExist_RecordID                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2024-09-02                                                                                           |
        | ▪ Last Update     : 2024-09-02                                                                                           |
        | ▪ Description     : Mengecek Apakah ID Log File Upload Pointer ada didalam database                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isExist_RecordID(
            $varUserSession,
            int $varRecordID)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysAsset.FuncSys_DataCheck_RecordIDExistantion',
                            [
                                [$varRecordID, 'bigint']
                            ]
                            )                            
                        );
                
                $varReturn['data'][0] = [
                    'signExist' => $varReturn['data'][0]['SignExist'],
                    'message' => $varReturn['data'][0]['Message']
                    ];
                }
            catch (\Exception $ex) {
                //return [];
                }

            return 
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setData_FileHandling_SetFilesAppend                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-23                                                                                           |
        | ▪ Creation Date   : 2024-08-23                                                                                           |
        | ▪ Description     : Mengeset Files Append                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (int)    varJSONData ► JSON Data                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setData_FileHandling_SetFilesAppend(
            $varUserSession,
            int $varLog_FileUpload_Pointer_RefID = null, string $varJSONData = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.FuncSys_FileHandling_SetFilesAppend',
                        [
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            
                            [((count($varAdditionalData) === 0) ? null : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData)), 'json']
                        ]
                        )
                    );

            return 
                $varReturn;
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
            
            $varData = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

            $varReturn = [];
            $x = 0;
            for ($i=0; $i < count($varData['data']); $i++) {
                if($varData['data'][$i]['RecordReference'] != 0) {
                    // $varReturn['Process'] = $varData['Process'];
                    $varReturn['data'][$x] = $varData['data'][$i];
                    // $varReturn['rowCount'] = $varData['rowCount'];
                    // $varReturn['Notice'] = $varData['Notice'];
                    $varReturn['data'][$x]['Sequence'] = $x + 1;
                    $x++;
                    }
                }

            $varReturn['rowCount'] = $x;
                
            return $varReturn;
            }

        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : Func_GetDataPickSet_ArchivedFilesObject                                                              |
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
        public function Func_GetDataPickSet_ArchivedFilesObject($varUserSession, int $varLog_FileUpload_Pointer_RefID = null, int $varRotateLog_FileUploadStagingArea_RefRPK = null, array $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = null)
            {
            if(!$varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID) {
                $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = [];
                }
            
            $varData = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchData-OLTP-DataAcquisition.Func_GetDataPickSet_ArchivedFilesObject',
                        [

                            [$varUserSession, 'bigint'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        ]
                        )
                    );

            $varReturn =  [
                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                    $varUserSession, 
                    $varData['data'][0]['ProcessedData_JSON'])
                ];

            return $varReturn[0]['details'];
            }

            
        public function getDataDecrypt_HTTPGetParameter(
            $varUserSession,
            string $varEncryptedData)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT "SchSysAsset"."Func_General_DataDecrypt_HTTPGetParameter"(\''.$varEncryptedData.'\'::varchar)'
                    );
            return $varReturn['data'][0]['Func_General_DataDecrypt_HTTPGetParameter'];
            }


        public function getDataEncrypt_HTTPGetParameter(
            $varUserSession,
            string $varPlainData) 
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT "SchSysAsset"."Func_General_DataEncrypt_HTTPGetParameter"(\''.$varPlainData.'\'::varchar)'
                    );
            return $varReturn['data'][0]['Func_General_DataEncrypt_HTTPGetParameter'];
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_GetFileEntities_StagingArea',
                        [
                            [$varRPK, 'bigint']
                        ]
                        )
                    );

            return $varReturn['data'][0];
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileList                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-26                                                                                           |
        | ▪ Creation Date   : 2024-08-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File pada Cloud Storage                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getFileList($varUserSession, int $varLog_FileUpload_Pointer_RefID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.FuncSys_FileHandling_GetFileList',
                        [
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        ]
                        )
                    );

            return
                $varReturn;
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_General_Hash_SHA256',
                        [
                            [$varData, 'bytea']
                        ]
                        )
                    );

            return  $varReturn['data'][0]['Func_General_Hash_SHA256'];
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_GetDataList_LocalStorageSubDirectories',
                        [
                            [$varArrayPhysicalName, 'varchar[]'],
                        ]
                        )
                    );

            return $varReturn['data'];
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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

            return $varReturn['data'];
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
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.Func_GetDataList_CloudStorageSubDirectories',
                        [
                            [$varArrayPhysicalName, 'varchar[]'],
                        ]
                        )
                    );

            return $varReturn['data'];
            }
        }
    }