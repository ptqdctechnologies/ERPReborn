<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setPurchaseOrderDetail\v1                                                                                       |
| ▪ API Key     : transaction.update.supplyChain.setPurchaseOrderDetail                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setPurchaseOrderDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setPurchaseOrderDetail.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setPurchaseOrderDetail.v1_throughAPIGateway       |
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
                'transaction.update.supplyChain.setPurchaseOrderDetail', 
                'latest', 
                [
                'recordID' => 86000000000001,
                'entities' => [
                    "purchaseOrder_RefID" => 85000000000001,
                    "purchaseRequisitionDetail_RefID" => 666999,
                    "quantity" => 10,
                    "quantityUnit_RefID" => 73000000000001,
                    "productUnitPriceValue_Currency_RefID" => 62000000000001,
                    "productUnitPriceValue_CurrencyeValue" => 25000,
                    "productUnitPriceValue_CurrencyExchangeRate" => 1,
                    "productUnitPriceValueDiscount_Currency_RefID" => 62000000000001,
                    "productUnitPriceValueDiscount_CurrencyeValue" => 0,
                    "productUnitPriceValueDiscount_CurrencyExchangeRate" => 1,
                    "remarks" => 'Catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setPurchaseOrderDetail.v1_throughAPIGatewayJQuery                     |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setPurchaseOrderDetail.v1_throughAPIGatewayJQuery                   |
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
            echo '<input type="text" id="dataInput_RecordID" value=86000000000001>';
            echo '<input type="text" id="dataInput_PurchaseOrder_RefID" value=85000000000001>';
            echo '<input type="text" id="dataInput_PurchaseRequisitionDetail_RefID" value=666999>';
            echo '<input type="text" id="dataInput_Quantity" value=10>';
            echo '<input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001>';
            echo '<input type="text" id="dataInput_ProductUnitPriceValue_Currency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_ProductUnitPriceValue_CurrencyeValue" value=25000>';
            echo '<input type="text" id="dataInput_ProductUnitPriceValue_CurrencyExchangeRate" value=1>';
            echo '<input type="text" id="dataInput_ProductUnitPriceValueDiscount_Currency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_ProductUnitPriceValueDiscount_CurrencyeValue" value=0>';
            echo '<input type="text" id="dataInput_ProductUnitPriceValueDiscount_CurrencyExchangeRate" value=1>';
            echo '<input type="text" id="dataInput_Remarks" value="Catatan">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.supplyChain.setPurchaseOrderDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"purchaseOrder_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrder_RefID").value), '.
                        '"purchaseRequisitionDetail_RefID" : parseInt(document.getElementById("dataInput_PurchaseRequisitionDetail_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                        '"productUnitPriceValue_Currency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceValue_Currency_RefID").value), '.
                        '"productUnitPriceValue_CurrencyeValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceValue_CurrencyeValue").value), '.
                        '"productUnitPriceValue_CurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceValue_CurrencyExchangeRate").value), '.
                        '"productUnitPriceValueDiscount_Currency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceValueDiscount_Currency_RefID").value), '.
                        '"productUnitPriceValueDiscount_CurrencyeValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceValueDiscount_CurrencyeValue").value), '.
                        '"productUnitPriceValueDiscount_CurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceValueDiscount_CurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }