<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Project                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Project {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setProjectProgress                                                                                           |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Project ► setProjectProgress                                        |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblProjectProgress extends \App\Models\Database\DefaultClassPrototype
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-09-24                                                                                           |
        | ▪ Creation Date   : 2026-09-24                                                                                           |
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
        | ▪ Last Update     : 2026-09-24                                                                                           |
        | ▪ Creation Date   : 2026-09-24                                                                                           |
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
        |      ▪ (string) varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varStartDateTimeTZ ► Progress Start Date Time TZ                                                         |
        |      ▪ (string) varFinishDateTimeTZ ► Progress Finish Date Time TZ                                                       |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |        ----------------------------------------                                                                          |        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null,
            string $varSysDataValidityStartDateTimeTZ = null,
            string $varSysDataValidityFinishDateTimeTZ = null,
            int $varSysPartitionRemovableRecordKeyRefType = null,
            int $varSysBranch_RefID = null,
            $varSysBaseCurrency_RefID = null,
            int $varProject_RefID = null,
            string $varStartDateTimeTZ = null,
            $varFinishDateTimeTZ = null,
            string $varAnnotation = null,
            array $varAdditionalData = []
        ) {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession) . '.Func_' . parent::getTableName($varUserSession) . '_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [null, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varProject_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varAnnotation, 'varchar'],

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
                $varReturn;
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-09-24                                                                                           |
        | ▪ Creation Date   : 2026-09-24                                                                                           |
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
        |      ▪ (string) varProject_RefID ► Project Reference ID                                                                  |
        |      ▪ (string) varStartDateTimeTZ ► Progress Start Date Time TZ                                                         |
        |      ▪ (string) varFinishDateTimeTZ ► Progress Finish Date Time TZ                                                       |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |        ----------------------------------------                                                                          |        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null,
            string $varSysDataValidityStartDateTimeTZ = null,
            string $varSysDataValidityFinishDateTimeTZ = null,
            int $varSysPartitionRemovableRecordKeyRefType = null,
            int $varSysBranch_RefID = null,
            $varSysBaseCurrency_RefID = null,
            int $varProject_RefID = null,
            string $varStartDateTimeTZ = null,
            $varFinishDateTimeTZ = null,
            string $varAnnotation = null,
            array $varAdditionalData = []
        ) {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession) . '.Func_' . parent::getTableName($varUserSession) . '_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [$varSysID, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varProject_RefID, 'bigint'],
                            [$varStartDateTimeTZ, 'timestamptz'],
                            [$varFinishDateTimeTZ, 'timestamptz'],
                            [$varAnnotation, 'varchar'],

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
                $varReturn;
        }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_ProjectProgressDetail                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-10-09                                                                                           |
        | ▪ Creation Date   : 2026-10-09                                                                                           |
        | ▪ Description     : Mendapatkan Data List Project Progress Detail                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    projectProgressRefID ► Branch ID                                                                         |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_ProjectProgressDetail(
            $varUserSession,
            int $projectProgressRefID
        ) {
            try {
                if ($projectProgressRefID <= 0) {
                    throw new \InvalidArgumentException(
                        'Invalid projectProgress_RefID'
                    );
                }

                $varQueryResult =
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchData-OLTP-Project.Func_GetDataList_ProjectProgressDetail',
                            [
                                [$projectProgressRefID, 'bigint']
                            ]
                        )
                    );

                if (
                    !is_array($varQueryResult) ||
                    !isset($varQueryResult['data']) ||
                    !is_array($varQueryResult['data']) ||
                    !isset($varQueryResult['data'][0]) ||
                    !is_array($varQueryResult['data'][0]) ||
                    !array_key_exists(
                        'Func_GetDataList_ProjectProgressDetail',
                        $varQueryResult['data'][0]
                    )
                ) {
                    throw new \UnexpectedValueException(
                        'Invalid Stored Procedure result structure'
                    );
                }

                $varRawData =
                    $varQueryResult['data'][0]
                    ['Func_GetDataList_ProjectProgressDetail'];

                if (is_string($varRawData)) {
                    $varDecodedData = json_decode(
                        $varRawData,
                        true,
                        512,
                        JSON_THROW_ON_ERROR
                    );
                } elseif (is_array($varRawData)) {
                    $varDecodedData = $varRawData;
                } elseif (is_object($varRawData)) {
                    $varDecodedData = json_decode(
                        json_encode(
                            $varRawData,
                            JSON_THROW_ON_ERROR
                        ),
                        true,
                        512,
                        JSON_THROW_ON_ERROR
                    );
                } elseif ($varRawData === null) {
                    throw new \UnexpectedValueException(
                        'Stored Procedure returned NULL'
                    );
                } else {
                    throw new \UnexpectedValueException(
                        'Unsupported Stored Procedure result type: ' .
                        gettype($varRawData)
                    );
                }

                if (!is_array($varDecodedData)) {
                    throw new \UnexpectedValueException(
                        'Decoded ProjectProgress data is not an array'
                    );
                }

                $varQueryResult['data'] = $varDecodedData;

                return $varQueryResult;

            } catch (\Throwable $ex) {
                throw $ex;
            }
        }
    }
}