<?php

namespace App\Services\Process\Loan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class LoanService
{
    public function getDetail($loanID) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getLoanDetail',
            'latest',
            [
                'parameter' => [
                    'loan_RefID' => (int) $loanID,
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ],
            false
        );
    }

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');

        $data           = $request->storeData;
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $loanType       = match ($data['loan_type']) {
            'LENDING'   => (int) 0,
            default     => (int) 1,
        };

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setLoan',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "creditor_RefID"                => (int) $data['creditor_id'],
                "debitor_RefID"                 => (int) $data['debitor_id'],
                "bankAccount_RefID"             => (int) $data['bank_account_id'],
                "loanTerm"                      => (int) $data['loan_term'],
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "notes"                         => $data['remark'],
                "loanType"                      => $loanType,
                "loanDate"                      => Carbon::createFromFormat('m/d/Y', $data['loan_date'])->format('Y-m-d'),
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => [
                                [
                                "entities"      => [
                                    "principleLoan"                     => $data['principle_loan'],
                                    "lendingRate"                       => (int) $data['lending_rate'],
                                    "totalLoan"                         => $data['total_loan'],
                                    "currency_RefID"                    => (int) $data['currency_id'],
                                    "currencyExchangeRate"              => 1,
                                    "chartOfAccount_RefID"              => (int) $data['coa_id'],
                                    "combinedBudget_RefID"              => (int) $data['budget_id']
                                    ]
                                ]
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

        $data           = $request->storeData;
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $loanType       = match ($data['loan_type']) {
            'LENDING'   => (int) 0,
            default     => (int) 1,
        };

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setLoan',
            'latest',
            [
            'recordID' => (int) $id,
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "creditor_RefID"                => (int) $data['creditor_id'],
                "debitor_RefID"                 => (int) $data['debitor_id'],
                "bankAccount_RefID"             => (int) $data['bank_account_id'],
                "loanTerm"                      => (int) $data['loan_term'],
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => $data['remark'],
                "loanType"                      => $loanType,
                "loanDate"                      => $data['loan_date'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => [
                                [
                                "recordID"  => (int) $data['loan_detail_id'],
                                "entities"  => [
                                    "principleLoan"                     => $data['principle_loan'],
                                    "lendingRate"                       => (int) $data['lending_rate'],
                                    "totalLoan"                         => $data['total_loan'],
                                    "currency_RefID"                    => (int) $data['currency_id'],
                                    "currencyExchangeRate"              => 1,
                                    "chartOfAccount_RefID"              => (int) $data['coa_id'],
                                    "combinedBudget_RefID"              => (int) $data['budget_id']
                                    ]
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        );
    }

    public function getLoanSummary($budget, $creditor, $debitor, $date) 
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
            'report.form.documentForm.finance.getLoanSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'    => $budget ? $budget : NULL,
                    'Creditor_RefID'        => $creditor ? $creditor : NULL,
                    'Debitor_RefID'         => $debitor ? $debitor : NULL,
                    'StartDate'             => $date ? $startDate : NULL,
                    'EndDate'               => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function getLoanToLoanSettlementSummary($budget, $creditor, $debitor, $date) 
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
            'report.form.documentForm.finance.getLoanToLoanSettlementSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'        => $budget,
                    'CombinedBudgetSectionCode' => NULL,
                    'Creditor_RefID'            => $creditor ? $creditor : NULL,
                    'Debitor_RefID'             => $debitor ? $debitor : NULL
                ]
            ]
        );
    }
}