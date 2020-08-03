<?php

namespace App\Http\Controllers\Application\BackEnd\System\Authentication
    {
    use Illuminate\Http\Request;
 
    class Controller_Main extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }

        public function init()
            {
            }
        
        public function getUserAuthentication()
        //public function getUserAuthentication($varUserName, $varUserPassword)
            {
            $varUserSession = 000000;
            $varHost = '192.168.1.23';
            $varPost = 389;
            $varBaseDN = 'DC=qdc-files,DC=qdc,DC=co,DC=id';
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