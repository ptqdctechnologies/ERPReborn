<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance                   |
|                 \setReimbursement\v1                                                                                             |
| ▪ API Key     : transaction.update.finance.setReimbursement                                                                      |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (jookeo.rizal@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\finance\setReimbursement\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setReimbursement.v1_throughAPIGateway                    |
        |                     ► http://172.28.0.4/transaction.update.finance.setReimbursement.v1_throughAPIGateway                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-13                                                                                           |
        | ▪ Creation Date   : 2025-08-13                                                                                           |
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
                'transaction.update.finance.setReimbursement',
                'latest',
                [
                'recordID' => 288000000000001,
                'entities' => [
                    "documentDateTimeTZ" => '2025-08-14',
                    "requesterWorkerJobsPosition_RefID" => 164000000000497,
                    "beneficiaryWorkerJobsPosition_RefID" => 164000000000439,
                    "beneficiaryBankAccount_RefID" => 167000000000001,
                    "date" => '2025-08-14',
                    "log_FileUpload_Pointer_RefID" => 91000000000001,
                    "remarks" => 'My Remarks 3',
                    "additionalData" => [
                        "itemList" => [
                            "items" => [
                                    [
                                    "recordID" => 289000000000001,
                                    "entities" => [
                                        "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                        "product_RefID" => 88000000000002,
                                        "quantity" => 33,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "productUnitPriceCurrency_RefID" => 62000000000001,
                                        "productUnitPriceCurrencyValue" => 25000,
                                        "productUnitPriceCurrencyExchangeRate" => 1
                                        ]
                                    ],
                                    [
                                    "recordID" => 289000000000002,
                                    "entities" => [
                                        "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                        "product_RefID" => 88000000000002,
                                        "quantity" => 28,
                                        "quantityUnit_RefID" => 73000000000001,
                                        "productUnitPriceCurrency_RefID" => 62000000000001,
                                        "productUnitPriceCurrencyValue" => 9000,
                                        "productUnitPriceCurrencyExchangeRate" => 1
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.finance.setReimbursement.v1_throughAPIGatewayJQuery          |
        |                     ► http://172.28.0.4/transaction.update.finance.setReimbursement.v1_throughAPIGatewayJQuery       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-08-13                                                                                           |
        | ▪ Creation Date   : 2025-08-13                                                                                           |
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
            echo '<input type="text" id="dataInput_ReimbursementDateTimeTZ" value="2022-03-08">';
            echo '<input type="text" id="dataInput_ReimbursementDestination_RefID" value=173000000000001>';
            echo '<input type="text" id="dataInput_SupplierInvoiceBillingPurpose_RefID" value=189000000000001>';
            echo '<input type="text" id="dataInput_PaymentTerm" value="My Payment Term">';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.update.finance.setReimbursement',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                        '"supplier_RefID" : parseInt(document.getElementById("dataInput_Supplier_RefID").value), '.
                        '"reimbursementDateTimeTZ" : document.getElementById("dataInput_ReimbursementDateTimeTZ").value, '.
                        '"reimbursementDestination_RefID" : parseInt(document.getElementById("dataInput_ReimbursementDestination_RefID").value), '.
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
