<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setPurchaseOrderPaymentTermDetail\v1                                                                            |
| ▪ API Key     : transaction.update.supplyChain.setPurchaseOrderPaymentTermDetail                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setPurchaseOrderPaymentTermDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setPurchaseOrderPaymentTermDetail.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setPurchaseOrderPaymentTermDetail.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-04                                                                                           |
        | ▪ Creation Date   : 2023-05-04                                                                                           |
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
                'transaction.update.supplyChain.setPurchaseOrderPaymentTermDetail', 
                'latest', 
                [
                'recordID' => 120000000000001,
                'entities' => [
                    "purchaseOrderPaymentTerm_RefID" => 187000000000001,
                    "sequence" => 1,
                    "priceCurrency_RefID" => 62000000000001,
                    "priceCurrencyValue" => 10000000,
                    "priceCurrencyExchangeRate" => 1,
                    "remarks" => 'Down Payment'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setPurchaseOrderPaymentTermDetail.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setPurchaseOrderPaymentTermDetail.v1_throughAPIGatewayJQuery        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-05-04                                                                                           |
        | ▪ Creation Date   : 2023-05-04                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
/*            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Purchase Order Additional Cost Main Data</p></td></tr>';
            echo        '<tr><td>PurchaseOrder_RefID</td><td>';
            echo            '<input type="text" id="dataInput_PurchaseOrder_RefID" value=85000000000001>';
            echo        '</td></tr>';
            echo        '<tr><td>TransactionAdditionalCostType_RefID</td><td>';
            echo            '<input type="text" id="dataInput_TransactionAdditionalCostType_RefID" value=190000000000001>';
            echo        '</td></tr>';
            echo        '<tr><td>PriceCurrency_RefID</td><td>';
            echo            '<input type="text" id="dataInput_PriceCurrency_RefID" value=62000000000001>';
            echo        '</td></tr>';
            echo        '<tr><td>PriceCurrencyValue</td><td>';
            echo            '<input type="text" id="dataInput_PriceCurrencyValue" value=250>';
            echo        '</td></tr>';
            echo        '<tr><td>PriceCurrencyExchangeRate</td><td>';
            echo            '<input type="text" id="dataInput_PriceCurrencyExchangeRate" value=15000>';
            echo        '</td></tr>';
            echo        '<tr><td>Remarks</td><td>';
            echo            '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            echo        '</td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.supplyChain.setPurchaseOrderPaymentTermDetail', 
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
            dd($varJQueryFunction);*/
            }
        }
    }