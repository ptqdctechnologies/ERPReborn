<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance                   |
|                 \setAdvancePayment\v1                                                                                            |
| ▪ API Key     : transaction.create.finance.setAdvancePayment                                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setAdvancePayment\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setAdvancePayment.v1_throughAPIGateway                   |
        |                     ► http://172.28.0.4/transaction.create.finance.setAdvancePayment.v1_throughAPIGateway                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-04                                                                                           |
        | ▪ Creation Date   : 2025-09-04                                                                                           |
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
                        'transaction.create.finance.setAdvancePayment', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'entities' => [
                            "documentDateTimeTZ" => '2023-10-25',
                            "log_FileUpload_Pointer_RefID" => null,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "transactionTax_RefID" => null,
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "advance_RefID" => 76000000000001,
                                                "amountCurrency_RefID" => 62000000000001,
                                                "amountCurrencyValue" => 735000.00,
                                                "amountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Pertama'                                   
                                                ]
                                            ]
                                        ]
                                    ],
                                "fundingList" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "log_FileUpload_Pointer_RefID" => null,
                                                "paymentMethod_RefID" => 175000000000001,
                                                "amountCurrency_RefID" => 62000000000001,
                                                "amountCurrencyValue" => 20000,
                                                "amountCurrencyExchangeRate" => 1,
                                                "fundingSource_RefID" => 167000000000001,
                                                "fundingDestination_RefID" => 1670000000000010,
                                                "beneficiaryWorkerJobsPosition_RefID" => 164000000000439,
                                                "paidDateTimeTZ" => null,
                                                "payerWorkerJobsPosition_RefID" => 164000000000497,
                                                "remarks" => "Catatan 1"
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setAdvancePayment.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/transaction.create.finance.setAdvancePayment.v1_throughAPIGatewayJQuery          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-04                                                                                           |
        | ▪ Creation Date   : 2025-09-04                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Main Data</p></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2023-10-25"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=""></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>TransactionTax_RefID</td><td><input type="text" id="dataInput_TransactionTax_RefID" value=></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Detail Data</p></td></tr></tr>';
            echo        '<tr><td>Advance_RefID_1</td><td><input type="text" id="dataInput_Advance_RefID_1" value=76000000000001></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID_1</td><td><input type="text" id="dataInput_AmountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue_1</td><td><input type="text" id="dataInput_AmountCurrencyValue_1" value=235000.00></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Detail"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Payment Funding Data</p></td></tr></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID_1</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID_1" value=""></td></tr>';
            echo        '<tr><td>PaymentMethod_RefID_1</td><td><input type="text" id="dataInput_PaymentMethod_RefID_1" value=175000000000001></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID_1</td><td><input type="text" id="dataInput_AmountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue_1</td><td><input type="text" id="dataInput_AmountCurrencyValue_1" value=20000></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>FundingSource_RefID_1</td><td><input type="text" id="dataInput_FundingSource_RefID_1" value=167000000000001></td></tr>';
            echo        '<tr><td>FundingDestination_RefID_1</td><td><input type="text" id="dataInput_FundingDestination_RefID_1" value=""></td></tr>';
            echo        '<tr><td>BeneficiaryWorkerJobsPosition_RefID_1</td><td><input type="text" id="dataInput_BeneficiaryWorkerJobsPosition_RefID_1" value=""></td></tr>';
            echo        '<tr><td>PaidDateTimeTZ_1</td><td><input type="text" id="dataInput_PaidDateTimeTZ_1" value=""></td></tr>';
            echo        '<tr><td>PayerWorkerJobsPosition_RefID_1</td><td><input type="text" id="dataInput_PayerWorkerJobsPosition_RefID_1" value=164000000000497></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Funding"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.create.finance.setAdvancePayment', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        '{'.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                            '"transactionTax_RefID" : parseInt(document.getElementById("dataInput_TransactionTax_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"advance_RefID" : parseInt(document.getElementById("dataInput_Advance_RefID_1").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_1").value),'.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_1").value),'.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_1").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '} '.
                                        ']'.
                                    '}, '.
                                '"fundingList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_1").value), '.
                                                '"paymentMethod_RefID" : parseInt(document.getElementById("dataInput_PaymentMethod_RefID_1").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_1").value),'.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_1").value),'.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_1").value),'.
                                                '"fundingSource_RefID" : parseInt(document.getElementById("dataInput_FundingSource_RefID_1").value), '.
                                                '"fundingDestination_RefID" : parseInt(document.getElementById("dataInput_FundingDestination_RefID_1").value), '.
                                                '"beneficiaryWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_BeneficiaryWorkerJobsPosition_RefID_1").value), '.
                                                '"paidDateTimeTZ" : parseFloat(document.getElementById("dataInput_PaidDateTimeTZ_1").value), '.
                                                '"payerWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_PayerWorkerJobsPosition_RefID_1").value), '.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '} '.
                                        ']'.
                                    '}'.
                                '}'.
                            '}'.
                        '}'
                    //-----[ DATA ]---------(  END  )-----
                    ); 

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }