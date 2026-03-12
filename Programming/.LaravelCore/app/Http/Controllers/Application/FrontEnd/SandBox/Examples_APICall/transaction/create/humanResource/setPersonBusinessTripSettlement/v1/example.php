<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\humanResource             |
|                 \setPersonBusinessTripSettlement\v1                                                                              |
| ▪ API Key     : transaction.create.humanResource.setPersonBusinessTripSettlement                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\humanResource\setPersonBusinessTripSettlement\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.humanResource.setPersonBusinessTripSettlement.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/transaction.create.humanResource.setPersonBusinessTripSettlement.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000001                                                                                       |
        | ▪ Last Update     : 2026-03-10                                                                                           |
        | ▪ Creation Date   : 2026-03-10                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.create.humanResource.setPersonBusinessTripSettlement',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'entities' => [
                            'documentDateTimeTZ' => '2026-03-09',
                            'log_FileUpload_Pointer_RefID' => null,
                            'remarks' => 'Catatan',
                            'additionalData' => [
                                'itemList' => [
                                    'items' => [
                                            [
                                            'entities' => [
                                                'personBusinessTripSequenceDetail_RefID' => 80000000000166,
                                                'businessTripCostComponentEntity_RefID' => 81000000000001,
                                                'amountCurrency_RefID' => 62000000000001,
                                                'amountCurrencyValue' => 30000,
                                                'amountCurrencyExchangeRate' => 1
                                                ]
                                            ],
                                            [
                                            'entities' => [
                                                'personBusinessTripSequenceDetail_RefID' => 80000000000167,
                                                'businessTripCostComponentEntity_RefID' => 221000000000020,
                                                'amountCurrency_RefID' => 62000000000001,
                                                'amountCurrencyValue' => 40000,
                                                'amountCurrencyExchangeRate' => 1
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    //-----[ DATA ]---------(  END  )-----
                    );

            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.humanResource.setPersonBusinessTripSettlement.v1_throughAPIGatewayJQuery   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.humanResource.setPersonBusinessTripSettlement.v1_throughAPIGatewayJQuery        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-03-10                                                                                           |
        | ▪ Creation Date   : 2026-03-10                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            /*
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Detail Main Data</p></td></tr>';
            echo       '<tr><td>Advance_RefID</td><td><input type="text" id="dataInput_Advance_RefID" value=76000000000001></td></tr>';
            echo       '<tr><td>CombinedBudgetSectionDetail_RefID</td><td><input type="text" id="dataInput_CombinedBudgetSectionDetail_RefID" value=169000000000001></td></tr>';
            echo       '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000002></td></tr>';
            echo       '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=10></td></tr>';
            echo       '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001></td></tr>';
            echo       '<tr><td>ProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>ProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue" value=30000></td></tr>';
            echo       '<tr><td>ProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.humanResource.setPersonBusinessTripSettlement',
                'latest',
                '{'.
                    '"entities" : {'.
                        '"advance_RefID" : parseInt(document.getElementById("dataInput_Advance_RefID").value), '.
                        '"combinedBudgetSectionDetail_RefID" : parseInt(document.getElementById("dataInput_CombinedBudgetSectionDetail_RefID").value), '.
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
            */
            }
        }
    }
