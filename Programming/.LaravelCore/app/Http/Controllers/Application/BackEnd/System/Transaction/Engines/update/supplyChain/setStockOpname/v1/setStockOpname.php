<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\update\supplyChain\setStockOpname\v1 |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Transaction\Engines\update\supplyChain\setStockOpname\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setStockOpname                                                                                       |
    | ▪ Description : Menangani API transaction.update.supplyChain.setStockOpname Version 1                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setStockOpname extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-13                                                                                           |
        | ▪ Creation Date   : 2026-11-13                                                                                           |
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
        | ▪ Last Update     : 2026-11-13                                                                                           |
        | ▪ Creation Date   : 2026-11-13                                                                                           |
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
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader(
                        $varUserSession,
                        __CLASS__,
                        __FUNCTION__,
                        'Update Stock Opname Data (version 1)'
                    );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (
                            !($varDataSend =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataUpdate(
                                    $varUserSession,
                                    (new \App\Models\Database\SchData_OLTP_SupplyChain\TblStockOpname())->setDataUpdate(
                                        $varUserSession,
                                        $varData['recordID'],

                                        null,
                                        null,
                                        null,
                                        null,
                                        (
                                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
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

                                        $varData['entities']['documentDateTimeTZ'],
                                        $varData['entities']['type'],

                                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'additionalData',
                                            $varData['entities']
                                        )
                                            ? (
                                                (
                                                    !is_null($varData['entities']['additionalData'])
                                                )
                                                ? $varData['entities']['additionalData']
                                                : []
                                            )
                                            : []
                                        )
                                    )
                                )
                            )
                        ) {
                            throw new \Exception();
                        }

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                            );
                    } catch (\Exception $ex) {
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataUpdateException(
                                $varUserSession,
                                $ex
                            );
                    }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                } catch (\Exception $ex) {
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                        );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, ' . $ex->getMessage());
                }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            } catch (\Exception $ex) {
            }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
        }
    }
}
