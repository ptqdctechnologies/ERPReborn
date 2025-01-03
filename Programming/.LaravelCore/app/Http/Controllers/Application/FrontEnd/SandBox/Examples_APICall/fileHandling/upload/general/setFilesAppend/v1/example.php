<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\general\setFilesAppend   |
|                 \v1                                                                                                              |
| ▪ API Key     : fileHandling.upload.general.setFilesAppend                                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\fileHandling\upload\general\setFilesAppend\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.general.setFilesAppend.v1_throughAPIGateway                     |
        |                     ► http://172.28.0.4/fileHandling.upload.general.setFilesAppend.v1_throughAPIGateway                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-23                                                                                           |
        | ▪ Creation Date   : 2024-08-23                                                                                           |
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
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'fileHandling.upload.general.setFilesAppend', 
                    'latest', 
                    [
                    'parameter' => [
//                        'log_FileUpload_Pointer_RefID' => null,
                        'log_FileUpload_Pointer_RefID' => 264000000000001,
                        "additionalData" => [
                            "itemList" => [
                                "items" => [
                                        [
                                        "entities" => [
                                            'name' => 'ContohTextFile.txt',
                                            'size' => 9,
                                            'MIME' => 'text/plain',
                                            'extension' => 'txt',
                                            'lastModifiedDateTimeTZ' => 'Mon Jul 19 2021 10:58:30 GMT+0700 (Western Indonesia Time)',
                                            'lastModifiedUnixTimestamp' => 1626667110901,
                                            'contentBase64' => 'SGFpIEluaSBGaWxlIFRleHQgMQ==',
                                            ]                                   
                                        ],
                                        [
                                        "entities" => [
                                            'name' => 'ContohTextFileKeDua.txt',
                                            'size' => 9,
                                            'MIME' => 'text/plain',
                                            'extension' => 'txt',
                                            'lastModifiedDateTimeTZ' => 'Mon Jul 19 2021 10:58:30 GMT+0700 (Western Indonesia Time)',
                                            'lastModifiedUnixTimestamp' => 1626667110901,
                                            'contentBase64' => 'SGFpIEluaSBGaWxlIFRleHQgMg==',
                                            ]                                   
                                        ]


                                    ]
                                ]
                            ]
                        ]
                    ]
                    );
            var_dump(json_encode($varData));
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/fileHandling.upload.general.setFilesAppend.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/fileHandling.upload.general.setFilesAppend.v1_throughAPIGatewayJQuery            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-08-23                                                                                           |
        | ▪ Creation Date   : 2024-08-23                                                                                           |
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
            echo '<br>FileUpload_Pointer_RefID<input type="text" id="dataInput_log_FileUpload_Pointer_RefID" value="">';
            echo '<br>Name<input type="text" id="dataInput_name" value="ContohTextFile.txt">';
            echo '<br>Size<input type="text" id="dataInput_size" value=9>';
            echo '<br>MIME<input type="text" id="dataInput_MIME" value="text/plain">';
            echo '<br>extension<input type="text" id="dataInput_extension" value="txt">';
            echo '<br>lastModifiedDateTimeTZ<input type="text" id="dataInput_lastModifiedDateTimeTZ" value="Mon Jul 19 2021 10:58:30 GMT+0700 (Western Indonesia Time)">';
            echo '<br>lastModifiedUnixTimestamp<input type="text" id="dataInput_lastModifiedUnixTimestamp" value=1626667110901>';
            echo '<br>contentBase64<input type="text" id="dataInput_contentBase64" value="dGVzdCBhamEK">';
            $varJQueryFunction = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'fileHandling.upload.general.setFilesAppend', 
                    'latest', 
                    '{'.
                        '"parameter" : {'.
                            '"log_FileUpload_Pointer_RefID" : (!(document.getElementById("dataInput_log_FileUpload_Pointer_RefID").value) ? null : parseInt(document.getElementById("dataInput_log_FileUpload_Pointer_RefID").value)), '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : {'.
                                                '"name" : document.getElementById("dataInput_name").value, '.
                                                '"size" : parseInt(document.getElementById("dataInput_size").value), '.
                                                '"MIME" : document.getElementById("dataInput_MIME").value, '.
                                                '"extension" : document.getElementById("dataInput_extension").value, '.
                                                '"lastModifiedDateTimeTZ" : document.getElementById("dataInput_lastModifiedDateTimeTZ").value, '.
                                                '"lastModifiedUnixTimestamp" : parseInt(document.getElementById("dataInput_lastModifiedUnixTimestamp").value), '.
                                                '"contentBase64" : document.getElementById("dataInput_contentBase64").value'.
                                                '}'.
                                            '}'.
                                        ']'.
                                    '}'.
                                '}'.
                            '}'.
                    '}'
                    );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }

/*
 * 

//                            
                            '"log_FileUpload_Pointer_RefID" : null, '.
                            '}'.
 * 
 * 
 * 
 * 
 */
            
            
            
        }
    }