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
    | ▪ Class Name  : TblCitizenIdentity                                                                                           |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-Master ► TblCitizenIdentity                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblCitizenIdentity extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-08                                                                                           |
        | ▪ Creation Date   : 2020-09-08                                                                                           |
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
        | ▪ Last Update     : 2020-11-10                                                                                           |
        | ▪ Creation Date   : 2020-11-10                                                                                           |
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
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig-Initialize.Func_'.parent::getSchemaName($varUserSession).'_'.parent::getTableName($varUserSession),
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-08-02                                                                                           |
        | ▪ Creation Date   : 2020-09-08                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPerson_RefID ► Reference ID                                                                           |
        |      ▪ (string) varName ► Person Name                                                                                    |
        |      ▪ (string) varIdentityNumber ► Identity Number                                                                      |
        |      ▪ (int)    varCitizenGender_RefID ► Citizen Gender Reference ID                                                     |
        |      ▪ (int)    varBirthPlace_RefID ► Birth Place Reference ID                                                           |
        |      ▪ (string) varBirthDateTime ► Birth DateTime                                                                        |
        |      ▪ (int)    varBloodAglutinogenType_RefID ► Blood Aglutinogen Type Reference ID                                      |
        |      ▪ (int)    varReligion_RefID ► Religion Reference ID                                                                |
        |      ▪ (int)    varCitizenProfession_RefID ► Citizen Profession Reference ID                                             |
        |      ▪ (int)    varCitizenMaritalStatus_RefID ► Citizen Marital Status Reference ID                                      |
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
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varPerson_RefID = null, string $varName = null, string $varIdentityNumber = null, int $varCitizenGender_RefID = null, int $varBirthPlace_RefID = null, string $varBirthDateTime = null, int $varBloodAglutinogenType_RefID = null, int $varReligion_RefID = null, int $varCitizenProfession_RefID = null, int $varCitizenMaritalStatus_RefID = null, int $varAddressCountryAdministrativeAreaLevel1_RefID = null, int $varAddressCountryAdministrativeAreaLevel2_RefID = null, int $varAddressCountryAdministrativeAreaLevel3_RefID = null, int $varAddressCountryAdministrativeAreaLevel4_RefID = null, string $varAddress = null, int $varAddressNeighbourhoodNumber = null, int $varAddressHamletNumber = null)
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

                            [$varPerson_RefID, 'bigint'],
                            [$varName, 'varchar'], 
                            [$varIdentityNumber, 'varchar'],
                            [$varCitizenGender_RefID, 'bigint'],
                            [$varBirthPlace_RefID, 'bigint'],
                            [$varBirthDateTime, 'timestamp'],
                            [$varBloodAglutinogenType_RefID, 'bigint'],
                            [$varReligion_RefID, 'bigint'],                       
                            [$varCitizenProfession_RefID, 'bigint'],
                            [$varCitizenMaritalStatus_RefID, 'bigint'],
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

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataUpdate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-08-02                                                                                           |
        | ▪ Creation Date   : 2020-09-08                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranch_RefID ► System Branch Reference ID                                                          |
        |        ----------------------------------------                                                                          |
        |      ▪ (int)    varPerson_RefID ► Reference ID                                                                           |
        |      ▪ (string) varName ► Person Name                                                                                    |
        |      ▪ (string) varIdentityNumber ► Identity Number                                                                      |
        |      ▪ (int)    varCitizenGender_RefID ► Citizen Gender Reference ID                                                     |
        |      ▪ (int)    varBirthPlace_RefID ► Birth Place Reference ID                                                           |
        |      ▪ (string) varBirthDateTime ► Birth DateTime                                                                        |
        |      ▪ (int)    varBloodAglutinogenType_RefID ► Blood Aglutinogen Type Reference ID                                      |
        |      ▪ (int)    varReligion_RefID ► Religion Reference ID                                                                |
        |      ▪ (int)    varCitizenProfession_RefID ► Citizen Profession Reference ID                                             |
        |      ▪ (int)    varCitizenMaritalStatus_RefID ► Citizen Marital Status Reference ID                                      |
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
        |        ----------------------------------------                                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranch_RefID = null,
            int $varPerson_RefID = null, string $varName = null, string $varIdentityNumber = null, int $varCitizenGender_RefID = null, int $varBirthPlace_RefID = null, string $varBirthDateTime = null, int $varBloodAglutinogenType_RefID = null, int $varReligion_RefID = null, int $varCitizenProfession_RefID = null, int $varCitizenMaritalStatus_RefID = null, int $varAddressCountryAdministrativeAreaLevel1_RefID = null, int $varAddressCountryAdministrativeAreaLevel2_RefID = null, int $varAddressCountryAdministrativeAreaLevel3_RefID = null, int $varAddressCountryAdministrativeAreaLevel4_RefID = null, string $varAddress = null, int $varAddressNeighbourhoodNumber = null, int $varAddressHamletNumber = null)
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

                            [$varPerson_RefID, 'bigint'],
                            [$varName, 'varchar'], 
                            [$varIdentityNumber, 'varchar'],
                            [$varCitizenGender_RefID, 'bigint'],
                            [$varBirthPlace_RefID, 'bigint'],
                            [$varBirthDateTime, 'timestamp'],
                            [$varBloodAglutinogenType_RefID, 'bigint'],
                            [$varReligion_RefID, 'bigint'],                       
                            [$varCitizenProfession_RefID, 'bigint'],
                            [$varCitizenMaritalStatus_RefID, 'bigint'],
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

            return
                $varReturn;
            }
        }
    }