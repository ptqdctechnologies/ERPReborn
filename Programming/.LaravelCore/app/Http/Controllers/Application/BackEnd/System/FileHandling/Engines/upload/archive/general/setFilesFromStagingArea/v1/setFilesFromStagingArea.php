<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\archive\general                      |
|                \setFilesFromStagingArea\v1                                                                                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\archive\general\setFilesFromStagingArea\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setFilesFromStagingArea                                                                                      |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.general.setFilesFromStagingArea Version 1                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setFilesFromStagingArea extends \App\Http\Controllers\Controller
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
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create RotateLog File Upload Staging Area Data (version 1)');
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
        | ▪ Last Update     : 2022-08-05                                                                                           |
        | ▪ Creation Date   : 2022-08-05                                                                                           |
        | ▪ Description     : Fungsi Pemrosesan Data                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (int)    varLogFileUploadPointerRefID ► Log File Upload Pointer Reference  ID (Mandatory)                         |
        |      ▪ (int)    varStagingAreaRecordPK ► Staging Area Record Primary Key (Mandatory)                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varLogFileUploadPointerRefID = null, int $varStagingAreaRecordPK = null, array $varDeleteCandidate_RefIDArray = null)
            {
            if(!$varDeleteCandidate_RefIDArray) {
                $varDeleteCandidate_RefIDArray = [];
                }
            
            //---> Inisialisasi varLogFileUploadPointerRefID
            if(!$varLogFileUploadPointerRefID) {
                $varLogFileUploadPointerRefID =
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Pointer())->setDataInsert(
                        $varUserSession, 
                        null,
                        null,
                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                        \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),
                        
                        NULL
                        )['SignRecordID'];
                //dd($varLogFileUploadPointerRefID);
                }


            //---> Menghapus Data Object Detail
            for ($i=0, $iMax = count($varDeleteCandidate_RefIDArray); $i!=$iMax; $i++)
                {
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_ObjectDetail())->setDataDelete(
                    $varUserSession, 
                    $varDeleteCandidate_RefIDArray[$i]
                    );                
                }


            //---> Mencari LogFileUploadPointerHistoryRefID Sebelumnya
            $varData = 
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getDataList_LogFileUploadPointerHistory(
                    $varUserSession, 
                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                    $varLogFileUploadPointerRefID
                    );
            $varLogFileUploadPointerHistoryRefID = ((count($varData) == 0) ? NULL : $varData[0]['Sys_ID']);
            //dd($varLogFileUploadPointerHistoryRefID);


            //---> Mencari Log_FileUpload_Object_RefID Sebelumnya
            $varArrayID_LogFileUploadObject = [];
            if ($varLogFileUploadPointerHistoryRefID)
                {
                /*
                $varData = 
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getDataList_LogFileUploadPointerHistoryDetail(
                        $varUserSession, 
                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                        $varLogFileUploadPointerHistoryRefID
                        );
                */
                $varData = 
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getList_LogFileUploadObjectByExistantion(
                        $varUserSession, 
                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                        $varLogFileUploadPointerHistoryRefID
                        );

                for($i=0, $iMax=count($varData); $i!=$iMax; $i++)
                    {
                    $varArrayID_LogFileUploadObject[$i] = $varData[$i]['Log_FileUpload_Object_RefID'];
                    }
                }
            //dd($varArrayID_LogFileUploadObject);


            //---> Jika Ada Penambahan File-File Baru dari Staging Area
            if ($varStagingAreaRecordPK) {
               //---> Penyusunan JSON dari data MasterFileRecord yang berasal dari Staging Area
                $varJSON_Log_FileUpload_ObjectDetail = 
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getFileUpload_DataMovementFromStagingAreaToArchieve(
                        $varUserSession, 
                        $varLogFileUploadPointerRefID,
                        $varStagingAreaRecordPK,
                        $varDeleteCandidate_RefIDArray
                        );
                //dd($varJSON_Log_FileUpload_ObjectDetail);


                //---> Pemasukan Data pada TblLog_FileUpload_Object dan TblLog_FileUpload_ObjectDetail
                $varSysID_Log_FileUpload_Object = 
                    (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Object())->setDataInsert(
                        $varUserSession, 
                        null,
                        null,
                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                        \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                        $varStagingAreaRecordPK,
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                            $varUserSession, 
                            $varJSON_Log_FileUpload_ObjectDetail)
                        )['SignRecordID'];
                ($varSysID_Log_FileUpload_Object);


                //---> Mencari Data Path Pemindahan lalu memindahkan File dari Staging Area ke Archive Cloud
                $varSQL = '
                    SELECT
                        "StagingAreaFilePath",
                        "ArchiveFilePath"
                    FROM 
                        "SchData-OLTP-DataAcquisition"."Func_GetDataList_Log_FileUpload_ObjectDetail"(
                            '.(\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'].'::bigint, 
                            '.$varSysID_Log_FileUpload_Object.'::bigint
                            )
                    ORDER BY
                        "Sequence" ASC
                    ';
                $varData = \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    $varSQL
                    )['Data'];
