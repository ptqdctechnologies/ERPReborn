<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : API Engine Controller                                                                                             |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLogin\v1                       |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLogin\v1
    {
    use Illuminate\Support\Facades\Redis;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : setLogin                                                                                                     |
    | ▪ Description : Menangani API authentication.general.setLogin Version 1                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */

    class setLogin extends \App\Http\Controllers\Controller
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
        | ▪ Last Update     : 2020-11-13                                                                                           |
        | ▪ Creation Date   : 2020-11-13                                                                                           |
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
            $this->varAPIIdentity = 
                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPIIdentityFromClassFullName(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    __CLASS__
                    );
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setLogin                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-01-02                                                                                           |
        | ▪ Creation Date   : 2020-11-13                                                                                           |
        | ▪ Description     : Fungsi Utama Engine                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function setLogin($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);

            // [PROFILER] Step-timing instrumentation — remove once bottleneck is identified.
            // Timings are logged to Laravel's log at the end of the function with prefix [setLogin.profile].
            // Tail with:  docker exec php-apache-backend tail -f /var/www/html/WebBackEnd/storage/logs/laravel.log | grep setLogin.profile
            $varProfile = ['start' => microtime(true)];

            // [DB-PROFILER] Reset per-request DB counters so totals reflect only this login.
            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::resetDBStats();

            try {
                $varSysDataProcess = 
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Set Login (version 1)'
                        );

                try {
                    $varSignLoginSuccess = FALSE;

                    //---> Initializing : varUserName
                        $varUserName =
                            $varData['userName'];
                        //dd($varUserName);

                    //---> Initializing : varUserPassword
                        $varUserPassword =
                            $varData['userPassword'];
                        //dd($varUserPassword);

                    //---> Initializing : varBranchID
                        try {
                            $varBranchID =
                                $varData['additionalData']['branch_RefID'];
                            }
                        catch (\Exception $ex) {
                            $varBranchID =
                                NULL;
                            }
                        //dd($varBranchID);

                    //---> Initializing : varUserRoleID
                        try {
                            $varUserRoleID =
                                $varData['additionalData']['userRole_RefID'];
                            }
                        catch (\Exception $ex) {
                            $varUserRoleID =
                                NULL;
                            }
                        //dd($varUserRoleID);

                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                        //---> Initializing : varHost
                            $varHost = 
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                    $varUserSession,
                                    'LDAP_HOST'
                                    );

                        //---> Initializing : varPort
                            $varPort =
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                    $varUserSession,
                                    'LDAP_PORT'
                                    );

                        //---> Initializing : varBaseDN
                            $varBaseDN =
                                \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                    $varUserSession,
                                    'LDAP_BASEDN'
                                    );

                        //---> LDAP Checking
                            \Illuminate\Support\Facades\Log::info('[setLogin] LDAP1 attempt', [
                                'user'   => $varUserName,
                                'host'   => $varHost,
                                'port'   => $varPort,
                                'baseDN' => $varBaseDN,
                            ]);
                            $varProfile['ldap_start'] = microtime(true); // [PROFILER]
                            $varLDAP1Result = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(
                                $varUserSession, $varHost, $varPort, $varBaseDN, $varUserName, $varUserPassword
                            );
                            \Illuminate\Support\Facades\Log::info('[setLogin] LDAP1 result', [
                                'result' => $varLDAP1Result,
                                'type'   => gettype($varLDAP1Result),
                            ]);
                            if ($varLDAP1Result == true) {
                                $varSignLoginSuccess = true;
                                }
                            else
                                {
                                $varProfile['ldap1_end'] = microtime(true); // [PROFILER]

                                //---> Reinitializing : varHost
                                    $varHost =
                                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                            $varUserSession,
                                            'LDAP2_HOST'
                                            );

                                //---> Reinitializing : varPort
                                    $varPort =
                                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                            $varUserSession,
                                            'LDAP2_PORT'
                                            );

                                //---> Reinitializing : varBaseDN
                                    $varBaseDN =
                                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                            $varUserSession,
                                            'LDAP2_BASEDN'
                                            );

                                \Illuminate\Support\Facades\Log::info('[setLogin] LDAP2 attempt (fallback)', [
                                    'user'   => $varUserName,
                                    'host'   => $varHost,
                                    'port'   => $varPort,
                                    'baseDN' => $varBaseDN,
                                ]);
                                $varLDAP2Result = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(
                                    $varUserSession, $varHost, $varPort, $varBaseDN, $varUserName, $varUserPassword
                                );
                                \Illuminate\Support\Facades\Log::info('[setLogin] LDAP2 result', [
                                    'result' => $varLDAP2Result,
                                    'type'   => gettype($varLDAP2Result),
                                ]);
                                if ($varLDAP2Result == true) {
                                    $varSignLoginSuccess = true;
                                    }
                                }
                            $varProfile['ldap_end'] = microtime(true); // [PROFILER]
                            \Illuminate\Support\Facades\Log::info('[setLogin] LDAP overall', [
                                'success'     => $varSignLoginSuccess,
                                'elapsed_ms'  => round(($varProfile['ldap_end'] - $varProfile['ldap_start']) * 1000, 1),
                            ]);

                        //---> Jika Otentikasi berhasil
                            if (
                                $varSignLoginSuccess == true
                                ) {
                                //--->
                                $varSessionIntervalInSeconds = (5 * 60);
                                $varSessionIntervalInSeconds = (10 * 60 * 60);
                                $varSessionIntervalInSeconds = (24 * 60 * 60);

                                //---> Penyusunan Option List
                                /*
                                $varOptionList = 
                                    \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_LowerFirstCharacter(
                                        $varUserSession, 
                                        $this->getOptionList(
                                            $varUserSession,
                                            (new \App\Models\Database\SchSysConfig\General())->getUserIDByName($varUserSession, $varUserName)
                                            )
                                        );
                                 $varOptionList = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varOptionList);
                                var_dump($varOptionList);
                                echo "<br><br><br>";
                                */
                                $varOptionList = [];

                                /*
        $varAPIWebToken = \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken($varUserSession, $varUserName, \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession), 'HS256', (int) \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentUnixTime($varUserSession));
        $varDataSend = [
            'AWT' => $varAPIWebToken,
            'xxx' => ((new \App\Models\Database\SchSysConfig\General())->isExist_APIWebToken($varUserSession, $varAPIWebToken)) 
            ];
        */

                                //---> Generate APIWebToken
                                $i = 0;
                                do {
                                    $varAPIWebToken =
                                        \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken(
                                            $varUserSession,
                                            $varUserName,
                                            \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession),
                                            'HS256',
                                            (int) \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentUnixTime($varUserSession)
                                            );
                                    } 
                                while ((new \App\Models\Database\SchSysConfig\General())->isExist_APIWebToken($varUserSession, $varAPIWebToken) == true);

                                //---> Insert Data to PostgreSQL
                                $varBufferDB =
                                    (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->setDataInsert(
                                        6000000000001,
                                        null,
                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentYear($varUserSession),
                                        11000000000001,

                                        $varUserName,
                                        $varAPIWebToken,
                                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                            $varUserSession,
                                            $varOptionList
                                            ),
                                        null,
                                        null,
                                        'NOW()',
                                        null,
                                        'NOW()',
                                        '(NOW() + \'' . $varSessionIntervalInSeconds . ' seconds\'::interval)'
                                        );  
                                //var_dump(\App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentYear($varUserSession));

                                \Illuminate\Support\Facades\Log::info('[setLogin] TblLog_UserLoginSession::setDataInsert returned', [
                                    'type'             => gettype($varBufferDB),
                                    'is_array'         => is_array($varBufferDB),
                                    'has_data_key'     => is_array($varBufferDB) && array_key_exists('data', $varBufferDB),
                                    'data_row_0'       => is_array($varBufferDB) ? ($varBufferDB['data'][0] ?? null) : null,
                                    'head'             => is_array($varBufferDB) ? array_slice($varBufferDB, 0, 3, true) : var_export($varBufferDB, true),
                                ]);
                                if (!isset($varBufferDB['data'][0]['SignRecordID'])) {
                                    throw new \Exception('TblLog_UserLoginSession.setDataInsert did not return SignRecordID — stored proc Func_TblLog_UserLoginSession_INSERT may have failed. Check Postgres log and SysEngine role grants on SchSysConfig.');
                                }

                                //$varSysID = $varBufferDB['SignRecordID'];
                                $varSysID =
                                    $varBufferDB['data'][0]['SignRecordID'];
                                //dd($varSysID);

                                $varBufferDB =
                                    (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord(
                                        $varUserSession,
                                        $varSysID
                                        );
                                //dd($varBufferDB);
                                $varProfile['db_session_written'] = microtime(true); // [PROFILER]
                                \Illuminate\Support\Facades\Log::info('[setLogin] session written', [
                                    'sys_id'            => $varSysID,
                                    'rows_returned'     => is_array($varBufferDB) ? count($varBufferDB) : 'not-array',
                                    'user_RefID'        => $varBufferDB[0]['User_RefID']   ?? null,
                                    'LDAPUserID'        => $varBufferDB[0]['LDAPUserID']   ?? null,
                                    'APIWebToken_head'  => isset($varBufferDB[0]['APIWebToken']) ? substr($varBufferDB[0]['APIWebToken'], 0, 16).'…' : null,
                                ]);

                                if (count($varBufferDB) > 0) {
                                    //---> Data Initailizing Base On Database Record
                                    //---> Get User Identity
                                        $varUserIdentities =
                                            \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserIdentity(
                                                $varUserSession,
                                                $varBufferDB[0]['LDAPUserID']
                                                );
                                        //dd($varUserIdentities);

                                    $varOptionList_BranchIDList = NULL;
                                    //---> Initializing : varDataUserOptionList
                                        try {
                                            $varDataUserAvailableOptionListTemp =
                                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode(
                                                    $varUserSession,
                                                    \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getQueryExecution(
                                                        $varUserSession,
                                                        \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getBuildStringLiteral_StoredProcedure(
                                                            $varUserSession,
                                                            'SchSysConfig.Func_GetDataPickSet_UserPrivileges',
                                                            [
                                                                [$varBufferDB[0]['User_RefID'], 'bigint']
                                                            ]
                                                            )
                                                        )['data'][0]['ProcessedData_JSON']
                                                    )['general'];

                                            $varOptionList_BranchIDList =
                                                $varDataUserAvailableOptionListTemp['branchIDList'];

                                            for ($i = 0, $iMax = count($varDataUserAvailableOptionListTemp['branchIDList']); $i != $iMax; $i++) {
                                                for ($j = 0, $jMax = count($varDataUserAvailableOptionListTemp['userRoleIDList']); $j != $jMax; $j++) {
                                                    $varDataUserRoleSelectionList[$j] = [
                                                        'ID' => $varDataUserAvailableOptionListTemp['userRoleIDList'][$j],
                                                        'name' => $varDataUserAvailableOptionListTemp['userRoleNameList'][$j]
                                                        ];
                                                    }

                                                $varDataUserAvailableOptionList['institutionBranchList'][$i] = [
                                                    'ID' => $varDataUserAvailableOptionListTemp['branchIDList'][$i],
                                                    'name' => $varDataUserAvailableOptionListTemp['branchNameList'][$i],
                                                    'userRoleList' => $varDataUserRoleSelectionList
                                                    ];

                                                $varOptionList_BranchUserRoleIDList[$varDataUserAvailableOptionList['institutionBranchList'][$i]['ID']] =
                                                    $varDataUserAvailableOptionListTemp['userRoleIDList'];
                                                }
                                            }

                                        catch (\Throwable $ex) {
                                            \Illuminate\Support\Facades\Log::error('[setLogin] privileges query FAILED', [
                                                'class'   => get_class($ex),
                                                'message' => $ex->getMessage(),
                                                'file'    => $ex->getFile(),
                                                'line'    => $ex->getLine(),
                                            ]);
                                            $varDataUserAvailableOptionList = NULL;
                                            }
                                    $varProfile['privileges_done'] = microtime(true); // [PROFILER]
                                    \Illuminate\Support\Facades\Log::info('[setLogin] privileges resolved', [
                                        'branch_count'            => is_array($varOptionList_BranchIDList ?? null) ? count($varOptionList_BranchIDList) : 0,
                                        'user_available_is_null'  => is_null($varDataUserAvailableOptionList ?? null),
                                    ]);

                                    //---> Insert Data to Redis
                                        $varRedisID =
                                            (new \App\Models\Cache\General\APIWebToken())->setDataInsert(
                                                $varUserSession,
                                                $varBufferDB[0]['APIWebToken'],
                                                \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                                    $varUserSession,
                                                    [
                                                        'userLoginSession_RefID' => $varBufferDB[0]['Sys_ID'],
                                                        'user_RefID' => $varBufferDB[0]['User_RefID'],
                                                        'userRole_RefID' => $varBufferDB[0]['UserRole_RefID'],
                                                        'branch_RefID' => $varBufferDB[0]['Branch_RefID'],
                                                        'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                                                        'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                                                        'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ'],
                                                        'userIdentities' => $varUserIdentities,
                                                        'userAvailableOptionList' => $varDataUserAvailableOptionList
                                                    ]
                                                ),
                                                $varSessionIntervalInSeconds
                                            );
                                    $varProfile['redis_primary_done'] = microtime(true); // [PROFILER]

                                    //---> Exceptional Condition : Branch ID In Additional Data Is Not Feasible
                                        if (strcmp(strtoupper((string) $varBranchID), 'AUTO') == 0) {
                                            if (count($varOptionList_BranchIDList) > 0) {
                                                $varBranchID =
                                                    $varOptionList_BranchIDList[0];
                                                }
                                            else {
                                                throw
                                                    new \Exception('Branch ID in Addtional Data is not Feasible');
                                                }
                                            }
                                        else {
                                            if (($varBranchID != NULL) AND (in_array($varBranchID, $varOptionList_BranchIDList)) == FALSE) {
                                                throw
                                                    new \Exception('Branch ID in Addtional Data is not Feasible');
                                                }
                                            }

                                    //---> Exceptional Condition : User Role ID In Additional Data Is Not Feasible
                                        if (strcmp(strtoupper((string) $varUserRoleID), 'AUTO') == 0) {
                                            if (count($varOptionList_BranchUserRoleIDList[$varBranchID]) > 0) {
                                                //---> Check For Super User Role
                                                if ((in_array(95000000000001, $varOptionList_BranchUserRoleIDList[$varBranchID])) == TRUE) {
                                                    $varUserRoleID =
                                                        95000000000001;
                                                    }
                                                //---> Non Super User Role
                                                else {
                                                    $varUserRoleID =
                                                        $varOptionList_BranchUserRoleIDList[$varBranchID][0];                                                    
                                                    }
                                                }
                                            else {
                                                throw
                                                    new \Exception('User Role ID in Addtional Data is not Feasible');
                                                }                                            
                                            }
                                        else {
                                            if (($varUserRoleID != NULL) AND (in_array($varUserRoleID, $varOptionList_BranchUserRoleIDList[$varData['additionalData']['branch_RefID']])) == FALSE) {
                                                throw
                                                    new \Exception('User Role ID in Addtional Data is not Feasible');
                                                }                                            
                                            }

                                    //---> Set Return Value
                                        $varDataSend = [
                                            //'RedisID', $varRedisID,
                                            'APIWebToken' => $varBufferDB[0]['APIWebToken'],
                                            'userIdentities' => $varUserIdentities,
                                            'optionList' => $varDataUserAvailableOptionList
                                            //'LDAPUserID' => $varBufferDB[0]['LDAPUserID'],
                                            // 'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                                            // 'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                                            // 'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ'],
                                            // 'redisID' => $varRedisID //,
                                            //'optionList' => $varOptionList
                                            ];
                                        //dd($varDataSend['APIWebToken']);
//dd($varDataSend);


//-----[ MULYADI CODE ]-----( START )-----
                                    // START REDIS HELPER LOGIN 
                                    // Redis::set("nama", json_encode($varDataSend['APIWebToken']));

                                    $user_RefID = $varDataSend['userIdentities']['user_RefID'];

                                    $varTTL = 32400; // 9 Jam

                                    // 1
                                    //DATA BRANCH

                                    if (Redis::get("Branch" . $user_RefID) == null) {
                                        $varBranch =
                                            (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_InstitutionBranch(
                                                $varUserSession,
                                                $user_RefID
                                            );

                                        //SET REDIS BRANCH

                                        \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                                            $varUserSession,
                                            "Branch" . $user_RefID,
                                            json_encode($varBranch),
                                            $varTTL
                                        );
                                        }

                                    $varDataBranch =
                                        json_decode(
                                            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                                                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                "Branch" . $user_RefID
                                                ),
                                            true
                                            );



                                    // 2
                                    //GET REDIS BRANCH

                                    if (Redis::get("Role" . $user_RefID) == null) {
                                        //DATA ROLE

                                        if (count($varDataBranch) > 1) {
                                            $varRole =
                                                (new \App\Models\Database\SchSysConfig\General())->getDataList_UserRole(
                                                    $varUserSession,
                                                    $user_RefID,
                                                    null
                                                );
                                            }
                                        else
                                            {
                                            $varRole =
                                                (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_Role(
                                                    $varUserSession,
                                                    $user_RefID,
                                                    $varDataBranch[0]['Sys_ID'],
                                                    null,
                                                );
                                            }

                                        // //SET REDIS ROLE

                                        \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                                            $varUserSession,
                                            "Role" . $user_RefID,
                                            json_encode($varRole),
                                            $varTTL
                                        );
                                    }


                                    // 3
                                    //DATA MENU

                                    $varDataRole = 
                                        json_decode(
                                            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                                                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                "Role".$user_RefID
                                                ),
                                            true
                                            );

                                    if (count($varDataBranch) == 1) {
                                        foreach ($varDataRole as $varDataRoles) {

                                            if (Redis::get("RedisSetMenu" . $varDataRoles['Sys_ID']) == null) {

                                                //SET REDIS MENU

                                                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                                                    $varUserSession,
                                                    "RedisSetMenu" . $varDataRoles['Sys_ID'],
                                                    true,
                                                    $varTTL
                                                );

                                                $varMenu =
                                                    (new \App\Models\Database\SchSysConfig\General())->getUserPrivilege_MenuLayout(
                                                        $varUserSession,
                                                        $varDataBranch[0]['Sys_ID'],
                                                        $user_RefID
                                                        );

                                                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                                                    $varUserSession,
                                                    "RedisGetMenu" . $user_RefID,
                                                    json_encode($varMenu),
                                                    $varTTL
                                                    );
                                                }
                                            }

                                        $varDataRedis = \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONDecode($varUserSession, (new \App\Models\Cache\General\APIWebToken())->getDataRecord($varUserSession, $varBufferDB[0]['APIWebToken']));
                                        $varDataRedis['branch_RefID'] = $varDataBranch[0]['Sys_ID'];
                                        (new \App\Models\Cache\General\APIWebToken())->setDataUpdate($varUserSession, $varBufferDB[0]['APIWebToken'], \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varDataRedis));
                                    }


                                    // END REDIS HELPER LOGIN
//-----[ MULYADI CODE ]-----( END )-----
                                    $varProfile['redis_cache_done'] = microtime(true); // [PROFILER]

                                    //---> Set Auto Login Branch And User Role
                                    if (($varBranchID != NULL) AND ($varUserRoleID != NULL))
                                        {
                                        (new \App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLoginBranchAndUserRole\v1\setLoginBranchAndUserRole())->main(
                                            //$varUserSession,
                                            $varBufferDB[0]['Sys_ID'],
                                            [
                                            'branchID' => $varBranchID,
                                            'userRoleID' => $varUserRoleID,
                                            'APIWebToken'=> $varDataSend['APIWebToken']
                                            ]
                                            );

                                    /*
                                        try {
                                            (new \App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\setLoginBranchAndUserRole\v1\setLoginBranchAndUserRole())->main(
                                                $varUserSession,
                                                [
                                                'branchID' => $varBranchID,
                                                'userRoleID' => $varUserRoleID,
                                                'APIWebToken'=> $varDataSend['APIWebToken']
                                                ]
                                                );
                                            }
                                        catch (\Exception $ex) {
                                            }
    */
                                        }

                                    $varProfile['auto_login_done'] = microtime(true); // [PROFILER]

                                    // [TIMING] Expose per-step timing in the response so k6 (and any
                                    // other client) can measure LDAP latency independently of total
                                    // request duration. All values are milliseconds.
                                    $varDeltaMs = function ($from, $to) use ($varProfile) {
                                        if (!isset($varProfile[$from], $varProfile[$to])) { return null; }
                                        return round(($varProfile[$to] - $varProfile[$from]) * 1000, 2);
                                    };
                                    $varDataSend['serverTiming'] = [
                                        'ldap_ms'           => $varDeltaMs('ldap_start',        'ldap_end'),
                                        'ldap1_ms'          => $varDeltaMs('ldap_start',        'ldap1_end'),   // only if LDAP1 failed
                                        'db_session_ms'     => $varDeltaMs('ldap_end',          'db_session_written'),
                                        'privileges_ms'     => $varDeltaMs('db_session_written','privileges_done'),
                                        'redis_primary_ms'  => $varDeltaMs('privileges_done',   'redis_primary_done'),
                                        'redis_cache_ms'    => $varDeltaMs('redis_primary_done','redis_cache_done'),
                                        'auto_login_ms'     => $varDeltaMs('redis_cache_done',  'auto_login_done'),
                                        'engine_total_ms'   => round((microtime(true) - $varProfile['start']) * 1000, 2),
                                        // [DB-PROFILER] Per-request DB breakdown across ALL queries
                                        // executed during this request (reads vs writes, counts + totals).
                                        'db' => \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getDBStats(),
                                    ];

                                    $varReturn =
                                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success(
                                            $varUserSession,
                                            $varDataSend,
                                            $this->varAPIIdentity
                                            );
                                    }
                                else {
                                    $varReturn = 
                                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                            $varUserSession,
                                            401,
                                            'User\'s Environment Variable Can\'t be Declared'
                                            );
                                    }
                                }
                        //---> Jika Otentikasi gagal
                            else {
                                $varReturn = 
                                    \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                                        $varUserSession,
                                        401,
                                        'Invalid LDAP Authentication'
                                        );
                                }
                    //-----[ MAIN CODE ]------------------------------------------------------------------------------( END POINT )-----
 
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    }

                catch (\Throwable $ex) {
                    \Illuminate\Support\Facades\Log::error('[setLogin] inner throwable caught', [
                        'class'    => get_class($ex),
                        'message'  => $ex->getMessage(),
                        'file'     => $ex->getFile(),
                        'line'     => $ex->getLine(),
                        'trace_0'  => $ex->getTrace()[0]['function'] ?? null,
                        'trace_1'  => $ex->getTrace()[1]['function'] ?? null,
                    ]);
                    $varReturn =
                        \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail(
                            $varUserSession,
                            401,
                            $ex->getMessage()
                            );

                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, ' . $ex->getMessage());
                    }

                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                }

            catch (\Throwable $ex) {
                \Illuminate\Support\Facades\Log::error('[setLogin] OUTER throwable caught (likely suppressed before)', [
                    'class'   => get_class($ex),
                    'message' => $ex->getMessage(),
                    'file'    => $ex->getFile(),
                    'line'    => $ex->getLine(),
                ]);
                }

            // [PROFILER] Emit step-timing breakdown. Wrapped in its own try so profiling
            // failure can never break the login response.
            try {
                $varProfile['end'] = microtime(true);
                $varPrev = $varProfile['start'];
                $varSteps = [];
                foreach ($varProfile as $varKey => $varTime) {
                    if ($varKey === 'start') { continue; }
                    $varSteps[$varKey] = round(($varTime - $varPrev) * 1000, 1);
                    $varPrev = $varTime;
                }
                \Illuminate\Support\Facades\Log::info('[setLogin.profile] ' . json_encode([
                    'total_ms' => round(($varProfile['end'] - $varProfile['start']) * 1000, 1),
                    'user'     => $varUserName ?? null,
                    'success'  => $varSignLoginSuccess ?? false,
                    'steps_ms' => $varSteps,
                    'db'       => \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getDBStats(),
                ]));
            } catch (\Throwable $exProfile) { /* never break login on profiler error */ }

            return
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getOptionList        ,                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2023-01-02                                                                                           |
        | ▪ Creation Date   : 2020-11-13                                                                                           |
        | ▪ Description     : Fungsi Pembentukan Option List                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function getOptionList(int $varUserSession, int $varUserID)
            {
            $varReturn = [];
            $varData = (new \App\Models\Database\SchSysConfig\General())->getDataList_BranchAccess($varUserID);
            //var_dump($varData);

            //$varIndex = 0;
            for ($i = 0; $i != count($varData); $i++) {
                $varDataUserRole =
                    (new \App\Models\Database\SchSysConfig\General())->getDataList_UserRole(
                        $varUserID,
                        $varData[$i]['Sys_ID']
                    );

                /*                $varReturnUserRole = null;
                for($j=0; $j!=count($varDataUserRole); $j++)
                    {
                    if(!$varDataUserRole[$j]['Sys_ID'])
                        {
                        continue;
                        }
                    $varReturnUserRole[$j]=[
                        'UserRole_RefID' => $varDataUserRole[$j]['Sys_ID'],
                        'UserRoleName' => $varDataUserRole[$j]['UserRoleName'],
                        ];  
                    }*/
                $varReturnUserRole =
                    (new \App\Models\Database\SchSysConfig\General())->getUserRolePrivilege(
                        $varUserSession,
                        //11000000000001,
                        $varUserID,
                        $varData[$i]['Sys_ID']
                    );
                //var_dump($varReturnUserRole);

                if (count($varReturnUserRole) != 0) {
                    //$varReturn[$i] = 
                    $varReturn[count($varReturn)] =
                        [
                            'Branch_RefID' => $varData[$i]['Sys_ID'],
                            'BranchName' => $varData[$i]['BranchName'],
                            'UserRole' => $varReturnUserRole
                        ];
                    }
                }

            return $varReturn;
            }
        }
    }
