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
    | ▪ Class Name  : TblPurchaseProformaInvoice                                                                                   |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Finance ► TblPurchaseProformaInvoice                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPurchaseProformaInvoice extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-16                                                                                           |
        | ▪ Creation Date   : 2022-09-16                                                                                           |
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
        | ▪ Last Update     : 2022-09-28                                                                                           |
        | ▪ Creation Date   : 2022-09-28                                                                                           |
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
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varSupplier_RefID ► Supplier Reference ID                                                                |
        |      ▪ (string) varDocumentNumber ► Document Number                                                                      |
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (string) varSalesOrderNumber ► Quantity Unit Reference ID                                                         |
        |      ▪ (string) varPaymentDueDateTimeTZ ► Payment Due DateTimeTZ                                                         |
        |      ▪ (int)    varPreferredPaymentMethod_RefID ► Preferred Payment Method Reference ID                                  |
        |      ▪ (int)    varPreferredBankAccount_RefID ► Preferred Bank Account Reference ID                                      |
        |      ▪ (string) varReceivedDateTimeTZ ► Received DateTimeTZ                                                              |
        |      ▪ (float)  varAmountRoundOff ► Amount Round Off                                                                     |
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
            int $varLog_FileUpload_Pointer_RefID = null, int $varSupplier_RefID = null, string $varDocumentNumber = null, string $varDocumentDateTimeTZ = null, string $varSalesOrderNumber = null, string $varPaymentDueDateTimeTZ = null, int $varPreferredPaymentMethod_RefID = null, int $varPreferredBankAccount_RefID = null, string $varReceivedDateTimeTZ = null, float $varAmountRoundOff = null, string $varRemarks = null,
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

                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varSupplier_RefID, 'bigint'],
                            [$varDocumentNumber, 'varchar'],
                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varSalesOrderNumber, 'varchar'],
                            [$varPaymentDueDateTimeTZ, 'timestamptz'],
                            [$varPreferredPaymentMethod_RefID, 'bigint'],
                            [$varPreferredBankAccount_RefID, 'bigint'],
                            [$varReceivedDateTimeTZ, 'timestamptz'],
                            [$varAmountRoundOff, 'numeric'],
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
        | ▪ Last Update     : 2022-09-28                                                                                           |
        | ▪ Creation Date   : 2022-09-28                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
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
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► File Attachments Reference ID                                          |
        |      ▪ (int)    varSupplier_RefID ► Supplier Reference ID                                                                |
        |      ▪ (string) varDocumentNumber ► Document Number                                                                      |
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (string) varSalesOrderNumber ► Quantity Unit Reference ID                                                         |
        |      ▪ (string) varPaymentDueDateTimeTZ ► Payment Due DateTimeTZ                                                         |
        |      ▪ (int)    varPreferredPaymentMethod_RefID ► Preferred Payment Method Reference ID                                  |
        |      ▪ (int)    varPreferredBankAccount_RefID ► Preferred Bank Account Reference ID                                      |
        |      ▪ (string) varReceivedDateTimeTZ ► Received DateTimeTZ                                                              |
        |      ▪ (float)  varAmountRoundOff ► Amount Round Off                                                                     |
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
            int $varLog_FileUpload_Pointer_RefID = null, int $varSupplier_RefID = null, string $varDocumentNumber = null, string $varDocumentDateTimeTZ = null, string $varSalesOrderNumber = null, string $varPaymentDueDateTimeTZ = null, int $varPreferredPaymentMethod_RefID = null, int $varPreferredBankAccount_RefID = null, string $varReceivedDateTimeTZ = null, float $varAmountRoundOff = null, string $varRemarks = null,
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

                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varSupplier_RefID, 'bigint'],
                            [$varDocumentNumber, 'varchar'],
                            [$varDocumentDateTimeTZ, 'timestamptz'],
                            [$varSalesOrderNumber, 'varchar'],
                            [$varPaymentDueDateTimeTZ, 'timestamptz'],
                            [$varPreferredPaymentMethod_RefID, 'bigint'],
                            [$varPreferredBankAccount_RefID, 'bigint'],
                            [$varReceivedDateTimeTZ, 'timestamptz'],
                            [$varAmountRoundOff, 'numeric'],
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