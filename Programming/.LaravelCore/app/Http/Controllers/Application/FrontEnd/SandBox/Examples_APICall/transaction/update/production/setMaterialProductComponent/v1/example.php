<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\production                |
|                 \setMaterialProductComponent\v1                                                                                  |
| ▪ API Key     : transaction.update.production.setMaterialProductComponent                                                        |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\production\setMaterialProductComponent\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.production.setMaterialProductComponent.v1_throughAPIGateway      |
        |                     ► http://172.28.0.4/transaction.update.production.setMaterialProductComponent.v1_throughAPIGateway   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
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
                'transaction.update.production.setMaterialProductComponent', 
                'latest', 
                [
                'recordID' => 145000000000001,
                'entities' => [
                    'product_RefID' => 88000000000001,
                    'productType_RefID' => 87000000000001,
                    'quantityUnit_RefID' => 73000000000001,
                    'validStartDateTimeTZ' => '2009-01-01 00:00:00+07',
                    'validFinishDateTimeTZ' => '9999-12-31 23:59:59+07',
                    'code' => '1000001'
                    ]
                ]
                );
            var_dump($varData);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.production.setMaterialProductComponent.v1_throughAPIGatewayJQuery                 |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.production.setMaterialProductComponent.v1_throughAPIGatewayJQuery               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-29                                                                                           |
        | ▪ Creation Date   : 2022-07-29                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=145000000000001>';
            echo '<input type="text" id="dataInput_Product_RefID" value=88000000000001>';
            echo '<input type="text" id="dataInput_ProductType_RefID" value=87000000000001>';
            echo '<input type="text" id="dataInput_QuantityUnit_RefID" value=73000000000001>';
            echo '<input type="text" id="dataInput_ValidStartDateTimeTZ" value="2009-04-17 00:00:00+07">';
            echo '<input type="text" id="dataInput_ValidFinishDateTimeTZ" value="9999-12-31 23:59:59+07">';
            echo '<input type="text" id="dataInput_Code" value="1000001">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.production.setMaterialProductComponent', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"product_RefID" : parseInt(document.getElementById("dataInput_Product_RefID").value), '.
                        '"productType_RefID" : parseInt(document.getElementById("dataInput_ProductType_RefID").value), '.
                        '"quantityUnit_RefID" : parseInt(document.getElementById("dataInput_QuantityUnit_RefID").value), '.
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