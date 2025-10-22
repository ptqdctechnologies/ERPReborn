<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance                   |
|                 \setPaymentInstruction\v1                                                                                        |
| ▪ API Key     : transaction.create.finance.setPaymentInstruction                                                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setPaymentInstruction\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setPaymentInstruction.v1_throughAPIGateway               |
        |                     ► http://172.28.0.4/transaction.create.finance.setPaymentInstruction.v1_throughAPIGateway            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-20                                                                                           |
        | ▪ Creation Date   : 2025-01-13                                                                                           |
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
                        'transaction.create.finance.setPaymentInstruction',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'entities' => [
                            "documentDateTimeTZ" => '2025-10-09',
                            "log_FileUpload_Pointer_RefID" => NULL,
                            "currency_RefID" => 62000000000001,
                            "currencySymbol" => 'Rp',
                            "currencyValue" => 15080000.00,
                            "currencyExchangeRate" => 1.00,
                            "supplierInvoiceNumber" => 'INV-DHJ-2025-011',
                            "supplier_RefID" => 126000000000001,
                            "receiptStatus" => 0,
                            "contractStatus" => 1,
                            "vatStatus" => 1,
                            "vatValue" => 10.00,
                            "vatNumber" => '01.234.567.8-999.000',
                            "fatPatDoStatus" => 1,
                            "assetStatus" => 1,
                            "assetCategory" => 1,
                            "depreciationMethod" => 2,
                            "depreciationRate" => 25.00,
                            "depreciationCOA_RefID" => 65000000000005,
                            "deduction" => 0.0,
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            'entities' => [
                                                "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                                "chartOfAccount_RefID" => 65000000000005,
                                                "product_RefID" => 88000000000002,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "quantity" => 10,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 200000.00,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "wht" => 2.00,
                                                "purchaseOrderDetail_RefID" => 86000000000001
                                                ]
                                            ],
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            return $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setPaymentInstruction.v1_throughAPIGatewayJQuery         |
        |                     ► http://172.28.0.4/transaction.create.finance.setPaymentInstruction.v1_throughAPIGatewayJQuery      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-13                                                                                           |
        | ▪ Creation Date   : 2025-01-13                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Instruction Main Data</p></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-07"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=""></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Instruction Detail Data</p></td></tr></tr>';
            echo        '<tr><td>Underlying_RefID_1</td><td><input type="text" id="dataInput_Underlying_RefID_1" value=209000000000001></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID_1</td><td><input type="text" id="dataInput_AmountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue_1</td><td><input type="text" id="dataInput_AmountCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama Revisi"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>Underlying_RefID_2</td><td><input type="text" id="dataInput_Underlying_RefID_2" value=209000000000002></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID_2</td><td><input type="text" id="dataInput_AmountCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue_2</td><td><input type="text" id="dataInput_AmountCurrencyValue_2" value=30000></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua Revisi"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.create.finance.setPaymentInstruction',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"underlying_RefID" : parseInt(document.getElementById("dataInput_Underlying_RefID_1").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_1").value), '.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_1").value), '.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_1").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '}, '.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"underlying_RefID" : parseInt(document.getElementById("dataInput_Underlying_RefID_2").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_2").value), '.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_2").value), '.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_2").value),'.
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
