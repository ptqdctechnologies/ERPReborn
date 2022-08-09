<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\archive\general          |
|                 \setFilesFromStagingArea\v1                                                                                      |
| ▪ API Key     : fileHandling.upload.archive.general.setFilesFromStagingArea                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\archive\general\setFilesFromStagingArea\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.archive.general.setFilesFromStagingArea.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.archive.general.setFilesFromStagingArea.v1_throughAPIGateway                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2022-08-03                                                                                           |
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
                'fileHandling.upload.archive.general.setFilesFromStagingArea', 
                'latest', 
                [
                'parameter' => [
                    'log_FileUpload_Pointer_RefID' => NULL,
                    'stagingArea_RecordPK' => 190,
                    'deleteCandidate_Log_FileUpload_ObjectDetail_RefArrayID' => []
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     fileHandling.upload.archive.general.setFilesFromStagingArea.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.archive.general.setFilesFromStagingArea.v1_throughAPIGatewayJQuery             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-08-03                                                                                           |
        | ▪ Creation Date   : 2022-08-03                                                                                           |
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
            echo '<br>Log File Upload Pointer Reference ID<input type="text" id="dataInput_log_FileUpload_Pointer_RefID" value=72>';
            echo '<br>Staging Area Record PK<input type="text" id="dataInput_stagingAreaRecordPK" value=72>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.upload.archive.general.setFilesFromStagingArea', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_log_FileUpload_Pointer_RefID").value), '.
                        '"stagingArea_RecordPK" : parseInt(document.getElementById("dataInput_stagingAreaRecordPK").value)'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }