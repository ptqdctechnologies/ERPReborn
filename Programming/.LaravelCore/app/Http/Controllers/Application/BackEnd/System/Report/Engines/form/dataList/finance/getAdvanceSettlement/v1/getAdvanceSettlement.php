<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataList\finance\getAdvanceSettlement        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataList\finance\getAdvanceSettlement\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getAdvanceSettlement                                                                                         |
    | ▪ Description : Menangani API report.form.dataList.finance.getAdvanceSettlement Version 1                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getAdvanceSettlement extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-11-05                                                                                           |
        | ▪ Create date     : 2025-11-05                                                                                           |
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
        | ▪ Last Update     : 2025-11-05                                                                                           |
        | ▪ Create date     : 2025-11-05                                                                                           |
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
                        'Get Report Form - DataList - Advance Settlement (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!($varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_Finance\General())->getReport_Form_DataList_AdvanceSettlement_LatestVersion(
                                    $varUserSession,
                                    (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                                    //--------------------------------------------------
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
                                    //--------------------------------------------------
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
                                    ),
                                    (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'documentDateStart',
                                        $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['documentDateStart'])) 
                                                ? $varData['parameter']['dataFilter']['documentDateStart'] 
                                                : null
                                                ) 
                                            : null
                                    ),
                                    (
                                    \App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'documentDateFinish',
                                        $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['documentDateFinish']))
                                                ? $varData['parameter']['dataFilter']['documentDateFinish']
                                                : null
                                                )
                                            : null
                                    ),
                                    (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'requesterName',
                                        $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['requesterName'])) 
                                                ? $varData['parameter']['dataFilter']['requesterName'] 
                                                : null
                                                ) 
                                            : null
                                    ),
                                    (
                                    \App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'combinedBudget',
                                        $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['combinedBudget']))
                                                ? $varData['parameter']['dataFilter']['combinedBudget']
                                                : null
                                                )
                                            : null
                                    ),
                                    (
                                    \App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                        $varUserSession,
                                        'combinedBudgetSection',
                                        $varData['parameter']['dataFilter']
                                        ) ? (
                                            (!is_null($varData['parameter']['dataFilter']['combinedBudgetSection']))
                                                ? $varData['parameter']['dataFilter']['combinedBudgetSection']
                                                : null
                                                )
                                            : null
                                    )

                                    ),
                                FALSE
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
                        $varErrorMessage = $ex->getMessage();
                        $varReturn =
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                $varUserSession,
                                500,
                                'Invalid SQL Syntax'.($varErrorMessage ? ' ('.$varErrorMessage.')' : '')
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
