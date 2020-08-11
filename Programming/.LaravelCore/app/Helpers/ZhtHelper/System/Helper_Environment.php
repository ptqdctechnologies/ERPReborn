<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System
    {
    use Illuminate\Http\Request;


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Environment                                                                                           |
    | ▪ Description : Menangani segala parameter yang terkait Environment                                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Environment
        {
        private static $varNameSpace;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init()
            {
            self::$varNameSpace=get_class();
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationID                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data Application ID                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationID()
            {
            $varReturn = 'ERPReborn';
            return $varReturn;
            }

        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationDateTimeTZ                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data waktu sekarang                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationDateTimeTZ()
            {
            date_default_timezone_set('Asia/Jakarta');
            $varDate = date_create(null, timezone_open('Asia/Jakarta'));

            $varMicroDate = microtime();
            $varDateArray = explode(" ", $varMicroDate);
            $varMicroSecond = substr($varDateArray[1], 0, 6);
            
            $varTimeZoneOffset = str_pad((($varDate->getOffset())/3600), 2, '0', STR_PAD_LEFT);
                        
            $varReturn = date("Y-m-d H:i:s.", time()).$varMicroSecond.'+'.$varTimeZoneOffset;
            
            //$varUnixTime = (int) file_get_contents((stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://').'localhost/getJSUnixTime');
            //$varReturn = date("Y-m-d H:i:s.", $varUnixTime).$varMicroSecond.'+'.$varTimeZoneOffset;

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBackEndConfigEnvironment                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-05                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment Back End sesuai Kunci Parameter (varKey)                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBackEndConfigEnvironment($varUserSession, $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Back End Configuration Environment');
                try {
                    $varReturn=self::getConfigEnvironment($varUserSession, $varKey, '/config/Application/BackEnd/environment.txt');
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
        | ▪ Method Name     : getFrontEndConfigEnvironment                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-06                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment Front End sesuai Kunci Parameter (varKey)                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFrontEndConfigEnvironment($varUserSession, $varKey)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Back End Configuration Environment');
                try {
                    $varReturn=self::getConfigEnvironment($varUserSession, $varKey, '/config/Application/FrontEnd/environment.txt');
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
        | ▪ Method Name     : getConfigEnvironment                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-05                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment pada file tertentu (varPostfix) sesuai Kunci Parameter         |
        |                     (varKey)                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        |      ▪ (string) varPostfix ► Path nama file                                                                              |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getConfigEnvironment($varUserSession, string $varKey, string $varPostfix)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Configuration Environment');
                try {
                    $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, 
                        \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd().'/', $varPostfix)
                        );
                    $varArrayTemp=explode("\n", $varFileContent);
                    for($i=0; $i!=count($varArrayTemp); $i++)
                        {
                        if(strlen($varArrayTemp[$i])>0)
                            {
                            $varArrayTemp2=explode("=", $varArrayTemp[$i]);
                            $varValue=$varArrayTemp2;
                            array_shift($varValue);
                            $varValue=implode("=", $varValue);
                            $varData[$varArrayTemp2[0]]=$varValue;
                            }
                        }
                    if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExist($varUserSession, $varKey, $varData)==true)
                        { 
                        $varReturn=$varData[$varKey];
                        }
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
        | ▪ Method Name     : getLaravelEnvironment                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mencari nilai dari parameter environment Laravel (.env)                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getLaravelEnvironment($varKey)
            {
            $varUserSession=000000;
            $varFileContent = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, 
                    \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchSystemFilePath(getcwd(), '.env')
                    //\App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '.env')
                    );
            $varArrayTemp=explode("\n", $varFileContent);
            for($i=0; $i!=count($varArrayTemp); $i++)
                {
                if(strlen($varArrayTemp[$i])>0)
                    {
                    $varArrayTemp2=explode("=", $varArrayTemp[$i]);
                    $varData[$varArrayTemp2[0]]=$varArrayTemp2[1];
                    }
                }
            $varReturn=$varData[$varKey];
            return $varReturn;
            }            
        }
    }

?>
