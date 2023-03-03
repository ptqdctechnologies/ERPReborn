<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\sysConfig                 |
|                 \setMapper_BusinessDocumentTypeToWorkFlow\v1                                                                     |
| ▪ API Key     : transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\sysConfig\setMapper_BusinessDocumentTypeToWorkFlow\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow.v1_throughAPIGateway           |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow.v1_throughAPIGateway         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-02                                                                                           |
        | ▪ Creation Date   : 2023-03-02                                                                                           |
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
                'transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow', 
                'latest', 
                [
                'recordID' => 119000000000001,
                'entities' => [
                    "businessDocumentType_RefID" => 77000000000057,
                    "combinedBudget_RefID" => 103000000000001,
                    "workFlow_RefID" => 112000000000001
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow.v1_throughAPIGatewayJQuery     |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow.v1_throughAPIGatewayJQuery   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-02                                                                                           |
        | ▪ Creation Date   : 2023-03-02                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=119000000000001></td></tr>';
            echo        '<tr><td>BusinessDocumentType_RefID</td><td><input type="text" id="dataInput_BusinessDocumentType_RefID" value=77000000000057></td></tr>';
            echo        '<tr><td>CombinedBudget_RefID</td><td><input type="text" id="dataInput_CombinedBudget_RefID" value=103000000000001></td></tr>';
            echo        '<tr><td>WorkFlow_RefID</td><td><input type="text" id="dataInput_WorkFlow_RefID" value=112000000000001></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.sysConfig.setMapper_BusinessDocumentTypeToWorkFlow', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"businessDocumentType_RefID" : parseInt(document.getElementById("dataInput_BusinessDocumentType_RefID").value), '.
                        '"combinedBudget_RefID" : parseInt(document.getElementById("dataInput_CombinedBudget_RefID").value), '.
                        '"workFlow_RefID" : parseInt(document.getElementById("dataInput_WorkFlow_RefID").value) '.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }