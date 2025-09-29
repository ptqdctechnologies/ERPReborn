<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain               |
|                 \setDeliveryOrder\v1                                                                                              |
| ▪ API Key     : transaction.create.supplyChain.setDeliveryOrder                                                                   |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2024 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain\setDeliveryOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setDeliveryOrder.v1_throughAPIGateway                 |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setDeliveryOrder.v1_throughAPIGateway              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-29                                                                                           |
        | ▪ Creation Date   : 2024-01-11                                                                                           |
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
                'transaction.create.supplyChain.setDeliveryOrder',
                'latest',
                [
                'entities' => [
                    "documentDateTimeTZ" => '2025-03-26',
                    "log_FileUpload_Pointer_RefID" => null,
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "transporter_RefID" => 164000000000559,
                    "deliveryDateTimeTZ" => null,
                    "deliveryFrom_RefID" => 126000000000001,
                    "deliveryFrom_NonRefID" => 'Jl. Salemba No. 23, Jakarta Pusat',
                    "deliveryTo_RefID" => 126000000000005,
                    "deliveryTo_NonRefID" => 'Jl. Mawar No. 50, Surabaya',
                    "remarks" => 'My Remarks',
                    "additionalData" => [
                        "itemList" => [
                            "items" => [
                                    [
                                    "entities" => [
                                        "product_RefID" => 88000000000017,
                                        "quantity" => 5,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "remarks" => "Catatan 1",
                                        "underlyingDetail_RefID" => 86000000000018,
                                        "stockMovementRequester_RefID" => null,
                                        "stockMovementStatus" => null   // 0 => "RENT", 1 => "PERMANENT"
                                        ]
                                    ],
                                    [
                                    "entities" => [
                                        "product_RefID" => 88000000000018,
                                        "quantity" => 10,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "remarks" => "Catatan 2",
                                        "underlyingDetail_RefID" => 86000000000018,
                                        "stockMovementRequester_RefID" => null,
                                        "stockMovementStatus" => null   // 0 => "RENT", 1 => "PERMANENT"
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setDeliveryOrder.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setDeliveryOrder.v1_throughAPIGatewayJQuery       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2024-01-11                                                                                           |
        | ▪ Creation Date   : 2024-01-11                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function throughAPIGatewayJQuery($varAPIWebToken)
            {
/*            //---Parameter Set---
            if (!$varAPIWebToken) {
                $varAPIWebToken = \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System();
                }
            //---Core---
            echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::setLibrary(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System());
            echo '<input type="text" id="dataInput_RecordID" value=85000000000001>';
            echo '<input type="text" id="dataInput_DocumentDateTimeTZ" value="2022-03-04">';
            echo '<input type="text" id="dataInput_RequesterWorkerJobsPosition_RefID" value=164000000000497>';
            echo '<input type="text" id="dataInput_Supplier_RefID" value=126000000000001>';
            echo '<input type="text" id="dataInput_DeliveryDateTimeTZ" value="2022-03-08">';
            echo '<input type="text" id="dataInput_DeliveryDestination_RefID" value=173000000000001>';
            echo '<input type="text" id="dataInput_SupplierInvoiceBillingPurpose_RefID" value=189000000000001>';
            echo '<input type="text" id="dataInput_PaymentTerm" value="My Payment Term">';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.supplyChain.setDeliveryOrder',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                        '"supplier_RefID" : parseInt(document.getElementById("dataInput_Supplier_RefID").value), '.
                        '"deliveryDateTimeTZ" : document.getElementById("dataInput_DeliveryDateTimeTZ").value, '.
                        '"deliveryDestination_RefID" : parseInt(document.getElementById("dataInput_DeliveryDestination_RefID").value), '.
                        '"supplierInvoiceBillingPurpose_RefID" : parseInt(document.getElementById("dataInput_SupplierInvoiceBillingPurpose_RefID").value), '.
                        '"paymentTerm" : document.getElementById("dataInput_PaymentTerm").value, '.
                        '"remarks" : document.getElementById("dataInput_Remarks").value'.
                        '}'.
                '}'
                );
            echo "<button type='button' onclick='javascript:var varData = ".$varJQueryFunction."; $(\"body\").append(JSON.stringify(varData));'>Submit Data</button>";
            dd($varJQueryFunction);*/
            }
        }
    }
