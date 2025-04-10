<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setPurchaseInvoiceBillingPurpose\v1                                                                             |
| ▪ API Key     : transaction.update.finance.setPurchaseInvoiceBillingPurpose                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setPurchaseInvoiceBillingPurpose\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setPurchaseInvoiceBillingPurpose.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/transaction.update.finance.setPurchaseInvoiceBillingPurpose.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-22                                                                                           |
        | ▪ Creation Date   : 2022-10-17                                                                                           |
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
                        'transaction.update.finance.setPurchaseInvoiceBillingPurpose', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 189000000000001,
                        'entities' => [
                            "institutionBranch_RefID" => 124000000000001,
                            "phone" => '+62 21 79191234',
                            "faximile" => '+62 21 79193333',
                            "EMail" => 'billing@qdc.co.id',
                            "attentionName" => 'Finance Department'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.finance.setPurchaseInvoiceBillingPurpose.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.finance.setPurchaseInvoiceBillingPurpose.v1_throughAPIGatewayJQuery             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-22                                                                                           |
        | ▪ Creation Date   : 2022-10-17                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            /*
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Invoice Supplier Main Data</p></td></tr>';
            echo    '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=209000000000001></td></tr>';
            echo    '<tr><td>InvoiceSupplier_RefID</td><td><input type="text" id="dataInput_InvoiceSupplier_RefID" value=208000000000001></td></tr>';
            echo    '<tr><td>PurchaseOrderDetail_RefID</td><td><input type="text" id="dataInput_PurchaseOrderDetail_RefID" value=86000000000001></td></tr>';
            echo    '<tr><td>Product_RefID</td><td><input type="text" id="dataInput_Product_RefID" value=88000000000689></td></tr>';
            echo    '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value=10></td></tr>';
            echo    '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001></td></tr>';
            echo    '<tr><td>PriceCurrency_RefID</td><td><input type="text" id="dataInput_PriceCurrency_RefID" value=62000000000001></td></tr>';
            echo    '<tr><td>PriceCurrencyValue</td><td><input type="text" id="dataInput_PriceCurrencyValue" value=30000.00></td></tr>';
            echo    '<tr><td>PriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_PriceCurrencyExchangeRate" value=1.00></td></tr>';
            echo    '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setInvoiceSupplierDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"invoiceSupplier_RefID" : parseInt(document.getElementById("dataInput_InvoiceSupplier_RefID").value), '.
                            '"purchaseOrderDetail_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrderDetail_RefID").value), '.
                            '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                            '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                            '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                            '"priceCurrency_RefID" : parseInt(document.getElementById("dataInput_PriceCurrency_RefID").value), '.
                            '"priceCurrencyValue" : parseFloat(document.getElementById("dataInput_PriceCurrencyValue").value), '.
                            '"priceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_PriceCurrencyExchangeRate").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value'.
                            '}'.
                        '}'
                    //-----[ DATA ]-----(  END  )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            */
            }
        }
    }