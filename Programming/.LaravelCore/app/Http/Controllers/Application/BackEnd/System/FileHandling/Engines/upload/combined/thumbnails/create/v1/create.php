<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\thumbnails\create\v1        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\thumbnails\create\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : create                                                                                                       |
    | ▪ Description : Menangani API fileHandling.upload.combined.thumbnails.create Version 1                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class create extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
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
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
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
                                    $varData['parameter']['filePath']
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : dataProcessing                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (string) varFilePath ► File Path (Mandatory)                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, string $varFilePath = null)
            {
            //$varFilePath = 'Archive/92000000000132/12000000000158';
            //$varFilePath = 'Archive/92000000000133/12000000000159';
            //$varFilePath = 'Archive/92000000000134/12000000000160';
            //$varFilePath = 'StagingArea/1257/1101';
            
            
            $varFileContent = (new \App\Models\CloudStorage\System\General())->getFileContent($varUserSession, $varFilePath);
            
            $varFileMIME = explode(
                '/', 
                \App\Helpers\ZhtHelper\General\Helper_File::getMIMEOfFileContent($varUserSession, $varFileContent)
                );
            //dd($varFileMIME);

            //---> Convert Data ---> Image
            if($varFileMIME[0] == 'image')
                {
                $varDataTemp = 
                    \App\Helpers\ZhtHelper\General\Helper_ImageProcessing::getConvertDataContent_ImageToPNG(
                        $varUserSession, 
                        (new \App\Models\CloudStorage\System\General())->getFileContent(
                            $varUserSession,
                            $varFilePath
                            //'Archive/92000000000132/12000000000158'
                            ),
                        400,
                        300
                        );
                $varDataThumbnails[] = $varDataTemp;
                }
            //---> Convert Data ---> PDF
            elseif (($varFileMIME[0] == 'application') && (($varFileMIME[1] == 'pdf')))
                {
                $varDataTemp = 
                    \App\Helpers\ZhtHelper\General\Helper_ImageProcessing::getConvertDataContent_PDFToPNG(
                        $varUserSession, 
                        (new \App\Models\CloudStorage\System\General())->getFileContent(
                            $varUserSession,
                            $varFilePath
                            //'Archive/92000000000133/12000000000159'
                            ),
                        400,
                        300
                        );
                $varDataThumbnails = $varDataTemp;
                }
            //---> Convert Data ---> Office Document
            elseif (\App\Helpers\ZhtHelper\General\Helper_FileConvert::isOfficeDocument($varUserSession, $varFileMIME[0].'/'.$varFileMIME[1]) == TRUE)
                {
                $varDataTemp = 
                    \App\Helpers\ZhtHelper\General\Helper_ImageProcessing::getConvertDataContent_PDFToPNG(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\General\Helper_FileConvert::getConvertDataContent_OfficeToPDF(
                            $varUserSession,
                            (new \App\Models\CloudStorage\System\General())->getFileContent(
                                $varUserSession,
                                $varFilePath
                                //'Archive/92000000000134/12000000000160'
                                )
                            ),
                        400,
                        300
                        );
                $varDataThumbnails = $varDataTemp;
                }
            //---> Convert Data ---> Other Data
            else
                {                
                }


            if(count($varDataThumbnails) > 0)
                {
                //---> Save Data
                $varFilePathArray = explode(
                    '/',
                    $varFilePath
                    );
                $varFolderPathThumbnails = 
                    'Thumbnails/'.
                    (
                    (strcmp($varFilePathArray[0], 'Archive')==0) ? 
                        $varFilePathArray[0].'/'.$varFilePathArray[2] : 
                        $varFilePathArray[0].'/'.$varFilePathArray[2]
                    );


                for($i=0, $iMax = count($varDataThumbnails); $i != $iMax; $i++)
                    {
                    $varFilePathThumbnails = $varFolderPathThumbnails.'/'.str_pad($i, 10, '0', STR_PAD_LEFT).'.png';
                    //--->
                    (new \App\Models\CloudStorage\System\General())->createFile(
                        $varUserSession, 
                        $varFilePathThumbnails, 
                        $varDataThumbnails[$i]
                        );
                    //--->
                    $varDataReturn[$i] = [
                        'FilePath' => $varFilePathThumbnails
                        ];
                    }

                if(strcmp($varFilePathArray[0], 'Archive') == 0)
                    {
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Thumbnail())->setDataInsert(
                        $varUserSession, 
                        null, 
                        null, 
                        11000000000001, 
                        null, 
                        $varFilePathArray[2], 
                        (new \App\Models\Database\SchData_OLTP_Master\General())->getIDOfMIME(
                            $varUserSession, 
                            $varFileMIME[0].'/'.$varFileMIME[1]
                            ), 
                        $iMax
                        );                    
                    }
                }

            return $varDataReturn;
            }
        }
    }