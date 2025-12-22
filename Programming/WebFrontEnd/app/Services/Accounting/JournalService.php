<?php

namespace App\Services\Accounting;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class JournalService
{
    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $journalDetail  = json_decode($data['journalDetail'], true);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.accounting.setJournal',
            'latest',
            [
            'entities' => [
                'documentDateTimeTZ'                => date('Y-m-d'),
                "bankAccount_RefID"                 => (int) $data['bankAccountsID'],
                "combinedBudgetSectionDetail_RefID" => 169000000000001,
                'journalDateTimeTZ'                 => Carbon::createFromFormat('m/d/Y', $data['journalDate'])->format('Y-m-d'),
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $journalDetail
                        ],
                    "cashDisbursementItemList"  => [
                        "items"                 => [
                                [
                                "entities"      => [
                                    'documentDateTimeTZ'                => date('Y-m-d'),
                                    'log_FileUpload_Pointer_RefID'      => null,
                                    "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                    'beneficiaryBankAccount_RefID'      => 167000000000001,
                                    'chartOfAccount_RefID'              => 65000000000005,
                                    'amountCurrency_RefID'              => 62000000000001,
                                    'amountCurrencyValue'               => 50000,
                                    'amountCurrencyExchangeRate'        => 1,
                                    "remarks"                           => 'Dummy'
                                    ]
                                ]
                            ]
                        ],
                    "cashReceiptItemList"   => [
                        "items"             => [
                                [
                                "entities"  => [
                                    'documentDateTimeTZ'                => date('Y-m-d'),
                                    'log_FileUpload_Pointer_RefID'      => null,
                                    "combinedBudgetSectionDetail_RefID" => 169000000000001,
                                    'senderBankAccount_RefID'           => 167000000000001,
                                    'chartOfAccount_RefID'              => 65000000000005,
                                    'amountCurrency_RefID'              => 62000000000001,
                                    'amountCurrencyValue'               => 50000,
                                    'amountCurrencyExchangeRate'        => 1,
                                    "remarks"                           => 'Dummy'
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