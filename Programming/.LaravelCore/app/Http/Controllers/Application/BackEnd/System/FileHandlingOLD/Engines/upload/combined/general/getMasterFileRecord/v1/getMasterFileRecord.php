<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\general\getMasterFileRecord |
|                \v1                                                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 - 2022 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandlingOLD\Engines\upload\combined\general\getMasterFileRecord\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getMasterFileRecord                                                                                          |
    | ▪ Description : Menangani API fileHandling.upload.combined.general.getMasterFileRecord Version 1                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getMasterFileRecord extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2021-08-03                                                                                           |
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
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2021-08-03                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Destroy Staging Files data By ID (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        $varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                $this->dataProcessing(
                                    $varUserSession,
                                    $varData['parameter']['log_FileUpload_Pointer_RefID'],
                                    $varData['parameter']['rotateLog_FileUploadStagingArea_RefRPK'],
                                    $varData['parameter']['deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID']
                                    )
                                );
                                
                       // $varData = 
                        // (new \App\Models\Database\SchSysAsset\General())->getData_FileUpload_MasterFileRecord(
                        //     $varUserSession,
                        //     $varData['parameter']['log_FileUpload_Pointer_RefID'],
                        //     $varData['parameter']['rotateLog_FileUploadStagingArea_RefRPK'],
                        //     $varData['parameter']['deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID']
                        // );
                            
                        // $varDataSend = 
                        //     \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                        //         $varUserSession,
                        //         $varData            
                        // );


                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = 'file is not exist (Local Storage and Cloud Storage)';
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, ''.($varErrorMessage ? $varErrorMessage : ''));
                        }
                    //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, $ex->getMessage());
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : dataProcessing                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID (Mandatory)                       |
        |      ▪ (int)    varRotateLog_FileUploadStagingArea_RefRPK ► Rotate Log File Upload Staging Area Reference Record Primary |
        |                                                             Key (Mandatory)                                              |
        |      ▪ (array)  varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID ► Delete Candidate Log File Upload Object      |
        |                                                                             Detail Reference Array ID                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */

        // private function dataProcessing($varUserSession, int $varLog_FileUpload_Pointer_RefID = null)
        //     {

        //     $varData = 
        //         (new \App\Models\Database\SchSysAsset\General())->Func_GetDataPickSet_ArchivedFilesObject(
        //             $varUserSession,
        //             $varLog_FileUpload_Pointer_RefID
        //             );

        //     // for ($i=0, $iMax=count($varData['data']); $i!=$iMax; $i++)
        //     //     {
        //     //     if ((\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion($varUserSession, $varData['data'][$i]['signExistOnArchive'])) == TRUE)
        //     //         {
        //     //         $varData['data'][$i]['URLDelete'] = 
        //     //             \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::getURL_APICallByGetMethod(
        //     //                 $varUserSession, 
        //     //                 \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_ByUserSessionID($varUserSession),
        //     //                 'transaction.delete.dataAcquisition.setLog_FileUpload_ObjectDetail', 
        //     //                 'latest', 
        //     //                 [
        //     //                 'recordID' => $varData['data'][$i]['recordReference']
        //     //                 ],
        //     //                 NULL,
        //     //                 TRUE
        //     //                 );                    
        //     //         }
        //     //     }
        //     // //dd($varData['data']);
        //     $varDataReturn = $varData;
        //     return $varDataReturn;
        //     }
        // }

        private function dataProcessing($varUserSession, int $varLog_FileUpload_Pointer_RefID = null, int $varRotateLog_FileUploadStagingArea_RefRPK = null, array $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = null)
            {
            if(!$varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID) {
                $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID = [];
                }

            $varData = 
                (new \App\Models\Database\SchSysAsset\General())->getData_FileUpload_MasterFileRecord(
                    $varUserSession,
                    $varLog_FileUpload_Pointer_RefID,
                    $varRotateLog_FileUploadStagingArea_RefRPK,
                    $varDeleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID
                    );
            

            // for ($i=0, $iMax=count($varData['data']); $i!=$iMax; $i++)
            //     {
            //     if ((\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion($varUserSession, $varData['data'][$i]['SignExistOnArchive'])) == TRUE)
                    
            for ($i=0; $i < count($varData['data']); $i++)
            {
                if ((\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBooleanConvertion($varUserSession, $varData['data'][$i]['SignExistOnArchive'])) == TRUE)
                {
                    $varData['data'][$i]['URLDelete'] = 
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::getURL_APICallByGetMethod(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_ByUserSessionID($varUserSession),
                        'transaction.delete.dataAcquisition.setLog_FileUpload_ObjectDetail', 
                        'latest', 
                        [
                        'recordID' => $varData['data'][$i]['RecordReference']
                        ],
                        NULL,
                        TRUE
                        );
                }
            }
            //dd($varData['data']);
            $varDataReturn = $varData;
            return $varDataReturn;
            }
        }
    }