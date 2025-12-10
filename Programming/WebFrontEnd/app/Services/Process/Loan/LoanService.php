<?php

namespace App\Services\Process\Loan;

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

        $data           = $request;
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setLoan',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "creditor_RefID"                => $data['creditor_id'],
                "debitor_RefID"                 => $data['debitor_id'],
                "bankAccount_RefID"             => $data['bank_account_id'],
                "loanTerm"                      => $data['loan_term'],
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "notes"                         => $data['remark'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => [
                                [
                                "entities"      => [
                                    "principleLoan"                     => $data['principle_loan'],
                                    "lendingRate"                       => $data['landing_rate'],
                                    "currency_RefID"                    => $data['currency_id'],
                                    "currencyExchangeRate"              => 1,
                                    "chartOfAccount_RefID"              => $data['coa_id'],
                                    "combinedBudgetSectionDetail_RefID" => null,
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}