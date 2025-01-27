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
namespace App\Http\Controllers\Application\BackEnd\System\FileHandlingOLD\Engines\upload\stagingArea\localStorage\setFileThenCopyToCloudStorage\v1
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
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!$varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_FileUpload(
                                $varUserSession, 
                                $this->dataProcessing(
                                    $varUserSession, 
                                    $varData['parameter']['log_FileUpload_Pointer_RefID'],
                                    $varData['parameter']['rotateLog_FileUploadStagingArea_RefRPK'],
                                    $varData['parameter']['sequence'],
                                    $varData['parameter']['name'],
                                    $varData['parameter']['size'],
                                    $varData['parameter']['MIME'],
                                    $varData['parameter']['extension'],
                                    $varData['parameter']['lastModifiedDateTimeTZ'],
                                    $varData['parameter']['lastModifiedUnixTimestamp'],                           
                                    $varData['parameter']['contentBase64']
                                    )
                                )
                            )
                            {
                            throw new \Exception();
                            }
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2021-07-21                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varLog_FileUpload_Pointer_RefID ► Log FileUpload Pointer Reference ID (Mandatory)                        |
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
        private function dataProcessing($varUserSession, int $varLog_FileUpload_Pointer_RefID = null, int $varRotateLog_FileUploadStagingArea_RefRPK, int $varFileSequence, string $varFileName, int $varFileSize, string $varFileMIME, string $varFileExtension, string $varFileLastModifiedDateTimeTZ, int $varFileLastModifiedUnixTimestamp, string $varFileContentBase64)
            {
            $varHashMethod_RefID = 199000000000002;
            $varFileContentBase64Hash =  
                \App\Helpers\ZhtHelper\General\Helper_Hash::getSHA256(
                    $varUserSession, 
                    $varFileContentBase64
                    );

            $varSignFileAlreadyExist = 
                ((new \App\Models\Database\SchSysAsset\General())->getData_FileUpload_IsFileAlreadyExist(
                    $varUserSession, 
                    $varLog_FileUpload_Pointer_RefID,
                    $varRotateLog_FileUploadStagingArea_RefRPK,
                    
                    $varFileName, 
                    $varFileSize, 
                    $varFileMIME, 
                    $varFileExtension, 
                    $varFileLastModifiedUnixTimestamp,
                    $varFileContentBase64Hash
                    ));

            if($varSignFileAlreadyExist == FALSE)
                {
               //---> Penyimpanan Record Baru ke TblRotateLog_FileUploadStagingAreaDetail
                $varRotateLog_FileUploadStagingAreaDetail_RefRPK = 
                    (new \App\Models\Database\SchSysConfig\TblRotateLog_FileUploadStagingAreaDetail())->setDataInsert(
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
                        $varHashMethod_RefID,
                        $varFileContentBase64Hash,
                        ''
                        )['SignRecordID'];

                (new \App\Models\Database\SchSysConfig\TblRotateLog_FileUploadStagingAreaDetail())->setURLDelete(
                    $varUserSession, 
                    $varRotateLog_FileUploadStagingAreaDetail_RefRPK, 
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::getURL_APICallByGetMethod(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_ByUserSessionID($varUserSession),
                        'transaction.delete.sysConfig.setRotateLog_FileUploadStagingAreaDetail', 
                        'latest', 
                        [
                        'recordPK' => $varRotateLog_FileUploadStagingAreaDetail_RefRPK
                        ],
                        NULL,
                        TRUE
                        )
                    );

                //---> Penyimpanan ke Local Storage Server
                (new \App\Models\LocalStorage\System\General())->createFile(
                    $varUserSession, 
                    base64_decode($varFileContentBase64), 
                    'Application/Upload/StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varRotateLog_FileUploadStagingAreaDetail_RefRPK);

                //---> Pemindahan File dari Local Storage Server ke Cloud
                (new \App\Models\CloudStorage\System\General())->copyFileToCloud(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varRotateLog_FileUploadStagingAreaDetail_RefRPK, 
                    'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varRotateLog_FileUploadStagingAreaDetail_RefRPK
                    );
                
                //---> Auto Create Thumbnail For Image MIME
                if (strcmp(explode('/', $varFileMIME)[0], 'image')==0)
                    {
                    $varNothing = 
                        (new \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\thumbnails\create\v1\create())->main(
                            $varUserSession, 
                            [
                            'parameter' => [
                                'filePath' => 'StagingArea/'.$varRotateLog_FileUploadStagingArea_RefRPK.'/'.$varRotateLog_FileUploadStagingAreaDetail_RefRPK
                                ]
                            ]
                            );
                    }
                }
            else
                {
                $varRotateLog_FileUploadStagingAreaDetail_RefRPK = NULL;
                }

            $varReturn = [
                'SignRecordID' => $varRotateLog_FileUploadStagingAreaDetail_RefRPK,
                ];
            
            return $varReturn;
            }            
        }
    }