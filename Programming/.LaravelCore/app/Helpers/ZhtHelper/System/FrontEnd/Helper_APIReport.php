<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\FrontEnd                                                                            |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2021 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\FrontEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_APIReport                                                                                             |
    | ▪ Description : Menangani segala parameter yang terkait API Report                                                           |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_APIReport
        {
        public static function setDataStreamToDisplay($varUserSession, $varDataStreamBase64Encoded, string $varOutputFileName = null)
            {
            \App\Helpers\ZhtHelper\Report\Helper_PDF::setDataStreamToDisplay(
                $varUserSession, 
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                    $varUserSession,
                    $varDataStreamBase64Encoded
                    ), 
                $varOutputFileName
                );
            }
        }
    }