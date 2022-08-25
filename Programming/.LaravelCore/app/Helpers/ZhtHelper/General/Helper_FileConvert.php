<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\General                                                                                    |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\General
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_ImageProcessing                                                                                       |
    | ▪ Description : Menangani File Convert                                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_FileConvert
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
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
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
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
        | ▪ Method Name     : getConvertDataContent_OfficeToPDF                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-25                                                                                           |
        | ▪ Creation Date   : 2022-08-25                                                                                           |
        | ▪ Description     : Mendapatkan Data Konversi Office Data ke format PDF                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varPrefix ► Prefix Path                                                                                  |
        |      ▪ (string) varPostfix ► Postfix Path                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varPath                                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getConvertDataContent_OfficeToPDF($varUserSession, $varData, string $varTempFileName = null)
            {
            if(!$varTempFileName) {
                $varTempFileName = 'Default';
                }

            $varFolderPath = 
                \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchDirectoryPath(
                    $varUserSession, 
                    getcwd(), 
                    'storage/app/Application/Upload/ThumbnailsProcessing/'
                    );
            
            //---> Lock File
            $varFileLockPath = $varFolderPath.$varTempFileName.'.lock';
            $varLockDateTimeTZ = \App\Helpers\ZhtHelper\General\Helper_File::getFileContent($varUserSession, $varFileLockPath) ;
            
            $varLockTimeoutInSecond = (5 * 60);
            $varSignExecute = FALSE;
            //---> Jika File Lock Tidak Ditemukan
            if (!$varLockDateTimeTZ) {
                $varSignExecute = TRUE;
                }
            //---> Jika File Lock Ditemukan (Abnormal Terminate or Other Process Running)
            else {
                $varCurrentDateTimeTZ = \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ();                        
                //echo "<br>".$varLockDateTimeTZ;
                //echo "<br>".$varCurrentDateTimeTZ;
                if ((
                    ((int) \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varCurrentDateTimeTZ)) - 
                    ((int) \App\Helpers\ZhtHelper\General\Helper_DateTime::getUnixTime($varUserSession, $varLockDateTimeTZ))
                    ) > $varLockTimeoutInSecond)
                    {
                    $varSignExecute = TRUE;
                    }
                }
                
            //---> Jika dieksekusi
            if($varSignExecute == TRUE)
                {
                //---> Create Lock File
                $ObjLockFile = fopen($varFileLockPath, 'w');
                fwrite($ObjLockFile, \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ());
                fclose($ObjLockFile);
                
                //--->
                $varFileExt = 
                    (new \App\Models\Database\SchData_OLTP_Master\General())->getFileExtensionOfMIME(
                        $varUserSession, 
                        \App\Helpers\ZhtHelper\General\Helper_File::getMIMEOfFileContent(
                            $varUserSession, 
                            $varData
                            )
                        );

                $varFileOfficePath = $varFolderPath.$varTempFileName.$varFileExt;
                $varFilePDFName = $varTempFileName.'.pdf';
                $varFilePDFPath = $varFolderPath.$varFilePDFName;

                $ObjLocalFile = fopen($varFileOfficePath, 'wb');
                fwrite($ObjLocalFile, $varData);
                fclose($ObjLocalFile);

                $ObjConverter = new \NcJoes\OfficeConverter\OfficeConverter($varFileOfficePath);
                $ObjConverter->convertTo($varFilePDFName);

                $varReturn = 
                    \App\Helpers\ZhtHelper\General\Helper_File::getFileContent(
                        $varUserSession, 
                        $varFilePDFPath
                        );

                unlink($varFileOfficePath);
                unlink($varFilePDFPath);
                
                //---> Remove Lock File
                unlink($varFileLockPath);
                }

            return $varReturn;
            }

            
            
            

        public static function getConvertFile_OfficeToPDF($varUserSession, $varData)
            {
            $varFolderPath = 
                \App\Helpers\ZhtHelper\General\Helper_File::getAutoMatchDirectoryPath(
                    $varUserSession, 
                    getcwd(), 
                    'storage/app/Application/Upload/ThumbnailsProcessing/'
                    );
            
            $varFileExt = 
                (new \App\Models\Database\SchData_OLTP_Master\General())->getFileExtensionOfMIME(
                    $varUserSession, 
                    \App\Helpers\ZhtHelper\General\Helper_File::getMIMEOfFileContent(
                        $varUserSession, 
                        $varData
                        )
                    );

            $varFilePath = $varFolderPath.'Default'.$varFileExt;
            
            $ObjLocalFile = fopen($varFilePath, 'wb');
            fwrite($ObjLocalFile, $varData);
            fclose($ObjLocalFile);
            
            $ObjConverter = new \NcJoes\OfficeConverter\OfficeConverter($varFilePath);
            $ObjConverter->convertTo('Default.pdf');
            
//            unlink($varFilePath);

//            dd($varFilePath);
            echo "xxxx";
            }


        }
    }