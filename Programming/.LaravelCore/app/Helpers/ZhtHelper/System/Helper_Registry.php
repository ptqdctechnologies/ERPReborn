<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Helpers\ZhtHelper\System
    {
    use Illuminate\Http\Request;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_Registry                                                                                              |
    | ▪ Description : Menangani Session Registry                                                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_Registry
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
        | ▪ Last Update     : 2020-07-17                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
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
            try {
                self::$varNameSpace=get_class();

                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Environment::Application::Name', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('APP_NAME'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Database::Type', 'PostgreSQL');
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Database::Host', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('DB_HOST'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Database::Port', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('DB_PORT'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Database::Name', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('DB_DATABASE'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Database::LoginName', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('DB_USERNAME'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Database::LoginPassword', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('DB_PASSWORD'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Redis::Host', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('REDIS_HOST'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Redis::Port', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('REDIS_PORT'));
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::Redis::LoginPassword', \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('REDIS_PASSWORD'));

                \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);                
                } 
            catch (\Exception $ex) {
                }
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getGlobalRegistry                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan data Registry Spesifik (varValue) berdasarkan Sub Kunci (varSubKeyPattern)               |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varSubKeyPattern                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varValue                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getGlobalRegistry($varUserSession, $varSubKeyPattern)
            {
            $varReturn = null;
            try {
                $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
                $varReturn = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayValue($varDataSession, 'Registry::Global::'.$varSubKeyPattern);                
                } 
            catch (\Exception $ex) {
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSpecificRegistry                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Mendapatkan data Registry Spesifik (varValue) berdasarkan User Session (varUserSession) dan Sub      |
        |                     Kunci (varSubKeyPattern)                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSubKeyPattern                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varValue                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSpecificRegistry($varUserSession, $varSubKeyPattern)
            {
            $varReturn = null;
            try {
                $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
                $varReturn = \App\Helpers\ZhtHelper\General\Helper_Array::getArrayValue($varDataSession, 'Registry::Specific::'.$varUserSession.'::'.$varSubKeyPattern);
                } 
            catch (\Exception $ex) {
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setGlobalRegistry                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menyimpan data Registry Global (varValue) berdasarkan Sub Kunci (varSubKeyPattern)                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varSubKeyPattern                                                                                         |
        |      ▪ (string) varValue                                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setGlobalRegistry($varSubKeyPattern, $varValue)
            {
            try {
                $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Global::'.$varSubKeyPattern, $varValue);
                \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
                }
            catch (Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setSpecificRegistry                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-10                                                                                           |
        | ▪ Description     : Menyimpan data Registry Spesifik (varValue) berdasarkan User Session (varUserSession) dan Sub Kunci  |
        |                     (varSubKeyPattern)                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varSubKeyPattern                                                                                         |
        |      ▪ (string) varValue                                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setSpecificRegistry($varUserSession, $varSubKeyPattern, $varValue)
            {
            try {
                $varDataSession = \App\Helpers\ZhtHelper\General\Helper_Session::get(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID());
                \App\Helpers\ZhtHelper\General\Helper_Array::setArrayValue($varDataSession, 'Registry::Specific::'.$varUserSession.'::'.$varSubKeyPattern, $varValue);
                \App\Helpers\ZhtHelper\General\Helper_Session::set(\App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationID(), $varDataSession);
                } 
            catch (Exception $ex) {
                }
            }
        }
    }
?>