<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class DeliveryOrderService
{
    public function create(Request $request): array
    {
        $sessionToken                       = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
        $deliveryOrderData                  = $request->all();
        $deliveryFromRefID                  = $deliveryOrderData['storeData']['deliveryFrom_RefID'] ? (int) $deliveryOrderData['storeData']['deliveryFrom_RefID'] : null;
        $deliveryToRefID                    = $deliveryOrderData['storeData']['deliveryTo_RefID'] ? (int) $deliveryOrderData['storeData']['deliveryTo_RefID'] : null;
        $deliveryOrderDetail                = json_decode($deliveryOrderData['storeData']['deliveryOrderDetail'], true);
        $fileID                             = $deliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $deliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.supplyChain.setDeliveryOrder',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ"                => $deliveryOrderData['storeData']['var_date'],
                    "log_FileUpload_Pointer_RefID"      => $fileID,
                    "requesterWorkerJobsPosition_RefID" => $SessionWorkerCareerInternal_RefID,
                    "transporter_RefID"                 => (int) $deliveryOrderData['storeData']['transporter_id'],
                    "deliveryDateTimeTZ"                => null,
                    "deliveryFrom_RefID"                => $deliveryFromRefID,
                    "deliveryFrom_NonRefID"             => $deliveryOrderData['storeData']['delivery_from'],
                    "deliveryTo_RefID"                  => $deliveryToRefID,
                    "deliveryTo_NonRefID"               => $deliveryOrderData['storeData']['delivery_to'],
                    "remarks"                           => $deliveryOrderData['storeData']['var_remark'],
                    "additionalData"                    => [
                        "itemList"                      => [
                            "items"                     => $deliveryOrderDetail
                        ]
                    ]
                ]
            ]
        );
    }
}
