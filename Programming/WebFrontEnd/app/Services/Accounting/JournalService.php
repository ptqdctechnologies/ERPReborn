<?php

namespace App\Services\Accounting;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class JournalService
{
    public function picklist()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.accounting.getJournal',
            'latest',
            [
            'parameter' => [
                ]
            ]
        );
    }

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data                       = $request->storeData;
        $journalDetail              = json_decode($data['journalDetail'], true);
        $cashDisbursementItemList   = json_decode($data['cashDisbursementItemList'], true);
        $cashReceiptItemList        = json_decode($data['cashReceiptItemList'], true);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.accounting.setJournal',
            'latest',
            [
            'entities' => [
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $journalDetail
                        ],
                    "cashDisbursementItemList"  => [
                        "items"                 => $cashDisbursementItemList
                        ],
                    "cashReceiptItemList"   => [
                        "items"             => $cashReceiptItemList
                        ]
                    ]
                ]
            ]
        );
    }
}