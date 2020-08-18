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
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Controller_Main                                                                                              |
    | ▪ Description : Menangani Authentication                                                                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Controller_Main extends \App\Http\Controllers\Controller
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
            $varAPIClass = $varArgsList[1][0];
            $varAPIName = $varArgsList[1][1];
            $varAPIVersion = $varArgsList[1][2];
            $varData = $varArgsList[2];

            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get User Authentication');
                try {
                    //---> Method Call
                    $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../app/Http/Controllers/Application/BackEnd/System/Core/Engines/API/Authentication/MethodsLibraries/'.$varAPIClass.'/'.$varAPIName.'/'.$varAPIVersion.'.php');
                    if(!$varFilePath)
                        {
                        throw new \Exception('API '.$varAPIClass.'.'.$varAPIName.' version '.$varAPIVersion.' and file path is not found');
                        }
                    require_once($varFilePath);
                    $varObjEngine = new \App\Http\Controllers\Application\BackEnd\System\Core\Engines\API\Authentication\authentication();
                    $varReturn = $varObjEngine->{__FUNCTION__}($varUserSession, $varData);
                    //var_dump($varReturn);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
//                    return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, 'Error');
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
//                return \App\Helpers\ZhtHelper\System\Helper_HTTPError::setResponse($varUserSession, 422, 'Error');
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }        
    }