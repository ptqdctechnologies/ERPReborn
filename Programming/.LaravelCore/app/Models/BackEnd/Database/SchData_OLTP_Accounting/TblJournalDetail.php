<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Accounting                                                                      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
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
        | ▪ Last Update     : 2020-09-10                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (bool)   varSignDataAuthentication ► SignDataAuthentication                                                       |
        |      ▪ (int)    varJournal_RefID ► Journal Reference ID                                                                  |
        |      ▪ (string) varJournalDetailDateTimeTZ ► Journal Detail DateTimeTZ                                                   |
        |      ▪ (int)    varCodeOfAccounting_RefID ► Code Of Accounting Reference ID                                              |
        |      ▪ (string) varJournalAccountPosition ► Journal Account Position                                                     |
        |      ▪ (int)    varCurrency_RefID ► Reference ID                                                                         |
        |      ▪ (float)  varCurrencyExchangeRate ► Currency Exchange Rate                                                         |
        |      ▪ (float)  varCurrencyValue ► Currency Value                                                                        |
        |      ▪ (float)  varBaseCurrencyValue ► Base Currency Value                                                               |
        |      ▪ (int)    varQuantityUnit_RefID ► Reference ID                                                                     |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |      ▪ (int)    varCodeOfBudgeting_RefID ► Code Of Budgeting Reference ID                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            bool $varSignDataAuthentication = null, int $varJournal_RefID = null, string $varJournalDetailDateTimeTZ = null, int $varCodeOfAccounting_RefID = null, string $varJournalAccountPosition = null, int $varCurrency_RefID = null, float $varCurrencyExchangeRate = null, float $varCurrencyValue = null, float $varBaseCurrencyValue = null, int $varQuantityUnit_RefID = null, float $varQuantity = null, string $varAnnotation = null, int $varCodeOfBudgeting_RefID = null)
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
                        [$varSysBranchRefID, 'bigint'],
                        [$varSignDataAuthentication,, 'boolean'],
                        [$varJournal_RefID, 'bigint'],
                        [$varJournalDetailDateTimeTZ, 'timestamptz'],
                        [$varCodeOfAccounting_RefID, 'bigint'],
                        [$varJournalAccountPosition, 'varchar'],
                        [$varCurrency_RefID, 'bigint'],
                        [$varCurrencyExchangeRate, 'numeric'],
                        [$varCurrencyValue, 'numeric'],
                        [$varBaseCurrencyValue, 'numeric'],
                        [$varQuantityUnit_RefID, 'bigint'],
                        [$varQuantity, 'numeric'],
                        [$varAnnotation, 'varchar'],
                        [$varCodeOfBudgeting_RefID, 'bigint']
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
        | ▪ Last Update     : 2020-09-10                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (bool)   varSignDataAuthentication ► SignDataAuthentication                                                       |
        |      ▪ (int)    varJournal_RefID ► Journal Reference ID                                                                  |
        |      ▪ (string) varJournalDetailDateTimeTZ ► Journal Detail DateTimeTZ                                                   |
        |      ▪ (int)    varCodeOfAccounting_RefID ► Code Of Accounting Reference ID                                              |
        |      ▪ (string) varJournalAccountPosition ► Journal Account Position                                                     |
        |      ▪ (int)    varCurrency_RefID ► Reference ID                                                                         |
        |      ▪ (float)  varCurrencyExchangeRate ► Currency Exchange Rate                                                         |
        |      ▪ (float)  varCurrencyValue ► Currency Value                                                                        |
        |      ▪ (float)  varBaseCurrencyValue ► Base Currency Value                                                               |
        |      ▪ (int)    varQuantityUnit_RefID ► Reference ID                                                                     |
        |      ▪ (float)  varQuantity ► Quantity                                                                                   |
        |      ▪ (string) varAnnotation ► Annotation                                                                               |
        |      ▪ (int)    varCodeOfBudgeting_RefID ► Code Of Budgeting Reference ID                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            bool $varSignDataAuthentication = null, int $varJournal_RefID = null, string $varJournalDetailDateTimeTZ = null, int $varCodeOfAccounting_RefID = null, string $varJournalAccountPosition = null, int $varCurrency_RefID = null, float $varCurrencyExchangeRate = null, float $varCurrencyValue = null, float $varBaseCurrencyValue = null, int $varQuantityUnit_RefID = null, float $varQuantity = null, string $varAnnotation = null, int $varCodeOfBudgeting_RefID = null)
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
                        [$varSysBranchRefID, 'bigint'],
                        [$varSignDataAuthentication,, 'boolean'],
                        [$varJournal_RefID, 'bigint'],
                        [$varJournalDetailDateTimeTZ, 'timestamptz'],
                        [$varCodeOfAccounting_RefID, 'bigint'],
                        [$varJournalAccountPosition, 'varchar'],
                        [$varCurrency_RefID, 'bigint'],
                        [$varCurrencyExchangeRate, 'numeric'],
                        [$varCurrencyValue, 'numeric'],
                        [$varBaseCurrencyValue, 'numeric'],
                        [$varQuantityUnit_RefID, 'bigint'],
                        [$varQuantity, 'numeric'],
                        [$varAnnotation, 'varchar'],
                        [$varCodeOfBudgeting_RefID, 'bigint']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }