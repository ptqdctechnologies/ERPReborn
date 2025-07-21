<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\accounting         |
|                 \getChartOfAccountLinkage\v1                                                                                     |
| ▪ API Key     : transaction.read.dataList.accounting.getChartOfAccountLinkage                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\accounting\getChartOfAccountLinkage\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.read.dataList.accounting.getChartOfAccountLinkage.v1_throughAPIGateway  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.read.dataList.accounting.getChartOfAccountLinkage.v1_throughAPIGateway                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-02                                                                                           |
        | ▪ Creation Date   : 2024-05-02                                                                                           |
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
                    //-----[ METADATA ]-------------------------------------------------( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'transaction.read.dataList.accounting.getChartOfAccountLinkage', 
                        'latest',
                    //-----[ METADATA ]-------------------------------------------------(  END  )-----

                    //-----[ DATA ]-----------------------------------------------------( START )-----
                        [
                        'parameter' => [
                            //'effectiveDateTimeTZ' => '2010-01-01 00:00:00+07'
                            'effectiveDateTimeTZ' => NULL
                            ],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                            ]
                        ]
                    //-----[ DATA ]-----------------------------------------------------(  END  )-----
                    );

            return 
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.read.dataList.accounting.getChartOfAccountLinkage.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.read.dataList.accounting.getChartOfAccountLinkage.v1_throughAPIGatewayJQuery           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-02                                                                                           |
        | ▪ Creation Date   : 2024-05-02                                                                                           |
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
            echo '<tr><td>EffectiveDateTimeTZ</td><td><input type="text" id="dataInput_EffectiveDateTimeTZ" value="2010-01-01 00:00:00+07"></td></tr>';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.read.dataList.accounting.getChartOfAccountLinkage', 
                    'latest', 
                    '{'.
                        '"parameter" : {'.
                            '"effectiveDateTimeTZ" : document.getElementById("dataInput_EffectiveDateTimeTZ").value, '.
                            '}, '.
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