<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\production                |
|                 \setBillOfMaterialDetail\v1                                                                                      |
| ▪ API Key     : transaction.update.production.setBillOfMaterialDetail                                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\production\setBillOfMaterialDetail\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.production.setBillOfMaterialDetail.v1_throughAPIGateway          |
        |                     ► http://172.28.0.4/transaction.update.production.setBillOfMaterialDetail.v1_throughAPIGateway       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-27                                                                                           |
        | ▪ Creation Date   : 2024-05-27                                                                                           |
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
                'transaction.update.production.setBillOfMaterialDetail', 
                'latest', 
                [
                'recordID' => 148000000007014,
                'entities' => [
                    "billOfMaterial_RefID" => 147000000003699,
                    "materialProduct_RefID" => 159000000000018,
                    "quantity" => 10,
                    "unitPriceCurrency_RefID" => 62000000000001,
                    "unitPriceCurrencyValue" => 1000,
                    "unitPriceCurrencyExchangeRate" => 1
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.production.setBillOfMaterialDetail.v1_throughAPIGatewayJQuery    |
        |                     ► http://172.28.0.4/transaction.update.production.setBillOfMaterialDetail.v1_throughAPIGatewayJQuery |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-05-27                                                                                           |
        | ▪ Creation Date   : 2024-05-27                                                                                           |
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
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Bill Of Material Detail Data</p></td></tr>';
            echo        '<tr><td>RecordID</td><td><input type="text" id="dataInput_RecordID" value=148000000007014></td></tr>';
            echo        '<tr><td>BillOfMaterial_RefID</td><td><input type="text" id="dataInput_BillOfMaterial_RefID" value="147000000003699"></td></tr>';
            echo        '<tr><td>MaterialProduct_RefID</td><td><input type="text" id="dataInput_MaterialProduct_RefID" value="159000000000018"></td></tr>';
            echo        '<tr><td>Quantity</td><td><input type="text" id="dataInput_Quantity" value="10"></td></tr>';
            echo        '<tr><td>UnitPriceCurrency_RefID</td><td><input type="text" id="dataInput_UnitPriceCurrency_RefID" value="62000000000001"></td></tr>';
            echo        '<tr><td>UnitPriceCurrencyValue</td><td><input type="text" id="dataInput_UnitPriceCurrencyValue" value="1000"></td></tr>';
            echo        '<tr><td>UnitPriceCurrencyExchangeRate</td><td><input type="text" id="dataInput_UnitPriceCurrencyExchangeRate" value="1"></td></tr>';
            echo '</table><br>';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.production.setBillOfMaterialDetail', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"billOfMaterial_RefID" : parseInt(document.getElementById("dataInput_BillOfMaterial_RefID").value), '.
                        '"materialProduct_RefID" : parseInt(document.getElementById("dataInput_MaterialProduct_RefID").value), '.
                        '"quantity" : parseFloat(document.getElementById("dataInput_Quantity").value), '.
                        '"unitPriceCurrency_RefID" : parseInt(document.getElementById("dataInput_UnitPriceCurrency_RefID").value), '.
                        '"unitPriceCurrencyValue" : parseFloat(document.getElementById("dataInput_UnitPriceCurrencyValue").value), '.
                        '"unitPriceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_UnitPriceCurrencyExchangeRate").value) '.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }