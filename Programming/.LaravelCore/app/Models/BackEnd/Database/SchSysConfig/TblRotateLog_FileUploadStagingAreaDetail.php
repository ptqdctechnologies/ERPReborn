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
    | ▪ Class Name  : TblRotateLog_FileUploadStagingAreaDetail                                                                     |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► TblRotateLog_FileUploadStagingAreaDetail                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblRotateLog_FileUploadStagingAreaDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Creation Date   : 2021-07-21                                                                                           |
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
        | ▪ Method Name     : resetSequence                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-02                                                                                           |
        | ▪ Creation Date   : 2022-08-02                                                                                           |
        | ▪ Description     : Reset Sequence                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordPK ► Record Primary Key                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function resetSequence($varUserSession, int $varRecordPK)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_TblRotateLog_FileUploadStagingAreaDetail_ResetSequence',
                        [
                            [$varRecordPK, 'bigint']
                        ]
                        )
                    );

            return $varReturn['data'][0];         
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInitialize                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-28                                                                                           |
        | ▪ Creation Date   : 2021-07-28                                                                                           |
        | ▪ Description     : Data Initialize                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInitialize($varUserSession)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig-Initialize.Func_'.parent::getSchemaName($varUserSession).'_'.parent::getTableName($varUserSession),
                        []
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2021-08-04                                                                                           |
        | ▪ Creation Date   : 2022-07-22                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation (Optional)                                                 |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varRotateLog_FileUploadStagingArea_RefRPK ► Rotate Log File Upload Staging Area Reference Primary Key    |
        |                                                             (Mandatory)                                                  |
        |      ▪ (int)    varFileSequence ► File Sequence (Mandatory)                                                              |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (int)    varFileSize ► File Size (Mandatory)                                                                      |
        |      ▪ (string) varFileMIME ► File MIME (Mandatory)                                                                      |
        |      ▪ (string) varFileExtension ► FileExtension (Mandatory)                                                             |
        |      ▪ (string) varFileLastModifiedDateTimeTZ ► File Last Modified DateTimeTZ (Mandatory)                                |
        |      ▪ (int)    varFileLastModifiedUnixTimestamp ► File Last Modified Unix Timestamp (Mandatory)                         |
        |      ▪ (int)    varHashMethod_RefID ► Hash Method Reference ID (Mandatory)                                               |
        |      ▪ (string) varContentBase64Hash ► Content Base64 Hash (Mandatory)                                                   |
        |      ▪ (string) varURLDelete ► URL Delete (Mandatory)                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, 
            int $varRotateLog_FileUploadStagingArea_RefRPK, int $varFileSequence, string $varFileName, int $varFileSize, string $varFileMIME, string $varFileExtension, string $varFileLastModifiedDateTimeTZ, int $varFileLastModifiedUnixTimestamp, int $varHashMethod_RefID, string $varContentBase64Hash, string $varURLDelete)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_TblRotateLog_FileUploadStagingAreaDetail_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [null, 'bigint'],
                            [$varSysDataAnnotation, 'varchar'],

                            [$varRotateLog_FileUploadStagingArea_RefRPK, 'bigint'],
                            [$varFileSequence, 'smallint'],
                            [$varFileName, 'varchar'],
                            [$varFileSize, 'bigint'],
                            [$varFileMIME, 'varchar'],
                            [$varFileExtension, 'varchar'],
                            [$varFileLastModifiedDateTimeTZ, 'varchar'],
                            [$varFileLastModifiedUnixTimestamp, 'bigint'],
                            [$varHashMethod_RefID, 'bigint'],
                            [$varContentBase64Hash, 'varchar'],
                            [$varURLDelete, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setURLDelete                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-05-23                                                                                           |
        | ▪ Creation Date   : 2022-08-09                                                                                           |
        | ▪ Description     : Set URL Delete                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (int)     varRecordPK ► Record Primary Key                                                                        |
        |      ▪ (string)  varURLDelete ► URL Delete                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setURLDelete($varUserSession, int $varRecordPK, string $varURLDelete = null)
            {
            if(is_null($varURLDelete) == TRUE)
                {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_TblRotateLog_FileUploadStagingAreaDetail_SetURLDelete',
                            [
                                [$varRecordPK, 'bigint'],
                                [$varURLDelete, 'varchar']
                            ]
                            )
                        );
                //dd($varReturn);
                return TRUE;            
                }
            else
                {
                return FALSE;
                }
            }
        }
    }

?>