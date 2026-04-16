<?php

namespace App\Services\Process\CreditNote;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CreditNoteService
{
    public function getDetail($creditNoteRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getCreditNoteDetail',
            'latest',
            [
            'parameter' => [
                'creditNote_RefID' => (int) $creditNoteRefID
                ],
            'SQLStatement'  => [
                'pick'      => null,
                'sort'      => null,
                'filter'    => null,
                'paging'    => null
                ]
            ]
        );
    }

    public function getCreditNoteSummary($budget, $subBudget, $date, $supplier) 
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
            'report.form.documentForm.finance.getCreditNoteSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'        => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    // 'StartDate'              => $date ? $startDate : NULL,
                    // 'EndDate'                => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['creditNoteDetail'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setCreditNote',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "customer_RefID"                => 125000000000001,
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => nl2br(e($data['remarks'])),
                "additionalData"                => [
                    "itemList"                  => [
                        "items"                 => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function update(Request $request) 
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['creditNoteDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setCreditNote',
            'latest',
            [
            'recordID'  => (int) $data['creditNote_RefID'],
            'entities'  => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => nl2br(e($data['remarks'])),
                "additionalData"                => [
                    "itemList"                  => [
                        "items"                 => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}