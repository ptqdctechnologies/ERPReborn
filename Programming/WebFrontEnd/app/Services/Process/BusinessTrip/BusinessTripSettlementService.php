<?php

namespace App\Services\Process\BusinessTrip;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessTripSettlementService
{
    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.humanResource.getPersonBusinessTripSettlement',
            'latest',
            [
                'parameter' => [
                ]
            ]
        );
    }

    public function getDetail($businessTripSettlementRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.humanResource.getPersonBusinessTripSettlementDetail',
            'latest',
            [
                'parameter' => [
                    'personBusinessTrip_RefID' => (int) $businessTripSettlementRefID,
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

    public function getBusinessTripSettlementSummary($budget, $subBudget, $requester, $date)
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
            'report.form.documentForm.humanResource.getPersonBusinessTripSettlementSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'RequesterWorkerJobsPosition_RefID' => $requester ? $requester : NULL,
                    'BeneficiaryWorkerJobsPosition_RefID' => NULL,
                    'StartDate' => $date ? $startDate : NULL,
                    'EndDate' => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function create(Request $request): array
    {
        $sessionToken = Session::get('SessionLogin');

        $data = $request->storeData;
        $detailItems = json_decode($data['businessTripSettlementDetail'], true);
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.humanResource.setPersonBusinessTripSettlement',
            'latest',
            [
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'log_FileUpload_Pointer_RefID' => $fileID,
                    'remarks' => $data['var_remark'],
                    'additionalData' => [
                        'itemList' => [
                            'items' => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request, $id): array
    {
        $sessionToken = Session::get('SessionLogin');

        $data = $request->storeData;
        $detailItems = json_decode($data['businessTripSettlementDetail'], true);
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.humanResource.setPersonBusinessTripSettlement',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'log_FileUpload_Pointer_RefID' => $fileID,
                    'remarks' => $data['var_remark'],
                    'additionalData' => [
                        'itemList' => [
                            'items' => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}