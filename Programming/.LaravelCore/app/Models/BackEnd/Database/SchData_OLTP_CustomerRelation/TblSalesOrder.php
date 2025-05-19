<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_CustomerRelation                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2023 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_CustomerRelation
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblSalesOrder                                                                                                |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-CustomerRelation ► TblSalesOrder                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblSalesOrder extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-23                                                                                           |
        | ▪ Creation Date   : 2021-02-23                                                                                           |
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-15                                                                                           |
        | ▪ Creation Date   : 2021-02-23                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Worker Jobs Position Reference ID                       |
        |      ▪ (int)    varCustomer_RefID ► Customer Reference ID                                                                |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterWorkerJobsPosition_RefID = null, int $varCustomer_RefID = null, int $varProject_RefID = null, string $varRemarks = null,
            array $varAdditionalData = [])
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

                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varRequesterWorkerJobsPosition_RefID, 'bigint'],
                            [$varCustomer_RefID, 'bigint'],
                            [$varProject_RefID, 'bigint'],
                            [$varRemarks, 'varchar'],

                            [((count($varAdditionalData) === 0) ? null : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData)), 'json']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataSynchronize                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-03-02                                                                                           |
        | ▪ Creation Date   : 2021-03-02                                                                                           |
        | ▪ Description     : Data Synchronize                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataSynchronize($varUserSession)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaTableSynchronizeName($varUserSession), 
                        [
                        ]
                        )
                    );

            $varReturn = [];

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-15                                                                                           |
        | ▪ Creation Date   : 2021-02-23                                                                                           |
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
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Worker Jobs Position Reference ID                       |
        |      ▪ (int)    varCustomer_RefID ► Customer Reference ID                                                                |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterWorkerJobsPosition_RefID = null, int $varCustomer_RefID = null, int $varProject_RefID = null, string $varRemarks = null,
            array $varAdditionalData = [])
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

                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varRequesterWorkerJobsPosition_RefID, 'bigint'],
                            [$varCustomer_RefID, 'bigint'],
                            [$varProject_RefID, 'bigint'],
                            [$varRemarks, 'varchar'],

                            [((count($varAdditionalData) === 0) ? null : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData)), 'json']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }