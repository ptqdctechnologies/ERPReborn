<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain               |
|                 \setWarehouseOutboundOrder\v1                                                                                    |
| ▪ API Key     : transaction.create.supplyChain.setWarehouseOutboundOrder                                                         |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 Rizal (rizal.devapps@gmail.com)                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain\setWarehouseOutboundOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setWarehouseOutboundOrder.v1_throughAPIGateway       |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setWarehouseOutboundOrder.v1_throughAPIGateway    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-02                                                                                           |
        | ▪ Creation Date   : 2025-10-02                                                                                           |
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
                    'transaction.create.supplyChain.setWarehouseOutboundOrder',
                    'latest',
                    [
                    'entities' => [
                        'documentDateTimeTZ' => '2025-06-18',
                        'log_FileUpload_Pointer_RefID' => null,
                        'requesterWorkerJobsPosition_RefID' => 164000000000497,
                        'transporter_RefID' => 284000000000006,
                        'remarks' => 'Catatan Test 11',
                        'additionalData' => [
                            'itemList' => [
                                'items' => [
                                        [
                                        'entities' => [
                                            'warehouseInboundOrderDetail_RefID' => 177000000000001,
                                            'quantity' => 25,
                                            'note' => 'Catatan Detail - 11',
                                            ]
                                        ],
                                    ]
                                ]
                            ]
                        ]
                    ]
                    );

            return $varData;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setWarehouseOutboundOrder.v1_throughAPIGatewayJQuery              |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setWarehouseOutboundOrder.v1_throughAPIGatewayJQuery           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-02                                                                                           |
        | ▪ Creation Date   : 2025-10-02                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Warehouse Main Data</p></td></tr>';
            echo        '<tr><td>InstitutionBranch_RefID</td><td><input type="text" id="dataInput_InstitutionBranch_RefID" value="124000000000001"></td></tr>';
            echo        '<tr><td>Name</td><td><input type="text" id="dataInput_Name" value="Head Office - Gudang Mampang"></td></tr>';
            echo        '<tr><td>WarehouseType_RefID</td><td><input type="text" id="dataInput_WarehouseType_RefID" value="172000000000001"></td></tr>';
            echo        '<tr><td>Address</td><td><input type="text" id="dataInput_Address" value="Graha Sentra Mampang QDC, Jl. Mampang Prapatan Raya No. 28 Blok C"></td></tr>';
            echo        '<tr><td>CountryAdministrativeArea_RefID</td><td><input type="text" id="dataInput_CountryAdministrativeArea_RefID" value="24000000032481"></td></tr>';
            echo        '<tr><td>Postal Code</td><td><input type="text" id="dataInput_PostalCode" value="12790"></td></tr>';
            echo        '<tr><td>GPSPoint</td><td><input type="text" id="dataInput_GPSPoint" value="(-6.240978, 106.826181)"></td></tr>';
            echo        '<tr><td>Code</td><td><input type="text" id="dataInput_Code" value="WH-MAPG"></td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.create.supplyChain.setWarehouseOutboundOrder',
                    'latest',
                    '{'.
                        '"entities" : {'.
                            '"institutionBranch_RefID" : parseInt(document.getElementById("dataInput_InstitutionBranch_RefID").value), '.
                            '"name" : document.getElementById("dataInput_Name").value, '.
                            '"warehouseType_RefID" : parseInt(document.getElementById("dataInput_WarehouseType_RefID").value), '.
                            '"address" : document.getElementById("dataInput_Address").value, '.
                            '"countryAdministrativeArea_RefID" : parseInt(document.getElementById("dataInput_CountryAdministrativeArea_RefID").value), '.
                            '"postalCode" : document.getElementById("dataInput_PostalCode").value, '.
                            '"GPSPoint" : document.getElementById("dataInput_GPSPoint").value, '.
                            '"code" : document.getElementById("dataInput_Code").value'.
                            '}'.
                    '}'
                    );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";

            dd($varJQueryFunction);
            }
        }
    }
