<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\sysConfig                      |
|                \getAppObject_UserRoleGroup\v1                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\sysConfig\getAppObject_UserRoleGroup\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getAppObject_UserRoleGroup                                                                                   |
    | ▪ Description : Menangani API transaction.read.dataList.sysConfig.getAppObject_UserRoleGroup Version 1                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getAppObject_UserRoleGroup extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-16                                                                                           |
        | ▪ Creation Date   : 2024-01-16                                                                                           |
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
        }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-16                                                                                           |
        | ▪ Creation Date   : 2024-01-16                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        function main($varUserSession, $varData)
        {

            $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];

            $varTTL = 86400; // 24 Jam
            // GET DATA MASTER Departement 
            $varDepartement =
                (new \App\Models\Database\SchSysConfig\General())->getDataList_AppObject_UserRoleGroup(
                    $userSessionID,
                    $branchID
                );

            //SET REDIS Departement

            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                $userSessionID,
                "Departement",
                json_encode($varDepartement),
                // $varTTL
            );

            return [];


            // $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            // try {
            //     $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Role Group Data List (version 1)');
            //     try {
            //         //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
            //         try {
            //             if (($varData['SQLStatement']['filter']) && (\App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, $varData['SQLStatement']['filter']) == FALSE))
            //                 {
            //                 throw new \Exception('SQL Injection Threat Prevention');
            //                 }
            //             if (!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchSysConfig\General())->getDataList_AppObject_UserRoleGroup(
            //                 $varUserSession,
            //                 (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 

            //                 $varData['SQLStatement']['pick'], 
            //                 $varData['SQLStatement']['sort'], 
            //                 $varData['SQLStatement']['filter'], 
            //                 $varData['SQLStatement']['paging']
            //                 ))))
            //                 {
            //                 throw new \Exception();
            //                 }
            //             $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
            //             } 
            //         catch (\Exception $ex) {
            //             $varErrorMessage = $ex->getMessage();
            //             $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
            //             }
            //         //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
            //         \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
            //         } 
            //     catch (\Exception $ex) {
            //         $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
            //         \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
            //         }
            //     \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            //     } 
            // catch (\Exception $ex) {
            //     }
            // return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
        }
    }
}
