<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain               |
|                 \setPurchaseOrder\v1                                                                                             |
| ▪ API Key     : transaction.update.supplyChain.setPurchaseOrder                                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\supplyChain\setPurchaseOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setPurchaseOrder.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setPurchaseOrder.v1_throughAPIGateway             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-22                                                                                           |
        | ▪ Creation Date   : 2022-07-27                                                                                           |
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
                        'transaction.update.supplyChain.setPurchaseOrder',
                        'latest',
                        [
                        'recordID' => 85000000000001,
                        'entities' => [
                            "documentDateTimeTZ" => '2022-03-04',
                            "log_FileUpload_Pointer_RefID" => null,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "supplier_RefID" => 126000000000001,
                            "deliveryDateTimeTZ" => '2025-03-12',
                            "deliveryDestination_RefID" => 173000000000001,
                            "supplierInvoiceBillingPurpose_RefID" => 189000000000001,
                            "remarks" => 'important message 1',
                            "deliveryDestinationManualAddress" => 'Jl. Jend. Sudirman No. 1 Jakarta',
                            "paymentNotes" => 'My Payment Notes 1',
                            "internalNotes" => 'My Internal Notes 1',
                            "downPayment" => 20,
                            "termOfPayment_RefID" => 174000000000001,
                            "vatRatio" => 11,
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
                                            "recordID" => 86000000000002,
                                            "entities" => [
                                                "purchaseRequisitionDetail_RefID" => 84000000000001,
                                                "quantity" => 10,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 30000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                                                "productUnitPriceDiscountCurrencyValue" => 0,
                                                "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                                                "asset" => 0,        // 0 => "NO", 1 => "YES"
                                                "remarks" => 'important sub message 1-a'
                                                ]
                                            ],
                                            [
                                            "recordID" => 86000000000003,
                                            "entities" => [
                                                "purchaseRequisitionDetail_RefID" => 84000000000002,
                                                "quantity" => 10,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000001,
                                                "productUnitPriceCurrencyValue" => 30000,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                                                "productUnitPriceDiscountCurrencyValue" => 0,
                                                "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                                                "asset" => 0,        // 0 => "NO", 1 => "YES"
                                                "remarks" => 'important sub message 1-b'
                                                ]
                                            ],
                                        ]
                                    ],
                                "transactionTaxItemList" => [
                                    "items" => [
                                            [
                                            "recordID" => 185000000000001,
                                            "entities" => [
                                                "taxType_RefID" => 182000000000001,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 16000,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => 'Remark Update - 1'
                                                ]
                                            ],
                                            [
                                            "recordID" => 185000000000002,
                                            "entities" => [
                                                "taxType_RefID" => 182000000000002,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 7500,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => 'Remark Update - 2'
                                                ]
                                            ]
                                        ]
                                    ],
                                "additionalCostItemList" => [
                                    "items" => [
                                            [
                                            "recordID" => 191000000000001,
                                            "entities" => [
                                                "purchaseOrderAdditionalCostType_RefID" => 190000000000002,
                                                "priceCurrency_RefID" => 62000000000001,
                                                "priceCurrencyValue" => 30000,
                                                "priceCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Additional Cost Update'
                                                ]
                                            ]
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.supplyChain.setPurchaseOrder.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/transaction.update.supplyChain.setPurchaseOrder.v1_throughAPIGatewayJQuery       |
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
                $varAPIWebToken =
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getAPIWebToken_System();
                }

            /*
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
            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.update.supplyChain.setPurchaseOrder',
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

            dd($varJQueryFunction);
            */
            }
        }
    }
