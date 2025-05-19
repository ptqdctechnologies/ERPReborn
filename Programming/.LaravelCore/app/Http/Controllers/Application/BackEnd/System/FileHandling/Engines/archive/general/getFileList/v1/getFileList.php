<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\archive\general\getFileList\v1              |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\archive\general\getFileList\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getFileList                                                                                                  |
    | ▪ Description : Menangani API fileHandling.archive.general.getFileList Version 1                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getFileList extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-26                                                                                           |
        | ▪ Creation Date   : 2024-08-26                                                                                           |
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
        | ▪ Last Update     : 2024-08-26                                                                                           |
        | ▪ Creation Date   : 2024-08-26                                                                                           |
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
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Get Files List at Cloud Storage (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        $varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                $this->dataProcessing(
                                    $varUserSession, 
                                    $varData['parameter']['log_FileUpload_Pointer_RefID']
                                    )
                                );

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
                                'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : '')
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

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }
                
            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : dataProcessing                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-26                                                                                           |
        | ▪ Creation Date   : 2024-08-26                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    $varLog_FileUpload_Pointer_RefID ► Log File Upload Pointer Reference ID (Mandatory)                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varLog_FileUpload_Pointer_RefID)
            {
            $varDataReturn = 
                (new \App\Models\Database\SchSysAsset\General())->getFileList(
                    $varUserSession,
                    $varLog_FileUpload_Pointer_RefID
                    );
//            dd($varDataReturn);
            
            /*
            dd($varDataList);
            
            $varDataList = 
                (new \App\Models\CloudStorage\System\General())->getFilesList(
                    $varUserSession, 
                    'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK
                    );

            $varArrayRPKPhysicalName = '';
            for ($i=0, $iMax=count($varDataList); $i!=$iMax; $i++)
                {
                if(strcmp($varArrayRPKPhysicalName, '')!=0)
                    {
                    $varArrayRPKPhysicalName .= ',';
                    }
                $varArrayRPKPhysicalName .= $varDataList[$i]['Name'];
                }
            $varArrayRPKPhysicalName = '{'.$varArrayRPKPhysicalName.'}';
            
            //--->
            $varDataReturn =
                (new \App\Models\Database\SchSysAsset\General())->getCloudStorageFilesList(
                    $varUserSession, 
                    $varRotateLog_FileUploadStagingArea_RefRPK,
                    $varArrayRPKPhysicalName
                    );
            
            //$varDataReturn = $varDataList;
            //$varDataReturn = ['xxx' => $varArrayRPKPhysicalName];
            //--->
             for ($i=0, $iMax=count($varDataReturn); $i!=$iMax; $i++)
                {
                if(((bool) $varDataReturn[$i]['SignExistOnStorage']) == TRUE) {
                    $varDataReturn[$i]['Path'] = 'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varDataReturn[$i]['Sys_RPK'];
                    }
                else {
                    $varDataReturn[$i]['Path'] = null;
                    }
                }
             * 
             */
            return $varDataReturn;
            }
        }
    }