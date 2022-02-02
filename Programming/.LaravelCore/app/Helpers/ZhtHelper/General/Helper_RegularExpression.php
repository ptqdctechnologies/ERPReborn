<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_RegularExpression                                                                                     |
    | ▪ Description : Menangani Regular Expression                                                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_RegularExpression
        {
        private static $ObjZhtSDKLibrary;
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-31                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession)
            {
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-31                                                                                           |
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
            
        private static function init($varUserSession)
            {
            if(!self::$ObjZhtSDKLibrary)
                {
                self::$ObjZhtSDKLibrary = (new \zhtSDK\Library\RegularExpression\zhtSDK($varUserSession));
                }
            }
            

        public static function getRegEx_General_Date($varUserSession)
            {
            self::init($varUserSession);
            return 
                self::$ObjZhtSDKLibrary->getRegEx_General_Date();
            }


        public static function getRegEx_General_TimeStamp($varUserSession)
            {
            self::init($varUserSession);
            return 
                self::$ObjZhtSDKLibrary->getRegEx_General_TimeStamp();
            }


        public static function getRegEx_JSON_TimeStamp($varUserSession)
            {
            self::init($varUserSession);
            return self::$ObjZhtSDKLibrary->getRegEx_JSON_TimeStamp();
            }


        }
    }