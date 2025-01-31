<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\external\www_bi_go_id                 |
|                \getTransactionExchangeRateOnSpecificDate\v1                                                                      |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Instruction\Engines\server\external\www_bi_go_id\getTransactionExchangeRateOnSpecificDate\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getTransactionExchangeRateOnSpecificDate                                                                     |
    | ▪ Description : Menangani API instruction.server.external.www_bi_go_id.getTransactionExchangeRateOnSpecificDate Version 1    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getTransactionExchangeRateOnSpecificDate extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-11-09                                                                                           |
        | ▪ Creation Date   : 2023-11-09                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-11-09                                                                                           |
        | ▪ Creation Date   : 2023-11-09                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Create Transaction Exchange Rate On Specific Date Data (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    
                    //dd($varData['parameter']['transactionDateTimeTZ']);

                        if (!($varDataSend = $this->dataProcessing(
                            $varUserSession,
                            $varData['parameter']['transactionDateTimeTZ']
                            )));
                        dd($varDataSend);
                    
                    /*
                    try {
                        if (!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchData_OLTP_Finance\TblAdvancePayment())->setDataInsert(
                            $varUserSession, 
                            null, 
                            null,
                            (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                            \App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID($varUserSession, (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'], 'Env.System.BaseCurrency.ID'),

                            $varData['parameter']['transactionDateTimeTZ']                            
                            ))))
                            {
                            throw new \Exception();
                            }
                        //---> Set Business Document Data Into varDataSend
                        $varDataSend['businessDocument'] = 
                            (new \App\Models\Database\SchData_OLTP_Master\General())->getBusinessDocumentByRecordID(
                                $varUserSession, 
                                $varDataSend['recordID']
                                );
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
                        }
                    
                    */
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

            
        private function dataProcessing($varUserSession, string $varTransactionDate = null)
            {
            $varConnectTimeout = 10;
            $varExecuteTimemout = 30;
            $varURL = "https://www.bi.go.id/biwebservice/wskursbi.asmx/getSubKursLokal4";
            $varPostData = "startdate=".$varTransactionDate;
            $varHeader = ["Content-Type: application/x-www-form-urlencoded"];

            $ObjCURL = curl_init();
            curl_setopt($ObjCURL, CURLOPT_URL, $varURL); 
            curl_setopt($ObjCURL, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ObjCURL, CURLOPT_HTTPHEADER, $varHeader);
            curl_setopt($ObjCURL, CURLOPT_CONNECTTIMEOUT, $varConnectTimeout);
            curl_setopt($ObjCURL, CURLOPT_TIMEOUT, $varExecuteTimemout);
            curl_setopt($ObjCURL, CURLOPT_POST, 1);
            curl_setopt($ObjCURL, CURLOPT_POSTFIELDS, $varPostData);
            $varXMLContent = curl_exec ($ObjCURL);
            curl_close ($ObjCURL);

            $varXMLDataArray =
                explode(
                    "\r\n", 
                    explode(
                        '</NewDataSet>',
                        explode(
                            '<NewDataSet xmlns="">', 
                            $varXMLContent
                            )[1]
                        )[0]
                    );
            array_shift($varXMLDataArray);

            for($i=0, $iMax=count($varXMLDataArray); $i != $iMax; $i++)
                {
                if (str_contains($varXMLDataArray[$i], '<Table diffgr:id=')) 
                    {
                    $varXMLDataArray[$i] = explode('<Table', $varXMLDataArray[$i])[0].'<Table>';
                    }
                }

            $varXMLData = implode("\n", $varXMLDataArray);
            $varXMLData = 
                '<?xml version="1.0" encoding="utf-8"?>'.
                '<NewDataSet>'.
                    $varXMLData.
                '</NewDataSet>';

            $varData = 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                    $varUserSession, 
                    json_encode(
                        simplexml_load_string($varXMLData)
                        )
                    );
            
            for($i=0, $iMax=count($varData['Table']); $i != $iMax; $i++)
                {
                $varData['Table'][$i]['id_subkurslokal'] = $varData['Table'][$i]['id_subkurslokal'] * 1;
                $varData['Table'][$i]['lnk_subkurslokal'] = $varData['Table'][$i]['lnk_subkurslokal'] * 1;
                $varData['Table'][$i]['nil_subkurslokal'] = $varData['Table'][$i]['nil_subkurslokal'] * 1;
                $varData['Table'][$i]['beli_subkurslokal'] = $varData['Table'][$i]['beli_subkurslokal'] * 1;
                $varData['Table'][$i]['jual_subkurslokal'] = $varData['Table'][$i]['jual_subkurslokal'] * 1;
                $varData['Table'][$i]['mts_subkurslokal'] = trim($varData['Table'][$i]['mts_subkurslokal']);
                }
            
            return $varData;
            }
        }
    }