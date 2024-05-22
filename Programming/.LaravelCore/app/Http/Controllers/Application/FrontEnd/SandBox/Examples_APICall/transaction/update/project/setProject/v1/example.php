<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\project\setProject\v1     |
| ▪ API Key     : transaction.update.project.setProject                                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\project\setProject\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.project.setProject.v1_throughAPIGateway                          |
        |                     ► http://172.28.0.4/transaction.update.project.setProject.v1_throughAPIGateway                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-14                                                                                           |
        | ▪ Creation Date   : 2024-05-14                                                                                           |
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
                    'transaction.update.project.setProject', 
                    'latest', 
                    [
                    'recordID' => 46000000000034,
                    'entities' => [
                        "name" => 'Project XYZ',
                        "materialProductAssembly_RefID" => null,
                        "validStartDateTimeTZ" => '2024-05-01',
                        "validFinishDateTimeTZ" => null,
                        "code" => 'Qxxxxx'
                        ]
                    ]
                    );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.project.setProject.v1_throughAPIGatewayJQuery                    |
        |                     ► http://172.28.0.4/transaction.update.project.setProject.v1_throughAPIGatewayJQuery                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-14                                                                                           |
        | ▪ Creation Date   : 2024-05-14                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Project Main Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=46000000000034></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Project XYZ"></td></tr>';
            echo        '<tr><td>MaterialProductAssembly_RefID</td><td><input type="text" id="dataInput_MaterialProductAssembly_RefID" value=""></td></tr>';
            echo        '<tr><td>ValidStartDateTimeTZ</td><td><input type="text" id="dataInput_ValidStartDateTimeTZ" value="2009-04-17 00:00:00+07"></td></tr>';
            echo        '<tr><td>ValidFinishDateTimeTZ</td><td><input type="text" id="dataInput_ValidFinishDateTimeTZ" value="9999-12-31 23:59:59+07"></td></tr>';
            echo        '<tr><td>Code</td><td><input type="text" id="dataInput_Code" value="Qxxxxx">';
            echo '</table><br>';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.update.project.setProject', 
                    'latest', 
                    '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"name" : document.getElementById("dataInput_Name").value, '.
                            '"materialProductAssembly_RefID" : parseInt(document.getElementById("dataInput_MaterialProductAssembly_RefID").value), '.
                            '"validStartDateTimeTZ" : document.getElementById("dataInput_ValidStartDateTimeTZ").value, '.
                            '"validFinishDateTimeTZ" : document.getElementById("dataInput_ValidFinishDateTimeTZ").value, '.
                            '"code" : document.getElementById("dataInput_Code").value'.
                            '}'.
                    '}'
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }