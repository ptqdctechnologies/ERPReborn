<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysConfig                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchSysConfig
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : TblLog_UserLoginSession                                                                                      |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► TblLog_UserLoginSession                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class TblLog_UserLoginSession extends \App\Models\Database\DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-09-02                                                                                           |
        | ▪ Creation Date   : 2020-09-02                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-03-29                                                                                           |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Description     : Data Insert                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varLDAPUserID ► LDAP User ID                                                                             |
        |      ▪ (string) varAPIWebToken ► API Web Token                                                                           |
        |      ▪ (string) varOptionsList ► Options List                                                                            |
        |      ▪ (int)    varBranch_RefID ► Branch Reference ID                                                                    |
        |      ▪ (int)    varUserRole_RefID ► User Role Reference fID                                                              |
        |      ▪ (string) varSessionStartDateTimeTZ ► Session Start DateTimeTZ                                                     |
        |      ▪ (string) varSessionFinishDateTimeTZ ► Session Finish DateTimeTZ                                                   |
        |      ▪ (string) varSessionAutoStartDateTimeTZ ► Session Auto Start DateTimeTZ                                            |
        |      ▪ (string) varSessionAutoFinishDateTimeTZ ► Session Auto Finish DateTimeTZ                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataInsert(
            $varUserSession, 
            string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            string $varLDAPUserID = null, string $varAPIWebToken = null, string $varOptionsList = null, int $varBranch_RefID = null, int $varUserRole_RefID = null, string $varSessionStartDateTimeTZ = null, string $varSessionFinishDateTimeTZ = null, string $varSessionAutoStartDateTimeTZ = null, string $varSessionAutoFinishDateTimeTZ = null)
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
                            [$varSysBranchRefID, 'bigint'],

                            [$varLDAPUserID, 'varchar'],
                            [$varAPIWebToken, 'varchar'],
                            [$varOptionsList, 'json'],
                            [$varBranch_RefID, 'bigint'],
                            [$varUserRole_RefID, 'bigint'],
                            [$varSessionStartDateTimeTZ, 'timestamptz'],
                            [$varSessionFinishDateTimeTZ, 'timestamptz'],
                            [$varSessionAutoStartDateTimeTZ, 'timestamptz'],
                            [$varSessionAutoFinishDateTimeTZ, 'timestamptz']
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
        | ▪ Last Update     : 2023-03-29                                                                                           |
        | ▪ Creation Date   : 2020-08-28                                                                                           |
        | ▪ Description     : Data Update                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        |      ▪ (string) varSysDataAnnotation ► System Data Annotation                                                            |
        |      ▪ (string) varSysPartitionRemovableRecordKeyRefType ► System Partition Removable Record Key Reference Type          |
        |      ▪ (int)    varSysBranchRefID ► System Branch Reference ID                                                           |
        |        ----------------------------------------                                                                          |
        |      ▪ (string) varLDAPUserID ► LDAP User ID                                                                             |
        |      ▪ (string) varAPIWebToken ► API Web Token                                                                           |
        |      ▪ (string) varOptionsList ► Options List                                                                            |
        |      ▪ (int)    varBranch_RefID ► Branch Reference ID                                                                    |
        |      ▪ (int)    varUserRole_RefID ► User Role Reference fID                                                              |
        |      ▪ (string) varSessionStartDateTimeTZ ► Session Start DateTimeTZ                                                     |
        |      ▪ (string) varSessionFinishDateTimeTZ ► Session Finish DateTimeTZ                                                   |
        |      ▪ (string) varSessionAutoStartDateTimeTZ ► Session Auto Start DateTimeTZ                                            |
        |      ▪ (string) varSessionAutoFinishDateTimeTZ ► Session Auto Finish DateTimeTZ                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataUpdate(
            $varUserSession, 
            int $varSysID, string $varSysDataAnnotation = null, int $varSysPartitionRemovableRecordKeyRefType = null, int $varSysBranchRefID = null,
            string $varLDAPUserID = null, string $varAPIWebToken = null, string $varOptionsList = null, int $varBranch_RefID = null, int $varUserRole_RefID = null, string $varSessionStartDateTimeTZ = null, string $varSessionFinishDateTimeTZ = null, string $varSessionAutoStartDateTimeTZ = null, string $varSessionAutoFinishDateTimeTZ = null)
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
                        
                        [$varLDAPUserID, 'varchar'],
                        [$varAPIWebToken, 'varchar'],
                        [$varOptionsList, 'json'],
                        [$varBranch_RefID, 'bigint'],
                        [$varUserRole_RefID, 'bigint'],
                        [$varSessionStartDateTimeTZ, 'timestamptz'],
                        [$varSessionFinishDateTimeTZ, 'timestamptz'],
                        [$varSessionAutoStartDateTimeTZ, 'timestamptz'],
                        [$varSessionAutoFinishDateTimeTZ, 'timestamptz']
                    ],
                    )
                );

            return
                $varReturn;
            }
        }
    }

?>