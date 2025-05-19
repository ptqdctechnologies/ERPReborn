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
    | ▪ Class Name  : TblWorkTimeSchedule                                                                                          |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-HumanResource ► TblWorkTimeSchedule                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblWorkTimeSchedule extends \App\Models\Database\DefaultClassPrototype
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
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varWorkTimeEpoch_RefID ► Work Time Epoch Reference ID                                                    |
        |      ▪ (int)    varDaySequence ► Day Sequence                                                                            |
        |      ▪ (int)    varWorkDay_RefID ► Work Day Reference ID                                                                 |
        |      ▪ (string) varScheduleStartIntervalFrom00AM ► Schedule Start Interval From 00 AM                                    |
        |      ▪ (string) varScheduleFinishIntervalFrom00AM ► Schedule Finish Interval From 00 AM                                  |
        |      ▪ (string) varWorkStartIntervalFrom00AM ► Work Start Interval From 00 AM                                            |
        |      ▪ (string) varWorkFinishIntervalFrom00AM ► Work Finish Interval From 00 AM                                          |
        |      ▪ (string) varRestStartIntervalFrom00AM ► Rest Start Interval From 00 AM                                            |
        |      ▪ (string) varRestFinishIntervalFrom00AM ► Rest Finish Interval From 00 AM                                          | 
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varWorkTimeEpoch_RefID = null, int $varDaySequence = null, int $varWorkDay_RefID = null, string $varScheduleStartIntervalFrom00AM = null, string $varScheduleFinishIntervalFrom00AM = null, string $varWorkStartIntervalFrom00AM = null, string $varWorkFinishIntervalFrom00AM = null, string $varRestStartIntervalFrom00AM = null, string $varRestFinishIntervalFrom00AM = null)
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

                            [$varWorkTimeEpoch_RefID, 'bigint'],
                            [$varDaySequence, 'smallint'],
                            [$varWorkDay_RefID, 'bigint'],
                            [$varScheduleStartIntervalFrom00AM, 'interval'],
                            [$varScheduleFinishIntervalFrom00AM, 'interval'],
                            [$varWorkStartIntervalFrom00AM, 'interval'],
                            [$varWorkFinishIntervalFrom00AM, 'interval'],
                            [$varRestStartIntervalFrom00AM, 'interval'],
                            [$varRestFinishIntervalFrom00AM, 'interval']
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
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varWorkTimeEpoch_RefID ► Work Time Epoch Reference ID                                                    |
        |      ▪ (int)    varDaySequence ► Day Sequence                                                                            |
        |      ▪ (int)    varWorkDay_RefID ► Work Day Reference ID                                                                 |
        |      ▪ (string) varScheduleStartIntervalFrom00AM ► Schedule Start Interval From 00 AM                                    |
        |      ▪ (string) varScheduleFinishIntervalFrom00AM ► Schedule Finish Interval From 00 AM                                  |
        |      ▪ (string) varWorkStartIntervalFrom00AM ► Work Start Interval From 00 AM                                            |
        |      ▪ (string) varWorkFinishIntervalFrom00AM ► Work Finish Interval From 00 AM                                          |
        |      ▪ (string) varRestStartIntervalFrom00AM ► Rest Start Interval From 00 AM                                            |
        |      ▪ (string) varRestFinishIntervalFrom00AM ► Rest Finish Interval From 00 AM                                          | 
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varWorkTimeEpoch_RefID = null, int $varDaySequence = null, int $varWorkDay_RefID = null, string $varScheduleStartIntervalFrom00AM = null, string $varScheduleFinishIntervalFrom00AM = null, string $varWorkStartIntervalFrom00AM = null, string $varWorkFinishIntervalFrom00AM = null, string $varRestStartIntervalFrom00AM = null, string $varRestFinishIntervalFrom00AM = null)
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

                            [$varWorkTimeEpoch_RefID, 'bigint'],
                            [$varDaySequence, 'smallint'],
                            [$varWorkDay_RefID, 'bigint'],
                            [$varScheduleStartIntervalFrom00AM, 'interval'],
                            [$varScheduleFinishIntervalFrom00AM, 'interval'],
                            [$varWorkStartIntervalFrom00AM, 'interval'],
                            [$varWorkFinishIntervalFrom00AM, 'interval'],
                            [$varRestStartIntervalFrom00AM, 'interval'],
                            [$varRestFinishIntervalFrom00AM, 'interval']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }