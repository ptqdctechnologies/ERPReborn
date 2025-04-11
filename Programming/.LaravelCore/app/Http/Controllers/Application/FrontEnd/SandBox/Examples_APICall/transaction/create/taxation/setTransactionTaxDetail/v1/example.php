<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\taxation                  |
|                 \setTransactionTaxDetail\v1                                                                                      |
| ▪ API Key     : transaction.create.taxation.setTransactionTaxDetail                                                              |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\taxation\setTransactionTaxDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.taxation.setTransactionTaxDetail.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/transaction.create.taxation.setTransactionTaxDetail.v1_throughAPIGateway         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2023-11-21                                                                                           |
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
                        'transaction.create.taxation.setTransactionTaxDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'entities' => [
                            "transactionTax_RefID" => 184000000000001,
                            "taxType_RefID" => 182000000000001,                    
                            "tariffCurrency_RefID" => 62000000000001,
                            "tariffCurrencyValue" => 30000,
                            "tariffCurrencyExchangeRate" => 1,
                            "remarks" => 'Catatan'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.taxation.setTransactionTaxDetail.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/transaction.create.taxation.setTransactionTaxDetail.v1_throughAPIGatewayJQuery   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2023-11-21                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Transaction Tax Detail Main Data</p></td></tr>';
            echo       '<tr><td>TransactionTax_RefID</td><td><input type="text" id="dataInput_TransactionTax_RefID" value=184000000000001></td></tr>';
            echo       '<tr><td>TaxType_RefID</td><td><input type="text" id="dataInput_TaxType_RefID" value=182000000000001></td></tr>';
            echo       '<tr><td>TariffCurrency_RefID</td><td><input type="text" id="dataInput_TariffCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>TariffCurrencyValue</td><td><input type="text" id="dataInput_TariffCurrencyValue" value=30000></td></tr>';
            echo       '<tr><td>TariffCurrencyExchangeRate</td><td><input type="text" id="dataInput_TariffCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.taxation.setTransactionTaxDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                            '"entities" : {'.
                                '"transactionTax_RefID" : parseInt(document.getElementById("dataInput_TransactionTax_RefID").value), '.
                                '"taxType_RefID" : parseInt(document.getElementById("dataInput_TaxType_RefID").value), '.
                                '"tariffCurrency_RefID" : parseInt(document.getElementById("dataInput_TariffCurrency_RefID").value), '.
                                '"tariffCurrencyValue" : parseFloat(document.getElementById("dataInput_TariffCurrencyValue").value), '.
                                '"tariffCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_TariffCurrencyExchangeRate").value), '.
                                '"remarks" : document.getElementById("dataInput_Remarks").value'.
                                '}'.
                        '}'
                    //-----[ DATA ]-----(  END  )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }