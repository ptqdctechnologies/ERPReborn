<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\humanResource             |
|                 \setBusinessTripTransportationCostType\v1                                                                        |
| ▪ API Key     : transaction.create.humanResource.setBusinessTripTransportationCostType                                           |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\humanResource\setBusinessTripTransportationCostType\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.humanResource.setBusinessTripTransportationCostType.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.humanResource.setBusinessTripTransportationCostType.v1_throughAPIGateway        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-09                                                                                           |
        | ▪ Creation Date   : 2022-11-09                                                                                           |
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
                'transaction.create.humanResource.setBusinessTripTransportationCostType', 
                'latest', 
                [
                'entities' => [
                    "businessTripTransportationType_RefID" => 220000000000001,
                    "businessTripTransportationCostTypeComponent_RefID" => 222000000000001
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.humanResource.setBusinessTripTransportationCostType.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.humanResource.setBusinessTripTransportationCostType.v1_throughAPIGatewayJQuery  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-09                                                                                           |
        | ▪ Creation Date   : 2022-11-09                                                                                           |
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
            echo '<input type="text" id="dataInput_BusinessTripTransportationType_RefID" value=220000000000001>';
            echo '<input type="text" id="dataInput_BusinessTripTransportationCostTypeComponent_RefID" value=222000000000001>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.supplyChain.setBusinessTripTransportationCostType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"businessTripTransportationType_RefID" : parseInt(document.getElementById("dataInput_BusinessTripTransportationType_RefID").value), '.
                        '"businessTripTransportationCostTypeComponent_RefID" : parseInt(document.getElementById("dataInput_BusinessTripTransportationCostTypeComponent_RefID").value), '.
                        '}'.
                '}'
                ); 
            echo "<br><button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            //dd($varJQueryFunction);
            }
        }
    }