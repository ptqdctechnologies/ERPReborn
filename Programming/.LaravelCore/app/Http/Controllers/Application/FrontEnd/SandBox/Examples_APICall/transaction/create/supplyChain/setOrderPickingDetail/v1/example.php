<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain               |
|                 \setOrderPickingDetail\v1                                                                                        |
| ▪ API Key     : transaction.create.supplyChain.setOrderPickingDetail                                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain\setOrderPickingDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setOrderPickingDetail.v1_throughAPIGateway           |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setOrderPickingDetail.v1_throughAPIGateway        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-10                                                                                           |
        | ▪ Creation Date   : 2024-01-10                                                                                           |
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
                'transaction.create.supplyChain.setOrderPickingDetail', 
                'latest', 
                [
                'entities' => [
                    "orderPicking_RefID" => 250000000000001,
                    "orderPickingRequisitionDetail_RefID" => 249000000000001,
                    "quantity" => 1,
                    "quantityUnit_RefID" => 73000000000001,
                    "productUnitPriceCurrency_RefID" => 62000000000001,
                    "productUnitPriceCurrencyValue" => 25000,
                    "productUnitPriceCurrencyExchangeRate" => 1,
                    "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                    "productUnitPriceDiscountCurrencyeValue" => 0,
                    "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                    "remarks" => 'Catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.supplyChain.setOrderPickingDetail.v1_throughAPIGatewayJQuery                      |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.supplyChain.setOrderPickingDetail.v1_throughAPIGatewayJQuery                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-10                                                                                           |
        | ▪ Creation Date   : 2024-01-10                                                                                           |
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
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Order Picking Detail Main Data</p></td></tr>';
            echo       '<tr><td>OrderPicking_RefID</td><td><input type="text" id="dataInput_OrderPicking_RefID" value=250000000000001></td></tr>';
            echo       '<tr><td>OrderPickingRequisitionDetail_RefID</td><td><input type="text" id="dataInput_OrderPickingRequisitionDetail_RefID" value=249000000000001></td></tr>';
            echo       '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=10></td></tr>';
            echo       '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001></td></tr>';
            echo       '<tr><td>ProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>ProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue" value=25000></td></tr>';
            echo       '<tr><td>ProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>ProductUnitPriceDiscountCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>ProductUnitPriceDiscountCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyValue" value=0></td></tr>';
            echo       '<tr><td>ProductUnitPriceDiscountCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.supplyChain.setOrderPickingDetail', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"orderPicking_RefID" : parseInt(document.getElementById("dataInput_OrderPicking_RefID").value), '.
                        '"orderPickingRequisitionDetail_RefID" : parseInt(document.getElementById("dataInput_OrderPickingRequisitionDetail_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                        '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID").value), '.
                        '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue").value), '.
                        '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate").value), '.
                        '"productUnitPriceDiscountCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceDiscountCurrency_RefID").value), '.
                        '"productUnitPriceDiscountCurrencyeValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyValue").value), '.
                        '"productUnitPriceDiscountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }