<?php

namespace App\Services\Process\Reimbursement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class ReimbursementService
{
    public function getDetail($reimbursementRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getReimbursementDetail',
            'latest',
            [
            'parameter' => [
                'reimbursement_RefID' => (int) $reimbursementRefID
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
        );
    }

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request;
        $detailItems    = json_decode($data['reimbursementDetail'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setReimbursement',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"                    => date('Y-m-d'),
                "requesterWorkerJobsPosition_RefID"     => (int) $careerRefID,
                "beneficiaryWorkerJobsPosition_RefID"   => (int) $data['beneficiary_id'],
                "beneficiaryBankAccount_RefID"          => (int) $data['bank_account_id'],
                "date"                                  => $data['date_customer'],
                "log_FileUpload_Pointer_RefID"          => $fileID,
                "remarks"                               => $data['var_remark'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request;
        $detailItems    = json_decode($data['reimbursementDetail'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setReimbursement',
            'latest',
            [
            'recordID' => (int) $data['reimbursement_RefID'],
            'entities' => [
                "documentDateTimeTZ"                    => date('Y-m-d'),
                "requesterWorkerJobsPosition_RefID"     => (int) $careerRefID,
                "beneficiaryWorkerJobsPosition_RefID"   => (int) $data['beneficiary_id'],
                "beneficiaryBankAccount_RefID"          => (int) $data['bank_account_id'],
                "date"                                  => $data['date_customer'],
                "log_FileUpload_Pointer_RefID"          => $fileID,
                "remarks"                               => $data['var_remark'],
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