<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setBankAccountMutation\v1                                                                                       |
| ▪ API Key     : transaction.update.finance.setBankAccountMutation                                                                |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setBankAccountMutation\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setBankAccountMutation.v1_throughAPIGateway              |
        |                     ► http://172.28.0.4/transaction.update.finance.setBankAccountMutation.v1_throughAPIGateway           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
                'transaction.update.finance.setBankAccountMutation', 
                'latest', 
                [
                'recordID' => 215000000000001,
                'entities' => [
                    "bankAccount_RefID" => 167000000000004,
                    "log_FileUpload_Pointer_RefID" => null,
                    "remarks" => 'My Remarks',
                    'additionalData' => [
                        'itemList' => [
                            'items' => [
                                    [
                                    'recordID' => 216000000000001,
                                    'entities' => [
                                        "mutationDateTimeTZ" => '2022-10-04',
                                        "accountingEntryRecordType_RefID" => 214000000000002,
                                        "amountCurrency_RefID" => 62000000000001,
                                        "amountCurrencyValue" => 30000,
                                        "amountCurrencyExchangeRate" => 1,
                                        "description" => 'Beli Kompor'                                 
                                        ]                                   
                                    ],
                                    [
                                    'recordID' => 216000000000002,
                                    'entities' => [
                                        "mutationDateTimeTZ" => '2022-10-04',
                                        "accountingEntryRecordType_RefID" => 214000000000002,
                                        "amountCurrency_RefID" => 62000000000001,
                                        "amountCurrencyValue" => 40000,
                                        "amountCurrencyExchangeRate" => 1,
                                        "description" => 'Beli Tabung Gas'
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setBankAccountMutation.v1_throughAPIGatewayJQuery        |
        |                     ► http://172.28.0.4/transaction.update.finance.setBankAccountMutation.v1_throughAPIGatewayJQuery     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
            
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Bank Account Mutation Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=215000000000001></td></tr>';
            echo        '<tr><td>BankAccount_RefID</td><td><input type="text" id="dataInput_BankAccount_RefID" value=167000000000004></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=91000000000001></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Bank Account Mutation Detail Data</p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_1</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_1" value=216000000000001></td></tr>';
            echo        '<tr><td>MutationDateTimeTZ_1</td><td><input type="text" id="dataInput_MutationDateTimeTZ_1" value="2022-10-04"></td></tr>';
            echo        '<tr><td>AccountingEntryRecordType_RefID_1</td><td><input type="text" id="dataInput_AccountingEntryRecordType_RefID_1" value=214000000000002></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID_1</td><td><input type="text" id="dataInput_AmountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue_1</td><td><input type="text" id="dataInput_AmountCurrencyValue_1" value=30000></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Description_1</td><td><input type="text" id="dataInput_Description_1" value="Beli Kompor"></td></tr>';
            
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_2</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_2" value=216000000000002></td></tr>';
            echo        '<tr><td>MutationDateTimeTZ_2</td><td><input type="text" id="dataInput_MutationDateTimeTZ_2" value="2022-10-04"></td></tr>';
            echo        '<tr><td>AccountingEntryRecordType_RefID_2</td><td><input type="text" id="dataInput_AccountingEntryRecordType_RefID_2" value=214000000000002></td></tr>';
            echo        '<tr><td>AmountCurrency_RefID_2</td><td><input type="text" id="dataInput_AmountCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>AmountCurrencyValue_2</td><td><input type="text" id="dataInput_AmountCurrencyValue_2" value=40000></td></tr>';
            echo        '<tr><td>AmountCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Description_2</td><td><input type="text" id="dataInput_Description_2" value="Beli Tabung Gas"></td></tr>';
            
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.finance.setBankAccountMutation', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"bankAccount_RefID" : parseInt(document.getElementById("dataInput_BankAccount_RefID").value), '.
                        '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                        '"additionalData" : {'.
                            '"itemList" : {'.
                                '"items" : ['.
                                        '{'.
                                        '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_1").value), '.
                                        '"entities" : '.
                                            '{'.
                                            '"mutationDateTimeTZ" : document.getElementById("dataInput_MutationDateTimeTZ_1").value, '.
                                            '"accountingEntryRecordType_RefID" : parseInt(document.getElementById("dataInput_AccountingEntryRecordType_RefID_1").value), '.
                                            '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_1").value),'.
                                            '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_1").value),'.
                                            '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_1").value),'.
                                            '"description" : document.getElementById("dataInput_Description_1").value'.
                                            '}'.
                                        '}, '.
                                        '{'.
                                        '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_2").value), '.
                                        '"entities" : '.
                                            '{'.
                                            '"mutationDateTimeTZ" : document.getElementById("dataInput_MutationDateTimeTZ_2").value, '.
                                            '"accountingEntryRecordType_RefID" : parseInt(document.getElementById("dataInput_AccountingEntryRecordType_RefID_2").value), '.
                                            '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_2").value),'.
                                            '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_2").value),'.
                                            '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_2").value),'.
                                            '"description" : document.getElementById("dataInput_Description_2").value'.
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