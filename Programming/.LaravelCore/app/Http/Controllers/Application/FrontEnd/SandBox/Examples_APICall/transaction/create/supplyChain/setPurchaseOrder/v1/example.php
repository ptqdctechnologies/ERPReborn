<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain               |
|                 \setPurchaseOrder\v1                                                                                             |
| ▪ API Key     : transaction.create.supplyChain.setPurchaseOrder                                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 - 2025 Zheta (teguhpjs@gmail.com)                                                                              |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\supplyChain\setPurchaseOrder\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setPurchaseOrder.v1_throughAPIGateway                |
        |                     ► http://172.28.0.4/transaction.create.supplyChain.setPurchaseOrder.v1_throughAPIGateway             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-21                                                                                           |
        | ▪ Creation Date   : 2022-09-21                                                                                           |
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
                        'transaction.create.supplyChain.setPurchaseOrder',
                        'latest',
                        [
                        'entities' => [
                            "documentDateTimeTZ" => '2022-03-04',
                            "log_FileUpload_Pointer_RefID" => null,
                            "requesterWorkerJobsPosition_RefID" => 164000000000497,
                            "supplier_RefID" => 126000000000001,
                            "deliveryDateTimeTZ" => '2022-03-08',
                            "deliveryDestination_RefID" => 173000000000001,
                            "supplierInvoiceBillingPurpose_RefID" => 189000000000001,
                            "remarks" => 'My Remarks',
                            "additionalData" => [
                                "itemList" => [
                                    "items" => [
                                            [
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
                                                "remarks" => 'Catatan Pertama'
                                                ]
                                            ],
                                            [
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
                                                "remarks" => 'Catatan Kedua'
                                                ]
                                            ],
                                            [
                                            "entities" => [
                                                "purchaseRequisitionDetail_RefID" => 84000000000002,
                                                "quantity" => 10,
                                                "quantityUnit_RefID" => 73000000000001,
                                                "productUnitPriceCurrency_RefID" => 62000000000002,
                                                "productUnitPriceCurrencyValue" => 30,
                                                "productUnitPriceCurrencyExchangeRate" => 1,
                                                "productUnitPriceDiscountCurrency_RefID" => 62000000000001,
                                                "productUnitPriceDiscountCurrencyValue" => 10000,
                                                "productUnitPriceDiscountCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Kedua Tambahan'
                                                ]
                                            ],
                                        ]
                                    ],
                                "taxes" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "taxType_RefID" => 182000000000001,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 30000,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan 1'
                                                ]
                                            ],
                                            [
                                            "entities" => [
                                                "taxType_RefID" => 182000000000002,
                                                "tariffCurrency_RefID" => 62000000000001,
                                                "tariffCurrencyValue" => 30000,
                                                "tariffCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan 2'
                                                ]
                                            ]
                                        ]
                                    ],
                                "additionalCost" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "transactionAdditionalCostType_RefID" => 190000000000002,
                                                "priceCurrency_RefID" => 62000000000001,
                                                "priceCurrencyValue" => 30000,
                                                "priceCurrencyExchangeRate" => 1,
                                                "remarks" => 'Catatan Additional Cost'
                                                ]
                                            ]
                                        ]
                                    ],
                                "paymentTerm" => [
                                    "items" => [
                                            [
                                            "entities" => [
                                                "paymentTerm_RefID" => 174000000000001,
                                                "dueDays" => 30,
                                                "priceCurrency_RefID" => 62000000000001,
                                                "priceCurrencyValue" => 30000,
                                                "priceCurrencyExchangeRate" => 1,
                                                "discountDueDays" => 15,
                                                "discountPercentageRate" => 2.00,
                                                "remarks" => 'Down Payment'
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.supplyChain.setPurchaseOrder.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/                                                                                 |
        |                       transaction.create.supplyChain.setPurchaseOrder.v1_throughAPIGatewayJQuery                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-09-20                                                                                           |
        | ▪ Creation Date   : 2022-09-20                                                                                           |
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

            echo '<table border="1" style="border-collapse: collapse;">';
            echo    '<tr><td colspan="2" bgcolor="#6666cc" align="middle"><p style="color:#ffffff">Purchase Order Additional Cost Main Data</p></td></tr>';
            echo        '<tr><td>PurchaseOrder_RefID</td><td>';
            echo            '<input type="text" id="dataInput_PurchaseOrder_RefID" value=85000000000001>';
            echo        '</td></tr>';
            echo        '<tr><td>TransactionAdditionalCostType_RefID</td><td>';
            echo            '<input type="text" id="dataInput_TransactionAdditionalCostType_RefID" value=190000000000001>';
            echo        '</td></tr>';
            echo        '<tr><td>PriceCurrency_RefID</td><td>';
            echo            '<input type="text" id="dataInput_PriceCurrency_RefID" value=62000000000001>';
            echo        '</td></tr>';
            echo        '<tr><td>PriceCurrencyValue</td><td>';
            echo            '<input type="text" id="dataInput_PriceCurrencyValue" value=250>';
            echo        '</td></tr>';
            echo        '<tr><td>PriceCurrencyExchangeRate</td><td>';
            echo            '<input type="text" id="dataInput_PriceCurrencyExchangeRate" value=15000>';
            echo        '</td></tr>';
            echo        '<tr><td>Remarks</td><td>';
            echo            '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            echo        '</td></tr>';
            echo '</table><br>';

            $varJQueryFunction =
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'transaction.create.supplyChain.setPurchaseOrder',
                        'latest',
                        '{'.
                            '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                            '"entities" : {'.
                                '"purchaseOrder_RefID" : parseInt(document.getElementById("dataInput_PurchaseOrder_RefID").value), '.
                                '"transactionAdditionalCostType_RefID" : parseInt(document.getElementById("dataInput_TransactionAdditionalCostType_RefID").value), '.
                                '"priceCurrency_RefID" : parseInt(document.getElementById("dataInput_PriceCurrency_RefID").value), '.
                                '"priceCurrencyValue" : parseFloat(document.getElementById("dataInput_PriceCurrencyValue").value), '.
                                '"priceCurrencyExchangeRate" : parseFloat(document.getElementById("dataInput_PriceCurrencyExchangeRate").value), '.
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
