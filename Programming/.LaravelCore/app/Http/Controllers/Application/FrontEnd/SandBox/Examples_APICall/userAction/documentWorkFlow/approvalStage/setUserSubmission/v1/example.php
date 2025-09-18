<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\userAction\documentWorkFlow\approvalStage    |
|                 \setUserSubmission\v1                                                                                            |
| ▪ API Key     : userAction.documentWorkFlow.approvalStage.setUserSubmission                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\userAction\documentWorkFlow\approvalStage\setUserSubmission\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     userAction.documentWorkFlow.approvalStage.setUserSubmission.v1_throughAPIGateway                     |
        |                     ► http://172.28.0.4/userAction.documentWorkFlow.approvalStage.setUserSubmission.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2025-09-17                                                                                           |
        | ▪ Creation Date   : 2023-03-07                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]-----
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //-----[ CORE ]-----
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    //-----[ METADATA ]-----( START )-----
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken, 
                        'userAction.documentWorkFlow.approvalStage.setUserSubmission', 
                        'latest',
                    //-----[ METADATA ]-----(  END  )-----

                    //-----[ DATA ]---------( START )-----
                        [
                        'entities' => [
                            "businessDocument_RefID" => 74000000020323,
                            "workFlowPath_RefID" => 116000000000001,
                            "remarks" => "xxx'xxx",
                            // "remarks" => null,
                            "approverEntity_RefID" => 164000000000023

                            // "businessDocument_RefID" => 74000000020456,
                            // "workFlowPath_RefID" => 116000000000004,
                            // "remarks" => null,
                            // "approverEntity_RefID" => 164000000000514
                            ]
                        ]
                    //-----[ DATA ]---------(  END  )-----
                    );

            //-----[ DATA RETURN ]-----
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     userAction.documentWorkFlow.approvalStage.setUserSubmission.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       userAction.documentWorkFlow.approvalStage.setUserSubmission.v1_throughAPIGatewayJQuery             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-03-07                                                                                           |
        | ▪ Creation Date   : 2023-03-07                                                                                           |
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
            echo '<tr><td>Business&nbsp;Document&nbsp;RefID</td><td><input type="text" id="dataInput_BusinessDocument_RefID" value=74000000020323></td></tr>';
            echo '<tr><td>WorkFlow&nbsp;Path&nbsp;RefID</td><td><input type="text" id="dataInput_WorkFlowPath_RefID" value=116000000000001></td></tr>';
            echo '<tr><td>Remarks</td><td><input type="text" id="dataInput_Remarks" value=""></td></tr>';
            echo '<tr><td>Approver&nbsp;Entity&nbsp;RefID</td><td><input type="text" id="dataInput_ApproverEntity_RefID" value=164000000000023></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'userAction.documentWorkFlow.approvalStage.setUserSubmission', 
                'latest', 
                '{'.
                    '"entities" : {'.
                        '"businessDocument_RefID" : parseInt(document.getElementById("dataInput_BusinessDocument_RefID").value), '.
                        '"workFlowPath_RefID" : parseInt(document.getElementById("dataInput_WorkFlowPath_RefID").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value, '.
                        '"approverEntity_RefID" : parseInt(document.getElementById("dataInput_ApproverEntity_RefID").value) '.
                        '}'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }