<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\finance\getAdvance |
|                 \v1                                                                                                              |
| ▪ API Key     : transaction.read.dataList.finance.getAdvance                                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\read\dataList\finance\getAdvance\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.read.dataList.finance.getAdvance.v1_throughAPIGateway                   |
        |                     ► http://172.28.0.4/transaction.read.dataList.finance.getAdvance.v1_throughAPIGateway                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-08                                                                                           |
        | ▪ Creation Date   : 2022-09-08                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
//$varAPIExecutionStartDateTime = (new \DateTime());

            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //-----[ CORE ]-----
            $varData = 
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'transaction.read.dataList.finance.getAdvance', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'parameter' => [
                            ],
                        'SQLStatement' => [
                            'pick' => null,
                            'sort' => null,
                            'filter' => null,
                            'paging' => null
                            /*
                            'pick' => '*',
                            'sort' => '"OrderSequence" ASC',
                            'filter' => '"CombinedBudgetSection_RefID" = 143000000000029',
                            'paging' => null
                            */
                            ]
                        ]
                    //-----[ DATA ]---------(  END  )-----
                    );

/*
dd (
    \App\Helpers\ZhtHelper\General\Helper_DateTime::getDateTimeStringWithTimeZoneDifferenceInterval(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeStringWithTimeZone(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIExecutionStartDateTime),
        \App\Helpers\ZhtHelper\General\Helper_DateTime::getConvertPHPDateTimeToDateTimeStringWithTimeZone(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), (new \DateTime())),
        )
    );
*/

            //-----[ DATA RETURN ]-----
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.read.dataList.finance.getAdvance.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/transaction.read.dataList.finance.getAdvance.v1_throughAPIGatewayJQuery          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-08                                                                                           |
        | ▪ Creation Date   : 2022-09-08                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //-----[ CORE ]-----
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '<tr><td>Pick</td><td><input type="text" id="dataInput_SQLStatement_pick" value=""></td></tr>';
            echo '<tr><td>Sort</td><td><input type="text" id="dataInput_SQLStatement_sort" value=""></td></tr>';
            echo '<tr><td>Filter</td><td><input type="text" id="dataInput_SQLStatement_filter" value=""></td></tr>';
            echo '<tr><td>Paging</td><td> <input type="text" id="dataInput_SQLStatement_paging" value=""></td></tr>';
            echo '</table>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                        $varAPIWebToken, 
                        'transaction.read.dataList.finance.getAdvance', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        '{'.
                            '"parameter" : {'.
                                '}, '.
                            '"SQLStatement" : {'.
                                '"pick" : document.getElementById("dataInput_SQLStatement_pick").value, '.
                                '"sort" : document.getElementById("dataInput_SQLStatement_sort").value, '.
                                '"filter" : document.getElementById("dataInput_SQLStatement_filter").value, '.
                                '"paging" : document.getElementById("dataInput_SQLStatement_paging").value'.
                                '}'.
                        '}'
                    //-----[ DATA ]---------(  END  )-----
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }