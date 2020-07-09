<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Database                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\Database
    {
    use Illuminate\Support\Facades\DB;
    
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : PostgreSQL                                                                                                   |
    | ▪ Description : Menangani Database PostgreSQL                                                                                |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class PostgreSQL
        {
        private static $varNameSpace;
        
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : init                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
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
            
            /*\App\Helpers\ZhtHelper\Logger\SystemLog::init();
            \App\Helpers\ZhtHelper\Logger\SystemLog::setLogOutput(self::$varNameSpace."::Init");
            
            
            echo "Postgre Init";
            
            echo get_class();
            
            echo "";
            
            $varDataFetch = DB::select('SELECT 1;');
            var_dump($varDataFetch);*/

            
            
            
            
            /*\App\Helpers\ZhtHelper\General\Session::set('Test', 'Test123');
            echo \App\Helpers\ZhtHelper\General\Session::get('Test');
            echo \App\Helpers\ZhtHelper\General\Session::get('Test');
            echo \App\Helpers\ZhtHelper\General\Session::delete('Test');
            echo "Terhapuskah";
            echo \App\Helpers\ZhtHelper\General\Session::get('Test');
            echo "OK";*/
            }
        }
    }

?>