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
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_API                                                                                                   |
    | ▪ Description : Menangani segala parameter yang terkait API                                                                  |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_API
        {
        public static function setCallAPIEngine($varUserSession, $varAPI, $varData, $varCallerFunctionName=null)
            {
            //Fungsi ini tidak diperbolehkan menggunakan try catch karena akan mengganggu pesan error
            if(!$varCallerFunctionName)
                {
                $varCallerFunctionName = debug_backtrace()[1]['function'];
                }
            $varClass = 'App\\Http\\Controllers\\Application\\BackEnd\\System\\'.\App\Helpers\ZhtHelper\General\Helper_String::getUpperCaseFirstCharacter($varUserSession, $varAPI['service']).'\\Engines\\'.$varAPI['class'].'\\'.$varAPI['subClass'].'\\v'.$varAPI['version'].'\\'.$varAPI['subClass'];
            $varFilePath = \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchFilePath($varUserSession, getcwd(), '/./../'.str_replace('App/', 'app/', str_replace('\\', '/', $varClass)).'.php');
            if(!$varFilePath)
                {
                throw new \Exception('API "'.$varAPI['class'].'.'.$varAPI['subClass'].'" version '.$varAPI['version'].' is not found');
                }
            require_once($varFilePath);
            $varObjEngine = new $varClass();
            $varReturn = $varObjEngine->{$varCallerFunctionName}($varUserSession, $varData);
            return $varReturn;
            }
        }
    }