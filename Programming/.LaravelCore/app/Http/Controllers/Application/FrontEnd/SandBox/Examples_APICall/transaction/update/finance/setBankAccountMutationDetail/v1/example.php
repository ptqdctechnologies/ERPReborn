<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\                  |
|                 \setBankAccountMutationDetail\v1                                                                                 |
| ▪ API Key     : transaction.update.finance.setBankAccountMutationDetail                                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setBankAccountMutationDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setBankAccountMutationDetail.v1_throughAPIGateway        |
        |                     ► http://172.28.0.4/transaction.update.finance.setBankAccountMutationDetail.v1_throughAPIGateway     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-05                                                                                           |
        | ▪ Creation Date   : 2022-10-05                                                                                           |
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
                'transaction.update.finance.setBankAccountMutationDetail', 
                'latest', 
                [
                'recordID' => 216000000000001,
                'entities' => [
                    "bankAccountMutation_RefID" => 215000000000001,
                    "mutationDateTimeTZ" => '2022-10-04',
                    "accountingEntryRecordType_RefID" => 214000000000002,
                    "amountCurrency_RefID" => 62000000000001,
                    "amountCurrencyValue" => 30000,
                    "amountCurrencyExchangeRate" => 1,
                    "description" => 'Catatan'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setBankAccountMutationDetail.v1_throughAPIGatewayJQuery  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.finance.setBankAccountMutationDetail.v1_throughAPIGatewayJQuery                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-10-05                                                                                           |
        | ▪ Creation Date   : 2022-10-05                                                                                           |
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
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Bank Account Mutation Detail Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=216000000000001></td></tr>';
            echo        '<tr><td>BankAccountMutation_RefID</td><td><input type="text" id="dataInput_BankAccountMutation_RefID" value=215000000000001></td></tr>';
            echo        '<tr><td>MutationDateTimeTZ</td><td><input type="text" id="dataInput_MutationDateTimeTZ" value="2022-10-04"></td></tr>';
            echo        '<tr><td>AccountingEntryRecordType_RefID</td><td><input type="text" id="dataInput_AccountingEntryRecordType_RefID" value=214000000000002></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID</td><td><input type="text" id="dataInput_AmountCurrency_RefID" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue</td><td><input type="text" id="dataInput_AmountCurrencyValue" value=30000></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate" value=1></td></tr>';
            echo        '<tr><td>Description</td><td><input type="text" id="dataInput_Description" value="Catatan"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.finance.setBankAccountMutationDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"bankAccountMutation_RefID" : parseInt(document.getElementById("dataInput_BankAccountMutation_RefID").value), '.
                        '"mutationDateTimeTZ" : document.getElementById("dataInput_MutationDateTimeTZ").value, '.
                        '"accountingEntryRecordType_RefID" : parseInt(document.getElementById("dataInput_AccountingEntryRecordType_RefID").value), '.
                        '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID").value), '.
                        '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue").value), '.
                        '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate").value), '.
                        '"description" : document.getElementById("dataInput_Description").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }