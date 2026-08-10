<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance             |
|                 \getLoanSettlementSummary\v1                                                                                     |
| ▪ API Key     : report.form.documentForm.finance.getLoanSettlementSummary                                                        |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance\getLoanSettlementSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.finance.getLoanSettlementSummary.v1_throughAPIGateway      |
        |                     ► http://172.28.0.4/report.form.documentForm.finance.getLoanSettlementSummary.v1_throughAPIGateway   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-02-11                                                                                           |
        | ▪ Creation Date   : 2025-09-25                                                                                           |
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
                'report.form.documentForm.finance.getLoanSettlementSummary',
                'latest',
                [
                'parameter' => [
                    'CombinedBudgetCode' => 'Q000062',
                    'Creditor_RefID' => 166000000000001,
                    'Debitor_RefID' => 25000000000001,
                    'StartDate' => '2025-01-01',
                    'EndDate' => '2026-06-15',
                    // 'CombinedBudgetCode' => NULL,
                    // 'Creditor_RefID' => NULL,
                    // 'Debitor_RefID' => NULL,
                    // 'StartDate' => NULL,
                    // 'EndDate' => NULL,
                    ],
                'SQLStatement' => [
                    'paging' => [
                        'limit' => "2",
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
