<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance                   |
|                 \setCashDisbursementFunding\v1                                                                                   |
| ▪ API Key     : transaction.create.finance.setCashDisbursementFunding                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setCashDisbursementFunding\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setCashDisbursementFunding.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.create.finance.setCashDisbursementFunding.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2023-10-31                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //-----[ CORE ]-----
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'transaction.create.finance.setCashDisbursementFunding', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'entities' => [
                            "cashDisbursement_RefID" => 192000000000001,
                            "log_FileUpload_Pointer_RefID" => null,
                            "paymentMethod_RefID" => 175000000000001,
                            "amountCurrency_RefID" => 62000000000001,
                            "amountCurrencyValue" => 30000,
                            "amountCurrencyExchangeRate" => 1,
                            "fundingSource_RefID" => 167000000000001,
                            "fundingDestination_RefID" => null,
                            "beneficiaryWorkerJobsPosition_RefID" => null,
                            "paidDateTimeTZ" => null,
                            "payerWorkerJobsPosition_RefID" => 164000000000497,
                            "remarks" => 'Catatan'
                            ]
                        ]
                    //-----[ DATA ]---------(  END  )-----
                    );

            //-----[ DATA RETURN ]-----
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setCashDisbursementFunding.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/transaction.create.finance.setCashDisbursementFunding.v1_throughAPIGatewayJQuery |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0002.0000000                                                                                       |
        | ▪ Last Update     : 2025-04-10                                                                                           |
        | ▪ Creation Date   : 2023-10-31                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //-----[ CORE ]-----
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Funding Main Data</p></td></tr>';
            echo       '<tr><td>CashDisbursement_RefID</td><td><input type="text" id="dataInput_CashDisbursement_RefID" value=192000000000001></td></tr>';
            echo       '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=""></td></tr>';
            echo       '<tr><td>PaymentMethod_RefID</td><td><input type="text" id="dataInput_PaymentMethod_RefID" value=175000000000001></td></tr>';
            echo       '<tr><td>AmountCurrency_RefID</td><td><input type="text" id="dataInput_AmountCurrency_RefID" value=62000000000001></td></tr>';
            echo       '<tr><td>AmountCurrencyValue</td><td><input type="text" id="dataInput_AmountCurrencyValue" value=30000></td></tr>';
            echo       '<tr><td>AmountCurrencyExchangeRate</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate" value=1></td></tr>';
            echo       '<tr><td>FundingSource_RefID</td><td><input type="text" id="dataInput_FundingSource_RefID" value=167000000000001></td></tr>';
            echo       '<tr><td>FundingDestination_RefID</td><td><input type="text" id="dataInput_FundingDestination_RefID" value=""></td></tr>';
            echo       '<tr><td>BeneficiaryWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_BeneficiaryWorkerJobsPosition_RefID" value=""></td></tr>';
            echo       '<tr><td>PaidDateTimeTZ</td><td><input type="text" id="dataInput_PaidDateTimeTZ" value=""></td></tr>';
            echo       '<tr><td>PayerWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_PayerWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo       '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="Catatan"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.finance.setCashDisbursementFunding', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        '{'.
                        '"entities" : {'.
                            '"cashDisbursement_RefID" : parseInt(document.getElementById("dataInput_CashDisbursement_RefID").value), '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"paymentMethod_RefID" : parseInt(document.getElementById("dataInput_PaymentMethod_RefID").value), '.
                            '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID").value), '.
                            '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue").value), '.
                            '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate").value), '.
                            '"fundingSource_RefID" : parseInt(document.getElementById("dataInput_FundingSource_RefID").value), '.
                            '"fundingDestination_RefID" : parseInt(document.getElementById("dataInput_FundingDestination_RefID").value), '.
                            '"beneficiaryWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_BeneficiaryWorkerJobsPosition_RefID").value), '.
                            '"paidDateTimeTZ" : document.getElementById("dataInput_PaidDateTimeTZ").value, '.
                            '"payerWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_PayerWorkerJobsPosition_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value'.
                            '}'.
                        '}'
                    //-----[ DATA ]---------(  END  )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }