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

            try {
                $varSysDataProcess = 
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__,
                        'Set Login (version 1)'
                        );

                try {
                    $varSignLoginSuccess = FALSE;

                    //---> Variable Initializing
                    $varUserName = $varData['userName'];
                    $varUserPassword = $varData['userPassword'];

                    //-----[ MAIN CODE ]----------------------------------------------------------------------------( START POINT )-----
                    $varHost = 
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                            $varUserSession,
                            'LDAP_HOST'
                            );

                    $varPort =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                            $varUserSession,
                            'LDAP_PORT'
                            );

                    $varBaseDN =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                            $varUserSession,
                            'LDAP_BASEDN'
                            );

                    if (
                        \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(
                            $varUserSession,
                            $varHost,
                            $varPort,
                            $varBaseDN,
                            $varUserName,
                            $varUserPassword
                            ) == true
                        ) {
                        $varSignLoginSuccess = true;
                        }
                    else
                        {
                        $varHost = 
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                $varUserSession,
                                'LDAP2_HOST'
                                );

                        $varPort =
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                $varUserSession,
                                'LDAP2_PORT'
                                );

                        $varBaseDN =
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(
                                $varUserSession,
                                'LDAP2_BASEDN'
                                );

                        if (
                            \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(
                                $varUserSession,
                                $varHost,
                                $varPort,
                                $varBaseDN,
                                $varUserName,
                                $varUserPassword
                                ) == true
                            ) {
                            $varSignLoginSuccess = true;
                            }
                        }

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

                        //$varSysID = $varBufferDB['SignRecordID'];
                        $varSysID =
                            $varBufferDB['data'][0]['SignRecordID'];

                        $varBufferDB =
                            (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord(
                                $varUserSession,
                                $varSysID
                                );

                        if (count($varBufferDB) > 0) {
                            //---> Data Initailizing Base On Database Record
                            //---> Get User Identity
                            $varUserIdentities =
                                \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserIdentity(
                                    $varUserSession,
                                    $varBufferDB[0]['LDAPUserID']
                                    );

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
                                            'userIdentities' => $varUserIdentities
                                        ]
                                    ),
                                    $varSessionIntervalInSeconds
                                );

                            //---> Set Return Value
                            $varDataSend = [
                                //'RedisID', $varRedisID,
                                'APIWebToken' => $varBufferDB[0]['APIWebToken'],
                                'userIdentities' => $varUserIdentities,
                                //'LDAPUserID' => $varBufferDB[0]['LDAPUserID'],
                                // 'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                                // 'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                                // 'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ'],
                                // 'redisID' => $varRedisID //,
                                //'optionList' => $varOptionList
                                ];

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

                catch (\Exception $ex) {
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

            catch (\Exception $ex) {
                }

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
