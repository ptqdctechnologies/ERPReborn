<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\accounting                      |
|                 \getCombinedChartOfAccountNonHeader\v1                                                                           |
| ▪ API Key     : dataPickList.accounting.getCombinedChartOfAccountNonHeader                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\accounting\getCombinedChartOfAccountNonHeader\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.accounting.getCombinedChartOfAccountNonHeader.v1_throughAPIGateway     |
        |                     ► http://172.28.0.4/dataPickList.accounting.getCombinedChartOfAccountNonHeader.v1_throughAPIGateway  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-09                                                                                           |
        | ▪ Creation Date   : 2025-07-09                                                                                           |
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
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    //-----[ METADATA ]-----( START )-----
                        $varAPIWebToken, 
                        'dataPickList.accounting.getCombinedChartOfAccountNonHeader', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]-----( START )-----
                        [
                        'parameter' => [
                            //'effectiveDateTimeTZ' => '2010-01-01 00:00:00+07'
                            'effectiveDateTimeTZ' => NULL
                            ]
                        ]
                    //-----[ DATA ]-----(  END  )-----
                    );

            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     dataPickList.accounting.getCombinedChartOfAccountNonHeader.v1_throughAPIGatewayJQuery                |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       dataPickList.accounting.getCombinedChartOfAccountNonHeader.v1_throughAPIGatewayJQuery              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-07-09                                                                                           |
        | ▪ Creation Date   : 2025-07-09                                                                                           |
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
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            echo '<tr><td>EffectiveDateTimeTZ</td><td><input type="text" id="dataInput_EffectiveDateTimeTZ" value="2010-01-01 00:00:00+07"></td></tr>';
            echo '</table>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'dataPickList.accounting.getCombinedChartOfAccountNonHeader', 
                    'latest', 
                    '{'.
                        '"parameter" : {'.
                            'effectiveDateTimeTZ :  document.getElementById("dataInput_EffectiveDateTimeTZ").value '.
                            '}'.
                    '}'
                    );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }