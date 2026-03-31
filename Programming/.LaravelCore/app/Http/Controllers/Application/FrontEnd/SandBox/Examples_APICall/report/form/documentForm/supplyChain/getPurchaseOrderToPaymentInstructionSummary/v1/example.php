<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain         |
|                 \getPurchaseOrderToPaymentInstructionSummary\v1                                                                  |
| ▪ API Key     : report.form.documentForm.supplyChain.getPurchaseOrderToPaymentInstructionSummary                                 |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain\getPurchaseOrderToPaymentInstructionSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.supplyChain.getPurchaseOrderToPaymentInstructionSummary.v1_throughAPIGateway             |
        |                     ► http://172.28.0.4/report.form.documentForm.supplyChain.getPurchaseOrderToPaymentInstructionSummary.v1_throughAPIGateway          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-03-31                                                                                           |
        | ▪ Creation Date   : 2026-03-31                                                                                           |
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
                'report.form.documentForm.supplyChain.getPurchaseOrderToPaymentInstructionSummary',
                'latest',
                [
                'parameter' => [
                    'CombinedBudgetCode' => 'Q000062',
                    'CombinedBudgetSectionCode' => '235',
                    // 'Supplier_RefID' => 126000000001167,
                    // 'PurchaseOrder_RefID' => 85000000000187,
                    // 'AccountPayable_RefID' => 211000000000227,
                    'StartDate' => '2025-01-25',
                    'EndDate' => '2026-03-04',
                    // 'CombinedBudgetCode' => NULL,
                    // 'CombinedBudgetSectionCode' => NULL,                    
                    'Supplier_RefID' => NULL,
                    'PurchaseOrder_RefID' => NULL,
                    'AccountPayable_RefID' => NULL,
                    // 'StartDate' => NULL,
                    // 'EndDate' => NULL,
                    ]
                ]
                );
            return $varData;
            }
        }
    }
