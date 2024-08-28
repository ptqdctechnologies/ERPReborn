<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\localStorage             |
|                \setBulkFilesThenCopyToCloudStorage\v1                                                                            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\localStorage\setBulkFilesThenCopyToCloudStorage\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setBulkFilesThenCopyToCloudStorage                                                                           |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.localStorage.setBulkFilesThenCopyToCloudStorage Version 1      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setBulkFilesThenCopyToCloudStorage extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-16                                                                                           |
        | ▪ Creation Date   : 2024-08-16                                                                                           |
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
                    try {
                        $this->dataProcessing(
                            $varUserSession,
                            $varData);

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


        private function dataProcessing($varUserSession, $varData)
            {
            $varHashMethod_RefID = 199000000000002;
            for ($i=0, $iMax = count($varData['parameter']['additionalData']['itemList']['items']); $i != $iMax; $i++)
                {
                $varData['parameter']['additionalData']['itemList']['items'][$i]['entities'] = 
                    [
                    'name' => $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['name'],
                    'size' => $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['size'],
                    'MIME' => $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['MIME'],
                    'extension' => $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['extension'],
                    'lastModifiedDateTimeTZ' => $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['lastModifiedDateTimeTZ'],
                    'lastModifiedUnixTimestamp' => $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['lastModifiedUnixTimestamp'],
                    'hashMethod_RefID' => $varHashMethod_RefID,
                    'contentBase64Hash' =>
                        \App\Helpers\ZhtHelper\General\Helper_Hash::getSHA256(
                            $varUserSession, 
                            $varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['contentBase64']
                            ),
                    'URLDelete' => null
                    ];
                }

            //---> Penyimpanan Record Baru ke TblRotateLog_FileUploadStagingArea dan TblRotateLog_FileUploadStagingAreaDetail
            $varRotateLog_FileUploadStagingArea_RefRPK = 
                (new \App\Models\Database\SchData_Warehouse_Acquisition\TblRotateLog_FileUploadStagingArea())->setDataInsert(
                    $varUserSession, 
                    null, 
                    'ERPReborn',
                     
                    $varData['parameter']['additionalData']
                    )['SignRecordID'];
            
            //$varRotateLog_FileUploadStagingArea_RefRPK = 8;
            
            $varReturn = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession,
                    '
                    SELECT
                        ("SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingArea"."Sys_RPK" || \'/\' || "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingAreaDetail"."Sys_RPK") AS "Path"
                    FROM
                        "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingAreaDetail"
                            LEFT JOIN
                                "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingArea"
                                    ON
                                        "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingAreaDetail"."RotateLog_FileUploadStagingArea_RefRPK" = "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingArea"."Sys_RPK"
                    WHERE
                        "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingAreaDetail"."Sys_Data_Delete_DateTimeTZ" IS NULL
                        AND
                        "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingAreaDetail"."Sys_Data_Hidden_DateTimeTZ" IS NULL
                        AND
                        "SchData-Warehouse-Acquisition"."TblRotateLog_FileUploadStagingAreaDetail"."RotateLog_FileUploadStagingArea_RefRPK" = '.$varRotateLog_FileUploadStagingArea_RefRPK.'::bigint
                    '
                    );
            
            for ($i = 0, $iMax = count($varReturn['data']); $i != $iMax; $i++)
                {
                //---> Penyimpanan ke Local Storage Server
                (new \App\Models\LocalStorage\System\General())->createFile(
                    $varUserSession, 
                    base64_decode($varData['parameter']['additionalData']['itemList']['items'][$i]['entities']['contentBase64']), 
                    'Application/Upload/StagingArea/'.$varReturn['data'][$i]['Path']);

                //---> Pemindahan File dari Local Storage Server ke Cloud
                (new \App\Models\CloudStorage\System\General())->copyFileToCloud(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession).'Application/Upload/StagingArea/'.$varReturn['data'][$i]['Path'], 
                    'StagingArea/'.$varReturn['data'][$i]['Path']
                    );
                }
            
            //dd($varReturn);
            
            dd($varData['parameter']['additionalData']);
            }


        }
    }