<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\sysConfig                      |
|                \getAppObject_MenuLayout\v1                                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\sysConfig\getAppObject_MenuLayout\v1 {

    use Illuminate\Support\Facades\Redis;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getAppObject_MenuLayout                                                                                            |
    | ▪ Description : Menangani API transaction.read.dataList.sysConfig.getAppObject_MenuLayout Version 1                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getAppObject_MenuLayout extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                       |
        | ▪ Last Update     : 2022-12-30                                                                                           |
        | ▪ Creation Date   : 2022-12-30                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2024-01-17                                                                                           |
        | ▪ Creation Date   : 2022-12-30                                                                                           |
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

            $varTTL = 32400; // 9 Jam

            $varMenu =
                (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_MenuLayout(
                    $varUserSession,
                    $branchID,
                    $varData['parameter']['recordID']
                );
//            var_dump(json_encode($varMenu));

            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                $varUserSession,
                "RedisGetMenu" . $varData['parameter']['recordID'],
                json_encode($varMenu),
                $varTTL
                );
            
            //return $varMenu;
            return [];

            //     $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            //     try {
            //         $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Menu Data List (version 1)');
            //         try {
            //             //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
            //             try {
            //                 if (($varData['SQLStatement']['filter']) && (\App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, $varData['SQLStatement']['filter']) == FALSE))
            //                     {
            //                     throw new \Exception('SQL Injection Threat Prevention');
            //                     }
            //                 if (!($varDataSend = 
            //                     $this->dataProcessing(
            //                         $varUserSession,
            //                         \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchSysConfig\General())->getDataList_AppObject_Menu(
            //                             $varUserSession,
            //                             (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 

            //                             $varData['parameter']['menuGroup_RefID'],

            //                             $varData['SQLStatement']['pick'],
            //                             $varData['SQLStatement']['sort'],
            //                             $varData['SQLStatement']['filter'],
            //                             $varData['SQLStatement']['paging']
            //                             ))
            //                         )
            //                     ))
            //                     {
            //                     throw new \Exception();
            //                     }
            //                 $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
            //                 } 
            //             catch (\Exception $ex) {
            //                 $varErrorMessage = $ex->getMessage();
            //                 $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
            //                 }
            //             //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
            //             \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
            //             } 
            //         catch (\Exception $ex) {
            //             $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
            //             \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
            //             }
            //         \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            //         } 
            //     catch (\Exception $ex) {
            //         }
            //     return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            //     }

            // private function dataProcessing($varUserSession, array $varData = null)
            //     {
            //     $varReturn = null;
            //     try {
            //         if($varData)
            //             {
            //             for ($i = 0, $iMax = count($varData); $i != $iMax; $i++)
            //                 {
            //                 $varReturn[$i] = [
            //                     'Sys_ID' => $varData[$i]['sys_ID'],
            //                     'Sys_PID' => $varData[$i]['sys_PID'],
            //                     'Sys_SID' => $varData[$i]['sys_SID'],
            //                     'Sys_RPK' => $varData[$i]['sys_RPK'],
            //                     'Sys_Branch_RefID' => $varData[$i]['sys_Branch_RefID'],
            //                     'Key' => $varData[$i]['key'],
            //                     'Caption' => $varData[$i]['caption'],
            //                     'MenuAction' => (\App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, $varData[$i]['JSONDataMenuAction'])),
            //                     'OrderSequence' => $varData[$i]['orderSequence']
            //                     ];
            //                 }
            //             }
            //         else
            //             {
            //             throw new \Exception();
            //             }
            //         }
            //     catch (\Exception $ex) {
            //         }
            //     return $varReturn;
        }
    }
}
