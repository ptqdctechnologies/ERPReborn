<?php

namespace App\Http\Controllers\Application\BackEnd\System\UserAuthentication
    {
 //   use Illuminate\Http\Request;
    //use Session;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            //$this->middleware(\App\Http\Middleware\Application\BackEnd\UserAuthentication::class, []);
            }

        public function __destruct()
            {
            }
            
        public function login()
            {
            echo "login";
            }
        
        public function loginAuthentication($varUserSession=000000, $varUserName='teguh.pratama', $varUserPassword='teguhpratama789')
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get login authentication');
                try {
//                    \App\Helpers\ZhtHelper\General\Helper_Session::delete(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());

//                    $varHost = '192.168.1.23';
  //                  $varPort = 389;
    //                $varBaseDN = 'DC=qdc-files,DC=qdc,DC=co,DC=id';
      //              $varReturn = \App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPort, $varBaseDN, $varUserName, $varUserPassword);

        //            \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
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