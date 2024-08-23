<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\general\setFilesAppend\v1            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\FileHandling\Engines\upload\general\setFilesAppend\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setFilesAppend                                                                                               |
    | ▪ Description : Menangani API fileHandling.upload.general.setFilesAppend Version 1                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setFilesAppend extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-23                                                                                           |
        | ▪ Creation Date   : 2024-08-23                                                                                           |
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
        | ▪ Last Update     : 2024-08-23                                                                                           |
        | ▪ Creation Date   : 2024-08-23                                                                                           |
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
                        //dd($varData);
                        $varDataSend = 
                            $this->dataProcessing(
                                $varUserSession,
                                $varData);
                        //dd($varDataSend);
                        
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
            
            for ($i = 0, $iMax = count($varData['parameter']['additionalData']['itemList']['items']); $i != $iMax; $i++)
                {
                $varAdditionalDataElement[$i] = [
                    'entities' => [
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
                        ]
                    ];
                }
            
            $varAdditionalData = [
                'itemList' => [
                    'items' => $varAdditionalDataElement
                    ]
                ];
            
            $varReturn =
                \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                        $varUserSession,
                        'SchSysAsset.FuncSys_FileHandling_SetFilesAppend',
                        [
                            [$varUserSession, 'bigint'],
                            [$varData['parameter']['log_FileUpload_Pointer_RefID'], 'bigint'],
                            
                            [((count($varAdditionalData) === 0) ? null : \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varAdditionalData)), 'json']

                        ]
                        )
                    );
            
            $varReturn['data'][0] = [
                'log_FileUpload_Pointer_RefID' => $varReturn['data'][0]['Log_FileUpload_Pointer_RefID'],
                'JSONData' => 
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                        $varUserSession,
                        $varReturn['data'][0]['JSONData']
                        )
                ];

            return $varReturn;
            }


        }
    }