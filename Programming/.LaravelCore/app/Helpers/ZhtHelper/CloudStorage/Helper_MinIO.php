<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\CloudStorage                                                                               |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\CloudStorage
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_MinIO                                                                                                 |
    | ▪ Description : Menangani CloudStorage MinIO                                                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_MinIO
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $ObjMinIO = null;
        private static $ObjMinIOClient = null;
        private static $varBucketName = 'erp-reborn';
        
        
        private static function init($varUserSession)
            {
            self::$ObjMinIOClient = new \Aws\S3\S3Client([
                'version' => 'latest',
                'region' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_REGION'),
                'endpoint' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_ENDPOINT'),
                'use_path_style_endpoint' => true,
                'credentials' => [
                    'key'    => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_KEY'),
                    'secret' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET'),                            
                    ]                        
                ]);
/*           
$s3Client = new \Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1',
    'endpoint' => 'https://localhost',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key' => 'testabc123',
        'secret' => 'testabc123',
    ],
    'http' => [
        'verify' => false,
    ],
]);
            
         $s3Client->deleteBucket($bucket);*/
            }



        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : createBucket                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-05                                                                                           |
        | ▪ Description     : Membuat Objek Bucket Baru                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function createBucket($varUserSession, string $varBucketName)
            {         
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Remove file object from Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::init($varUserSession);
                    if(self::isBucketExist($varUserSession, $varBucketName) === TRUE)
                        {
                        throw new \Exception('Bucket already exist');                        
                        }                    
                    if(!($varResult = self::$ObjMinIOClient->createBucket([
                        "Bucket" => $varBucketName,
                        ])))
                        {
                        throw new \Exception('Bucket can\'t create');
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    $varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : createFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Membuat Objek File Baru                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varRemoteFilePath ► Destination File Path                                                               |
        |      ▪ (string)  varContent ► Content Data                                                                               |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function createFile($varUserSession, string $varRemoteFilePath, string $varContent, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Remove file object from Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    self::init($varUserSession);
                    self::$ObjMinIOClient->putObject([
                        'Bucket' => self::$varBucketName,
                        'Key' => $varRemoteFilePath,
                        'Body'   => $varContent
                        ]);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    $varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : deleteBucket                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-05                                                                                           |
        | ▪ Description     : Menghapus Objek Bucket                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function deleteBucket($varUserSession, string $varBucketName)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Remove file object from Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::init($varUserSession);
                    if(self::isBucketExist($varUserSession, $varBucketName) === FALSE)
                        {
                        throw new \Exception('Bucket doesn\'t exist');
                        }                    
                    if(!($varResult = self::$ObjMinIOClient->deleteBucket([
                        "Bucket" => $varBucketName,
                        ])))
                        {
                        throw new \Exception('Bucket can\'t be removed or accessed');
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    $varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : deleteFile                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Menghapus Objek file                                                                                 |
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
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Remove file object from Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    if(self::isFileExist($varUserSession, $varRemoteFilePath) == false)
                        {
                        throw new \Exception('File is not exist');
                        }
                    self::$ObjMinIO->delete($varRemoteFilePath);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    $varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAllDataRecord                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
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
        public static function getAllDataRecord($varUserSession, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get all record');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    $varArrayTemp = self::getFileListRecursive($varUserSession, '');
                    for($i=0; $i!=count($varArrayTemp); $i++)
                        {
                        $varTemp = explode('/', $varArrayTemp[$i]);
                        $varFileName = array_pop($varTemp);
                        $varReturn[$i] = [
                            'Sys_ID' => $varArrayTemp[$i],
                            'Folder' => implode('/', $varTemp),
                            'File' => $varFileName
                            ];
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBucketName                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
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
        public static function getBucketName($varUserSession)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Bucket Name');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!self::$varBucketName)
                        {
                        $varReturn = \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_BUCKET');
                        }
                    else 
                        {
                        $varReturn = self::$varBucketName;
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileInfo                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Mendapatkan Informasi File                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varRemoteFilePath ► Destination File Path                                                                |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileInfo($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get file information');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(self::isFileExist($varUserSession, $varRemoteFilePath) == false)
                        {
                        throw new \Exception('File is not exist');
                        }
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    $varFilePathPart = explode('/', $varRemoteFilePath);
                    $varFileExtension = explode('.', $varFilePathPart[count($varFilePathPart)-1]);
                    $varFileName = array_pop($varFilePathPart);
                    $varReturn = [
                        'FileName' => $varFileName,
                        'FileExtension' => strtolower($varFileExtension[count($varFileExtension)-1]),
                        'MIMEType' => self::$ObjMinIO->mimeType($varRemoteFilePath),
                        'Size' => self::$ObjMinIO->size($varRemoteFilePath),
                        'LastModified' => \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateTimeFromUnixTime($varUserSession, self::$ObjMinIO->lastModified($varRemoteFilePath)),
                        'Folder' => implode('/', $varFilePathPart)
                        ];
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileContent                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-22                                                                                           |
        | ▪ Creation Date   : 2022-08-22                                                                                           |
        | ▪ Description     : Mendapatkan Content dari File                                                                        |
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
        public static function getFileContent($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, [], __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set file list');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    self::init($varUserSession);
                    //--->
                    $varReturn = (string)
                        (
                        self::$ObjMinIOClient->getObject([
                            'Bucket' => self::$varBucketName,
                            'Key'    => $varRemoteFilePath
                            ])
                        )['Body'];
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileListRecursive                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File Rekursif (Termasuk file dalam subfolder)                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBaseFolder ► Base Folder                                                                              |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileListRecursive($varUserSession, string $varBaseFolder = '', string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set file list');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    self::init($varUserSession);
                    $varTemp = self::$ObjMinIOClient->listObjects(
                        [
                        'Bucket' =>  self::$varBucketName
                        ]
                        );
                    $i = 0;
                    foreach ($varTemp['Contents'] as $varTemp) {
                        $varFilePart = explode('/', $varTemp['Key']);
                        $varReturn[$i++] = [
                            'Name' => $varFilePart[count($varFilePart)-1],
                            'FullName' => $varTemp['Key']
                            ];
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileURL                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
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
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get file object URL');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    if(self::isFileExist($varUserSession, $varRemoteFilePath) == false)
                        {
                        throw new \Exception('File is not exist');
                        }
                    $varReturn = self::$ObjMinIO->url($varRemoteFilePath);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFilesList                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000003                                                                                       |
        | ▪ Last Update     : 2022-08-26                                                                                           |
        | ▪ Creation Date   : 2021-07-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar File                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBaseFolder ► Base Folder                                                                              |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFilesList($varUserSession, string $varBaseFolder = '', string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, [], __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set file list');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    self::init($varUserSession);
                    
                    $varTemp = self::$ObjMinIOClient->getIterator(
                        'ListObjects', 
                        [
                            "Bucket" => self::$varBucketName,
                            "Prefix" => $varBaseFolder
                        ]
                        );
            
                    $i = 0;
                    foreach ($varTemp as $varTemp) {
                        $varFilePart = explode('/', $varTemp['Key']);
                        $varReturn[$i++] = [
                            'Name' => $varFilePart[count($varFilePart)-1],
                            'FullName' => $varTemp['Key']
                            ];
                        }

                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSubDirectoriesList                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2021-07-22                                                                                           |
        | ▪ Description     : Mendapatkan Daftar Seluruh Folder dan Sub Folder                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varBaseFolder ► Base Folder                                                                              |
        |      ▪ (string) varBucketName ► Bucket Name                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSubDirectoriesList($varUserSession, string $varBaseFolder = '', string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, [], __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get Sub Directories List On Directory');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    self::init($varUserSession);
                    $varTemp = self::$ObjMinIOClient->listObjects(
                        [
                        'Bucket' =>  self::$varBucketName,
                        'Prefix' => $varBaseFolder
                        ]
                        );
                    $i = 0;
                    $varTemp3 = [];
                    foreach ($varTemp['Contents'] as $varTemp) {
                        $varTemp2 = substr($varTemp['Key'], strlen($varBaseFolder)+1, strlen($varTemp['Key'])-strlen($varBaseFolder)-1);
                        $varPathPart = explode('/', $varTemp2);
                        if(!in_array($varPathPart[0], $varTemp3, true)) {
                            array_push($varTemp3, $varPathPart[0]);
                            }
                        }
                    for($i=0, $iMax=count($varTemp3); $i!=$iMax; $i++)
                        {
                        $varReturn[$i] = [
                            'Name' => $varTemp3[$i],
                            'FullName' => $varBaseFolder.'/'.$varTemp3[$i]
                            ];
                        }
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isBucketExist                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-08-05                                                                                           |
        | ▪ Description     : Mengecek eksistensi bucket                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isBucketExist($varUserSession, string $varBucketName)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Remove file object from Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::init($varUserSession);
                    $varReturn = self::$ObjMinIOClient->doesBucketExist($varBucketName);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);   
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isFileExist                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-22                                                                                           |
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
        public static function isFileExist($varUserSession, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Check if the file object exists');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    $varReturn = self::$ObjMinIO->exists($varRemoteFilePath);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : moveFile                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-27                                                                                           |
        | ▪ Description     : Memindahkan objek file                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)   varUserSession ► User Session                                                                           |
        |      ▪ (string)  varSourceFilePath ► Source File Path                                                                    |
        |      ▪ (string)  varDestinationFilePath ► Destination File Path                                                          |
        |      ▪ (string)  varBucketName ► Bucket Name                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (boolean) varReturn                                                                                               | 
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function moveFile($varUserSession, string $varSourceFilePath, string $varDestinationFilePath, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Move file on Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    if(self::isFileExist($varUserSession, $varSourceFilePath) == false)
                        {
                        throw new \Exception('File is not exist');
                        }
//                 \Illuminate\Support\Facades\Storage::disk('local')->move($varSourceFilePath, $varDestinationFilePath);
                    $varReturn = self::$ObjMinIO->move($varSourceFilePath, $varDestinationFilePath);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    //$varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : putFile                                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2021-07-21                                                                                           |
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
        public static function putFile($varUserSession, string $varLocalFilePath, string $varRemoteFilePath, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Put file object to Server');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(is_file($varLocalFilePath) == false)
                        {
                        throw new \Exception('Source file is not exist');
                        }
                    self::setBucketName($varUserSession, ($varBucketName ? $varBucketName : self::getBucketName($varUserSession)));
                    self::$ObjMinIO->put($varRemoteFilePath, file_get_contents($varLocalFilePath));
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    $varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setBucketName                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
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
        public static function setBucketName($varUserSession, string $varBucketName = null)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, false, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Set Bucket Name');
                try {
                    //---- ( MAIN CODE ) --------------------------------------------------------------------- [ START POINT ] -----
                    if(!$varBucketName)
                        {
                        $varBucketName = \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_BUCKET');
                        }
                    self::$varBucketName = $varBucketName;
                    if(self::isBucketExist($varUserSession, self::$varBucketName) === FALSE)
                        {
                        self::createBucket($varUserSession, self::$varBucketName);
                        }
                        
                    self::$ObjMinIO = \Illuminate\Support\Facades\Storage::createS3Driver([
                        'driver' => 's3',
                        'endpoint' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_ENDPOINT'),
                        'key'    => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_KEY'),
                        'secret' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_SECRET'),
                        'region' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('MINIO_REGION'),
                        'bucket' => $varBucketName ,
                        ]);
                    //---- ( MAIN CODE ) ----------------------------------------------------------------------- [ END POINT ] -----
                    $varReturn = true;
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }
        }
    }