<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\dataAcquisition           |
|                 \setLog_FileContent\v1                                                                                           |
| ▪ API Key     : transaction.create.dataAcquisition.setLog_FileContent                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\dataAcquisition\setLog_FileContent\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.dataAcquisition.setLog_FileContent.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.create.dataAcquisition.setLog_FileContent.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-03                                                                                           |
        | ▪ Creation Date   : 2023-09-03                                                                                           |
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
                'transaction.create.dataAcquisition.setLog_FileContent', 
                'latest', 
                [
                'entities' => [
                    "additionalData" => [
                        "itemList" => [
                            "items" => [
                                    [
                                    "entities" => [
                                        "sequence" => 1,
                                        "name" => 'fileName.csv',
                                        "size" => 6,
                                        "MIME" => 'text/csv',
                                        "extension" => 'csv',
                                        "lastModifiedDateTimeTZ" => 'Thu Aug 31 2023 08:48:41 GMT+0700 (Western Indonesia Time)',
                                        "lastModifiedUnixTimestamp" => 1693446521406,
                                        "contentBase64" => 'IklZm9'
                                        ]
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.dataAcquisition.setLog_FileContent.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/transaction.create.dataAcquisition.setLog_FileContent.v1_throughAPIGatewayJQuery |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-09-03                                                                                           |
        | ▪ Creation Date   : 2023-09-03                                                                                           |
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
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Log FileContent Main Data</p></td></tr>';
            echo '</table><br>';
 
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.dataAcquisition.setLog_FileContent',
                'latest', 
                '{'.
                '"entities" : {'.
                        '"additionalData" : {'.
                            '"itemList" : {'.
                                '"items" : '.'[{"entities" : {"sequence" : 1, "name" : "CorpAcctTrxn2023830885930 (copy).csv", "size" : 733, "MIME" : "text/csv", "extension" : "csv", "lastModifiedDateTimeTZ" : "Thu Aug 31 2023 08:48:41 GMT+0700 (Western Indonesia Time)", "lastModifiedUnixTimestamp" : 1693446521406, "contentBase64" : "IkluZm9ybWFzaSBSZWtlbmluZyAtIE11dGFzaSBSZWtlbmluZyIsIiAiLCIgIiwiICIsIiAiLAoKIk5vLiByZWtlbmluZyA6IDAwNjg1MDI5MTEiCiJOYW1hIDogUURDIFRFQ0hOT0xPR0lFUyBQVCIKIlBlcmlvZGUgOiAyOC8wOC8yMDIzIC0gMzAvMDgvMjAyMyIKIktvZGUgTWF0YSBVYW5nIDogUnAiCiJUYW5nZ2FsIFRyYW5zYWtzaSIsIktldGVyYW5nYW4iLCJDYWJhbmciLCJKdW1sYWgiLCJTYWxkbyIKIjI5LzA4IiwiQkktRkFTVCBDUiBUQU5HR0FMIDoyOC8wOCBUUkFOU0ZFUiAgIERSIDAwMiAgSU5GUkEgTUVESUEgRElOQU1JICAgIiwiMDAwMCIsIjUsMDAwLDAwMC4wMCBDUiIsIjI4LDMzMSwyMjAuNDciCiIyOS8wOCIsIlRSU0YgRS1CQU5LSU5HIERCIDI5MDgvRlRTQ1kvV1M5NTA1MSAxMTgwMDAuMDAgIFBDLTIzMDgvMDE4JjAyMCBXVUxBTlJBTklBU0lIICAiLCIwMDAwIiwiMTE4LDAwMC4wMCBEQiIsIjI4LDIxMywyMjAuNDciCiIyOS8wOCIsIlRSU0YgRS1CQU5LSU5HIERCIDI5MDgvRlRTQ1kvV1M5NTA1MSA0NTUwMC4wMCAgUEMtMjMwOC8wMTkgRElBTiBUUkkgUkFITUFXQVRJICAiLCIwMDAwIiwiNDUsNTAwLjAwIERCIiwiMjgsMTY3LDcyMC40NyIKIlNhbGRvIEF3YWwgOiAyMywzMzEsMjIwLjQ3IgoiTXV0YXNpIERlYmV0IDogMTYzLDUwMC4wMCIsIjIiCiJNdXRhc2kgS3JlZGl0IDogNSwwMDAsMDAwLjAwIiwiMSIKIlNhbGRvIEFraGlyIDogMjgsMTY3LDcyMC40NyIKCg=="}}, {"entities" : {"sequence" : 2, "name" : "CorpAcctTrxn2023830885930.csv", "size" : 733, "MIME" : "text/csv", "extension" : "csv", "lastModifiedDateTimeTZ" : "Thu Aug 31 2023 08:48:41 GMT+0700 (Western Indonesia Time)", "lastModifiedUnixTimestamp" : 1693446521406, "contentBase64" : "IkluZm9ybWFzaSBSZWtlbmluZyAtIE11dGFzaSBSZWtlbmluZyIsIiAiLCIgIiwiICIsIiAiLAoKIk5vLiByZWtlbmluZyA6IDAwNjg1MDI5MTEiCiJOYW1hIDogUURDIFRFQ0hOT0xPR0lFUyBQVCIKIlBlcmlvZGUgOiAyOC8wOC8yMDIzIC0gMzAvMDgvMjAyMyIKIktvZGUgTWF0YSBVYW5nIDogUnAiCiJUYW5nZ2FsIFRyYW5zYWtzaSIsIktldGVyYW5nYW4iLCJDYWJhbmciLCJKdW1sYWgiLCJTYWxkbyIKIjI5LzA4IiwiQkktRkFTVCBDUiBUQU5HR0FMIDoyOC8wOCBUUkFOU0ZFUiAgIERSIDAwMiAgSU5GUkEgTUVESUEgRElOQU1JICAgIiwiMDAwMCIsIjUsMDAwLDAwMC4wMCBDUiIsIjI4LDMzMSwyMjAuNDciCiIyOS8wOCIsIlRSU0YgRS1CQU5LSU5HIERCIDI5MDgvRlRTQ1kvV1M5NTA1MSAxMTgwMDAuMDAgIFBDLTIzMDgvMDE4JjAyMCBXVUxBTlJBTklBU0lIICAiLCIwMDAwIiwiMTE4LDAwMC4wMCBEQiIsIjI4LDIxMywyMjAuNDciCiIyOS8wOCIsIlRSU0YgRS1CQU5LSU5HIERCIDI5MDgvRlRTQ1kvV1M5NTA1MSA0NTUwMC4wMCAgUEMtMjMwOC8wMTkgRElBTiBUUkkgUkFITUFXQVRJICAiLCIwMDAwIiwiNDUsNTAwLjAwIERCIiwiMjgsMTY3LDcyMC40NyIKIlNhbGRvIEF3YWwgOiAyMywzMzEsMjIwLjQ3IgoiTXV0YXNpIERlYmV0IDogMTYzLDUwMC4wMCIsIjIiCiJNdXRhc2kgS3JlZGl0IDogNSwwMDAsMDAwLjAwIiwiMSIKIlNhbGRvIEFraGlyIDogMjgsMTY3LDcyMC40NyIKCg=="}}]'.
                                '}'.
                            '}'.
                    '}'.
                '}'
                ); 
            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }