<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Environment\Engines\general\session\setUserSessionSysEngine\v1   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Environment\Engines\general\session\setUserSessionSysEngine\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setJobs                                                                                                      |
    | ▪ Description : Menangani API environment.general.session.setUserSessionSysEngine Version 1                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setUserSessionSysEngine extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private $varAPIIdentity;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-03                                                                                           |
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
            $this->varAPIIdentity = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPIIdentityFromClassFullName(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), __CLASS__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : main                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-02-03                                                                                           |
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set User Session for SysEngine on Cache (version 1)');
                try {
                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    try {
                        if(!$this->coreProcess($varUserSession))
                            {
                            throw new \Exception();
                            }
                        else
                            {
                            $varDataSend = [
                                "message" => "User Session For SysEngine Has Been Set" 
                                ];
                            }
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

        private function coreProcess($varUserSession)
            {
            $varReturn = true;
            
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);

            try {
                //---> Jika Belum dideklarasikan
                if((new \App\Models\Cache\General\APIWebToken())->isDataExist($varUserSession, $varAPIWebToken) == false)
                    {
                    $varSQLQuery = '
                        SELECT
                            "APIWebToken",
                            CASE
                                WHEN ("Sys_PID" IS NOT NULL) THEN
                                    "Sys_PID"
                                WHEN ("Sys_SID" IS NOT NULL) THEN
                                    "Sys_SID"
                            END AS "Sys_ID",
                            "User_RefID",
                            "UserRole_RefID",
                            "Branch_RefID",
                            "SessionStartDateTimeTZ",
                            "SessionAutoStartDateTimeTZ",
                            "SessionAutoFinishDateTimeTZ"
                        FROM
                            "SchSysConfig"."TblLog_UserLoginSession"
                        WHERE
                            "APIWebToken" = \''.$varAPIWebToken.'\'
                        ORDER BY 
                            "Sys_RPK" ASC
                        ';

                    $varBufferDB = (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, $varSQLQuery))['data'][0];

                    //dd($varBufferDB);

                    $varRedisID = (new \App\Models\Cache\General\APIWebToken())->setDataInsert(
                        $varUserSession, 
                        $varAPIWebToken,
                        json_encode([
                            'userLoginSession_RefID' => $varBufferDB['Sys_ID'],
                            'user_RefID' => $varBufferDB['User_RefID'],
                            'userRole_RefID' => $varBufferDB['UserRole_RefID'],
                            'branch_RefID' => $varBufferDB['Branch_RefID'],
                            'sessionStartDateTimeTZ' => $varBufferDB['SessionStartDateTimeTZ'],
                            'sessionAutoStartDateTimeTZ' => $varBufferDB['SessionAutoStartDateTimeTZ'],
                            'sessionAutoFinishDateTimeTZ' => $varBufferDB['SessionAutoFinishDateTimeTZ'],
                            'userPrivilegesMenu' => json_encode([])
                            ]), 
                        10);
                    (new \App\Models\Cache\General\APIWebToken())->setDataExpireAt($varUserSession, $varAPIWebToken, substr($varBufferDB['SessionAutoFinishDateTimeTZ'], 0, 19));
                    }

                //(new \App\Models\Cache\General\APIWebToken())->setDataExpireAt($varUserSession, $varAPIWebToken, '2021-01-26 10:04:00');
                //var_dump((new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession));
                } 
            catch (\Exception $ex) {
                $varReturn = false;
                }

            return $varReturn;
            }
        }
    }