<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Accounting                                                                      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2024 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Accounting
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblJournalDetail                                                                                             |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Accounting ► TblJournalDetail                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblJournalDetail extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-10                                                                                           |
        | ▪ Creation Date   : 2020-09-10                                                                                           |
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
        | ▪ Last Update     : 2024-05-02                                                                                           |
        | ▪ Creation Date   : 2020-09-10                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varJournal_RefID ► Journal Reference ID                                                                  |
        |      ▪ (string) varJournalDetailDateTimeTZ ► Journal Detail DateTimeTZ                                                   |
        |      ▪ (int)    varChartOfAccountLinkage_RefID ► Chart Of Account Linkage Reference ID                                   |
        |      ▪ (int)    varUnderlying_RefID ► Underlying Reference ID                                                            |
        |      ▪ (int)    varAccountingEntryRecordType_RefID ► Accounting Entry Record Type Reference ID                           |
        |      ▪ (int)    varAmountCurrency_RefID ► Amount Currency Reference ID                                                   |
        |      ▪ (float)  varAmountCurrencyValue ► Amount Currency Value                                                           |
        |      ▪ (float)  varAmountCurrencyExchangeRate ► Amount Currency Exchange Rate                                            |
        |      ▪ (int)    varQuantityUnit_RefID ► Reference ID                                                                     |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |      ▪ (int)    varCodeOfBudgeting_RefID ► Code Of Budgeting Reference ID                                                |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varJournal_RefID = null, string $varJournalDetailDateTimeTZ = null, int $varChartOfAccountLinkage_RefID = null, int $varUnderlying_RefID = null, int $varAccountingEntryRecordType_RefID = null, int $varAmountCurrency_RefID = null, float $varAmountCurrencyValue = null, float $varAmountCurrencyExchangeRate = null, int $varQuantityUnit_RefID = null, float $varQuantity = null, string $varAnnotation = null, int $varCodeOfBudgeting_RefID = null)
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

                            [$varJournal_RefID, 'bigint'],
                            [$varJournalDetailDateTimeTZ, 'timestamptz'],
                            [$varChartOfAccountLinkage_RefID, 'bigint'],
                            [$varUnderlying_RefID, 'bigint'],
                            [$varAccountingEntryRecordType_RefID, 'bigint'],
                            [$varAmountCurrency_RefID, 'bigint'],
                            [$varAmountCurrencyValue, 'numeric'],
                            [$varAmountCurrencyExchangeRate, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varAnnotation, 'varchar'],
                            [$varCodeOfBudgeting_RefID, 'bigint']
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
        | ▪ Last Update     : 2024-05-02                                                                                           |
        | ▪ Creation Date   : 2020-09-10                                                                                           |
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
        |      ▪ (int)    varJournal_RefID ► Journal Reference ID                                                                  |
        |      ▪ (string) varJournalDetailDateTimeTZ ► Journal Detail DateTimeTZ                                                   |
        |      ▪ (int)    varChartOfAccountLinkage_RefID ► Chart Of Account Linkage Reference ID                                   |
        |      ▪ (int)    varUnderlying_RefID ► Underlying Reference ID                                                            |
        |      ▪ (int)    varAccountingEntryRecordType_RefID ► Accounting Entry Record Type Reference ID                           |
        |      ▪ (int)    varAmountCurrency_RefID ► Amount Currency Reference ID                                                   |
        |      ▪ (float)  varAmountCurrencyValue ► Amount Currency Value                                                           |
        |      ▪ (float)  varAmountCurrencyExchangeRate ► Amount Currency Exchange Rate                                            |
        |      ▪ (int)    varQuantityUnit_RefID ► Reference ID                                                                     |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |      ▪ (int)    varCodeOfBudgeting_RefID ► Code Of Budgeting Reference ID                                                |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            int $varJournal_RefID = null, string $varJournalDetailDateTimeTZ = null, int $varChartOfAccountLinkage_RefID = null, int $varUnderlying_RefID = null, int $varAccountingEntryRecordType_RefID = null, int $varAmountCurrency_RefID = null, float $varAmountCurrencyValue = null, float $varAmountCurrencyExchangeRate = null, int $varQuantityUnit_RefID = null, float $varQuantity = null, string $varAnnotation = null, int $varCodeOfBudgeting_RefID = null)
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

                            [$varJournal_RefID, 'bigint'],
                            [$varJournalDetailDateTimeTZ, 'timestamptz'],
                            [$varChartOfAccountLinkage_RefID, 'bigint'],
                            [$varUnderlying_RefID, 'bigint'],
                            [$varAccountingEntryRecordType_RefID, 'bigint'],
                            [$varAmountCurrency_RefID, 'bigint'],
                            [$varAmountCurrencyValue, 'numeric'],
                            [$varAmountCurrencyExchangeRate, 'numeric'],
                            [$varQuantityUnit_RefID, 'bigint'],
                            [$varQuantity, 'numeric'],
                            [$varAnnotation, 'varchar'],
                            [$varCodeOfBudgeting_RefID, 'bigint']
                        ],
                        )
                    );

            return
                $varReturn;
            }
        }
    }