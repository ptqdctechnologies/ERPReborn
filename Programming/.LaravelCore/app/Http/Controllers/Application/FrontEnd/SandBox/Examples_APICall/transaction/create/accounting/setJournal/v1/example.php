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
        | ▪ Last Update     : 2025-12-30                                                                                           |
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
                        'additionalData' => [
                            'itemList' => [
                                'items' => [
                                        [
                                            'documentDateTimeTZ' => '2025-12-02',
                                            'businessDocument_RefID' => 74000000023254,
                                            "bankAccount_RefID" => 167000000000004,
                                            "combinedBudget_RefID" => 46000000000001,
                                            'journalDateTimeTZ' => '2025-12-02 11:30:45+07',
                                            'entities' => [
                                                [
                                                    'chartOfAccount_RefID' => 65000000000005,
                                                    'accountingEntryRecordType_RefID' => 214000000000001,   // 214000000000001 => "Debit", 214000000000002 => "Credit"
                                                    'amountCurrency_RefID' => 62000000000001,
                                                    'amountCurrencyValue' => 50000,
                                                    'amountCurrencyExchangeRate' => 1,
                                                    'quantityUnit_RefID' => 73000000000001,
                                                    'quantity' => 10.00

                                                ],
                                                [
                                                    'chartOfAccount_RefID' => 65000000000005,
                                                    'accountingEntryRecordType_RefID' => 214000000000001,   // 214000000000001 => "Debit", 214000000000002 => "Credit"
                                                    'amountCurrency_RefID' => 62000000000001,
                                                    'amountCurrencyValue' => 50000,
                                                    'amountCurrencyExchangeRate' => 1,
                                                    'quantityUnit_RefID' => 73000000000001,
                                                    'quantity' => 10.00
                                                ]
                                            ]
                                        ],
                                        [
                                            'documentDateTimeTZ' => '2025-12-02',
                                            'businessDocument_RefID' => 74000000023255,
                                            "bankAccount_RefID" => 167000000000004,
                                            "combinedBudget_RefID" => 46000000000002,
                                            'journalDateTimeTZ' => '2025-12-02 11:30:45+07',
                                            'entities' => [
                                                [
                                                    'chartOfAccount_RefID' => 65000000000005,
                                                    'accountingEntryRecordType_RefID' => 214000000000001,   // 214000000000001 => "Debit", 214000000000002 => "Credit"
                                                    'amountCurrency_RefID' => 62000000000001,
                                                    'amountCurrencyValue' => 50000,
                                                    'amountCurrencyExchangeRate' => 1,
                                                    'quantityUnit_RefID' => 73000000000001,
                                                    'quantity' => 10.00

                                                ],
                                                [
                                                    'chartOfAccount_RefID' => 65000000000005,
                                                    'accountingEntryRecordType_RefID' => 214000000000001,   // 214000000000001 => "Debit", 214000000000002 => "Credit"
                                                    'amountCurrency_RefID' => 62000000000001,
                                                    'amountCurrencyValue' => 50000,
                                                    'amountCurrencyExchangeRate' => 1,
                                                    'quantityUnit_RefID' => 73000000000001,
                                                    'quantity' => 10.00
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                            "cashDisbursementItemList" => [
                                "items" => [
                                        [
                                        "entities" => [
                                            'documentDateTimeTZ' => '2025-12-02',
                                            'businessDocument_RefID' => 74000000023256,
                                            'log_FileUpload_Pointer_RefID' => null,
                                            "combinedBudget_RefID" => 46000000000003,
                                            'beneficiaryBankAccount_RefID' => 167000000000001,
                                            'chartOfAccount_RefID' => 65000000000005,
                                            'amountCurrency_RefID' => 62000000000001,
                                            'amountCurrencyValue' => 50000,
                                            'amountCurrencyExchangeRate' => 1,
                                            "remarks" => 'Catatan 1'
                                            ]
                                        ],
                                        [
                                        "entities" => [
                                            'documentDateTimeTZ' => '2025-12-02',
                                            'businessDocument_RefID' => 74000000023257,
                                            'log_FileUpload_Pointer_RefID' => null,
                                            "combinedBudget_RefID" => 46000000000004,
                                            'beneficiaryBankAccount_RefID' => 167000000000001,
                                            'chartOfAccount_RefID' => 65000000000005,
                                            'amountCurrency_RefID' => 62000000000001,
                                            'amountCurrencyValue' => 50000,
                                            'amountCurrencyExchangeRate' => 1,
                                            "remarks" => 'Catatan 1'
                                            ]
                                        ]
                                    ]
                                ],
                            "cashReceiptItemList" => [
                                "items" => [
                                        [
                                        "entities" => [
                                            'documentDateTimeTZ' => '2025-12-02',
                                            'businessDocument_RefID' => 74000000023258,
                                            'log_FileUpload_Pointer_RefID' => null,
                                            "combinedBudget_RefID" => 46000000000005,
                                            'senderBankAccount_RefID' => 167000000000001,
                                            'chartOfAccount_RefID' => 65000000000005,
                                            'amountCurrency_RefID' => 62000000000001,
                                            'amountCurrencyValue' => 50000,
                                            'amountCurrencyExchangeRate' => 1,
                                            "remarks" => 'Catatan 1'
                                            ]
                                        ],
                                        [
                                        "entities" => [
                                            'documentDateTimeTZ' => '2025-12-02',
                                            'businessDocument_RefID' => 74000000023259,
                                            'log_FileUpload_Pointer_RefID' => null,
                                            "combinedBudget_RefID" => 46000000000006,
                                            'senderBankAccount_RefID' => 167000000000001,
                                            'chartOfAccount_RefID' => 65000000000005,
                                            'amountCurrency_RefID' => 62000000000001,
                                            'amountCurrencyValue' => 50000,
                                            'amountCurrencyExchangeRate' => 1,
                                            "remarks" => 'Catatan 1'
                                            ]
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ]
                    );
            return $varData;
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Journal Main Data</p></td></tr>';
            echo        '<tr><td>JournalCode</td><td><input type="text" id="dataInput_JournalCode" value="TRX001"></td></tr>';
            echo        '<tr><td>JournalDateTimeTZ</td><td><input type="text" id="dataInput_JournalDateTimeTZ" value="2022-03-07 09:00:00+07"></td></tr>';
            echo        '<tr><td>PosterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_PosterWorkerJobsPosition_RefID" value=""></td></tr>';
            echo        '<tr><td>PostingDateTimeTZ</td><td><input type="text" id="dataInput_PostingDateTimeTZ" value=""></td></tr>';
            echo        '<tr><td>Annotation</td><td><input type="text" id="dataInput_Annotation" value="catatan"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Journal Detail Data</p></td></tr></tr>';
            echo        '<tr><td>JournalDetailDateTimeTZ</td><td><input type="text" id="dataInput_JournalDetailDateTimeTZ_1" value="2024-05-07 07:30:00 +07"></td></tr>';
            echo        '<tr><td>ChartOfAccountLinkage_RefID</td><td><input type="text" id="dataInput_ChartOfAccountLinkage_RefID_1" value="237000000000001"></td></tr>';
            echo        '<tr><td>Underlying_RefID</td><td><input type="text" id="dataInput_Underlying_RefID_1" value="213000000000001"></td></tr>';
            echo        '<tr><td>AccountingEntryRecordType_RefID</td><td><input type="text" id="dataInput_AccountingEntryRecordType_RefID_1" value="214000000000001"></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID</td><td><input type="text" id="dataInput_AmountCurrency_RefID_1" value="62000000000001"></td></tr>';
            echo        '<tr><td>AmountCurrencyValue</td><td><input type="text" id="dataInput_AmountCurrencyValue_1" value="50000"></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_1" value="1"></td></tr>';
            echo        '<tr><td>QuantityUnit_RefID</td><td><input type="text" id="dataInput_QuantityUnit_RefID_1" value="73000000000001"></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity_1" value="10"></td></tr>';
            echo        '<tr><td>Annotation</td><td><input type="text" id="dataInput_Annotation_1" value="2016-01-01 00:00:00"></td></tr>';
            echo        '<tr><td>CodeOfBudgeting_RefID</td><td><input type="text" id="dataInput_CodeOfBudgeting_RefID_1" value=""></td></tr>';
            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.create.accounting.setJournal',
                    'latest',
                    '{'.
                        '"entities" : {'.
                            '"journalCode" : document.getElementById("dataInput_JournalCode").value, '.
                            '"journalDateTimeTZ" : document.getElementById("dataInput_JournalDateTimeTZ").value, '.
                            '"posterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_PosterWorkerJobsPosition_RefID").value), '.
                            '"postingDateTimeTZ" : document.getElementById("dataInput_PostingDateTimeTZ").value, '.
                            '"annotation" : document.getElementById("dataInput_Annotation").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"entities" : '.
                                                '{'.
                                                '"journalDetailDateTimeTZ" : document.getElementById("dataInput_JournalDetailDateTimeTZ_1").value, '.
                                                '"chartOfAccountLinkage_RefID" : parseInt(document.getElementById("dataInput_ChartOfAccountLinkage_RefID_1").value), '.
                                                '"underlying_RefID" : parseInt(document.getElementById("dataInput_Underlying_RefID_1").value), '.
                                                '"accountingEntryRecordType_RefID" : parseInt(document.getElementById("dataInput_AccountingEntryRecordType_RefID_1").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_1").value), '.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_1").value), '.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_1").value), '.
                                                '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID_1").value), '.
                                                '"quantity" : parseFloat(document.getElementById("dataInput_Quantity_1").value), '.
                                                '"annotation" : document.getElementById("dataInput_Annotation_1").value, '.
                                                '"codeOfBudgeting_RefID" : parseInt(document.getElementById("dataInput_CodeOfBudgeting_RefID_1").value) '.
                                                '}'.
                                            '}'.
                                        ']'.
                                    '}'.
                                '}'.
                            '}'.
                    '}'
                    );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }
