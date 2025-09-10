<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblAdvanceSettlementDetail                                                                                   |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblAdvanceSettlementDetail                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblAdvanceSettlementDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-10-25                                                                                           |
        | ▪ Creation Date   : 2023-10-25                                                                                           |
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
        | ▪ Version         : 1.0001.000000                                                                                        |
        | ▪ Last Update     : 2025-01-10                                                                                           |
        | ▪ Creation Date   : 2023-10-25                                                                                           |
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
        |      ▪ (int)    varAdvanceSettlement_RefID ► Advance Settlement Reference ID                                             |
        |      ▪ (int)    varAdvanceDetail_RefID ► Advance Detail Reference ID                                                     |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varExpenseClaimProductUnitPriceCurrency_RefID ► Expense Claim Product Unit Price Currency Reference ID   |
        |      ▪ (float)  varExpenseClaimProductUnitPriceCurrencyValue ► Expense Claim Product Unit Price Currency Value           |
        |      ▪ (float)  varExpenseClaimProductUnitPriceCurrencyExchangeRate ►                                                    |
        |                       Expense Claim Product Unit Price Currency Exchange Rate                                            |
        |      ▪ (int)    varReturnProductUnitPriceCurrency_RefID ► Return Product Unit Price Currency Reference ID                |
        |      ▪ (float)  varReturnProductUnitPriceCurrencyValue ► Return Product Unit Price Currency Value                        |
        |      ▪ (float)  varReturnProductUnitPriceCurrencyExchangeRate ► Return Product Unit Price Currency Exchange Rate         |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varAdvanceSettlement_RefID = null, int $varAdvanceDetail_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varExpenseClaimProductUnitPriceCurrency_RefID = null, float $varExpenseClaimProductUnitPriceCurrencyValue = null, float $varExpenseClaimProductUnitPriceCurrencyExchangeRate = null, int $varReturnProductUnitPriceCurrency_RefID = null, float $varReturnProductUnitPriceCurrencyValue = null, float $varReturnProductUnitPriceCurrencyExchangeRate = null, string $varRemarks = null
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

                            [$varAdvanceSettlement_RefID, 'bigint'],
                            [$varAdvanceDetail_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varExpenseClaimProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varExpenseClaimProductUnitPriceCurrencyValue, 'numeric'],
                            [$varExpenseClaimProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varReturnProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varReturnProductUnitPriceCurrencyValue, 'numeric'],
                            [$varReturnProductUnitPriceCurrencyExchangeRate, 'numeric'],
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
        | ▪ Version         : 1.0001.000000                                                                                        |
        | ▪ Last Update     : 2025-01-10                                                                                           |
        | ▪ Creation Date   : 2023-10-25                                                                                           |
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
        |      ▪ (int)    varAdvanceSettlement_RefID ► Advance Settlement Reference ID                                             |
        |      ▪ (int)    varAdvanceDetail_RefID ► Advance Detail Reference ID                                                     |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varExpenseClaimProductUnitPriceCurrency_RefID ► Expense Claim Product Unit Price Currency Reference ID   |
        |      ▪ (float)  varExpenseClaimProductUnitPriceCurrencyValue ► Expense Claim Product Unit Price Currency Value           |
        |      ▪ (float)  varExpenseClaimProductUnitPriceCurrencyExchangeRate ►                                                    |
        |                       Expense Claim Product Unit Price Currency Exchange Rate                                            |
        |      ▪ (int)    varReturnProductUnitPriceCurrency_RefID ► Return Product Unit Price Currency Reference ID                |
        |      ▪ (float)  varReturnProductUnitPriceCurrencyValue ► Return Product Unit Price Currency Value                        |
        |      ▪ (float)  varReturnProductUnitPriceCurrencyExchangeRate ► Return Product Unit Price Currency Exchange Rate         |
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
            int $varAdvanceSettlement_RefID = null, int $varAdvanceDetail_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varExpenseClaimProductUnitPriceCurrency_RefID = null, float $varExpenseClaimProductUnitPriceCurrencyValue = null, float $varExpenseClaimProductUnitPriceCurrencyExchangeRate = null, int $varReturnProductUnitPriceCurrency_RefID = null, float $varReturnProductUnitPriceCurrencyValue = null, float $varReturnProductUnitPriceCurrencyExchangeRate = null, string $varRemarks = null
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

                            [$varAdvanceSettlement_RefID, 'bigint'],
                            [$varAdvanceDetail_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varExpenseClaimProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varExpenseClaimProductUnitPriceCurrencyValue, 'numeric'],
                            [$varExpenseClaimProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varReturnProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varReturnProductUnitPriceCurrencyValue, 'numeric'],
                            [$varReturnProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }