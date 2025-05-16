<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Budgeting                                                                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Budgeting
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblBudgetExpenseLineCeilingObjects                                                                           |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Budgeting ► TblBudgetExpenseLineCeilingObjects                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblBudgetExpenseLineCeilingObjects extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-06-18                                                                                           |
        | ▪ Last Update     : 2021-06-18                                                                                           |
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
        | ▪ Creation Date   : 2021-06-18                                                                                           |
        | ▪ Last Update     : 2021-06-18                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varBudgetExpenseLineCeiling_RefID ► Budget Expense Ceiling Reference ID                                  |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varProductUnitPriceCurrency_RefID ► Product Unit Price Currency Reference ID                             |
        |      ▪ (float)  varProductUnitPriceCurrencyExchangeRate ► Product Unit Price Currency Exchange Rate                      |
        |      ▪ (float)  varProductUnitPriceCurrencyValue ► Product Unit Price Currency Value                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varBudgetExpenseLineCeiling_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varProductUnitPriceCurrency_RefID = null, float $varProductUnitPriceCurrencyExchangeRate = null, float $varProductUnitPriceCurrencyValue = null)
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

                            [$varBudgetExpenseLineCeiling_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varProductUnitPriceCurrencyValue, 'numeric']
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Creation Date   : 2021-06-18                                                                                           |
        | ▪ Last Update     : 2021-06-16                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varBudgetExpenseLineCeiling_RefID ► Budget Expense Ceiling Reference ID                                  |
        |      ▪ (int)    varProduct_RefID ► Product Reference ID                                                                  |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varQuantityUnit_RefID ► Quantity Unit Reference ID                                                       |
        |      ▪ (int)    varProductUnitPriceCurrency_RefID ► Product Unit Price Currency Reference ID                             |
        |      ▪ (float)  varProductUnitPriceCurrencyExchangeRate ► Product Unit Price Currency Exchange Rate                      |
        |      ▪ (float)  varProductUnitPriceCurrencyValue ► Product Unit Price Currency Value                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varBudgetExpenseLineCeiling_RefID = null, int $varProduct_RefID = null, float $varQuantity = null, int $varQuantityUnit_RefID = null, int $varProductUnitPriceCurrency_RefID = null, float $varProductUnitPriceCurrencyExchangeRate = null, float $varProductUnitPriceCurrencyValue = null)
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

                            [$varBudgetExpenseLineCeiling_RefID, 'bigint'],
                            [$varProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varProductUnitPriceCurrency_RefID, 'bigint'],
                            [$varProductUnitPriceCurrencyExchangeRate, 'numeric'],
                            [$varProductUnitPriceCurrencyValue, 'numeric']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }