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

                //---> Pengambilan Data dari Online
                $varDataOnline = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataCurrentExhangeRate',
                    'latest', 
                    [
                    ]
                    );
                if($varDataOnline['metadata']['HTTPStatusCode']==200)
                    {
                    for($i=0; $i!=count($varDataOnline['data']); $i++)
                        {
                        //---> Cek Currency Symbol
                        if(!(new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varDataOnline['data'][$i]['ISOCode']))
                            {
                            (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->setDataInsert(
                                $varUserSession, 
                                null, 
                                substr((new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession), 0, 4), 
                                11000000000001,
                                $varDataOnline['data'][$i]['ISOCode'],
                                null, 
                                null
                                );
                            }
                        
                        //---> Insert Data
                        (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateCentralBank())->setDataImport(
                            $varUserSession, 
                            $varDataOnline['data'][$i]['validStartDateTimeTZ'],
                            $varDataOnline['data'][$i]['ISOCode'],
                            $varDataOnline['data'][$i]['exchangeRateBuy'],
                            $varDataOnline['data'][$i]['exchangeRateSell']
                            );
                        }
                    }
                
                //---> Pengambilan Data dari File Offline
                $varOfflineFileList = [
//                    '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-AUD.html',
                    '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-BND.html',
    //                '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-CAD.html',
      //              '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-CHF.html',
       //             '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-CNH.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-CNY.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-DKK.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-EUR.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-GBP.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-HKD.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-JPY.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-KRW.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-KWD.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-LAK.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-MYR.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-NOK.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-NZD.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-PGK.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-PHP.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-SAR.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-SEK.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-SGD.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-THB.html',
//                    '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-USD.html',
        //            '/zhtConf/tmp/download/Kurs-BI-20100104-20210204/Kurs-Transaksi-BI-VND.html'
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
                        for($j=0; $j!=count($varData['data']); $j++)
//                        for($j=0; $j!=10; $j++)
                            {
                            (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateCentralBank())->setDataImport(
                                $varUserSession, 
                                $varData['data'][$j]['validStartDateTimeTZ'],
                                $varData['data'][$j]['ISOCode'],
                                $varData['data'][$j]['exchangeRateBuy'],
                                $varData['data'][$j]['exchangeRateSell']
                                );
                            }
                        }                    
                    }

                //--->
                } 
            catch (\Exception $ex) {
                $varReturn = false;                
                }

            return $varReturn;
            }
        }
    }

?>