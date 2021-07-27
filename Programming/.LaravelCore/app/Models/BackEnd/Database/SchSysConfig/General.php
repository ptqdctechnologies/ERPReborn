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
        | ▪ Description     : Mendapatkan APIWebToken SysEngine                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAPIWebToken_SysEngine($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.FuncSys_General_GetAPIWebToken_SysEngine',
                    [
                    ]
                    )
                );
            return $varReturn['Data'][0]['FuncSys_General_GetAPIWebToken_SysEngine'];
            }


        public function getDevicePersonAccess_LastRecordDateTimeTZ($varUserSession, int $varGoodsIdentityID, string $varTimeZoneOffset = null)
            {
            if(!$varTimeZoneOffset)
                {
                $varTimeZoneOffset = 'UTC';                
                }

            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn['Data'][0]['Func_Device_PersonAccess_GetLastRecordDateTimeTZ'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentDateTimeTZ                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-27                                                                                           |
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
            
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,            
                'SELECT EXTRACT(hour FROM (SELECT utc_offset FROM "pg_timezone_names" WHERE "name" ILIKE \''.$varTimeZoneNames.'\')::time)::smallint AS "UTCOffset";'
                );
            $varUTCOffset = $varReturn['Data'][0]['UTCOffset'];
            $varUTCOffset = ($varUTCOffset > 0 ? '+' : '-').(strlen($varUTCOffset) == 2 ? '' : '0').$varUTCOffset;
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,
                'SELECT (SELECT NOW() AT TIME ZONE \''.$varTimeZoneNames.'\') || \''.$varUTCOffset.'\' AS "Result";'
                //'SET TIMEZONE=\'Asia/Jakarta\'; SELECT NOW()::timestamptz;'
                );
            return $varReturn['Data'][0]['Result'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getCurrentYear                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-27                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,
                'SELECT DATE_PART(\'YEAR\', \''.$this->getCurrentDateTimeTZ($varUserSession).'\'::timestamptz);'
                //'SELECT DATE_PART(\'YEAR\', (SELECT NOW() AT TIME ZONE \'Asia/Jakarta\')::timestamptz);'
                //'SET TIMEZONE=\'Asia/Jakarta\'; SELECT DATE_PART(\'YEAR\', NOW());'
                );
            return (int) $varReturn['Data'][0]['date_part'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getReferenceTextByReferenceID                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-14                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,
                'SELECT "SchSysConfig"."FuncSys_General_GetReferenceTEXTByReferenceID"('.$varID.'::bigint);'
                );
            return $varReturn['Data'][0]['FuncSys_General_GetReferenceTEXTByReferenceID'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getYearByDate                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-27                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession,
                'SELECT DATE_PART(\'YEAR\', \''.($varDate ? $varDate : $this->getCurrentDateTimeTZ($varUserSession)).'\'::timestamptz);'
                );
            return (int) $varReturn['Data'][0]['date_part'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isExist_APIWebToken                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-24                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.FuncSys_General_GetExistantionOnSystem_APIWebToken',
                    [
                        [$varAPIWebToken, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0]['FuncSys_General_GetExistantionOnSystem_APIWebToken'];
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isSet_UserSessionBranchAndUserRole                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-06-24                                                                                           |
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
            
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                $varSQLQuery
                );
            
            return (boolean) $varReturn['Data'][0]['Sign'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setUserSessionBranchAndUserRole                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-16                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn['Data'][0]['FuncSys_General_SetUserSessionBranchAndUserRole'];
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.FuncSys_GetDataList_BranchAccess',
                    [
                        [$varUserSession, 'bigint']
                    ]
                    )
                );
            return $varReturn['Data'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataList_RotateLog_FileUploadStagingAreaDetail                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-23                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File Upload Staging Area Detail                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varRotateLog_FileUploadStagingArea_RefRPK ► Rotate Log File Upload Staging Area Reference RPK            |
        |      ▪ (string) varPickStatement ► Pick Statement                                                                        |
        |      ▪ (string) varSortStatement ► Sort Statement                                                                        |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        |      ▪ (string) varPagingStatement ► Paging Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataList_RotateLog_FileUploadStagingAreaDetail($varUserSession, int $varRotateLog_FileUploadStagingArea_RefRPK, string $varPickStatement = null, string $varSortStatement = null, string $varFilterStatement = null, string $varPagingStatement = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn['Data'];
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
        public function getDataList_UserRole($varUserSession, int $varBranchID)
            {
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.FuncSys_GetDataList_UserRole',
                    [
                        [$varUserSession, 'bigint'],
                        [$varBranchID, 'bigint']
                    ]
                    )
                );
            return $varReturn['Data'];
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                    $varUserSession,
                    'SchSysConfig.FuncSys_General_GetUserIDByName',
                    [
                        [$varName, 'varchar']
                    ]
                    )
                );
            return $varReturn['Data'][0]['FuncSys_General_GetUserIDByName'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getMenuByUserRoleIDAndBranchID                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-12-14                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn['Data'];
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::isValid_SQLSyntax($varUserSession, $varSQL);
            return $varReturn;
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn;
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn['Data'][0]['FuncSys_General_SetUserSessionLogout'];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : unsetDataDelete                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-11-09                                                                                           |
        | ▪ Description     : Membatalkan pennghapusan Data berdasarkan Record ID (varRecordID)                                    |
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
            $varReturn = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
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
            return $varReturn;
            }
        }
    }