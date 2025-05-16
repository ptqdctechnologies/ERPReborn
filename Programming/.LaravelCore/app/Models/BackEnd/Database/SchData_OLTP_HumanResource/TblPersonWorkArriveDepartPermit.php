<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_HumanResource                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_HumanResource
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPersonWorkArriveDepartPermit                                                                              |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-HumanResource ► TblPersonWorkArriveDepartPermit                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPersonWorkArriveDepartPermit extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-24                                                                                           |
        | ▪ Creation Date   : 2020-11-24                                                                                           |
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
        | ▪ Last Update     : 2020-11-24                                                                                           |
        | ▪ Creation Date   : 2020-11-24                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                           |
        |        ----------------------------------------                                                                          |
        |      ▪ (bool)   varSignDataAuthentication ► Sign Data Authentication                                                     |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ▪ (int)    varWorkArriveDepartPermit_RefID ► Work Arrive Depart Permit Reference ID                                 |
        |      ▪ (string) varPermitDate ► Permit Date                                                                              |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varSignDataAuthentication = null, int $varPerson_RefID = null, int $varWorkArriveDepartPermit_RefID = null, string $varPermitDate = null, string $varAnnotation = null)
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

                            [$varSignDataAuthentication, 'boolean'],
                            [$varPerson_RefID, 'bigint'],
                            [$varWorkArriveDepartPermit_RefID, 'bigint'],
                            [$varPermitDate, 'date'],
                            [$varAnnotation, 'varchar']
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
        | ▪ Last Update     : 2020-11-24                                                                                           |
        | ▪ Creation Date   : 2020-11-24                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                           |
        |        ----------------------------------------                                                                          |
        |      ▪ (bool)   varSignDataAuthentication ► Sign Data Authentication                                                     |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ▪ (int)    varWorkArriveDepartPermit_RefID ► Work Arrive Depart Permit Reference ID                                 |
        |      ▪ (string) varPermitDate ► Permit Date                                                                              |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varSignDataAuthentication = null, int $varPerson_RefID = null, int $varWorkArriveDepartPermit_RefID = null, string $varPermitDate = null, string $varAnnotation = null)
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

                            [$varSignDataAuthentication, 'boolean'],
                            [$varPerson_RefID, 'bigint'],
                            [$varWorkArriveDepartPermit_RefID, 'bigint'],
                            [$varPermitDate, 'date'],
                            [$varAnnotation, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }