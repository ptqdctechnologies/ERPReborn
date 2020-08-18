<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Controllers                                                                                               |
| ▪ Name Space : \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication                                  |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication
    {
    interface Controller_Main_Template
        {
        public function getUserAuthentication();
        }

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Controller_Main                                                                                              |
    | ▪ Description : Menangani Authentication                                                                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Controller_Main extends \App\Http\Controllers\Controller implements Controller_Main_Template
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-18                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct() {
            
/*            $varFolderPath = getcwd().'/./../app/Http/Controllers/Application/BackEnd/System/Core/Engines/API/Authentication/MethodsLibraries/getUserAuthentication/';
            $varFilesList = \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder(000000, $varFolderPath);
            for($i=0; $i!=count($varFilesList); $i++)
                {
                include($varFolderPath.$varFilesList[$i]);
                }*/
            //print_r($b);*/
        //    \App\Helpers\ZhtHelper\General\Helper_File::getFilesListInFolder(000000, $varFolderPath);
            
            //$this->xxx();
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserAuthentication                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-18                                                                                           |
        | ▪ Description     : Cek Otentikasi Pengguna                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) $varAPIVersion ► Versi API                                                                               |
        |      ▪ (array)  varData ► Paremeter Data                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getUserAuthentication()
            {            
            //---> Variable Initializing
            $varArgsCount = func_num_args();
            $varArgsList = func_get_args();

            $varUserSession = $varArgsList[0];
            $varAPIVersion = $varArgsList[1];
            $varData = $varArgsList[2];

            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Authentication');
                try {
                    //---> Method Call
                    $varMethodName = __FUNCTION__.'_v'.$varAPIVersion;
                    $varReturn = $this->{$varMethodName}($varUserSession, $varData);
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUserAuthentication_v1                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-18                                                                                           |
        | ▪ Description     : Cek Otentikasi Pengguna                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Paremeter Data                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function getUserAuthentication_v1($varUserSession, $varData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Authentication (version 1)');
                try {
                    //---> Variable Initializing
                    $varUserName = $varData[0];
                    $varUserPassword = $varData[1];

                    //---- ( MAIN CODE ) ------------------------------------------------------------------------- [ START POINT ] -----
                    $varHost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_HOST');
                    $varPost = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_PORT');
                    $varBaseDN = \App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'LDAP_BASEDN');
                    if(\App\Helpers\ZhtHelper\General\Helper_LDAP::getAuthenticationBySAMAccountName($varUserSession, $varHost, $varPost, $varBaseDN, $varUserName, $varUserPassword)==true)
                        {
                            //echo "Login berhasil";
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
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
        
    }