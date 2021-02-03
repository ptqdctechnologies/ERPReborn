<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\synchronize\master                           |
|                \setCurrencyExchangeRateTax\v1                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\synchronize\master\setCurrencyExchangeRateTax\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setProject                                                                                                   |
    | ▪ Description : Menangani API transaction.synchronize.master.setCurrencyExchangeRateTax Version 1                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setCurrencyExchangeRateTax extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-03                                                                                           |
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
        | ▪ Last Update     : 2021-02-03                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Synchronize Project Data (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        if(!$this->setTaxExchangeRate($varUserSession))
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
        | ▪ Method Name     : setTaxExchangeRate                                                                                   |
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
        private function setTaxExchangeRate(int $varUserSession)
            {
            $varReturn = true;

            try {
                $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
                $varCurrentDate = (new \App\Models\Database\SchSysConfig\General())->getCurrentDateTimeTZ($varUserSession);

                //---> Pengambilan Data dari WebSiteScraper fiskal.kemenkeu.go.id
                $varData = \App\Helpers\ZhtHelper\System\BackEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'instruction.server.externalServer.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate',
                    'latest', 
                    [
                    'entities' => [
                        'date' => substr($varCurrentDate, 0, 10)
                        ]
                    ]
                    );

                $varKMKNumber = $varData['data']['KMK']['number'];
                $varValidStartDateTimeTZ = $varData['data']['KMK']['startDateTimeTZ'];
                $varValidFinishDateTimeTZ = $varData['data']['KMK']['finishDateTimeTZ'];

                //---> Simpan Data
                foreach($varData['data']['exchangeRate'] as $varISOCode => $varExchangeRate) {
                    (new \App\Models\Database\SchData_OLTP_Master\TblCurrencyExchangeRateTax())->setDataImport($varUserSession, $varCurrentDate, $varISOCode, $varExchangeRate, $varValidStartDateTimeTZ, $varValidFinishDateTimeTZ, $varKMKNumber);
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