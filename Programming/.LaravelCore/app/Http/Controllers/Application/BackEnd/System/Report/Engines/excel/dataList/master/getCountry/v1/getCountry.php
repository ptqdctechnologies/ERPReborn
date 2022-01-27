<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\excel\dataList\master\getCountry\v1               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\excel\dataList\master\getCountry\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCountry                                                                                                   |
    | ▪ Description : Menangani API report.excel.dataList.master.getCountry Version 1                                              |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCountry extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-21                                                                                           |
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
        | ▪ Last Update     : 2022-01-21                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Country Data List Excel Report (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try{
                        if(!($varDataSend = $this->dataProcessing(
                            $varUserSession,
                            $varData['outputFileName'],
                            [
                            'Title' => 'Country List',
                            'SubTitle' => [
                                ]
                            ],
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                                $varUserSession,
                                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken'],
                                    'transaction.read.dataList.master.getCountry', 
                                    'latest', 
                                    [
                                    'parameter' => null,
                                    'SQLStatement' => [
                                        'pick' => null,
                                        'sort' => null,
                                        'filter' => null,
                                        'paging' => null
                                        ]
                                    ]
                                    )['data'],
                            \App\Helpers\ZhtHelper\General\Helper_Network::getServerIPAddress($varUserSession)
                            )))
                            {
                            throw new \Exception();
                            }
                            
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Data not found');
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
        | ▪ Last Update     : 2022-01-21                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (string) varFileName ► File Name (Mandatory)                                                                      |
        |      ▪ (array)  varDataHeader ► Data Header (Optional)                                                                   |
        |      ▪ (array)  varDataList ► Data List (Optional)                                                                       |
        |      ▪ (string) varQRCode ► QR Code (Optional)                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, $varFileName, array $varDataHeader = null, array $varDataList = null, string $varQRCode = null)
            {           
            $varArrayContent = [];
            for($i=0; $i!=count($varDataList); $i++)
                {
                array_push(
                    $varArrayContent, 
                    [
                        $varDataList[$i]['sys_ID'], 
                        $varDataList[$i]['sys_Branch_RefID'], 
                        $varDataList[$i]['internationalName'], 
                        $varDataList[$i]['indonesianName'], 
                        $varDataList[$i]['ISOCodeAlpha2'], 
                        $varDataList[$i]['ISOCodeAlpha3']
                    ]
                    );
                }
            
            $ObjExcel = (new \zhtSDK\Software\Excel\Maatwebsite\zhtSDK($varUserSession))->exportFromArray(
                $varFileName,
                [
                    'Page' => [
                        'Title' => strtoupper($varDataHeader['Title']),
                        'SubTitle' => $varDataHeader['SubTitle']
                        ],
                    'Content' => [
                        'Title' => [
                            ['A9', 'Sys ID', 1, 1], 
                            ['B9', 'Sys Branch RefID', 1, 1], 
                            ['C9', 'International Name', 1, 1], 
                            ['D9', 'Indonesian Name', 1, 1], 
                            ['E9', 'ISOCode Alpha2', 1, 1], 
                            ['F9', 'ISOCode Alpha3', 1, 1]
                            ],
                        'Items' => $varArrayContent
                        ],
                    'ColumnFormat' =>
                        [
                        'A' => 'Number',
                        'B' => 'Number',
                        'C' => 'Text',
                        'D' => 'Text',
                        'E' => 'Text',
                        'F' => 'Text'
                        ]
                ]
                );

            //---> Return Value            
            $varReturn = [
                'encodeMethod' => 'Base64',
                'encodedStreamData' => \App\Helpers\ZhtHelper\System\BackEnd\Helper_APIReport::getJSONEncodeBase64_ExcelData($varUserSession, $ObjExcel)
                ];
            return $varReturn;
            }
        }
    }

?>