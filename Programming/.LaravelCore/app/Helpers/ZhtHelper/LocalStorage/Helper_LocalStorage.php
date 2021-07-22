<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\LocalStorage                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\LocalStorage
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_LocalStorage                                                                                          |
    | ▪ Description : Menangani LocalStorage                                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_LocalStorage
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $ObjLocalStorage = null;
        private static $varBasePath = null;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : createFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Membuat objek file baru                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varContentBase64 ► Content Base64                                                                       |
        |      ▪ (string)  varRemoteFilePath ► Destination File Path                                                               |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function createFile($varUserSession, string $varContent, string $varFilePath)
            {
            self::init();
            self::$ObjLocalStorage->put(self::$varBasePath.$varFilePath, $varContent);
            }
        
        private static function init()
            {
            self::$ObjLocalStorage = \Illuminate\Support\Facades\Storage::disk('local');
            self::$varBasePath = 'Application/';
            }
        }
    }