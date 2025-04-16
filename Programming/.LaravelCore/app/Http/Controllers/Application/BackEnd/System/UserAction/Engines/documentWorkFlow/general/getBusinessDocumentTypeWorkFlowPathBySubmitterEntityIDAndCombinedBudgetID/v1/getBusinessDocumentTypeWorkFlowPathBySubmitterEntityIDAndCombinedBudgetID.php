<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\UserAction\Engines\documentWorkFlow\general                      |
|                \getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID\v1                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\UserAction\Engines\documentWorkFlow\general\getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID                                    |
    | ▪ Description : Menangani API userAction.documentWorkFlow.general.                                                           |
    |                 getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID Version 1                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-02                                                                                           |
        | ▪ Creation Date   : 2023-03-02                                                                                           |
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
        | ▪ Last Update     : 2023-03-02                                                                                           |
        | ▪ Creation Date   : 2023-03-02                                                                                           |
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
            /*
            $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];
            
            // GET DATA MASTER BUDGET 
            $varBusinessDocumentTypeWorkFlowPath =
                (new \App\Models\Database\SchSysConfig\General())->getBusinessDocumentTypeWorkFlowPath(
                    $userSessionID,
                    $branchID,
                    $varData['parameter']['businessDocumentType_RefID']
                );

            //SET REDIS BUDGET

            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                $userSessionID,
                "BusinessDocumentTypeWorkFlowPath" . $varData['parameter']['businessDocumentType_RefID'],
                json_encode($varBusinessDocumentTypeWorkFlowPath),
                // $varTTL
            );

            return [];

            */
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Business Document Work Flow Path Approvement History By Submitter Entity ID (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                         if (!($varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                (new \App\Models\Database\SchSysConfig\General())->getBusinessDocumentTypeWorkFlowPath(
                                    $varUserSession,
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                                    $varData['parameter']['businessDocumentType_RefID'],
                                    $varData['parameter']['submitterEntity_RefID'],
                                    $varData['parameter']['combinedBudget_RefID']
                                    )
                                )
                            ))
                            {
                            throw new \Exception();
                            }
                            
                        for ($i = 0, $iMax = count($varDataSend); $i != $iMax; $i++) {
                            $varDataSend[$i]['fullApproverPathArray'] = explode(' ► ', $varDataSend[$i]['fullApproverPath']);
                            //$tamp = json_decode($varDataSend[$i]['nextApproverPath'], true);
                            //$varDataSend[$i]['nextApprover_RefID'] = $tamp[0]['entities']['approverEntity_RefID'];
                            $varDataSend[$i]['nextApprover_RefID'] = ($varDataSend[$i]['nextApproverPath'][0]['entities']['approverEntity_RefID']);
                            }
                        //dd($varDataSend);

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                                );
                        }

                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Invalid SQL Syntax' . ($varErrorMessage ? ' (' . $varErrorMessage . ')' : '')
                                );
                        }
                     //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                     \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                            );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, ' . $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }
        catch (\Exception $ex) {
            }

        return
            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
        }
    }
}