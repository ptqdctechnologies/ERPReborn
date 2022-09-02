<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\combined\thumbnails      |
|                 \setFilesMovement\v1                                                                                             |
| ▪ API Key     : fileHandling.upload.combined.thumbnails.setFilesMovement                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\combined\thumbnails\setFilesMovement\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.combined.thumbnails.setFilesMovement.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/fileHandling.upload.combined.thumbnails.setFilesMovement.v1_throughAPIGateway    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-30                                                                                           |
        | ▪ Creation Date   : 2022-08-30                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'fileHandling.upload.combined.thumbnails.setFilesMovement', 
                'latest', 
                [
                'parameter' => [
//                    'sourceFolderPath' => 'StagingArea/1273/1117',
//                    'destinationFolderPath' => 'Archive/92000000000133/12000000000159'
                    'sourceFolderPath' => 'Thumbnails/StagingArea/1117',
                    'destinationFolderPath' => 'Thumbnails/Archive/12000000000159'
                    ]
                ]
                );
                
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.combined.thumbnails.setFilesMovement.v1_throughAPIGatewayJQuery |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.combined.thumbnails.setFilesMovement.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-30                                                                                           |
        | ▪ Creation Date   : 2022-08-30                                                                                           |
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
            echo '<br>Source Folder Path<input type="text" id="dataInput_sourceFolderPath" value="Thumbnails/StagingArea/1117">';
            echo '<br>Destination Folder Path<input type="text" id="dataInput_destinationFolderPath" value="Thumbnails/Archive/12000000000159">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.upload.combined.thumbnails.setFilesMovement', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"sourceFolderPath" : document.getElementById("dataInput_sourceFolderPath").value'.
                        '"destinationFolderPath" : document.getElementById("dataInput_destinationFolderPath").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }