<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setAdvanceSettlementDetail\v1                                                                                   |
| ▪ API Key     : transaction.update.finance.setAdvanceSettlementDetail                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setAdvanceSettlementDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvanceSettlementDetail.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvanceSettlementDetail.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-26                                                                                           |
        | ▪ Creation Date   : 2023-10-26                                                                                           |
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
                'transaction.update.finance.setAdvanceSettlementDetail', 
                'latest', 
                [
                'recordID' => 204000000000001,
                'entities' => [
                    'advanceSettlement_RefID' => 203000000000001,
                    'advancePaymentDetail_RefID' => 195000000000001,
                    'product_RefID' => 88000000000083,
                    'quantity' => 0.32,
                    'quantityUnit_RefID' => 73000000000009,
                    'productUnitPriceCurrency_RefID' => 62000000000001,
                    'productUnitPriceCurrencyValue' => 235000,
                    'productUnitPriceCurrencyExchangeRate' => 1,
                    'remarks' => 'Catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvanceSettlementDetail.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvanceSettlementDetail.v1_throughAPIGatewayJQuery |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-26                                                                                           |
        | ▪ Creation Date   : 2023-10-26                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Settlement Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=204000000000001></td></tr>';
            echo        '<tr><td>AdvanceSettlement_RefID</td><td><input type="text" id="dataInput_AdvanceSettlement_RefID" value=203000000000001></td></tr>';
            echo        '<tr><td>AdvancePaymentDetail_RefID</td><td><input type="text" id="dataInput_AdvancePaymentDetail_RefID" value=195000000000001></td></tr>';
            echo        '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000083></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=0.32></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000009></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue" value=235000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.finance.setAdvanceSettlementDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"advanceSettlement_RefID" : parseInt(document.getElementById("dataInput_AdvanceSettlement_RefID").value), '.
                        '"advancePaymentDetail_RefID" : parseInt(document.getElementById("dataInput_AdvancePaymentDetail_RefID").value), '.
                        '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                        '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID").value), '.
                        '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue").value), '.
                        '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }