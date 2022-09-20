<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain               |
|                 \setPurchaseOrderAdditionalCost\v1                                                                               |
| ▪ API Key     : transaction.create.supplyChain.setPurchaseOrderAdditionalCost                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain\setPurchaseOrderAdditionalCost\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.supplyChain.setPurchaseOrderAdditionalCost.v1_throughAPIGateway                   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.supplyChain.setPurchaseOrderAdditionalCost.v1_throughAPIGateway                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-20                                                                                           |
        | ▪ Creation Date   : 2022-09-20                                                                                           |
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
                'transaction.create.supplyChain.setPurchaseOrderAdditionalCost', 
                'latest', 
                [
                'recordID' => 190000000000001,
                'entities' => [
                    "purchaseOrder_RefID" => 85000000000001, 
                    "transactionAdditionalCostType_RefID" => 190000000000001, 
                    "priceCurrency_RefID" => 62000000000001, 
                    "priceCurrencyValue" => 250, 
                    "priceCurrencyExchangeRate" => 15000, 
                    "remarks" => 'catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.supplyChain.setPurchaseOrderAdditionalCost.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.supplyChain.setPurchaseOrderAdditionalCost.v1_throughAPIGatewayJQuery           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-20                                                                                           |
        | ▪ Creation Date   : 2022-09-20                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=190000000000001>';
            echo '<input type="text" id="dataInput_PurchaseOrder_RefID" value=85000000000001>';
            echo '<input type="text" id="dataInput_TransactionAdditionalCostType_RefID" value=190000000000001>';
            echo '<input type="text" id="dataInput_PriceCurrency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_PriceCurrencyValue" value=250>';
            echo '<input type="text" id="dataInput_PriceCurrencyExchangeRate" value=15000>';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.supplyChain.setPurchaseOrderAdditionalCost', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"purchaseOrder_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrder_RefID").value), '.
                        '"transactionAdditionalCostType_RefID" : parseInt(document.getElementById("dataInput_TransactionAdditionalCostType_RefID").value), '.
                        '"priceCurrency_RefID" : parseInt(document.getElementById("dataInput_PriceCurrency_RefID").value), '.
                        '"priceCurrencyValue" : parseFloat(document.getElementById("dataInput_PriceCurrencyValue").value), '.
                        '"priceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_PriceCurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }