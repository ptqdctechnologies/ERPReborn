<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Report                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\Report
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_PDF                                                                                                   |
    | ▪ Description : Menangani Report PDF                                                                                         |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_PDF
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | Class Properties                                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static $varNameSpace;
        protected static $ObjPDF;

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-07                                                                                           |
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
        | ▪ Last Update     : 2021-07-07                                                                                           |
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
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-07                                                                                           |
        | ▪ Description     : Inisialisasi                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function init($varUserSession, array $varParameter = null)
            {
            try {
                if(!$varParameter)
                    {
                    $varParameter = [
                        'PageOrientation' => 'P',
                        'Metric' => 'mm',
                        'PaperSize' => 'A4'
                        ];                
                    }
                $ObjPDF = new \zhtVendor\PDF\zhtVendor(
                    $varParameter['PageOrientation'],
                    $varParameter['Metric'],
                    $varParameter['PaperSize'],
                    true, 
                    'UTF-8', 
                    false
                    );
                } 
            catch (\Exception $ex) {
                }
            self::$ObjPDF = $ObjPDF;
            return $ObjPDF;
            }
            
            
/*        public function __call($method, $args)
            {
            self::$ObjPDF = new \TCPDF();
            if (isset(self::$ObjPDF::$method)) {
                $func = self::$ObjPDF::$method;
                return call_user_func_array($func, $args);
                }
             }*/

             
        public static function initPage()
            {
            echo "xxxxxxxxxxxxxxxxxx";
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getDataStream                                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-07                                                                                           |
        | ▪ Description     : Mendapatkan DataStream dari Objek PDF                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (mixed)  ObjPDF ► Objek PDF (Mandatory)                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (mixed) varReturn                                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function getDataStream($varUserSession, $ObjPDF)
            {
            $varReturn = $ObjPDF->Output('', 'S');
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setDataStreamToDisplay                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-07                                                                                           |
        | ▪ Description     : Menampilkan PDF pada browser dari DataStream                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session (Mandatory)                                                                |
        |      ▪ (mixed)  varDataStream ► Data Stream (Mandatory)                                                                  |
        |      ▪ (string) varOutputFileName ► Output File Name (Optional)                                                          |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function setDataStreamToDisplay($varUserSession, $varDataStream, string $varOutputFileName = null)
            {
            if(!$varOutputFileName)
                {
                $varOutputFileName='filename.pdf';
                }
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=".$varOutputFileName);
            echo $varDataStream;
            }
        }



    }