<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\update\budgeting                             |
|                \setCombinedBudgetSectionDetail\v1                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\update\budgeting\setCombinedBudgetSectionDetail\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setCombinedBudgetSectionDetail                                                                               |
    | ▪ Description : Menangani API transaction.update.budgeting.setCombinedBudgetSectionDetail Version 1                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setCombinedBudgetSectionDetail extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-17                                                                                           |
        | ▪ Creation Date   : 2026-11-17                                                                                           |
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
        | ▪ Last Update     : 2026-11-17                                                                                           |
        | ▪ Creation Date   : 2026-11-17                                                                                           |
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
                $varSysDataProcess =
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Update Combined Budget Section Detail Data (version 1)');

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!($varDataSend =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataUpdate(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_Budgeting\TblCombinedBudgetSectionDetail)->setDataUpdate(
                                    $varUserSession,
                                    $varData['recordID'],

                                    null,
                                    null,
                                    null,
                                    null,
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                        $varUserSession
                                        )
                                    )['branchID'],
                                    (\App\Helpers\ZhtHelper\General\Helper_SystemParameter::getApplicationParameter_BaseCurrencyID(
                                        $varUserSession,
                                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                            $varUserSession
                                            )
                                        )['branchID'],
                                        'Env.System.BaseCurrency.ID'
                                        )
                                    ),

                                    $varData['entities']['version'],
                                    $varData['entities']['combinedBudget_RefID'],
                                    $varData['entities']['combinedBudgetSection_RefID'],
                                    $varData['entities']['combinedBudgetSubSectionLevel1_RefID'],
                                    $varData['entities']['combinedBudgetSubSectionLevel2_RefID'],
                                    $varData['entities']['product_RefID'],
                                    $varData['entities']['description'],
                                    $varData['entities']['quantity'],
                                    $varData['entities']['quantityUnit_RefID'],
                                    $varData['entities']['unitPriceCurrency_RefID'],
                                    $varData['entities']['unitPriceCurrencyValue'],
                                    $varData['entities']['unitPriceCurrencyExchangeRate'],
                                    $varData['entities']['work_RefID']
                                    )
                                )
                            ))
                            {
                            throw new \Exception();
                            }

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                                );
                        }

                    catch (\Exception $ex) {
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataUpdateException(
                                $varUserSession,
                                $ex
                                );
                        }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Exception $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                            );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Exception $ex) {
                }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }