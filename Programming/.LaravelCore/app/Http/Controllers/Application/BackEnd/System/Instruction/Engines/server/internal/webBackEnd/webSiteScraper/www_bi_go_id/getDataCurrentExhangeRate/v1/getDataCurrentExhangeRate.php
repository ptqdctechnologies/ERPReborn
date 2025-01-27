<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\internal\webBackEnd\webSiteScraper    |
|                \www_bi_go_id\getDataCurrentExhangeRate\v1                                                                        | 
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\internal\webBackEnd\webSiteScraper\www_bi_go_id\getDataCurrentExhangeRate\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getDataExhangeRate                                                                                           |
    | ▪ Description : Menangani API instruction.server.internal.webBackEnd.webSiteScraper.www_bi_go_id.getDataCurrentExhangeRate   |
    |                 Version 1                                                                                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getDataCurrentExhangeRate extends \App\Http\Controllers\Controller
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
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        $varURL = 'https://www.bi.go.id/id/statistik/informasi-kurs/transaksi-bi/Default.aspx';
                        $ch = curl_init($varURL);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        $varResponse = curl_exec($ch);
                        curl_close($ch);
            
                        $varDate = \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateFromIndonesianDateString($varUserSession, explode('</span>', explode('Update Terakhir&nbsp;<span>', explode('<table', $varResponse)[1])[1])[0]);
                        //$varData['Validity']['StartDateTimeTZ'] = $varDate.' 00:00:00 +07';
                        //$varData['Validity']['FinishDateTimeTZ'] = $varDate.' 23:59:59 +07';
                        
                        $varResponse = explode('<tr>', explode('<tbody>', explode('</table', explode('<table', $varResponse)[2])[0])[1]);
                        for ($i=1; $i!=count($varResponse); $i++)
                            {
                            $varResponseSplit = explode('<td', $varResponse[$i]);
                            $varISOCode = trim(explode('<', explode('class="text-right">', $varResponseSplit[1])[1])[0]);
                            $varBaseCurrencyRatio = (int) trim(explode('<', explode('class="text-right">', $varResponseSplit[2])[1])[0]);
                            $varExchangeRateSell = number_format((((float) str_replace(',', '.', str_replace('.', '', trim(explode('<', explode('class="text-right">', $varResponseSplit[3])[1])[0])))) / $varBaseCurrencyRatio), 5, '.', '');
                            $varExchangeRateBuy = number_format((((float) str_replace(',', '.', str_replace('.', '', trim(explode('<', explode('class="text-right">', $varResponseSplit[4])[1])[0])))) / $varBaseCurrencyRatio), 5, '.', '');
                            $varExchangeRateMiddle = number_format((((float) $varExchangeRateSell + (float) $varExchangeRateBuy) / 2), 5, '.', '');
                            $varData[$i-1] = [
                                'ISOCode' => $varISOCode,
                                'ExchangeRateBuy' => $varExchangeRateBuy,
                                'ExchangeRateSell' => $varExchangeRateSell,
                                'ValidStartDateTimeTZ' => $varDate.' 00:00:00 +07'
                                ];
                            }
                        
                        $varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession,
                                $varData
                                );
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Data Retrieval Failed'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
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
        }
    }