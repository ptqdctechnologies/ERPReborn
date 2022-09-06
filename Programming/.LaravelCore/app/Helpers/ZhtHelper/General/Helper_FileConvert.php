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
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (mixed)  varData ► Data                                                                                           |
        |      ▪ (string) varTempFileName ► Temporary File Name                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed)  varReturn                                                                                                |
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


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isConvertible_ToPDF                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-02                                                                                           |
        | ▪ Creation Date   : 2022-09-02                                                                                           |
        | ▪ Description     : Mengecek apakah data dapat dikonversi ke format PDF berdasarkan MIME nya                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varMIME ► MIME                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isConvertible_ToPDF($varUserSession, string $varMIME = null)
            {
            switch($varMIME) {
                //---> PDF
                case 'application/pdf':
                    {
                    $varReturn = TRUE;
                    break;
                    }
                //---> Other Data
                default:
                    {
                    //---> Other Data ---> Office Document
                    if(self::isConvertible_OfficeDocumentToPDF($varUserSession, $varMIME) == true) {
                        $varReturn = TRUE;                        
                        }
                    //---> Other Data ---> Others
                    else {
                        $varReturn = FALSE;
                        }
                    break;
                    }
                }

            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isConvertible_OfficeDocumentToPDF                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-02                                                                                           |
        | ▪ Creation Date   : 2022-09-02                                                                                           |
        | ▪ Description     : Mengecek apakah data office  dapat dikonversi ke format PDF berdasarkan MIME nya                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varMIME ► MIME                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isConvertible_OfficeDocumentToPDF($varUserSession, string $varMIME = null)
            {
            switch($varMIME) {
                //---> RTF
                case 'application/rtf':
                //---> DOC, DOCX
                case 'application/msword':
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                //---> XLS, XLSX, XLSB, XLSM 
                case 'application/vnd.ms-excel':
                case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                case 'application/vnd.ms-excel.sheet.binary.macroEnabled.12':
                case 'application/vnd.ms-excel.sheet.macroEnabled.12':
                //---> PPT, PPTX, PPTM
                case 'application/vnd.ms-powerpoint':
                case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
                case 'application/vnd.ms-powerpoint.presentation.macroEnabled.12':
                //---> ODT, ODS, ODP
                case 'application/vnd.oasis.opendocument.text':
                case 'application/vnd.oasis.opendocument.spreadsheet':
                case 'application/vnd.oasis.opendocument.presentation':
                    {
                    $varReturn = TRUE;
                    break;
                    }    
                default:
                    {
                    $varReturn = FALSE;
                    }
                }

            return $varReturn;
            }
            
            
/*
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
*/

        }
    }