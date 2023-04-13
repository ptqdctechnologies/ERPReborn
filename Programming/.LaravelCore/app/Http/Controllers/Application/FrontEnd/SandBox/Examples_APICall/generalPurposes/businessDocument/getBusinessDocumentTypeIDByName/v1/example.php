<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\generalPurposes\businessDocument             |
|                 \getBusinessDocumentTypeIDByName\v1                                                                              |
| ▪ API Key     : generalPurposes.businessDocument.getBusinessDocumentTypeIDByName                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\generalPurposes\businessDocument\getBusinessDocumentTypeIDByName\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     generalPurposes.businessDocument.getBusinessDocumentTypeIDByName.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       generalPurposes.businessDocument.getBusinessDocumentTypeIDByName.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-04-13                                                                                           |
        | ▪ Creation Date   : 2023-04-13                                                                                           |
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
                'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName', 
                'latest',
                [
                'parameter' => [
                    'name' => 'Purchase Requisition Form'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     generalPurposes.businessDocument.getBusinessDocumentTypeIDByName.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       generalPurposes.businessDocument.getBusinessDocumentTypeIDByName.v1_throughAPIGatewayJQuery        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-04-13                                                                                           |
        | ▪ Creation Date   : 2023-04-13                                                                                           |
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
            echo '<input type="text" id="dataInput_Name" value="Purchase Requisition Form">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'generalPurposes.businessDocument.getBusinessDocumentTypeIDByName', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }