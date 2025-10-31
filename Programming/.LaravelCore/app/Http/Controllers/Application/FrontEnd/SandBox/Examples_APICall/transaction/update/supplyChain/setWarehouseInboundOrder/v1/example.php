<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setWarehouseInboundOrder\v1                                                                                     |
| ▪ API Key     : transaction.update.supplyChain.setWarehouseInboundOrder                                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setWarehouseInboundOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setWarehouseInboundOrder.v1_throughAPIGateway                         |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setWarehouseInboundOrder.v1_throughAPIGateway                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-10-31                                                                                           |
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
                'transaction.update.supplyChain.setWarehouseInboundOrder',
                'latest',
                [
                'recordID' => 176000000000003,
                'entities' => [
                    'documentDateTimeTZ' => '2025-06-11',
                    'log_FileUpload_Pointer_RefID' => null,
                    'requesterWorkerJobsPosition_RefID' => 164000000000497,
                    'transporter_RefID' => 284000000000006,
                    'deliveryDateTimeTZ' => '2025-07-07',
                    'deliveryFrom_RefID' => 126000000000001,
                    'deliveryFrom_NonRefID' => 'Jl. Salemba No. 04, Jakarta Pusat',
                    'deliveryTo_RefID' => 126000000000005,
                    'deliveryTo_NonRefID' => 'Jl. Mawar No. 109, Surabaya',
                    'remarks' => 'Catatan Test Update - 1C',
                    "receiveDateTimeTZ" => '2025-09-20',
                    "warehouse_RefID" => 173000000000002,
                    'additionalData' => [
                        'itemList' => [
                            'items' => [
                                    [
                                    'recordID' => 177000000000004,
                                    'entities' => [
                                        "deliveryOrderDetail_RefID" => 180000000000002,
                                        "quantity" => 40,
                                        "product_RefID" => 88000000001664,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "productUnitPriceCurrency_RefID" => 62000000000001,
                                        "productUnitPriceCurrencyExchangeRate" => 1,
                                        "productUnitPriceCurrencyValue" => 25000,
                                        'remarks' => 'Catatan Update - 3B',
                                        "combinedBudgetSectionDetail_RefID" => 169000000000037,
                                        ]
                                    ],
                                    [
                                    'recordID' => 177000000000005,
                                    'entities' => [
                                        "deliveryOrderDetail_RefID" => 180000000000003,
                                        "quantity" => 50,
                                        "product_RefID" => 88000000001533,
                                        "quantityUnit_RefID" => 73000000000002,
                                        "productUnitPriceCurrency_RefID" => 62000000000001,
                                        "productUnitPriceCurrencyExchangeRate" => 1,
                                        "productUnitPriceCurrencyValue" => 30000,
                                        'remarks' => 'Catatan Update - 4B',
                                        "combinedBudgetSectionDetail_RefID" => 169000000000037,
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
        | ▪ Call URL        : http(s)://<HOST>/                                                                                    |
        |                     transaction.update.supplyChain.setWarehouseInboundOrder.v1_throughAPIGatewayJQuery                   |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.update.supplyChain.setWarehouseInboundOrder.v1_throughAPIGatewayJQuery                 |
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
            echo '<input type="text" id="dataInput_RecordID" value=176000000000001>';
            echo '<input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-08">';
            echo '<input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497>';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.update.supplyChain.setWarehouseInboundOrder',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value '.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);
            }
        }
    }
