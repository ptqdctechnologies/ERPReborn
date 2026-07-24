<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance             |
|                 \getAdvanceSettlementSummary\v1                                                                                  |
| ▪ API Key     : report.form.documentForm.finance.getAdvanceSettlementSummary                                                     |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance\getAdvanceSettlementSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.finance.getAdvanceSettlementSummary.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/report.form.documentForm.finance.getAdvanceSettlementSummary.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-10                                                                                           |
        | ▪ Creation Date   : 2025-12-10                                                                                           |
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
                'report.form.documentForm.finance.getAdvanceSettlementSummary',
                'latest',
                [
                'parameter' => [
                    'CombinedBudgetCode' => 'Q000062',
                    'CombinedBudgetSectionCode' => '235',
                    'StartDate' => '2025-01-01',
                    'EndDate' => '2025-12-10',
                    // 'CombinedBudgetCode' => NULL,
                    // 'CombinedBudgetSectionCode' => NULL,
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
