<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\sysConfig                 |
|                 \setWorkFlowPathSequenceRemapping\v1                                                                             |
| ▪ API Key     : transaction.create.sysConfig.setWorkFlowPathSequenceRemapping                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\sysConfig\setWorkFlowPathSequenceRemapping\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.sysConfig.setWorkFlowPathSequenceRemapping.v1_throughAPIGateway  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.sysConfig.setWorkFlowPathSequenceRemapping.v1_throughAPIGateway                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-03                                                                                           |
        | ▪ Creation Date   : 2023-03-03                                                                                           |
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
                'transaction.create.sysConfig.setWorkFlowPathSequenceRemapping', 
                'latest', 
                [
                'entities' => [
                    "previousWorkFlowPath_RefID" => 116000000000001,
                    "previousSequence" => 1,
                    "currentWorkFlowPath_RefID" => 116000000000008,
                    "currentSequence" => 1,
                    "remarks" => null
                    ]
                ]                    
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.create.sysConfig.setWorkFlowPathSequenceRemapping.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.sysConfig.setWorkFlowPathSequenceRemapping.v1_throughAPIGatewayJQuery           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-03                                                                                           |
        | ▪ Creation Date   : 2023-03-03                                                                                           |
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
            echo        '<tr><td>PreviousWorkFlowPath_RefID</td><td><input type="text" id="dataInput_PreviousWorkFlowPath_RefID" value=116000000000001></td></tr>';
            echo        '<tr><td>PreviousSequence</td><td><input type="text" id="dataInput_PreviousSequence" value=1></td></tr>';
            echo        '<tr><td>CurrentWorkFlowPath_RefID</td><td><input type="text" id="dataInput_CurrentWorkFlowPath_RefID" value=116000000000008></td></tr>';
            echo        '<tr><td>CurrentSequence</td><td><input type="text" id="dataInput_CurrentSequence" value=1></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value=""></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.create.sysConfig.setWorkFlowPathSequenceRemapping', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"previousWorkFlowPath_RefID" : parseInt(document.getElementById("dataInput_PreviousWorkFlowPath_RefID").value), '.
                        '"previousSequence" : parseInt(document.getElementById("dataInput_PreviousSequence").value), '.
                        '"currentWorkFlowPath_RefID" : parseInt(document.getElementById("dataInput_CurrentWorkFlowPath_RefID").value), '.
                        '"currentSequence" : parseInt(document.getElementById("dataInput_CurrentSequence").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value '.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }