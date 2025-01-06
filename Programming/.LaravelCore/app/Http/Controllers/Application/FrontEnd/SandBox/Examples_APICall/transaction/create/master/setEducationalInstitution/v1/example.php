<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master                    |
|                 \setEducationalInstitution\v1                                                                                    |
| ▪ API Key     : transaction.create.master.setEducationalInstitution                                                              |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master\setEducationalInstitution\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setEducationalInstitution.v1_throughAPIGateway            |
        |                     ► http://172.28.0.4/transaction.create.master.setEducationalInstitution.v1_throughAPIGateway         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-06                                                                                           |
        | ▪ Creation Date   : 2025-01-06                                                                                           |
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
                    'transaction.create.master.setEducationalInstitution', 
                    'latest', 
                    [
                    'entities' => [
                        "name" => 'SDN Tanjung Barat 05 Pagi',
                        "educationalInstitutionType_RefID" => 265000000000002,
                        "address" => 'Jl. Rancho Indah RT 001 RW 002 No. 42',
                        "countryAdministrativeArea_RefID" => 21000000000013,
                        "postalCode" => '12530'
                        ]
                    ]
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setEducationalInstitution.v1_throughAPIGatewayJQuery      |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.master.setEducationalInstitution.v1_throughAPIGatewayJQuery                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-01-06                                                                                           |
        | ▪ Creation Date   : 2025-01-06                                                                                           |
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
            echo '<input type="text" id="dataInput_Name" value="SDN Tanjung Barat 05 Pagi">';
            echo '<input type="text" id="dataInput_EducationalInstitutionType_RefID" value="265000000000002">';
            echo '<input type="text" id="dataInput_Address" value="Jl. Rancho Indah RT 001 RW 002 No. 42">';
            echo '<input type="text" id="dataInput_CountryAdministrativeArea_RefID" value="21000000000013">';
            echo '<input type="text" id="dataInput_PostalCode" value="12530">';
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.create.master.setEducationalInstitution', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"name" : document.getElementById("dataInput_Name").value, '.
                            '"educationalInstitutionType_RefID" : parseInt(document.getElementById("dataInput_EducationalInstitutionType_RefID").value), '.
                            '"address" : document.getElementById("dataInput_Address").value, '.
                            '"countryAdministrativeArea_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeArea_RefID").value), '.
                            '"postalCode" : document.getElementById("dataInput_PostalCode").value'.
                            '}'.
                    '}'
                    ); 
            echo "<br><button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            //dd($varJQueryFunction);
            }
        }
    }