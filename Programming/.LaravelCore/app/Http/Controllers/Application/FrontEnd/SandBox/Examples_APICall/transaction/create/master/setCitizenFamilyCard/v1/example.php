<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master                    |
|                 \setCitizenFamilyCard\v1                                                                                         |
| ▪ API Key     : transaction.create.master.setCitizenFamilyCard                                                                   |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\master\setCitizenFamilyCard\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setCitizenFamilyCard.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/transaction.create.master.setCitizenFamilyCard.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
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
                    'transaction.create.master.setCitizenFamilyCard', 
                    'latest', 
                    [
                    'entities' => [
                        'log_FileUpload_Pointer_RefID' => null,
                        'cardNumber' => '3174091701099012',
                        'issuedDate' => '2017-01-24',
                        'addressCountryAdministrativeAreaLevel1_RefID' => 21000000000013,
                        'addressCountryAdministrativeAreaLevel2_RefID' => 22000000000192,
                        'addressCountryAdministrativeAreaLevel3_RefID' => 23000000002670,
                        'addressCountryAdministrativeAreaLevel4_RefID' => 27000000000003,
                        'address' => 'Jl. Rancho Indah No. 26F',
                        'addressNeighbourhoodNumber' => 002,
                        'addressHamletNumber' => 002,
                        'postalCode' => '12530',
                        'cardSerialNumber' => 'K 3100 6431728'    
                        ]
                    ]
                    );

            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.master.setCitizenFamilyCard.v1_throughAPIGatewayJQuery           |
        |                     ► http://172.28.0.4/transaction.create.master.setCitizenFamilyCard.v1_throughAPIGatewayJQuery        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-21                                                                                           |
        | ▪ Creation Date   : 2022-07-21                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

/*
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            $varFileUpload_UniqueID = 'Upload';
            echo '<br>Log FileUpload Pointer RefID ► '.
//                '<input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readOnly="true">'.
                '<input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readOnly="true">'.
                '<input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" '.
                    'onChange="javascript:'.
                        \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                            $varAPIWebToken, 
                            $varFileUpload_UniqueID, 
                            'dataInput_Log_FileUpload_Pointer_RefID', 
                            'null',
                            'dataShow_ActionPanel', 
                            'dataShow_MasterFileRecord'
                            ).
                    ';" />'.
                '<div id="dataShow_MasterFileRecord" style="border-style:solid; border-width:1px;"></div>'.
                '<div id="dataShow_ActionPanel" style="border-style:solid; border-width:1px;" onLoad="javascript:alert(\'xxx\');"></div>';

            echo '<br><br><button onclick="javascript: JSFunc_GetActionPanel_CommitFromOutside_'.$varFileUpload_UniqueID.'();">TEST COMMIT FROM OUTSIDE</button><br><br>';
*/
            
//91000000000023
/*
echo '<div style="position: relative; z-index: 3">Hello world</div>';
            echo '<br>Log FileUpload Pointer RefID2 ► '.
                '<input type="text" id="dataInput_Log_FileUpload_Pointer_RefID2" value="" readOnly="true">'.
                '<input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action2" multiple="multiple" '.
                    'onChange="javascript:'.\App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload2', 'dataInput_Log_FileUpload_Pointer_RefID2', 'dataShow_ActionPanel2', 'dataShow_MasterFileRecord2').';" />'.
                '<div id="dataShow_MasterFileRecord2" style="border-style:solid; border-width:1px;"></div>'.
                '<div id="dataShow_ActionPanel2" style="border-style:solid; border-width:1px;"></div>';
*/
            echo 
                '<script type="text/javascript">'.
                    'window.onload = function() {'.
                        //'document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action").dispatchEvent(new Event("change"));'.
                        //'document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action2").dispatchEvent(new Event("change"));'.
                        '}; '.
                '</script>';

            echo '<input type=\'text\' id = \'xxx\'>';           
            echo '<br>Log FileUpload Pointer RefID ► '.
                \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'dataInput_Log_FileUpload_1',
                    '91000000000001',
                    //'91000000000272',
                    'xxx'
                    ).
                    '';

            echo '<br>Log FileUpload Pointer RefID 2 ► '.
                \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'dataInput_Log_FileUpload_2',
                    '264000000000228'
                    //'yyyy'
                    ).
                    '';

            
            
            echo '<br>Card Number ► '.
                '<input type="text" id="dataInput_CardNumber" value="3174091701099012">';
            echo '<br>Issued Date ► '.
                '<input type="text" id="dataInput_IssuedDate" value="2017-01-24">';
            echo '<br>Address Country Administrative Area Level 1 RefID (Propinsi) ► '.
                '<input type="text" id="dataInput_AddressCountryAdministrativeAreaLevel1_RefID" value=21000000000013>';
            echo '<br>Address Country Administrative Area Level 2 RefID (Kota/Kabupaten) ► '.
                '<input type="text" id="dataInput_AddressCountryAdministrativeAreaLevel2_RefID" value=22000000000192>';
            echo '<br>Address Country Administrative Area Level 3 RefID (Kecamatan) ► '.
                '<input type="text" id="dataInput_AddressCountryAdministrativeAreaLevel3_RefID" value=23000000002670>';
            echo '<br>Address Country Administrative Area Level 4 RefID (Kelurahan/Desa) ► '.
                '<input type="text" id="dataInput_AddressCountryAdministrativeAreaLevel4_RefID" value=24000000055092>';
            echo '<br>Address ► '.
                '<input type="text" id="dataInput_Address" value="Jl. Rancho Indah No. 26F">';
            echo '<br>Address Neighbourhood Number (RT) ► '.
                '<input type="text" id="dataInput_AddressNeighbourhoodNumber" value=002>';
            echo '<br>Address Hamlet Number (RW) ► '.
                '<input type="text" id="dataInput_AddressHamletNumber" value=002>';
            echo '<br>Postal Code (Kode Pos) ► '.
                '<input type="text" id="dataInput_PostalCode" value="12530">';
            echo '<br>Card Serial Number ► '.
                '<input type="text" id="dataInput_CardSerialNumber" value="K 3100 6431728">';
                        
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken, 
                    'transaction.create.master.setCitizenFamilyCard', 
                    'latest', 
                    '{'.
                        '"entities" : {'.
                            '"log_FileUpload_Pointer_RefID" : document.getElementById("dataInput_Log_FileUpload_Pointer_RefID").value, '.
                            '"cardNumber" : document.getElementById("dataInput_CardNumber").value, '.
                            '"issuedDate" : document.getElementById("dataInput_IssuedDate").value, '.
                            '"addressCountryAdministrativeAreaLevel1_RefID" : parseInt(document.getElementById("dataInput_AddressCountryAdministrativeAreaLevel1_RefID").value), '.
                            '"addressCountryAdministrativeAreaLevel2_RefID" : parseInt(document.getElementById("dataInput_AddressCountryAdministrativeAreaLevel2_RefID").value), '.
                            '"addressCountryAdministrativeAreaLevel3_RefID" : parseInt(document.getElementById("dataInput_AddressCountryAdministrativeAreaLevel3_RefID").value), '.
                            '"addressCountryAdministrativeAreaLevel4_RefID" : parseInt(document.getElementById("dataInput_AddressCountryAdministrativeAreaLevel4_RefID").value), '.
                            '"address" : document.getElementById("dataInput_Address").value, '.
                            '"addressNeighbourhoodNumber" : parseInt(document.getElementById("dataInput_AddressNeighbourhoodNumber").value), '.
                            '"addressHamletNumber" : parseInt(document.getElementById("dataInput_AddressHamletNumber").value), '.
                            '"postalCode" : document.getElementById("dataInput_PostalCode").value, '.
                            '"cardSerialNumber" : document.getElementById("dataInput_CardSerialNumber").value'.
                            '}'.
                    '}'
                    ); 
            echo "<br><button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            //dd($varJQueryFunction);
            }
        }
    }