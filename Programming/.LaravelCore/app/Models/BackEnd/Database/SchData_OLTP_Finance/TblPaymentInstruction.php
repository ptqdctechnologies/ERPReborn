<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Finance                                                                         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Finance
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPaymentInstruction                                                                                        |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblPaymentInstruction                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPaymentInstruction extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-11                                                                                           |
        | ▪ Creation Date   : 2025-01-11                                                                                           |
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
        | ▪ Last Update     : 2025-11-05                                                                                           |
        | ▪ Creation Date   : 2025-01-11                                                                                           |
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
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Worker Jobs Position Reference ID                       |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varCurrency_RefID = null, string $varCurrencySymbol = null, int $varCurrencyValue = null, int $varCurrencyExchangeRate = null, string $varSupplierInvoiceNumber = null, int $varSupplier_RefID = null, int $varReceiptStatus = null, int $varContractStatus = null, int $varVatStatus = null, int $varVatValue = null, string $varVatNumber = null, int $varFatPatDoStatus = null, int $varAssetStatus = null, int $varDepreciationAssetCategory_RefID = null, int $varDepreciationCOA_RefID = null, int $varDeduction = null, string $varRemarks = null,
            array $varAdditionalData = []
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

                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varCurrency_RefID, 'bigint'],
                            [$varCurrencySymbol, 'varchar'],
                            [$varCurrencyValue, 'bigint'],
                            [$varCurrencyExchangeRate, 'bigint'],
                            [$varSupplierInvoiceNumber, 'varchar'],
                            [$varSupplier_RefID, 'bigint'],
                            [$varReceiptStatus, 'smallint'],
                            [$varContractStatus, 'smallint'],
                            [$varVatStatus, 'smallint'],
                            [$varVatValue, 'bigint'],
                            [$varVatNumber, 'varchar'],
                            [$varFatPatDoStatus, 'smallint'],
                            [$varAssetStatus, 'smallint'],
                            [$varDepreciationAssetCategory_RefID, 'bigint'],
                            [$varDepreciationCOA_RefID, 'bigint'],
                            [$varDeduction, 'bigint'],
                            [$varRemarks, 'varchar'],

                            [
                                ((count($varAdditionalData) === 0)
                                    ? null
                                    : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                        $varUserSession,
                                        $varAdditionalData
                                        )
                                ),
                                'json'
                            ]
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
        | ▪ Last Update     : 2025-11-05                                                                                           |
        | ▪ Creation Date   : 2025-01-11                                                                                           |
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
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Worker Jobs Position Reference ID                       |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null, string $varSysDataValidityStartDateTimeTZ = null, string $varSysDataValidityFinishDateTimeTZ = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varCurrency_RefID = null, string $varCurrencySymbol = null, int $varCurrencyValue = null, int $varCurrencyExchangeRate = null, string $varSupplierInvoiceNumber = null, int $varSupplier_RefID = null, int $varReceiptStatus = null, int $varContractStatus = null, int $varVatStatus = null, int $varVatValue = null, string $varVatNumber = null, int $varFatPatDoStatus = null, int $varAssetStatus = null, int $varDepreciationAssetCategory_RefID  = null, int $varDepreciationCOA_RefID = null, int $varDeduction = null, string $varRemarks = null,
            array $varAdditionalData = []
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

                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varCurrency_RefID, 'bigint'],
                            [$varCurrencySymbol, 'varchar'],
                            [$varCurrencyValue, 'bigint'],
                            [$varCurrencyExchangeRate, 'bigint'],
                            [$varSupplierInvoiceNumber, 'varchar'],
                            [$varSupplier_RefID, 'bigint'],
                            [$varReceiptStatus, 'smallint'],
                            [$varContractStatus, 'smallint'],
                            [$varVatStatus, 'smallint'],
                            [$varVatValue, 'bigint'],
                            [$varVatNumber, 'varchar'],
                            [$varFatPatDoStatus, 'smallint'],
                            [$varAssetStatus, 'smallint'],
                            [$varDepreciationAssetCategory_RefID, 'bigint'],                            
                            [$varDepreciationCOA_RefID, 'bigint'],
                            [$varDeduction, 'bigint'],
                            [$varRemarks, 'varchar'],

                            [
                                ((count($varAdditionalData) === 0)
                                    ? null
                                    : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                        $varUserSession,
                                        $varAdditionalData
                                        )
                                ),
                                'json'
                            ]
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }
