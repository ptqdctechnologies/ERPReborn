<?php

namespace App\Services\Purchase;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PurchaseRequisitionService
{
    public function getDetail($purchaseRequisitionRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail', 
            'latest', 
            [
            'parameter' => [
                'purchaseRequisition_RefID' => (int) $purchaseRequisitionRefID
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

    public function getPurchaseRequisitionSummary($budget, $subBudget, $date) 
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
            'report.form.documentForm.supplyChain.getPurchaseRequisitionSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'                    => $budget,
                    'CombinedBudgetSectionCode'             => $subBudget ? $subBudget : NULL,
                    // 'StartDate'                             => $date ? $startDate : NULL,
                    // 'EndDate'                               => $date ? $endDate : NULL
                ]
            ]
        );
    }
    
    public function create(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['purchaseRequisitionDetail'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'transaction.create.supplyChain.setPurchaseRequisition', 
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"                => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"      => $fileID,
                "requesterWorkerJobsPosition_RefID" => (int) $careerRefID,
                "deliveryDateTimeTZ"                => $data['dateCommance'],
                "deliveryTo_RefID"                  => (int) $data['deliver_RefID'],
                "deliveryTo_NonRefID"               => null,
                "fulfillmentDeadlineDateTimeTZ"     => $data['dateCommance'],
                "remarks"                           => $data['notes'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['purchaseRequisitionDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'transaction.update.supplyChain.setPurchaseRequisition', 
            'latest',
            [
            'recordID' => (int) $data['purchaseRequestID'],
            'entities' => [
                "documentDateTimeTZ"                => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"      => $fileID,
                "requesterWorkerJobsPosition_RefID" => (int) $careerRefID,
                "deliveryDateTimeTZ"                => $data['dateCommance'],
                "deliveryTo_RefID"                  => (int) $data['deliver_RefID'],
                "deliveryTo_NonRefID"               => null,
                "fulfillmentDeadlineDateTimeTZ"     => $data['dateCommance'],
                "remarks"                           => $data['remarks'],
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