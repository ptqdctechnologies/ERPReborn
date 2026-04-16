<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\humanResource       |
|                 \getPersonBusinessTripSettlementSummary\v1                                                                       |
| ▪ API Key     : report.form.documentForm.humanResource.getPersonBusinessTripSettlementSummary                                    |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2026 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\humanResource\getPersonBusinessTripSettlementSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.humanResource.getPersonBusinessTripSettlementSummary.v1_throughAPIGateway   |
        |                     ► http://172.28.0.4/report.form.documentForm.humanResource.getPersonBusinessTripSettlementSummary.v1_throughAPIGateway|
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-04-14                                                                                           |
        | ▪ Creation Date   : 2026-04-14                                                                                           |
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
                'report.form.documentForm.humanResource.getPersonBusinessTripSettlementSummary',
                'latest',
                [
                'parameter' => [
                    // 'CombinedBudgetCode' => 'Q000062',
                    // 'CombinedBudgetSectionCode' => '235',
                    // 'RequesterWorkerJobsPosition_RefID' => 164000000000497,
                    // 'BeneficiaryWorkerJobsPosition_RefID' => 164000000000439,
                    // 'StartDate' => '2020-01-01',
                    // 'EndDate' => '2026-04-14',
                    'CombinedBudgetCode' => NULL,
                    'CombinedBudgetSectionCode' => NULL,
                    'RequesterWorkerJobsPosition_RefID' => NULL,
                    'BeneficiaryWorkerJobsPosition_RefID' => NULL,
                    'StartDate' => NULL,
                    'EndDate' => NULL,
                    ]
                ]
                );
            return $varData;
            }
        }
    }
