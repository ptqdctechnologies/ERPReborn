<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\excel\dataList\master\getCitizenIdentity\v1       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\excel\dataList\master\getCitizenIdentity\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCitizenIdentity                                                                                           |
    | ▪ Description : Menangani API report.excel.dataList.master.getCitizenIdentity Version 1                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCitizenIdentity extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-02-03                                                                                           |
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
        | ▪ Last Update     : 2022-02-03                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Citizen Identity Data List Excel Report (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try{
                        if(!($varDataSend = $this->dataProcessing(
                            $varUserSession,
                            $varData['outputFileName'],
                            [
                            'Title' => 'Citizen Identity List',
                            'SubTitle' => [
                                ]
                            ],
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                                $varUserSession,
                                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken'],
                                    'transaction.read.dataList.master.getCitizenIdentity', 
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
        | ▪ Last Update     : 2022-02-03                                                                                           |
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
                        $varDataList[$i]['personName'], 
                        $varDataList[$i]['printedPersonName'], 
                        $varDataList[$i]['identityNumber'], 
                        $varDataList[$i]['gender'],
                        $varDataList[$i]['birthPlace'],
                        $varDataList[$i]['birthDate'],
                        $varDataList[$i]['religion']
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
                            ['C9', 'Person Name', 1, 1], 
                            ['D9', 'Printed Person Name', 1, 1], 
                            ['E9', 'Identity Number', 1, 1], 
                            ['F9', 'Gender', 1, 1],
                            ['G9', 'Birth Place', 1, 1],
                            ['H9', 'Birth Date', 1, 1],
                            ['I9', 'Religion', 1, 1]
                            ],
                        'Items' => $varArrayContent
                        ],
                    'ColumnFormat' =>
                        [
                        'A' => 'Number',
                        'B' => 'Number',
                        'C' => 'Text',
                        'D' => 'Text',
                        'E' => 'Number',
                        'F' => 'Text',
                        'G' => 'Text',
                        'H' => 'Date_DDMMYYYY',
                        'I' => 'Text'
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