<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Database                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\Database
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_ODBC                                                                                                  |
    | ▪ Description : Menangani Database ODBC                                                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_ODBC
        {
        private static $ObjODBC;
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-05-03                                                                                           |
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
        | ▪ Last Update     : 2021-05-03                                                                                           |
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


        public static function init($varUserSession, string $varDSNString, string $userName = null, string $userPassword = null, array $varOptions = null)
            {
            self::$ObjODBC = new \PDO($varDSNString, $userName, $varDSNString, $varOptions);            
            }

        
        public static function init_MicrosoftAccess($varUserSession, string $varPath, string $userName = null, string $userPassword = null, array $varOptions = null)
            {
            $varDriver = 'MDBTools';
            //$varPath  = '/zhtConf/tmp/download/SwingBarrierGate.mdb';
            $varDSNString = 'odbc:DRIVER='.$varDriver.'; DBQ='.$varPath;
            self::init($varUserSession, $varDSNString, $userName, $userPassword, $varOptions);
            }


        public static function getQueryExecution($varUserSession, $varSQLQuery)
            {
            foreach(self::$ObjODBC->query($varSQLQuery, \PDO::FETCH_ASSOC) as $row)
                {
                echo '<pre>';
                var_dump( $row );
                echo '</pre>';
                }
            }
        }
    }
