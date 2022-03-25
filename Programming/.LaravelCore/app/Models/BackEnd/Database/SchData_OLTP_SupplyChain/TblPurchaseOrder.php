<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_SupplyChain                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
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
        | ▪ Create Date     : 2020-09-14                                                                                           |
        | ▪ Last Update     : 2020-09-14                                                                                           |
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
        | ▪ Version         : 1.0000.0000004                                                                                       |
        | ▪ Create Date     : 2020-09-14                                                                                           |
        | ▪ Last Update     : 2022-03-25                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |      ▪ (int)    varSysBaseCurrency_RefID ► System Base Currency Reference ID                                             |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varRequesterPerson_RefID ► Requester Person Reference ID                                                 |
        |      ▪ (int)    varSupplier_RefID ► Supplier Reference ID                                                                |
        |      ▪ (string) varDeliveryDateTimeTZ ► Delivery DateTimeTZ                                                              |
        |      ▪ (string) varShippingAddress ► Shipping Address                                                                    |
        |      ▪ (string) varBillingAddress ► Billing Address                                                                      |
        |      ▪ (string) varPaymentTerm ► Payment Term                                                                            |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varRequesterPerson_RefID = null, int $varSupplier_RefID = null, string $varDeliveryDateTimeTZ = null, string $varShippingAddress = null, string $varBillingAddress = null, string $varPaymentTerm = null, string $varRemarks = null,
            array $varAdditionalData = null)
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
                        [$varSysBranch_RefID, 'bigint'],
                        [$varSysBaseCurrency_RefID, 'bigint'],

                        [$varDocumentDateTimeTZ, 'timestamptz'],
                        [$varRequesterPerson_RefID, 'bigint'],
                        [$varSupplier_RefID, 'bigint'],
                        [$varDeliveryDateTimeTZ, 'timestamptz'],
                        [$varShippingAddress, 'varchar'],
                        [$varBillingAddress, 'varchar'],
                        [$varPaymentTerm, 'varchar'],
                        [$varRemarks, 'varchar'],

                        [\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData), 'json']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000004                                                                                       |
        | ▪ Create Date     : 2020-09-14                                                                                           |
        | ▪ Last Update     : 2022-03-25                                                                                           |
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
        |      ▪ (string) varDocumentDateTimeTZ ► Document DateTimeTZ                                                              |
        |      ▪ (int)    varRequesterPerson_RefID ► Requester Person Reference ID                                                 |
        |      ▪ (int)    varSupplier_RefID ► Supplier Reference ID                                                                |
        |      ▪ (string) varDeliveryDateTimeTZ ► Delivery DateTimeTZ                                                              |
        |      ▪ (string) varShippingAddress ► Shipping Address                                                                    |
        |      ▪ (string) varBillingAddress ► Billing Address                                                                      |
        |      ▪ (string) varPaymentTerm ► Payment Term                                                                            |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |        ----------------------------------------                                                                          |
        |      ▪ (array)  varAdditionalData ► Additional Data                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null, int $varSysBaseCurrency_RefID = null,
            string $varDocumentDateTimeTZ = null, int $varRequesterPerson_RefID = null, int $varSupplier_RefID = null, string $varDeliveryDateTimeTZ = null, string $varShippingAddress = null, string $varBillingAddress = null, string $varPaymentTerm = null, string $varRemarks = null,
            array $varAdditionalData = null)
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
                        [$varSysBranch_RefID, 'bigint'],
                        [$varSysBaseCurrency_RefID, 'bigint'],

                        [$varDocumentDateTimeTZ, 'timestamptz'],
                        [$varRequesterPerson_RefID, 'bigint'],
                        [$varSupplier_RefID, 'bigint'],
                        [$varDeliveryDateTimeTZ, 'timestamptz'],
                        [$varShippingAddress, 'varchar'],
                        [$varBillingAddress, 'varchar'],
                        [$varPaymentTerm, 'varchar'],
                        [$varRemarks, 'varchar'],

                        [\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData), 'json']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }

?>