<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setPaymentFunding |
|                 \v1                                                                                                              |
| ▪ API Key     : transaction.create.finance.setPaymentFunding                                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setPaymentFunding\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setPaymentFunding.v1_throughAPIGateway                   |
        |                     ► http://172.28.0.4/transaction.create.finance.setPaymentFunding.v1_throughAPIGateway                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2023-10-31                                                                                           |
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
                        'transaction.create.finance.setPaymentFunding', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'entities' => [
                            "payment_RefID" => 192000000000001,
                            "log_FileUpload_Pointer_RefID" => null,
                            "paymentMethod_RefID" => 175000000000001,
                            "amountCurrency_RefID" => 62000000000001,
                            "amountCurrencyValue" => 30000,
                            "amountCurrencyExchangeRate" => 1,
                            "paymentFundingSource_RefID" => 167000000000001,
                            "paymentFundingDestination_RefID" => null,
                            "paidDateTimeTZ" => null,
                            "payerWorkerJobsPosition_RefID" => 164000000000497,
                            "remarks" => 'Catatan'
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setPaymentFunding.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/transaction.create.finance.setPaymentFunding.v1_throughAPIGatewayJQuery          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2023-10-31                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Funding Main Data</p></td></tr>';
            echo       '<tr><td>Payment_RefID</td><td><input type="text" id="dataInput_Payment_RefID" value=192000000000001></td></tr>';
            echo       '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=""></td></tr>';
            echo       '<tr><td>PaymentMethod_RefID</td><td><input type="text" id="dataInput_PaymentMethod_RefID" value=175000000000001></td></tr>';
            echo       '<tr><td>AmountCurrency_RefID</td><td><input type="text" id="dataInput_AmountCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>AmountCurrencyValue</td><td><input type="text" id="dataInput_AmountCurrencyValue" value=30000></td></tr>';
            echo       '<tr><td>AmountCurrencyExchangeRate</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>PaymentFundingSource_RefID</td><td><input type="text" id="dataInput_PaymentFundingSource_RefID" value=167000000000001></td></tr>';
            echo       '<tr><td>PaymentFundingDestination_RefID</td><td><input type="text" id="dataInput_PaymentFundingDestination_RefID" value=""></td></tr>';
            echo       '<tr><td>PaidDateTimeTZ</td><td><input type="text" id="dataInput_PaidDateTimeTZ" value=""></td></tr>';
            echo       '<tr><td>PayerWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_PayerWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo       '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.finance.setPaymentFunding', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"entities" : {'.
                            '"payment_RefID" : parseInt(document.getElementById("dataInput_Payment_RefID").value), '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"paymentMethod_RefID" : parseInt(document.getElementById("dataInput_PaymentMethod_RefID").value), '.
                            '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID").value), '.
                            '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue").value), '.
                            '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate").value), '.
                            '"paymentFundingSource_RefID" : parseInt(document.getElementById("dataInput_PaymentFundingSource_RefID").value), '.
                            '"paymentFundingDestination_RefID" : parseInt(document.getElementById("dataInput_PaymentFundingDestination_RefID").value), '.
                            '"paidDateTimeTZ" : document.getElementById("dataInput_PaidDateTimeTZ").value, '.
                            '"payerWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_PayerWorkerJobsPosition_RefID").value), '.
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