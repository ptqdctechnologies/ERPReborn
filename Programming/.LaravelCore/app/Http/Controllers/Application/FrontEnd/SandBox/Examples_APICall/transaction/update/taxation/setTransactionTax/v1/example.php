<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation                  |
|                 \setTransactionTax\v1                                                                                            |
| ▪ API Key     : transaction.update.taxation.setTransactionTax                                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
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
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.update.taxation.setTransactionTax', 
                'latest', 
                [
                'recordID' => 184000000000001,
                'entities' => [
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
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTransactionTax.v1_throughAPIGatewayJQuery            |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTransactionTax.v1_throughAPIGatewayJQuery         |
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
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=184000000000001>';
            echo '<hr>';
            echo '<input type="text" id="dataInput_Dtl1_RecordID" value=185000000000001>';
            echo '<input type="text" id="dataInput_Dtl1_TaxType_RefID" value=182000000000001>';
            echo '<input type="text" id="dataInput_Dtl1_Tarif_Currency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_Dtl1_Tarif_CurrencyValue" value=30000>';
            echo '<input type="text" id="dataInput_Dtl1_Tarif_CurrencyExchangeRate" value=1>';
            echo '<input type="text" id="dataInput_Dtl1_Remarks" value="Catatan 1 Update">';
            echo '<hr>';
            echo '<input type="text" id="dataInput_Dtl2_RecordID" value=185000000000002>';
            echo '<input type="text" id="dataInput_Dtl2_TaxType_RefID" value=182000000000002>';
            echo '<input type="text" id="dataInput_Dtl2_Tarif_Currency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_Dtl2_Tarif_CurrencyValue" value=30000>';
            echo '<input type="text" id="dataInput_Dtl2_Tarif_CurrencyExchangeRate" value=1>';
            echo '<input type="text" id="dataInput_Dtl2_Remarks" value="Catatan 2 Update">';
            echo '<hr>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.taxation.setTransactionTax', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities": {'.
                        '"additionalData": ['.
                            '{'.
                            '"recordID": parseInt(document.getElementById("dataInput_Dtl1_RecordID").value), '.
                            '"entities": {'.
                                '"taxType_RefID": parseInt(document.getElementById("dataInput_Dtl1_TaxType_RefID").value), '.
                                '"tariffCurrency_RefID": parseInt(document.getElementById("dataInput_Dtl1_Tarif_Currency_RefID").value), '.
                                '"tariffCurrencyValue": parseFloat(document.getElementById("dataInput_Dtl1_Tarif_CurrencyValue").value), '.
                                '"tariffCurrencyExchangeRate": parseFloat(document.getElementById("dataInput_Dtl1_Tarif_CurrencyExchangeRate").value), '.
                                '"remarks": document.getElementById("dataInput_Dtl1_Remarks").value'.
                                '}'.
                            '}, '.
                            '{'.
                            '"recordID": parseInt(document.getElementById("dataInput_Dtl2_RecordID").value), '.
                            '"entities": {'.
                                '"taxType_RefID": parseInt(document.getElementById("dataInput_Dtl2_TaxType_RefID").value), '.
                                '"tariffCurrency_RefID": parseInt(document.getElementById("dataInput_Dtl2_Tarif_Currency_RefID").value), '.
                                '"tariffCurrencyValue": parseFloat(document.getElementById("dataInput_Dtl2_Tarif_CurrencyValue").value), '.
                                '"tariffCurrencyExchangeRate": parseFloat(document.getElementById("dataInput_Dtl2_Tarif_CurrencyExchangeRate").value), '.
                                '"remarks": document.getElementById("dataInput_Dtl2_Remarks").value'.
                                '}'.
                            '} '.
                            ']'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }