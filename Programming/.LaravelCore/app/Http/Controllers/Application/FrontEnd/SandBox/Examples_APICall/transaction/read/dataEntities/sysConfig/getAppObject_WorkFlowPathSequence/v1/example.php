<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataEntities\sysConfig      |
|                 \getAppObject_WorkFlowPathSequence\v1                                                                            |
| ▪ API Key     : transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence                                        |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataEntities\sysConfig\getAppObject_WorkFlowPathSequence\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence.v1_throughAPIGateway     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-03                                                                                           |
        | ▪ Creation Date   : 2023-03-03                                                                                           |
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
                'transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence', 
                'latest', 
                [
                'parameter' => [
                    'recordIDSet' => '{117000000000001, 117000000000002}'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence.v1_throughAPIGatewayJQuery |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence.                         |
        |                       v1_throughAPIGatewayJQuery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-03                                                                                           |
        | ▪ Creation Date   : 2023-03-03                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo '<input type="text" id="dataInput_RecordIDSet" value="{117000000000001, 117000000000002}">';
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.read.dataEntities.sysConfig.getAppObject_WorkFlowPathSequence', 
                'latest', 
                '{'.
                    '"parameter" : '.
                        '{'.
                        '"recordIDSet" : document.getElementById("dataInput_RecordIDSet").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }