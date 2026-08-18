<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category    : Example - API Call Controller                                                                                    |
| ▪ Name Space  : \App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance             |
|                 \getLoanToLoanSettlementSummary\v1                                                                               |
| ▪ API Key     : report.form.documentForm.finance.getLoanToLoanSettlementSummary                                                  |
| ▪ API Version : 1                                                                                                                |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2025 ijonk7 (rizal.devapps@gmail.com)                                                                               |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Http\Controllers\Application\FrontEnd\SandBox\Examples_APICall\report\form\documentForm\finance\getLoanToLoanSettlementSummary\v1
    {
    class example extends \App\Http\Controllers\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Call URL        : http(s)://<HOST>/report.form.documentForm.finance.getLoanToLoanSettlementSummary.v1_throughAPIGateway     |
        |                     ► http://172.28.0.4/report.form.documentForm.finance.getLoanToLoanSettlementSummary.v1_throughAPIGateway  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2026-02-06                                                                                           |
        | ▪ Creation Date   : 2025-09-29                                                                                           |
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
                'report.form.documentForm.finance.getLoanToLoanSettlementSummary',
                'latest',
                [
                'parameter' => [
                    'CombinedBudgetCode' => 'Q000055',
                    'Creditor_RefID' => 166000000000001,
                    'Debitor_RefID' => 25000000000001,
                    'Loan_RefID' => 293000000000006,
                    'LoanSettlement_RefID' => 295000000000010,
                    'StartDate' => '2020-01-01',
                    'EndDate' => '2026-08-13'
                    // 'CombinedBudgetCode' => NULL,
                    // 'Creditor_RefID' => NULL,
                    // 'Debitor_RefID' => NULL,
                    // 'Loan_RefID' => NULL,
                    // 'LoanSettlement_RefID' => NULL,
                    // 'StartDate' => NULL,
                    // 'EndDate' => NULL
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
