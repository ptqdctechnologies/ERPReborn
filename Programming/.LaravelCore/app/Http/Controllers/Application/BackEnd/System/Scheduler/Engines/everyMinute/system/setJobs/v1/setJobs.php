<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyMinute\system\setJobs\v1                  |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Scheduler\Engines\everyMinute\system\setJobs\v1
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setLogin                                                                                                     |
    | ▪ Description : Menangani API scheduler.everyMinute.system.setJobs Version 1                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class setJobs extends \App\Http\Controllers\Controller
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
        | ▪ Last Update     : 2021-01-25                                                                                           |
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
        | ▪ Method Name     : loadAllJobs                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-01-25                                                                                           |
        | ▪ Description     : loadAllJobs                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function loadAllJobs(int $varUserSession)
            {
            $this->setAPIWebTokenSysEngine($varUserSession);
            }
            
        private function setAPIWebTokenSysEngine(int $varUserSession)
            {
            $varAPIWebToken = (new \App\Models\Database\SchSysConfig\General())->getAPIWebToken_SysEngine($varUserSession);
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

                $varBufferDB = (\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution($varUserSession, $varSQLQuery))['Data'][0];

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
                        'sessionAutoFinishDateTimeTZ' => $varBufferDB['SessionAutoFinishDateTimeTZ']
                        ]), 
                    10);
                (new \App\Models\Cache\General\APIWebToken())->setDataExpireAt($varUserSession, $varAPIWebToken, substr($varBufferDB['SessionAutoFinishDateTimeTZ'], 0, 19));
                }

//            (new \App\Models\Cache\General\APIWebToken())->setDataExpireAt($varUserSession, $varAPIWebToken, '2021-01-26 10:04:00');
//            var_dump((new \App\Models\Cache\General\APIWebToken())->getAllDataRecord($varUserSession));
            }
        }
    }