<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\humanResource             |
|                 \setBusinessTripAccommodationArrangementsType\v1                                                                 |
| ▪ API Key     : transaction.create.humanResource.setBusinessTripAccommodationArrangementsType                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\humanResource\setBusinessTripAccommodationArrangementsType\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.humanResource.setBusinessTripAccommodationArrangementsType.v1_throughAPIGateway   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.humanResource.setBusinessTripAccommodationArrangementsType.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-04                                                                                           |
        | ▪ Creation Date   : 2022-11-04                                                                                           |
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
                'transaction.create.humanResource.setBusinessTripAccommodationArrangementsType', 
                'latest', 
                [
                'entities' => [
                    "name" => 'Accommodation Arrangements Name'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.humanResource.setBusinessTripAccommodationArrangementsType.                       |
        |                     v1_throughAPIGatewayJQuery                                                                           |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.humanResource.setBusinessTripAccommodationArrangementsType.                     |
        |                       v1_throughAPIGatewayJQuery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-04                                                                                           |
        | ▪ Creation Date   : 2022-11-04                                                                                           |
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
            echo '<input type="text" id="dataInput_Name" value="Accommodation Arrangements Name">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.supplyChain.setBusinessTripAccommodationArrangementsType', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<br><button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            //dd($varJQueryFunction);
            }
        }
    }