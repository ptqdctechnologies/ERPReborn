<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_APIReport                                                                                             |
    | ▪ Description : Menangani segala parameter yang terkait API Report                                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_APIReport
        {
        public static function getJSONEncodeBase64_ExcelData($varUserSession, $varDataStreamPlain)
            {
            $varReturn = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode(
                $varUserSession, 
                $varDataStreamPlain
                );
            return $varReturn;
            }
        
        public static function getJSONDecodeBase64_ExcelData($varUserSession, $varDataStreamEncoded)
            {
            $varReturn = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                $varUserSession, 
                $varDataStreamEncoded
                );
            return $varReturn;            
            }

        public static function getJSONEncodeBase64_PDFData($varUserSession, $varDataStreamPlain)
            {
            $varReturn = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Encode(
                $varUserSession, 
                \App\Helpers\ZhtHelper\Report\Helper_PDF::getDataStream($varUserSession, $varDataStreamPlain)
                );
            return $varReturn;
            }
        
        public static function getJSONDecodeBase64_PDFData($varUserSession, $varDataStreamEncoded)
            {
            $varReturn = \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                $varUserSession, 
                $varDataStreamEncoded);
            return $varReturn;            
            }
        }
    }
