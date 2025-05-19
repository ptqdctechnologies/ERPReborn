<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Production                                                                      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2024 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Production
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblProduction                                                                                                |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Production ► TblBillOfMaterialDetail                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblBillOfMaterialDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-03-23                                                                                           |
        | ▪ Creation Date   : 2021-03-23                                                                                           |
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
        | ▪ Last Update     : 2024-05-27                                                                                           |
        | ▪ Creation Date   : 2021-03-23                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varBillOfMaterial_RefID ► Bill Of Material Reference ID                                                  |
        |      ▪ (int)    varMaterialProduct_RefID ► Material Product Reference ID                                                 |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varUnitPriceCurrency_RefID ► Unit Price Currency Reference ID                                            |
        |      ▪ (float)  varUnitPriceCurrencyValue ► Unit Price Currency Value                                                    |
        |      ▪ (float)  varUnitPriceCurrencyExchangeRate ► Unit Price Currency Exchange Rate                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varBillOfMaterial_RefID = null, int $varMaterialProduct_RefID = null, float $varQuantity = null, int $varUnitPriceCurrency_RefID = null, float $varUnitPriceCurrencyExchangeRate = null, float $varUnitPriceCurrencyValue = null, int $varBillOfQuantityGroup_RefID = null)
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

                            [$varBillOfMaterial_RefID, 'bigint'],
                            [$varMaterialProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric(20,5)'],
                            [$varUnitPriceCurrency_RefID, 'bigint'],
                            [$varUnitPriceCurrencyValue, 'numeric(20,2)'],
                            [$varUnitPriceCurrencyExchangeRate, 'numeric(20,2)']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataSynchronize                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-03-23                                                                                           |
        | ▪ Creation Date   : 2021-03-23                                                                                           |
        | ▪ Description     : Data Synchronize                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataSynchronize($varUserSession)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig-Synchronize.Func_'.parent::getSchemaName($varUserSession).'_'.parent::getTableName($varUserSession),
                        []
                        )
                    );

            $varReturn = [];

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-27                                                                                           |
        | ▪ Creation Date   : 2021-03-23                                                                                           |
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
        |      ▪ (int)    varBillOfMaterial_RefID ► Bill Of Material Reference ID                                                  |
        |      ▪ (int)    varMaterialProduct_RefID ► Material Product Reference ID                                                 |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (int)    varUnitPriceCurrency_RefID ► Unit Price Currency Reference ID                                            |
        |      ▪ (float)  varUnitPriceCurrencyValue ► Unit Price Currency Value                                                    |
        |      ▪ (float)  varUnitPriceCurrencyExchangeRate ► Unit Price Currency Exchange Rate                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varBillOfMaterial_RefID = null, int $varMaterialProduct_RefID = null, float $varQuantity = null, int $varUnitPriceCurrency_RefID = null, float $varUnitPriceCurrencyExchangeRate = null, float $varUnitPriceCurrencyValue = null, int $varBillOfQuantityGroup_RefID = null)
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

                            [$varBillOfMaterial_RefID, 'bigint'],
                            [$varMaterialProduct_RefID, 'bigint'],
                            [$varQuantity, 'numeric(20,5)'],
                            [$varUnitPriceCurrency_RefID, 'bigint'],
                            [$varUnitPriceCurrencyValue, 'numeric(20,2)'],
                            [$varUnitPriceCurrencyExchangeRate, 'numeric(20,2)']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }