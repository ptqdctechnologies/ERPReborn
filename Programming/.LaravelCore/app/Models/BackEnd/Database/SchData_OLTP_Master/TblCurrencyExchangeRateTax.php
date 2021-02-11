<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCurrencyExchangeRateTax                                                                                   |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCurrencyExchangeRateTax                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCurrencyExchangeRateTax extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-09                                                                                           |
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


        public function setDataImport(
            $varUserSession, 
            string $varCurrentDateTimeTZ, string $varBaseCurrencyISOCode, string $varISOCode, $varExchangeRate, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ, $varKMKNumber)
            {
            $varSQL = '
                SELECT
                    "TblCurrencyExchangeRateTax"."ValidStartDateTimeTZ",
                    "TblCurrencyExchangeRateTax"."ValidFinishDateTimeTZ",
                    "SchData-OLTP-Master"."TblCurrency"."ISOCode"
                FROM
                    "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"
                        INNER JOIN
                            (SELECT * FROM "SchSysConfig"."FuncSys_General_GetVirtualTable_SysIDAndSysRPK"(\'SchData-OLTP-Master\', \'TblCurrency\')) AS "VirtTblCurrency"
                                ON
                                    "SchData-OLTP-Master"."TblCurrencyExchangeRateTax"."Currency_RefID" = "VirtTblCurrency"."Sys_ID"
                        INNER JOIN
                            "SchData-OLTP-Master"."TblCurrency"
                                ON
                                    "VirtTblCurrency"."Sys_RPK" = "SchData-OLTP-Master"."TblCurrency"."Sys_RPK"
                        INNER JOIN
                            (
                            SELECT
                                \''.$varISOCode.'\'::varchar AS "ISOCode",
                                \''.$varCurrentDateTimeTZ.'\'::date AS "Date"
                            ) AS "SubSQL"
                                ON
                                    "SchData-OLTP-Master"."TblCurrency"."ISOCode" = "SubSQL"."ISOCode"
                                    AND
                                    "TblCurrencyExchangeRateTax"."ValidStartDateTimeTZ" <= ("SubSQL"."Date"::varchar || \' 00:00:00+07\')::timestamptz
                                    AND
                                    "TblCurrencyExchangeRateTax"."ValidFinishDateTimeTZ" >= ("SubSQL"."Date"::varchar || \' 23:59:59+07\')::timestamptz
                ';
            $varBufferDB = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQL
                );
            
            if($varBufferDB['RowCount']==0)
                {
                $varSQL2 = '
                    SELECT
                        CASE
                            WHEN ("Sys_PID" IS NOT NULL) THEN
                                "Sys_PID"
                            WHEN ("Sys_SID" IS NOT NULL) THEN
                                "Sys_SID"
                        END AS "Sys_ID"
                    FROM
                        "SchData-OLTP-Master"."TblCurrency"
                    WHERE
                        "ISOCode" = \''.$varISOCode.'\'
                    ';
                $varBufferDB2 = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    $varSQL2
                    );
                if($varBufferDB2['RowCount']==1)
                    {
                    $varCurrency_RefID = ($varBufferDB2['Data'][0]['Sys_ID']);
//                    echo $varCurrency_RefID.'
  //                          
    //                        ';
                    
                    $this->setDataInsert(
                        $varUserSession, 
                        null, 
                        substr($varCurrentDateTimeTZ, 0, 4), 
                        11000000000001, 
                        (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varBaseCurrencyISOCode),
                        (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varISOCode),
                        $varExchangeRate, 
                        $varValidStartDateTimeTZ, 
                        $varValidFinishDateTimeTZ,
                        $varKMKNumber
                        );
                    }
                
                
                }
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-08                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varBaseCurrency_RefID ► Base Currency Reference ID                                                       |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varExchangeRate ► Exchange Rate                                                                          |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        |      ▪ (string) varRegulatorDocumentNumber ► Regulator Document Number                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varBaseCurrency_RefID = null, int $varCurrency_RefID = null, float $varExchangeRate = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null, string $varRegulatorDocumentNumber = null)
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
                        [$varBaseCurrency_RefID, 'bigint'],
                        [$varCurrency_RefID, 'bigint'],
                        [$varExchangeRate, 'numeric'],
                        [$varValidStartDateTimeTZ, 'timestamptz'],
                        [$varValidFinishDateTimeTZ, 'timestamptz'],
                        [$varRegulatorDocumentNumber, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-08                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varBaseCurrency_RefID ► Base Currency Reference ID                                                       |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varExchangeRate ► Exchange Rate                                                                          |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        |      ▪ (string) varRegulatorDocumentNumber ► Regulator Document Number                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varBaseCurrency_RefID = null, int $varCurrency_RefID = null, float $varExchangeRate = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null, string $varRegulatorDocumentNumber = null)
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
                        [$varBaseCurrency_RefID, 'bigint'],
                        [$varCurrency_RefID, 'bigint'],
                        [$varExchangeRate, 'numeric'],
                        [$varValidStartDateTimeTZ, 'timestamptz'],
                        [$varValidFinishDateTimeTZ, 'timestamptz'],
                        [$varRegulatorDocumentNumber, 'varchar']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }