<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCurrencyExchangeRate                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCurrencyExchangeRate                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCurrencyExchangeRate extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-02-04                                                                                           |
        | ▪ Creation Date   : 2025-02-04                                                                                           |
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
        | ▪ Last Update     : 2025-02-04                                                                                           |
        | ▪ Creation Date   : 2025-02-04                                                                                           |
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
        |      ▪ (int)    varCurrencyExchangeRateSource_RefID ► Currency Exchange Rate Source Reference ID                         |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varExchangeRate ► Exchange Rate                                                                          |
        |      ▪ (float)  varSellExchangeRate ► Sell Exchange Rate                                                                 |
        |      ▪ (float)  varBuyExchangeRate ► Buy Exchange Rate                                                                   |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        |      ▪ (string) varRegulatorDocumentNumber ► Regulator Document Number                                                   |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varCurrencyExchangeRateSource_RefID = null, int $varCurrency_RefID = null, float $varExchangeRate = null, float $varSellExchangeRate = null, float $varBuyExchangeRate = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null, string $varRegulatorDocumentNumber = null)
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

                            [$varCurrencyExchangeRateSource_RefID, 'bigint'],
                            [$varCurrency_RefID, 'bigint'],
                            [$varExchangeRate, 'numeric'],
                            [$varSellExchangeRate, 'numeric'],
                            [$varBuyExchangeRate, 'numeric'],
                            [$varValidStartDateTimeTZ, 'numeric'],
                            [$varValidFinishDateTimeTZ, 'numeric'],
                            [$varRegulatorDocumentNumber, 'varchar']
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
        | ▪ Last Update     : 2025-02-04                                                                                           |
        | ▪ Creation Date   : 2025-02-04                                                                                           |
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
        |      ▪ (int)    varCurrencyExchangeRateSource_RefID ► Currency Exchange Rate Source Reference ID                         |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varExchangeRate ► Exchange Rate                                                                          |
        |      ▪ (float)  varSellExchangeRate ► Sell Exchange Rate                                                                 |
        |      ▪ (float)  varBuyExchangeRate ► Buy Exchange Rate                                                                   |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        |      ▪ (string) varRegulatorDocumentNumber ► Regulator Document Number                                                   |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varCurrencyExchangeRateSource_RefID = null, int $varCurrency_RefID = null, float $varExchangeRate = null, float $varSellExchangeRate = null, float $varBuyExchangeRate = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null, string $varRegulatorDocumentNumber = null)
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

                            [$varCurrencyExchangeRateSource_RefID, 'bigint'],
                            [$varCurrency_RefID, 'bigint'],
                            [$varExchangeRate, 'numeric'],
                            [$varSellExchangeRate, 'numeric'],
                            [$varBuyExchangeRate, 'numeric'],
                            [$varValidStartDateTimeTZ, 'numeric'],
                            [$varValidFinishDateTimeTZ, 'numeric'],
                            [$varRegulatorDocumentNumber, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }