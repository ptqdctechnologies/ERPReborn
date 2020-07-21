<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System                                                                                     |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System
    {
    class Helper_HTTPRequest
        {
        public static function getEncryptedURLParameter(array $varDataArray)
            {
            //echo "<br>".$_SERVER['REQUEST_TIME']."<br>";
            echo \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ();
            //echo "<br>".$_SERVER['REQUEST_TIME']."<br>";
            }
        }
    }