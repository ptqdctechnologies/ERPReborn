<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setAdvance\v1     |
| ▪ API Key     : transaction.create.finance.setAdvance                                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setAdvance\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setAdvance.v1_throughAPIGateway                          |
        |                     ► http://172.28.0.4/transaction.create.finance.setAdvance.v1_throughAPIGateway                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-09                                                                                           |
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
                        'transaction.create.finance.setAdvance', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'entities' => [
                            "documentDateTimeTZ" => '2022-03-07',
                            "log_FileUpload_Pointer_RefID" => 91000000000001,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "beneficiaryWorkerJobsPosition_RefID" => 164000000000439,
                            "beneficiaryBankAccount_RefID" => 167000000000001,
                            "internalNotes" => 'My Internal Notes',
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                                "product_RefID" => 88000000000002,
                                                "quantity" => 10,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 30000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Pertama'                                    
                                                ]                                   
                                            ],
                                            [
                                            "entities" => [
                                                "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                                "product_RefID" => 88000000000003,
                                                "quantity" => 5,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 40000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Kedua'
                                                ]
                                            ],
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setAdvance.v1_throughAPIGatewayJQuery                    |
        |                     ► http://172.28.0.4/transaction.create.finance.setAdvance.v1_throughAPIGatewayJQuery                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-09                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Main Data</p></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-07"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=91000000000001></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>BeneficiaryWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_BeneficiaryWorkerJobsPosition_RefID" value=164000000000439></td></tr>';
            echo        '<tr><td>BeneficiaryBankAccount_RefID</td><td><input type="text" id="dataInput_BeneficiaryBankAccount_RefID" value=167000000000001></td></tr>';
            echo        '<tr><td>InternalNotes</td><td><input type="text" id="dataInput_InternalNotes" value="My Internal Notes"></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Detail Data</p></td></tr></tr>';
            echo        '<tr><td>CombinedBudgetSectionDetail_RefID_1</td><td><input type="text" id="dataInput_CombinedBudgetSectionDetail_RefID_1" value=169000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_1</td><td><input type="text" id="dataInput_Product_RefID_1" value=88000000000002></td></tr>';
            echo        '<tr><td>Quantity_1</td><td><input type="text" id="dataInput_Quantity_1" value=10></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_1</td><td><input type="text" id="dataInput_QuantityUnit_RefID_1" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>CombinedBudgetSectionDetail_RefID_2</td><td><input type="text" id="dataInput_CombinedBudgetSectionDetail_RefID_2" value=169000000000001></td></tr>';
            echo        '<tr><td>Product_RefID_2</td><td><input type="text" id="dataInput_Product_RefID_2" value=88000000000003></td></tr>';
            echo        '<tr><td>Quantity_2</td><td><input type="text" id="dataInput_Quantity_2" value=5></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID_2</td><td><input type="text" id="dataInput_QuantityUnit_RefID_2" value=73000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_2</td><td><input type="text" id="dataInput_ProductUnitPriceCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_2</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyValue_2" value=40000></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_ProductUnitPriceCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.finance.setAdvance', 
                        'latest', 
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                            '"beneficiaryWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_BeneficiaryWorkerJobsPosition_RefID").value), '.
                            '"beneficiaryBankAccount_RefID" : parseInt(document.getElementById("dataInput_BeneficiaryBankAccount_RefID").value), '.
                            '"internalNotes" : document.getElementById("dataInput_InternalNotes").value, '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"combinedBudgetSectionDetail_RefID" : parseInt(document.getElementById("dataInput_CombinedBudgetSectionDetail_RefID_1").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_1").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_1").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_1").value),'.
                                                '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID_1").value),'.
                                                '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue_1").value),'.
                                                '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate_1").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '}, '.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"combinedBudgetSectionDetail_RefID" : parseInt(document.getElementById("dataInput_CombinedBudgetSectionDetail_RefID_2").value), '.
                                                '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID_2").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_2").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_2").value),'.
                                                '"productUnitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_ProductUnitPriceCurrency_RefID_2").value),'.
                                                '"productUnitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyValue_2").value),'.
                                                '"productUnitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_ProductUnitPriceCurrencyExchangeRate_2").value),'.
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