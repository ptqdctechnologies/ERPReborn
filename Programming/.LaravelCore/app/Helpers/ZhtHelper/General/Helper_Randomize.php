<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Randomize                                                                                             |
    | ▪ Description : Menangani Data Randomize                                                                                     |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Randomize
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
        | ▪ Last Update     : 2023-10-03                                                                                           |
        | ▪ Creation Date   : 2023-10-03                                                                                           |
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
        | ▪ Last Update     : 2023-10-03                                                                                           |
        | ▪ Creation Date   : 2023-10-03                                                                                           |
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
        | ▪ Last Update     : 2023-10-03                                                                                           |
        | ▪ Creation Date   : 2023-10-03                                                                                           |
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


        public static function getRandomize($varUserSession, string $varPlainData)
            {
            echo "<br>varPlainData : ";
            var_dump($varPlainData);
            
            $varPlainDataEncodeBase64 = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode($varUserSession, $varPlainData);
            echo "<br>varPlainDataEncodeBase64 : ";
            var_dump($varPlainDataEncodeBase64);

            for($i=0, $iMax = strlen($varPlainDataEncodeBase64); $i != $iMax ; $i++)
                {
                $varPlainDataEncodeBase64Array[$i] = substr($varPlainDataEncodeBase64, $i, 1);
                $varChainKeyArray[$i] = $i;                  
                }
            //dd($varPlainDataEncodeBase64Array);

            shuffle($varChainKeyArray);
            echo "<br>varChainKeyArray : ";
            var_dump($varChainKeyArray);

            $varChainKey = implode(',', array_reverse($varChainKeyArray));

            echo "<br>varChainKey : ";
            var_dump($varChainKey);

            $varRandomizeDataEncodeBase64 = '';
            for($i=0, $iMax = strlen($varPlainDataEncodeBase64); $i != $iMax ; $i++)
                {
                $varRandomizeDataEncodeBase64 .= $varPlainDataEncodeBase64Array[$varChainKeyArray[$i]];
                }
            echo "<br>varRandomizeDataEncodeBase64 : ";
            var_dump($varRandomizeDataEncodeBase64);
            
            $varFinalRandomizeData = 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode(
                    $varUserSession,
                    (                    
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode($varUserSession, $varChainKey).
                    '###'.
                    $varRandomizeDataEncodeBase64
                    )
                    );
            echo "<br>varFinalRandomizeData : ";
            var_dump($varFinalRandomizeData);

            //---------------------------------------------------------------------
            echo "<br>===============================================================";
            echo "<br>===============================================================";
            //---------------------------------------------------------------------
            
            self::getUnrandomize($varUserSession, $varFinalRandomizeData);
            
            
            
            
 //           $varFinalRandomizeData = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode($varUserSession, $varRandomizeDataEncodeBase64Array[0]).'###'.$varRandomizeDataEncodeBase64Array[1];
            }

            
        public static function getUnrandomize($varUserSession, string $varRadomizedData)
            {
            echo "<br>varRadomizedData : ";
            var_dump($varRadomizedData);
            
            $varRandomizeDataEncodeBase64 = 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                    $varUserSession,
                    $varRadomizedData
                    );
            echo "<br>varRandomizeDataEncodeBase64 : ";
            var_dump($varRandomizeDataEncodeBase64);

            $varRandomizeDataEncodeBase64Array = explode('###', $varRandomizeDataEncodeBase64);
            var_dump($varRandomizeDataEncodeBase64Array);
            
            $varChainKeyArray = 
                explode(
                    ',',
                    (
                    \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                        $varUserSession, 
                        $varRandomizeDataEncodeBase64Array[0]
                        )
                    )
                    );
            $varChainKeyArray = array_reverse($varChainKeyArray);
            $varRandomizeDataEncodeBase64 = $varRandomizeDataEncodeBase64Array[1];

            echo "<br>varChainKeyArray : ";
            var_dump($varChainKeyArray);

            
            echo "<br>varRandomizeDataEncodeBase64 : ";
            var_dump($varRandomizeDataEncodeBase64);
            }

        }
    }