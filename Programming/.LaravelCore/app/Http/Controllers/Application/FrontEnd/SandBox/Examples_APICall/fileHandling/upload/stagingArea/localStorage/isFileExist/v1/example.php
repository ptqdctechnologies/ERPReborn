<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\stagingArea\localStorage |
|                 \isFileExist\v1                                                                                                  |
| ▪ API Key     : fileHandling.upload.stagingArea.localStorage.isFileExist                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\stagingArea\localStorage\isFileExist\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.stagingArea.localStorage.isFileExist.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/fileHandling.upload.stagingArea.localStorage.isFileExist.v1_throughAPIGateway    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
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
                'fileHandling.upload.stagingArea.localStorage.isFileExist', 
                'latest', 
                [
                'parameter' => [
                    'recordPK' => 67
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     fileHandling.upload.stagingArea.localStorage.isFileExist.v1_throughAPIGatewayJQuery                  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       fileHandling.upload.stagingArea.localStorage.isFileExist.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
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
            echo '<br>FileUploadStagingArea_RefRPK<input type="text" id="dataInput_rotateLog_FileUploadStagingArea_RefRPK" value=1>';
            echo '<br>Sequence<input type="text" id="dataInput_sequence" value=1>';
            echo '<br>Name<input type="text" id="dataInput_name" value="ContohTextFile.txt">';
            echo '<br>Size<input type="text" id="dataInput_size" value=9>';
            echo '<br>MIME<input type="text" id="dataInput_MIME" value="text/plain">';
            echo '<br>extension<input type="text" id="dataInput_extension" value="txt">';
            echo '<br>contentBase64<input type="text" id="dataInput_contentBase64" value="dGVzdCBhamEK">';
            echo '<br>lastModifiedDateTimeTZ<input type="text" id="dataInput_lastModifiedDateTimeTZ" value="Mon Jul 19 2021 10:58:30 GMT+0700 (Western Indonesia Time)">';
            echo '<br>lastModifiedUnixTimestamp<input type="text" id="dataInput_lastModifiedUnixTimestamp" value=1626667110901>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'fileHandling.upload.stagingArea.localStorage.isFileExist', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"rotateLog_FileUploadStagingArea_RefRPK" : parseInt(document.getElementById("dataInput_rotateLog_FileUploadStagingArea_RefRPK").value), '.
                        '"sequence" : parseInt(document.getElementById("dataInput_sequence").value), '.
                        '"name" : document.getElementById("dataInput_name").value, '.
                        '"size" : parseInt(document.getElementById("dataInput_size").value), '.
                        '"MIME" : document.getElementById("dataInput_MIME").value, '.
                        '"extension" : document.getElementById("dataInput_extension").value, '.
                        '"contentBase64" : document.getElementById("dataInput_contentBase64").value, '.
                        '"lastModifiedDateTimeTZ" : document.getElementById("dataInput_lastModifiedDateTimeTZ").value, '.
                        '"lastModifiedUnixTimestamp" : parseInt(document.getElementById("dataInput_lastModifiedUnixTimestamp").value)'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }