<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\project                   |
|                 \setProjectSectionItemWork\v1                                                                                    |
| ▪ API Key     : transaction.update.project.setProjectSectionItemWork                                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\project\setProjectSectionItemWork\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.project.setProjectSectionItemWork.v1_throughAPIGateway           |
        |                     ► http://172.28.0.4/transaction.update.project.setProjectSectionItemWork.v1_throughAPIGateway        |
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
                'transaction.update.project.setProjectSectionItemWork', 
                'latest', 
                [
                'recordID' => 158000000000001,
                'entities' => [
                    'businessDocumentVersion_RefID' => 75000000369648,
                    'projectSectionItem_RefID' => 143000000000001,
                    'name' => 'Material for Finishing',
                    'materialProductAssembly_RefID' => 146000000000003,
                    'code' => '409'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.project.setProjectSectionItemWork.v1_throughAPIGatewayJQuery     |
        |                     ► http://172.28.0.4/transaction.update.project.setProjectSectionItemWork.v1_throughAPIGatewayJQuery  |
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
            echo '<input type="text" id="dataInput_RecordID" value=158000000000001>';
            echo '<input type="text" id="dataInput_BusinessDocumentVersion_RefID" value=75000000369648>';
            echo '<input type="text" id="dataInput_ProjectSectionItem_RefID" value=143000000000001ss>';
            echo '<input type="text" id="dataInput_Name" value="Material for Finishing">';
            echo '<input type="text" id="dataInput_ProjectSectionItem_RefID" value=146000000000003>';
            echo '<input type="text" id="dataInput_Code" value="409">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.project.setProjectSectionItemWork', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"businessDocumentVersion_RefID" : parseInt(document.getElementById("dataInput_BusinessDocumentVersion_RefID").value), '.
                        '"projectSectionItem_RefID" : parseInt(document.getElementById("dataInput_ProjectSectionItem_RefID").value), '.
                        '"name" : document.getElementById("dataInput_Name").value, '.
                        '"materialProductAssembly_RefID" : parseInt(document.getElementById("dataInput_MaterialProductAssembly_RefID").value), '.
                        '"code" : document.getElementById("dataInput_Code").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }