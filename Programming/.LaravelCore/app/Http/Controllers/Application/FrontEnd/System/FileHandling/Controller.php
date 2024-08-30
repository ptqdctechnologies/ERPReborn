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

//        public function getFileObjectDownload(string $varEncodedData) {
        public function getFileObjectDownload() {
            $varData = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System(),
                    'fileHandling.download.general.getFileContent', 
                    'latest', 
                    [
                    'parameter' => [
                        'filePath' => 'StagingAreaTemp/267000000000001/268000000000001'
                        ]
                    ]
                    )['data'];
//            dd($varData);

            header('Content-type: '.$varData['MIME']);
            header('Content-Disposition: attachment; filename='.$varData['name']);
            echo
                \App\Helpers\ZhtHelper\General\Helper_Encode::getBase64Decode(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varData['contentBase64']
                    );
            }
        }
    }