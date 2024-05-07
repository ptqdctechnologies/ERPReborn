<?php

namespace App\Http\Controllers\Application\FrontEnd\System\FileHandling
    {

    use Illuminate\Support\Facades\Session;

    class Controller extends \App\Http\Controllers\Controller
        {
        public function getArchivedFileObjectDownload(string $varEncodedData)
            {
            $varUserSession = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
            // $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
            $varAPIWebToken = Session::get('SessionLogin');
           
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayDownloadArchivedFile(
                $varUserSession,
                $varAPIWebToken,
                'fileHandling.download.archive.general.getFileObject', 
                'latest',
                [
                'parameter' => [
                    'encryptedData' => $varEncodedData
                    ]
                ]
                );
            }
        }
    }