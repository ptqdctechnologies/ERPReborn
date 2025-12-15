<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\Utilities                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Helpers\ZhtHelper\General\Utilities
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_EncodeDecode                                                                                          |
    | ▪ Description : Menangani segala hal yang terkait Encode dan Decode                                                          |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_EncodeDecode
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                        |
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Creation Date   : 2025-12-11                                                                                           |
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
        | ▪ Last Update     : 2025-12-11                                                                                           |
        | ▪ Creation Date   : 2025-12-11                                                                                           |
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
        | ▪ Method Name     : getBase64Decode                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan decode Base64 dari data terdecode (varEncodedData)                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varEncodedData ► Data yang akan didecode                                                                 |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBase64Decode(
            $varUserSession, string $varEncodedData
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        base64_decode(
                            $varEncodedData
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBase64Encode                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan encode Base64 dari data (varPlainData)                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPlainData ► Data yang akan diencode                                                                   |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function getBase64Encode(
            $varUserSession, string $varPlainData
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        base64_encode(
                            $varPlainData
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBase64DecodeWithoutSlashCharacter                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan decode Base64 tanpa karakter slash ('/' dikonversi menjadi '-' / pada karakter lain      |
        |                     (varReplacementCharacter)) dari data terencode (varEncodedData)                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varEncodedData ► Data yang akan didecode                                                                 |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varReplacementCharacter ► Karakter pengganti slash ('/')                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪ App\Http\Helpers\ZhtHelper\getBase64Decode($varUserSession, $varEncodedData)                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        */     
        public static function getBase64DecodeWithoutSlashCharacter(
            $varUserSession, string $varEncodedData,
            string $varReplacementCharacter = null
            )
            {
            //---> Data Initialization
                $varReturn = null;

                if (!$varReplacementCharacter) {
                    $varReplacementCharacter = '-';
                    }

            //---> Data Process
                try {
                    $varReturn =
                        self::getBase64Decode (
                            $varUserSession,
                            str_replace (
                                $varReplacementCharacter,
                                '/',
                                $varEncodedData
                                )
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBase64EncodeWithoutSlashCharacter                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan encode Base64 tanpa karakter slash ('/' dikonversi menjadi '-' / pada karakter lain      |
        |                     (varReplacementCharacter)) dari data (varPlainData)                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPlainData ► Data yang akan diencode                                                                   |
        |      ------------------------------                                                                                      |
        |      ▪ (string) varReplacementCharacter ► Karakter pengganti slash ('/')                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪ App\Http\Helpers\ZhtHelper\getBase64Encode($varUserSession, $varPlainData)                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function getBase64EncodeWithoutSlashCharacter(
            $varUserSession, string $varPlainData,
            string $varReplacementCharacter = null
            )
            {
            //---> Data Initialization
                $varReturn = null;

                if (!$varReplacementCharacter) {
                    $varReplacementCharacter = '-';
                    }

            //---> Data Process
                try {
                    $varReturn =
                        str_replace (
                            '/',
                            $varReplacementCharacter,
                            self::getBase64Encode(
                                $varUserSession,
                                $varPlainData
                                )
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBase64URLEncode                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan encode Base64 URL dari data (varPlainData)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPlainData ► Data yang akan diencode                                                                   |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪ App\Http\Helpers\ZhtHelper\getBase64Encode($varUserSession, $varPlainData)                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function getBase64URLEncode(
            $varUserSession, $varPlainData
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        str_replace (
                            ['+', '/', '='],
                            ['-', '_', ''],
                            self::getBase64Encode(
                                $varUserSession,
                                $varPlainData
                                )
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getHTMLEncode                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2021-07-01                                                                                           |
        | ▪ Description     : Mendapatkan encode HTML dari data array (varDataArray)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varDataArray ► Data yang akan diencode                                                                   |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getHTMLEncode(
            $varUserSession, array $varDataArray
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    for ($i=0; $i!=count($varDataArray); $i++)
                        {
                        foreach ($varDataArray[$i] as $varKey => $varValue)
                            {
                            $varDataArray[$i][$varKey] =
                                htmlspecialchars($varValue);
                            }
                        }

                    $varReturn =
                        $varDataArray;
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getJSONDecode                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2021-07-01                                                                                           |
        | ▪ Description     : Mendapatkan decode JSON dari data terdecode (varEncodedData)                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varEncodedData ► Data yang akan didecode                                                                 |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getJSONDecode(
            $varUserSession, string $varEncodedData
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        json_decode (
                            $varEncodedData,
                            true,
                            JSON_UNESCAPED_UNICODE
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getJSONEncode                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2021-07-01                                                                                           |
        | ▪ Description     : Mendapatkan encode JSON dari data array (varDataArray)                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPlainData ► Data yang akan diencode                                                                   |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function getJSONEncode($varUserSession, string $varPlainData)
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        json_encode (
                            $varPlainData,
                            true
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getUTF8Encode                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-15                                                                                           |
        | ▪ Creation Date   : 2020-07-28                                                                                           |
        | ▪ Description     : Mendapatkan encode UTF8 dari data (varData)                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPlainData ► Data yang akan diencode                                                                   |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function getUTF8Encode($varUserSession, string $varPlainData)
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        utf8_encode (
                            $varPlainData
                            );
                    }
                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }
        }
    }