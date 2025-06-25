<?php

namespace App\Services\Purchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PurchaseRequisitionService
{
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