<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\documentForm\general                         |
|                \getAllDocumentTypeByFormNumber\v1                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\documentForm\general\getAllDocumentTypeByFormNumber\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getAllDocumentTypeByFormNumber                                                                               |
    | ▪ Description : Menangani API report.form.documentForm.general.getAllDocumentTypeByFormNumber Version 1                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getAllDocumentTypeByFormNumber extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-21                                                                                           |
        | ▪ Creation date   : 2023-09-21                                                                                           |
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
        | ▪ Last Update     : 2023-09-21                                                                                           |
        | ▪ Creation date   : 2023-09-21                                                                                           |
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

            $varReturn = null;
            $varBufferDB =
                (new \App\Models\Database\SchData_OLTP_Master\General())->getBusinessDocumentLastVersionByFormNumberKeyword(
                    $varUserSession,
                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                    $varData['parameter']['formNumber'],
                    (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'approverEntity_RefID', $varData['parameter']) ? ((!is_null($varData['parameter']['approverEntity_RefID'])) ? $varData['parameter']['approverEntity_RefID'] : null) : null)
                );
            if (count($varBufferDB) == 1) {
                $varReturn =
                    (new \App\Models\Database\SchData_OLTP_Master\General())->getIDTranslation_BusinessDocumentVersionToBusinessDocumentForm(
                        $varUserSession,
                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                        $varBufferDB[0]['Sys_ID']
                    )[0]['BusinessDocumentForm_RefID'];
            }


            $userSessionID = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            $branchID = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($userSessionID)['branchID'];

            $varTTL = 86400; // 24 Jam
            // GET DATA 
            $varCheckDocumentTypeID =
                (new \App\Models\Database\SchData_OLTP_Master\General())->getReport_Form_DocumentForm_AllDocumentType(
                    $userSessionID,
                    $branchID,
                    $varData['parameter']['recordID']

                );

            //SET REDIS

            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                $userSessionID,
                "ShowCheckDocumentTypeID",
                json_encode($varCheckDocumentTypeID),
                $varTTL
            );

            return [];




            //     $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            //     try {
            //         $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Report Form - All Document Type Form By Form Number (version 1)');
            //         try {
            //             //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
            //             try {
            //                 $varRecordID = 
            //                     $this->dataProcess(
            //                         $varUserSession,
            //                         $varData['parameter']['formNumber'],
            //                         (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'approverEntity_RefID', $varData['parameter']) ? ((!is_null($varData['parameter']['approverEntity_RefID'])) ? $varData['parameter']['approverEntity_RefID'] : null) : null)
            //                         );

            //                 if (is_null($varRecordID))
            //                     {
            //                     $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, 'Invalid Form Number');                            
            //                     }
            //                 else
            //                     {
            //                     if (!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchData_OLTP_Master\General())->getReport_Form_DocumentForm_AllDocumentType(
            //                         $varUserSession, 
            //                         (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

            //                         $varRecordID
            //                         ))))
            //                         {
            //                         throw new \Exception();
            //                         }
            //                     $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
            //                     }

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


            // private function dataProcess($varUserSession, string $varFormNumber, int $varApproverEntity_RefID = null)
            //     {
            //     $varReturn = null;
            //     $varBufferDB = 
            //         (new \App\Models\Database\SchData_OLTP_Master\General())->getBusinessDocumentLastVersionByFormNumberKeyword(
            //             $varUserSession, 
            //             (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
            //             $varFormNumber,
            //             $varApproverEntity_RefID
            //             );
            //     if (count($varBufferDB) == 1) {
            //         $varReturn = 
            //             (new \App\Models\Database\SchData_OLTP_Master\General())->getIDTranslation_BusinessDocumentVersionToBusinessDocumentForm(
            //                 $varUserSession, 
            //                 (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 
            //                 $varBufferDB[0]['Sys_ID']
            //                 )[0]['BusinessDocumentForm_RefID'];
            //         }
            //     return $varReturn;
        }
    }
}
