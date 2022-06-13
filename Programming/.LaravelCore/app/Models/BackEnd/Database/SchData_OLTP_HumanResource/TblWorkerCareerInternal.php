<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchData_OLTP_HumanResource                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchData_OLTP_HumanResource
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblWorkerCareerInternal                                                                                      |
    | ▪ Description : Menangani Models Database ► SchData-OLTP-HumanResource ► TblWorkerCareerInternal                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblWorkerCareerInternal extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-10-22                                                                                           |
        | ▪ Creation Date   : 2021-10-22                                                                                           |
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
        | ▪ Method Name     : getDataEntities                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-10                                                                                           |
        | ▪ Creation Date   : 2022-06-10                                                                                           |
        | ▪ Description     : Get Data Entities                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities($varUserSession, 
            string $varIDSet)
            {
            $varFunctionName=('Func_GetDataEntities_'.str_replace('_Tbl', '', '_'.parent::getTableName($varUserSession)));
            $varTemp = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    parent::getSchemaName($varUserSession).'.'.$varFunctionName,
                    [
                        [$varUserSession, 'bigint'],
                        [$varIDSet, 'bigint[]']
                    ]
                    )
                );
            for ($i=0; $i!=count($varTemp['Data']); $i++)
                {
                $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                    $varUserSession, 
                    $varTemp['Data'][$i][$varFunctionName]);
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInitialize                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-05-23                                                                                           |
        | ▪ Creation Date   : 2022-05-23                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig-Initialize.Func_'.parent::getSchemaName($varUserSession).'_'.parent::getTableName($varUserSession),
                    []
                    )
                );
            return $varReturn['Data'][0];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataInsert                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2021-10-22                                                                                           |
        | ▪ Last Update     : 2021-10-22                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varWorker_RefID ► Worker Reference ID                                                                    |
        |      ▪ (int)    varWorkerType_RefID ► Worker Type Reference ID                                                           |
        |      ▪ (int)    varOrganizationalDepartment_RefID ► OrganizationalDepartment Reference ID                                |
        |      ▪ (int)    varOrganizationalJobPosition_RefID ► Organizational Job Position Reference ID                            |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        |      ▪ (int)    varDocumentEmploymentRelationship_RefID ► Document Employment Relationship Reference ID                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varWorker_RefID = null, int $varWorkerType_RefID = null, int $varOrganizationalDepartment_RefID = null, int $varOrganizationalJobPosition_RefID = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null, int $varDocumentEmploymentRelationship_RefID = null)
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
                        
                        [$varWorker_RefID, 'bigint'],
                        [$varWorkerType_RefID, 'bigint'],
                        [$varOrganizationalDepartment_RefID, 'bigint'],
                        [$varOrganizationalJobPosition_RefID, 'bigint'],
                        [$varValidStartDateTimeTZ, 'timestamptz'],
                        [$varValidFinishDateTimeTZ, 'timestamptz'],
                        [$varDocumentEmploymentRelationship_RefID, 'bigint']
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
        | ▪ Last Update     : 2021-10-22                                                                                           |
        | ▪ Creation Date   : 2021-10-22                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |      ▪ (int)    varWorker_RefID ► Worker Reference ID                                                                    |
        |      ▪ (int)    varWorkerType_RefID ► Worker Type Reference ID                                                           |
        |      ▪ (int)    varOrganizationalDepartment_RefID ► OrganizationalDepartment Reference ID                                |
        |      ▪ (int)    varOrganizationalJobPosition_RefID ► Organizational Job Position Reference ID                            |
        |      ▪ (string) varValidStartDateTimeTZ ► Valid Start DateTimeTZ                                                         |
        |      ▪ (string) varValidFinishDateTimeTZ ► Valid Finish DateTimeTZ                                                       |
        |      ▪ (int)    varDocumentEmploymentRelationship_RefID ► Document Employment Relationship Reference ID                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            int $varWorker_RefID = null, int $varWorkerType_RefID = null, int $varOrganizationalDepartment_RefID = null, int $varOrganizationalJobPosition_RefID = null, string $varValidStartDateTimeTZ = null, string $varValidFinishDateTimeTZ = null, int $varDocumentEmploymentRelationship_RefID = null)
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

                        [$varWorker_RefID, 'bigint'],
                        [$varWorkerType_RefID, 'bigint'],
                        [$varOrganizationalDepartment_RefID, 'bigint'],
                        [$varOrganizationalJobPosition_RefID, 'bigint'],
                        [$varValidStartDateTimeTZ, 'timestamptz'],
                        [$varValidFinishDateTimeTZ, 'timestamptz'],
                        [$varDocumentEmploymentRelationship_RefID, 'bigint']
                    ],
                    )
                );
            return $varReturn['Data'][0];
            }
        }
    }