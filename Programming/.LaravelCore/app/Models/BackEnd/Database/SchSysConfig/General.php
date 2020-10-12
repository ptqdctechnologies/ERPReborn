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
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Database ► SchSysConfig ► Non Specific Table                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General //extends \Illuminate\Database\Eloquent\Model
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isExist_APIWebToken                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Cek eksistensi APIWebToken pada sistem                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varAPIWebToken ► API Web Token                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isExist_APIWebToken($varUserSession, $varAPIWebToken)
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
        }
    }