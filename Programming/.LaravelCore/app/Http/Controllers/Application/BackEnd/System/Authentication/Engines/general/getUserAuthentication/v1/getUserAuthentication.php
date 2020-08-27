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
                    $varUserName = $varData['userName'];
                    $varUserPassword = $varData['userPassword'];

                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    $varHost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_HOST');
                    $varPost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_PORT');
                    $varBaseDN = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_BASEDN');
                    //---> Jika Otentikasi berhasil
                    if(\App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPost, $varBaseDN, $varUserName, $varUserPassword)==true)
                        {

                        
                        
                        $varSQL = "
                            SELECT 
                                * 
                            FROM 
                                \"SchSysConfig\".\"Func_TblLog_UserLoginSession_SET\"(varSystemLoginSession, null, null, null, varInstitutionBranchID, 'SysEngine', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiU3lzRW5naW5lIiwiaWF0IjoxNTk4NDM0MDcxfQ.fkz2xMA1tUNmA5VaWC75a-A9WdYAmqToLbze3Sxojf4'::varchar, null::json, varInstitutionBranchID::bigint, 95000000000001::bigint, '2018-01-01 00:00:00+07'::timestamptz, '9999-12-31 23:59:59+07'::timestamptz, null::timestamptz, null::timestamptz);
                            ";
                        $varDataSend = [
                            'APIWebToken' => \App\Helpers\ZhtHelper\General\Helper_HTTPAuthentication::getJSONWebToken($varUserSession, $varUserName, 'SecretKey')
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