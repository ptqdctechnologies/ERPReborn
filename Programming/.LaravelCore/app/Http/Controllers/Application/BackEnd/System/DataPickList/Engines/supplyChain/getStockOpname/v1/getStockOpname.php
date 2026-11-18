<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\DataPickList\Engines\supplyChain\getStockOpname\v1     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\DataPickList\Engines\supplyChain\getStockOpname\v1 {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getAll                                                                                                       |
    | ▪ Description : Menangani API dataPickList.supplyChain.getStockOpname Version 1                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getStockOpname extends \App\Http\Controllers\Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-11-18                                                                                           |
        | ▪ Create date     : 2026-11-18                                                                                           |
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
        | ▪ Last Update     : 2026-11-18                                                                                           |
        | ▪ Create date     : 2026-11-18                                                                                           |
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
                        'DataPickList - Stock Opname (version 1)'
                    );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (
                            !($varDataSend =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                    $varUserSession,
                                    (new \App\Models\Database\SchData_OLTP_SupplyChain\General())->getDataPickList_StockOpname(
                                        //-----[ System Parameter ]-----------------------------------------------------( START POINT )-----
                                        //---► userSession
                                        $varUserSession,
                                        //---► branchID
                                        (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                            $varUserSession
                                        )
                                        )['branchID'],
                                            //-----[ System Parameter ]-----------------------------------------------------(  END POINT  )-----

                                            //-----[ Pagination Parameter ]-------------------------------------------------( START POINT )-----
                                            //---► pageSize
                                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'pageSize',
                                            $varData['parameter']['pagination']
                                        ) ? (
                                            (!is_null($varData['parameter']['pagination']['pageSize']))
                                            ? $varData['parameter']['pagination']['pageSize']
                                            : null
                                        )
                                            : null
                                        ),
                                            //---► pageShow
                                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'pageShow',
                                            $varData['parameter']['pagination']
                                        ) ? (
                                            (!is_null($varData['parameter']['pagination']['pageShow']))
                                            ? $varData['parameter']['pagination']['pageShow']
                                            : null
                                        )
                                            : null
                                        ),
                                            //-----[ Pagination Parameter ]-------------------------------------------------(  END POINT  )-----

                                            //-----[ Filter Parameter ]-----------------------------------------------------( START POINT )-----
                                            //---► businessDocumentNumber
                                        (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'businessDocumentNumber',
                                            $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['businessDocumentNumber']))
                                            ? $varData['parameter']['dataFilter']['businessDocumentNumber']
                                            : null
                                        )
                                            : null
                                        )
                                        //-----[ Filter Parameter ]-----------------------------------------------------(  END POINT  )-----
                                    ),
                                    FALSE
                                )
                            )
                        ) {
                            throw
                                new \Exception();
                        }

                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                            );
                    } catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Invalid SQL Syntax' . ($varErrorMessage ? ' (' . $varErrorMessage . ')' : '')
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
