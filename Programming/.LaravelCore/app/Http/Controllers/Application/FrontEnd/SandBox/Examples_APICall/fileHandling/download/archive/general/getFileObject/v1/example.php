<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\download\archive\general        |
|                 \getFileObject\v1                                                                                                |
| ▪ API Key     : fileHandling.download.archive.general.getFileObject                                                              |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\download\archive\general\getFileObject\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.download.archive.general.getFileObject.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.download.archive.general.getFileObject.v1_throughAPIGateway                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-02                                                                                           |
        | ▪ Creation Date   : 2023-10-02                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //---Core---
            $varData = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayDownloadArchivedFile(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'fileHandling.download.archive.general.getFileObject', 
                    'latest', 
                    [
                    'parameter' => [
                        'encryptedData' => 'ZXpVeUxEUXpMRE16TERFeUxETTVMREk0TERRMExETTFMRGNzTkRFc01UVXNNemNzTVRnc01qQXNNamNzTVRjc01qTXNNekVzTlRBcwpNalVzTWl3eE1TdzBPU3d4TXl3ME1pd3pNQ3cwT0N3MkxEUXdMREVzTWpZc01qSXNOU3d4Tml3ek5DdzFNU3cwTml3eU1Td3hPU3d5Ck5Dd3pNaXd4TUN3eE5DdzVMRFEzTERNNExETTJMRGdzTWprc05DdzBOU3d6ZlE9PSMjI0pNak4yd0RNWmpTeHdBTUQ9andhRERRd0cwaURNTjhYTVE4QU1Jd0RNQU1sQXc1QTVNQT0='
//                        'filePath' => 'Archive/92000000000296/12000000000345'
                        ]
                    ]               
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.download.archive.general.getFileObject.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.download.archive.general.getFileObject.v1_throughAPIGatewayJQuery                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-02                                                                                           |
        | ▪ Creation Date   : 2023-10-02                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<br>File Path<input type="text" id="dataInput_filePath" value="Archive/92000000000296/12000000000345">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.download.archive.general.getFileObject', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"filePath" : document.getElementById("dataInput_filePath").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }