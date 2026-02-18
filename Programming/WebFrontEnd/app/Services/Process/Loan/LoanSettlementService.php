<?php

namespace App\Services\Process\Loan;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class LoanSettlementService
{
    public function getDetail($advanceRequestID) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getLoanSettlementDetail',
            'latest',
            [
                'parameter' => [
                    'loanSettlement_RefID'  => (int) $advanceRequestID,
                ],
                'SQLStatement'  => [
                    'pick'      => null,
                    'sort'      => null,
                    'filter'    => null,
                    'paging'    => null
                ]
            ],
            false
        );
    }

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');

        $data           = $request;
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setLoanSettlement',
            'latest',
            [
            'entities'  => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "creditor_RefID"                => (int) $data['creditor_RefID'],
                "debitor_RefID"                 => (int) $data['debitor_RefID'],
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "notes"                         => $data['notes'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => [
                                [
                                "entities" => [
                                    "loanDetail_RefID"                  => (int) $data['loanDetail_RefID'],
                                    "principleSettlement"               => $data['principleSettlement'],
                                    "penaltySettlement"                 => $data['penaltySettlement'],
                                    "interestSettlement"                => $data['interestSettlement'],
                                    "currency_RefID"                    => (int) $data['currency_RefID'],
                                    "currencyExchangeRate"              => (int) $data['currencyExchangeRate'],
                                    // "chartOfAccount_Settlement_RefID"   => (int) $data['chartOfAccount_Settlement_RefID'],
                                    "chartOfAccount_Settlement_RefID"   => NULL,
                                    "chartOfAccount_Penalty_RefID"      => (int) $data['chartOfAccount_Penalty_RefID'],
                                    "chartOfAccount_Interest_RefID"     => (int) $data['chartOfAccount_Interest_RefID'],
                                    "combinedBudget_RefID"              => $data['combinedBudget_RefID']
                                    ]
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request, $id)
    {
        $sessionToken   = Session::get('SessionLogin');

        $data           = $request;
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setLoanSettlement',
            'latest',
            [
            'recordID'  => (int) $id,
            'entities'  => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "notes"                         => $data['notes'],
                "additionalData" => [
                    "itemList" => [
                        "items" => [
                                [
                                "recordID"  => 296000000000013,
                                "entities"  => [
                                    "loanDetail_RefID"                  => (int) $data['loanDetail_RefID'],
                                    "principleSettlement"               => $data['principleSettlement'],
                                    "penaltySettlement"                 => $data['penaltySettlement'],
                                    "interestSettlement"                => $data['interestSettlement'],
                                    "currency_RefID"                    => (int) $data['currency_RefID'],
                                    "currencyExchangeRate"              => $data['currencyExchangeRate'],
                                    "chartOfAccount_Settlement_RefID"   => 65000000000005,
                                    "chartOfAccount_Penalty_RefID"      => 65000000000005,
                                    "chartOfAccount_Interest_RefID"     => 65000000000005,
                                    "combinedBudget_RefID"              => NULL
                                    ]
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        );
    }

    public function getLoanSettlementSummary($budget, $creditor, $debitor, $date) 
    {
        $sessionToken = Session::get('SessionLogin');

        if ($date) {
            $dates      = explode(' - ', $date);
            $startDate  = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate    = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'report.form.documentForm.finance.getLoanSettlementSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'    => $budget,
                    'Creditor_RefID'        => $creditor ? $creditor : NULL,
                    'Debitor_RefID'         => $debitor ? $debitor : NULL,
                    'StartDate'             => $date ? $startDate : NULL,
                    'EndDate'               => $date ? $endDate : NULL
                ]
            ]
        );
    }
}