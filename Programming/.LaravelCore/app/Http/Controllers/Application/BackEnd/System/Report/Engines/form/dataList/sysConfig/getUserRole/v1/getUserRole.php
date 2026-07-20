<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataList\sysConfig\getUserRole               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Report\Engines\form\dataList\sysConfig\getUserRole\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : getUserRole                                                                                                  |
    | ▪ Description : Menangani API report.form.dataList.sysConfig.getUserRole Version 1                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class getUserRole extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-02                                                                                           |
        | ▪ Create date     : 2026-07-02                                                                                           |
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
        | ▪ Last Update     : 2026-07-02                                                                                           |
        | ▪ Create date     : 2026-07-02                                                                                           |
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
                        'Get Report Form - DataPickList - User Role (version 1)'
                        );

                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if (!($varDataSend = 
                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getEngineDataSend_DataRead(
                                $varUserSession,
                                (new \App\Models\Database\SchSysConfig\General())->getReport_Form_DataList_UserRole(
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
                                        //---► name
                                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
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
                                        //---► userRoleGroup_RefID
                                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                                $varUserSession,
                                                'userRoleGroup_RefID',
                                                $varData['parameter']['dataFilter']
                                                ) ? (
                                                    (!is_null($varData['parameter']['dataFilter']['userRoleGroup_RefID'])) 
                                                        ? $varData['parameter']['dataFilter']['userRoleGroup_RefID'] 
                                                        : null
                                                        ) 
                                                    : null
                                            ),
                                        //---► userRoleGroupName
                                            (\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist(
                                                $varUserSession,
                                                'userRoleGroupName',
                                                $varData['parameter']['dataFilter']
                                                ) ? (
                                                    (!is_null($varData['parameter']['dataFilter']['userRoleGroupName'])) 
                                                        ? $varData['parameter']['dataFilter']['userRoleGroupName'] 
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
