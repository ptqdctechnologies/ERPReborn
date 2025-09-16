<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    use Illuminate\Http\Request;


    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_File                                                                                                  |
    | ▪ Description : Menangani File dan Direktori                                                                                 |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_File
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
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAutoMatchSystemFilePath                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2020-08-04                                                                                           |
        | ▪ Creation Date   : 2020-08-04                                                                                           |
        | ▪ Description     : Mencari posisi file path varPostfix relatif terhadap varPrefix                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varPrefix ► Prefix Path                                                                                  |
        |      ▪ (string) varPostfix ► Postfix Path                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varPath                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getAutoMatchSystemFilePath($varPrefix, $varPostfix)
            {
            $varUserSession = 000000;
//            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
//                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'get automatic match system file path');
                try {
                    $varPrefix = (strcmp(substr($varPrefix, strlen($varPrefix)-1, 1), '/')==0 ? substr($varPrefix, 0, strlen($varPrefix)-1) : $varPrefix);
                    $varPostfix = (strcmp(substr($varPostfix, 0, 1), '/')==0 ? substr($varPostfix, 1, strlen($varPostfix)-1) : $varPostfix);
                    //$varPath=$varPrefix.(strcmp(substr($varPostfix, 0, 1), '/')==0 ? '' : '/').$varPostfix;
                    $varPath=$varPrefix.'/'.$varPostfix;
                    if(is_file($varPath)==0)
                        {
                        for ($i=0; $i!=10; $i++)
                            {
                            if(is_file($varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix))
                                {
                                $varPath = $varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix;
                                break;
                                }
                            }
                        }
                    //echo "<br>".$varPath;
                    $varReturn = $varPath;
//                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Success');
                    } 
                catch (\Exception $ex) {
//                    \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessStatus($varUserSession, $varSysDataProcess, 'Failed, '. $ex->getMessage());
                    }
//                \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessFooter($varUserSession, $varSysDataProcess);
                } 
            catch (\Exception $ex) {
                }
            return \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodFooter($varUserSession, $varReturn, __CLASS__, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getAutoMatchFilePath                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-08-18                                                                                           |
        | ▪ Description     : Mencari posisi file path varPostfix relatif terhadap varPrefix                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPrefix ► Prefix Path                                                                                  |
        |      ▪ (string) varPostfix ► Postfix Path                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varPath                                                                                                  |
        |                                                                                                                          |
        |  Kelak akan menggantikan getAutoMatchSystemFilePath($varPrefix, $varPostfix)                                             |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function getAutoMatchFilePath($varUserSession, $varPrefix, $varPostfix)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'get automatic match system file path');
                try {
                    $varPrefix = (strcmp(substr($varPrefix, strlen($varPrefix)-1, 1), '/')==0 ? substr($varPrefix, 0, strlen($varPrefix)-1) : $varPrefix);
                    $varPostfix = (strcmp(substr($varPostfix, 0, 1), '/')==0 ? substr($varPostfix, 1, strlen($varPostfix)-1) : $varPostfix);
                    $varPath=$varPrefix.'/'.$varPostfix;
                    if(is_file($varPath)==0)
                        {
                        $varPath = null;
                        $iMax = substr_count($varPrefix, '/');
                        for ($i=0; $i!=$iMax; $i++)
                            {
                            //echo "<br>".($varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix);
                            if(is_file($varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix))
                                {
                                $varPath = $varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix;
                                break;
                                }
                            }
                        }
                    if(is_file($varPath)==0)
                        {
                        throw new \Exception('File path is not found');
                        }
                    //echo "<br>".$varPath;
                    $varReturn = $varPath;
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
        | ▪ Method Name     : getAutoMatchDirectoryPath                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        | ▪ Description     : Mencari posisi directory path varPostfix relatif terhadap varPrefix                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPrefix ► Prefix Path                                                                                  |
        |      ▪ (string) varPostfix ► Postfix Path                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varPath                                                                                                  |
        |                                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        public static function getAutoMatchDirectoryPath($varUserSession, $varPrefix, $varPostfix)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'get automatic match system directory path');
                try {
                    $varPrefix = (strcmp(substr($varPrefix, strlen($varPrefix)-1, 1), '/')==0 ? substr($varPrefix, 0, strlen($varPrefix)-1) : $varPrefix);
                    $varPostfix = (strcmp(substr($varPostfix, 0, 1), '/')==0 ? substr($varPostfix, 1, strlen($varPostfix)-1) : $varPostfix);
                    $varPath=$varPrefix.'/'.$varPostfix;
                    
                    
                    if(is_dir($varPath)==0)
                        {
                        $varPath = null;
                        $iMax = substr_count($varPrefix, '/');
                        for ($i=0; $i!=$iMax; $i++)
                            {
                            //echo "<br>".($varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix);
                            if(is_dir($varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix))
                                {
                                $varPath = $varPrefix.'/.'.str_repeat("/..", $i).'/'.$varPostfix;
                                break;
                                }
                            }
                        }

                    if(is_dir($varPath)==0)
                        {
                        throw new \Exception('File path is not found');
                        }
                    //echo "<br>".$varPath;
                    $varReturn = $varPath;
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
        | ▪ Method Name     : getDeepestSubFoldersInFolder                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        | ▪ Description     : Mendapatkan daftar seluruh subfolder terdalam pada file path (varFilePath)                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilePath ► Path File                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDeepestSubFoldersInFolder($varUserSession, $varFilePath)
            {
            $varArrayData = self::getDeepestSubFolderInFolders_ENGINE($varUserSession, $varFilePath);
            for($i=0; $i!=count($varArrayData); $i++)
                {
                $varReturn[$i] = str_replace('#'.$varFilePath, '', '#'.$varArrayData[$i]);;
                }
            return $varReturn;
            }
            
        private static function getDeepestSubFolderInFolders_ENGINE($varUserSession, $varFilePath)
            {
            $varArrayData = self::getSubFoldersInFolder($varUserSession, $varFilePath);
            $iMax=count($varArrayData);
            if($iMax > 0)
                {
                $varIndex=0;
                for($i=0; $i!=$iMax; $i++)
                    {
                    $varSubFolder = self::getDeepestSubFolderInFolders_ENGINE($varUserSession, $varArrayData[$i]);
                    for($j=0; $j!=count($varSubFolder); $j++)
                        {
                        $varReturn[$varIndex] = $varSubFolder[$j];
                        $varIndex++;
                        }
                    } 
                }
            else
                {
                $varReturn[0] = $varFilePath;
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFileContent                                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2020-07-26                                                                                           |
        | ▪ Description     : Mendapatkan isi suatu file berdasarkan path (varPath)                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varPath ► Path File                                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varFileContent                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileContent($varUserSession, $varPath)
            {
            $varReturn = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodHeader($varUserSession, null, __CLASS__, __FUNCTION__);
            try {
                $varSysDataProcess = \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::setLogOutputMethodProcessHeader($varUserSession, __CLASS__, __FUNCTION__, 'Get file content of `'.$varPath.'`');
                try {
                    if(is_file($varPath))
                        {
                        $varFileContent = file_get_contents($varPath);
                        }
                    $varReturn = $varFileContent;
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
        | ▪ Method Name     : getFileContentFromPHPScript                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-19                                                                                           |
        | ▪ Description     : Mendapatkan file content dari PHP Script berdasarkan File Path (varFilePath)                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilePath ► Path File                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFileContentFromPHPScript($varUserSession, $varFilePath = null)
            {
            //if(is_file($varFilePath))
                {
                $ObjResource = str_replace(['<?php', '?>'], '', (file_get_contents($varFilePath)));
                return($ObjResource);
                //
                }
            }


        public static function getFileImageContent($varUserSession, $varFilePath = null)
            {
            if (is_file($varFilePath))
                {
                $varImagePath=file_get_contents($varFilePath);
                $varImageType=mime_content_type($varFilePath);
                $varImageData=base64_encode($varImagePath);
                $varSrcImage = 'data:'. $varImageType.';base64,'.$varImageData;                
                }
            else
                {
                //unset($varSrcImage);
                $varSrcImage = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
                }
            return $varSrcImage;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getFilesListInFolder                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-08-19                                                                                           |
        | ▪ Description     : Mendapatkan daftar seluruh file pada file path (varFilePath)                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilePath ► Path File                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getFilesListInFolder($varUserSession, string $varFilePath = null)
            {
            $varReturn = array_diff(scandir($varFilePath, 1), ['.', '..']);
            return $varReturn;
            }


        public static function setIncludeAllFilesInFolder($varUserSession, $varFilePath = null)
            {
            return include($varFilePath.'*');
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getMIMEOfFileContent                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Tipe MIME dari File Content                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getMIMEOfFileContent($varUserSession, $varData)
            {
            $ObjFileOriginal = finfo_open();
            $varReturn = finfo_buffer($ObjFileOriginal, $varData, FILEINFO_MIME_TYPE);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSubFoldersInFolder                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        | ▪ Description     : Mendapatkan daftar seluruh subfolder pada file path (varFilePath)                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilePath ► Path File                                                                                  |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (array)  varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getSubFoldersInFolder($varUserSession, $varFilePath)
            {
            $varArrayData = glob($varFilePath . '/*' , GLOB_ONLYDIR);
            return $varArrayData;
            }
            
        }
    }