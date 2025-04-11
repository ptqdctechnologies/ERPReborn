<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation                  |
|                 \setTransactionTax\v1                                                                                            |
| ▪ API Key     : transaction.update.taxation.setTransactionTax                                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation\setTransactionTax\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTransactionTax.v1_throughAPIGateway                  |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTransactionTax.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
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
                        'transaction.update.taxation.setTransactionTax', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 184000000000001,
                        'entities' => [
                            "taxBaseCurrency_RefID" => 62000000000001,
                            "taxBaseCurrencyValue" => 30000,
                            "taxBaseCurrencyExchangeRate" => 1,
                            "remarks" => 'Catatan 1',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "recordID" => 185000000000001,
                                            "entities" => [
                                                "taxType_RefID" => 182000000000001,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 30000,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan 1'                                
                                                ]
                                            ],
                                            [
                                            "recordID" => 185000000000002,
                                            "entities" => [
                                                "taxType_RefID" => 182000000000002,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 30000,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan 2'
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTransactionTax.v1_throughAPIGatewayJQuery            |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTransactionTax.v1_throughAPIGatewayJQuery         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
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

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Transaction Tax Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=184000000000001></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Transaction Tax Detail Data</p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_1</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_1" value=185000000000001></td></tr>';
            echo        '<tr><td>TaxType_RefID_1</td><td><input type="text" id="dataInput_TaxType_RefID_1" value=182000000000001></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_1</td><td><input type="text" id="dataInput_TariffCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_1</td><td><input type="text" id="dataInput_TariffCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama Update"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_2</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_2" value=185000000000002></td></tr>';
            echo        '<tr><td>TaxType_RefID_2</td><td><input type="text" id="dataInput_TaxType_RefID_2" value=182000000000002></td></tr>';
            echo        '<tr><td>TariffCurrency_RefID_2</td><td><input type="text" id="dataInput_TariffCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>TariffCurrencyValue_2</td><td><input type="text" id="dataInput_TariffCurrencyValue_2" value=40000></td></tr>';
            echo        '<tr><td>TariffCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua Update"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.taxation.setTransactionTax', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                            '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                            '"entities" : {'.
                                '"additionalData" : {'.
                                    '"itemList" : {'.
                                        '"items" : ['.
                                                '{'.
                                                '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_1").value), '.
                                                '"entities" : '.
                                                    '{'.
                                                    '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_1").value), '.
                                                    '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_1").value),'.
                                                    '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_1").value),'.
                                                    '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_1").value),'.
                                                    '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                    '}'.
                                                '}, '.
                                                '{'.
                                                '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_2").value), '.
                                                '"entities" : '.
                                                    '{'.
                                                    '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID_2").value), '.
                                                    '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID_2").value),'.
                                                    '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue_2").value),'.
                                                    '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate_2").value),'.
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