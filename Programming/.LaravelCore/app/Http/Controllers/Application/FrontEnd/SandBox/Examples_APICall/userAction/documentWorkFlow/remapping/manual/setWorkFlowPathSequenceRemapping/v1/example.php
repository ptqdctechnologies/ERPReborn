<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\userAction\documentWorkFlow\remapping        |
|                 \manual\setWorkFlowPathSequenceRemapping\v1                                                                      |
| ▪ API Key     : userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\userAction\documentWorkFlow\remapping\manual\setWorkFlowPathSequenceRemapping\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping.v1_throughAPIGateway   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-20                                                                                           |
        | ▪ Creation Date   : 2023-03-20                                                                                           |
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
                'userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping', 
                'latest', 
                [
                'entities' => [
                    "sourceWorkFlowPathSequence_RefID" => 117000000000001,
                    "destinationWorkFlowPathSequence_RefID" => 117000000000010,
                    "remarks" => null
                    ]
                ]                    
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping.                       |
        |                     v1_throughAPIGatewayJQuery                                                                           |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping.                     |
        |                       v1_throughAPIGatewayJQuery                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0001.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-20                                                                                           |
        | ▪ Creation Date   : 2023-03-20                                                                                           |
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
            echo        '<tr><td>SourceWorkFlowPathSequence_RefID</td><td><input type="text" id="dataInput_SourceWorkFlowPathSequence_RefID" value=117000000000001></td></tr>';
            echo        '<tr><td>DestinationWorkFlowPathSequence_RefID</td><td><input type="text" id="dataInput_DestinationWorkFlowPathSequence_RefID" value=117000000000010></td></tr>';
            echo        '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value=""></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'userAction.documentWorkFlow.remapping.manual.setWorkFlowPathSequenceRemapping', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"sourceWorkFlowPathSequence_RefID" : parseInt(document.getElementById("dataInput_SourceWorkFlowPathSequence_RefID").value), '.
                        '"destinationWorkFlowPathSequence_RefID" : parseInt(document.getElementById("dataInput_DestinationWorkFlowPathSequence_RefID").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value '.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }