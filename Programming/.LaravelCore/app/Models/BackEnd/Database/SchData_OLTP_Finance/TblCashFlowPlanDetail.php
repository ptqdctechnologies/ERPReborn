<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCashFlowPlanDetail                                                                                        |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblCashFlowPlanDetail                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCashFlowPlanDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Create Date     : 2024-05-13                                                                                           |
        | ▪ Last Update     : 2024-05-13                                                                                           |
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
        | ▪ Last Update     : 2025-02-05                                                                                           |
        | ▪ Creation Date   : 2025-02-05                                                                                           |
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
        |      ▪ (int)    varCashFlowPlan_RefID ► Cash Flow Plan Reference ID                                                      |
        |      ▪ (int)    varCashFlowPlanItem_RefID ► Cash Flow Plan Item Reference ID                                             |
        |      ▪ (int)    varCashFlowActivityType_RefID ► Cash Flow Activity Type Reference ID                                     |
        |      ▪ (int)    varCashStreamType_RefID ► Cash Stream Type Reference ID                                                  |
        |      ▪ (int)    varAmountCurrency_RefID ► Amount Currency Reference ID                                                   |
        |      ▪ (float)  varAmountCurrencyValue ► Amount Currency Value                                                           |
        |      ▪ (float)  varAmountCurrencyExchangeRate ► Amount Currency Exchange Rate                                            |
        |      ▪ (string) varScheduledDateTimeTZ ► Scheduled DateTimeTZ                                                            |
        |      ▪ (string) varRealizationDateTimeTZ ► Realization DateTimeTZ                                                        |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varCashFlowPlan_RefID = null, int $varCashFlowPlanItem_RefID = null, int $varCashFlowActivityType_RefID = null, int $varCashStreamType_RefID = null, int $varAmountCurrency_RefID = null, float $varAmountCurrencyValue = null, float $varAmountCurrencyExchangeRate = null, string $varScheduledDateTimeTZ = null, string $varRealizationDateTimeTZ = null, string $varRemarks = null
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

                            [$varCashFlowPlan_RefID, 'bigint'],
                            [$varCashFlowPlanItem_RefID, 'bigint'],
                            [$varCashFlowActivityType_RefID, 'bigint'],
                            [$varCashStreamType_RefID, 'bigint'],
                            [$varAmountCurrency_RefID, 'bigint'],
                            [$varAmountCurrencyValue, 'numeric'],
                            [$varAmountCurrencyExchangeRate, 'numeric'],
                            [$varScheduledDateTimeTZ, 'timestamptz'],
                            [$varRealizationDateTimeTZ, 'timestamptz'],
                            [$varRemarks, 'varchar']
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
        | ▪ Last Update     : 2025-02-05                                                                                           |
        | ▪ Creation Date   : 2025-02-05                                                                                           |
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
        |      ▪ (int)    varCashFlowPlan_RefID ► Cash Flow Plan Reference ID                                                      |
        |      ▪ (int)    varCashFlowPlanItem_RefID ► Cash Flow Plan Item Reference ID                                             |
        |      ▪ (int)    varCashFlowActivityType_RefID ► Cash Flow Activity Type Reference ID                                     |
        |      ▪ (int)    varCashStreamType_RefID ► Cash Stream Type Reference ID                                                  |
        |      ▪ (int)    varAmountCurrency_RefID ► Amount Currency Reference ID                                                   |
        |      ▪ (float)  varAmountCurrencyValue ► Amount Currency Value                                                           |
        |      ▪ (float)  varAmountCurrencyExchangeRate ► Amount Currency Exchange Rate                                            |
        |      ▪ (string) varScheduledDateTimeTZ ► Scheduled DateTimeTZ                                                            |
        |      ▪ (string) varRealizationDateTimeTZ ► Realization DateTimeTZ                                                        |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varCashFlowPlan_RefID = null, int $varCashFlowPlanItem_RefID = null, int $varCashFlowActivityType_RefID = null, int $varCashStreamType_RefID = null, int $varAmountCurrency_RefID = null, float $varAmountCurrencyValue = null, float $varAmountCurrencyExchangeRate = null, string $varScheduledDateTimeTZ = null, string $varRealizationDateTimeTZ = null, string $varRemarks = null
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

                            [$varCashFlowPlan_RefID, 'bigint'],
                            [$varCashFlowPlanItem_RefID, 'bigint'],
                            [$varCashFlowActivityType_RefID, 'bigint'],
                            [$varCashStreamType_RefID, 'bigint'],
                            [$varAmountCurrency_RefID, 'bigint'],
                            [$varAmountCurrencyValue, 'numeric'],
                            [$varAmountCurrencyExchangeRate, 'numeric'],
                            [$varScheduledDateTimeTZ, 'timestamptz'],
                            [$varRealizationDateTimeTZ, 'timestamptz'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }
