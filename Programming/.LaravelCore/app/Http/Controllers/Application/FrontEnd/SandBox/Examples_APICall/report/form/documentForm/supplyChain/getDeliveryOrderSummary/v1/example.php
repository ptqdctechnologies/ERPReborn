<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain         |
|                 \getDeliveryOrderSummary\v1                                                                                      |
| ▪ API Key     : report.form.documentForm.supplyChain.getDeliveryOrderSummary                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain\getDeliveryOrderSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.supplyChain.getDeliveryOrderSummary.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/report.form.documentForm.supplyChain.getDeliveryOrderSummary.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-02-12                                                                                           |
        | ▪ Creation Date   : 2025-07-08                                                                                           |
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
                'report.form.documentForm.supplyChain.getDeliveryOrderSummary',
                'latest',
                [
                'parameter' => [
                    // 'CombinedBudgetCode' => 'Q000062',
                    // 'CombinedBudgetSectionCode' => '235',
                    // 'Warehouse_RefID' => 173000000000003,
                    // 'StartDate' => '2025-01-01',
                    // 'EndDate' => '2026-02-11',
                    'CombinedBudgetCode' => NULL,
                    'CombinedBudgetSectionCode' => NULL,
                    'Warehouse_RefID' => NULL,
                    'StartDate' => NULL,
                    'EndDate' => NULL,
                    ],
                'SQLStatement' => [
                    'paging' => [
                        'limit' => "20",
                        // 'limit' => "ALL",
                        'offset' => 0
                        ]
                    ]
                ]
                );
            return $varData;
            }
        }
    }
