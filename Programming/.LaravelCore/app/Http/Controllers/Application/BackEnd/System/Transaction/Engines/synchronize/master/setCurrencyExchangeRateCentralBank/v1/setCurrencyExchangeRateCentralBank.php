<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\synchronize\master                           |
|                \setCurrencyExchangeRateCentralBank\v1                                                                            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\synchronize\master\setCurrencyExchangeRateCentralBank\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setProject                                                                                                   |
    | ▪ Description : Menangani API transaction.synchronize.master.setCurrencyExchangeRateCentralBank Version 1                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setCurrencyExchangeRateCentralBank extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-04                                                                                           |
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
        | ▪ Last Update     : 2021-02-04                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Synchronize Central Bank Currency Exchange Rate Data (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        if(!$this->setCentralBankExchangeRate($varUserSession))
                            {
                            throw new \Exception();
                            }
                        else
                            {
                            $varDataSend = [
                                "message" => "Data Synchronization Successful" 
                                ];
                            }
//$varDataSend = $this->setCentralBankExchangeRate($varUserSession);
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Synchronization Process Failed'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
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
        | ▪ Method Name     : setCentralBankExchangeRate                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-03                                                                                           |
        | ▪ Description     : Mengeset Tax Exchange Rate                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function setCentralBankExchangeRate(int $varUserSession)
            {
            $varReturn = true;

            try {
                $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
                $varCurrentDateTimeTZ = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession);

                //---> Pengambilan Data dari File Offline
                $varOfflineFileList = [
                    '/zhtConf/tmp/download/Kurs-BI-20130102-20200203/Kurs-BI-USD.html'
                    ];

                for($i=0; $i!=count($varOfflineFileList); $i++)
                    {
                    $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataExchangeRateTimeSeriesFromOfflineFile',
                        'latest', 
                        [
                        'entities' => [
                            'pathFile' => $varOfflineFileList[$i]
                            ]
                        ]
                        );
                    
                    if($varData['metadata']['HTTPStatusCode']==200)
                        {
                        //---> Simpan Data
//                        for($j=0; $j!=count($varData['data']); $j++)
                        for($j=0; $j!=10; $j++)
                            {
                            $x = (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateCentralBank())->setDataImport(
                                $varUserSession, 
                                //$varCurrentDateTimeTZ, 
                                $varData['data'][$j]['validStartDateTimeTZ'],
                                $varData['data'][$j]['ISOCode'],
                                $varData['data'][$j]['exchangeRateBuy'],
                                $varData['data'][$j]['exchangeRateSell'],
                                $varData['data'][$j]['validStartDateTimeTZ'],
                                $varData['data'][$j]['validFinishDateTimeTZ']
                                //'9999-12-31 23:59:59 +07'
                                );
                            
                            
                            //$varReturn = ['Result' => $varData];
                            //$varReturn[$j] = 'x'; 
                            }
                        
                        
//                        $varReturn = ['Result' => $varData];
//                        $varReturn = ['Result' => count($varData['data'])];
//                        $varReturn = ['Result' => $x];
                        }                    
                    }
                } 
            catch (\Exception $ex) {
                $varReturn = false;                
                }

            return $varReturn;
            }
        }
    }

?>