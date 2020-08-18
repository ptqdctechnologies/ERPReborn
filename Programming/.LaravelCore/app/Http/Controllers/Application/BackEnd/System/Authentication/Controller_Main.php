<?php

namespace App\Http\Controllers\Application\BackEnd\System\Authentication
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
//            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\RequestHandler::class);
            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\ResponseHandler::class);
//            $this->middleware(\App\Http\Middleware\Application\BackEnd\API\Authentication\TerminateHandler::class);
            }

        public function init()
            {
            }

        public function getUserAuthentication()
            {
            try {
                
                //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                
                $varDataReceive = \App\Helpers\ZhtHelper\System\Helper_HTTPRequest::getRequest($varUserSession);
                $varAPIVersion = $varDataReceive['metadata']['APIVersion'];
                $varUserName = $varDataReceive['data']['userName'];
                $varUserPassword = $varDataReceive['data']['userPassword'];

                $ObjEngine = new \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication\Controller_Main();
                $varDataSend = $ObjEngine->getUserAuthentication($varUserSession, $varAPIVersion, [$varUserName, $varUserPassword]);
                //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----                
                } 
            catch (\Exception $ex) {
                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, 'Error');
                }
            return \App\Helpers\ZhtHelper\System\Helper_HTTPResponse::setResponse($varUserSession, $varDataSend);
            }
            
            
            
        public function getUserAuthenticationOLD()
        //public function getUserAuthentication($varUserName, $varUserPassword)
            {
            $varUserSession = 000000;
            $varHost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(000000, 'LDAP_HOST');
            $varPost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(000000, 'LDAP_PORT');
            $varBaseDN = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment(000000, 'LDAP_BASEDN');
            $varUserName = 'teguh.pratama';
            $varUserPassword = 'teguhpratama789';
            
            //echo '<br>'.$varUserName;
            //echo '<br>'.$varUserPassword;
            
            //echo "User Auth";
            //$x = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName(000000, '192.168.1.23', 389, 'DC=qdc-files,DC=qdc,DC=co,DC=id', 'teguh.pratama', 'teguhpratama789');
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Authentication');
                try {


                    $x = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPost, $varBaseDN, $varUserName, $varUserPassword);


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