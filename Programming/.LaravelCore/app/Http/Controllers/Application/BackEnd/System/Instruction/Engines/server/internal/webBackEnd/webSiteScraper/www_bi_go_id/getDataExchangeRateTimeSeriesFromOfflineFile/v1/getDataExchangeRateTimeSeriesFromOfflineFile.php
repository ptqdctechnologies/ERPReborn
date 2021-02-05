<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\internal\webBackEnd\webSiteScraper    |
|                \www_bi_go_id\getDataExchangeRateTimeSeriesFromOfflineFile\v1                                                     | 
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\internal\webBackEnd\webSiteScraper\www_bi_go_id\getDataExchangeRateTimeSeriesFromOfflineFile\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getDataExhangeRate                                                                                           |
    | ▪ Description : Menangani API instruction.server.internal.webBackEnd.webSiteScraper.fiskal_kemenkeu_go_id.getDataExhangeRate |
    |                 Version 1                                                                                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getDataExchangeRateTimeSeriesFromOfflineFile extends \App\Http\Controllers\Controller
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create Blood Aglutinogen Type Data (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        $varPathFile = $varData['entities']['pathFile'];    //    '/zhtConf/tmp/download/Kurs-BI-20130102-20200203/Kurs-BI-USD.html';
                        if(is_file($varPathFile)==false)
                            {
                            throw new \Exception('File Not Found');
                            }
                        else
                            {
                            $varResponse = file_get_contents($varPathFile);
                            
                            $varISOCode = trim(explode('</span>', explode('MATA UANG', $varResponse)[1])[0]);

                            //---> Jika ISO Code Tidak ditemukan
                            if(!($varCurrencyRefID = (new \App\Models\Database\SchData_OLTP_Master\TblCurrency())->getCurrencyIDByISOCode($varUserSession, $varISOCode)))
                                {
                                throw new \Exception('Unidentified Currency ISO Code');
                                }
                            //---> Jika ISO Code ada
                            else
                                {
                                $varResponse = explode('<tr>', explode('<tbody>', explode('</table', explode('<table', $varResponse)[1])[0])[1]);

                                for ($i=2; $i!=count($varResponse); $i++)
                                    {
                                    $varResponseSplit = explode('<td', $varResponse[$i]); 
                                    $varBaseCurrencyRatio = (int) trim(explode('>', explode('</', $varResponseSplit[1])[0])[1]);
                                    $varExchangeRateSell = number_format(((float) str_replace(',', '.', str_replace('.', '', trim(explode('>', explode('</', $varResponseSplit[2])[0])[1]))) / $varBaseCurrencyRatio), 5, '.', '');
                                    $varExchangeRateBuy = number_format(((float) str_replace(',', '.', str_replace('.', '', trim(explode('>', explode('</', $varResponseSplit[3])[0])[1]))) / $varBaseCurrencyRatio), 5, '.', '');
                                    $varExchangeRateMiddle = number_format((((float) $varExchangeRateSell + (float) $varExchangeRateBuy) / 2), 5, '.', '');
                                    $varStartDateTimeTZ = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, trim(explode('>', explode('</', $varResponseSplit[4])[0])[1])).' 00:00:00 +07';
                                    $varDataReturn[count($varResponse)-$i-1] = [
                                        //'Currency_RefID' => $varCurrencyRefID,
                                        'ISOCode' => $varISOCode,
                                        'ExchangeRateBuy' => $varExchangeRateBuy,
                                        'ExchangeRateSell' => $varExchangeRateSell,
                                        'ValidStartDateTimeTZ' => $varStartDateTimeTZ,
                                        'ValidFinishDateTimeTZ' => '9999-12-31 23:59:59 +07'
                                        ]; 
                                    }

                                for($i=0; $i!=(count($varDataReturn)-1); $i++)
                                    {
                                    $varDataReturn[$i]['ValidFinishDateTimeTZ'] = date('Y-m-d H:i:s', (\App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varDataReturn[$i+1]['ValidStartDateTimeTZ']) - 1)).' +07';
                                    }

                                for($i=0; $i!=count($varDataReturn); $i++)
                                    {
                                    $varDataReturnNew[$i] = $varDataReturn[$i];                                
                                    }
                                }
                                
                            //dd($varData);
                            //dd($varResponse);
                            }
                            
                        $varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession,
                                $varDataReturnNew
                                );
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Data Retrieval Failed'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
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
        }
    }