<?php

namespace App\Services\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class DeliveryOrderService
{
    public function getDetail($deliveryOrderID) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
            'latest',
            [
                'parameter' => [
                    'deliveryOrder_RefID' => (int) $deliveryOrderID
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

    public function create(Request $request): array
    {
        $sessionToken                       = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
        $deliveryOrderData                  = $request->all();
        $deliveryFromRefID                  = $deliveryOrderData['storeData']['deliveryFrom_RefID'] ? (int) $deliveryOrderData['storeData']['deliveryFrom_RefID'] : null;
        $deliveryToRefID                    = $deliveryOrderData['storeData']['deliveryTo_RefID'] ? (int) $deliveryOrderData['storeData']['deliveryTo_RefID'] : null;
        $stockMovementStatus                = isset($deliveryOrderData['storeData']['stock_movement_status']) ? (int) $deliveryOrderData['storeData']['stock_movement_status'] : null;
        $stockMovementRequester_RefID       = $deliveryOrderData['storeData']['worker_id_stock_movement'] ? (int) $deliveryOrderData['storeData']['worker_id_stock_movement'] : null;
        $deliveryOrderDetail                = json_decode($deliveryOrderData['storeData']['deliveryOrderDetail'], true);
        $fileID                             = $deliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $deliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.supplyChain.setDeliveryOrder',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ"                => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID"      => $fileID,
                    "requesterWorkerJobsPosition_RefID" => $SessionWorkerCareerInternal_RefID,
                    "transporter_RefID"                 => (int) $deliveryOrderData['storeData']['transporter_id'],
                    "deliveryDateTimeTZ"                => $deliveryOrderData['storeData']['delivery_date'],
                    "deliveryFrom_RefID"                => $deliveryFromRefID,
                    "deliveryFrom_NonRefID"             => $deliveryOrderData['storeData']['delivery_from'],
                    "deliveryTo_RefID"                  => $deliveryToRefID,
                    "deliveryTo_NonRefID"               => $deliveryOrderData['storeData']['delivery_to'],
                    "stockMovementRequester_RefID"      => $stockMovementRequester_RefID, 
                    "stockMovementStatus"               => $stockMovementStatus, // 0 => "RENT", 1 => "PERMANENT", null => Option non-select
                    "type"                              => (int) $deliveryOrderData['storeData']['reference_type'], // 0 => "PURCHASE_ORDER", 1 => "INTERNAL_USE", 2 => "STOCK_MOVEMENT", null => Option non-select
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

    public function updates(Request $request): array
    {
        $varAPIWebToken                     = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID  = Session::get('SessionWorkerCareerInternal_RefID');
        $revisionDeliveryOrderData          = $request->all();
        $deliveryOrderDetail                = json_decode($revisionDeliveryOrderData['storeData']['deliveryOrderDetail'], true);
        $fileID                             = $revisionDeliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] ? (int) $revisionDeliveryOrderData['storeData']['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.supplyChain.setDeliveryOrder',
            'latest',
            [
            'recordID' => (int) $revisionDeliveryOrderData['storeData']['do_id'],
            'entities' => [
                "documentDateTimeTZ"                => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"      => $fileID,
                "requesterWorkerJobsPosition_RefID" => (int) $SessionWorkerCareerInternal_RefID,
                "transporter_RefID"                 => (int) $revisionDeliveryOrderData['storeData']['transporter_id'],
                "deliveryDateTimeTZ"                => $revisionDeliveryOrderData['storeData']['deliveryDateTime'],
                "deliveryFrom_RefID"                => null,
                "deliveryFrom_NonRefID"             => $revisionDeliveryOrderData['storeData']['delivery_from'],
                "deliveryTo_RefID"                  => null,
                "deliveryTo_NonRefID"               => $revisionDeliveryOrderData['storeData']['delivery_to'],
                "stockMovementRequester_RefID"      => $stockMovementRequester_RefID,
                "stockMovementStatus"               => $stockMovementStatus,
                "type"                              => (int) $deliveryOrderData['storeData']['reference_type'],
                "remarks"                           => $revisionDeliveryOrderData['storeData']['var_remark'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => $deliveryOrderDetail
                        ]
                    ]
                ]
            ]
        );
    }
}
