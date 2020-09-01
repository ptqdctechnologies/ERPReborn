<?php


namespace App\Http\Controllers\Application\BackEnd\System\Authentication\Engines\general\getUserAuthentication\v1
    {
    class getUserAuthentication extends \App\Http\Controllers\Controller
        {
        function __construct()
            {
            }


        function getUserAuthentication($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Authentication (version 1)');
                try {
                    //---> Variable Initializing
                    $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
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
                        //---> Generate APIWebToken
                        $i=0;
                        do
                            {
                            $varAPIWebToken = \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken($varUserSession, $varUserName, \App\Helpers\ZhtHelper\General\Helper_RandomNumber::getUniqueID($varUserSession), 'HS256', (int) \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentUnixTime($varUserSession));
                            }
                        while((new \App\Models\PostgreSQL\SchSysConfig\General())->isExist_APIWebToken($varUserSession, $varAPIWebToken) == true);

                        //---> Insert Data to PostgreSQL
                        $varBufferDB = (new \App\Models\PostgreSQL\SchSysConfig\TblLog_UserLoginSession())->setDataInsert(
                            6000000000001, 
                            null, 
                            \App\Helpers\ZhtHelper\Database\Helper_PostgreSQL::getCurrentYear($varUserSession),
                            11000000000001,
                            $varUserName, 
                            $varAPIWebToken, 
                            null, 
                            null, 
                            null, 
                            'NOW()', 
                            null, 
                            'NOW()', 
                            '(NOW() + \''.$varSessionIntervalInSeconds.' seconds\'::interval)'
                            );
                        //$varSysID = $varBufferDB['SignRecordID'];
                        $varBufferDB = (new \App\Models\PostgreSQL\SchSysConfig\TblLog_UserLoginSession())->getDataRecord($varUserSession, $varBufferDB['SignRecordID']);

                        //---> Insert Data to Redis
                        $varRedisID = (new \App\Models\Redis\General\APIWebToken())->setDataInsert(
                            $varUserSession, 
                            $varBufferDB[0]['APIWebToken'],
                            json_encode([
                                'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                                'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                                'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ']
                                ]), 
                            $varSessionIntervalInSeconds);

                        //---> Set Return Value
                        $varDataSend = [
                            'APIWebToken' => $varBufferDB[0]['APIWebToken'],
                            'sessionStartDateTimeTZ' => $varBufferDB[0]['SessionStartDateTimeTZ'],
                            'sessionAutoStartDateTimeTZ' => $varBufferDB[0]['SessionAutoStartDateTimeTZ'],
                            'sessionAutoFinishDateTimeTZ' => $varBufferDB[0]['SessionAutoFinishDateTimeTZ'],
                            'RedisID' => $varRedisID
                            ];
                        $varReturn = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::setEngineResponseDataReturn_Success($varUserSession, $varDataSend);
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
        }
    }

?>