<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\download\general\getFileObject\v1           |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\download\general\getFileObject\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getFileObject                                                                                                |
    | ▪ Description : Menangani API fileHandling.download.archive.general.getFileObject Version 1                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getFileObject extends \App\Http\Controllers\Controller
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
            $varDataTemp = (explode('/', $varData['parameter']['filePath']));
            $varID = (int) $varDataTemp[count($varDataTemp)-1];
/*
            $varDataTemp = 
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    '
                    SELECT
                        "Name",
                        "MIME"
                    FROM
                        "SchData-Warehouse-Acquisition"."TblLog_FileUpload_ObjectDetail"
                    WHERE
                        (
                        "Sys_Data_Hidden_DateTimeTZ" IS NULL
                        AND
                        "Sys_Data_Delete_DateTimeTZ" IS NULL
                        AND
                            (
                            "Sys_PID" = '.$varID.'::bigint
                            OR
                            "Sys_PID" = '.$varID.'::bigint
                            )
                        )
                    '
                    )['data'][0];
            
            $varFileName = $varDataTemp['Name'];
            $varFileMIME = $varDataTemp['MIME'];
            
            dd($varDataTemp);
*/
            $download_me = "download me...";
            header("Content-type: text/plain");
            header("Content-Disposition: attachment; filename=test.txt");
            echo $download_me;
            die();
            }
            
/*
            
        function mainOLD($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get File Object By ID (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        $varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                $this->dataProcessing(
                                    $varUserSession,
                                    $varData['parameter']['encryptedData']
                                    )
                                );

                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = 'file is not exist on Cloud Storage';
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
*/

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : dataProcessing                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-02                                                                                           |
        | ▪ Creation Date   : 2023-10-02                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (string)  varFilePath ► File Path                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
            /*
        private function dataProcessing($varUserSession, string $varEncryptedData)
            {
            $varFilePath = 
                (new \App\Models\Database\SchSysAsset\General())->getDataDecrypt_HTTPGetParameter(
                    $varUserSession,
                    $varEncryptedData
                    );

            $varID = (int) explode('/', $varFilePath)[2];
            
            $varFileObjectInformation = 
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getArchivedFileObjectInformation(
                    $varUserSession, 
                    $varID
                    );

            $varFileContentBase64 = 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode
                    (
                    $varUserSession, 
                    (new \App\Models\CloudStorage\System\General())->getFileContent(
                        $varUserSession, 
                        $varFilePath
                        )
                    );

            $varDataReturn = [
                'recordID' => $varID,
                'name' => $varFileObjectInformation['FileName'],
                'size' => $varFileObjectInformation['FileSize'],
                'MIME' => $varFileObjectInformation['FileMIME'],
                'encodeMethod' => 'Base64',
                'encodedStreamData' => $varFileContentBase64
                ];

            return $varDataReturn;
            }
            
            
        private function dataProcessingXXX($varUserSession, string $varFilePath)
            {
            $varFileObjectInformation = 
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getArchivedFileObjectInformation(
                    $varUserSession, 
                    ((int) (explode('/', $varFilePath))[2])
                    );

            $varFileContentBase64 = 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode
                    (
                    $varUserSession, 
                    (new \App\Models\CloudStorage\System\General())->getFileContent(
                        $varUserSession, 
                        $varFilePath
                        )
                    );

            $varDataReturn = [
                'name' => $varFileObjectInformation['FileName'],
                'size' => $varFileObjectInformation['FileSize'],
                'MIME' => $varFileObjectInformation['FileMIME'],
                'encodeMethod' => 'Base64',
                'encodedStreamData' => $varFileContentBase64
                ];

            return $varDataReturn;
            }
            
             */
        }
    }