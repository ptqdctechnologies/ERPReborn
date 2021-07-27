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
    | ▪ Class Name  : TblCitizenFamilyCard                                                                                         |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCitizenFamilyCard                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCitizenFamilyCard extends \App\Models\Database\DefaultClassPrototype
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-27                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (string) varCardNumber ► Card Number                                                                              |
        |      ▪ (string) varIssuedDate ► Issued Date                                                                              |
        |      ▪ (string) varCardSerialNumber ► Card Serial Number                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varLog_FileUpload_Pointer_RefID = null, string $varCardNumber = null, string $varIssuedDate = null, string $varCardSerialNumber = null)
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
                        [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        [$varCardNumber, 'varchar'],
                        [$varIssuedDate, 'date'],
                        [$varCardSerialNumber, 'varchar']                        
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
        | ▪ Last Update     : 2021-07-27                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (string) varCardNumber ► Card Number                                                                              |
        |      ▪ (string) varIssuedDate ► Issued Date                                                                              |
        |      ▪ (string) varCardSerialNumber ► Card Serial Number                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varLog_FileUpload_Pointer_RefID = null, string $varCardNumber = null, string $varIssuedDate = null, string $varCardSerialNumber = null)
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
                        [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                        [$varCardNumber, 'varchar'],
                        [$varIssuedDate, 'date'],
                        [$varCardSerialNumber, 'varchar']                        
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }