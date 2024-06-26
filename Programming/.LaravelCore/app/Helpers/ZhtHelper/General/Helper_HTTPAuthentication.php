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
    | ▪ Class Name  : Helper_HTTPAuthentication                                                                                    |
    | ▪ Description : Menangani Otentikasi HTTP                                                                                    |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_HTTPAuthentication
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
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Last Update     : 2020-07-28                                                                                           |
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
        | ▪ Method Name     : getJSONWebToken                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-28                                                                                           |
        | ▪ Description     : Mendapatkan JSON Web Token sesuai Nama User (varUserName), kata kunci (varKey), dan Algoritma        |
        |                     (varAlgorithm)                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varUSerName ► Nama Pengguna                                                                              |
        |      ▪ (string) varKey ► Kata Kunci                                                                                      |
        |      ▪ (string) varAlgorithm ► Algoritma                                                                                 |
        |      ▪ (int)    varIssuedUnixTime ► Issued UnixTime                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getJSONWebToken($varUserSession, string $varUserName, string $varKey, string $varAlgorithm=null, int $varIssuedUnixTime=null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Is associative array');
                try {
                    if(!$varAlgorithm)
                        {
                        $varAlgorithm = 'HS256';
                        }
                    if(!$varIssuedUnixTime)
                        {
                        $varIssuedTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession);
                        }
                    $varTyp = 'JWT';
                    
                    $varHeader = 
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64URLEncode(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession, 
                                ['alg' => $varAlgorithm, 'typ'=> $varTyp]
                                )
                            );
                    $varPayLoad = 
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64URLEncode(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                                $varUserSession, 
                                ['loggedInAs' => $varUserName, 'iat'=> $varIssuedUnixTime]
//                                ['loggedInAs' => $varUserName, 'iat'=> 1598434071]
                                )
                            );
                    $varSignature = 
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64URLEncode(
                            $varUserSession, 
                            \App\Helpers\ZhtHelper\General\Helper_Hash::getSHA256(
                                $varUserSession, 
                                \App\Helpers\ZhtHelper\General\Helper_Encode::getUTF8Encode($varUserSession, $varKey),
                                $varHeader.'.'.$varPayLoad
                                )
                            );                    
                    $varReturn = $varHeader.'.'.$varPayLoad.'.'.$varSignature;
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