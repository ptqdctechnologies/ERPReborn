<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_HumanResource                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2022 Zheta (teguhpjs@gmail.com)                                                                              |
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
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Create Date     : 2021-11-01                                                                                           |
        | ▪ Last Update     : 2022-01-28                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varDocumentDateTimeTZ ► Document Date Time TZ                                                            |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ▪ (string) varStartDateTimeTZ ► Start Date Time TZ                                                                  |
        |      ▪ (string) varFinishDateTimeTZ ► Finish Date Time TZ                                                                |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varColorText ► Color Text                                                                                |
        |      ▪ (string) varColorBackground ► Color Background                                                                    |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            string $varDocumentNumber = null, string $varDocumentDateTimeTZ = null, int $varPerson_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, int $varProject_RefID = null, string $varColorText = null, string $varColorBackground = null, array $varAdditionalData = [])
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

                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varPerson_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varProject_RefID, 'bigint'],
                            [$varColorText, 'varchar'],
                            [$varColorBackground, 'varchar'],

                            [
                                ((count($varAdditionalData) === 0) 
                                    ? null
                                    : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                        $varUserSession,
                                        $varAdditionalData
                                        )
                                ),
                                'json'
                            ]
                        ]
                        )
                    );

            return $varReturn['data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Create Date     : 2021-11-01                                                                                           |
        | ▪ Last Update     : 2022-01-28                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varDocumentDateTimeTZ ► Document Date Time TZ                                                            |
        |      ▪ (int)    varPerson_RefID ► Person Reference ID                                                                    |
        |      ▪ (string) varStartDateTimeTZ ► Start Date Time TZ                                                                  |
        |      ▪ (string) varFinishDateTimeTZ ► Finish Date Time TZ                                                                |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varColorText ► Color Text                                                                                |
        |      ▪ (string) varColorBackground ► Color Background                                                                    |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varPerson_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, int $varProject_RefID = null, string $varColorText = null, string $varColorBackground = null)
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
 
                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varPerson_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varProject_RefID, 'bigint'],
                            [$varColorText, 'varchar'],
                            [$varColorBackground, 'varchar']
                        ]
                        )
                    );

            return $varReturn['data'][0];
            }
        }
    }