<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\sysConfig                 |
|                 \setAppObject_WorkFlow\v1                                                                                        |
| ▪ API Key     : transaction.update.sysConfig.setAppObject_WorkFlow                                                               |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\sysConfig\setAppObject_WorkFlow\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.sysConfig.setAppObject_WorkFlow.v1_throughAPIGateway             |
        |                     ► http://172.28.0.4/transaction.update.sysConfig.setAppObject_WorkFlow.v1_throughAPIGateway          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-28                                                                                           |
        | ▪ Creation Date   : 2023-02-28                                                                                           |
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
                'transaction.update.sysConfig.setAppObject_WorkFlow', 
                'latest', 
                [
                'recordID' => 112000000000001,
                'entities' => [
                    "JSONDataInitGraph" => 
                        \App\Helpers\ZhtHelper\General\Helper_Encode::getJSONEncode(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                            [
                            'start' => [
                                    ['S-IT-1', 164000000000023, 'I-IT-1'],
                                    ['S-IT-2', 164000000000428, 'I-IT-1'],
                                    ['S-IT-3', 164000000000196, 'FA-IT-1'],
                                    ['S-IT-4', 164000000000497, 'FA-IT-1']
                                ],
                            'finish' => [
                                    ['FA-IT-1', 164000000000439]
                                ],
                            'intermediate' => [
                                    ['I-IT-1', 164000000000196, NULL, 'FA-IT-1']
                                ]
                            ]
                            ),
                    "remarks" => null
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.sysConfig.setAppObject_WorkFlow.v1_throughAPIGatewayJQuery       |
        |                     ► http://172.28.0.4/transaction.update.sysConfig.setAppObject_WorkFlow.v1_throughAPIGatewayJQuery    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-02-28                                                                                           |
        | ▪ Creation Date   : 2023-02-28                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=112000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Name Update">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.sysConfig.setAppObject_WorkFlow', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }