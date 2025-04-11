<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setAdvancePayment\v1                                                                                            |
| ▪ API Key     : transaction.update.finance.setAdvancePayment                                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setAdvancePayment\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvancePayment.v1_throughAPIGateway                   |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvancePayment.v1_throughAPIGateway                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-25                                                                                           |
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
                        'transaction.update.finance.setAdvancePayment', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'recordID' => 194000000000001,
                        'entities' => [
                            "documentDateTimeTZ" => '2023-10-25',
                            "log_FileUpload_Pointer_RefID" => null,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            'recordID' => 195000000000002,
                                            "entities" => [
                                                "advanceDetail_RefID" => 88000000000083,
                                                "amountCurrency_RefID" => 62000000000001,
                                                "amountCurrencyValue" => 235000.00,
                                                "amountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Pertama'                                    
                                                ]                                   
                                            ],
                                            [
                                            'recordID' => 195000000000003,
                                            "entities" => [
                                                "advanceDetail_RefID" => 88000000000084,
                                                "amountCurrency_RefID" => 62000000000001,
                                                "amountCurrencyValue" => 235000.00,
                                                "amountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Kedua'
                                                ]
                                            ],
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setAdvancePayment.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/transaction.update.finance.setAdvancePayment.v1_throughAPIGatewayJQuery          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-10-25                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Payment Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=194000000000001></td></tr>';
            echo        '<tr><td>DocumentDateTimeTZ</td><td><input type="text" id="dataInput_DocumentDateTimeTZ" value="2023-10-25"></td></tr>';
            echo        '<tr><td>Log_FileUpload_Pointer_RefID</td><td><input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value=></td></tr>';
            echo        '<tr><td>RequesterWorkerJobsPosition_RefID</td><td><input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value="My Remarks"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Advance Payment Detail Data</p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_1</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_1" value=195000000000002></td></tr>';
            echo        '<tr><td>AdvanceDetail_RefID_1</td><td><input type="text" id="dataInput_AdvanceDetail_RefID_1" value=88000000000083></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_1</td><td><input type="text" id="dataInput_AmountCurrency_RefID_1" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_1</td><td><input type="text" id="dataInput_AmountCurrencyValue_1" value=235000.00></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_1</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_1" value=1></td></tr>';
            echo        '<tr><td>Remarks_1</td><td><input type="text" id="dataInput_Remarks_1" value="Catatan Pertama"></td></tr>';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff"></p></td></tr></tr>';
            echo        '<tr><td>RecordIDDetail_RefID_2</td><td><input type="text" id="dataInput_RecordIDDetail_RefID_2" value=195000000000003></td></tr>';
            echo        '<tr><td>AdvanceDetail_RefID_2</td><td><input type="text" id="dataInput_AdvanceDetail_RefID_2" value=88000000000084></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrency_RefID_2</td><td><input type="text" id="dataInput_AmountCurrency_RefID_2" value=62000000000001></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyValue_2</td><td><input type="text" id="dataInput_AmountCurrencyValue_2" value=235000.00></td></tr>';
            echo        '<tr><td>ProductUnitPriceCurrencyExchangeRate_2</td><td><input type="text" id="dataInput_AmountCurrencyExchangeRate_2" value=1></td></tr>';
            echo        '<tr><td>Remarks_2</td><td><input type="text" id="dataInput_Remarks_2" value="Catatan Kedua"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.update.finance.setAdvancePayment', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                            '"log_FileUpload_Pointer_RefID" : parseInt(document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value), '.
                            '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                            '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                            '"additionalData" : {'.
                                '"itemList" : {'.
                                    '"items" : ['.
                                            '{'.
                                            '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_1").value), '.
                                            '"entities" : '.
                                                '{'.
                                                '"advanceDetail_RefID" : parseInt(document.getElementById("dataInput_AdvanceDetail_RefID_1").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_1").value),'.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_1").value),'.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_1").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_1").value'.
                                                '}'.
                                            '}, '.
                                            '{'.
                                            '"recordID" : parseInt(document.getElementById("dataInput_RecordIDDetail_RefID_2").value), '.
                                            '"entities" : '.
                                                '{'.
                                                '"advanceDetail_RefID" : parseInt(document.getElementById("dataInput_AdvanceDetail_RefID_2").value), '.
                                                '"amountCurrency_RefID" : parseInt(document.getElementById("dataInput_AmountCurrency_RefID_2").value),'.
                                                '"amountCurrencyValue" : parseFloat(document.getElementById("dataInput_AmountCurrencyValue_2").value),'.
                                                '"amountCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_AmountCurrencyExchangeRate_2").value),'.
                                                '"remarks" : document.getElementById("dataInput_Remarks_2").value'.
                                                '}'.
                                            '}'.
                                        ']'.
                                    '}'.
                                '}'.
                            '}'.
                        '}'
                    //-----[ DATA ]-----(  END  )-----
                    );

            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }