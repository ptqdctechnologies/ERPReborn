<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Http\Helpers\ZhtHelper\General\Utilities                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Http\Helpers\ZhtHelper\General\Utilities
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_File                                                                                                  |
    | ▪ Description : Menangani segala hal yang terkait File                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_File
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
        | ▪ Method Name     : getAutoMatchFilePath                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creation Date   : 2020-08-18                                                                                           |
        | ▪ Description     : Mencari posisi file path varPostfix relatif terhadap varPrefix                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPrefix ► Prefix Path                                                                                  |
        |      ▪ (string) varPostfix ► Postfix Path                                                                                |
        |      ------------------------------                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varPath                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */  
        public static function getAutoMatchFilePath (
            $varUserSession, string $varPrefix, string $varPostfix
            )
            {
            //---> Data Initialization
                $varReturn = (string) null;

            //---> Data Process
                try {
                    $varPrefix = (
                        strcmp (
                            substr (
                                $varPrefix,
                                strlen($varPrefix)-1,
                                1
                                ),
                            '/'
                            ) == 0
                        ?
                        substr (
                            $varPrefix,
                            0,
                            strlen ($varPrefix) - 1
                            )
                        :
                        $varPrefix
                        );

                    $varPostfix = (
                        strcmp (
                            substr (
                                $varPostfix,
                                0,
                                1
                                ),
                            '/'
                            ) == 0
                        ?
                        substr (
                            $varPostfix,
                            1,
                            strlen ($varPostfix) - 1
                            )
                        :
                        $varPostfix
                        );

                    $varPath = ( 
                        $varPrefix.
                        '/'.
                        $varPostfix
                        );

                    if (is_file ($varPath) == 0)
                        {
                        $varPath = null;

                        $iMax =
                            substr_count (
                                $varPrefix,
                                '/'
                                );

                        for ($i=0; $i!=$iMax; $i++)
                            {
                            //echo "<br>".($varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix);
                            if (is_file (
                                $varPrefix.
                                '/.'.
                                str_repeat (
                                    "/..",
                                    $i
                                    ).
                                '/'.
                                $varPostfix
                                )
                                )
                                {
                                $varPath = (
                                    $varPrefix.
                                    '/.'.
                                    str_repeat (
                                        "/..",
                                        $i
                                        ).
                                    '/'.
                                    $varPostfix
                                    );
                                break;
                                }
                            }
                        }

                    if (is_file ($varPath)==0)
                        {
                        throw
                            new \Exception('File path is not found');
                        }

                    $varReturn = $varPath;
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileContent                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2025-12-16                                                                                           |
        | ▪ Creation Date   : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan isi suatu file berdasarkan path (varPath)                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varPath ► Path File                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varFileContent                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Linked Function :                                                                                                      |
        |      ▪                                                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileContent (
            $varUserSession, string $varPath
            )
            {
            //---> Data Initialization
                $varReturn = (string) null;

            //---> Data Process
                try {
                    if (is_file ($varPath))
                        {
                        $varFileContent =
                            file_get_contents (
                                $varPath
                                );
                        }

                    $varReturn =
                        $varFileContent;
                    }

                catch (\Exception $ex) {
                    }

            //---> Data Return
                return
                    $varReturn;
            }
        }
    }