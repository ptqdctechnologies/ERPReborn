<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance                   |
|                 \setDebitNote\v1                                                                                                 |
| ▪ API Key     : transaction.create.finance.setDebitNote                                                                          |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (jookeo.rizal@gmail.com)                                                                                |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\create\finance\setDebitNote\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setDebitNote.v1_throughAPIGateway                        |
        |                     ► http://172.28.0.4/transaction.create.finance.setDebitNote.v1_throughAPIGateway                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-09                                                                                           |
        | ▪ Creation Date   : 2025-09-03                                                                                           |
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
                'transaction.create.finance.setDebitNote',
                'latest',
                [
                'entities' => [
                    "documentDateTimeTZ" => '2025-09-03',
                    "partner_RefID" => 125000000000001,
                    "log_FileUpload_Pointer_RefID" => 91000000000001,
                    "remarks" => 'My Remarks 1',
                    "additionalData" => [
                        "itemList" => [
                            "items" => [
                                    [
                                    "entities" => [
                                        "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                        "product_RefID" => 88000000000002,
                                        "quantity" => 10,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "productUnitPriceCurrency_RefID" => 62000000000001,
                                        "productUnitPriceCurrencyValue" => 30000,
                                        "productUnitPriceCurrencyExchangeRate" => 1,
                                        "vatRatio" => 12,
                                        "chartOfAccount_RefID" => 65000000000005,
                                        "referenceDocument_RefID" => 288000000000001
                                        ]
                                    ],
                                    [
                                    "entities" => [
                                        "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                        "product_RefID" => 88000000000002,
                                        "quantity" => 5,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "productUnitPriceCurrency_RefID" => 62000000000001,
                                        "productUnitPriceCurrencyValue" => 30000,
                                        "productUnitPriceCurrencyExchangeRate" => 1,
                                        "vatRatio" => 12,
                                        "chartOfAccount_RefID" => 65000000000005,
                                        "referenceDocument_RefID" => 288000000000001
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.create.finance.setDebitNote.v1_throughAPIGatewayJQuery                  |
        |                     ► http://172.28.0.4/transaction.create.finance.setDebitNote.v1_throughAPIGatewayJQuery               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-09-03                                                                                           |
        | ▪ Creation Date   : 2025-09-03                                                                                           |
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
            echo '<input type="text" id="dataInput_DebitNoteDateTimeTZ" value="2022-03-08">';
            echo '<input type="text" id="dataInput_DebitNoteDestination_RefID" value=173000000000001>';
            echo '<input type="text" id="dataInput_SupplierInvoiceBillingPurpose_RefID" value=189000000000001>';
            echo '<input type="text" id="dataInput_PaymentTerm" value="My Payment Term">';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.create.finance.setDebitNote',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                        '"supplier_RefID" : parseInt(document.getElementById("dataInput_Supplier_RefID").value), '.
                        '"debitNoteDateTimeTZ" : document.getElementById("dataInput_DebitNoteDateTimeTZ").value, '.
                        '"debitNoteDestination_RefID" : parseInt(document.getElementById("dataInput_DebitNoteDestination_RefID").value), '.
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
