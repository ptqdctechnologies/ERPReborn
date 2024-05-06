<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\accounting                |
|                 \setChartOfAccountLinkageSchema\v1                                                                               |
| ▪ API Key     : transaction.update.budgeting.setChartOfAccountLinkageSchema                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\accounting\setChartOfAccountLinkageSchema\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.accounting.setChartOfAccountLinkageSchema.v1_throughAPIGateway   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.accounting.setChartOfAccountLinkageSchema.v1_throughAPIGateway                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-06                                                                                           |
        | ▪ Creation Date   : 2024-05-06                                                                                           |
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
                    'transaction.update.accounting.setChartOfAccountLinkageSchema', 
                    'latest', 
                    [
                    'recordID' => 236000000000001,
                    'entities' => [
                        'parentChartOfAccount_RefID' => 65000000000007,
                        'linkageSchemaTable' => 'SchData-OLTP-Master.TblEntityBankAccount',
                        'signLinkageBoundMandatory' => true,
                        'additionalLinkageFields' => '['.
                            '"\"SubSQL\".\"ChartAccount_Currency_RefID\" = \"Sys_BaseCurrency_RefID\""'.
                            ']'
                        ]
                    ]
                    );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.accounting.setChartOfAccountLinkageSchema.v1_throughAPIGatewayJQuery              |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.accounting.setChartOfAccountLinkageSchema.v1_throughAPIGatewayJQuery            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-06                                                                                           |
        | ▪ Creation Date   : 2024-05-06                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Chart Of Account Linkage Schema Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=236000000000001></td></tr>';
            echo        '<tr><td>ParentChartOfAccount_RefID</td><td><input type="text" id="dataInput_ParentChartOfAccount_RefID" value="65000000000007"></td></tr>';
            echo        '<tr><td>LinkageSchemaTable</td><td><input type="text" id="dataInput_LinkageSchemaTable" value="SchData-OLTP-Master.TblEntityBankAccount"></td></tr>';
            echo        '<tr><td>SignLinkageBoundMandatory</td><td><input type="text" id="dataInput_SignLinkageBoundMandatory" value="TRUE"></td></tr>';
            echo        '<tr><td>Linkage_RefID</td><td><input type="text" id="dataInput_Linkage_RefID" value="[&#34;\&#34;SubSQL\&#34;.\&#34;ChartAccount_Currency_RefID\&#34; = \&#34;Sys_BaseCurrency_RefID\&#34;&#34;]"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.update.accounting.setChartOfAccountLinkageSchema', 
                    'latest', 
                    '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"parentChartOfAccount_RefID" : parseInt(document.getElementById("dataInput_ParentChartOfAccount_RefID").value), '.
                            '"linkageSchemaTable" : document.getElementById("dataInput_LinkageSchemaTable").value, '.
                            '"signLinkageBoundMandatory" : true, '.
                            '"linkage_RefID" : document.getElementById("dataInput_Linkage_RefID").value'.
                            '}'.
                    '}'
                    );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }