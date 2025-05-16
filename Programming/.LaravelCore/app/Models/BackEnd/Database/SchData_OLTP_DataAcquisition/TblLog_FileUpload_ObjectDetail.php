<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_DataAcquisition                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2022 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_DataAcquisition
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblLog_FileUpload_ObjectDetail                                                                               |
    | ▪ Description : Menangani Models Database ► SchData_OLTP_DataAcquisition ► TblLog_FileUpload_ObjectDetailDetail              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblLog_FileUpload_ObjectDetail  extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-26                                                                                           |
        | ▪ Creation Date   : 2021-07-26                                                                                           |
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
        | ▪ Last Update     : 2022-08-19                                                                                           |
        | ▪ Creation Date   : 2021-07-26                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Object_RefID ► Log File Upload Object Refeence ID (Mandatory)                          |
        |      ▪ (int)    varRotateLog_FileUploadStagingAreaDetail_RefRPK ► Rotate Log File Upload Staging Area Detail Reference   |
        |                                                                   Primary Key (Mandatory)                                |
        |      ▪ (int)    varFileSequence ► File Sequence (Mandatory)                                                              |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (int)    varFileSize ► File Size (Mandatory)                                                                      |
        |      ▪ (string) varFileMIME ► File MIME (Mandatory)                                                                      |
        |      ▪ (string) varFileExtension ► FileExtension (Mandatory)                                                             |
        |      ▪ (string) varFileLastModifiedDateTimeTZ ► File Last Modified DateTimeTZ (Mandatory)                                |
        |      ▪ (int)    varFileLastModifiedUnixTimestamp ► File Last Modified Unix Timestamp (Mandatory)                         |
        |      ▪ (int)    varHashMethod_RefID ► Hash Method Reference ID (Mandatory)                                               |
        |      ▪ (string) varContentHash ► Content Hash (Mandatory)                                                                |
        |      ▪ (int)    varDataCompression_RefID ► Data Compression Reference ID (Optional)                                      |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varLog_FileUpload_Object_RefID = null, int $varRotateLog_FileUploadStagingAreaDetail_RefRPK = null, int $varFileSequence = null, string $varFileName = null, int $varFileSize = null, string $varFileMIME = null, string $varFileExtension = null, string $varFileLastModifiedDateTimeTZ = null, int $varFileLastModifiedUnixTimestamp = null, int $varHashMethod_RefID = null, string $varContentHash = null, int $varDataCompression_RefID = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [null, 'bigint'],
                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varLog_FileUpload_Object_RefID, 'bigint'],
                            [$varRotateLog_FileUploadStagingAreaDetail_RefRPK, 'bigint'],
                            [$varFileSequence, 'smallint'],
                            [$varFileName, 'character varying'],
                            [$varFileSize, 'bigint'],
                            [$varFileMIME, 'character varying'],
                            [$varFileExtension, 'character varying'],
                            [$varFileLastModifiedDateTimeTZ, 'character varying'],
                            [$varFileLastModifiedUnixTimestamp, 'bigint'],
                            [$varHashMethod_RefID, 'bigint'],
                            [$varContentHash, 'character varying'],
                            [$varDataCompression_RefID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2022-08-19                                                                                           |
        | ▪ Creation Date   : 2021-07-26                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Object_RefID ► Log File Upload Object Refeence ID (Mandatory)                          |
        |      ▪ (int)    varRotateLog_FileUploadStagingAreaDetail_RefRPK ► Rotate Log File Upload Staging Area Detail Reference   |
        |                                                                   Primary Key (Mandatory)                                |
        |      ▪ (int)    varFileSequence ► File Sequence (Mandatory)                                                              |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (int)    varFileSize ► File Size (Mandatory)                                                                      |
        |      ▪ (string) varFileMIME ► File MIME (Mandatory)                                                                      |
        |      ▪ (string) varFileExtension ► FileExtension (Mandatory)                                                             |
        |      ▪ (string) varFileLastModifiedDateTimeTZ ► File Last Modified DateTimeTZ (Mandatory)                                |
        |      ▪ (int)    varFileLastModifiedUnixTimestamp ► File Last Modified Unix Timestamp (Mandatory)                         |
        |      ▪ (int)    varHashMethod_RefID ► Hash Method Reference ID (Mandatory)                                               |
        |      ▪ (string) varContentHash ► Content Hash (Mandatory)                                                                |
        |      ▪ (int)    varDataCompression_RefID ► Data Compression Reference ID (Optional)                                      |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varLog_FileUpload_Object_RefID = null, int $varRotateLog_FileUploadStagingAreaDetail_RefRPK = null, int $varFileSequence = null, string $varFileName = null, int $varFileSize = null, string $varFileMIME = null, string $varFileExtension = null, string $varFileLastModifiedDateTimeTZ = null, int $varFileLastModifiedUnixTimestamp = null, int $varHashMethod_RefID = null, string $varContentHash = null, int $varDataCompression_RefID = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [$varSysID, 'bigint'],
                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varLog_FileUpload_Object_RefID, 'bigint'],
                            [$varRotateLog_FileUploadStagingAreaDetail_RefRPK, 'bigint'],
                            [$varFileSequence, 'smallint'],
                            [$varFileName, 'character varying'],
                            [$varFileSize, 'bigint'],
                            [$varFileMIME, 'character varying'],
                            [$varFileExtension, 'character varying'],
                            [$varFileLastModifiedDateTimeTZ, 'character varying'],
                            [$varFileLastModifiedUnixTimestamp, 'bigint'],
                            [$varHashMethod_RefID, 'bigint'],
                            [$varContentHash, 'character varying'],
                            [$varDataCompression_RefID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }