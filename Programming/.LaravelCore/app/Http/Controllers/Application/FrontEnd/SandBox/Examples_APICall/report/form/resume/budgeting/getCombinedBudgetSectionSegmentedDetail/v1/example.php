<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\budgeting                 |
|                 \getCombinedBudgetSectionSegmentedDetail\v1                                                                      |
| ▪ API Key     : report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\resume\budgeting\getCombinedBudgetSectionSegmentedDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail.v1_throughAPIGateway          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-20                                                                                           |
        | ▪ Creation Date   : 2022-09-20                                                                                           |
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
                'report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail', 
                'latest',
                [
                'parameter' => [
                    'combinedBudgetSection_RefID' => 143000000000029
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail.v1_throughAPIGatewayJQuery    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-20                                                                                           |
        | ▪ Creation Date   : 2022-09-20                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Combined Budget Section Segmented Detail Resume Form Data</p></td></tr>';
            echo        '<tr><td>CombinedBudgetSection_RefID</td><td><input type="text" id="dataInput_CombinedBudgetSection_RefID" value="143000000000029"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'report.form.resume.budgeting.getCombinedBudgetSectionSegmentedDetail', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"combinedBudgetSection_RefID" : parseInt(document.getElementById("dataInput_CombinedBudgetSection_RefID").value) '.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }