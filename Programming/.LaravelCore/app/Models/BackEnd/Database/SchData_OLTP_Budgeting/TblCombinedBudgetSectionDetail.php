<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Budgeting                                                                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2026 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Budgeting
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCombinedBudgetSectionDetail                                                                               |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Budgeting ► TblCombinedBudgetSectionDetail                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCombinedBudgetSectionDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-10                                                                                           |
        | ▪ Creation Date   : 2022-01-10                                                                                           |
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-19                                                                                           |
        | ▪ Creation Date   : 2021-06-14                                                                                           |
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
        |      ▪ (int)    varVersion ► Version                                                                                     |
        |      ▪ (int)    varCombinedBudget_RefID ► Combined Budget Reference ID                                                   |
        |      ▪ (int)    varCombinedBudgetSection_RefID ► Combined Budget Section Reference ID                                    |
        |      ▪ (int)    varCombinedBudgetSubSectionLevel1_RefID ► Combined Budget Sub Section Level 1 Reference ID               |
        |      ▪ (int)    varCombinedBudgetSubSectionLevel2_RefID ► Combined Budget Sub Section Level 2 Reference ID               |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (string) varDescription ► Product Description                                                                     |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varUnitPriceCurrency_RefID ► Unit Price Currency Reference ID                                            |
        |      ▪ (float)  varUnitPriceCurrencyValue ► Unit Price Currency Value                                                    |
        |      ▪ (float)  varUnitPriceCurrencyExchangeRate ► Unit Price Currency Exchange Rate                                     |
        |      ▪ (int)    varWork_RefID ► Work Reference ID                                                                        |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varVersion = null, int $varCombinedBudget_RefID = null, int $varCombinedBudgetSection_RefID = null, int $varCombinedBudgetSubSectionLevel1_RefID = null, int $varCombinedBudgetSubSectionLevel2_RefID = null, int $varProduct_RefID = null, string $varDescription = null, float$varQuantity = null, int $varQuantityUnit_RefID = null, int $varUnitPriceCurrency_RefID = null, float $varUnitPriceCurrencyValue = null, float$varUnitPriceCurrencyExchangeRate = null, int $varWork_RefID = null
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

                            [$varVersion, 'smallint'],
                            [$varCombinedBudget_RefID, 'bigint'],
                            [$varCombinedBudgetSection_RefID, 'bigint'],
                            [$varCombinedBudgetSubSectionLevel1_RefID, 'bigint'],
                            [$varCombinedBudgetSubSectionLevel2_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varDescription, 'varchar'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varUnitPriceCurrency_RefID, 'bigint'],
                            [$varUnitPriceCurrencyValue, 'numeric'],
                            [$varUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varWork_RefID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataMergeModify                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-18                                                                                           |
        | ▪ Creation Date   : 2026-11-18                                                                                           |
        | ▪ Description     : Data Merge And Modify                                                                                |
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
        |      ▪ (string) varJSONData ► JSON Data                                                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataMergeModify(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            array $varJSONData = null
            )
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession).'.Func_'.parent::getTableName($varUserSession).'_MERGE_MODIFY',
                        [
                            [$varUserSession, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession,
                                $varJSONData
                                ),
                            'json'
                            ]
                        ]
                        )
                    );

            //var_dump($varReturn['data'][0]);
            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-19                                                                                           |
        | ▪ Creation Date   : 2021-06-14                                                                                           |
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
        |      ▪ (int)    varVersion ► Version                                                                                     |
        |      ▪ (int)    varCombinedBudget_RefID ► Combined Budget Reference ID                                                   |
        |      ▪ (int)    varCombinedBudgetSection_RefID ► Combined Budget Section Reference ID                                    |
        |      ▪ (int)    varCombinedBudgetSubSectionLevel1_RefID ► Combined Budget Sub Section Level 1 Reference ID               |
        |      ▪ (int)    varCombinedBudgetSubSectionLevel2_RefID ► Combined Budget Sub Section Level 2 Reference ID               |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (string) varDescription ► Product Description                                                                     |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varUnitPriceCurrency_RefID ► Unit Price Currency Reference ID                                            |
        |      ▪ (float)  varUnitPriceCurrencyValue ► Unit Price Currency Value                                                    |
        |      ▪ (float)  varUnitPriceCurrencyExchangeRate ► Unit Price Currency Exchange Rate                                     |
        |      ▪ (int)    varWork_RefID ► Work Reference ID                                                                        |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varVersion = null, int $varCombinedBudget_RefID = null, int $varCombinedBudgetSection_RefID = null, int $varCombinedBudgetSubSectionLevel1_RefID = null, int $varCombinedBudgetSubSectionLevel2_RefID = null, int $varProduct_RefID = null, string $varDescription = null, float$varQuantity = null, int $varQuantityUnit_RefID = null, int $varUnitPriceCurrency_RefID = null, float $varUnitPriceCurrencyValue = null, float$varUnitPriceCurrencyExchangeRate = null, int $varWork_RefID = null
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

                            [$varVersion, 'smallint'],
                            [$varCombinedBudget_RefID, 'bigint'],
                            [$varCombinedBudgetSection_RefID, 'bigint'],
                            [$varCombinedBudgetSubSectionLevel1_RefID, 'bigint'],
                            [$varCombinedBudgetSubSectionLevel2_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varDescription, 'varchar'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varUnitPriceCurrency_RefID, 'bigint'],
                            [$varUnitPriceCurrencyValue, 'numeric'],
                            [$varUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varWork_RefID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }