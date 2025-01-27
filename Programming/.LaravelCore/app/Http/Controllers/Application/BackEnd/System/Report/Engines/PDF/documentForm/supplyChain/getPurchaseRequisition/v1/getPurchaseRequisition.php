<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\documentForm\supplyChain                      |
|                \getPurchaseRequisition\v1                                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\documentForm\supplyChain\getPurchaseRequisition\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getPurchaseRequisition                                                                                       |
    | ▪ Description : Menangani API report.PDF.dataForm.supplyChain.getPurchaseRequisition Version 1                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getPurchaseRequisition extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-09                                                                                           |
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
        | ▪ Last Update     : 2021-08-09                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Country Data List PDF Report (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try{
                        if(!($varDataSend = $this->dataProcessing(
                            $varUserSession,
                            [
                            'Title' => 'Purchase Requisition',
                            'SubTitle' => [
                                'No : .....'
                                ]
                            ],
/*                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                                $varUserSession,
                                (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['APIWebToken'],
                                    'transaction.read.dataList.master.getCountry', 
                                    'latest', 
                                    [
                                    'SQLStatement' => [
                                        'pick' => null,
                                        'sort' => null,
                                        'filter' => null,
                                        'paging' => null
                                        ]
                                    ]
                                    )['data']*/
                            null,
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
        | ▪ Last Update     : 2021-08-09                                                                                           |
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
            $varDataList = [
                [
                'productID' => 1  
                ],
                [
                'productID' => 2  
                ],
                [
                'productID' => 3  
                ],
                ];

            $varRecordList_FirstPage = 43;
            $varRecordList_OtherPages = 52;
            
            $ObjPDF = \App\Helpers\ZhtHelper\Report\Helper_PDF::init($varUserSession, $varQRCode);
            $ObjPDF->SetTitle($varDataHeader['Title'].' Form');
/*            $ObjPDF->AddPage();
            $ObjPDF->zhtSetContent_Title($varUserSession, strtoupper($varDataHeader['Title']));
            for($i=0; $i!=count($varDataHeader['SubTitle']); $i++)
                {
                $ObjPDF->zhtSetContent_SubTitle($varUserSession, $varDataHeader['SubTitle'][$i]);                            
                }*/
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
                                    ['NO', 'C', 10, 10],
                                    ['MATERIAL ID', 'C', 30, 10],
                                    ['MATERIAL NAME', 'C', 75, 10],
                                    ['QTY', 'C', 10, 10],
                                    ['UNIT PRICE', 'C', 11, 10],
                                    ['PRICE', 'C', 11, 10],
                                    ]
                                ],
                            ]                    
                        ]
                        );

                    $ObjPDF->zhtSetContent_TableHead(
                        $varUserSession,
                        [
                        'Coordinat' => [
                            ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'], 
                            ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']-0
                            ],
                        'Objects' =>
                            [
                                [
                                'CoordinatOffset' => [0, 0],
                                'Cells' => [
                                    ['<BLANK_CELL>', 'C', 10],
                                    ['<BLANK_CELL>', 'C', 30],
                                    ['<BLANK_CELL>', 'C', 40],
                                    ['<BLANK_CELL>', 'C', 50],
                                    ['PRICE', 'C', 30, 10],
                                    ['BASE CURRENCY PRICE (IDR)', 'C', 30, 10]
                                    ]
                                ],
                            ]                    
                        ]
                        );
                    }
                }
            
            /*
            $varRecordList_FirstPage = 43;
            $varRecordList_OtherPages = 52;

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
                                    ['INDONESIAN NAME', 'C', 75],
                                    ['INTERNATIONAL NAME', 'C', 75]
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
                                [$varDataList[$i]['indonesianName'], 'L', 75],
                                [$varDataList[$i]['internationalName'], 'L', 75]
                                ]
                            ],
                        ]                    
                    ]
                    );
                }
*/
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