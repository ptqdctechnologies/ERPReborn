<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\general\getFileEntities  |
|                \v1                                                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandlingOLD\Engines\upload\stagingArea\general\getFileEntities\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getFileEntities                                                                                              |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.general.getFileEntities Version 1                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getFileEntities extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
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
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Files List at Cloud Storage (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        $varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                $this->dataProcessing(
                                    $varUserSession,
                                    $varData['parameter']['recordPK']
                                    )
                                );

                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);                        
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
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
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varRecordPK ► Record Primary Key (Mandatory)                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varRecordPK)
            {
            $varData =
                (new \App\Models\Database\SchSysAsset\General())->getFileEntities_StagingArea(
                    $varUserSession, 
                    $varRecordPK
                    );
            
            $varDataReturn = [
                'Sys_RPK' => $varData['Sys_RPK'],
                'SignExistOnLocalStorage' => NULL,
                'SignExistOnCloudStorage' => NULL,
                'Sequence' => $varData['Sequence'],
                'Name' => $varData['Name'],
                'Size' => $varData['Size'],
                'MIME' => $varData['MIME'],
                'Extension' => $varData['Extension'],
                'LastModifiedDateTimeTZ' => $varData['LastModifiedDateTimeTZ'],
                'LastModifiedUnixTimestamp' => $varData['LastModifiedUnixTimestamp'],
                //'RotateLog_FileUploadStagingArea_RefRPK' => $varData['RotateLog_FileUploadStagingArea_RefRPK'],
                'LocalStoragePath' => 'Application/Upload/StagingArea/'.$varData['Path'],
                'CloudStoragePath' => 'StagingArea/'.$varData['Path'],
                'OrderSequence' => $varData['OrderSequence']
                ];
            
            $varDataReturn['SignExistOnLocalStorage'] = 
                (new \App\Models\LocalStorage\System\General())->isFileExist(
                    $varUserSession,
                    $varDataReturn['LocalStoragePath']
                    );

            if($varDataReturn['SignExistOnLocalStorage'] == FALSE) {
                $varDataReturn['LocalStoragePath'] = NULL;
                }
            
            $varDataReturn['SignExistOnCloudStorage'] =
                (new \App\Models\CloudStorage\System\General())->isFileExist(
                    $varUserSession, 
                    $varDataReturn['CloudStoragePath']
                    );

            if($varDataReturn['SignExistOnCloudStorage'] == FALSE) {
                $varDataReturn['CloudStoragePath'] = NULL;
                }
            
            return $varDataReturn;
            }
        }
    }