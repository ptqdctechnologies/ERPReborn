<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataPickList\accounting                      |
|                \chartOfAccount\getNonHeaderAccountReceivable                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataPickList\accounting\chartOfAccount\getNonHeaderAccountReceivable\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getNonHeaderAccountReceivable                                                                                |
    | ▪ Description : Menangani API report.form.dataPickList.accounting.chartOfAccount.getNonHeaderAccountReceivable Version 1     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getNonHeaderAccountReceivable extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-28                                                                                           |
        | ▪ Create date     : 2026-07-28                                                                                           |
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
        | ▪ Last Update     : 2026-07-28                                                                                           |
        | ▪ Create date     : 2026-07-28                                                                                           |
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
                        'Get Report Form - DataPickList - Chart Of Account - Non Header - Account Receivable (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!($varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                (new \App\Models\Database\SchData_OLTP_Accounting\General())->getReport_Form_DataPickList_ChartOfAccountNonHeader(
                                    //-----[ System Parameter ]-----------------------------------------------------( START POINT )-----
                                        //---► userSession
                                            $varUserSession,
                                        //---► branchID
                                            (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(
                                                $varUserSession
                                                )
                                            )['branchID'],
                                        //---► effectiveDate
                                            $varData['parameter']['effectiveDate'],
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
                                        //---► fullCode (DEFAULT)
                                            '1-0000 ► 1-1000 ► 1-1200 ► 1-1201 ► 1-1201.01',
                                        //---► fullName (DEFAULT)
                                            'Account Receivable',
                                        //---► fullCode (CUSTOM)
                                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                                $varUserSession,
                                                'fullCode',
                                                $varData['parameter']['dataFilter']
                                                ) ? (
                                                    (!is_null($varData['parameter']['dataFilter']['fullCode'])) 
                                                        ? $varData['parameter']['dataFilter']['fullCode'] 
                                                        : null
                                                        ) 
                                                    : null
                                            ),
                                        //---► fullName (CUSTOM)
                                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                                $varUserSession,
                                                'fullName',
                                                $varData['parameter']['dataFilter']
                                                ) ? (
                                                    (!is_null($varData['parameter']['dataFilter']['fullName'])) 
                                                        ? $varData['parameter']['dataFilter']['fullName'] 
                                                        : null
                                                        ) 
                                                    : null
                                            )
                                    //-----[ Filter Parameter ]-----------------------------------------------------(  END POINT  )-----
                                    ),
                                FALSE
                                )
                            ))
                            {
                            throw
                                new \Exception();
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
