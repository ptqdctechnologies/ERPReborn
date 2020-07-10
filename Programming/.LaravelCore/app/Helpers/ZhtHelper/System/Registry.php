<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/

namespace App\Helpers\ZhtHelper\System
    {
    use Illuminate\Http\Request;

    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Registry                                                                                                     |
    | ▪ Description : Menangani Session Registry                                                                                   |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Registry
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;
        
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
            self::$varNameSpace=get_class();
            
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Environment::Application::Name', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('APP_NAME'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Database::Type', 'PostgreSQL');
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Database::Host', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_HOST'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Database::Port', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_PORT'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Database::Name', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_DATABASE'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Database::LoginName', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_USERNAME'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Database::LoginPassword', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_PASSWORD'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Redis::Host', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('REDIS_HOST'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Redis::Port', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('REDIS_PORT'));
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::Redis::LoginPassword', \App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('REDIS_PASSWORD'));
            //var_dump($varDataSession);
            
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
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
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            $varReturn = \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Registry::Global::'.$varSubKeyPattern);
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
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            $varReturn = \App\Helpers\ZhtHelper\General\ArrayHandler::getArrayValue($varDataSession, 'Registry::Specific::'.$varUserSession.'::'.$varSubKeyPattern);
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
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Global::'.$varSubKeyPattern, $varValue);
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
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
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());
            \App\Helpers\ZhtHelper\General\ArrayHandler::setArrayValue($varDataSession, 'Registry::Specific::'.$varUserSession.'::'.$varSubKeyPattern, $varValue);
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }
        }
    }
?>