<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2021 Zheta (teguhpjs@gmail.com)                                                                              |
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
        | ▪ Creation Date   : 2020-09-09                                                                                           |
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
        | ▪ Creation Date   : 2021-07-27                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (string) varCardNumber ► Card Number                                                                              |
        |      ▪ (string) varIssuedDate ► Issued Date                                                                              |
	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel1_RefID ► Address Country Administrative Area Level 1 Reference  |
        |                 ID                                                                                                       |
    	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel2_RefID ► Address Country Administrative Area Level 2 Reference  |
        |                 ID                                                                                                       |
    	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel3_RefID ► Address Country Administrative Area Level 3 Reference  |
        |                 ID                                                                                                       |
    	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel4_RefID ► Address Country Administrative Area Level 4 Reference  |
        |                 ID                                                                                                       |
	|      ▪ (string) varAddress ► Address                                                                                     |
	|      ▪ (int)    varAddressNeighbourhoodNumber ► Address Neighbourhood Number                                             |
	|      ▪ (int)    varAddressHamletNumber ► Address Hamlet Number                                                           |
	|      ▪ (string) varPostalCode ► PostalCode                                                                               |
        |      ▪ (string) varCardSerialNumber ► Card Serial Number                                                                 |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varLog_FileUpload_Pointer_RefID = null, string $varCardNumber = null, string $varIssuedDate = null, int $varAddressCountryAdministrativeAreaLevel1_RefID = null, int $varAddressCountryAdministrativeAreaLevel2_RefID = null, int $varAddressCountryAdministrativeAreaLevel3_RefID = null, int $varAddressCountryAdministrativeAreaLevel4_RefID = null, string $varAddress = null, int $varAddressNeighbourhoodNumber = null, int $varAddressHamletNumber = null, string $varPostalCode = null, string $varCardSerialNumber = null)
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
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'], 

                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varCardNumber, 'varchar'],
                            [$varIssuedDate, 'date'],
                            [$varAddressCountryAdministrativeAreaLevel1_RefID, 'bigint'],
                            [$varAddressCountryAdministrativeAreaLevel2_RefID, 'bigint'],
                            [$varAddressCountryAdministrativeAreaLevel3_RefID, 'bigint'],
                            [$varAddressCountryAdministrativeAreaLevel4_RefID, 'bigint'],
                            [$varAddress, 'varchar'],
                            [$varAddressNeighbourhoodNumber, 'smallint'],
                            [$varAddressHamletNumber, 'smallint'],
                            [$varPostalCode, 'varchar'],
                            [$varCardSerialNumber, 'varchar']                        
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-27                                                                                           |
        | ▪ Creation Date   : 2021-07-27                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (string) varCardNumber ► Card Number                                                                              |
        |      ▪ (string) varIssuedDate ► Issued Date                                                                              |
	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel1_RefID ► Address Country Administrative Area Level 1 Reference  |
        |                 ID                                                                                                       |
    	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel2_RefID ► Address Country Administrative Area Level 2 Reference  |
        |                 ID                                                                                                       |
    	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel3_RefID ► Address Country Administrative Area Level 3 Reference  |
        |                 ID                                                                                                       |
    	|      ▪ (int)    varAddressCountryAdministrativeAreaLevel4_RefID ► Address Country Administrative Area Level 4 Reference  |
        |                 ID                                                                                                       |
	|      ▪ (string) varAddress ► Address                                                                                     |
	|      ▪ (int)    varAddressNeighbourhoodNumber ► Address Neighbourhood Number                                             |
	|      ▪ (int)    varAddressHamletNumber ► Address Hamlet Number                                                           |
	|      ▪ (string) varPostalCode ► PostalCode                                                                               |
        |      ▪ (string) varCardSerialNumber ► Card Serial Number                                                                 |
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varLog_FileUpload_Pointer_RefID = null, string $varCardNumber = null, string $varIssuedDate = null, int $varAddressCountryAdministrativeAreaLevel1_RefID = null, int $varAddressCountryAdministrativeAreaLevel2_RefID = null, int $varAddressCountryAdministrativeAreaLevel3_RefID = null, int $varAddressCountryAdministrativeAreaLevel4_RefID = null, string $varAddress = null, int $varAddressNeighbourhoodNumber = null, int $varAddressHamletNumber = null, string $varPostalCode = null, string $varCardSerialNumber = null)
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
                            [$varSysPartitionRemovableRecordKeyRefType, 'varchar'],
                            [$varSysBranch_RefID, 'bigint'],

                            [$varLog_FileUpload_Pointer_RefID, 'bigint'],
                            [$varCardNumber, 'varchar'],
                            [$varIssuedDate, 'date'],
                            [$varAddressCountryAdministrativeAreaLevel1_RefID, 'bigint'],
                            [$varAddressCountryAdministrativeAreaLevel2_RefID, 'bigint'],
                            [$varAddressCountryAdministrativeAreaLevel3_RefID, 'bigint'],
                            [$varAddressCountryAdministrativeAreaLevel4_RefID, 'bigint'],
                            [$varAddress, 'varchar'],
                            [$varAddressNeighbourhoodNumber, 'smallint'],
                            [$varAddressHamletNumber, 'smallint'],
                            [$varPostalCode, 'varchar'],
                            [$varCardSerialNumber, 'varchar']                        
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }