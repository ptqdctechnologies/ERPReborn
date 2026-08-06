<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master {
    use App\Models\Database\DefaultClassPrototype;
    use App\Helpers\ZhtHelper\Database\Helper_PostgreSQL;
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblWorkStructure                                                                                                  |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblWorkStructure                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblWorkStructure extends DefaultClassPrototype
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-04                                                                                           |
        | ▪ Creation Date   : 2026-08-04                                                                                           |
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
        | ▪ Last Update     : 2026-08-04                                                                                           |
        | ▪ Creation Date   : 2026-08-04                                                                                           |
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-04                                                                                           |
        | ▪ Creation Date   : 2026-08-04                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varCode ► Work Structure Code                                                                            |
        |      ▪ (string) varName ► Work Structure Name                                                                            |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession,
            string $varSysDataAnnotation = null,
            int $varSysPartitionRemovableRecordKeyRefType = null,
            int $varSysBranch_RefID = null,
            $varSysBaseCurrency_RefID = null,
            string $varCode = null,
            string $varName = null
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
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varCode, 'varchar'],
                            [$varName, 'varchar'],
                            [null, 'smallint']
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
        | ▪ Last Update     : 2026-08-06                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                           |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varName ► Religion Name                                                                                  |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession,
            int $varSysID,
            string $varSysDataAnnotation = null,
            int $varSysPartitionRemovableRecordKeyRefType = null,
            int $varSysBranch_RefID = null,
            $varSysBaseCurrency_RefID = null,
            string $varCode = null,
            string $varName = null,
            int $varStatus = null
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
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],
                            [$varSysBaseCurrency_RefID, 'bigint'],

                            [$varCode, 'varchar'],
                            [$varName, 'varchar'],
                            [$varStatus, 'smallint']
                        ]
                    )
                );

            return
                $varReturn;
        }
    }
}