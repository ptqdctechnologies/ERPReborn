<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\project                   |
|                 \setProjectProgress\v1                                                                                           |
| ▪ API Key     : transaction.create.project.setProjectProgress                                                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\project\setProjectProgress\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.project.setProjectProgress.v1_throughAPIGateway                  |
        |                     ► http://172.28.0.4/transaction.create.project.setProjectProgress.v1_throughAPIGateway               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-09-24                                                                                           |
        | ▪ Creation Date   : 2026-09-24                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //-----[ PARAMETER SET ]------------------------------------------------------------------------------------------------
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            //-----[ CORE PROCESS ]-------------------------------------------------------------------------------------------------
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    //-----[ METADATA ]-------------------------------------------------( START )-----
                        $varAPIWebToken,
                        'transaction.create.project.setProjectProgress',
                        'latest',
                    //-----[ METADATA ]-------------------------------------------------(  END  )-----

                    //-----[ DATA ]-----------------------------------------------------( START )-----
                        [
                        'entities' => [
                            "project_RefID" => 46000000000033,
                            "startDateTimeTZ" => '2026-09-20',
                            "finishDateTimeTZ" => '2026-09-22',
                            "annotation" => null,
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "projectProgress_RefID" => 309000000000001,
                                                "projectSectionItem_RefID" => 143000000000305,
                                                "progressCompletion" => 25.2,
                                                "annotation" => 'My Annotation 1'
                                                ]
                                            ],
                                            [
                                            "entities" => [
                                                "projectProgress_RefID" => 309000000000001,
                                                "projectSectionItem_RefID" => 143000000000306,
                                                "progressCompletion" => 10.7,
                                                "annotation" => 'My Annotation 2'
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    //-----[ DATA ]-----------------------------------------------------(  END  )-----
                    );

            //-----[ DATA RETURN ]--------------------------------------------------------------------------------------------------
            return
                $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.project.setProjectProgress.v1_throughAPIGatewayJQuery                    |
        |                     ► http://172.28.0.4/transaction.create.project.setProjectProgress.v1_throughAPIGatewayJQuery                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-19                                                                                           |
        | ▪ Creation Date   : 2022-09-19                                                                                           |
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
                    'transaction.create.project.setProjectProgress', 
                    'latest', 
                    '{'.
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