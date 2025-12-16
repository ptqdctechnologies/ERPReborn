<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\System                                                                        |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Helpers\ZhtHelper\General\System
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Environment                                                                                           |
    | ▪ Description : Menangani segala hal yang terkait HTTP Error dari Aplikasi                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Environment
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                        |
        | ▪ Last Update     : 2020-07-17                                                                                           |
        | ▪ Creation Date   : 2020-07-17                                                                                           |
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
        | ▪ Creation Date   : 2020-07-17                                                                                           |
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
        | ▪ Method Name     : getApplicationID                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creaton Date    : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data Application ID                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationID (
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varReturn =
                        'ERPReborn';
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getApplicationDateTimeTZ                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creation Date   : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data waktu sekarang                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getApplicationDateTimeTZ (
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    date_default_timezone_set('Asia/Jakarta');
                    $varDate =
                        date_create (
                            null,
                            timezone_open('Asia/Jakarta')
                            );

                    $varMicroDate = microtime();

                    $varDateArray =
                        explode (
                            " ",
                            $varMicroDate
                            );

                    $varMicroSecond =
                        substr (
                            $varDateArray[1],
                            0,
                            6
                            );

                    $varTimeZoneOffset =
                        str_pad (
                            (($varDate->getOffset())/3600),
                            2,
                            '0',
                            STR_PAD_LEFT
                            );

                    $varReturn =
                        date (
                            "Y-m-d H:i:s.",
                            time()
                            ).$varMicroSecond.'+'.$varTimeZoneOffset;

                    //$varUnixTime = (int) file_get_contents((stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://').'localhost/getJSUnixTime');
                    //$varReturn = date("Y-m-d H:i:s.", $varUnixTime).$varMicroSecond.'+'.$varTimeZoneOffset;
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getConfigEnvironment                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creation Date   : 2020-08-05                                                                                           |
        | ▪ Description     : Mencari nilai Konfigurasi Environment pada file tertentu (varPostfix) sesuai Kunci Parameter         |
        |                     (varKey)                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varKey ► Parameter                                                                                       |
        |      ▪ (string) varPostfix ► Path nama file                                                                              |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪ \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist                                            |
        |           ($varUserSession, string $varPath)                                                                             |
        |      ▪ \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getAutoMatchFilePath                                   |
        |           ($varUserSession, string $varPrefix, string $varPostfix)                                                       |
        |      ▪ \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getFileContent                                         |
        |           ($varUserSession, string $varPath)                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getConfigEnvironment (
            $varUserSession, string $varKey, string $varPostfix
            )
            {
            //---> Data Initialization
                $varReturn = null;

            //---> Data Process
                try {
                    $varFileContent =
                        \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getFileContent(
                            $varUserSession,
                            \App\Http\Helpers\ZhtHelper\General\Utilities\Helper_File::getAutoMatchFilePath (
                                $varUserSession,
                                (getcwd().'/'),
                                $varPostfix
                                )
                            );

                    $varArrayTemp =
                        explode (
                            "\n",
                            $varFileContent
                            );

                    for ($i=0; $i != count($varArrayTemp); $i++)
                        {
                        if (strlen ($varArrayTemp[$i]) > 0)
                            {
                            $varArrayTemp2 =
                                explode(
                                    "=",
                                    $varArrayTemp[$i]
                                    );

                            $varValue =
                                $varArrayTemp2;

                            array_shift (
                                $varValue
                                );

                            $varValue =
                                implode (
                                    "=",
                                    $varValue
                                    );

                            $varData[$varArrayTemp2[0]] =
                                $varValue;
                            }
                        }

                    if (\App\Http\Helpers\ZhtHelper\General\Utilities\Helper_Array::isKeyExist (
                        $varUserSession,
                        $varKey,
                        $varData
                        ) == true
                        )
                        { 
                        $varReturn =
                            $varData[$varKey];
                        }
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }
        }
    }