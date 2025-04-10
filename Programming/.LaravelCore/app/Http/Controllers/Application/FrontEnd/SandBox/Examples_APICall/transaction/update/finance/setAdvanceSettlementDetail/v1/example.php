<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setAdvanceSettlementDetail\v1                                                                                   |
| ▪ API Key     : transaction.update.finance.setAdvanceSettlementDetail                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
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
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2023-10-26                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'transaction.update.finance.setAdvanceSettlementDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 204000000000001,
                        'entities' => [
                            'advanceSettlement_RefID' => 203000000000001,
                            'advanceDetail_RefID' => 82000000000001,
                            'product_RefID' => 88000000000083,
                            'quantity' => 0.32,
                            'quantityUnit_RefID' => 73000000000009,
                            "expenseClaimProductUnitPriceCurrency_RefID" => 62000000000001,
                            "expenseClaimProductUnitPriceCurrencyValue" => 235000,
                            "expenseClaimProductUnitPriceCurrencyExchangeRate" => 1,
                            "returnProductUnitPriceCurrency_RefID" => 62000000000001,
                            "returnProductUnitPriceCurrencyValue" => 235000,
                            "returnProductUnitPriceCurrencyExchangeRate" => 1,
                            'remarks' => 'Catatan'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvanceSettlementDetail.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvanceSettlementDetail.v1_throughAPIGatewayJQuery |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2023-10-26                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Settlement Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=204000000000001></td></tr>';
            echo        '<tr><td>AdvanceSettlement_RefID</td><td><input type="text" id="dataInput_AdvanceSettlement_RefID" value=203000000000001></td></tr>';
            echo        '<tr><td>AdvanceDetail_RefID</td><td><input type="text" id="dataInput_AdvanceDetail_RefID" value=82000000000001></td></tr>';
            echo        '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000083></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=0.32></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000009></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrencyValue" value=235000></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrencyValue" value=235000></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setAdvanceSettlementDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"advanceSettlement_RefID" : parseInt(document.getElementById("dataInput_AdvanceSettlement_RefID").value), '.
                            '"advanceDetail_RefID" : parseInt(document.getElementById("dataInput_AdvanceDetail_RefID").value), '.
                            '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                            '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                            '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                            '"expenseClaimProductUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrency_RefID").value), '.
                            '"expenseClaimProductUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrencyValue").value), '.
                            '"expenseClaimProductUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrencyExchangeRate").value), '.
                            '"returnProductUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ReturnProductUnitPriceCurrency_RefID").value), '.
                            '"returnProductUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ReturnProductUnitPriceCurrencyValue").value), '.
                            '"returnProductUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ReturnProductUnitPriceCurrencyExchangeRate").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value'.
                            '}'.
                        '}'
                    //-----[ DATA ]-----(  END  )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }