<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\LocalStorage                                                                                          |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\LocalStorage
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : DefaultClassPrototype                                                                                        |
    | ▪ Description : Menangani Prototype untuk diwariskan ke Class Models LocalStorage                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class DefaultClassPrototype
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
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
        | ▪ Method Name     : createDirectory                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Membuat objek file baru berdasarkan content                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function createDirectory($varUserSession, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::createDirectory($varUserSession, $varFilePath, $varDiskID);
            return $varReturn;
            }


       /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : createFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Membuat objek file baru berdasarkan content                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varContent ► Content (Mandatory)                                                                        |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function createFile($varUserSession, string $varContent, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::createFile($varUserSession, $varContent, $varFilePath, $varDiskID);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : deleteDirectory                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Menghapus objek directory                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function deleteDirectory($varUserSession, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::deleteDirectory($varUserSession, $varFilePath, $varDiskID);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : deleteFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Menghapus objek file                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function deleteFile($varUserSession, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::deleteFile($varUserSession, $varFilePath, $varDiskID);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBasePath                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Mendapatkan Local Storage Base Path                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string)  varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getBasePath($varUserSession, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getBasePath($varUserSession, $varDiskID);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isFileExist                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Mengecek eksistensi objek file                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isFileExist($varUserSession, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::isFileExist($varUserSession, $varFilePath, $varDiskID);
            return $varReturn;
            }
        }
    }