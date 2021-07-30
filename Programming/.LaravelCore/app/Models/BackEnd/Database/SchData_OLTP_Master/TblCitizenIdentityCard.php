<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_Master                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_Master
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblCitizenIdentityCard                                                                                       |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCitizenIdentityCard                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCitizenIdentityCard extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-30                                                                                           |
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
        | ▪ Last Update     : 2021-07-30                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (string) varIssuedDate ► Issued Date                                                                              |
        |      ▪ (int)    varCitizenIdentity_RefID ► Citizen Identity Reference ID                                                 |
        |      ▪ (int)    varBloodAglutinogenType_RefID ► Blood Aglutinogen Type Reference ID                                      |
        |      ▪ (int)    varPersonProfession_RefID ► Person Profession Reference ID                                               |
        |      ▪ (int)    varPersonMaritalStatus_RefID ► Person Marital Status Reference ID                                        |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel1_RefID ► Address Country Administrative Area Level 1 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel2_RefID ► Address Country Administrative Area Level 2 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel3_RefID ► Address Country Administrative Area Level 3 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel4_RefID ► Address Country Administrative Area Level 4 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (string) varAddress ► Address                                                                                     |
	|      ▪ (int)    varAddressNeighbourhoodNumber ► Address Neighbourhood Number                                             |
	|      ▪ (int)    varAddressHamletNumber ► Address Hamlet Number                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varLog_FileUpload_Pointer_RefID = null, string $varIssuedDate = null, int $varCitizenIdentity_RefID = null, int $varBloodAglutinogenType_RefID = null, int $varPersonProfession_RefID = null, $varPersonMaritalStatus_RefID = null, int $varAddressCountryAdministrativeAreaLevel1_RefID = null, int $varAddressCountryAdministrativeAreaLevel2_RefID = null, int $varAddressCountryAdministrativeAreaLevel3_RefID = null, int $varAddressCountryAdministrativeAreaLevel4_RefID = null, string $varAddress = null, int $varAddressNeighbourhoodNumber = null, int $varAddressHamletNumber = null)
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
                        [$varIssuedDate, 'date'],
                        [$varCitizenIdentity_RefID, 'bigint'],
                        [$varBloodAglutinogenType_RefID, 'bigint'],
                        [$varPersonProfession_RefID, 'bigint'],
                        [$varPersonMaritalStatus_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel1_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel2_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel3_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel4_RefID, 'bigint'],
                        [$varAddress, 'varchar'],
                        [$varAddressNeighbourhoodNumber, 'smallint'],
                        [$varAddressHamletNumber, 'smallint']
                    ]
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-30                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID                                   |
        |      ▪ (string) varIssuedDate ► Issued Date                                                                              |
        |      ▪ (int)    varCitizenIdentity_RefID ► Citizen Identity Reference ID                                                 |
        |      ▪ (int)    varBloodAglutinogenType_RefID ► Blood Aglutinogen Type Reference ID                                      |
        |      ▪ (int)    varPersonProfession_RefID ► Person Profession Reference ID                                               |
        |      ▪ (int)    varPersonMaritalStatus_RefID ► Person Marital Status Reference ID                                        |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel1_RefID ► Address Country Administrative Area Level 1 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel2_RefID ► Address Country Administrative Area Level 2 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel3_RefID ► Address Country Administrative Area Level 3 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (int)    varAddressCountryAdministrativeAreaLevel4_RefID ► Address Country Administrative Area Level 4 Reference  |
        |                     ID                                                                                                   |
        |      ▪ (string) varAddress ► Address                                                                                     |
	|      ▪ (int)    varAddressNeighbourhoodNumber ► Address Neighbourhood Number                                             |
	|      ▪ (int)    varAddressHamletNumber ► Address Hamlet Number                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varLog_FileUpload_Pointer_RefID = null, string $varIssuedDate = null, int $varCitizenIdentity_RefID = null, int $varBloodAglutinogenType_RefID = null, int $varPersonProfession_RefID = null, $varPersonMaritalStatus_RefID = null, int $varAddressCountryAdministrativeAreaLevel1_RefID = null, int $varAddressCountryAdministrativeAreaLevel2_RefID = null, int $varAddressCountryAdministrativeAreaLevel3_RefID = null, int $varAddressCountryAdministrativeAreaLevel4_RefID = null, string $varAddress = null, int $varAddressNeighbourhoodNumber = null, int $varAddressHamletNumber = null)
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
                        [$varIssuedDate, 'date'],
                        [$varCitizenIdentity_RefID, 'bigint'],
                        [$varBloodAglutinogenType_RefID, 'bigint'],
                        [$varPersonProfession_RefID, 'bigint'],
                        [$varPersonMaritalStatus_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel1_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel2_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel3_RefID, 'bigint'],
                        [$varAddressCountryAdministrativeAreaLevel4_RefID, 'bigint'],
                        [$varAddress, 'varchar'],
                        [$varAddressNeighbourhoodNumber, 'smallint'],
                        [$varAddressHamletNumber, 'smallint']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }