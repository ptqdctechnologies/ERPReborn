<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\dataList\master\getCitizenIdentity\v1         |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\dataList\master\getCitizenIdentity\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCitizenIdentity                                                                                           |
    | ▪ Description : Menangani API report.PDF.dataList.master.getCitizenIdentity Version 1                                        |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCitizenIdentity extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-15                                                                                           |
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
        | ▪ Last Update     : 2021-07-15                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Citizen Identity Data List PDF Report (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try{
                        if(!($varDataSend = $this->dataProcessing(
                            $varUserSession,
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
        | ▪ Last Update     : 2021-07-15                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (array)  varDataHeader ► Data Header (Optional)                                                                   |
        |      ▪ (array)  varDataList ► Data List (Optional)                                                                       |
        |      ▪ (string) varQRCode ► QR Code (Optional)                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, array $varDataHeader = null, array $varDataList = null, string $varQRCode = null)
            {
            $varRecordList_FirstPage = 19;
            $varRecordList_OtherPages = 23;

            $ObjPDF = \App\Helpers\ZhtHelper\Report\Helper_PDF::init($varUserSession, $varQRCode);
            $ObjPDF->SetTitle($varDataHeader['Title'].' Report');
            for($i=0; $i!=count($varDataList); $i++)
                {                
                //---> First Page
                if(($ObjPDF->PageNo()) == 0)
                    {
                    $j = ($i % $varRecordList_FirstPage); 
                    if($j == 0)
                        {
                        $ObjPDF->AddPage();
                        $ObjPDF->zhtSetContent_Title($varUserSession, strtoupper($varDataHeader['Title']));
                        for($k=0; $k!=count($varDataHeader['SubTitle']); $k++)
                            {
                            $ObjPDF->zhtSetContent_SubTitle($varUserSession, $varDataHeader['SubTitle'][$k]);                            
                            }
                        $ObjPDF->zhtSetContent_VerticalSpace($varUserSession, 2);                    
                        }
                    }
                //---> Other Pages
                else
                    {
                    $j = (($i-$varRecordList_FirstPage) % $varRecordList_OtherPages);
                    if($j == 0)
                        {
                        $ObjPDF->AddPage();
                        }
                    }

                //---> Every Pages
                if($j == 0)
                    {
                    $varCellHeight = 11;
                    $ObjPDF->zhtSetContent_TableHead(
                        $varUserSession,
                        [
                        'Coordinat' => [
                            ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'], 
                            ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']
                            ],
                        'Objects' =>
                            [
                                [
                                'CoordinatOffset' => [0, 0],
                                'Cells' => [
                                    ['NO', 'C', 10, $varCellHeight],
                                    ['ID', 'C', 30, $varCellHeight],
                                    ['PERSON NAME', 'C', 30, $varCellHeight],
                                    ['PRINTED PERSON NAME', 'C', 25, $varCellHeight],
                                    ['IDENTITY NUMBER', 'C', 30, $varCellHeight],
                                    ['GENDER', 'C', 15, $varCellHeight],
                                    ['BIRTH PLACE AND DATE', 'C', 30, $varCellHeight],
                                    ['RELIGION', 'C', 20, $varCellHeight],
                                    ]
                                ],
                            ]                    
                        ]
                        );
                    }

                $varCellHeight = 11;
                //$varDataList[$i]['gender'] = 'Wanita';
                //$varDataList[$i]['birthPlace'] = 'Jakarta Pusat aja';
                //$varDataList[$i]['birthDate'] = '27-21-1999';
                $ObjPDF->zhtSetContent_TableContent(
                    $varUserSession,
                    [
                    'Coordinat' => [
                        ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'], 
                        ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']
                        ],
                    'Objects' =>
                        [
                            [
                            'CoordinatOffset' => [0, 0],
                            'Cells' => [
                                [$i+1, 'C', 10, $varCellHeight],
                                [$varDataList[$i]['sys_ID'], 'C', 30, $varCellHeight],
                                [$varDataList[$i]['personName'], 'L', 30, $varCellHeight],
                                [$varDataList[$i]['printedPersonName'], 'L', 25, $varCellHeight],
                                [$varDataList[$i]['identityNumber'], 'L', 30, $varCellHeight],
                                [$varDataList[$i]['gender'], 'L', 15, $varCellHeight],
                                [($varDataList[$i]['birthPlace'] ? $varDataList[$i]['birthPlace'].','.chr(10) : '').($varDataList[$i]['birthDate'] ? $varDataList[$i]['birthDate'] : ''), 'L', 30, $varCellHeight],
                                [$varDataList[$i]['religion'], 'L', 20, $varCellHeight],
                                
                                
                                //['Jakarta Pusat sebelah sono,'.chr(10).' 27-10-1981', 'L', 20, $varCellHeight],
                                
                                //[$varDataList[$i]['internationalName'], 'L', 75]
                                ]
                            ],
                        ]                    
                    ]
                    );
                }

            $ObjPDF->zhtSetContent_HorizontalLine($varUserSession);

            //---> Return Value
            $varReturn = [
                'encodeMethod' => 'Base64',
                'encodedStreamData' => \App\Helpers\ZhtHelper\System\BackEnd\Helper_APIReport::getJSONEncodeBase64_PDFData($varUserSession, $ObjPDF)
                ];
            return $varReturn;
            }
        }
    }

?>