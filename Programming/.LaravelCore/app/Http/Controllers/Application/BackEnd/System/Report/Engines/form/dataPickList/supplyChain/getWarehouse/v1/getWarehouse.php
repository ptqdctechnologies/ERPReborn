<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataPickList\supplyChain\getWarehouse        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Wisnu (wisnu.wirayuda01@gmail.com)                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataPickList\supplyChain\getWarehouse\v1 {
    use App\Http\Controllers\Controller;
    use App\Helpers\ZhtHelper\General\Helper_Array;
    use App\Helpers\ZhtHelper\Logger\Helper_SystemLog;
    use App\Helpers\ZhtHelper\System\BackEnd\Helper_API;
    use App\Models\Database\SchData_OLTP_SupplyChain\General;
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getWarehouse                                                                                                 |
    | ▪ Description : Menangani API report.form.dataPickList.supplyChain.getWarehouse Version 1                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getWarehouse extends Controller
    {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-08-12                                                                                           |
        | ▪ Create date     : 2026-08-12                                                                                           |
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
        | ▪ Last Update     : 2026-08-12                                                                                           |
        | ▪ Create date     : 2026-08-12                                                                                           |
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
            $varReturn = Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            try {
                $varSysDataProcess =
                    Helper_SystemLog::setLogOutputMethodProcessHeader(
                        $varUserSession,
                        __CLASS__,
                        __FUNCTION__,
                        'Get Report Form - DataPickList - Warehouse (version 1)'
                    );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (
                            !($varDataSend =
                                Helper_API::getEngineDataSend_DataRead(
                                    $varUserSession,
                                    (new General())->getReport_Form_DataPickList_Warehouse(
                                        //-----[ System Parameter ]-----------------------------------------------------( START POINT )-----
                                        //---► userSession
                                        $varUserSession,
                                        //---► branchID
                                        (Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                            $varUserSession
                                        )
                                        )['branchID'],
                                            //-----[ System Parameter ]-----------------------------------------------------(  END POINT  )-----

                                            //-----[ Pagination Parameter ]-------------------------------------------------( START POINT )-----
                                            //---► pageSize
                                        (Helper_Array::isKeyExist(
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
                                        (Helper_Array::isKeyExist(
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
                                            //---► name
                                        (Helper_Array::isKeyExist(
                                            $varUserSession,
                                            'name',
                                            $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['name']))
                                            ? $varData['parameter']['dataFilter']['name']
                                            : null
                                        )
                                            : null
                                        ),
                                            //---► code
                                        (
                                            Helper_Array::isKeyExist(
                                                $varUserSession,
                                                'code',
                                                $varData['parameter']['dataFilter']
                                            )
                                            ? (
                                                !is_null(
                                                    $varData['parameter']['dataFilter']['code']
                                                )
                                                ? $varData['parameter']['dataFilter']['code']
                                                : null
                                            )
                                            : null
                                        ),
                                            //---► Warehouse Type RefID
                                        (
                                            Helper_Array::isKeyExist(
                                                $varUserSession,
                                                'warehouseType_RefID',
                                                $varData['parameter']['dataFilter']
                                            )
                                            ? (
                                                !is_null(
                                                    $varData['parameter']['dataFilter']['warehouseType_RefID']
                                                )
                                                ? $varData['parameter']['dataFilter']['warehouseType_RefID']
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
                            Helper_API::setEngineResponseDataReturn_Success(
                                $varUserSession,
                                $varDataSend
                            );
                    } catch (\Exception $ex) {
                        $varErrorMessage = $ex->getMessage();
                        $varReturn =
                            Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Invalid SQL Syntax' . ($varErrorMessage ? ' (' . $varErrorMessage . ')' : '')
                            );
                    }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
                    Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                } catch (\Exception $ex) {
                    $varReturn =
                        Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                        );

                    Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, ' . $ex->getMessage());
                }
                Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
            } catch (\Exception $ex) {
            }

            return
                Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
        }
    }
}
