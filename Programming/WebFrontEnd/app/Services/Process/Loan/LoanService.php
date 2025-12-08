<?php

namespace App\Services\Process\Loan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class LoanService
{
    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');

        $data           = $request->storeData;
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setLoan',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "creditor_RefID"                => 166000000000001,
                "debitor_RefID"                 => 25000000000001,
                "bankAccount_RefID"             => 167000000000004,
                "loanTerm"                      => 365,
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "notes"                         => "My Notes 1",
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => [
                                [
                                "entities"      => [
                                    "principleLoan"                     => 1000000000,
                                    "lendingRate"                       => 10,
                                    "currency_RefID"                    => 62000000000001,
                                    "currencyExchangeRate"              => 1,
                                    "chartOfAccount_RefID"              => 65000000000005,
                                    "combinedBudgetSectionDetail_RefID" => 169000000000024,
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