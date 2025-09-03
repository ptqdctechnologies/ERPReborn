<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCashDisbursementFunding                                                                                   |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblCashDisbursementFunding                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCashDisbursementFunding extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-02                                                                                           |
        | ▪ Creation Date   : 2025-09-02                                                                                           |
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
        | ▪ Last Update     : 2025-09-02                                                                                           |
        | ▪ Creation Date   : 2025-09-02                                                                                           |
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
        |      ▪ (int)    varCashDisbursement_RefID ► Payment Reference ID                                                         |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (int)    varPaymentMethod_RefID ► Payment Method Reference ID                                                     |
        |      ▪ (int)    varAmountCurrency_RefID ► Amount Currency Reference ID                                                   |
        |      ▪ (float)  varAmountCurrencyValue ► Amount Currency Value                                                           |
        |      ▪ (float)  varAmountCurrencyExchangeRate ► Amount Currency Exchange Rate                                            |
        |      ▪ (int)    varFundingSource_RefID ► Payment Funding Source Reference ID                                             |
        |      ▪ (int)    varFundingDestination_RefID ► Payment Funding Destination Reference ID                                   |
        |      ▪ (int)    varBeneficiaryWorkerJobsPosition_RefID ► Beneficiary Worker Jobs Position Reference ID                   |
        |      ▪ (string) varPaidDateTimeTZ ► Paid DateTimeTZ                                                                      |
        |      ▪ (int)    varPayerWorkerJobsPosition_RefID ► Payer Worker Jobs Position Reference ID                               |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varCashDisbursement_RefID = null, int $varLog_FileUpload_Pointer_RefID = null, int $varPaymentMethod_RefID = null, int $varAmountCurrency_RefID = null, float $varAmountCurrencyValue = null, float $varAmountCurrencyExchangeRate = null, int $varFundingSource_RefID = null, int $varFundingDestination_RefID = null, int $varBeneficiaryWorkerJobsPosition_RefID = null, string $varPaidDateTimeTZ = null, int $varPayerWorkerJobsPosition_RefID = null, string $varRemarks = null
            )
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
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varCashDisbursement_RefID, 'bigint'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varPaymentMethod_RefID, 'bigint'],
                            [$varAmountCurrency_RefID, 'bigint'],
                            [$varAmountCurrencyValue, 'numeric'],
                            [$varAmountCurrencyExchangeRate, 'numeric'],
                            [$varFundingSource_RefID, 'bigint'],
                            [$varFundingDestination_RefID, 'bigint'],
                            [$varBeneficiaryWorkerJobsPosition_RefID, 'bigint'],
                            [$varPaidDateTimeTZ, 'timestamptz'],
                            [$varPayerWorkerJobsPosition_RefID, 'bigint'],
                            [$varRemarks, 'varchar']
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
        | ▪ Last Update     : 2025-09-02                                                                                           |
        | ▪ Creation Date   : 2025-09-02                                                                                           |
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
        |      ▪ (int)    varCashDisbursement_RefID ► Payment Reference ID                                                         |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (int)    varPaymentMethod_RefID ► Payment Method Reference ID                                                     |
        |      ▪ (int)    varAmountCurrency_RefID ► Amount Currency Reference ID                                                   |
        |      ▪ (float)  varAmountCurrencyValue ► Amount Currency Value                                                           |
        |      ▪ (float)  varAmountCurrencyExchangeRate ► Amount Currency Exchange Rate                                            |
        |      ▪ (int)    varFundingSource_RefID ► Payment Funding Source Reference ID                                             |
        |      ▪ (int)    varFundingDestination_RefID ► Payment Funding Destination Reference ID                                   |
        |      ▪ (int)    varBeneficiaryWorkerJobsPosition_RefID ► Beneficiary Worker Jobs Position Reference ID                   |
        |      ▪ (string) varPaidDateTimeTZ ► Paid DateTimeTZ                                                                      |
        |      ▪ (int)    varPayerWorkerJobsPosition_RefID ► Payer Worker Jobs Position Reference ID                               |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            int $varCashDisbursement_RefID = null, int $varLog_FileUpload_Pointer_RefID = null, int $varPaymentMethod_RefID = null, int $varAmountCurrency_RefID = null, float $varAmountCurrencyValue = null, float $varAmountCurrencyExchangeRate = null, int $varFundingSource_RefID = null, int $varFundingDestination_RefID = null, int $varBeneficiaryWorkerJobsPosition_RefID = null, string $varPaidDateTimeTZ = null, int $varPayerWorkerJobsPosition_RefID = null, string $varRemarks = null
            )
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
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varCashDisbursement_RefID, 'bigint'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varPaymentMethod_RefID, 'bigint'],
                            [$varAmountCurrency_RefID, 'bigint'],
                            [$varAmountCurrencyValue, 'numeric'],
                            [$varAmountCurrencyExchangeRate, 'numeric'],
                            [$varFundingSource_RefID, 'bigint'],
                            [$varFundingDestination_RefID, 'bigint'],
                            [$varBeneficiaryWorkerJobsPosition_RefID, 'bigint'],
                            [$varPaidDateTimeTZ, 'timestamptz'],
                            [$varPayerWorkerJobsPosition_RefID, 'bigint'],
                            [$varRemarks, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }