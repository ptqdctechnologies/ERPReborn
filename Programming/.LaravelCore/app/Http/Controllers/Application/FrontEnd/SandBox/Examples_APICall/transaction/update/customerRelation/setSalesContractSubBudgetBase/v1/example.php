<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\customerRelation          |
|                 \setSalesContractSubBudgetBase\v1                                                                                  |
| ▪ API Key     : transaction.update.customerRelation.setSalesContractSubBudgetBase                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\transaction\update\customerRelation\setSalesContractSubBudgetBase\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.customerRelation.setSalesContractSubBudgetBase.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/transaction.update.customerRelation.setSalesContractSubBudgetBase.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-15                                                                                           |
        | ▪ Creation Date   : 2026-07-15                                                                                           |
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
                'transaction.update.customerRelation.setSalesContractSubBudgetBase',
                'latest',
                [
                'recordID' => 131000000000142,
                'entities' => [
                    "log_FileUpload_Pointer_RefID" => 91000000000002,
                    "combinedBudget_RefID" => 46000000000002,
                    "currency_RefID" => 62000000000002,
                    "documentDateTimeTZ" => '2026-07-15',
                    "type" => 'SUB_BUDGET_BASE',
                    "vatStatus" => 'NO',
                    "vatRatio" => 0,
                    "additionalData" => [
                        "itemList" => [
                            "items" => [
                                    [
                                    "recordID" => 308000000000015,
                                    "entities" => [
                                        "combinedBudgetSection_RefID" => 143000000000030,
                                        "value" => 9000,
                                        "notes" => 'Catatan Kedua'
                                        ]
                                    ],
                                    [
                                    "recordID" => NULL,
                                    "entities" => [
                                        "combinedBudgetSection_RefID" => 143000000000031,
                                        "value" => 13000,
                                        "notes" => 'Catatan Ketiga'
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
        | ▪ Call URL        : http(s)://<HOST>/transaction.update.customerRelation.setSalesContractSubBudgetBase.v1_throughAPIGatewayJQuery     |
        |                     ► http://172.28.0.4/transaction.update.customerRelation.setSalesContractSubBudgetBase.v1_throughAPIGatewayJQuery  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-07-15                                                                                           |
        | ▪ Creation Date   : 2026-07-15                                                                                           |
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
            echo '<input type="text" id="dataInput_LoanDateTimeTZ" value="2022-03-08">';
            echo '<input type="text" id="dataInput_LoanDestination_RefID" value=173000000000001>';
            echo '<input type="text" id="dataInput_SupplierInvoiceBillingPurpose_RefID" value=189000000000001>';
            echo '<input type="text" id="dataInput_PaymentTerm" value="My Payment Term">';
            echo '<input type="text" id="dataInput_Remarks" value="My Remarks">';
            $varJQueryFunction = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGatewayJQuery(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.update.customerRelation.setSalesContractSubBudgetBase',
                'latest',
                '{'.
                    '"recordID" : parseInt(document.getElementById("dataInput_RecordID").value), '.
                    '"entities" : {'.
                        '"documentDateTimeTZ" : document.getElementById("dataInput_DocumentDateTimeTZ").value, '.
                        '"requesterWorkerJobsPosition_RefID" : parseInt(document.getElementById("dataInput_RequesterWorkerJobsPosition_RefID").value), '.
                        '"supplier_RefID" : parseInt(document.getElementById("dataInput_Supplier_RefID").value), '.
                        '"loanDateTimeTZ" : document.getElementById("dataInput_LoanDateTimeTZ").value, '.
                        '"loanDestination_RefID" : parseInt(document.getElementById("dataInput_LoanDestination_RefID").value), '.
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
