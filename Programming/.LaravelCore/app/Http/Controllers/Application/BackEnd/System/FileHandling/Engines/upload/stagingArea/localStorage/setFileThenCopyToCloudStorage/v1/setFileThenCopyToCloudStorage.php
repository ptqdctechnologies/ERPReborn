<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\localStorage             |
|                \setFileThenCopyToCloudStorage\v1                                                                                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\localStorage\setFileThenCopyToCloudStorage\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setFileThenCopyToCloudStorage                                                                                |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.localStorage.setFileThenCopyToCloudStorage Version 1           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setFileThenCopyToCloudStorage extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Creation Date   : 2021-07-21                                                                                           |
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
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Creation Date   : 2021-07-21                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set File on Local Storage (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try{
                        if(!$varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_FileUpload(
                            $varUserSession, 
                            $this->dataProcessing(
                                $varUserSession, 
                                $varData['entities']['rotateLog_FileUploadStagingArea_RefRPK'],
                                $varData['entities']['sequence'],
                                $varData['entities']['name'],
                                $varData['entities']['size'],
                                $varData['entities']['MIME'],
                                $varData['entities']['extension'],
                                $varData['entities']['contentBase64'],
                                $varData['entities']['lastModifiedDateTimeTZ'],
                                $varData['entities']['lastModifiedUnixTimestamp']                           
                                )
                            ))
                            {
                            throw new \Exception();
                            }
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
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varRotateLog_FileUploadStagingArea_RefRPK ► RotateLog FileUploadStagingArea Reference RPK (Mandatory)    |
        |      ▪ (int)    varFileSequence ► File Sequence (Mandatory)                                                              |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (int)    varFileSize ► File Size (Mandatory)                                                                      |
        |      ▪ (string) varFileMIME ► File MIME (Mandatory)                                                                      |
        |      ▪ (string) varFileExtension ► FileExtension (Mandatory)                                                             |
        |      ▪ (string) varFileContentBase64 ► File Content Base64 (Mandatory)                                                   |
        |      ▪ (string) varFileLastModifiedDateTimeTZ ► File Last Modified DateTimeTZ (Mandatory)                                |
        |      ▪ (int)    varFileLastModifiedUnixTimestamp ► File Last Modified Unix Timestamp (Mandatory)                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varRotateLog_FileUploadStagingArea_RefRPK, int $varFileSequence, string $varFileName, int $varFileSize, string $varFileMIME, string $varFileExtension, string $varFileContentBase64, string $varFileLastModifiedDateTimeTZ, int $varFileLastModifiedUnixTimestamp)
            {
            //---> Penyimpanan Record Baru ke TblRotateLog_FileUploadStagingAreaDetail
            $varSignRecordID = (new \App\Models\Database\SchSysConfig\TblRotateLog_FileUploadStagingAreaDetail())->setDataInsert(
                $varUserSession, 
                null, 
                $varRotateLog_FileUploadStagingArea_RefRPK,
                $varFileSequence,
                $varFileName, 
                $varFileSize, 
                $varFileMIME, 
                $varFileExtension, 
                $varFileLastModifiedDateTimeTZ, 
                $varFileLastModifiedUnixTimestamp,
                199000000000002,
                \App\Helpers\ZhtHelper\General\Helper_Hash::getSHA256(
                    $varUserSession, 
                    $varFileContentBase64
                    )
                )['SignRecordID'];

            //---> Penyimpanan ke Local Storage Server
            (new \App\Models\LocalStorage\System\General())->createFile(
                $varUserSession, 
                base64_decode($varFileContentBase64), 
                'Application/Upload/StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID);

            //---> Pemindahan File dari Local Storage Server ke Cloud
            (new \App\Models\CloudStorage\System\General())->copyFileToCloud(
                $varUserSession, 
                \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID, 
                'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varSignRecordID
                );

            $varReturn = [
                'SignRecordID' => $varSignRecordID,
                ];
            
            return $varReturn;
            }
        }
    }