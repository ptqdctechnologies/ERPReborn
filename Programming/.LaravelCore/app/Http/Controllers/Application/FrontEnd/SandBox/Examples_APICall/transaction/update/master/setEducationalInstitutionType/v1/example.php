<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\master                    |
|                 \setEducationalInstitutionType\v1                                                                                |
| ▪ API Key     : transaction.update.master.setEducationalInstitutionType                                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\master\setEducationalInstitutionType\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.master.setEducationalInstitutionType.v1_throughAPIGateway        |
        |                     ► http://172.28.0.4/transaction.update.master.setEducationalInstitutionType.v1_throughAPIGateway     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-03                                                                                           |
        | ▪ Creation Date   : 2025-01-03                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGateway($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            $varData =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.update.master.setEducationalInstitutionType', 
                    'latest', 
                    [
                    'recordID' => 265000000000001,
                    'entities' => [
                        "name" => 'Educational Institution Type Name Update'
                        ]
                    ]
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.master.setEducationalInstitutionType.v1_throughAPIGatewayJQuery  |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.master.setEducationalInstitutionType.v1_throughAPIGatewayJQuery                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-03                                                                                           |
        | ▪ Creation Date   : 2025-01-03                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Java Script Library Load---
            echo
                \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()
                    );

            //---Core---
            echo '<input type="text" id="dataInput_RecordID" value=265000000000001>';
            echo '<input type="text" id="dataInput_Name" value="Educational Institution Type Update">';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                    $varAPIWebToken, 
                    'transaction.update.master.setEducationalInstitutionType', 
                    'latest', 
                    '{'.
                        '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                        '"entities" : {'.
                            '"name" : document.getElementById("dataInput_Name").value'.
                            '}'.
                    '}'
                    ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }