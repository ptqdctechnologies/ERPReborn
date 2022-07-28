<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setWarehouseOutboundOrderDetail\v1                                                                              |
| ▪ API Key     : transaction.update.supplyChain.setWarehouseOutboundOrderDetail                                                   |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setWarehouseOutboundOrderDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setWarehouseOutboundOrderDetail.v1_throughAPIGateway                  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setWarehouseOutboundOrderDetail.v1_throughAPIGateway                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
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
                'transaction.update.supplyChain.setWarehouseOutboundOrderDetail', 
                'latest', 
                [
                'recordID' => 179000000000001,
                'entities' => [
                    "warehouseOutboundOrder_RefID" => 178000000000001,
                    "referenceDocument_RefID" => 666999,
                    "product_RefID" => 88000000000001,
                    "quantity" => 10,
                    "quantityUnit_RefID" => 73000000000001,
                    "productUnitPriceCurrency_RefID" => 62000000000001,
                    "productUnitPriceCurrencyExchangeRate" => 1,
                    "productUnitPriceCurrencyValue" => 30000,
                    "remarks" => 'Catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setWarehouseOutboundOrderDetail.v1_throughAPIGatewayJQuery            |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setWarehouseOutboundOrderDetail.v1_throughAPIGatewayJQuery          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=179000000000001>';
            echo '<input type="text" id="dataInput_WarehouseOutboundOrder_RefID" value=178000000000001>';
            echo '<input type="text" id="dataInput_ReferenceDocument_RefID" value=666999>';
            echo '<input type="text" id="dataInput_Product_RefID" value=88000000000001>';
            echo '<input type="text" id="dataInput_Quantity" value=10>';
            echo '<input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001>';
            echo '<input type="text" id="dataInput_ProductUnitPriceCurrency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate" value=1>';
            echo '<input type="text" id="dataInput_ProductUnitPriceCurrencyValue" value=30000>';
            echo '<input type="text" id="dataInput_Remarks" value="Catatan">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.supplyChain.setWarehouseOutboundOrderDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"warehouseOutboundOrder_RefID" : parseInt(document.getElementById("dataInput_WarehouseOutboundOrder_RefID").value), '.
                        '"referenceDocument_RefID" : parseInt(document.getElementById("dataInput_ReferenceDocument_RefID").value), '.
                        '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                        '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID").value), '.
                        '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate").value), '.
                        '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }