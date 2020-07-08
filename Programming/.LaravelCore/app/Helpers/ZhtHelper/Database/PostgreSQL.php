<?php

namespace App\Helpers\ZhtHelper\Database
    {
    use Illuminate\Support\Facades\DB;
    
    class PostgreSQL
        {
        private static $varNameSpace;
        
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
            
            \App\Helpers\ZhtHelper\General\Session::set('Test', 'Test123');
            echo \App\Helpers\ZhtHelper\General\Session::get('Test');
            echo \App\Helpers\ZhtHelper\General\Session::get('Test');
            echo \App\Helpers\ZhtHelper\General\Session::destroy('Test');
            echo "Terhapuskah";
            echo \App\Helpers\ZhtHelper\General\Session::get('Test');
            echo "OK";
            }
        }
    }

?>