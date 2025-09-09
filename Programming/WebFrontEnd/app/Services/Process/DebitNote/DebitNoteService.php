<?php

namespace App\Services\Process\DebitNote;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class DebitNoteService
{
    public function dataPickList() 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.finance.getDebitNote',
            'latest',
            [
                'parameter' => []
            ],
            false
        );
    }

    public function getDetail($debitNoteRefID) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getDebitNoteDetail',
            'latest',
            [
                'parameter' => [
                    'debitNote_RefID' => (int) $debitNoteRefID,
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
        $detailItems    = json_decode($data['debit_note_details'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setDebitNote',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "partner_RefID"                 => (int) $data['debit_note_partner_id'],
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => nl2br(e($data['remarks'])),
                "workflow_Status"               => null,
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => $detailItems
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
        $detailItems    = json_decode($data['debit_note_details'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setDebitNote',
            'latest',
            [
            'recordID'  => (int) $data['debit_note_id'],
            'entities'  => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => nl2br(e($data['remarks'])),
                "workflow_Status"               => null,
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}