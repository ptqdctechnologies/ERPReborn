<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_SupplyChain                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_SupplyChain
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblPurchaseOrder                                                                                             |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-SupplyChain ► TblPurchaseOrder                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblPurchaseOrder extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-14                                                                                           |
        | ▪ Creation Date   : 2020-09-14                                                                                           |
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
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-16                                                                                           |
        | ▪ Creation Date   : 2020-09-14                                                                                           |
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
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Worker Jobs Position Reference ID                       |
        |      ▪ (int)    varSupplier_RefID ► Supplier Reference ID                                                                |
        |      ▪ (string) varDeliveryDateTimeTZ ► Delivery DateTimeTZ                                                              |
        |      ▪ (int)    varDeliveryDestination_RefID ► Delivery Destination Reference ID                                         |
        |      ▪ (int)    varSupplierInvoiceBillingPurpose_RefID ► Supplier Invoice Billing Purpose Reference ID                   |
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
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterWorkerJobsPosition_RefID = null, int $varSupplier_RefID = null, string $varDeliveryDateTimeTZ = null, int $varDeliveryDestination_RefID = null, int $varSupplierInvoiceBillingPurpose_RefID = null, string $varRemarks = null, string $varDeliveryDestinationManualAddress = null, string $varPaymentNotes = null, string $varInternalNotes = null, int $varDownPayment = null, int $varTermOfPayment_RefID = null,
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
                            [$varRequesterWorkerJobsPosition_RefID, 'bigint'],
                            [$varSupplier_RefID, 'bigint'],
                            [$varDeliveryDateTimeTZ, 'timestamptz'],
                            [$varDeliveryDestination_RefID, 'bigint'],
                            [$varSupplierInvoiceBillingPurpose_RefID, 'bigint'],
                            [$varRemarks, 'varchar'],
                            [$varDeliveryDestinationManualAddress, 'varchar'],
                            [$varPaymentNotes, 'varchar'],
                            [$varInternalNotes, 'varchar'],
                            [$varDownPayment, 'bigint'],
                            [$varTermOfPayment_RefID, 'bigint'],

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
                $varReturn['data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000003                                                                                       |
        | ▪ Last Update     : 2025-04-16                                                                                           |
        | ▪ Creation Date   : 2020-09-14                                                                                           |
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
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (int)    varRequesterWorkerJobsPosition_RefID ► Requester Worker Jobs Position Reference ID                       |
        |      ▪ (int)    varSupplier_RefID ► Supplier Reference ID                                                                |
        |      ▪ (string) varDeliveryDateTimeTZ ► Delivery DateTimeTZ                                                              |
        |      ▪ (int)    varDeliveryDestination_RefID ► Delivery Destination Reference ID                                         |
        |      ▪ (int)    varSupplierInvoiceBillingPurpose_RefID ► Supplier Invoice Billing Purpose Reference ID                   |
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
            string $varDocumentDateTimeTZ = null, int $varLog_FileUpload_Pointer_RefID = null, int $varRequesterWorkerJobsPosition_RefID = null, int $varSupplier_RefID = null, string $varDeliveryDateTimeTZ = null, int $varDeliveryDestination_RefID = null, int $varSupplierInvoiceBillingPurpose_RefID = null, string $varRemarks = null, string $varDeliveryDestinationManualAddress = null, string $varPaymentNotes = null, string $varInternalNotes = null, int $varDownPayment = null, int $varTermOfPayment_RefID = null,
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
                            [$varRequesterWorkerJobsPosition_RefID, 'bigint'],
                            [$varSupplier_RefID, 'bigint'],
                            [$varDeliveryDateTimeTZ, 'timestamptz'],
                            [$varDeliveryDestination_RefID, 'bigint'],
                            [$varSupplierInvoiceBillingPurpose_RefID, 'bigint'],
                            [$varRemarks, 'varchar'],
                            [$varDeliveryDestinationManualAddress, 'varchar'],
                            [$varPaymentNotes, 'varchar'],
                            [$varInternalNotes, 'varchar'],
                            [$varDownPayment, 'bigint'],
                            [$varTermOfPayment_RefID, 'bigint'],

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
                $varReturn['data'][0];
            }
        }
    }

?>
