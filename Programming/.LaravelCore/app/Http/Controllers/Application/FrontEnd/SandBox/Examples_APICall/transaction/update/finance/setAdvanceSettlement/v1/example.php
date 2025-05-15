<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setAdvanceSettlement\v1                                                                                         |
| ▪ API Key     : transaction.update.finance.setAdvanceSettlement                                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setAdvanceSettlement\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvanceSettlement.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvanceSettlement.v1_throughAPIGateway             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-05-15                                                                                           |
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
                        'transaction.update.finance.setAdvanceSettlement',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 203000000000001,
                        'entities' => [
                            'documentDateTimeTZ' => '2023-10-25',
                            'log_FileUpload_Pointer_RefID' => null,
                            'requesterWorkerJobsPosition_RefID' => 164000000000497,
                            'remarks' => 'important message 2',
                            'additionalData' => [
                                'itemList' => [
                                    'items' => [
                                            [
                                            'recordID' => 204000000000001,
                                            'entities' => [
                                                "expenseQuantity" => 0.12,
                                                "expenseProductUnitPriceCurrency_RefID" => 62000000000001,
                                                "expenseProductUnitPriceCurrencyValue" => 235000.00,
                                                "expenseProductUnitPriceCurrencyExchangeRate" => 1.00,
                                                "expenseProductUnitPriceBaseCurrencyValue" => 235000.00,
                                                "refundQuantity" => 0.00,
                                                "refundProductUnitPriceCurrency_RefID" => 62000000000001,
                                                "refundProductUnitPriceCurrencyValue" => 0.00,
                                                "refundProductUnitPriceCurrencyExchangeRate" => 1.00,
                                                "refundProductUnitPriceBaseCurrencyValue" => 0.00,
                                                "remarks" => 'Catatan Pertama'
                                                ]
                                            ],
                                            [
                                            'recordID' => 204000000000002,
                                            'entities' => [
                                                "expenseQuantity" => 0.12,
                                                "expenseProductUnitPriceCurrency_RefID" => 62000000000001,
                                                "expenseProductUnitPriceCurrencyValue" => 235000.00,
                                                "expenseProductUnitPriceCurrencyExchangeRate" => 1.00,
                                                "expenseProductUnitPriceBaseCurrencyValue" => 235000.00,
                                                "refundQuantity" => 0.00,
                                                "refundProductUnitPriceCurrency_RefID" => 62000000000001,
                                                "refundProductUnitPriceCurrencyValue" => 0.00,
                                                "refundProductUnitPriceCurrencyExchangeRate" => 1.00,
                                                "refundProductUnitPriceBaseCurrencyValue" => 0.00,
                                                "remarks" => 'Catatan Pertama'
                                                ]
                                            ]
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvanceSettlement.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvanceSettlement.v1_throughAPIGatewayJQuery       |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Settlement Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=203000000000001></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2023-03-25"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Settlement Detail Data</p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_1</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_1" value=204000000000001></td></tr>';
            echo        '<tr><td>AdvancePaymentDetail_RefID_1</td><td><input type="text" id="dataInput_AdvancePaymentDetail_RefID_1" value=195000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_1</td><td><input type="text" id="dataInput_Product_RefID_1" value=88000000000083></td></tr>';
            echo        '<tr><td>Quantity_1</td><td><input type="text" id="dataInput_Quantity_1" value=0.20></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_1</td><td><input type="text" id="dataInput_QuantityUnit_RefID_1" value=73000000000009></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrency_RefID_1</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrencyValue_1</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrencyValue_1" value=235000.00></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrency_RefID_1</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrencyValue_1</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrencyValue_1" value=1000.00></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama Revisi"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_2</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_2" value=204000000000002></td></tr>';
            echo        '<tr><td>AdvancePaymentDetail_RefID_2</td><td><input type="text" id="dataInput_AdvancePaymentDetail_RefID_2" value=195000000000002></td></tr>';
            echo        '<tr><td>Product_RefID_2</td><td><input type="text" id="dataInput_Product_RefID_2" value=88000000000084></td></tr>';
            echo        '<tr><td>Quantity_2</td><td><input type="text" id="dataInput_Quantity_2" value=0.12></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_2</td><td><input type="text" id="dataInput_QuantityUnit_RefID_2" value=73000000000009></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrency_RefID_2</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrencyValue_2</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrencyValue_2" value=235000.00></td></tr>';
            echo        '<tr><td>ExpenseClaimProductUnitPriceCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_ExpenseClaimProductUnitPriceCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrency_RefID_2</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrencyValue_2</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrencyValue_2" value=1000.00></td></tr>';
            echo        '<tr><td>ReturnProductUnitPriceCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_ReturnProductUnitPriceCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua Revisi"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.update.finance.setAdvanceSettlement',
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_1").value), '.
                                            '"entities" : '.
                                                '{'.
                                                '"advancePaymentDetail_RefID" : parseInt(document.getElementById("dataInput_AdvancePaymentDetail_RefID_1").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_1").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_1").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_1").value),'.
                                                '"expenseClaimProductUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrency_RefID_1").value),'.
                                                '"expenseClaimProductUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrencyValue_1").value),'.
                                                '"expenseClaimProductUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrencyExchangeRate_1").value),'.
                                                '"returnProductUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ReturnProductUnitPriceCurrency_RefID_1").value),'.
                                                '"returnProductUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ReturnProductUnitPriceCurrencyValue_1").value),'.
                                                '"returnProductUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ReturnProductUnitPriceCurrencyExchangeRate_1").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '}, '.
                                            '{'.
                                            '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_2").value), '.
                                            '"entities" : '.
                                                '{'.
                                                '"advancePaymentDetail_RefID" : parseInt(document.getElementById("dataInput_AdvancePaymentDetail_RefID_2").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_2").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_2").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_2").value),'.
                                                '"expenseClaimProductUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrency_RefID_2").value),'.
                                                '"expenseClaimProductUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrencyValue_2").value),'.
                                                '"expenseClaimProductUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ExpenseClaimProductUnitPriceCurrencyExchangeRate_2").value),'.
                                                '"returnProductUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ReturnProductUnitPriceCurrency_RefID_2").value),'.
                                                '"returnProductUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ReturnProductUnitPriceCurrencyValue_2").value),'.
                                                '"returnProductUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ReturnProductUnitPriceCurrencyExchangeRate_2").value),'.
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
