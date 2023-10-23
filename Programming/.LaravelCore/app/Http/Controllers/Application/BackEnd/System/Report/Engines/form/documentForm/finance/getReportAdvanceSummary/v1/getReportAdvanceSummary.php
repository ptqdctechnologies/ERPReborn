<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\documentForm\finance\getReportAdvanceSummary\v1           |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\documentForm\finance\getReportAdvanceSummary\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getReportAdvanceSummary                                                                                                   |
    | ▪ Description : Menangani API report.form.documentForm.finance.getReportAdvanceSummary Version 1                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getReportAdvanceSummary extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Create date     : 2022-06-15                                                                                           |
        | ▪ Last Update     : 2022-06-15                                                                                           |
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
        | ▪ Create date     : 2022-06-15                                                                                           |
        | ▪ Last Update     : 2022-06-15                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Report Form - Advance Summary Document Form (version 1)');
                try {
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    try {
                        if(!($varDataSend = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead($varUserSession, (new \App\Models\Database\SchData_OLTP_Finance\General())->getReport_Form_DocumentForm_AdvanceSummary(
                            $varUserSession,
                            
                            (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],

                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'budgetID', $varData['parameter']['dataFilter']) ? ((!is_null($varData['parameter']['dataFilter']['budgetID'])) ? $varData['parameter']['dataFilter']['budgetID'] : null) : null),
                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'subBudgetID', $varData['parameter']['dataFilter']) ? ((!is_null($varData['parameter']['dataFilter']['subBudgetID'])) ? $varData['parameter']['dataFilter']['subBudgetID'] : null) : null),
                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'workID', $varData['parameter']['dataFilter']) ? ((!is_null($varData['parameter']['dataFilter']['workID'])) ? $varData['parameter']['dataFilter']['workID'] : null) : null),
                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'productID', $varData['parameter']['dataFilter']) ? ((!is_null($varData['parameter']['dataFilter']['productID'])) ? $varData['parameter']['dataFilter']['productID'] : null) : null),
                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, 'beneficiaryID', $varData['parameter']['dataFilter']) ? ((!is_null($varData['parameter']['dataFilter']['beneficiaryID'])) ? $varData['parameter']['dataFilter']['beneficiaryID'] : null) : null)

                            ))))
                            {
                            throw new \Exception();
                            }
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
                        } 
                    catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 500, 'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : ''));
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