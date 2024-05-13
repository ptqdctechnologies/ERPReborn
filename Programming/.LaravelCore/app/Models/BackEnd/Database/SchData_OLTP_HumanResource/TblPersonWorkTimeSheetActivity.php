<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_HumanResource                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2022 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_HumanResource
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPersonWorkTimeSheetActivity                                                                               |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-HumanResource ► TblPersonWorkTimeSheetActivity                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPersonWorkTimeSheetActivity extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Create Date     : 2020-11-24                                                                                           |
        | ▪ Last Update     : 2020-11-24                                                                                           |
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
        | ▪ Create Date     : 2020-11-24                                                                                           |
        | ▪ Last Update     : 2022-02-03                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPersonWorkTimeSheet_RefID ► Person Work Time Sheet Reference ID                                       |
        |      ▪ (int)    varProjectSectionItem_RefID ► Project Section Item Reference ID                                          |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        |      ▪ (string) varActivity ► Activity                                                                                   |
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
            int $varPersonWorkTimeSheet_RefID = null, int $varProjectSectionItem_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varActivity = null, string $varColorText = null, string $varColorBackground = null)
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

                            [$varPersonWorkTimeSheet_RefID, 'bigint'],
                            [$varProjectSectionItem_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varActivity, 'varchar'],
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
        | ▪ Create Date     : 2020-11-24                                                                                           |
        | ▪ Last Update     : 2022-02-03                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPersonWorkTimeSheet_RefID ► Person Work Time Sheet Reference ID                                       |
        |      ▪ (int)    varProjectSectionItem_RefID ► Project Section Item Reference ID                                          |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        |      ▪ (string) varActivity ► Activity                                                                                   |
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
            int $varPersonWorkTimeSheet_RefID = null, int $varProjectSectionItem_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varActivity = null, string $varColorText = null, string $varColorBackground = null)
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

                            [$varPersonWorkTimeSheet_RefID, 'bigint'],
                            [$varProjectSectionItem_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varActivity, 'varchar'],
                            [$varColorText, 'varchar'],
                            [$varColorBackground, 'varchar']
                        ]
                        )
                    );
            return $varReturn['Data'][0];
            }
        }
    }