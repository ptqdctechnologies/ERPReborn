<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_SupplyChain                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com), 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_SupplyChain {
    use App\Models\Database\DefaultClassPrototype;
    use App\Helpers\ZhtHelper\Database\Helper_PostgreSQL;
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblWarehouse                                                                                                 |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-SupplyChain ► TblWarehouse                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblWarehouse extends DefaultClassPrototype
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-01                                                                                           |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
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
        | ▪ Method Name     : setDataInitialize                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-02                                                                                           |
        | ▪ Creation Date   : 2022-03-02                                                                                           |
        | ▪ Description     : Data Initialize                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInitialize($varUserSession)
        {
            $varReturn =
                Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig-Initialize.Func_' . parent::getSchemaName($varUserSession) . '_' . parent::getTableName($varUserSession),
                        []
                    )
                );

            return
                $varReturn;
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0003.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-11                                                                                           |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
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
        |      ▪ (int)    varInstitutionBranch_RefID ► Institution Branch_Reference ID                                             |
        |      ▪ (string) varName ► Name                                                                                           |
        |      ▪ (int)    varWarehouseType_RefID ► Warehouse Type Reference ID                                                     |
        |      ▪ (string) varAddress ► Address                                                                                     |
        |      ▪ (string) varLocation ► Location JSON                                                                              |
        |      ▪ (string) varCode ► Code                                                                                           |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null,
            string $varSysDataValidityStartDateTimeTZ = null,
            string $varSysDataValidityFinishDateTimeTZ = null,
            int $varSysPartitionRemovableRecordKeyRefType = null,
            int $varSysBranch_RefID = null,
            $varSysBaseCurrency_RefID = null,
            int $varInstitutionBranch_RefID = null,
            string $varName = null,
            int $varWarehouseType_RefID = null,
            string $varAddress = null,
            string $varLocation = null,
            string $varCode = null
        ) {
            $varReturn =
                Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession) . '.Func_' . parent::getTableName($varUserSession) . '_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [null, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varInstitutionBranch_RefID, 'bigint'],
                            [$varName, 'varchar'],
                            [$varWarehouseType_RefID, 'bigint'],
                            [$varAddress, 'varchar'],
                            [$varLocation, 'jsonb'],
                            [$varCode, 'varchar'],
                            [true, 'boolean']
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
        | ▪ Version         : 1.0004.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-11                                                                                           |
        | ▪ Creation Date   : 2022-03-01                                                                                           |
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
        |      ▪ (int)    varInstitutionBranch_RefID ► Institution Branch Reference ID                                             |
        |      ▪ (string) varName ► Name                                                                                           |
        |      ▪ (int)    varWarehouseType_RefID ► Warehouse Type Reference ID                                                     |
        |      ▪ (string) varAddress ► Address                                                                                     |
        |      ▪ (string) varLocation ► Location (JSON)                                                                            |
        |      ▪ (string) varCode ► Code                                                                                           |
        |      ▪ (bool)   varStatus ► Status                                                                                           |
        | ----------------------------------------                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        | ▪ (array)  varReturn                                                                                                     |
        | +--------------------------------------------------------------------------------------------------------------------------+ |
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null,
            string $varSysDataValidityStartDateTimeTZ = null,
            string $varSysDataValidityFinishDateTimeTZ = null,
            int $varSysPartitionRemovableRecordKeyRefType = null,
            int $varSysBranch_RefID = null,
            $varSysBaseCurrency_RefID = null,
            int $varInstitutionBranch_RefID = null,
            string $varName = null,
            int $varWarehouseType_RefID = null,
            string $varAddress = null,
            string $varLocation = null,
            string $varCode = null,
            bool $varStatus = null
        ) {
            $varReturn =
                Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        parent::getSchemaName($varUserSession) . '.Func_' . parent::getTableName($varUserSession) . '_SET',
                        [
                            [$varUserSession, 'bigint'],
                            [$varSysID, 'bigint'],

                            [$varSysDataAnnotation, 'varchar'],
                            [$varSysDataValidityStartDateTimeTZ, 'timestamptz'],
                            [$varSysDataValidityFinishDateTimeTZ, 'timestamptz'],
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varInstitutionBranch_RefID, 'bigint'],
                            [$varName, 'varchar'],
                            [$varWarehouseType_RefID, 'bigint'],
                            [$varAddress, 'varchar'],
                            [$varLocation, 'jsonb'],
                            [$varCode, 'varchar'],
                            [$varStatus, 'boolean']
                        ]
                    )
                );

            return
                $varReturn;
        }
    }
}