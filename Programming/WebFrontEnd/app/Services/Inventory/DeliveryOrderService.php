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
        $sessionToken                      = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

        $data = $request->storeData;

        $deliveryDateTimeTZ = $data['delivery_date'] === "null" ? null : $data['delivery_date'];

        $poFromRefID        = !empty($data['purchase_order_delivery_from_id']) ? (int) $data['purchase_order_delivery_from_id'] : null;
        $poToRefID          = !empty($data['purchase_order_delivery_to_id']) ? (int) $data['purchase_order_delivery_to_id'] : null;
        $poFromNonRefID     = $data['purchase_order_delivery_from'] ?? null;
        $poToNonRefID       = $data['purchase_order_delivery_to'] ?? null;

        $internalFromRefID  = !empty($data['internal_use_delivery_from_id']) ? (int) $data['internal_use_delivery_from_id'] : null;
        $internalToRefID    = !empty($data['internal_use_delivery_to_id']) ? (int) $data['internal_use_delivery_to_id'] : null;
        $internalFromName   = $data['internal_use_delivery_from_name'] ?? null;
        $internalToName     = $data['internal_use_delivery_to_name'] ?? null;

        $stockFromRefID     = !empty($data['stock_movement_delivery_from_id']) ? (int) $data['stock_movement_delivery_from_id'] : null;
        $stockToRefID       = !empty($data['stock_movement_delivery_to_id']) ? (int) $data['stock_movement_delivery_to_id'] : null;
        $stockFromName      = $data['stock_movement_delivery_from_name'] ?? null;
        $stockToName        = $data['stock_movement_delivery_to_name'] ?? null;

        $referenceType = (int) $data['reference_type'];

        $deliveryFromRefID = match ($referenceType) {
            0 => $poFromRefID,
            1 => $internalFromRefID,
            default => $stockFromRefID,
        };

        $deliveryToRefID = match ($referenceType) {
            0 => $poToRefID,
            1 => $internalToRefID,
            default => $stockToRefID,
        };

        $deliveryFromNonRefID = match ($referenceType) {
            0 => $poFromNonRefID,
            1 => $internalFromName,
            default => $stockFromName,
        };

        $deliveryToNonRefID = match ($referenceType) {
            0 => $poToNonRefID,
            1 => $internalToName,
            default => $stockToName,
        };

        $stockMovementStatus = isset($data['stock_movement_status']) && $data['stock_movement_status'] > -1 ? (int) $data['stock_movement_status'] : null;
        $stockRequesterRefID = !empty($data['stock_movement_requester_id']) ? (int) $data['stock_movement_requester_id'] : null;

        $deliveryDetails     = json_decode($data['delivery_order_details'], true);
        $fileID              = !empty($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $payload = [
            'entities' => [
                "documentDateTimeTZ"                => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"      => $fileID,
                "requesterWorkerJobsPosition_RefID" => $SessionWorkerCareerInternal_RefID,
                "transporter_RefID"                 => (int) $data['transporter_id'],
                "deliveryDateTimeTZ"                => $deliveryDateTimeTZ,
                "deliveryFrom_RefID"                => $deliveryFromRefID,
                "deliveryFrom_NonRefID"             => $deliveryFromNonRefID,
                "deliveryTo_RefID"                  => $deliveryToRefID,
                "deliveryTo_NonRefID"               => $deliveryToNonRefID,
                "stockMovementRequester_RefID"      => $stockRequesterRefID,
                "stockMovementStatus"               => $stockMovementStatus,
                "type"                              => $referenceType,
                "remarks"                           => $data['var_remark'],
                "additionalData"                    => [
                    "itemList" => [
                        "items" => $deliveryDetails
                    ]
                ]
            ]
        ];

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.supplyChain.setDeliveryOrder',
            'latest',
            $payload
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
