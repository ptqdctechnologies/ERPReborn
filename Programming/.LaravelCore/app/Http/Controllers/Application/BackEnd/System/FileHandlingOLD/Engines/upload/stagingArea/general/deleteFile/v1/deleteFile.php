<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\general\deleteFile       |
|                \v1                                                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\general\deleteFile\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : deleteFile                                                                                                   |
    | ▪ Description : Menangani API fileHandling.upload.stagingArea.general.deleteFile Version 1                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class deleteFile extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2021-07-29                                                                                           |
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
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2021-07-29                                                                                           |
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
                        $varTemp = 
                            $this->dataProcessing(
                                $varUserSession,
                                $varData['parameter']['recordPK']
                                );
                        if(strcmp($varTemp['message'],'') == 0)
                            {
                            throw new \Exception();                            
                            }

                        $varDataSend = [
                            'message' => $varTemp['message']
                            ];

                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = 'file is not exist on Staging Area (Local Storage and Cloud Storage)';
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
        |      ▪ (int)    varRecordPK ► Record Primary Key (Mandatory)                                                             |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, int $varRecordPK)
            {
            $varMessage = '';
            $varData = 
                (new \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\stagingArea\general\getFileEntities\v1\getFileEntities())->main(
                    $varUserSession, 
                    [
                    'parameter' => [
                        'recordPK' => $varRecordPK
                        ]
                    ]
                    );
            
            if($varData['metadata']['successStatus'] == TRUE)
                {
                $varData = $varData['data'];
                //---> Hapus di Local Storage
                if($varData['signExistOnLocalStorage'] == TRUE)
                    {
                    (new \App\Models\LocalStorage\System\General())->deleteFile(
                        $varUserSession, 
                        $varData['localStoragePath']
                        );

                    $varMessage .= 'File on Local Storage ('.$varData['localStoragePath'].')';
                    }

                //---> Hapus di Cloud Storage
                if($varData['signExistOnCloudStorage'] == TRUE)
                    {
                    (new \App\Models\CloudStorage\System\General())->deleteFile(
                        $varUserSession, 
                        $varData['cloudStoragePath']
                        );

                    $varMessage .= ((strcmp($varMessage, '')==0) ? 'File on ' : ' and ').' Cloud Storage ('.$varData['cloudStoragePath'].')';
                    }

                //---> Hapus Record di Table Database
                (new \App\Models\Database\SchSysConfig\TblRotateLog_FileUploadStagingAreaDetail())->setDataDeleteByRPK(
                    $varUserSession, 
                    $varRecordPK
                    );
                }
            
            $varMessage .= ((strcmp($varMessage, '')==0) ? '' : ' has been deleted successfully');
            $varDataReturn = ['message' => $varMessage];
            return $varDataReturn;
            }
        }
    }