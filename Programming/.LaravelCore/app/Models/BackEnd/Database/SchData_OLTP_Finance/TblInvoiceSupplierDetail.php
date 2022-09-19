<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblInvoiceSupplierDetail                                                                                     |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblInvoiceSupplierDetail                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblInvoiceSupplierDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-16                                                                                           |
        | ▪ Creation Date   : 2022-09-16                                                                                           |
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
        | ▪ Last Update     : 2022-09-16                                                                                           |
        | ▪ Creation Date   : 2022-09-16                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varInvoiceSupplier_RefID ► Combined Budget Section Detail Reference ID                                   |
        |      ▪ (int)    varPurchaseOrderDetail_RefID ► Product Reference ID                                                      |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varPriceCurrency_RefID ► Price Currency Reference ID                                                     |
        |      ▪ (float)  varPriceCurrencyValue ► Price Currency Value                                                             |
        |      ▪ (float)  varPriceCurrencyExchangeRate ► Price Currency Exchange Rate                                              |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varInvoiceSupplier_RefID = null, int $varPurchaseOrderDetail_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantity_RefID = null, int $varPriceCurrency_RefID = null, int $varPriceCurrencyValue = null, float $varPriceCurrencyExchangeRate = null, string $varRemarks = null)
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
                        
                        [$varInvoiceSupplier_RefID, 'bigint'],
                        [$varPurchaseOrderDetail_RefID, 'bigint'],
                        [$varProduct_RefID, 'bigint'],
                        [$varQuantity, 'numeric'],
                        [$varQuantity_RefID, 'bigint'],
                        [$varPriceCurrency_RefID, 'bigint'],
                        [$varPriceCurrencyValue, 'numeric'],
                        [$varPriceCurrencyExchangeRate, 'numeric'],
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-05-17                                                                                           |
        | ▪ Creation Date   : 2022-05-17                                                                                           |
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
        |      ▪ (int)    varInvoiceSupplier_RefID ► Combined Budget Section Detail Reference ID                                   |
        |      ▪ (int)    varPurchaseOrderDetail_RefID ► Product Reference ID                                                      |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varPriceCurrency_RefID ► Price Currency Reference ID                                                     |
        |      ▪ (float)  varPriceCurrencyValue ► Price Currency Value                                                             |
        |      ▪ (float)  varPriceCurrencyExchangeRate ► Price Currency Exchange Rate                                              |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varInvoiceSupplier_RefID = null, int $varPurchaseOrderDetail_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantity_RefID = null, int $varPriceCurrency_RefID = null, int $varPriceCurrencyValue = null, float $varPriceCurrencyExchangeRate = null, string $varRemarks = null)
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
                        
                        [$varInvoiceSupplier_RefID, 'bigint'],
                        [$varPurchaseOrderDetail_RefID, 'bigint'],
                        [$varProduct_RefID, 'bigint'],
                        [$varQuantity, 'numeric'],
                        [$varQuantity_RefID, 'bigint'],
                        [$varPriceCurrency_RefID, 'bigint'],
                        [$varPriceCurrencyValue, 'numeric'],
                        [$varPriceCurrencyExchangeRate, 'numeric'],
                        [$varRemarks, 'varchar']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }