<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setAdvancePaymentDetail\v1                                                                                      |
| ▪ API Key     : transaction.create.finance.setAdvancePaymentDetail                                                               |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setAdvancePaymentDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvancePaymentDetail.v1_throughAPIGateway             |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvancePaymentDetail.v1_throughAPIGateway          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2023-10-25                                                                                           |
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
                        'transaction.update.finance.setAdvancePaymentDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 195000000000001,
                        'entities' => [
                            "advancePayment_RefID" => 194000000000001,
                            "advanceDetail_RefID" => 82000000000001,
                            "amountCurrency_RefID" => 62000000000001,
                            "amountCurrencyValue" => 30000,
                            "amountCurrencyExchangeRate" => 1,
                            "remarks" => 'Catatan'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvancePaymentDetail.v1_throughAPIGatewayJQuery       |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvancePaymentDetail.v1_throughAPIGatewayJQuery    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-21                                                                                           |
        | ▪ Creation Date   : 2023-10-25                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Detail Main Data</p></td></tr>';
            echo       '<tr><td>AdvancePayment_RefID</td><td><input type="text" id="dataInput_AdvancePayment_RefID" value=194000000000001></td></tr>';
            echo       '<tr><td>AdvanceDetail_RefID</td><td><input type="text" id="dataInput_AdvanceDetail_RefID" value=82000000000001></td></tr>';
            echo       '<tr><td>AmountCurrency_RefID</td><td><input type="text" id="dataInput_AmountCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>AmountCurrencyValue</td><td><input type="text" id="dataInput_AmountCurrencyValue" value=30000></td></tr>';
            echo       '<tr><td>AmountCurrencyExchangeRate</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setAdvancePaymentDetail', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                            '"advancePayment_RefID" : parseInt(document.getElementById("dataInput_AdvancePayment_RefID").value), '.
                            '"advanceDetail_RefID" : parseInt(document.getElementById("dataInput_AdvanceDetail_RefID").value), '.
                            '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID").value), '.
                            '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue").value), '.
                            '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate").value), '.
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