<?php

namespace App\Services\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class DeliveryOrderService
{
    public function stockDetail($combinedBudget_RefID, $warehouse_RefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.supplyChain.getStockDetail',
            'latest',
            [
            'parameter'     => [
                'combinedBudget_RefID'  => (int) $combinedBudget_RefID,
                'warehouse_RefID'       => (int) $warehouse_RefID
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

        $deliveryOrderData                  = $request->storeData;

        $deliveryDateTimeTZ                 = $deliveryOrderData['delivery_date'] == "null" ? null : $deliveryOrderData['delivery_date'];

        $deliveryFromRefID                  = isset($deliveryOrderData['purchase_order_delivery_from_id']) && $deliveryOrderData['purchase_order_delivery_from_id'] ? (int) $deliveryOrderData['purchase_order_delivery_from_id'] : null;
        $deliveryToRefID                    = isset($deliveryOrderData['purchase_order_delivery_to_id']) && $deliveryOrderData['purchase_order_delivery_to_id'] ? (int) $deliveryOrderData['purchase_order_delivery_to_id'] : null;

        $stockMovementStatus                = isset($deliveryOrderData['stock_movement_status']) && $deliveryOrderData['stock_movement_status'] ? (int) $deliveryOrderData['stock_movement_status'] : null;
        $stockMovementRequester_RefID       = isset($deliveryOrderData['stock_movement_requester_id']) && $deliveryOrderData['stock_movement_requester_id'] ? (int) $deliveryOrderData['stock_movement_requester_id'] : null;

        $deliveryOrderDetail                = json_decode($deliveryOrderData['delivery_order_details'], true);

        $fileID                             = $deliveryOrderData['dataInput_Log_FileUpload_1'] ? (int) $deliveryOrderData['dataInput_Log_FileUpload_1'] : null;

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
                    "transporter_RefID"                 => (int) $deliveryOrderData['transporter_id'],
                    "deliveryDateTimeTZ"                => $deliveryDateTimeTZ,
                    "deliveryFrom_RefID"                => $deliveryFromRefID,
                    "deliveryFrom_NonRefID"             => $deliveryOrderData['purchase_order_delivery_from'] ?? null,
                    "deliveryTo_RefID"                  => $deliveryToRefID,
                    "deliveryTo_NonRefID"               => $deliveryOrderData['purchase_order_delivery_to'] ?? null,
                    "stockMovementRequester_RefID"      => $stockMovementRequester_RefID, 
                    "stockMovementStatus"               => $stockMovementStatus, // 0 => "RENT", 1 => "PERMANENT", null => Option non-select
                    "type"                              => (int) $deliveryOrderData['reference_type'], // 0 => "PURCHASE_ORDER", 1 => "INTERNAL_USE", 2 => "STOCK_MOVEMENT", null => Option non-select
                    "remarks"                           => $deliveryOrderData['var_remark'],
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
