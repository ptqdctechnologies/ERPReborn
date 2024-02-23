<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\authentication\userPrivilege\getMenuLayout   |
|                 \v1                                                                                                              |
| ▪ API Key     : authentication.userPrivilege.getMenuLayout                                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\authentication\userPrivilege\getMenuLayout\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/authentication.userPrivilege.getMenuLayout.v1_throughAPIGateway                     |
        |                     ► http://172.28.0.4/authentication.userPrivilege.getMenuLayout.v1_throughAPIGateway                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-02-23                                                                                           |
        | ▪ Creation Date   : 2024-02-23                                                                                           |
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
                'authentication.userPrivilege.getMenuLayout', 
                'latest', 
                [
                'parameter' => [
                    'branch_RefID' => 11000000000004,
                    'user_RefID' => 4000000000359
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/authentication.userPrivilege.getMenuLayout.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/authentication.userPrivilege.getMenuLayout.v1_throughAPIGatewayJQuery            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-02-23                                                                                           |
        | ▪ Creation Date   : 2024-02-23                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            $varBranch_RefID = 11000000000004;
            $varUser_RefID = 4000000000359;
            
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            echo '<tr><td>Branch&nbsp;RefID</td><td><input type="text" id="dataInput_Branch_RefID" value="'.$varBranch_RefID.'"></td></tr>';
            echo '<tr><td>User&nbsp;RefID</td><td><input type="text" id="dataInput_User_RefID" value="'.$varUser_RefID.'"></td></tr>';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '</table>';

            //---Core---          
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'authentication.userPrivilege.getMenuLayout', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"branch_RefID" : parseInt(document.getElementById("dataInput_Branch_RefID").value), '.
                        '"user_RefID" : parseInt(document.getElementById("dataInput_User_RefID").value)'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }