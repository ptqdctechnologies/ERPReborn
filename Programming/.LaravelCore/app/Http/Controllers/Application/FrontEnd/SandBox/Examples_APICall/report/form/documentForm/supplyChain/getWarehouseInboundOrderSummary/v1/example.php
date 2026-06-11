<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain         |
|                 \getWarehouseInboundOrderSummary\v1                                                                              |
| ▪ API Key     : report.form.documentForm.supplyChain.getWarehouseInboundOrderSummary                                             |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\supplyChain\getWarehouseInboundOrderSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.supplyChain.getWarehouseInboundOrderSummary.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/report.form.documentForm.supplyChain.getWarehouseInboundOrderSummary.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-06-11                                                                                           |
        | ▪ Creation Date   : 2025-08-01                                                                                           |
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
                'report.form.documentForm.supplyChain.getWarehouseInboundOrderSummary',
                'latest',
                [
                'parameter' => [
                    'CombinedBudgetCode' => 'Q000062',
                    'DeliveryFrom_RefID' => 126000000000001,
                    'DeliveryTo_RefID' => 126000000000005,
                    'StartDate' => '2025-01-01',
                    'EndDate' => '2026-06-12',
                    // 'CombinedBudgetCode' => NULL,
                    // 'DeliveryFrom_RefID' => NULL,
                    // 'DeliveryTo_RefID' => NULL,
                    // 'StartDate' => NULL,
                    // 'EndDate' => NULL,
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
