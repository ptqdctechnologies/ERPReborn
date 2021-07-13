<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\dataList\master\getCountry\v1                 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\PDF\dataList\master\getCountry\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getCountry                                                                                                   |
    | ▪ Description : Menangani API report.PDF.dataList.master.getCountry Version 1                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getCountry extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-08                                                                                           |
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
        | ▪ Last Update     : 2021-07-08                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Purchase Order Data Record (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try{
                        if(!($varDataSend = $this->dataProcessing($varUserSession)))
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
        | ▪ Last Update     : 2021-07-08                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function dataProcessing($varUserSession)
            {
            $ObjPDF = \App\Helpers\ZhtHelper\Report\Helper_PDF::init($varUserSession);
            
            $ObjPDF->SetTitle('Country List Report');
            
            $ObjPDF->AddPage();
            $ObjPDF->zhtSetContent_Title($varUserSession, 'COUNTRY LIST');
            $ObjPDF->zhtSetContent_SubTitle($varUserSession, 'No : -');
            $ObjPDF->zhtSetContent_VerticalSpace($varUserSession);

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
                            ['NO', 10],
                            ['ID', 30],
                            ['INDONESIAN NAME', 75, 30],
                            ['INTERNATIONAL NAME', 75, 20]                        
                            ]
                        ],
                        [
                        'CoordinatOffset' => [0, 5],
                        'Cells' => [
                            ['NO', 10],
                            ['<BLANK_CELL>', 30],
                            ['INDONESIAN NAME', 75, 30],
                            ['INTERNATIONAL NAME', 75, 20]                        
                            ]
                        ]
                    ]                    
                ]
                );
            
            


            //$ObjPDF->zhtSetContent_VerticalSpace($varUserSession);
            
            $ObjPDF->SetXY($ObjPDF->GetX(), $ObjPDF->GetY());
            $ObjPDF->Cell(0, 10, 'xxx', 1, false, 'C');
            
            
            
            $ObjPDF->AddPage();
            $ObjPDF->zhtSetContent_Title($varUserSession, 'COUNTRY LIST');


            
            /*
            $ObjPDF->SetXY(($ObjPDF->zhtGetContentMargins($varUserSession))['left'], ($ObjPDF->zhtGetContentMargins($varUserSession))['top']);
            $ObjPDF->SetFont('helvetica', 'B', 20);
            $ObjPDF->Cell(0, 10, 'COUNTRY LIST', 0, false, 'C');
*/            

            $ObjPDF->Cell(0, 10, $ObjPDF->GetY(), 0, false, 'C');
            
            
            /*
            for($i=0; $i!=11; $i++)
                {
                //$ObjPDF->Cell(0, 15, 'xxx');
                $ObjPDF->zhtGetContentMargins($varUserSession);
                $ObjPDF->AddPage();
                }
            //$ObjPDF->Write(0, \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('APP_NAME'));
            */    

            
            //$ObjPDF->Write(0, 'Hello World');
            
            $varReturn = [
                'encodeMethod' => 'Base64',
                'encodedStreamData' => \App\Helpers\ZhtHelper\System\BackEnd\Helper_APIReport::getJSONEncodeBase64_PDFData($varUserSession, $ObjPDF)
                ];
            return $varReturn;
            }
        }
    }

?>