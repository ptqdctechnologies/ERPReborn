<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setSupplier   |
|                 \v1                                                                                                              |
| ▪ API Key     : transaction.update.supplyChain.setSupplier                                                                       |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setSupplier\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setSupplier.v1_throughAPIGateway                     |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setSupplier.v1_throughAPIGateway                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-05-04                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
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
                'transaction.update.supplyChain.setSupplier', 
                'latest', 
                [
                'recordID' => 126000000002253,
                'entities' => [
                    "supplierName" => "Supplier Nusa Indonesia",
                    "taxID" => "123456789",
                    "phoneNumber" => "08123456021",
                    "email" => "supplier_nusa@example.com",
                    "country" => "Indonesia",
                    "province" => "DKI Jakarta",
                    "city" => "Jakarta Selatan",
                    "address" => "Jl. Mampang Prapatan No. 1",
                    "contactPerson" => "Budi Santoso",
                    "bank_RefID" => 166000000000002,
                    "accountNumber" => "1234567890",
                    "accountName" => "PT. Supplier Nusa Indonesia",
                    "remark" => "My Remark Update Supplier",
                    "institutionType_RefID" => 141000000000009,
                    "log_FileUpload_Pointer_RefID" => null,
                    'additionalData' => [
                        'itemList' => [
                            'items' => [
                                    [
                                    'recordID' => 304000000000046,
                                    'entities' => [
                                        "category_RefID" => 12345670,
                                        "specialization_RefID" => 12345672
                                        ]
                                    ],
                                    [
                                    'recordID' => 304000000000047,
                                    'entities' => [
                                        "category_RefID" => 12345671,
                                        "specialization_RefID" => 12345673
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setSupplier.v1_throughAPIGatewayJQuery               |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setSupplier.v1_throughAPIGatewayJQuery            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-07-27                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
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
            echo '<input type="text" id="dataInput_RecordID" value=126000000000001>';
            echo '<input type="text" id="dataInput_Entity_RefID" value=124000000000069>';
            echo '<input type="text" id="dataInput_Code" value="VDR0002">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                $varAPIWebToken, 
                'transaction.update.supplyChain.setSupplier', 
                'latest', 
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"entity_RefID" : parseInt(document.getElementById("dataInput_Entity_RefID").value), '.
                        '"code" : document.getElementById("dataInput_Code").value'.
                        '}'.
                '}'
                ); 
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }
