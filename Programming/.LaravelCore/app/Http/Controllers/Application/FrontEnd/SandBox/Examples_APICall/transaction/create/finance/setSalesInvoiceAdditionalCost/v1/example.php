<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance                   |
|                 \setSalesInvoiceAdditionalCost\v1                                                                                |
| ▪ API Key     : transaction.create.finance.setSalesInvoiceAdditionalCost                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setSalesInvoiceAdditionalCost\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setSalesInvoiceAdditionalCost.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/transaction.create.finance.setSalesInvoiceAdditionalCost.v1_throughAPIGateway    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
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
                        'transaction.create.finance.setSalesInvoiceAdditionalCost', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'entities' => [
                            "salesInvoice_RefID" => 138000000000001,
                            "transactionAdditionalCostType_RefID" => 190000000000001,
                            "priceCurrency_RefID" => 62000000000001,
                            "priceCurrencyValue" => 250,
                            "priceCurrencyExchangeRate" => 15000,
                            "remarks" => 'My Remarks'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.finance.setSalesInvoiceAdditionalCost.v1_throughAPIGatewayJQuery                  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.finance.setSalesInvoiceAdditionalCost.v1_throughAPIGatewayJQuery                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

/*            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Main Data</p></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=""></td></tr>';
            echo        '<tr><td>Supplier_RefID</td><td><input type="text" id="dataInput_Supplier_RefID" value=126000000000001></td></tr>';
            echo        '<tr><td>DocumentNumber</td><td><input type="text" id="dataInput_DocumentNumber" value="0025/INV/VDR-ABC/IX/2022"></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-09-13"></td></tr>';
            echo        '<tr><td>SalesOrderNumber</td><td><input type="text" id="dataInput_SalesOrderNumber" value="0031/SO/VDR-ABC/IX/2022"></td></tr>';
            echo        '<tr><td>PaymentDueDateTimeTZ</td><td><input type="text" id="dataInput_PaymentDueDateTimeTZ" value="2022-09-23"></td></tr>';
            echo        '<tr><td>PreferredPaymentMethod_RefID</td><td><input type="text" id="dataInput_PreferredPaymentMethod_RefID" value=175000000000001></td></tr>';
            echo        '<tr><td>PreferredBankAccount_RefID</td><td><input type="text" id="dataInput_PreferredBankAccount_RefID" value=167000000000001></td></tr>';
            echo        '<tr><td>ReceivedDateTimeTZ</td><td><input type="text" id="dataInput_ReceivedDateTimeTZ" value="2022-09-15"></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Detail Data</p></td></tr></tr>';
            echo        '<tr><td>PurchaseOrderDetail_RefID_1</td><td><input type="text" id="dataInput_PurchaseOrderDetail_RefID_1" value=86000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_1</td><td><input type="text" id="dataInput_Product_RefID_1" value=88000000000689></td></tr>';
            echo        '<tr><td>Quantity_1</td><td><input type="text" id="dataInput_Quantity_1" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_1</td><td><input type="text" id="dataInput_QuantityUnit_RefID_1" value=73000000000001></td></tr>';
            echo        '<tr><td>PriceCurrency_RefID_1</td><td><input type="text" id="dataInput_PriceCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>PriceCurrencyValue_1</td><td><input type="text" id="dataInput_PriceCurrencyValue_1" value=30000.00></td></tr>';
            echo        '<tr><td>PriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_PriceCurrencyExchangeRate_1" value=1.00></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>PurchaseOrderDetail_RefID_2</td><td><input type="text" id="dataInput_PurchaseOrderDetail_RefID_2" value=86000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_2</td><td><input type="text" id="dataInput_Product_RefID_2" value=88000000000689></td></tr>';
            echo        '<tr><td>Quantity_2</td><td><input type="text" id="dataInput_Quantity_2" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_2</td><td><input type="text" id="dataInput_QuantityUnit_RefID_2" value=73000000000001></td></tr>';
            echo        '<tr><td>PriceCurrency_RefID_2</td><td><input type="text" id="dataInput_PriceCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>PriceCurrencyValue_2</td><td><input type="text" id="dataInput_PriceCurrencyValue_2" value=30000.00></td></tr>';
            echo        '<tr><td>PriceCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_PriceCurrencyExchangeRate_2" value=1.00></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.finance.setSalesInvoiceAdditionalCost', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"supplier_RefID" : parseInt(document.getElementById("dataInput_Supplier_RefID").value), '.
                            '"documentNumber" : document.getElementById("dataInput_DocumentNumber").value, '.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"salesOrderNumber" : document.getElementById("dataInput_SalesOrderNumber").value, '.
                            '"paymentDueDateTimeTZ" : document.getElementById("dataInput_PaymentDueDateTimeTZ").value, '.
                            '"preferredPaymentMethod_RefID" : parseInt(document.getElementById("dataInput_PreferredPaymentMethod_RefID").value), '.
                            '"preferredBankAccount_RefID" : parseInt(document.getElementById("dataInput_PreferredBankAccount_RefID").value), '.
                            '"receivedDateTimeTZ" : document.getElementById("dataInput_ReceivedDateTimeTZ").value, '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"purchaseOrderDetail_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrderDetail_RefID_1").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_1").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_1").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_1").value), '.
                                                '"priceCurrency_RefID" : parseInt(document.getElementById("dataInput_PriceCurrency_RefID_1").value), '.
                                                '"priceCurrencyValue" : parseFloat(document.getElementById("dataInput_PriceCurrencyValue_1").value), '.
                                                '"priceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_PriceCurrencyExchangeRate_1").value), '.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '}, '.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"purchaseOrderDetail_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrderDetail_RefID_2").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_2").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_2").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_2").value), '.
                                                '"priceCurrency_RefID" : parseInt(document.getElementById("dataInput_PriceCurrency_RefID_2").value), '.
                                                '"priceCurrencyValue" : parseFloat(document.getElementById("dataInput_PriceCurrencyValue_2").value), '.
                                                '"priceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_PriceCurrencyExchangeRate_2").value), '.
                                                '"remarks" : document.getElementById("dataInput_Remarks_2").value'.
                                                '}'.
                                            '}'.
                                        ']'.
                                    '}'.
                                '}'.
                            '}'.
                        '}'
                    //-----[ DATA ]-----(  END  )-----
                    );

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);*/
            }
        }
    }