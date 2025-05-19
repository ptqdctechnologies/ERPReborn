<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_CustomerRelation                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_CustomerRelation
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblSalesContractAddendumDetail                                                                               |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-CustomerRelation ► TblSalesContractAddendumDetail                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblSalesContractAddendumDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2024-05-13                                                                                           |
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
        | ▪ Last Update     : 2024-06-28                                                                                           |
        | ▪ Creation Date   : 2024-06-28                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varSalesContractAddendum_RefID ► Sales Contract Addendum Reference ID                                    |
        |      ▪ (int)    varSubTotalCurrency_RefID ► Sub Total Currency Reference ID                                              |
        |      ▪ (float)  varSubTotalCurrencyValue ► Sub Total Currency Value                                                      |
        |      ▪ (float)  varSubTotalCurrencyExchangeRate ► Sub Total Currency Exchange Rate                                       |
        |      ▪ (float)  varDiscountCurrencyValue ► Discoun tCurrency Value                                                       |
        |      ▪ (float)  varDiscountCurrencyExchangeRate ► Discount Currency Exchange Rate                                        |
        |      ▪ (float)  varTaxRate ► Tax Rate                                                                                    |
        |      ▪ (float)  varTaxCurrencyValue ► Tax Currency Value                                                                 |
        |      ▪ (float)  varTaxCurrencyExchangeRate ► Tax Currency Exchange Rate                                                  |
        |      ▪ (float)  varTotalAmountCurrencyValue ► Total Amount Currency Value                                                |
        |      ▪ (float)  varTotalAmountCurrencyExchangeRate ► Total Amount Currency Exchange Rate                                 |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varSalesContractAddendum_RefID = null, int $varSubTotalCurrency_RefID = null, float $varSubTotalCurrencyValue = null, float $varSubTotalCurrencyExchangeRate = null, float $varDiscountCurrencyValue = null, float $varDiscountCurrencyExchangeRate = null, float $varTaxRate = null, float $varTaxCurrencyValue = null, float $varTaxCurrencyExchangeRate = null, float $varTotalAmountCurrencyValue = null, float $varTotalAmountCurrencyExchangeRate = null, string $varRemarks = null
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
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varSalesContractAddendum_RefID, 'bigint'],
                            [$varSubTotalCurrency_RefID, 'bigint'],
                            [$varSubTotalCurrencyValue, ' numeric'],
                            [$varSubTotalCurrencyExchangeRate, 'numeric'],
                            [$varDiscountCurrencyValue, 'numeric'],
                            [$varDiscountCurrencyExchangeRate, 'numeric'],
                            [$varTaxRate, 'numeric'],
                            [$varTaxCurrencyValue, 'numeric'],
                            [$varTaxCurrencyExchangeRate, 'numeric'],
                            [$varTotalAmountCurrencyValue, 'numeric'],
                            [$varTotalAmountCurrencyExchangeRate, 'numeric'],
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
        | ▪ Last Update     : 2024-06-28                                                                                           |
        | ▪ Creation Date   : 2024-06-28                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varSalesContractAddendum_RefID ► Sales Contract Addendum Reference ID                                    |
        |      ▪ (int)    varSubTotalCurrency_RefID ► Sub Total Currency Reference ID                                              |
        |      ▪ (float)  varSubTotalCurrencyValue ► Sub Total Currency Value                                                      |
        |      ▪ (float)  varSubTotalCurrencyExchangeRate ► Sub Total Currency Exchange Rate                                       |
        |      ▪ (float)  varDiscountCurrencyValue ► Discoun tCurrency Value                                                       |
        |      ▪ (float)  varDiscountCurrencyExchangeRate ► Discount Currency Exchange Rate                                        |
        |      ▪ (float)  varTaxRate ► Tax Rate                                                                                    |
        |      ▪ (float)  varTaxCurrencyValue ► Tax Currency Value                                                                 |
        |      ▪ (float)  varTaxCurrencyExchangeRate ► Tax Currency Exchange Rate                                                  |
        |      ▪ (float)  varTotalAmountCurrencyValue ► Total Amount Currency Value                                                |
        |      ▪ (float)  varTotalAmountCurrencyExchangeRate ► Total Amount Currency Exchange Rate                                 |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varSalesContractAddendum_RefID = null, int $varSubTotalCurrency_RefID = null, float $varSubTotalCurrencyValue = null, float $varSubTotalCurrencyExchangeRate = null, float $varDiscountCurrencyValue = null, float $varDiscountCurrencyExchangeRate = null, float $varTaxRate = null, float $varTaxCurrencyValue = null, float $varTaxCurrencyExchangeRate = null, float $varTotalAmountCurrencyValue = null, float $varTotalAmountCurrencyExchangeRate = null, string $varRemarks = null
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
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varSalesContractAddendum_RefID, 'bigint'],
                            [$varSubTotalCurrency_RefID, 'bigint'],
                            [$varSubTotalCurrencyValue, ' numeric'],
                            [$varSubTotalCurrencyExchangeRate, 'numeric'],
                            [$varDiscountCurrencyValue, 'numeric'],
                            [$varDiscountCurrencyExchangeRate, 'numeric'],
                            [$varTaxRate, 'numeric'],
                            [$varTaxCurrencyValue, 'numeric'],
                            [$varTaxCurrencyExchangeRate, 'numeric'],
                            [$varTotalAmountCurrencyValue, 'numeric'],
                            [$varTotalAmountCurrencyExchangeRate, 'numeric'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }