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
            $this->varAPIIdentity = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getAPIIdentityFromClassFullName(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), __CLASS__);
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
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Login (version 1)');
                try {                    
                    //---> Variable Initializing
                    $varUserName = $varData['userName'];
                    $varUserPassword = $varData['userPassword'];
                    
                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    $varHost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_HOST');
                    $varPost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_PORT');
                    $varBaseDN = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_BASEDN');
                    //---> Jika Otentikasi berhasil
                    if(\App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPost, $varBaseDN, $varUserName, $varUserPassword)==true)
                        {
                        //--->
                        $varSessionIntervalInSeconds = (5*60);
                        $varSessionIntervalInSeconds = (10*60*60);
                        $varSessionIntervalInSeconds = (24*60*60);
                        
                        //---> Penyusunan Option List
                        $varOptionList = 
                            \App\Helpers\ZhtHelper\General\Helper_Array::getArrayKeyRename_LowerFirstCharacter(
                                $varUserSession, 
                                $this->getOptionList(
                                    $varUserSession,
                                    (new \App\Models\Database\SchSysConfig\General())->getUserIDByName($varUserSession, $varUserName)
                                    )
                                );
                 
                        //---> Generate APIWebToken
                        $i=0;
                        do
                            {
                            $varAPIWebToken = \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken($varUserSession, $varUserName, \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession), 'HS256', (int) \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentUnixTime($varUserSession));
                            }
                        while((new \App\Models\Database\SchSysConfig\General())->isExist_APIWebToken($varUserSession, $varAPIWebToken) == true);
                        
                        //---> Insert Data to PostgreSQL
                        $varBufferDB = (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->setDataInsert(
                            6000000000001, 
                            null, 
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentYear($varUserSession),
                            11000000000001,

                            $varUserName, 
                            $varAPIWebToken, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode($varUserSession, $varOptionList),
                            null, 
                            null, 
                            'NOW()', 
                            null, 
                            'NOW()', 
                            '(NOW() + \''.$varSessionIntervalInSeconds.' seconds\'::interval)'
                            );

                        $varSysID = $varBufferDB['SignRecordID'];                        
                        $varBufferDB = 
                            (new \App\Models\Database\SchSysConfig\TblLog_UserLoginSession())->getDataRecord(
                            $varUserSession, 
                            $varSysID
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
                                    'LDAPUserID' => $varBufferDB[0]['LDAPUserID'],
                                    'user_RefID' => $varBufferDB[0]['User_RefID'],
                                    'userRole_RefID' => $varBufferDB[0]['UserRole_RefID'],
                                    'branch_RefID' => $varBufferDB[0]['Branch_RefID'],
                                    'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                                    'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                                    'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ']
                                    ]
                                    ),
                                $varSessionIntervalInSeconds
                                );

                        //---> Set Return Value
                        $varDataSend = [
                            'APIWebToken' => $varBufferDB[0]['APIWebToken'],
                            //'LDAPUserID' => $varBufferDB[0]['LDAPUserID'],
                            'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                            'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                            'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ'],
                            'redisID' => $varRedisID,
                            'optionList' => $varOptionList
                            ];
                        
                        //$varDataSend = ['xxx' => $varBufferDB];
                        //$varDataSend = ['xxx' => $varData];
                        //$varDataSend = ['xxx' => $varSysID];
                        //$varDataSend = ['xxx' => $varUserName];
                        /*
                        $varDataSend = ['xxx' => 
                            (new \App\Models\Database\SchSysConfig\General())
                                ->getUserRolePrivilege(
                                    $varUserSession, 
                                    11000000000001,
                                    (new \App\Models\Database\SchSysConfig\General())->getUserIDByName(
                                        $varUserSession, 
                                        $varUserName
                                        )
                                    )
                            ];
                        */
                        
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend, $this->varAPIIdentity);
                        }
                    //---> Jika Otentikasi gagal
                    else
                        {
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Fail($varUserSession, 401, 'Invalid LDAP Authentication');
                        }
                    //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
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
            
            //$varIndex = 0;
            for($i=0; $i!=count($varData); $i++)
                {
                $varDataUserRole = (new \App\Models\Database\SchSysConfig\General())->getDataList_UserRole($varUserID, $varData[$i]['Sys_ID']);
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
                    (new \App\Models\Database\SchSysConfig\General())
                        ->getUserRolePrivilege(
                            $varUserSession, 
                            //11000000000001,
                            $varData[$i]['Sys_ID'],
                            $varUserID
                            );
                
                if (count($varReturnUserRole)!=0)
                    {
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

?>