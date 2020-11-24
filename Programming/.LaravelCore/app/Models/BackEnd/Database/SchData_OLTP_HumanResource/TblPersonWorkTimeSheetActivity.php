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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-24                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (bool)   varSignDataAuthentication ► Sign Data Authentication                                                     |
        |      ▪ (int)    varPersonWorkTimeSheet_RefID ► Person Work Time Sheet Reference ID                                       |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (int)    varProjectSite_RefID ► Project Site Reference ID                                                         |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        |      ▪ (string) varActivity ► Activity                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            bool $varSignDataAuthentication = null, int $varPersonWorkTimeSheet_RefID = null, int $varProject_RefID = null, int $varProjectSite_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varActivity = null)
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
                        [$varSignDataAuthentication, 'boolean'],
                        [$varPersonWorkTimeSheet_RefID, 'bigint'],
                        [$varProject_RefID, 'bigint'],
                        [$varProjectSite_RefID, 'bigint'],
                        [$varStartDateTimeTZ, 'timestamptz'],
                        [$varFinishDateTimeTZ, 'timestamptz'],
                        [$varActivity, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-24                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (bool)   varSignDataAuthentication ► Sign Data Authentication                                                     |
        |      ▪ (int)    varPersonWorkTimeSheet_RefID ► Person Work Time Sheet Reference ID                                       |
        |      ▪ (int)    varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (int)    varProjectSite_RefID ► Project Site Reference ID                                                         |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        |      ▪ (string) varActivity ► Activity                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            bool $varSignDataAuthentication = null, int $varPersonWorkTimeSheet_RefID = null, int $varProject_RefID = null, int $varProjectSite_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varActivity = null)
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
                        [$varSignDataAuthentication, 'boolean'],
                        [$varPersonWorkTimeSheet_RefID, 'bigint'],
                        [$varProject_RefID, 'bigint'],
                        [$varProjectSite_RefID, 'bigint'],
                        [$varStartDateTimeTZ, 'timestamptz'],
                        [$varFinishDateTimeTZ, 'timestamptz'],
                        [$varActivity, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }