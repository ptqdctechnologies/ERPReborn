<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\sysConfig                       |
|                 \getBusinessDocumentTypeWorkFlowPath\v1                                                                          |
| ▪ API Key     : dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\dataPickList\sysConfig\getBusinessDocumentTypeWorkFlowPath\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath.v1_throughAPIGateway     |
        |                     ► http://172.28.0.4/dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath.v1_throughAPIGateway  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-26                                                                                           |
        | ▪ Creation Date   : 2023-01-26                                                                                           |
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
                'dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath', 
                'latest',
                [
                'parameter' => [
                    'businessDocumentType_RefID' => 77000000000057,
                    'submitterEntity_RefID' => 164000000000023
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath.v1_throughAPIGatewayJQuery   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath.v1_throughAPIGatewayJQuery                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-01-26                                                                                           |
        | ▪ Creation Date   : 2023-01-26                                                                                           |
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
            echo '<tr><td>Business&nbsp;Document&nbsp;Type&nbsp;RefID</td><td><input type="text" id="dataInput_parameter_businessDocumentType_RefID" value=77000000000057></td></tr>';
            echo '<tr><td>Submitter&nbsp;Entity&nbsp;RefID</td><td><input type="text" id="dataInput_parameter_submitterEntity_RefID" value=164000000000023></td></tr>';
            echo '</table>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'dataPickList.sysConfig.getBusinessDocumentTypeWorkFlowPath', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"businessDocumentType_RefID" : parseInt(document.getElementById("dataInput_parameter_businessDocumentType_RefID").value), '.
                        '"submitterEntity_RefID" : parseInt(document.getElementById("dataInput_parameter_submitterEntity_RefID").value)'.
                        '}'.
                '}'
                );            
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }