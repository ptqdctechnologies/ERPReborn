<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Models                                                                                                    |
| ▪ Name Space : \App\Models\CloudStorage\System                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Models\CloudStorage\System
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : General                                                                                                      |
    | ▪ Description : Menangani Models Cloud Storage ► System                                                                      |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class General extends \App\Models\CloudStorage\DefaultClassPrototype
        {
       /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : createFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
        | ▪ Creation Date   : 2021-07-21                                                                                           |
        | ▪ Description     : Membuat objek file baru berdasarkan content                                                          |
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
/*        public static function createFile($varUserSession, string $varContentBase64, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::createFile($varUserSession, $varContentBase64, $varRemoteFilePath, $varBucketName);
            return $varReturn;            
            }*/
        public static function createFile($varUserSession, string $varRemoteFilePath, string $varContent, string $varBucketName = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::createFile(
                    $varUserSession,
                    $varRemoteFilePath,
                    $varContent,
                    $varBucketName
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : copyFile                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Description     : Menyimpan objek file                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varLocalFilePath ► Source File Path                                                                     |
        |      ▪ (string)  varRemoteFilePath ► Destination File Path                                                               |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function copyFileToCloud($varUserSession, string $varLocalFilePath, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::putFile(
                    $varUserSession,
                    $varLocalFilePath,
                    $varRemoteFilePath,
                    $varBucketName
                    );

            return
                $varReturn;
            }


       /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : deleteFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Description     : Menghapus objek file                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varRemoteFilePath ► Destination File Path                                                               |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function deleteFile($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::deleteFile(
                    $varUserSession,
                    $varRemoteFilePath,
                    $varBucketName
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAllDataRecord                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-08                                                                                           |
        | ▪ Last Update     : 2020-09-08                                                                                           |
        | ▪ Description     : Mendapatkan seluruh data record                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getAllDataRecord($varUserSession, string $varBucketName = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getAllDataRecord(
                    $varUserSession,
                    $varBucketName
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBucketName                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Description     : Mendapatkan Nama Bucket yang sedang aktif                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getBucketName($varUserSession)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getBucketName(
                    $varUserSession
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataRecord                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-08                                                                                           |
        | ▪ Last Update     : 2020-09-08                                                                                           |
        | ▪ Description     : Mendapatkan seluruh data record                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varRemoteFilePath ► Remote File Path                                                                     |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function getDataRecord($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileInfo(
                    $varUserSession,
                    $varRemoteFilePath,
                    $varBucketName
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileContent                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2022-08-22                                                                                           |
        | ▪ Last Update     : 2022-08-22                                                                                           |
        | ▪ Description     : Mendapatkan Content dari objek file                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varRemoteFilePath ► Remote File Path                                                                    |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileContent($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileContent(
                    $varUserSession,
                    $varRemoteFilePath,
                    $varBucketName
                    );

            return
                $varReturn;            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileURL                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Description     : Mendapatkan URL dari objek file                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varRemoteFilePath ► Destination File Path                                                               |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileURL($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = 
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFileURL(
                    $varUserSession,
                    $varRemoteFilePath,
                    $varBucketName
                    );

            return
                $varReturn;            
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
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getFilesList(
                    $varUserSession,
                    $varFilePath,
                    $varDiskID
                    );

            return
                $varReturn;
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
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::getSubDirectoriesList(
                    $varUserSession,
                    $varFilePath,
                    $varDiskID
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isFileExist                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Description     : Mengecek eksistensi objek file                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varLocalFilePath ► Source File Path                                                                     |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function isFileExist($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::isFileExist(
                    $varUserSession,
                    $varRemoteFilePath,
                    $varBucketName
                    );

            return
                $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : moveFile                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-08                                                                                           |
        | ▪ Creation Date   : 2022-08-08                                                                                           |
        | ▪ Description     : Menmindahkan File                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session (Mandatory)                                                               |
        |      ▪ (string)  varSourceFilePath ► Source File Path (Mandatory)                                                        |
        |      ▪ (string)  varDestinationFilePath ► Destination File Path (Mandatory)                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)   varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function moveFile($varUserSession, $varSourceFilePath, $varDestinationFilePath)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::moveFile(
                    $varUserSession,
                    $varSourceFilePath,
                    $varDestinationFilePath
                    );

            return
                $varReturn;            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setBucketName                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Creation Date   : 2020-09-07                                                                                           |
        | ▪ Last Update     : 2020-09-07                                                                                           |
        | ▪ Description     : Mengeset Nama Bucket                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setBucketName($varUserSession, string $varBucketName)
            {
            $varReturn =
                \App\Helpers\ZhtHelper\CloudStorage\Helper_MinIO::setBucketName(
                    $varUserSession,
                    $varBucketName
                    );

            return
                $varReturn;
            }
        }
    }