<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\excel\dataList\master                             |
|                \getCountryAdministrativeAreaLevel3\v1                                                                            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\excel\dataList\master\getCountryAdministrativeAreaLevel3\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCountryAdministrativeAreaLevel3                                                                           |
    | ▪ Description : Menangani API report.excel.dataList.master.getCountryAdministrativeAreaLevel3 Version 1                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCountryAdministrativeAreaLevel3 extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-27                                                                                           |
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
        | ▪ Last Update     : 2022-01-27                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Country Administrative Area Level 3 Data List Excel Report (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try{
                        if(!($varDataSend = $this->dataProcessing(
                            $varUserSession,
                            $varData['outputFileName'],
                            [
                            'Title' => 'Country Administrative Area Level 3 List',
                            'SubTitle' => [
                                (new \App\Models\Database\SchSysConfig\General())->getReferenceTextByReferenceID($varUserSession, $varData['parameter']['countryAdministrativeAreaLevel2_RefID'])
                                ]
                            ],
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                                $varUserSession,
                                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken'],
                                    'transaction.read.dataList.master.getCountryAdministrativeAreaLevel3', 
                                    'latest', 
                                    [
                                    'parameter' => [
                                        'countryAdministrativeAreaLevel2_RefID' => $varData['parameter']['countryAdministrativeAreaLevel2_RefID']
                                        ],
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-27                                                                                           |
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
                        $varDataList[$i]['name']
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
                            ['C9', 'Name', 1, 1]
                            ],
                        'Items' => $varArrayContent
                        ],
                    'ColumnFormat' =>
                        [
                        'A' => 'Number',
                        'B' => 'Number',
                        'C' => 'Text'
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