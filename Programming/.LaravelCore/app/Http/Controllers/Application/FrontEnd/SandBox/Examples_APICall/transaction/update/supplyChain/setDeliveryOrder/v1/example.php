<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setDeliveryOrder\v1                                                                                             |
| ▪ API Key     : transaction.update.supplyChain.setDeliveryOrder                                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setDeliveryOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setDeliveryOrder.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setDeliveryOrder.v1_throughAPIGateway             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-03-27                                                                                           |
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
                'transaction.update.supplyChain.setDeliveryOrder',
                'latest',
                [
                'recordID' => 180000000000011,
                'entities' => [
                    "documentDateTimeTZ" => '2025-03-28',
                    "log_FileUpload_Pointer_RefID" => 164000000000412,
                    "requesterWorkerJobsPosition_RefID" => 164000000000413,
                    "remarks" => 'My Remarks 27/03/2025 - 1 A',
                    "transporter_RefID" => 164000000000414,
                    "additionalData" => [
                        "itemList" => [
                            "items" => [
                                    [
                                    "recordID" => 181000000000019,
                                    "entities" => [
                                        "referenceDocument_RefID" => 73000000000033,
                                        "quantity" => 25,
                                        "quantityUnit_RefID" => 73000000000036,
                                        "remarks" => "Catatan 1 - C",
                                        "underlyingDetail_RefID" => 73000000000039
                                        ]                                   
                                    ],
                                    [
                                    "recordID" => 181000000000020,
                                    "entities" => [
                                        "referenceDocument_RefID" => 73000000000034,
                                        "quantity" => 20,
                                        "quantityUnit_RefID" => 73000000000037,
                                        "remarks" => "Catatan 1 - D",
                                        "underlyingDetail_RefID" => 73000000000040
                                        ]
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
                );
            return $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setDeliveryOrder.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setDeliveryOrder.v1_throughAPIGatewayJQuery       |
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
            echo '<input type="text" id="dataInput_RecordID" value=181000000000001>';
            echo '<input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-07">';
            echo '<input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497>';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.update.supplyChain.setDeliveryOrder',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }
