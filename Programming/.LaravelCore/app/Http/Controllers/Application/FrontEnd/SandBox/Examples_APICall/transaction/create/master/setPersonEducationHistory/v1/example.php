<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master                    |
|                 \setPersonEducationHistory\v1                                                                                    |
| ▪ API Key     : transaction.create.master.setPersonEducationHistory                                                              |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master\setPersonEducationHistory\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setPersonEducationHistory.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/transaction.create.master.setPersonEducationHistory.v1_throughAPIGateway         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-07                                                                                           |
        | ▪ Creation Date   : 2025-01-07                                                                                           |
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
                    'transaction.create.master.setPersonEducationHistory', 
                    'latest', 
                    [
                    'entities' => [
                        "person_RefID" => 25000000000439,
                        "educationalInstitution_RefID" => 265000000000001,
                        "educationalLevel_RefID" => 266000000000003,
                        "personDegree_RefID" => null,
                        "startDateTimeTZ" => null,
                        "startYear" => 1987,
                        "finishDateTimeTZ" => null,
                        "finishYear" => 1993,
                        "annotation" => null
                        ]
                    ]
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setPersonEducationHistory.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/transaction.create.master.setPersonEducationHistory.v1_throughAPIGatewayJQuery   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-07                                                                                           |
        | ▪ Creation Date   : 2025-01-07                                                                                           |
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
            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Person Education History Main Data</p></td></tr>';
            echo        '<tr><td>Person_RefID</td><td><input type="text" id="dataInput_Person_RefID" value="25000000000439"></td></tr>';
            echo        '<tr><td>EducationalInstitution_RefID</td><td><input type="text" id="dataInput_EducationalInstitution_RefID" value="265000000000001"></td></tr>';
            echo        '<tr><td>EducationalLevel_RefID</td><td><input type="text" id="dataInput_EducationalLevel_RefID" value="266000000000003"></td></tr>';
            echo        '<tr><td>PersonDegree_RefID</td><td><input type="text" id="dataInput_PersonDegree_RefID" value=""></td></tr>';
            echo        '<tr><td>StartDateTimeTZ</td><td><input type="text" id="dataInput_StartDateTimeTZ" value=""></td></tr>';
            echo        '<tr><td>StartYear</td><td><input type="text" id="dataInput_StartYear" value="1987"></td></tr>';
            echo        '<tr><td>FinishDateTimeTZ</td><td><input type="text" id="dataInput_FinishDateTimeTZ" value=""></td></tr>';
            echo        '<tr><td>FinishYear</td><td><input type="text" id="dataInput_FinishYear" value="1993"></td></tr>';
            echo        '<tr><td>Annotation</td><td><input type="text" id="dataInput_Annotation" value=""></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.create.master.setPersonEducationHistory', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"person_RefID" : parseInt(document.getElementById("dataInput_Person_RefID").value), '.
                            '"educationalInstitution_RefID" : parseInt(document.getElementById("dataInput_EducationalInstitution_RefID").value), '.
                            '"educationalLevel_RefID" : parseInt(document.getElementById("dataInput_EducationalLevel_RefID").value), '.
                            '"personDegree_RefID" : parseInt(document.getElementById("dataInput_PersonDegree_RefID").value), '.
                            '"startDateTimeTZ" : document.getElementById("dataInput_StartDateTimeTZ").value, '.
                            '"startYear" : parseInt(document.getElementById("dataInput_StartYear").value), '.
                            '"finishDateTimeTZ" : document.getElementById("dataInput_FinishDateTimeTZ").value, '.
                            '"finishYear" : parseInt(document.getElementById("dataInput_FinishYear").value), '.
                            '"annotation" : document.getElementById("dataInput_Annotation").value'.
                            '}'.
                    '}'
                    ); 
            echo "<br><button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            //dd($varJQueryFunction);
            }
        }
    }