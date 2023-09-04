<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\dataAcquisition           |
|                 \setLog_FileContent\v1                                                                                           |
| ▪ API Key     : transaction.update.dataAcquisition.setLog_FileContent                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\dataAcquisition\setLog_FileContent\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.dataAcquisition.setLog_FileContent.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.update.dataAcquisition.setLog_FileContent.v1_throughAPIGateway       |
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
                'transaction.update.dataAcquisition.setLog_FileContent', 
                'latest', 
                [
                'recordID' => 236000000000001,
                'entities' => [
                    'additionalData' => [
                        "itemList" => [
                            "items" => [
                                    [
                                    'recordID' => 237000000000001,
                                    "entities" => [
                                        "sequence" => 1,
                                        "name" => 'fileName2.csv',
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
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.dataAcquisition.setLog_FileContent.v1_throughAPIGatewayJQuery                     |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.dataAcquisition.setLog_FileContent.v1_throughAPIGatewayJQuery                   |
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
            $varFileUpload_UniqueID = 'FileContentRead';
            echo '<br>Log FileUpload Pointer RefID ► '.
                '<textarea id="dataInput_Log_FileContent" name="dataInput_Log_FileContent" rows="4" cols="50"></textarea>'.
                '<input type="file" id="dataInput_Log_FileContent_Action" multiple="multiple" '.
                    'onChange="javascript:'.
                    \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContentRead(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken,
                        $varFileUpload_UniqueID,
                        'dataInput_Log_FileContent'
                        ).
                    ';" />';
            }
        }
    }