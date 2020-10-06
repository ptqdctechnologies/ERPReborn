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
    | ▪ Class Name  : TblPersonBusinessTripSequence                                                                                |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-HumanResource ► TblPersonBusinessTripSequence                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPersonBusinessTripSequence extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-14                                                                                           |
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
        | ▪ Last Update     : 2020-09-14                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (bool)   varSignDataAuthentication ► Sign Data Authentication                                                     |
        |      ▪ (int)    varPersonBusinessTrip_RefID ► Person Business Trip Reference ID                                          |
        |      ▪ (int)    varSequence ► Business Trip Sequence                                                                     |
        |      ▪ (int)    varRequesterPerson_RefID ► Requester Person Reference ID                                                 |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            bool $varSignDataAuthentication = null, int $varPersonBusinessTrip_RefID = null, int $varSequence = null, int $varRequesterPerson_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null)
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
                        [$varPersonBusinessTrip_RefID, 'bigint'],
                        [$varSequence, 'smallint'],
                        [$varRequesterPerson_RefID, 'bigint'],
                        [$varStartDateTimeTZ, 'timestamptz'],
                        [$varFinishDateTimeTZ, 'timestamptz']
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
        | ▪ Last Update     : 2020-09-14                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (bool)   varSignDataAuthentication ► Sign Data Authentication                                                     |
        |      ▪ (int)    varPersonBusinessTrip_RefID ► Person Business Trip Reference ID                                          |
        |      ▪ (int)    varSequence ► Business Trip Sequence                                                                     |
        |      ▪ (int)    varRequesterPerson_RefID ► Requester Person Reference ID                                                 |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            bool $varSignDataAuthentication = null, int $varPersonBusinessTrip_RefID = null, int $varSequence = null, int $varRequesterPerson_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null)
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
                        [$varPersonBusinessTrip_RefID, 'bigint'],
                        [$varSequence, 'smallint'],
                        [$varRequesterPerson_RefID, 'bigint'],
                        [$varStartDateTimeTZ, 'timestamptz'],
                        [$varFinishDateTimeTZ, 'timestamptz']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }