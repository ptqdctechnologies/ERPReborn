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
    | ▪ Class Name  : Helper_Encode                                                                                                |
    | ▪ Description : Menangani Encode                                                                                             |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Encode
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
        | ▪ Last Update     : 2020-07-21                                                                                           |
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
        | ▪ Last Update     : 2020-07-21                                                                                           |
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
        | ▪ Last Update     : 2020-07-21                                                                                           |
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
        | ▪ Method Name     : getBase64Decode                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-21                                                                                           |
        | ▪ Description     : Mendapatkan dekripsi Base64 dari data (varPlainData)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varCipherData ► Data yang akan didekripsi                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function getBase64Decode($varUserSession, $varCipherData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get Base64 Decode for decoded data`'.$varCipherData.'`');
                try {
                    $varReturn = base64_decode($varCipherData);
                    } 
                catch (\Exception $ex) {
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBase64Encode                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-21                                                                                           |
        | ▪ Description     : Mendapatkan enkripsi Base64 dari data (varPlainData)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varPlainData ► Data yang akan dienkripsi                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function getBase64Encode($varUserSession, $varPlainData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get Base64 Encode for plain data`'.$varPlainData.'`');
                try {
                    $varReturn = base64_encode($varPlainData);
                    } 
                catch (\Exception $ex) {
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        public static function getBase64EncodeWithoutSlashCharacter($varUserSession, $varPlainData, $varReplacementCharacter=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get Base64 Encode without slash character for plain data`'.$varPlainData.'`');
                try {
                    if(!$varReplacementCharacter)
                        {
                        $varReplacementCharacter = '-';
                        }
                    $varEncodedData = self::getBase64Encode($varUserSession, $varPlainData);
                    $varReturn = str_replace('/', $varReplacementCharacter, $varEncodedData);
                    } 
                catch (\Exception $ex) {
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        public static function getBase64DecodeWithoutSlashCharacter($varUserSession, $varEncodedData, $varReplacementCharacter=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get Base64 Decode without slash character for decoded data`'.$varEncodedData.'`');
                try {
                    if(!$varReplacementCharacter)
                        {
                        $varReplacementCharacter = '-';
                        }
                    $varEncodedData = str_replace($varReplacementCharacter, '/', $varEncodedData);

                                        
                    $varReturn = self::getBase64Decode($varUserSession, $varEncodedData);
                    } 
                catch (\Exception $ex) {
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