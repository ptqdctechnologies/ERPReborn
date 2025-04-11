<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setSalesInvoiceRequisitionDetail\v1                                                                             |
| ▪ API Key     : transaction.update.finance.setSalesInvoiceRequisitionDetail                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setSalesInvoiceRequisitionDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setSalesInvoiceRequisitionDetail.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/transaction.update.finance.setSalesInvoiceRequisitionDetail.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-23                                                                                           |
        | ▪ Creation Date   : 2023-11-13                                                                                           |
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
                        'transaction.update.finance.setSalesInvoiceRequisitionDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 245000000000001,
                        'entities' => [
                            'salesInvoiceRequisition_RefID' => 244000000000001,
                            'salesOrderDetail_RefID' => 130000000000001,
                            'product_RefID' => 88000000000002,
                            'quantity' => 10,
                            'quantityUnit_RefID' => 73000000000001,
                            'productUnitPriceCurrency_RefID' => 62000000000001,
                            'productUnitPriceCurrencyValue' => 30000,
                            'productUnitPriceCurrencyExchangeRate' => 1,
                            'productUnitPriceDiscountCurrency_RefID' => 62000000000001,
                            'productUnitPriceDiscountCurrencyValue' => 5000,
                            'productUnitPriceDiscountCurrencyExchangeRate' => 1,
                            'remarks' => 'Catatan'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.finance.setSalesInvoiceRequisitionDetail.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.finance.setSalesInvoiceRequisitionDetail.v1_throughAPIGatewayJQuery             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-23                                                                                           |
        | ▪ Creation Date   : 2023-11-13                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Sales Invoice Requisition Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=245000000000001></td></tr>';
            echo        '<tr><td>SalesInvoiceRequisition_RefID</td><td><input type="text" id="dataInput_SalesInvoiceRequisition_RefID" value=244000000000001></td></tr>';
            echo        '<tr><td>SalesOrderDetail_RefID</td><td><input type="text" id="dataInput_SalesOrderDetail_RefID" value=130000000000001></td></tr>';
            echo        '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000002></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue" value=30000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrency_RefID</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyValue</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyValue" value=5000></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyExchangeRate</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setSalesInvoiceRequisitionDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"salesInvoiceRequisition_RefID" : parseInt(document.getElementById("dataInput_SalesInvoiceRequisition_RefID").value), '.
                            '"salesOrderDetail_RefID" : parseInt(document.getElementById("dataInput_SalesOrderDetail_RefID").value), '.
                            '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                            '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                            '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                            '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID").value), '.
                            '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue").value), '.
                            '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate").value), '.
                            '"productUnitPriceDiscountCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceDiscountCurrency_RefID").value), '.
                            '"productUnitPriceDiscountCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyValue").value), '.
                            '"productUnitPriceDiscountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyExchangeRate").value), '.
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