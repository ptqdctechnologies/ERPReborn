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

            $varDataSession['Registry']['Global']['Environment']['UserSessionList']=[];
            $varDataSession['Registry']['Global']['Environment']['Application']['Name']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('APP_NAME');
            $varDataSession['Registry']['Global']['Environment']['Database']['Type']='PostgreSQL';
            $varDataSession['Registry']['Global']['Environment']['Database']['Host']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_HOST');
            $varDataSession['Registry']['Global']['Environment']['Database']['Port']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_PORT');
            $varDataSession['Registry']['Global']['Environment']['Database']['Name']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_DATABASE');
            $varDataSession['Registry']['Global']['Environment']['Database']['LoginName']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_USERNAME');
            $varDataSession['Registry']['Global']['Environment']['Database']['LoginPassword']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('DB_PASSWORD');
            $varDataSession['Registry']['Global']['Environment']['Redis']['Host']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('REDIS_HOST');
            $varDataSession['Registry']['Global']['Environment']['Redis']['Port']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('REDIS_PORT');
            $varDataSession['Registry']['Global']['Environment']['Redis']['LoginPassword']=\App\Helpers\ZhtHelper\System\Environment::getLaravelEnvironment('REDIS_PASSWORD');

            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            }
            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSpecificUserSession                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Mendapatkan data Registry Spesifik (varValue) berdasarkan Parameter Kunci (varKey), Sub Parameter    |
        |                     Kunci (varSubKey), dan User Session (varUserSession)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey                                                                                                   |
        |      ▪ (string) varSubKey                                                                                                |
        |      ▪ (string) varUserSession                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varValue                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSpecificUserSession($varSubKey, $varUserSession)
            {
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            $varArrayTemp=explode('::', $varSubKey);
            switch(count($varArrayTemp))
                {
                case 1:
                    $varReturn = $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]];
                    break;
                case 2:
                    $varReturn = $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]];
                    break;
                case 3:
                    $varReturn = $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]];
                    break;
                case 4:
                    $varReturn = $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]];
                    break;
                case 5:
                    $varReturn = $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]];
                    break;
                case 6:
                    $varReturn = $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]];
                    break;
                }
                
            return $varReturn;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setGlobal                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Menyimpan data awal Registry berdasarkan Kata Kunci (varKey)                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey                                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setGlobal($varKey)
            {
            
            \App\Helpers\ZhtHelper\General\Session::set($varKey, $varDataSession);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setSpecificUserSession                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-07-09                                                                                           |
        | ▪ Description     : Menyimpan data Registry Spesifik (varValue) berdasarkan Parameter Kunci (varKey), Sub Parameter      |
        |                     Kunci (varSubKey), dan User Session (varUserSession)                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varKey                                                                                                   |
        |      ▪ (string) varSubKey                                                                                                |
        |      ▪ (string) varUserSession                                                                                           |
        |      ▪ (string) varValue                                                                                                 |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setSpecificUserSession($varSubKey, $varUserSession, $varValue)
            {
            $varDataSession = \App\Helpers\ZhtHelper\General\Session::get(\App\Helpers\ZhtHelper\System\Environment::getApplicationID());

            $varArrayTemp=explode('::', $varSubKey);
            switch(count($varArrayTemp))
                {
                case 1:
                    $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]]=$varValue;
                    break;
                case 2:
                    $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]]=$varValue;
                    break;
                case 3:
                    $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]]=$varValue;
                    break;
                case 4:
                    $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]]=$varValue;
                    break;
                case 5:
                    $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]]=$varValue;
                    break;
                case 6:
                    $varDataSession['Registry']['Specific'][$varUserSession][$varArrayTemp[0]][$varArrayTemp[1]][$varArrayTemp[2]][$varArrayTemp[3]][$varArrayTemp[4]][$varArrayTemp[5]]=$varValue;
                    break;
                }
            
            \App\Helpers\ZhtHelper\General\Session::set(\App\Helpers\ZhtHelper\System\Environment::getApplicationID(), $varDataSession);
            
            var_dump($varDataSession);
            }
        }
    }
?>