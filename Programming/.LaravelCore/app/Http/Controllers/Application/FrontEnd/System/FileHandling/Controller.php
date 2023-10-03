<?php

namespace App\Http\Controllers\Application\FrontEnd\System\FileHandling
    {
    class Controller extends \App\Http\Controllers\Controller
        {
        public function getArchivedFileObjectDownload(string $varEncodedData)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            echo "xxxx";
            //$varEncodedData =  Input   ::get('encodedData') ;
            echo $varEncodedData;
            }
        }
    }