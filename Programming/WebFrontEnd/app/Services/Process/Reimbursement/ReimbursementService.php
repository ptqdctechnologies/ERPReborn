<?php

namespace App\Services\Process\Reimbursement;

use Carbon\Carbon;
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

    public function getReimbursementSummary($budget, $vendor, $date)
    {
        $sessionToken = Session::get('SessionLogin');

        if ($date) {
            $dates = explode(' - ', $date);
            $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.documentForm.finance.getReimbursementSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'Vendor_RefID' => $vendor ? $vendor : NULL,
                    // 'StartDate'              => $date ? $startDate : NULL,
                    // 'EndDate'                => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function getReimbursementToDebitNote($budget, $customer, $date)
    {
        $sessionToken = Session::get('SessionLogin');

        if ($date) {
            $dates = explode(' - ', $date);
            $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.documentForm.finance.getReimbursementToDebitNoteSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => NULL,
                    // 'Customer_RefID' => $customer ? $customer : NULL,
                    // 'StartDate' => $date ? $startDate : NULL,
                    // 'EndDate' => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function create(Request $request)
    {
        $sessionToken = Session::get('SessionLogin');
        $careerRefID = Session::get('SessionWorkerCareerInternal_RefID');

        $data = $request->storeData;
        $detailItems = json_decode($data['reimbursementDetail'], true);
        $fileID = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setReimbursement',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "requesterWorkerJobsPosition_RefID" => (int) $data['customer_id'],
                    "beneficiaryWorkerJobsPosition_RefID" => (int) $data['beneficiary_id'],
                    "beneficiaryBankAccount_RefID" => (int) $data['bank_account_id'],
                    "date" => null,
                    "log_FileUpload_Pointer_RefID" => $fileID,
                    "remarks" => $data['var_remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request)
    {
        $sessionToken = Session::get('SessionLogin');
        $careerRefID = Session::get('SessionWorkerCareerInternal_RefID');

        $data = $request->storeData;
        $detailItems = json_decode($data['reimbursementDetail'], true);
        $fileID = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setReimbursement',
            'latest',
            [
                'recordID' => (int) $data['reimbursement_RefID'],
                'entities' => [
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "requesterWorkerJobsPosition_RefID" => (int) $data['customer_id'],
                    "beneficiaryWorkerJobsPosition_RefID" => (int) $data['beneficiary_id'],
                    "beneficiaryBankAccount_RefID" => (int) $data['bank_account_id'],
                    "date" => null,
                    "log_FileUpload_Pointer_RefID" => $fileID,
                    "remarks" => $data['var_remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}