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
            //---> Variable Initializing
            $varUserName = $varData['userName'];
            $varUserPassword = $varData['userPassword'];

            //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
            $varHost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_HOST');
            $varPost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_PORT');
            $varBaseDN = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_BASEDN');
            if(\App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPost, $varBaseDN, $varUserName, $varUserPassword)==true)
                {
                $varDataSend = ['message' => 'Login Succeeded'];
                return $varDataSend;
                }
            else { 
                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponseOveride($varUserSession, 401, 'Invalid LDAP Authentication');
                }
            //---- ( MAIN CODE ) --------------------------------------------------------------------------- [ END POINT ] -----
            }
            
            
            
            
        function getUserAuthenticationOLD($varUserSession, $varData)
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
                    if(\App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPost, $varBaseDN, $varUserName, $varUserPassword)==true)
                        {
                        //echo "Login berhasil";
//throw new \Exception('xxxx');
return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, 'Errorxxxx');
                        $varDataSend = ['message' => 'Sukses alhamdulillah'];
                        }
                    else
                        {
        //                    //echo "Login gagal";
                        $varDataSend = ['message' => 'Login gagal'];
        //                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, 'Authentication process failed');
                        }          
                    $varReturn = $varDataSend;                    
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

//                abort(422);
//return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, 'Errorxxxx');
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }    
        }
    }

?>