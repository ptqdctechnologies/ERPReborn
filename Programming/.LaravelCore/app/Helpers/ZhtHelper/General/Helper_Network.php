<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Network                                                                                               |
    | ▪ Description : Menangani Network                                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Network
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-23                                                                                           |
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
        | ▪ Last Update     : 2020-07-23                                                                                           |
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
        | ▪ Last Update     : 2020-07-23                                                                                           |
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
        | ▪ Method Name     : getIPAddressFromURL                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-24                                                                                           |
        | ▪ Description     : Mendapatkan IP Address dari alamat URL tertentu (varURL)                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varURL ► Alamat host yang akan diperiksa                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getIPAddressFromURL($varUserSession, $varURL)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
//                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
//                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get IP Address of `'.$varURL.'`');
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get IP Address of `'.$varURL.'`');
                try {
                    $varURLArray = @parse_url($varURL);
                    $varIPAddress = gethostbyname($varURLArray['host']);
                    if (!filter_var($varIPAddress, FILTER_VALIDATE_IP)) 
                        {
                        throw new \Exception("Invalid IP address");
                        }
                    $varReturn = $varIPAddress;
                    //\App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'successxx');
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'success');
                    }
                catch (\Exception $ex) {
                    //\App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed, '. $ex->getMessage());
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'failed, '. $ex->getMessage());
                    }
                //\App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isPortOpen                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-23                                                                                           |
        | ▪ Description     : Mengecek apakah suatu Port (varPort) terbuka pada alamat tertentu (varURL)                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string)  varUserSession ► User Session                                                                           |
        |      ▪ (string)  varURL ► Alamat host yang akan diperiksa                                                                |
        |      ▪ (int)     varPort ► Nomor port yang akan diperiksa                                                                |
        |      ▪ (int)     varTimeOutInSeconds ► Waktu Kadaluwarsa dalam detik                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Code Reference  : https://gist.github.com/md5/f0ca3ba1c2b0f04785fb                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isPortOpen($varUserSession, $varURL, int $varPort, $varProtocol=null, int $varTimeOutInSeconds=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
//                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
//                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Check whether port '.$varPort.' can be accessed through '.$varURL);
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Check whether port '.$varPort.' can be accessed through '.$varURL);
                try {
                    //---> Cari Validitas Port
                    if(($varPort<1)OR($varPort>65535))
                        {
                        throw new \Exception("Invalid Port number");
                        }
                    //---> Cari Validitas Protocol
                    if(!$varProtocol)
                        {
                        $varProtocolID = SOL_TCP;
                        }
                    else
                        {
                        if (stristr($varProtocol, 'tcp'))
                            {
                            $varProtocolID = SOL_TCP;
                            }
                        elseif (stristr($varProtocol, 'udp'))
                            {
                            $varProtocolID = SOL_UDP;
                            }
                        else
                            {
                            throw new \Exception("Invalid Protocol");
                            }
                        }
                    //---> Cari Validitas IP Address
                    $varIPAddress = self::getIPAddressFromURL($varUserSession, $varURL);
                    if(!$varIPAddress)
                        {
                        throw new \Exception("Invalid IP address");
                        }
                    //---> Inisialisasi Socket
                    $varObjSocket = socket_create(AF_INET, SOCK_STREAM, $varProtocolID);
                    if ($varObjSocket === false) 
                        {
                        throw new \Exception("Can't create socket, reason : ".socket_strerror(socket_last_error()));
                        }
                    //--->
                    $varResult = socket_connect($varObjSocket, $varIPAddress, $varPort);
                    if ($varResult === false) {
                        throw new \Exception("Can't create socket, reason (".$varResult."): ".socket_strerror(socket_last_error()));
                        } 
                    socket_close($varObjSocket);
                    $varReturn= true;
//                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'successyy');
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'success');
                    } 
                catch (\Exception $ex) {
//                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed, '. $ex->getMessage());
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'failed, '. $ex->getMessage());                    
                    }
//                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }

?>