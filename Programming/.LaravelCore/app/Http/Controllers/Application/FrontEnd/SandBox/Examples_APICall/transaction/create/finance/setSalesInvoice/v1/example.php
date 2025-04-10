<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setSalesInvoice   |
|                 \v1                                                                                                              |
| ▪ API Key     : transaction.create.finance.setSalesInvoice                                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 22025 Zheta (teguhpjs@gmail.com)                                                                             |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setSalesInvoice\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setSalesInvoice.v1_throughAPIGateway                     |
        |                     ► http://172.28.0.4/transaction.create.finance.setSalesInvoice.v1_throughAPIGateway                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-23                                                                                           |
        | ▪ Creation Date   : 2023-11-22                                                                                           |
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
                        'transaction.create.finance.setSalesInvoice', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        "entities" => [
                            "documentDateTimeTZ" => '2022-03-07',
                            "log_FileUpload_Pointer_RefID" => NULL,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "amountRoundOff" => 0.00,
                            "termAndConditions" => 'My Term & Condition',
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "salesInvoiceRequestDetail_RefID" => 245000000000001,
                                                "product_RefID" => 88000000000002,
                                                "quantity" => 10,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 30000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                                                "productUnitPriceDiscountCurrencyValue" => 5000,
                                                "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan',
                                                "additionalData" => [
                                                    "transactionTaxItemList" => [
                                                        "items" => [
                                                                [
                                                                "entities" => [
                                                                    "taxType_RefID" => 182000000000001,
                                                                    "tariffCurrency_RefID" => 62000000000001,
                                                                    "tariffCurrencyValue" => 3000,
                                                                    "tariffCurrencyExchangeRate" => 1,
                                                                    "remarks" => null
                                                                    ]
                                                                ],
                                                                [
                                                                "entities" => [
                                                                    "taxType_RefID" => 182000000000005,
                                                                    "tariffCurrency_RefID" => 62000000000001,
                                                                    "tariffCurrencyValue" => 4000,
                                                                    "tariffCurrencyExchangeRate" => 1,
                                                                    "remarks" => null
                                                                    ]
                                                                ]
                                                            ]
                                                         ]
                                                     ]
                                                 ]
                                            ]
                                        ]
                                    ],
                                "transactionTaxItemList" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "taxType_RefID" => 182000000000005,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 4000,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => null
                                                ]
                                            ]
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setSalesInvoice.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/transaction.create.finance.setSalesInvoice.v1_throughAPIGatewayJQuery            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-23                                                                                           |
        | ▪ Creation Date   : 2023-11-22                                                                                           |
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
/*
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Sales Invoice Main Data</p></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-07"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=91000000000001></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>AmountRoundOff</td><td><input type="text" id="dataInput_AmountRoundOff" value=0.00></td></tr>';
            echo        '<tr><td>TermAndConditions</td><td><input type="text" id="dataInput_TermAndConditions" value="My Term & Condition"></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Sales Invoice Detail Data</p></td></tr></tr>';
            echo        '<tr><td>SalesInvoiceRequestDetail_RefID_1</td><td><input type="text" id="dataInput_SalesInvoiceRequestDetail_RefID_1" value=245000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_1</td><td><input type="text" id="dataInput_Product_RefID_1" value=88000000000002></td></tr>';
            echo        '<tr><td>Quantity_1</td><td><input type="text" id="dataInput_Quantity_1" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_1</td><td><input type="text" id="dataInput_QuantityUnit_RefID_1" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrency_RefID_1</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyValue_1</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyValue_1" value=5000></td></tr>';
            echo        '<tr><td>ProductUnitPriceDiscountCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ProductUnitPriceDiscountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Transaction Tax of Main Data</p></td></tr></tr>';
            echo        '<tr><td>TaxType_RefID_01</td><td><input type="text" id="dataInput_TaxType_RefID_01" value=182000000000001></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_01</td><td><input type="text" id="dataInput_TariffCurrency_RefID_01" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_01</td><td><input type="text" id="dataInput_TariffCurrencyValue_01" value=30000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_01</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_01" value=1></td></tr>';
            echo        '<tr><td>Remarks_01</td><td><input type="text" id="dataInput_Remarks_01" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Transaction Tax of Detail Data</p></td></tr></tr>';
            echo        '<tr><td>TaxType_RefID_11</td><td><input type="text" id="dataInput_TaxType_RefID_11" value=182000000000001></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_11</td><td><input type="text" id="dataInput_TariffCurrency_RefID_11" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_11</td><td><input type="text" id="dataInput_TariffCurrencyValue_11" value=30000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_11</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_11" value=1></td></tr>';
            echo        '<tr><td>Remarks_11</td><td><input type="text" id="dataInput_Remarks_11" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>TaxType_RefID_12</td><td><input type="text" id="dataInput_TaxType_RefID_12" value=182000000000005></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_12</td><td><input type="text" id="dataInput_TariffCurrency_RefID_12" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_12</td><td><input type="text" id="dataInput_TariffCurrencyValue_12" value=40000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_12</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_12" value=1></td></tr>';
            echo        '<tr><td>Remarks_12</td><td><input type="text" id="dataInput_Remarks_12" value="Catatan Kedua"></td></tr>';
            echo '</table><br>';

             $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.finance.setSalesInvoice', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                            '"amountRoundOff" : parseFloat(document.getElementById("dataInput_AmountRoundOff").value), '.
                            '"termAndConditions" : document.getElementById("dataInput_TermAndConditions").value, '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : {'.
                                                '"salesInvoiceRequestDetail_RefID" : parseInt(document.getElementById("dataInput_SalesInvoiceRequestDetail_RefID_1").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_1").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_1").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_1").value), '.
                                                '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID_1").value), '.
                                                '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue_1").value), '.
                                                '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate_1").value), '.
                                                '"productUnitPriceDiscountCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceDiscountCurrency_RefID_1").value), '.
                                                '"productUnitPriceDiscountCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyValue_1").value), '.
                                                '"productUnitPriceDiscountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceDiscountCurrencyExchangeRate_1").value), '.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value, '.
                                                '"additionalData" : {'.
                                                    '"transactionTaxItemList" : {'.
                                                        '"items" : ['.
                                                                '{'.
                                                                '"entities" : {'.
                                                                    '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_11").value), '.
                                                                    '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_11").value), '.
                                                                    '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_11").value), '.
                                                                    '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_11").value), '.
                                                                    '"remarks" : document.getElementById("dataInput_Remarks_11").value'.
                                                                    '}'.
                                                                '},'.
                                                                '{'.
                                                                '"entities" : {'.
                                                                    '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_12").value), '.
                                                                    '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_12").value), '.
                                                                    '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_12").value), '.
                                                                    '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_12").value), '.
                                                                    '"remarks" : document.getElementById("dataInput_Remarks_12").value'.
                                                                    '}'.
                                                                '}'.
                                                            ']'.
                                                        '}'.
                                                    '}'.
                                                '}'.
                                            '}'.
                                        ']'.
                                    '}, '.
                                '"transactionTaxItemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : {'.
                                                '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_01").value), '.
                                                '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_01").value), '.
                                                '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_01").value), '.
                                                '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_01").value), '.
                                                '"remarks" : document.getElementById("dataInput_Remarks_01").value'.
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
 */
            }
        }
    }