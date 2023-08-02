<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\authentication\userPrivilege\getRole\v1      |
| ▪ API Key     : authentication.userPrivilege.getRole                                                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2023 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\authentication\userPrivilege\getRole\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/authentication.userPrivilege.getRole.v1_throughAPIGateway                           |
        |                     ► http://172.28.0.4/authentication.userPrivilege.getRole.v1_throughAPIGateway                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
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
                'authentication.userPrivilege.getRole', 
                'latest', 
                [
                'parameter' => [
                    'user_RefID' => 4000000000002,
                    'branch_RefID' => 11000000000004,
                    'dateTimeTZ' => null
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/authentication.userPrivilege.getRole.v1_throughAPIGatewayJQuery                     |
        |                     ► http://172.28.0.4/authentication.userPrivilege.getRole.v1_throughAPIGatewayJQuery                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2023-07-31                                                                                           |
        | ▪ Creation Date   : 2023-07-31                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }

            $varUser_RefID = 4000000000399;
            $varBranch_RefID = 11000000000004;
            $varDateTimeTZ = null;
            
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<table border="1" style="border-collapse: collapse;">';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Parameter</p></td></tr>';
            echo '<tr><td>User&nbsp;RefID</td><td><input type="text" id="dataInput_User_RefID" value="'.$varUser_RefID.'"></td></tr>';
            echo '<tr><td>Branch&nbsp;RefID</td><td><input type="text" id="dataInput_Branch_RefID" value="'.$varBranch_RefID.'"></td></tr>';
            echo '<tr><td>DateTimeTZ</td><td><input type="text" id="dataInput_DateTimeTZ" value="'.$varDateTimeTZ.'"></td></tr>';
            echo '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">SQL Statement</p></td></tr>';
            echo '</table>';

            //---Core---          
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'authentication.userPrivilege.getRole', 
                'latest', 
                '{'.
                    '"parameter" : {'.
                        '"user_RefID" : parseInt(document.getElementById("dataInput_User_RefID").value), '.
                        '"branch_RefID" : parseInt(document.getElementById("dataInput_Branch_RefID").value), '.
                        '"dateTimeTZ" : document.getElementById("dataInput_DateTimeTZ").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }