<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\dataPickList\accounting          |
|                 \chartOfAccount\getNonHeaderAll\v1                                                                               |
| ▪ API Key     : report.form.dataPickList.accounting.chartOfAccount.getNonHeaderAll                                               |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\dataPickList\accounting\chartOfAccount\getNonHeaderAll\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.dataPickList.accounting.chartOfAccount.getNonHeaderAll.v1_throughAPIGateway              |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.dataPickList.accounting.chartOfAccount.getNonHeaderAll.v1_throughAPIGateway            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.000000                                                                                        |
        | ▪ Last Update     : 2026-07-28                                                                                           |
        | ▪ Creation Date   : 2026-07-28                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]------------------------------------------------------------------------------------------------
                if (!$varAPIWebToken) {
                    $varAPIWebToken =
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                    }

            //-----[ CORE PROCESS ]-------------------------------------------------------------------------------------------------
                $varData = 
                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        //-----[ METADATA ]-----( START )-----
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken, 
                            'report.form.dataPickList.accounting.chartOfAccount.getNonHeaderAll', 
                            'latest',
                        //-----[ METADATA ]-----(  END  )-----

                        //-----[ DATA ]---------( START )-----
                            [
                            'parameter' => [
                                'effectiveDate' => date('Y-m-d'),       //'2026-01-01',
                                'pagination' => [
                                    'pageSize' => 10,
                                    'pageShow' => 1
                                    ],
                                'dataFilter' => [
                                    'fullCode' => NULL,                 //'1-1102.01.000001'
                                    'fullName' => NULL                  //'BCA'
                                    ]
                                ]
                            ]
                        //-----[ DATA ]---------(  END  )-----
                        );

            //-----[ DATA RETURN ]--------------------------------------------------------------------------------------------------
                return
                    $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.accounting.chartOfAccount.getNonHeaderAll.v1_throughAPIGatewayJQuery   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       dataPickList.accounting.chartOfAccount.getNonHeaderAll.v1_throughAPIGatewayJQuery                  |
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
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            //echo '<tr><td>EffectiveDateTimeTZ</td><td><input type="text" id="dataInput_EffectiveDateTimeTZ" value="2010-01-01 00:00:00+07"></td></tr>';
            echo '<tr><td>EffectiveDateTimeTZ</td><td><input type="text" id="dataInput_EffectiveDateTimeTZ" value=""></td></tr>';
            echo '</table>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'report.form.dataPickList.accounting.chartOfAccount.getNonHeaderAll', 
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