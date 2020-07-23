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
        | ▪ Method Name     : isPortOpen                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-23                                                                                           |
        | ▪ Description     : Mengecek apakah suatu Port (varPort) terbuka pada alamat tertentu ($varURL)                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string)  varUserSession ► User Session                                                                           |
        |      ▪ (string)  varURL ► Alamat host yang akan diperiksa                                                                |
        |      ▪ (int)     varPort ► Nomor port yang akan diperiksa                                                                |
        |      ▪ (int)     varTimeOutInSeconds ► Waktu Kadaluwarsa dalam detik                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isPortOpen($varUserSession, $varURL, int $varPort, int $varTimeOutInSeconds=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
$varURL='http://172.28.0.3/';
$varPort=808;
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Check whether port '.$varPort.' can be accessed through '.$varURL);
                try {
                    if(!$varTimeOutInSeconds)
                        {
                        $varTimeOutInSeconds=3;
                        }
                    $varConnection=fsockopen($varURL, $varPort, $errno, $errstr, $varTimeOutInSeconds);
                    if($errno == 110)
                        {
                        throw new \Exception("Timeout, Connection Failed");
                        }
                    else
                        {
                        echo "connect";
                        $varReturn = true;
                        }
/*                    if(!$varConnection)
                        {
                        echo "not connect";
                        }
                    else
                        {
                        echo "connect";
                        }*/
                    
                    
/*                    if($errno == 110)
                        {
                        throw new \Exception("Connection Failed");
                        }
                    else
                        {
                        echo "xxxxxx".$errno;
//                        if (is_resource($varConnection))
  //                          {
    //                        fclose($varConnection);
      //                      }
                        $varReturn = true;
                        }*/
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'True');
                    }
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'Failed, '.$ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }

?>