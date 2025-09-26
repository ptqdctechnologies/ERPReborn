<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Laravel                                                                                               |
    | ▪ Description : Menangani Laravel                                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Laravel
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
        | ▪ Last Update     : 2025-09-26                                                                                           |
        | ▪ Creation Date   : 2025-09-26                                                                                           |
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
        | ▪ Last Update     : 2025-09-26                                                                                           |
        | ▪ Creation Date   : 2025-09-26                                                                                           |
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
        | ▪ Last Update     : 2025-09-26                                                                                           |
        | ▪ Creation Date   : 2025-09-26                                                                                           |
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
            self::$varNameSpace =
                get_class();
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setRemoveSFDumpFromHTTPRequestResponseBody                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-09-26                                                                                           |
        | ▪ Creation Date   : 2025-09-26                                                                                           |
        | ▪ Description     : Mengeset Penghapusan SFDump dari HTTP Request Response Body                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setRemoveSFDumpFromHTTPRequestResponseBody($varUserSession, $varData)
            {
            $responseBodyAsString = $varData;

            if (stristr((string) $responseBodyAsString, 'Sfdump ='))
                {
                try {
                   ob_start();
                    echo (
                    var_dump (
                        $responseBodyAsString
                        ));
                    $responseBodyAsString =
                        ob_get_clean();

                    $responseBodyAsString =
                        (string) $responseBodyAsString;

                    $responseBodyAsString =
                        preg_replace(
                            '/<style\b[^>]*>(.*?)<\/style>/is',
                            "",
                            $responseBodyAsString
                            );

                    $responseBodyAsString = 
                        trim(
                            preg_replace(
                                '/\s\s+/',
                                ' ',
                                $responseBodyAsString
                                )
                            );

                    //---> Initializing : responseBodyAsString_SFDumpNote
                    try {
                        $responseBodyAsString_SFDumpNote =
                            explode(
                                '</span>',
                                explode(
                                    '<span class=sf-dump-note>',
                                    $responseBodyAsString
                                    )[1]
                                )[0];
                        if (stristr($responseBodyAsString_SFDumpNote, 'array:')) {
                            $responseBodyAsString_SFDumpNote = 'array';
                            }
                        }
                    catch (\Exception $ex) {
                        $responseBodyAsString_SFDumpNote = NULL;
                        }

                    //---> Data Type : Non Array
                    if ($responseBodyAsString_SFDumpNote === NULL) {
                        $responseBodyAsString =
                            explode(
                                '<span class=sf-dump',
                                $responseBodyAsString
                                );

                        $responseBodyAsString =
                            $responseBodyAsString[count($responseBodyAsString)-1];

                        $responseBodyAsString =
                            explode(
                                '</span>',
                                $responseBodyAsString
                                )[0];

                        $responseBodyAsString =
                            explode(
                                '>',
                                $responseBodyAsString
                                );

                        unset($responseBodyAsString[0]);

                        $responseBodyAsString =
                            implode(
                                '',
                                $responseBodyAsString
                                );

/*                        $responseBodyAsString =
                            str_replace(
                                '&quot;',
                                '"',
                                $responseBodyAsString
                                );*/

                        $responseBodyAsString =
                            htmlspecialchars_decode(
                                $responseBodyAsString
                                );
                        }
                    //---> Data Type : Array
                    else
                        {
                        $responseBodyAsString =
                            explode(
                                'class=sf-dump-expanded>',
                                $responseBodyAsString
                                )[1];

                        $responseBodyAsString =
                            explode(
                                '</span>',
                                $responseBodyAsString
                                );

                        unset($responseBodyAsString[0]);
                        unset($responseBodyAsString[count($responseBodyAsString)]);

                        $responseBodyAsString =
                            explode(
                                '<span class=sf-dump-',
                                trim(
                                    implode(
                                        '',
                                        $responseBodyAsString
                                        )
                                    )
                                );

                        unset($responseBodyAsString[0]);

                        $responseBodyAsString =
                            explode (
                                '<ZhtSeparator>',
                                implode (
                                    '<ZhtSeparator>',
                                    $responseBodyAsString
                                    )
                                );

                        for ($i = 0, $iMax = count($responseBodyAsString); $i != $iMax; $i++) {
                            $varTempArrayElement =
                                explode (
                                    '>',
                                    $responseBodyAsString[$i]
                                    );
                            unset($varTempArrayElement[0]);
                            $responseBodyAsString[$i] =
                                implode (
                                    '',
                                    $varTempArrayElement
                                    );

                            if (($i % 2) == 0) {
                                $responseBodyAsString[$i] =
                                    explode (
                                        ' = ',
                                        $responseBodyAsString[$i]
                                        )[0];
                                }

                            $responseBodyAsString[$i] =
                                trim(
                                    explode (
                                        '"',
                                        $responseBodyAsString[$i]
                                        )[0]
                                    );
                            }

                        $varNewArray = NULL;
                        for ($i = 0, $iMax = count($responseBodyAsString); $i != $iMax; $i++) {
                            if (($i % 2) == 0) {
                                $varNewArray[$responseBodyAsString[$i]] = (
                                    (is_numeric($responseBodyAsString[$i+1]) == TRUE) ? 
                                        ($responseBodyAsString[$i+1] * 1)
                                        :
                                        $responseBodyAsString[$i+1]
                                    );
                                }
                            }

                        $varNewArrayPairs = [];
                        foreach ($varNewArray as $key => $value) {
                            $varNewArrayPairs[] = "$key => $value";
                            }

                        $responseBodyAsString = 
                            '['.
                            implode(
                                ', ',
                                $varNewArrayPairs
                                ).
                            ']';
                        }

                    $responseBodyAsString = 
                        'Data dump : `'.$responseBodyAsString.'`';                                    
                    }
                catch (\Exception $ex) {
                    }
                }
            
            return
                $responseBodyAsString;
            }
        }
    }