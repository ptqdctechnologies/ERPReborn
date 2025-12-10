<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance             |
|                 \getAdvanceToAdvanceSettlementSummary\v1                                                                         |
| ▪ API Key     : report.form.documentForm.finance.getAdvanceToAdvanceSettlementSummary                                            |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance\getAdvanceToAdvanceSettlementSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.finance.getAdvanceToAdvanceSettlementSummary.v1_throughAPIGateway    |
        |                     ► http://172.28.0.4/report.form.documentForm.finance.getAdvanceToAdvanceSettlementSummary.v1_throughAPIGateway |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2025-12-10                                                                                           |
        | ▪ Creation Date   : 2025-07-30                                                                                           |
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
                'report.form.documentForm.finance.getAdvanceToAdvanceSettlementSummary',
                'latest',
                [
                'parameter' => [
                    'CombinedBudgetCode' => 'Q000062',
                    'CombinedBudgetSectionCode' => '235',
                    'RequesterWorkerJobsPosition_RefID' => 164000000000559,
                    'StartDate' => '2025-01-01',
                    'EndDate' => '2025-03-30',
                    // 'CombinedBudgetCode' => NULL,
                    // 'CombinedBudgetSectionCode' => NULL,
                    // 'RequesterWorkerJobsPosition_RefID' => NULL,     // ARF Requester
                    // 'StartDate' => NULL,
                    // 'EndDate' => NULL,
                    ]
                ]
                );
            return $varData;
            }
        }
    }