//                dd($varData);

//                for($i=0, $iMax=count($varData); $i!=$iMax; $i++)
//                    {
//                    }
              
                for($i=0, $iMax=count($varData); $i!=$iMax; $i++)
                    {
                    //---> Memindahkan File dari Staging Area ke Archive
                    (new \App\Models\CloudStorage\System\General())->moveFile(
                        $varUserSession, 
                        $varData[$i]['StagingAreaFilePath'], 
                        $varData[$i]['ArchiveFilePath']
                        );

                    //---> Memindahkan Thumbnails dari Staging Area ke Archive
                    $varArrayStagingAreaFilePath = explode('/', $varData[$i]['StagingAreaFilePath']);
                    $varArrayArchiveAreaFilePath = explode('/', $varData[$i]['ArchiveFilePath']);
                    
                    (new \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\combined\thumbnails\setFilesMovement\v1\setFilesMovement())->main(
                        $varUserSession,
                        [
                        'parameter' => [
                            'sourceFolderPath' => 'Thumbnails/'.$varArrayStagingAreaFilePath[0].'/'.$varArrayStagingAreaFilePath[2],
                            'destinationFolderPath' => 'Thumbnails/'.$varArrayArchiveAreaFilePath[0].'/'.$varArrayArchiveAreaFilePath[2]
                            ]
                        ]
                        );
                    }
                //dd($varData);  
                
                //---> Menggabungkan Data baru pada Log_FileUpload_Object_RefID
                $varArrayID_LogFileUploadObject[count($varArrayID_LogFileUploadObject)] = $varSysID_Log_FileUpload_Object;
                //dd($varArrayID_LogFileUploadObject);
                }


            $varSysID_Log_FileUpload_PointerHistory = 
                (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_PointerHistory())->setDataInsert(
                    $varUserSession, 
                    null,
                    null,
                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                    \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                    $varLogFileUploadPointerRefID, 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession, 
                        (new \App\Models\Database\SchData_OLTP_DataAcquisition\General())->getJSONAdditionalData_Log_FileUpload_PointerHistory(
                            $varUserSession, 
                            $varArrayID_LogFileUploadObject
                            )
                        )
                    )['SignRecordID'];
            //dd($varSysID_Log_FileUpload_PointerHistory);

            (new \App\Models\Database\SchData_OLTP_DataAcquisition\TblLog_FileUpload_Pointer())->setDataUpdate(
                $varUserSession, 
                $varLogFileUploadPointerRefID, 
                null, 
                null,
                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                $varSysID_Log_FileUpload_PointerHistory
                );

            return 
                ['Log_FileUpload_Pointer_RefID' => (int) $varLogFileUploadPointerRefID];
            }
        }
    }