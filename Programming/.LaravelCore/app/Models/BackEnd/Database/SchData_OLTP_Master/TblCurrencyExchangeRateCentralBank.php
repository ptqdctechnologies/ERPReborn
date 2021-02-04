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
    | ▪ Class Name  : TblCurrencyExchangeRateCentralBank                                                                           |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCurrencyExchangeRateCentralBank                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCurrencyExchangeRateCentralBank extends \App\Models\Database\DefaultClassPrototype
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
            $varCurrentDateTimeTZ, $varISOCode, $varExchangeRateBuy, $varExchangeRateSell, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ)
            {
            //---> Cek apakah sudah ada record
            $varSQL = '
                SELECT
                    CASE
                        WHEN (COUNT("SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_RPK") = 0) THEN
                            FALSE
                        ELSE
                            TRUE
                    END::boolean AS "SignExist"
                FROM
                    "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"
                        INNER JOIN
                            (SELECT * FROM "SchSysConfig"."FuncSys_General_GetVirtualTable_SysIDAndSysRPK"(\'SchData-OLTP-Master\', \'TblCurrency\')) AS "VirtTblCurrency"
                                ON
                                    "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Currency_RefID" = "VirtTblCurrency"."Sys_ID"
                        INNER JOIN
                            "SchData-OLTP-Master"."TblCurrency"
                                ON
                                    "VirtTblCurrency"."Sys_RPK" = "SchData-OLTP-Master"."TblCurrency"."Sys_RPK"
                WHERE
                    "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ"::date = \''.$varCurrentDateTimeTZ.'\'::date
                    AND
                    "SchData-OLTP-Master"."TblCurrency"."ISOCode" = \''.$varISOCode.'\'
                ';
            $varBufferDB = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQL
                );
            
            //---> Bila belum ada record
            if(((boolean) $varBufferDB['Data'][0]['SignExist']) == FALSE)
                {
                $varSQL2 = '
                    SELECT
                        CASE
                            WHEN ("SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_PID" IS NOT NULL) THEN
                                "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_PID"
                            WHEN ("SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_SID" IS NOT NULL) THEN
                                "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_SID"
                        END AS "Sys_ID",
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Currency_RefID",
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ExchangeRateBuy",
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ExchangeRateSell",
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ",
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidFinishDateTimeTZ"
                    FROM
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"
                            INNER JOIN
                                (SELECT * FROM "SchSysConfig"."FuncSys_General_GetVirtualTable_SysIDAndSysRPK"(\'SchData-OLTP-Master\', \'TblCurrency\')) AS "VirtTblCurrency"
                                    ON
                                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Currency_RefID" = "VirtTblCurrency"."Sys_ID"
                            INNER JOIN
                                "SchData-OLTP-Master"."TblCurrency"
                                    ON
                                        "VirtTblCurrency"."Sys_RPK" = "SchData-OLTP-Master"."TblCurrency"."Sys_RPK"
                    WHERE
                        "SchData-OLTP-Master"."TblCurrency"."ISOCode" = \''.$varISOCode.'\'
                    ORDER BY
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidFinishDateTimeTZ" DESC
                    LIMIT 1
                    ';
//                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidFinishDateTimeTZ"::date = \'9999-12-31 23:59:59 +07\'::date
  //                      AND
                $varBufferDB2 = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    $varSQL2
                    );
                
                if($varBufferDB2['RowCount']!=0)
                    {
                    $this->setDataUpdate(
                        $varUserSession, 
                        $varBufferDB2['Data'][0]['Sys_ID'], 
                        null,
                        substr($varBufferDB2['Data'][0]['ValidStartDateTimeTZ'], 0, 4), 
                        11000000000001,
                        $varBufferDB2['Data'][0]['Currency_RefID'],
                        $varBufferDB2['Data'][0]['ExchangeRateBuy'], 
                        $varBufferDB2['Data'][0]['ExchangeRateSell'],
                        $varBufferDB2['Data'][0]['ValidStartDateTimeTZ'],
                        //'9999-12-31 23:59:59 +07'
                        date('Y-m-d H:i:s', ((\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varValidStartDateTimeTZ))-1)).' +07'
                        
                        //$varBufferDB2['Data'][0]['ValidFinishDateTimeTZ']
                        );
                    }
                
                $this->setDataInsert(
                    $varUserSession, 
                    null, 
                    substr($varCurrentDateTimeTZ, 0, 4), 
                    11000000000001,
                    (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varISOCode),
                    $varExchangeRateBuy, 
                    $varExchangeRateSell, 
                    $varValidStartDateTimeTZ, 
                    $varValidFinishDateTimeTZ
                    );
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-02-04                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varExchangeRateBuy ► Buy Exchange Rate                                                                   |
        |      ▪ (float)  varExchangeRateSell ► Sell Exchange Rate                                                                 |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varCurrency_RefID = null, float $varExchangeRateBuy = null, float $varExchangeRateSell = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null)
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
                        [$varCurrency_RefID, 'bigint'],
                        [$varExchangeRateBuy, 'numeric'],
                        [$varExchangeRateSell, 'numeric'],
                        [$varValidStartDateTimeTZ, 'timestamptz'],
                        [$varValidFinishDateTimeTZ, 'timestamptz']
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
        | ▪ Last Update     : 2021-02-04                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varCurrency_RefID ► Currency Reference ID                                                                |
        |      ▪ (float)  varExchangeRateBuy ► Buy Exchange Rate                                                                   |
        |      ▪ (float)  varExchangeRateSell ► Sell Exchange Rate                                                                 |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varCurrency_RefID = null, float $varExchangeRateBuy = null, float $varExchangeRateSell = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null)
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
                        [$varCurrency_RefID, 'bigint'],
                        [$varExchangeRateBuy, 'numeric'],
                        [$varExchangeRateSell, 'numeric'],
                        [$varValidStartDateTimeTZ, 'timestamptz'],
                        [$varValidFinishDateTimeTZ, 'timestamptz']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }