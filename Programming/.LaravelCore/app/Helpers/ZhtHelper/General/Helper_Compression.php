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
    | ▪ Class Name  : Helper_Encryption                                                                                            |
    | ▪ Description : Menangani Encryption                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Compression
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
        | ▪ Last Update     : 2020-07-22                                                                                           |
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
        | ▪ Last Update     : 2020-07-22                                                                                           |
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
        | ▪ Last Update     : 2020-07-22                                                                                           |
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
        | ▪ Method Name     : getBZip2Compress                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-22                                                                                           |
        | ▪ Description     : Mendapatkan kompresi BZip2 dari data (varData)                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data yang akan dikompresi                                                                      |
        |      ▪ (int)    varBlockSize ► Ukuran block (1-9)                                                                        |
        |      ▪ (int)    varWorkFactor ► Fase Kompresi                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBZip2Compress($varUserSession, $varData, int $varBlockSize=null, int $varWorkFactor=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get BZip2 Compression for data`'.$varData.'`');
                try {
                    if(!$varBlockSize)
                        {
                        $varBlockSize = 9;
                        }
                    if(!$varWorkFactor)
                        {
                        $varWorkFactor = 0;
                        }
                    $varCompressedData = \bzcompress($varData, $varBlockSize, $varWorkFactor);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'success');
                    $varReturn = $varCompressedData;
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed');
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBZip2Decompress                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-22                                                                                           |
        | ▪ Description     : Mendapatkan dekompresi BZip2 dari data terkompresi (varCompressedData)                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varCompressedData ► Data yang akan didekompresi                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBZip2Decompress($varUserSession, $varCompressedData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get BZip2 Decompression for compressed data`'.$varCompressedData.'`');
                try {
                    $varUncompressedData = \bzdecompress($varCompressedData);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'success');
                    $varReturn = $varUncompressedData;
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed');
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getZLibCompress                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-22                                                                                           |
        | ▪ Description     : Mendapatkan kompresi ZLib dari data (varData)                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data yang akan dikompresi                                                                      |
        |      ▪ (int)    varCompressionLevel ► Level kompresi                                                                     |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getZLibCompress($varUserSession, $varData, int $varCompressionLevel=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get ZLib Compression for data`'.$varData.'`');
                try {
                    if(!$varCompressionLevel)
                        {
                        $varCompressionLevel = 9;
                        }
                    $varCompressedData = \gzcompress($varData, $varCompressionLevel);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'success');
                    $varReturn = $varCompressedData;
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed');
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationDecrease($varUserSession);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getZLibDecompress                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-22                                                                                           |
        | ▪ Description     : Mendapatkan dekompresi ZLib dari data terkompresi (varCompressedData)                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession ► User Session                                                                            |
        |      ▪ (string) varCompressedData ► Data yang akan didekompresi                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getZLibDecompress($varUserSession, $varCompressedData)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogIndentationIncrease($varUserSession);
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutput($varUserSession, __CLASS__, '('.__FUNCTION__.') Get ZLib Decompression for compressed data`'.$varCompressedData.'`');
                try {
                    $varUncompressedData = \gzuncompress($varCompressedData);
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'success');
                    $varReturn = $varUncompressedData;
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLastLogOuputAppend($varUserSession, 'failed');
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