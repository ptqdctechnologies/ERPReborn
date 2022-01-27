<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_HumanResource                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_HumanResource
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPersonWorkTimeSheet                                                                                       |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-HumanResource ► TblPersonWorkTimeSheet                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPersonWorkTimeSheet extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Create Date     : 2021-11-01                                                                                           |
        | ▪ Last Update     : 2021-11-01                                                                                           |
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
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Create Date     : 2021-11-01                                                                                           |
        | ▪ Last Update     : 2022-01-27                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (string) varDocumentDateTimeTZ ► Document Date Time TZ                                                            |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ▪ (string) varStartDateTimeTZ ► Start Date Time TZ                                                                  |
        |      ▪ (string) varFinishDateTimeTZ ► Finish Date Time TZ                                                                |
        |      ▪ (string) varColorText ► Color Text                                                                                |
        |      ▪ (string) varColorBackground ► Color Background                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            string $varDocumentDateTimeTZ = null, int $varPerson_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varColorText = null, string $varColorBackground = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [null, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                        [$varSysBranchRefID, 'bigint'],
                        [$varDocumentDateTimeTZ, 'timestamptz'],
                        [$varPerson_RefID, 'bigint'],
                        [$varStartDateTimeTZ, 'timestamptz'],
                        [$varFinishDateTimeTZ, 'timestamptz'],
                        [$varColorText, 'varchar'],
                        [$varColorBackground, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Create Date     : 2021-11-01                                                                                           |
        | ▪ Last Update     : 2022-01-27                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (string) varDocumentDateTimeTZ ► Document Date Time TZ                                                            |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ▪ (string) varStartDateTimeTZ ► Start Date Time TZ                                                                  |
        |      ▪ (string) varFinishDateTimeTZ ► Finish Date Time TZ                                                                |
        |      ▪ (string) varColorText ► Color Text                                                                                |
        |      ▪ (string) varColorBackground ► Color Background                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            string $varDocumentDateTimeTZ = null, int $varPerson_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varColorText = null, string $varColorBackground = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_SET',
                    [
                        [$varUserSession, 'bigint'],
                        [$varSysID, 'bigint'],
                        [$varSysDataAnnotation, 'varchar'],
                        [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                        [$varSysBranchRefID, 'bigint'],
                        [$varDocumentDateTimeTZ, 'timestamptz'],
                        [$varPerson_RefID, 'bigint'],
                        [$varStartDateTimeTZ, 'timestamptz'],
                        [$varFinishDateTimeTZ, 'timestamptz'],
                        [$varColorText, 'varchar'],
                        [$varColorBackground, 'varchar']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }