<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\LocalStorage\System                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\LocalStorage\System
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Local Storage ► System                                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General extends \App\Models\LocalStorage\DefaultClassPrototype
        {
       /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : createDirectory                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Creation Date   : 2021-07-22                                                                                           |
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
        | ▪ Creation Date   : 2021-07-22                                                                                           |
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
        | ▪ Creation Date   : 2021-07-22                                                                                           |
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
        | ▪ Creation Date   : 2021-07-22                                                                                           |
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
        | ▪ Creation Date   : 2021-07-22                                                                                           |
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
        | ▪ Method Name     : getFilesList                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-26                                                                                           |
        | ▪ Creation Date   : 2022-07-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)   varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getFilesList($varUserSession, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getFilesList($varUserSession, $varFilePath, $varDiskID);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSubDirectoriesList                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-26                                                                                           |
        | ▪ Creation Date   : 2022-07-26                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Sub Direktori                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varFilePath ► File Path (Mandatory)                                                                     |
        |      ▪ (string)  varDiskID ► Disk ID (Optional)                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)   varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getSubDirectoriesList($varUserSession, string $varFilePath, string $varDiskID = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\LocalStorage\Helper_LocalStorage::getSubDirectoriesList($varUserSession, $varFilePath, $varDiskID);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isFileExist                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Creation Date   : 2021-07-22                                                                                           |
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