<?php

namespace App\Services\Process\Loan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class LoanSettlementService
{
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
                                    "principleSettlement"               => (int) $data['principleSettlement'],
                                    "penaltySettlement"                 => (int) $data['penaltySettlement'],
                                    "interestSettlement"                => (int) $data['interestSettlement'],
                                    "currency_RefID"                    => (int) $data['currency_RefID'],
                                    "currencyExchangeRate"              => (int) $data['currencyExchangeRate'],
                                    "chartOfAccount_Settlement_RefID"   => (int) $data['chartOfAccount_Settlement_RefID'],
                                    "chartOfAccount_Penalty_RefID"      => (int) $data['chartOfAccount_Penalty_RefID'],
                                    "chartOfAccount_Interest_RefID"     => (int) $data['chartOfAccount_Interest_RefID'],
                                    ]
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}