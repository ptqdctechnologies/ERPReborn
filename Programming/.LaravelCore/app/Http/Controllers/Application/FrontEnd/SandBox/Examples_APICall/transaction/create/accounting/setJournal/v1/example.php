<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\accounting\setJournal\v1  |
| ▪ API Key     : transaction.create.accounting.setJournal                                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\accounting\setJournal\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.accounting.setJournal.v1_throughAPIGateway                       |
        |                     ► http://172.28.0.4/transaction.create.accounting.setJournal.v1_throughAPIGateway                    |
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
                    'transaction.create.accounting.setJournal', 
                    'latest', 
                    [
                    'entities' => [
                        'journalCode' => 'TRX001',
                        'journalDateTimeTZ' => '2022-03-07 09:00:00+07',
                        'posterWorkerJobsPosition_RefID' => null,
                        'postingDateTimeTZ' => null,
                        'annotation' => null,
                        'additionalData' => [
                            'itemList' => [
                                'items' => [
                                        [
                                        'recordID' => null,
                                        'entities' => [
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
                                        ],
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.accounting.setJournal.v1_throughAPIGatewayJQuery                 |
        |                     ► http://172.28.0.4/transaction.create.accounting.setJournal.v1_throughAPIGatewayJQuery              |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Chart Of Account Main Data</p></td></tr>';
            echo        '<tr><td>Code</td><td><input type="text" id="dataInput_Code" value="1-0000"></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Assets"></td></tr>';
            echo        '<tr><td>Currency_RefID</td><td><input type="text" id="dataInput_Currency_RefID" value="62000000000001"></td></tr>';
            echo        '<tr><td>validStartDateTimeTZ</td><td><input type="text" id="dataInput_validStartDateTimeTZ" value="2016-01-01 00:00:00"></td></tr>';
            echo        '<tr><td>validFinishDateTimeTZ</td><td><input type="text" id="dataInput_validFinishDateTimeTZ" value="9999-12-31 23:59:59"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.create.accounting.setJournal', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"code" : document.getElementById("dataInput_Code").value, '.
                            '"name" : document.getElementById("dataInput_Name").value, '.
                            '"currency_RefID" : parseInt(document.getElementById("dataInput_Currency_RefID").value), '.
                            '"validStartDateTimeTZ" : document.getElementById("dataInput_validStartDateTimeTZ").value, '.
                            '"validFinishDateTimeTZ" : document.getElementById("dataInput_validFinishDateTimeTZ").value '.
                            '}'.
                    '}'
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }