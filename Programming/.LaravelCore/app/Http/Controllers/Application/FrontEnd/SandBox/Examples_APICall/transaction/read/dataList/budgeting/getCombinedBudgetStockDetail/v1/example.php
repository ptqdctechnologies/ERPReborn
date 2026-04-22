<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\budgeting          |
|                 \getCombinedBudgetStockDetail\v1                                                                                 |
| ▪ API Key     : transaction.read.dataList.customerRelation.getCombinedBudgetStockDetail                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\budgeting\getCombinedBudgetStockDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.read.dataList.budgeting.getCombinedBudgetStockDetail.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.read.dataList.budgeting.getCombinedBudgetStockDetail.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-04-22                                                                                           |
        | ▪ Creation Date   : 2026-04-22                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.budgeting.getCombinedBudgetStockDetail',
                    'latest',
                    [
                    'parameter' => [
                        'combinedBudget_RefID' => 46000000000033,
                        'warehouse_RefID' => 173000000000001,
                        'branch_RefID' => 11000000000004,
                        'combinedBudgetSection_RefID' => 143000000000307,
                        ],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                        ]
                    ]
                    );
            return $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.read.dataList.budgeting.getCombinedBudgetStockDetail.v1_throughAPIGatewayJQuery        |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.read.dataList.budgeting.getCombinedBudgetStockDetail.v1_throughAPIGatewayJQuery      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-26                                                                                           |
        | ▪ Creation Date   : 2022-09-26                                                                                           |
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
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            echo '<tr><td>Combined&nbsp;Budget&nbsp;Section&nbsp;RefID</td><td><input type="text" id="dataInput_CombinedBudgetSection_RefID" value=104000000000003></td></tr>';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.budgeting.getCombinedBudgetStockDetail',
                'latest',
                '{'.
                    '"parameter" : {'.
                        '"combinedBudgetSection_RefID" : parseInt(document.getElementById("dataInput_CombinedBudgetSection_RefID").value), '.
                        '},'.
                    '"SQLStatement" : {'.
                        '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                        '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                        '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                        '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }
