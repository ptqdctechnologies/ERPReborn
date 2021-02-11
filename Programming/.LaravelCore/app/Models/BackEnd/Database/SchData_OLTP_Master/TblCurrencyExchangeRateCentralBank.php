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
            string $varDateTimeTZ, string $varBaseCurrencyISOCode, string $varISOCode, $varExchangeRateBuy, $varExchangeRateSell)
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
                    "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ"::date = \''.$varDateTimeTZ.'\'::date
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
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."BaseCurrency_RefID",
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
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ"::date < \''.$varDateTimeTZ.'\'::date
                        AND
                        "SchData-OLTP-Master"."TblCurrency"."ISOCode" = \''.$varISOCode.'\'
                    ORDER BY
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ" DESC
                    LIMIT
                        1
                    ';
                $varBufferDBPrevious = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    $varSQL2
                    );                
                
                $varSQL2 = '
                    SELECT
                        CASE
                            WHEN ("SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_PID" IS NOT NULL) THEN
                                "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_PID"
                            WHEN ("SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_SID" IS NOT NULL) THEN
                                "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."Sys_SID"
                        END AS "Sys_ID",
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."BaseCurrency_RefID",
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
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ"::date > \''.$varDateTimeTZ.'\'::date
                        AND
                        "SchData-OLTP-Master"."TblCurrency"."ISOCode" = \''.$varISOCode.'\'
                    ORDER BY
                        "SchData-OLTP-Master"."TblCurrencyExchangeRateCentralBank"."ValidStartDateTimeTZ" ASC
                    LIMIT
                        1
                    ';
                $varBufferDBNext = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    $varSQL2
                    );                
                
                //---> Update Previous Record
                if($varBufferDBPrevious['RowCount']!=0)
                    {
                    $this->setDataUpdate(
                        $varUserSession, 
                        $varBufferDBPrevious['Data'][0]['Sys_ID'], 
                        null,
                        substr($varBufferDBPrevious['Data'][0]['ValidStartDateTimeTZ'], 0, 4), 
                        11000000000001,
                        $varBufferDBPrevious['Data'][0]['BaseCurrency_RefID'],
                        $varBufferDBPrevious['Data'][0]['Currency_RefID'],
                        $varBufferDBPrevious['Data'][0]['ExchangeRateBuy'], 
                        $varBufferDBPrevious['Data'][0]['ExchangeRateSell'],
                        $varBufferDBPrevious['Data'][0]['ValidStartDateTimeTZ'],
                        date('Y-m-d H:i:s', ((\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varDateTimeTZ))-1)).'.000000 +07'
                        );
                    }
                
                //---> Update Next Record                

                //---> Insert New Record                
                if($varBufferDBNext['RowCount']==0)
                    {
                    $varValidFinishDateTimeTZ = '9999-12-31 23:59:59 +07';
                    }
                else
                    {
                    $varValidFinishDateTimeTZ = date('Y-m-d H:i:s', ((\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varBufferDBNext['Data'][0]['ValidStartDateTimeTZ']))-1)).'.000000 +07';
                    }

                $this->setDataInsert(
                    $varUserSession, 
                    null, 
                    substr($varDateTimeTZ, 0, 4), 
                    11000000000001,
                    (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varBaseCurrencyISOCode),
                    (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varISOCode),
                    $varExchangeRateBuy, 
                    $varExchangeRateSell, 
                    date('Y-m-d H:i:s', (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varDateTimeTZ))).'.000000 +07',
                    $varValidFinishDateTimeTZ
                    );
                }

            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
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
            int $varBaseCurrency_RefID = null, int $varCurrency_RefID = null, float $varExchangeRateBuy = null, float $varExchangeRateSell = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null)
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
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
            int $varBaseCurrency_RefID = null, int $varCurrency_RefID = null, float $varExchangeRateBuy = null, float $varExchangeRateSell = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null)
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