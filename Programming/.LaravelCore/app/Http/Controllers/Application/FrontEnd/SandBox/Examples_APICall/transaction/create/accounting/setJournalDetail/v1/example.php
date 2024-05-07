<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\accounting                |
|                 \setJournalDetail\v1                                                                                             |
| ▪ API Key     : transaction.create.accounting.setJournalDetail                                                                   |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\accounting\setJournalDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.accounting.setJournalDetail.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/transaction.create.accounting.setJournalDetail.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-07                                                                                           |
        | ▪ Creation Date   : 2024-05-07                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
             $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.create.accounting.setJournalDetail', 
                    'latest', 
                    [
                    'entities' => [
                        'journal_RefID' => 68000000000001,
                        'journalDetailDateTimeTZ' => '2024-05-07 07:30:00 +07',
                        'chartOfAccountLinkage_RefID' => 237000000000001,
                        'underlying_RefID' => 213000000000001,
                        'accountingEntryRecordType_RefID' => 214000000000001,
                        'amountCurrency_RefID' => 62000000000001,
                        'amountCurrencyValue' => 50000,
                        'amountCurrencyExchangeRate' => 1,
                        'quantityUnit_RefID' => 73000000000001,
                        'quantity' => 10.00,
                        'annotation' => 'catatan',
                        'codeOfBudgeting_RefID' => null
                        ]
                    ]
                    );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.accounting.setJournalDetail.v1_throughAPIGatewayJQuery           |
        |                     ► http://172.28.0.4/transaction.create.accounting.setJournalDetail.v1_throughAPIGatewayJQuery        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-07                                                                                           |
        | ▪ Creation Date   : 2024-05-07                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Journal Detail Main Data</p></td></tr>';
            echo        '<tr><td>Journal_RefID</td><td><input type="text" id="dataInput_Journal_RefID" value="68000000000001"></td></tr>';
            echo        '<tr><td>JournalDetailDateTimeTZ</td><td><input type="text" id="dataInput_JournalDetailDateTimeTZ" value="2024-05-07 07:30:00 +07"></td></tr>';
            echo        '<tr><td>ChartOfAccountLinkage_RefID</td><td><input type="text" id="dataInput_ChartOfAccountLinkage_RefID" value="237000000000001"></td></tr>';
            echo        '<tr><td>Underlying_RefID</td><td><input type="text" id="dataInput_Underlying_RefID" value="213000000000001"></td></tr>';
            echo        '<tr><td>AccountingEntryRecordType_RefID</td><td><input type="text" id="dataInput_AccountingEntryRecordType_RefID" value="214000000000001"></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID</td><td><input type="text" id="dataInput_AmountCurrency_RefID" value="62000000000001"></td></tr>';
            echo        '<tr><td>AmountCurrencyValue</td><td><input type="text" id="dataInput_AmountCurrencyValue" value="50000"></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate" value="1"></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID" value="73000000000001"></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value="10"></td></tr>';
            echo        '<tr><td>Annotation</td><td><input type="text" id="dataInput_Annotation" value="2016-01-01 00:00:00"></td></tr>';
            echo        '<tr><td>CodeOfBudgeting_RefID</td><td><input type="text" id="dataInput_CodeOfBudgeting_RefID" value=""></td></tr>';            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.create.accounting.setJournalDetail', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"journal_RefID" : parseInt(document.getElementById("dataInput_Journal_RefID").value), '.
                            '"journalDetailDateTimeTZ" : document.getElementById("dataInput_JournalDetailDateTimeTZ").value, '.
                            '"chartOfAccountLinkage_RefID" : parseInt(document.getElementById("dataInput_ChartOfAccountLinkage_RefID").value), '.
                            '"underlying_RefID" : parseInt(document.getElementById("dataInput_Underlying_RefID").value), '.
                            '"accountingEntryRecordType_RefID" : parseInt(document.getElementById("dataInput_AccountingEntryRecordType_RefID").value), '.
                            '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID").value), '.
                            '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue").value), '.
                            '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate").value), '.
                            '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
                            '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                            '"annotation" : document.getElementById("dataInput_Annotation").value, '.
                            '"codeOfBudgeting_RefID" : parseInt(document.getElementById("dataInput_CodeOfBudgeting_RefID").value) '.
                            '}'.
                    '}'
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }