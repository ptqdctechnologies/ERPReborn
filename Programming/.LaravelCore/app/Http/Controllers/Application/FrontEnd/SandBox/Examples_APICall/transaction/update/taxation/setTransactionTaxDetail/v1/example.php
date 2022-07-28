<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation                  |
|                 \setTransactionTaxDetail\v1                                                                                      |
| ▪ API Key     : transaction.update.taxation.setTransactionTaxDetail                                                              |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\taxation\setTransactionTaxDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTransactionTaxDetail.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTransactionTaxDetail.v1_throughAPIGateway         |
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
                'transaction.update.taxation.setTransactionTaxDetail', 
                'latest', 
                [
                "recordID" => 185000000000001,
                'entities' => [
                    "transactionTax_RefID" => 184000000000001,
                    "taxType_RefID" => 182000000000001,
                    "tariffCurrency_RefID" => 62000000000001,
                    "tariffCurrencyValue" => 30000,
                    "tariffCurrencyExchangeRate" => 1,
                    "remarks" => 'My Annotation'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.taxation.setTransactionTaxDetail.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/transaction.update.taxation.setTransactionTaxDetail.v1_throughAPIGatewayJQuery   |
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
            echo '<input type="text" id="dataInput_RecordID" value=185000000000001>';
            echo '<input type="text" id="dataInput_TransactionTax_RefID" value=184000000000001>';
            echo '<input type="text" id="dataInput_TaxType_RefID" value=182000000000001>';
            echo '<input type="text" id="dataInput_Tariff_Currency_RefID" value=62000000000001>';
            echo '<input type="text" id="dataInput_Tariff_CurrencyValue" value=30000>';
            echo '<input type="text" id="dataInput_Tariff_CurrencyExchangeRate" value=1>';
            echo '<input type="text" id="dataInput_Remarks" value="My Annotation">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.taxation.setTransactionTaxDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"transactionTax_RefID" : parseInt(document.getElementById("dataInput_TransactionTax_RefID").value), '.
                        '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID").value), '.
                        '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_Tariff_Currency_RefID").value), '.
                        '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_Tariff_CurrencyValue").value), '.
                        '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_Tariff_CurrencyExchangeRate").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }