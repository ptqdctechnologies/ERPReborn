<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblBusinessDocumentNumbering                                                                                 |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblBusinessDocumentNumbering                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblBusinessDocumentNumbering extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-30                                                                                           |
        | ▪ Creation Date   : 2020-11-30                                                                                           |
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-07                                                                                           |
        | ▪ Creation Date   : 2020-12-07                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varBusinessDocumentNumberingFormatRefID ► Business Document Numbering Format Reference ID                |
        |      ▪ (string) varValidStartDate ► Valid Start Date                                                                     |
        |      ▪ (string) varValidFinishDate ► Valid Finish Date                                                                   |
        |      ▪ (int)    varLastSequenceNumber ► Last Sequence Number                                                             |
        |      ▪ (string) varLastRequestDocumentNumber ► Last Request Document Number                                              |
        |      ▪ (string) varLastRequestDocumentDate ► Last Request Document Date                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varBusinessDocumentNumberingFormatRefID = null, string $varValidStartDate = null, string $varValidFinishDate = null, int $varLastSequenceNumber = null, string $varLastRequestDocumentNumber = null, string $varLastRequestDocumentDate = null)
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

                            [$varBusinessDocumentNumberingFormatRefID, 'bigint'],
                            [$varValidStartDate, 'date'],
                            [$varValidFinishDate, 'date'],
                            [$varLastSequenceNumber, 'bigint'],
                            [$varLastRequestDocumentNumber, 'varchar'],
                            [$varLastRequestDocumentDate, 'date']
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-07                                                                                           |
        | ▪ Creation Date   : 2020-12-07                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varBusinessDocumentNumberingFormatRefID ► Business Document Numbering Format Reference ID                |
        |      ▪ (string) varValidStartDate ► Valid Start Date                                                                     |
        |      ▪ (string) varValidFinishDate ► Valid Finish Date                                                                   |
        |      ▪ (int)    varLastSequenceNumber ► Last Sequence Number                                                             |
        |      ▪ (string) varLastRequestDocumentNumber ► Last Request Document Number                                              |
        |      ▪ (string) varLastRequestDocumentDate ► Last Request Document Date                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varBusinessDocumentNumberingFormatRefID = null, string $varValidStartDate = null, string $varValidFinishDate = null, int $varLastSequenceNumber = null, string $varLastRequestDocumentNumber = null, string $varLastRequestDocumentDate = null)
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

                            [$varBusinessDocumentNumberingFormatRefID, 'bigint'],
                            [$varValidStartDate, 'date'],
                            [$varValidFinishDate, 'date'],
                            [$varLastSequenceNumber, 'bigint'],
                            [$varLastRequestDocumentNumber, 'varchar'],
                            [$varLastRequestDocumentDate, 'date']                        
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }