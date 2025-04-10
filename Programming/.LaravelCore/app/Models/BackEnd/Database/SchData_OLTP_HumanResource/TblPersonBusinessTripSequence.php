<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_HumanResource                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
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
        | ▪ Creation Date   : 2020-09-14                                                                                           |
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
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2020-09-14                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysDataValidityStartDateTimeTZ ► System Data Validity Start DateTimeTZ                                |
        |      ▪ (string) varSysDataValidityFinishDateTimeTZ ► System Validity Finish DateTimeTZ                                   |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPersonBusinessTrip_RefID ► Person Business Trip Reference ID                                          |
        |      ▪ (int)    varSequence ► Business Trip Sequence                                                                     |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Person Reference ID                                     |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        |      ▪ (string) varDeparturePoint ► Departure Point                                                                      |
        |      ▪ (string) varDestinationPoint ► Destination Point                                                                  |
        |      ▪ (string) varReasonToTravel ► Reason To Travel                                                                     |
        |      ▪ (int)    varBusinessTripAccommodationArrangementsType_RefID ► Business Trip Accommodation Arrangements Type       |
        |                                                                      Reference ID                                        |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varPersonBusinessTrip_RefID = null, int $varSequence = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterWorkerJobsPosition_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varDeparturePoint = null, string $varDestinationPoint = null, string $varReasonToTravel = null, int $varBusinessTripAccommodationArrangementsType_RefID = null, string $varRemarks = null,
            array $varAdditionalData = []
            )
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
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varPersonBusinessTrip_RefID, 'bigint'],
                            [$varSequence, 'smallint'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varRequesterWorkerJobsPosition_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varDeparturePoint, 'varchar'],
                            [$varDestinationPoint, 'varchar'],
                            [$varReasonToTravel, 'varchar'],
                            [$varBusinessTripAccommodationArrangementsType_RefID, 'bigint'],
                            [$varRemarks, 'varchar'],

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

            return
                $varReturn['data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2020-09-14                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysDataValidityStartDateTimeTZ ► System Data Validity Start DateTimeTZ                                |
        |      ▪ (string) varSysDataValidityFinishDateTimeTZ ► System Validity Finish DateTimeTZ                                   |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPersonBusinessTrip_RefID ► Person Business Trip Reference ID                                          |
        |      ▪ (int)    varSequence ► Business Trip Sequence                                                                     |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Person Reference ID                                     |
        |      ▪ (string) varStartDateTimeTZ ► Start DateTimeTZ                                                                    |
        |      ▪ (string) varFinishDateTimeTZ ► Finish DateTimeTZ                                                                  |
        |      ▪ (string) varDeparturePoint ► Departure Point                                                                      |
        |      ▪ (string) varDestinationPoint ► Destination Point                                                                  |
        |      ▪ (string) varReasonToTravel ► Reason To Travel                                                                     |
        |      ▪ (int)    varBusinessTripAccommodationArrangementsType_RefID ► Business Trip Accommodation Arrangements Type       |
        |                                                                      Reference ID                                        |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varPersonBusinessTrip_RefID = null, int $varSequence = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterWorkerJobsPosition_RefID = null, string $varStartDateTimeTZ = null, string $varFinishDateTimeTZ = null, string $varDeparturePoint = null, string $varDestinationPoint = null, string $varReasonToTravel = null, int $varBusinessTripAccommodationArrangementsType_RefID = null, string $varRemarks = null,
            array $varAdditionalData = []
            )
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
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varPersonBusinessTrip_RefID, 'bigint'],
                            [$varSequence, 'smallint'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varRequesterWorkerJobsPosition_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varDeparturePoint, 'varchar'],
                            [$varDestinationPoint, 'varchar'],
                            [$varReasonToTravel, 'varchar'],
                            [$varBusinessTripAccommodationArrangementsType_RefID, 'bigint'],
                            [$varRemarks, 'varchar'],

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

            return
                $varReturn['data'][0];
            }
        }
    }