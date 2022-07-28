<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\project\setProjectSection |
|                 \v1                                                                                                              |
| ▪ API Key     : transaction.update.project.setProjectSection                                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\project\setProjectSection\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.project.setProjectSection.v1_throughAPIGateway                   |
        |                     ► http://172.28.0.4/transaction.update.project.setProjectSection.v1_throughAPIGateway                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
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
                'transaction.update.project.setProjectSection', 
                'latest', 
                [
                'recordID' => 110000000000001,
                'entities' => [
                    'businessDocumentVersion_RefID' => 75000000001609,
                    'project_RefID' => 46000000000001,
                    'name' => 'Non Section'
                    ]
                ]
                );
            var_dump($varData);
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.project.setProjectSection.v1_throughAPIGatewayJQuery             |
        |                     ► http://172.28.0.4/transaction.update.project.setProjectSection.v1_throughAPIGatewayJQuery          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-28                                                                                           |
        | ▪ Creation Date   : 2022-07-28                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=110000000000001>';
            echo '<input type="text" id="dataInput_BusinessDocumentVersion_RefID" value=75000000001609>';
            echo '<input type="text" id="dataInput_Project_RefID" value=46000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Non Section">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.project.setProjectSection', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"businessDocumentVersion_RefID" : parseInt(document.getElementById("dataInput_BusinessDocumentVersion_RefID").value), '.
                        '"project_RefID" : parseInt(document.getElementById("dataInput_Project_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }