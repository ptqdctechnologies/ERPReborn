<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_SupplyChain                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_SupplyChain
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPurchaseOrderPaymentTerm                                                                                  |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-SupplyChain ► TblPurchaseOrderPaymentTerm                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPurchaseOrderPaymentTerm extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Create Date     : 2022-04-16                                                                                           |
        | ▪ Last Update     : 2022-04-16                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Creation Date   : 2022-04-18                                                                                           |
        | ▪ Last Update     : 2022-04-20                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPurchaseOrder_RefID ► Purchase Order Reference ID                                                     |
        |      ▪ (int)    varPaymentTerm_RefID ► Payment Term Reference ID                                                         |
        |      ▪ (int)    varDueDays ► Due Days                                                                                    |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varCurrencyValue ► Currency Value                                                                        |
        |      ▪ (float)  varCurrencyExchangeRate ► Currency Exchange Rate                                                         |
        |      ▪ (float)  varBaseCurrencyValue ► Base Currency Value                                                               |
        |      ▪ (int)    varDiscountDueDays ► Discount Due Days                                                                   |
        |      ▪ (float)  varDiscountPercentageRate ► Discount Percentage Rate                                                     |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null, int $varSysBaseCurrency_RefID = null,
            int $varPurchaseOrder_RefID = null, int $varPaymentTerm_RefID = null, int $varDueDays = null, int $varCurrency_RefID = null, float $varCurrencyValue = null, float $varCurrencyExchangeRate = null, string $varBaseCurrencyValue = null, int $varDiscountDueDays = null, float $varDiscountPercentageRate = null, string $varRemarks = null)
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
                        [$varSysBranch_RefID, 'bigint'],
                        [$varSysBaseCurrency_RefID, 'bigint'],
                        
                        [$varPurchaseOrder_RefID, 'bigint'],
                        [$varPaymentTerm_RefID, 'bigint'],
                        [$varDueDays, 'timestamptz'],
                        [$varCurrency_RefID, 'bigint'],
                        [$varCurrencyValue, 'numeric'],
                        [$varCurrencyExchangeRate, 'numeric'],
                        [$varBaseCurrencyValue, 'numeric'],
                        [$varDiscountDueDays, 'timestamptz'],
                        [$varDiscountPercentageRate, 'numeric'],
                        [$varRemarks, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Creation Date   : 2022-04-18                                                                                           |
        | ▪ Last Update     : 2022-04-20                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPurchaseOrder_RefID ► Purchase Order Reference ID                                                     |
        |      ▪ (int)    varPaymentTerm_RefID ► Payment Term Reference ID                                                         |
        |      ▪ (int)    varDueDays ► Due Days                                                                                    |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varCurrencyValue ► Currency Value                                                                        |
        |      ▪ (float)  varCurrencyExchangeRate ► Currency Exchange Rate                                                         |
        |      ▪ (float)  varBaseCurrencyValue ► Base Currency Value                                                               |
        |      ▪ (int)    varDiscountDueDays ► Discount Due Days                                                                   |
        |      ▪ (float)  varDiscountPercentageRate ► Discount Percentage Rate                                                     |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null, int $varSysBaseCurrency_RefID = null,
            int $varPurchaseOrder_RefID = null, int $varPaymentTerm_RefID = null, int $varDueDays = null, int $varCurrency_RefID = null, float $varCurrencyValue = null, float $varCurrencyExchangeRate = null, string $varBaseCurrencyValue = null, int $varDiscountDueDays = null, float $varDiscountPercentageRate = null, string $varRemarks = null)
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
                        [$varSysBranch_RefID, 'bigint'],
                        [$varSysBaseCurrency_RefID, 'bigint'],

                        [$varPurchaseOrder_RefID, 'bigint'],
                        [$varPaymentTerm_RefID, 'bigint'],
                        [$varDueDays, 'timestamptz'],
                        [$varCurrency_RefID, 'bigint'],
                        [$varCurrencyValue, 'numeric'],
                        [$varCurrencyExchangeRate, 'numeric'],
                        [$varBaseCurrencyValue, 'numeric'],
                        [$varDiscountDueDays, 'timestamptz'],
                        [$varDiscountPercentageRate, 'numeric'],
                        [$varRemarks, 'varchar']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }