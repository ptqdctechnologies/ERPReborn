<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_SupplyChain                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_SupplyChain
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPurchaseOrderDetail                                                                                       |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-SupplyChain ► TblPurchaseOrderDetail                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPurchaseOrderDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-25                                                                                           |
        | ▪ Creation Date   : 2020-11-25                                                                                           |
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
        | ▪ Last Update     : 2025-01-24                                                                                           |
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
        |      ▪ (int)    varPurchaseOrder_RefID ► Purchase Order Reference ID                                                     |
        |      ▪ (int)    varPurchaseRequisitionDetail_RefID ► Purchase Requisition Detail Reference ID                            |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varProductUnitPriceValue_Currency_RefID ► Product Unit Price Value Currency Reference ID                 |
        |      ▪ (float)  varProductUnitPriceValue_CurrencyeValue ► Product Unit Price Value Currencye Value                       |
        |      ▪ (float)  varProductUnitPriceValue_CurrencyExchangeRate ► Product Unit Price Value Currency Exchange Rate          |
        |      ▪ (int)    varProductUnitPriceValueDiscount_Currency_RefID                                                          |
        |                      ► Product Unit Price Value Discount Currency Reference ID                                           |
        |      ▪ (float)  varProductUnitPriceValueDiscount_CurrencyeValue ► Product Unit Price Value Discount Currencye Value      |
        |      ▪ (float)  varProductUnitPriceValueDiscount_CurrencyExchangeRate                                                    |
        |                      ► Product Unit Price Value Discount Currency Exchange Rate                                          |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varPurchaseOrder_RefID = null, int $varPurchaseRequisitionDetail_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varProductUnitPriceValue_Currency_RefID = null, float $varProductUnitPriceValue_CurrencyeValue = null, float $varProductUnitPriceValue_CurrencyExchangeRate = null, int $varProductUnitPriceValueDiscount_Currency_RefID = null, float $varProductUnitPriceValueDiscount_CurrencyeValue = null, float $varProductUnitPriceValueDiscount_CurrencyExchangeRate = null, string $varRemarks = null
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

                            [$varPurchaseOrder_RefID, 'bigint'],
                            [$varPurchaseRequisitionDetail_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varProductUnitPriceValue_Currency_RefID, 'bigint'],
                            [$varProductUnitPriceValue_CurrencyeValue, 'numeric'],
                            [$varProductUnitPriceValue_CurrencyExchangeRate, 'numeric'],
                            [$varProductUnitPriceValueDiscount_Currency_RefID, 'bigint'],
                            [$varProductUnitPriceValueDiscount_CurrencyeValue, 'numeric'],
                            [$varProductUnitPriceValueDiscount_CurrencyExchangeRate, 'numeric'],
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-24                                                                                           |
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
        |      ▪ (int)    varPurchaseOrder_RefID ► Purchase Order Reference ID                                                     |
        |      ▪ (int)    varPurchaseRequisitionDetail_RefID ► Purchase Requisition Detail Reference ID                            |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varProductUnitPriceValue_Currency_RefID ► Product Unit Price Value Currency Reference ID                 |
        |      ▪ (float)  varProductUnitPriceValue_CurrencyeValue ► Product Unit Price Value Currencye Value                       |
        |      ▪ (float)  varProductUnitPriceValue_CurrencyExchangeRate ► Product Unit Price Value Currency Exchange Rate          |
        |      ▪ (int)    varProductUnitPriceValueDiscount_Currency_RefID                                                          |
        |                      ► Product Unit Price Value Discount Currency Reference ID                                           |
        |      ▪ (float)  varProductUnitPriceValueDiscount_CurrencyeValue ► Product Unit Price Value Discount Currencye Value      |
        |      ▪ (float)  varProductUnitPriceValueDiscount_CurrencyExchangeRate                                                    |
        |                      ► Product Unit Price Value Discount Currency Exchange Rate                                          |
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
            int $varPurchaseOrder_RefID = null, int $varPurchaseRequisitionDetail_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varProductUnitPriceValue_Currency_RefID = null, float $varProductUnitPriceValue_CurrencyeValue = null, float $varProductUnitPriceValue_CurrencyExchangeRate = null, int $varProductUnitPriceValueDiscount_Currency_RefID = null, float $varProductUnitPriceValueDiscount_CurrencyeValue = null, float $varProductUnitPriceValueDiscount_CurrencyExchangeRate = null, string $varRemarks = null
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

                            [$varPurchaseOrder_RefID, 'bigint'],
                            [$varPurchaseRequisitionDetail_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varProductUnitPriceValue_Currency_RefID, 'bigint'],
                            [$varProductUnitPriceValue_CurrencyeValue, 'numeric'],
                            [$varProductUnitPriceValue_CurrencyExchangeRate, 'numeric'],
                            [$varProductUnitPriceValueDiscount_Currency_RefID, 'bigint'],
                            [$varProductUnitPriceValueDiscount_CurrencyeValue, 'numeric'],
                            [$varProductUnitPriceValueDiscount_CurrencyExchangeRate, 'numeric'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }