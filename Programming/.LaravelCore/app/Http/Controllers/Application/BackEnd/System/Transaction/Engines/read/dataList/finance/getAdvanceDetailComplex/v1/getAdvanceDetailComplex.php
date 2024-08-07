<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\finance\getAdvanceDetailComplex\v1    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\read\dataList\finance\getAdvanceDetailComplex\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getAdvanceDetailComplex                                                                                             |
    | ▪ Description : Menangani API transaction.read.dataList.finance.getAdvanceDetailComplex Version 1                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getAdvanceDetailComplex extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-06-02                                                                                           |
        | ▪ Creation Date   : 2022-06-02                                                                                           |
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
        | ▪ Last Update     : 2022-06-02                                                                                           |
        | ▪ Creation Date   : 2022-06-02                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------- -----------------------------------------------------------------------+
        */
        function main($varUserSession, $varData)
        {
            $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];

            $varTTL = 60; // 24 Jam
            // GET DATA MASTER AdvanceDetailComplex 

            if(is_numeric($varData['parameter']['advance_RefID'])){
                $varAdvanceDetailComplex =
                    (new \App\Models\Database\SchData_OLTP_Finance\General())->getDataList_AdvanceDetailComplex(
                        $userSessionID,
                        $branchID,
                        $varData['parameter']['advance_RefID']
                    );
            }
            else{
                $varAdvanceDetailComplex =
                (new \App\Models\Database\SchData_OLTP_Finance\General())->getDataList_AdvanceDetailComplex(
                    $userSessionID,
                    $branchID
                );

                $varAdvanceDetailComplex = collect($varAdvanceDetailComplex);
                $varAdvanceDetailComplex = $varAdvanceDetailComplex->where('DocumentNumber', $varData['parameter']['advance_RefID']);
            }

            //SET REDIS AdvanceDetailComplex

            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                $userSessionID,
                "DataListAdvanceDetailComplex",
                json_encode($varAdvanceDetailComplex),
                $varTTL
            );
            return [];

            // $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            // try {
            //     $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Advance Detail Data List (version 1)');
            //     try {
            //         //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
            //         try{
            //             if(($varData['SQLStatement']['filter']) && (\App\Helpers\ZhtHelper\Database\Helper_SQLValidation::isSecure_FilterStatement($varUserSession, $varData['SQLStatement']['filter']) == FALSE))
            //                 {
            //                 throw new \Exception('SQL Injection Threat Prevention');
            //                 }
            //             if(!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchData_OLTP_Finance\General())->getDataList_AdvanceDetailComplex(
            //                 $varUserSession, 
            //                 (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 

            //                 $varData['parameter']['advance_RefID'],

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
