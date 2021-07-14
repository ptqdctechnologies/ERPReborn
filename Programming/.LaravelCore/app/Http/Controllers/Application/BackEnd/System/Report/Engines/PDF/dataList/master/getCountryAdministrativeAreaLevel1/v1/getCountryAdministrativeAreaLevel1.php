<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\dataList\master                               |
|                \getCountryAdministrativeAreaLevel1\v1                                                                            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\dataList\master\getCountryAdministrativeAreaLevel1\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCountryAdministrativeAreaLevel1                                                                           |
    | ▪ Description : Menangani API report.PDF.dataList.master.getCountryAdministrativeAreaLevel1 Version 1                        |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCountryAdministrativeAreaLevel1 extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-14                                                                                           |
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
        | ▪ Last Update     : 2021-07-14                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Country Administrative Area Level 1 Data List PDF Report (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try{
                        if(!($varDataSend = $this->dataProcessing(
                            $varUserSession, 
                            [
                            'Title' => 'Country Administrative Area Level 1 List',
                            'SubTitle' => [
                                (new \App\Models\Database\SchSysConfig\General())->getReferenceTextByReferenceID($varUserSession, $varData['parameter']['country_RefID'])
                                ]
                            ],
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                                $varUserSession,
                                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken'],
                                    'transaction.read.dataList.master.getCountryAdministrativeAreaLevel1', 
                                    'latest', 
                                    [
                                    'country_RefID' => $varData['parameter']['country_RefID'],
                                    'SQLStatement' => [
                                        'pick' => null,
                                        'sort' => null,
                                        'filter' => null,
                                        'paging' => null
                                        ]
                                    ]
                                    )['data']
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
        | ▪ Last Update     : 2021-07-14                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession, array $varDataHeader = null, array $varDataList = null)
            {
            $varRecordList_FirstPage = 43;
            $varRecordList_OtherPages = 52;
            
            $ObjPDF = \App\Helpers\ZhtHelper\Report\Helper_PDF::init($varUserSession);
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
                                    ['NO', 'C', 10],
                                    ['ID', 'C', 30],
                                    ['NAME', 'C', 150]
                                    ]
                                ],
                            ]                    
                        ]
                        );
                    }

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
                                [$i+1, 'C', 10],
                                [$varDataList[$i]['sys_ID'], 'C', 30],
                                [$varDataList[$i]['name'], 'L', 150]
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