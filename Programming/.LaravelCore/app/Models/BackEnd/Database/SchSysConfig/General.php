<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\Database\SchSysConfig                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020, 2021 Zheta (teguhpjs@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\Database\SchSysConfig
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► Non Specific Table                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General //extends \Illuminate\Database\Eloquent\Model
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAPIWebToken_SysEngine                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-25                                                                                           |
        | ▪ Creation Date   : 2021-01-25                                                                                           |
        | ▪ Description     : Mendapatkan APIWebToken SysEngine                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAPIWebToken_SysEngine(
            $varUserSession)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_GetAPIWebToken_SysEngine',
                        [
                        ]
                        )
                    );

            return
                $varReturn['data'][0]['FuncSys_General_GetAPIWebToken_SysEngine'];
            }
            

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrivilege_CombinedBudget                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
        | ▪ Description     : Mendapatkan User Privilege Combined Budget                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUser_RefID ► User Reference ID                                                                        |
        |      ▪ (int)    varBranch_RefID ► Branch Reference ID                                                                    |
        |      ▪ (int)    varUserRole_RefID ► User Role Reference ID                                                               |
        |      ▪ (string) varDateTimeTZ ► DateTimeTZ                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserPrivilege_CombinedBudget(
            $varUserSession, 
            int $varUser_RefID, int $varBranch_RefID, int $varUserRole_RefID, string $varDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetUserPrivilege_CombinedBudget',
                            [
                                [$varUser_RefID, 'bigint'],
                                [$varBranch_RefID, 'bigint'],
                                [$varUserRole_RefID, 'bigint'],
                                [$varDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrivilege_InstitutionBranch                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
        | ▪ Description     : Mendapatkan Privilege Branch                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUser_RefID ► User Reference ID                                                                        |
        |      ▪ (string) varDateTimeTZ ► DateTimeTZ                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserPrivilege_InstitutionBranch(
            $varUserSession, 
            int $varUser_RefID, string $varDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetUserPrivilege_InstitutionBranch',
                            [
                                [$varUser_RefID, 'bigint'],
                                [$varDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                return
                    $varReturn['data'];
                }

            catch (\Exception $ex) {
                return
                    [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrivilege_Menu                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
        | ▪ Description     : Mendapatkan User Privilege Menu                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUser_RefID ► User Reference ID                                                                        |
        |      ▪ (int)    varBranch_RefID ► Branch Reference ID                                                                    |
        |      ▪ (int)    varUserRole_RefID ► User Role Reference ID                                                               |
        |      ▪ (int)    varCombinedBudget_RefID ► Combined Budget Reference ID                                                   |
        |      ▪ (string) varDateTimeTZ ► DateTimeTZ                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserPrivilege_Menu(
            $varUserSession, 
            int $varUser_RefID, int $varBranch_RefID, int $varUserRole_RefID, int $varCombinedBudget_RefID, tring $varDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetUserPrivilege_Menu',
                            [
                                [$varUser_RefID, 'bigint'],
                                [$varBranch_RefID, 'bigint'],
                                [$varUserRole_RefID, 'bigint'],
                                [$varCombinedBudget_RefID, 'bigint'],
                                [$varDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );
                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrivilege_MenuLayout                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
        | ▪ Description     : Mendapatkan User Privilege Menu Layout                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBranch_RefID ► Branch Reference ID                                                                    |
        |      ▪ (int)    varUser_RefID ► User Reference ID                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserPrivilege_MenuLayout(
            $varUserSession, 
            int $varBranch_RefID, int $varUser_RefID)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetUserPrivilege_MenuLayout',
                            [
                                [$varBranch_RefID, 'bigint'],
                                [$varUser_RefID, 'bigint']
                            ]
                            )
                        );
                
                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_General_GetUserPrivilege_MenuLayout']
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserPrivilege_Role                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
        | ▪ Description     : Mendapatkan Privilege Branch                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUser_RefID ► User Reference ID                                                                        |
        |      ▪ (int)    varBranch_RefID ► Branch Reference ID                                                                    |
        |      ▪ (string) varDateTimeTZ ► DateTimeTZ                                                                               |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserPrivilege_Role(
            $varUserSession, 
            int $varUser_RefID, int $varBranch_RefID, string $varDateTimeTZ = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetUserPrivilege_Role',
                            [
                                [$varUser_RefID, 'bigint'],
                                [$varBranch_RefID, 'bigint'],
                                [$varDateTimeTZ, 'timestamptz']
                            ]
                            )
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getWorkFlowPathOfBusinessDocument                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-08                                                                                           |
        | ▪ Creation Date   : 2023-03-08                                                                                           |
        | ▪ Description     : Get WorkFlow Path Of Business Document                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document Reference ID                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getWorkFlowPathOfBusinessDocument(
            $varUserSession, 
            int $varBusinessDocument_RefID = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT '.
                        '"SchSysConfig"."Func_General_GetWorkFlowPathOfBusinessDocument"('.
                            $varBusinessDocument_RefID.'::bigint'.
                            ');'
                    );

            return
                (int) $varReturn['data'][0]['Func_General_GetWorkFlowPathOfBusinessDocument'];   
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationParameter_BaseCurrencyID                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-24                                                                                           |
        | ▪ Description     : Get Application Parameter Text ► Base Currency ID                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch Reference ID                                                                        |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varKey ► Key                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getApplicationParameter_BaseCurrencyID($varUserSession, int $varBranchID, string $varKey)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT "SchSysConfig"."FuncSys_General_GetParameterValue_App"('.
                        '\''.$varKey.'\'::varchar, '.
                        $varBranchID.'::bigint'.
                        ');'
                    );

            return (int) $varReturn['data'][0]['FuncSys_General_GetParameterValue_App'];            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentTypeWorkFlowPath                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-14                                                                                           |
        | ▪ Creation Date   : 2023-02-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Riwayat Persetujuan Jalur Work Flow Dokumen Bisnis                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        |      ▪ (int)    varSubmitterEntity_RefID ► Submitter Entity Reference ID                                                 |
        |      ▪ (int)    varCombinedBudget_RefID ► Submitter Entity Reference ID                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentTypeWorkFlowPath(
            $varUserSession, int $varBranchID, 
            int $varBusinessDocumentType_RefID = null, int $varSubmitterEntity_RefID = null, int $varCombinedBudget_RefID = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_GetDataList_BusinessDocumentTypeWorkFlowPath',
                            [
                                [$varBranchID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint'],
                                [$varSubmitterEntity_RefID, 'bigint'],
                                [$varCombinedBudget_RefID, 'bigint']
                            ]
                            )
                        );                

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentWorkFlowPathApprovementHistory                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-14                                                                                           |
        | ▪ Creation Date   : 2023-02-14                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Riwayat Persetujuan Jalur Work Flow Dokumen Bisnis                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document ID                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentWorkFlowPathApprovementHistory(
            $varUserSession, int $varBranchID, 
            int $varBusinessDocument_RefID = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetBusDocWorkFlowPathApprovementHistory',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varBusinessDocument_RefID, 'bigint' ]
                            ]
                            )
                        );                

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBusinessDocumentCurrentAndNextWorkFlowPathStage                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-14                                                                                           |
        | ▪ Creation Date   : 2023-02-14                                                                                           |
        | ▪ Description     : Mendapatkan Tahapan Saat ini dan Tahapan Selanjutnya pada Jalur Work Flow Dokumen Bisnis             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document ID                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBusinessDocumentCurrentAndNextWorkFlowPathStage(
            $varUserSession, int $varBranchID, 
            int $varBusinessDocument_RefID = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetBusDocCurrentAndNextWorkFlowPathStage',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varBusinessDocument_RefID, 'bigint' ]
                            ]
                            )
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        public function getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, int $varGoodsIdentityID, string $varTimeZoneOffset = null)
            {
            if(!$varTimeZoneOffset)
                {
                $varTimeZoneOffset = 'UTC';                
                }

            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_Device_PersonAccess_GetLastRecordDateTimeTZ',
                        [
                            [$varGoodsIdentityID, 'bigint'],
                            [$varTimeZoneOffset, 'varchar']
                        ]
                        )
                    );

            return $varReturn['data'][0]['Func_Device_PersonAccess_GetLastRecordDateTimeTZ'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentDateTimeTZ                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-27                                                                                           |
        | ▪ Creation Date   : 2021-01-27                                                                                           |
        | ▪ Description     : Get Current Date Time with TimeZone                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getCurrentDateTimeTZ($varUserSession)
            {
            $varTimeZoneNames = 'Asia/Jakarta';
            
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,            
                    'SELECT EXTRACT(hour FROM (SELECT utc_offset FROM "pg_timezone_names" WHERE "name" ILIKE \''.$varTimeZoneNames.'\')::time)::smallint AS "UTCOffset";'
                    );
            $varUTCOffset = $varReturn['data'][0]['UTCOffset'];
            $varUTCOffset = ($varUTCOffset > 0 ? '+' : '-').(strlen($varUTCOffset) == 2 ? '' : '0').$varUTCOffset;
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,
                'SELECT (SELECT NOW() AT TIME ZONE \''.$varTimeZoneNames.'\') || \''.$varUTCOffset.'\' AS "Result";'
                //'SET TIMEZONE=\'Asia/Jakarta\'; SELECT NOW()::timestamptz;'
                );

            return $varReturn['data'][0]['Result'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentYear                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-27                                                                                           |
        | ▪ Creation Date   : 2021-01-27                                                                                           |
        | ▪ Description     : Get Current Year                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getCurrentYear($varUserSession)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT DATE_PART(\'YEAR\', \''.$this->getCurrentDateTimeTZ($varUserSession).'\'::timestamptz);'
                    //'SELECT DATE_PART(\'YEAR\', (SELECT NOW() AT TIME ZONE \'Asia/Jakarta\')::timestamptz);'
                    //'SET TIMEZONE=\'Asia/Jakarta\'; SELECT DATE_PART(\'YEAR\', NOW());'
                    );

            return (int) $varReturn['data'][0]['date_part'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataEntities_ApproverEntity                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-07                                                                                           |
        | ▪ Creation Date   : 2023-02-07                                                                                           |
        | ▪ Description     : Get Data Entities - Approver Entity                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varSysID ► System Record ID                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataEntities_ApproverEntity($varUserSession, 
            string $varIDSet)
            {
            try {
                $varFunctionName='SchSysConfig.Func_GetDataEntities_ApproverEntity';
                $varTemp = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            $varFunctionName,
                            [
                                [$varUserSession, 'bigint'],
                                [$varIDSet, 'bigint[]']
                            ]
                            )
                        );

                for ($i=0; $i!=count($varTemp['data']); $i++)
                    {
                    $varReturn[$i] = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varTemp['data'][$i][explode('.', $varFunctionName)[1]]);
                    }

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_AppObject_WorkFlowPath                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-26                                                                                           |
        | ▪ Creation Date   : 2023-01-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Work Flow Path                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_AppObject_WorkFlowPath(
            $varUserSession, int $varBranchID, 
            int $varWorkFlowVersion_RefID = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_GetDataPickList_AppObject_WorkFlowPath',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varWorkFlowVersion_RefID, 'bigint' ]
                            ]
                            )
                        );                

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataPickList_getBusinessDocumentTypeWorkFlowPath                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-26                                                                                           |
        | ▪ Creation Date   : 2023-01-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Business Document Type Work Flow Path                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataPickList_getBusinessDocumentTypeWorkFlowPath(
            $varUserSession, int $varBranchID, 
            int $varBusinessDocumentType_RefID = null, int $varSubmitterEntity_RefID = null, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_GetDataPickList_BusinessDocumentTypeWorkFlowPath',
                            [
                                [$varBranchID, 'bigint'],

                                [$varBusinessDocumentType_RefID, 'bigint'],
                                [$varSubmitterEntity_RefID, 'bigint']
                            ]
                            )
                        );                

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getManualRemappingWorkFlowPathSequenceDestinationList                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-17                                                                                           |
        | ▪ Creation Date   : 2023-03-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Tujuan untuk Pemetaan Ulang Manual Urutan Jalur WorkFlow                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varWorkFlowPathSequence_RefID ► Work Flow Path Sequence Reference ID                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getManualRemappingWorkFlowPathSequenceDestinationList(
            $varUserSession, int $varBranchID, 
            int $varWorkFlow_RefID = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetWorkFlowPathSequenceManualRemapping_DstList',
                            [
                                [$varUserSession, 'bigint'],

                                [$varWorkFlow_RefID, 'bigint']
                            ]
                            )
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getManualRemappingWorkFlowPathSequenceSourceList                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-17                                                                                           |
        | ▪ Creation Date   : 2023-03-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Sumber untuk Pemetaan Ulang Manual Urutan Jalur WorkFlow                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varWorkFlowPathSequence_RefID ► Work Flow Path Sequence Reference ID                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getManualRemappingWorkFlowPathSequenceSourceList(
            $varUserSession, int $varBranchID, 
            int $varWorkFlow_RefID = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetWorkFlowPathSequenceManualRemapping_SrcList',
                            [
                                [$varUserSession, 'bigint'],

                                [$varWorkFlow_RefID, 'bigint']
                            ]
                            )
                        );

                return $varReturn['data'];
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReferenceTextByReferenceID                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-14                                                                                           |
        | ▪ Creation Date   : 2021-07-14                                                                                           |
        | ▪ Description     : Get Reference Text By Reference ID                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varID ► Record ID                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getReferenceTextByReferenceID($varUserSession, int $varID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT "SchSysConfig"."FuncSys_General_GetReferenceTEXTByReferenceID"('.$varID.'::bigint);'
                    );

            return $varReturn['data'][0]['FuncSys_General_GetReferenceTEXTByReferenceID'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserRolePrivilege                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-02                                                                                           |
        | ▪ Creation Date   : 2023-01-02                                                                                           |
        | ▪ Description     : Get User Role Privilege                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch Reference ID                                                                        |
        |      ▪ (int)    varUserID ► User Reference ID                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserRolePrivilege($varUserSession, int $varUserID, int $varBranchID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT "SchSysConfig"."Func_General_GetUserRolePrivilege"('.$varUserID.'::bigint, '.$varBranchID.'::bigint);'
                    );
            //var_dump('SELECT "SchSysConfig"."Func_General_GetUserRolePrivilege"('.$varBranchID.'::bigint, '.$varUserID.'::bigint)');
            
            return
                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                    $varUserSession,
                    $varReturn['data'][0]['Func_General_GetUserRolePrivilege']
                    );
            }


        /*oke 
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserRolePrivilegeMenuAndBudget                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-02                                                                                           |
        | ▪ Creation Date   : 2023-01-02                                                                                           |
        | ▪ Description     : Get User Role Privilege Menu And Budget                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch Reference ID                                                                        |
        |      ▪ (int)    varUserID ► User Reference ID                                                                            |
        |      ▪ (int)    varUserRoleID ► User Role Reference ID                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserRolePrivilegeMenuAndBudget($varUserSession, int $varUserID, int $varBranchID, int $varUserRoleID = null)
            {
            $varSQL = '
                SELECT 
                    "SchSysConfig"."Func_General_GetUserPrivilege_MenuAccess"(
                        '.$varUserID.'::bigint,
                        '.$varBranchID.'::bigint,
                        '.$varUserRoleID.'::bigint
                        )
                ';

            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    $varSQL
                    );
            //dd($varReturn);

            return
                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                    $varUserSession,
                    $varReturn['data'][0]['Func_General_GetUserPrivilege_MenuAccess']
                    );
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getYearByDate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-27                                                                                           |
        | ▪ Creation Date   : 2021-07-27                                                                                           |
        | ▪ Description     : Get Year By Date                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varDate ► Date (Optional)                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (int)    varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getYearByDate($varUserSession, string $varDate = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    'SELECT DATE_PART(\'YEAR\', \''.($varDate ? $varDate : $this->getCurrentDateTimeTZ($varUserSession)).'\'::timestamptz);'
                    );

            return (int) $varReturn['data'][0]['date_part'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getWorkFlowVersionByWorkFlowPathID                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-15                                                                                           |
        | ▪ Creation Date   : 2023-02-15                                                                                           |
        | ▪ Description     : Mendapatkan Versi Work Flow dari ID Jalur Work Flow                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varWorkFlowPath_RefID ► Work Flow Path Reference ID                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getWorkFlowVersionByWorkFlowPathID(
            $varUserSession, int $varBranchID, 
            int $varWorkFlowPath_RefID = null)
            {
            try {
                $varReturnTemp = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_GetWorkFlowVersionByWorkFlowPathID',
                            [                           
                                [$varWorkFlowPath_RefID, 'bigint']
                            ]
                            )
                        );

                $varReturn = [
                    'workFlowVersion_SysID' => $varReturnTemp['data'][0]['BaseWorkFlowVersion_SysID'],
                    'version' => $varReturnTemp['data'][0]['BaseVersion']
                    ];

                return $varReturn;
                }
            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isExist_APIWebToken                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-03-03                                                                                           |
        | ▪ Creation Date   : 2020-08-24                                                                                           |
        | ▪ Description     : Cek eksistensi APIWebToken pada sistem                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API Web Token                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isExist_APIWebToken($varUserSession, string $varAPIWebToken)
            {
            $varData = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_GetExistantionOnSystem_APIWebToken',
                        [
                            [$varAPIWebToken, 'varchar']
                        ]
                        )
                    );

            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion($varUserSession, $varData['data'][0]['FuncSys_General_GetExistantionOnSystem_APIWebToken']);

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isSet_UserSessionBranchAndUserRole                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-06-24                                                                                           |
        | ▪ Creation Date   : 2021-06-24                                                                                           |
        | ▪ Description     : Cek eksistensi apakah UserSessionBranch And UserRole sudah diset untuk APIWebToken tertentu          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API Web Token                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isSet_UserSessionBranchAndUserRole($varUserSession, string $varAPIWebToken)
            {
            $varSQLQuery = '
                SELECT
                    CASE
                        WHEN (COUNT("Sys_RPK") = 0) THEN
                            FALSE
                        ELSE
                            TRUE
                    END AS "Sign"
                FROM
                    "SchSysConfig"."TblLog_UserLoginSession"
                WHERE
                    "APIWebToken" = \''.$varAPIWebToken.'\'
                    AND
                        (
                        "Branch_RefID" IS NOT NULL
                        OR
                        "UserRole_RefID" IS NOT NULL
                        )
                ';
            
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    $varSQLQuery
                    );

            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion($varUserSession, $varReturn['data'][0]['Sign']);

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setActionForBusinessDocumentWorkFlowPath                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-14                                                                                           |
        | ▪ Creation Date   : 2023-02-14                                                                                           |
        | ▪ Description     : Menyimpan Aksi Approver pada Jalur Work Flow Dokumen Bisnis                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocument_RefID ► Business Document Reference ID                                               |
        |      ▪ (int)    varWorkFlowPath_RefID ► Work Flow Path Reference ID                                                      |
        |      ▪ (int)    varWorkFlowPathAction_RefID ► Work Flow Path Action Reference ID                                         |
        |      ▪ (string) varRemarks ► Remarks                                                                                     |
        |      ▪ (int)    varApproverEntity_RefID ► Approver Entity Reference ID                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setActionForBusinessDocumentWorkFlowPath(
            $varUserSession, int $varBranchID, 
            int $varBusinessDocument_RefID = null, int $varWorkFlowPath_RefID = null, int $varWorkFlowPathAction_RefID = null, string $varRemarks = null, int $varApproverEntity_RefID = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession,
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_General_SetActionForBusinessDocumentWorkFlowPath',
                            [
                                [$varUserSession, 'bigint'],

                                [$varBusinessDocument_RefID, 'bigint'],
                                [$varWorkFlowPath_RefID, 'bigint'],
                                [$varWorkFlowPathAction_RefID, 'bigint'],
                                [$varRemarks, 'varchar'],
                                [$varApproverEntity_RefID, 'bigint']
                            ]
                            )
                        );

                return
                    $varReturn['data'][0];
                }

            catch (\Exception $ex) {
                return [];
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setUserSessionBranchAndUserRole                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-16                                                                                           |
        | ▪ Creation Date   : 2020-10-16                                                                                           |
        | ▪ Description     : Penyimpanan UserSessionBranch (varBranchID) dan UserRole (varUserRoleID) sesuai ID Record            |
        |                     (varRecordID)                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        |      ▪ (int)    varUserRoleID ► User Role ID                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setUserSessionBranchAndUserRole($varUserSession, int $varRecordID, int $varBranchID, int $varUserRoleID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_SetUserSessionBranchAndUserRole',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint'],
                            [$varBranchID, 'bigint'],
                            [$varUserRoleID, 'bigint']
                        ]
                        )
                    );

            return $varReturn['data'][0]['FuncSys_General_SetUserSessionBranchAndUserRole'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_Menu                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-17                                                                                           |
        | ▪ Creation Date   : 2023-01-11                                                                                           |
        | ▪ Description     : Mendapatkan Daftar User Role                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUserRoleGroup_RefID ► User Role Group_Reference ID                                                    |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_Menu(
            $varUserSession, int $varBranchID,
            int $varUserRoleGroup_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_Menu',
                        [
                            [$varBranchID, 'bigint'],
                            
                            [$varUserRoleGroup_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_MenuGroup                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-17                                                                                           |
        | ▪ Creation Date   : 2024-01-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Menu Group                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_MenuGroup(
            $varUserSession, int $varBranchID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_MenuGroup',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_MenuGroupMember                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-17                                                                                           |
        | ▪ Creation Date   : 2024-01-17                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Menu Group Member                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varMenuGroup_RefID ► Menu Group_Reference ID                                                             |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_MenuGroupMember(
            $varUserSession, int $varBranchID,
            int $varMenuGroup_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_MenuGroupMember',
                        [
                            [$varBranchID, 'bigint'],
                            
                            [$varMenuGroup_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_UserRole                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-16                                                                                           |
        | ▪ Creation Date   : 2022-12-30                                                                                           |
        | ▪ Description     : Mendapatkan Daftar User Role                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUserRoleGroup_RefID ► User Role Group_Reference ID                                                    |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_UserRole(
            $varUserSession, int $varBranchID,
            int $varUserRoleGroup_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_UserRole',
                        [
                            [$varBranchID, 'bigint'],
                            
                            [$varUserRoleGroup_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_UserRoleGroup                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-16                                                                                           |
        | ▪ Creation Date   : 2024-01-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar User Role Group                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_UserRoleGroup(
            $varUserSession, int $varBranchID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_UserRoleGroup',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_UserRoleGroupMember                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-16                                                                                           |
        | ▪ Creation Date   : 2024-01-16                                                                                           |
        | ▪ Description     : Mendapatkan Daftar User Role Group Member                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUserRoleGroup_RefID ► User Role Group_Reference ID                                                    |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_UserRoleGroupMember(
            $varUserSession, int $varBranchID,
            int $varUserRoleGroup_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_UserRoleGroupMember',
                        [
                            [$varBranchID, 'bigint'],
                            
                            [$varUserRoleGroup_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_UserRolePrivileges                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-25                                                                                           |
        | ▪ Creation Date   : 2024-01-25                                                                                           |
        | ▪ Description     : Mendapatkan Daftar User Role Privileges                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varUserRole_RefID ► User Role Reference ID                                                               |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_UserRolePrivileges(
            $varUserSession, int $varBranchID,
            int $varUserRole_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_UserRolePrivileges',
                        [
                            [$varBranchID, 'bigint'],
                            
                            [$varUserRole_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_WorkFlow                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-12-28                                                                                           |
        | ▪ Creation Date   : 2022-12-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar WorkFlow                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_WorkFlow(
            $varUserSession, int $varBranchID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_WorkFlow',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_WorkFlowPath                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-24                                                                                           |
        | ▪ Creation Date   : 2023-01-24                                                                                           |
        | ▪ Description     : Mendapatkan Daftar WorkFlow Path                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varWorkFlowVersion_RefID ► WorkFlow Version Reference ID                                                 |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_WorkFlowPath(
            $varUserSession, int $varBranchID,
            int $varWorkFlowVersion_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_WorkFlowPath',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varWorkFlowVersion_RefID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            for ($i=0, $iMax=count($varReturn['data']); $i!=$iMax; $i++)
                {
                $varReturn['data'][$i]['AlternativeItemList'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['data'][$i]['AlternativeItemList']
                        );

                $varReturn['data'][$i]['NextApproverPath'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['data'][$i]['NextApproverPath']
                        );
                }

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_WorkFlowPathSequence                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-25                                                                                           |
        | ▪ Creation Date   : 2023-01-25                                                                                           |
        | ▪ Description     : Mendapatkan Daftar WorkFlow Path Sequence                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varWorkFlowPath_RefID ► WorkFlow Version Reference ID                                                 |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_WorkFlowPathSequence(
            $varUserSession, int $varBranchID,
            int $varWorkFlowPath_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_WorkFlowPathSequence',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varWorkFlowPath_RefID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_AppObject_WorkFlowVersion                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-12-28                                                                                           |
        | ▪ Creation Date   : 2022-12-28                                                                                           |
        | ▪ Description     : Mendapatkan Daftar WorkFlow Version                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varWorkFlow_RefID ► WorkFlow Reference ID                                                                |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_AppObject_WorkFlowVersion(
            $varUserSession, int $varBranchID,
            int $varWorkFlow_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_AppObject_WorkFlowVersion',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varWorkFlow_RefID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BusinessDocumentTypeWorkFlowPath                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-26                                                                                           |
        | ▪ Creation Date   : 2023-01-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Business Document Type WorkFlow Path                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varBusinessDocumentType_RefID ► Business Document Type Reference ID                                      |
        |      ▪ (int)    varSubmitterEntity_RefID ► Submitter Entity Reference ID                                                 |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BusinessDocumentTypeWorkFlowPath(
            $varUserSession, int $varBranchID,
            int $varBusinessDocumentType_RefID = null, int $varSubmitterEntity_RefID = null,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_BusinessDocumentTypeWorkFlowPath',
                        [
                            [$varBranchID, 'bigint'],

                            [$varBusinessDocumentType_RefID, 'bigint'],
                            [$varSubmitterEntity_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            for ($i=0, $iMax=count($varReturn['data']); $i!=$iMax; $i++)
                {
                $varReturn['data'][$i]['AlternativeItemList'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['data'][$i]['AlternativeItemList']
                        );

                $varReturn['data'][$i]['NextApproverPath'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        $varReturn['data'][$i]['NextApproverPath']
                        );
                }

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_DBObject_Schema                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-12-29                                                                                           |
        | ▪ Creation Date   : 2022-12-29                                                                                           |
        | ▪ Description     : Mendapatkan Daftar WorkFlow                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_DBObject_Schema(
            $varUserSession, int $varBranchID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_DBObject_Schema',
                        [
                            [$varBranchID, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_BranchAccess                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan Akses Cabang berdasarkan User Session ID (varUserSessionID)               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_BranchAccess($varUserSession)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_GetDataList_BranchAccess',
                        [
                            [$varUserSession, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_Log_BusinessDocumentWorkFlowPathHistory                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-09                                                                                           |
        | ▪ Creation Date   : 2023-02-09                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Log Business Document Work Flow Path History                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varLog_BusinessDocumentWorkFlowPathHistory_RefID ► Log Business Document Work Flow Path History          |
        |                                                                    Reference ID                                          |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_Log_BusinessDocumentWorkFlowPathHistory(
            $varUserSession, int $varBranchID,
            int $varLog_BusinessDocumentWorkFlowPathHistory_RefID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_Log_BusinessDocumentWorkFlowPathHistory',
                        [
                            [$varBranchID, 'bigint'],

                            [$varLog_BusinessDocumentWorkFlowPathHistory_RefID, 'bigint'],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_RotateLog_FileUploadStagingArea                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File Upload Staging Area                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_RotateLog_FileUploadStagingArea($varUserSession, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_RotateLog_FileUploadStagingArea',
                        [
                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_RotateLog_FileUploadStagingAreaDetail                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-23                                                                                           |
        | ▪ Creation Date   : 2021-07-23                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File Upload Staging Area Detail                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ▪ (int)    varRotateLog_FileUploadStagingArea_RefRPK ► Rotate Log File Upload Staging Area Reference RPK            |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_RotateLog_FileUploadStagingAreaDetail($varUserSession, 
            int $varRotateLog_FileUploadStagingArea_RefRPK, 
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.Func_GetDataList_RotateLog_FileUploadStagingAreaDetail',
                        [
                            [$varRotateLog_FileUploadStagingArea_RefRPK, 'bigint' ],

                            [$varPickStatement, 'varchar'],
                            [$varSortStatement, 'varchar'],
                            [$varFilterStatement, 'varchar'],
                            [$varPagingStatement, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_UserRole                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-08                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Pilihan User Role berdasarkan User Session ID (varUserSessionID) dan Branch ID    |
        |                     (varBranchID)                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_UserRole($varUserSession, int $varUserID, int $varBranchID = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_GetDataList_UserRole',
                        [
                            [$varUserID, 'bigint'],
                            [$varBranchID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataListJSON_AppObject_UserRoleGroup                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-11-18                                                                                           |
        | ▪ Creation Date   : 2024-11-18                                                                                           |
        | ▪ Description     : Mendapatkan Daftar User Role Group                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ------------------------------                                                                                      |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataListJSON_AppObject_UserRoleGroup(
            $varUserSession, int $varBranchID,
            string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            try {
                $varReturn = 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                            $varUserSession,
                            'SchSysConfig.Func_GetDataListJSON_AppObject_UserRoleGroup',
                            [
                                [$varBranchID, 'bigint' ],

                                [$varPickStatement, 'varchar'],
                                [$varSortStatement, 'varchar'],
                                [$varFilterStatement, 'varchar'],
                                [$varPagingStatement, 'varchar']
                            ]
                            )
                        );

                $varReturn['data'] = 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['Func_GetDataListJSON_AppObject_UserRoleGroup']
                        );

                return
                    $varReturn['data'];
                }

            catch (Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserIDByName                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-12                                                                                           |
        | ▪ Description     : Mendapatkan User ID berdasarkan Name (varName)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varName ► Name                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserIDByName($varUserSession, string $varName)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_GetUserIDByName',
                        [
                            [$varName, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'][0]['FuncSys_General_GetUserIDByName'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getMenuByUserRoleIDAndBranchID                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-14                                                                                           |
        | ▪ Creation Date   : 2020-12-14                                                                                           |
        | ▪ Description     : Mendapatkan Menu berdasarkan User Role ID (varUserRoleIDe) dan Branch ID (varBranchID)               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (int)    varUserRoleID ► User Role ID                                                                             |
        |      ▪ (int)    varBranchID ► Branch ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getMenuByUserRoleIDAndBranchID($varUserSession, int $varUserRoleID, int $varBranchID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_GetUserRolePrivilegesMenu',
                        [
                            [$varUserRoleID, 'bigint'],
                            [$varBranchID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn['data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserMainEntitiesByLDAPUserID                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-29                                                                                           |
        | ▪ Creation Date   : 2023-03-29                                                                                           |
        | ▪ Description     : Mendapatkan Entities Utama Pengguna berdasarkan ID Pengguna LDAP (varLDAPUserID)                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (int)    varUserSessionID ► User Session ID                                                                       |
        |      ▪ (string) varLDAPUserID ► User LDAP ID                                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserMainEntitiesByLDAPUserID($varUserSessionID, string $varLDAPUserID = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_GetUserMainEntitiesByLDAPUserID',
                        [
                            [$varUserSessionID, 'bigint'],
                            [$varLDAPUserID, 'varchar']
                        ]
                        )
                    );

            return
                $varReturn['data'];            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isValid_SQLSyntax                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-19                                                                                           |
        | ▪ Description     : Mendapatkan User ID berdasarkan Name (varName)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varName ► Name                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isValid_SQLSyntax($varUserSession, string $varSQL)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::isValid_SQLSyntax(
                    $varUserSession, 
                    $varSQL
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataDelete                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-09                                                                                           |
        | ▪ Description     : Menghapus Data berdasarkan Record ID (varRecordID)                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataDelete($varUserSession, int $varRecordID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_SetRecordDelete',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataDeleteByRPK                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Menghapus Data berdasarkan Record Primary Key (varRecordPK)                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSchemaName ► Schema Name                                                                              |
        |      ▪ (string) varTableName ► Table Name                                                                                |
        |      ▪ (int)    varRecordPK ► Record Primary Key                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataDeleteByRPK($varUserSession, string $varSchemaName, string $varTableName, int $varRecordPK)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_SetRecordDeleteByRPK',
                        [
                            [$varUserSession, 'bigint'],
                            [$varSchemaName, 'varchar'],
                            [$varTableName, 'varchar'],
                            [$varRecordPK, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataHide                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Menyembunyikan Data berdasarkan Record ID (varRecordID)                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setDataHide($varUserSession, int $varRecordID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_SetRecordHide',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setUserSessionLogout                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-06                                                                                           |
        | ▪ Description     : Mengeset Logout User Session berdasarkan User Session ID (varUserSessionID)                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varUserSessionID ► User Session ID                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setUserSessionLogout($varUserSession, int $varUserSessionID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_SetUserSessionLogout',
                        [
                            [$varUserSession, 'bigint'],
                            [$varUserSessionID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn['data'][0]['FuncSys_General_SetUserSessionLogout'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataDelete                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-09                                                                                           |
        | ▪ Description     : Membatalkan penghapusan Data berdasarkan Record ID (varRecordID)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataDelete($varUserSession, int $varRecordID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_UnsetRecordDelete',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataDeleteByRPK                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Membatalkan penghapusan Data berdasarkan Record Primary Key (varRecordPK)                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSchemaName ► Schema Name                                                                              |
        |      ▪ (string) varTableName ► Table Name                                                                                |
        |      ▪ (int)    varRecordPK ► Record Primary Key                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataDeleteByRPK($varUserSession, string $varSchemaName, string $varTableName, int $varRecordRPK)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_UnsetRecordDeleteByRPK',
                        [
                            [$varUserSession, 'bigint'],
                            [$varSchemaName, 'varchar'],
                            [$varTableName, 'varchar'],
                            [$varRecordRPK, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }
            
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataHide                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-03-08                                                                                           |
        | ▪ Description     : Membatalkan penyembunyian Data berdasarkan Record ID (varRecordID)                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRecordID ► Record ID                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function unsetDataHide($varUserSession, int $varRecordID)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysConfig.FuncSys_General_UnsetRecordHide',
                        [
                            [$varUserSession, 'bigint'],
                            [$varRecordID, 'bigint']
                        ]
                        )
                    );

            return
                $varReturn;
            }
        }
    }