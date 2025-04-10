<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setSalesInvoiceRequisition\v1                                                                                   |
| ▪ API Key     : transaction.update.finance.setSalesInvoiceRequisition                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setSalesInvoiceRequisition\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setSalesInvoiceRequisition.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.update.finance.setSalesInvoiceRequisition.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-12-12                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
                        'transaction.update.finance.setSalesInvoiceRequisition', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        "recordID" => 244000000000001,
                        "entities" => [
                            "documentDateTimeTZ" => '2022-03-07',
                            "log_FileUpload_Pointer_RefID" => 91000000000001,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "recordID" => 245000000000001,
                                            "entities" => [
                                                "salesOrderDetail_RefID" => 130000000000001,
                                                "product_RefID" => 88000000000002,
                                                "quantity" => 10,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 30000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                                                "productUnitPriceDiscountCurrencyValue" => 5000,
                                                "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Pertama Revisi'                                    
                                                ]                                   
                                            ],
                                            [
                                            "recordID" => 245000000000002,
                                            "entities" => [
                                                "salesOrderDetail_RefID" => 130000000000002,
                                                "product_RefID" => 88000000000003,
                                                "quantity" => 5,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 40000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                                                "productUnitPriceDiscountCurrencyValue" => 2000,
                                                "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Kedua Revisi'
                                                ]
                                            ],
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setSalesInvoiceRequisition.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/transaction.update.finance.setSalesInvoiceRequisition.v1_throughAPIGatewayJQuery |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-12-12                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Sales Invoice Requisition Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=244000000000001></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-07"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=91000000000001></td></tr>';
            echo        '<tr><td>RequisitionerWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequisitionerWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Detail Data</p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_1</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_1" value=245000000000001></td></tr>';
            echo        '<tr><td>SalesOrderDetail_RefID_1</td><td><input type="text" id="dataInput_SalesOrderDetail_RefID_1" value=130000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_1</td><td><input type="text" id="dataInput_Product_RefID_1" value=88000000000002></td></tr>';
            echo        '<tr><td>Quantity_1</td><td><input type="text" id="dataInput_Quantity_1" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_1</td><td><input type="text" id="dataInput_QuantityUnit_RefID_1" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrency_RefID_1</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyValue_1</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyValue_1" value=5000></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama Revisi"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_2</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_2" value=245000000000002></td></tr>';
            echo        '<tr><td>SalesOrderDetail_RefID_2</td><td><input type="text" id="dataInput_SalesOrderDetail_RefID_2" value=130000000000002></td></tr>';
            echo        '<tr><td>Product_RefID_2</td><td><input type="text" id="dataInput_Product_RefID_2" value=88000000000003></td></tr>';
            echo        '<tr><td>Quantity_2</td><td><input type="text" id="dataInput_Quantity_2" value=5></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_2</td><td><input type="text" id="dataInput_QuantityUnit_RefID_2" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_2</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_2</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue_2" value=40000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrency_RefID_2</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyValue_2</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyValue_2" value=2000></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua Revisi"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setSalesInvoiceRequisition',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequisitionerWorkerJobsPosition_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_1").value), '.
                                            '"entities" : '.
                                                '{'.
                                                '"salesOrderDetail_RefID" : parseInt(document.getElementById("dataInput_SalesOrderDetail_RefID_1").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_1").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_1").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_1").value),'.
                                                '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID_1").value),'.
                                                '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue_1").value),'.
                                                '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate_1").value),'.
                                                '"productUnitPriceDiscountCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceDiscountCurrency_RefID_1").value),'.
                                                '"productUnitPriceDiscountCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyValue_1").value),'.
                                                '"productUnitPriceDiscountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyExchangeRate_1").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '}, '.
                                            '{'.
                                            '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_2").value), '.
                                            '"entities" : '.
                                                '{'.
                                                '"salesOrderDetail_RefID" : parseInt(document.getElementById("dataInput_SalesOrderDetail_RefID_2").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_2").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_2").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_2").value),'.
                                                '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID_2").value),'.
                                                '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue_2").value),'.
                                                '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate_2").value),'.
                                                '"productUnitPriceDiscountCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceDiscountCurrency_RefID_2").value),'.
                                                '"productUnitPriceDiscountCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyValue_2").value),'.
                                                '"productUnitPriceDiscountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyExchangeRate_2").value),'.
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

            dd($varJQueryFunction);
            }
        }
    }