<?php

namespace App\Services\Inventory;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class MaterialReceiveService
{
    public function getDetail($materialReceiveRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.supplyChain.getWarehouseInboundOrderDetail',
            'latest',
            [
            'parameter' => [
                'warehouseInboundOrder_RefID' => (int) $materialReceiveRefID,
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

    public function getMaterialReceiveSummary($budget, $receivedID, $deliveryFromID, $deliveryToID, $date)
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
            'report.form.documentForm.supplyChain.getWarehouseInboundOrderSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'    => $budget,
                    'DeliveryFrom_RefID'    => $deliveryFromID ? $deliveryFromID : NULL,
                    'DeliveryTo_RefID'      => $deliveryToID ? $deliveryToID : NULL
                    // 'StartDate'             => $date ? $startDate : NULL,
                    // 'EndDate'               => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'dataPickList.supplyChain.getWarehouseInboundOrder', 
            'latest',
            [
            'parameter' => [
                ]
            ]
        );
    }

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data               = $request->storeData;
        $detailItems        = json_decode($data['materialReceiveDetail'], true);
        $fileID             = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;
        $deliveryFromRefID  = isset($data['id_delivery_order_from']) ? (int) $data['id_delivery_order_from'] : null;
        $deliveryToRefID    = isset($data['id_delivery_order_to']) ? (int) $data['id_delivery_order_to'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.supplyChain.setWarehouseInboundOrder',
            'latest',
            [
            'entities' => [
                'documentDateTimeTZ'                => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'      => $fileID,
                'requesterWorkerJobsPosition_RefID' => (int) $careerRefID,
                "transporter_RefID"                 => (int) $data['transporterRefID'],
                "deliveryDateTimeTZ"                => $data['deliveryDateTimeTZ'],
                "deliveryFrom_RefID"                => $deliveryFromRefID,
                "deliveryFrom_NonRefID"             => $data['address_delivery_order_from'],
                "deliveryTo_RefID"                  => $deliveryToRefID,
                "deliveryTo_NonRefID"               => $data['address_delivery_order_to'],
                'remarks'                           => $data['var_remark'],
                "receiveDateTimeTZ"                 => $data['receive_date'],
                "warehouse_RefID"                   => (int) $data['warehouse_id'],
                "additionalData"                    => [
                    "itemList"                      => [
                        "items"                     => $detailItems
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

        $data               = $request->storeData;
        $detailItems        = json_decode($data['materialReceiveDetail'], true);
        $fileID             = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;
        $deliveryFromRefID  = isset($data['id_delivery_order_from']) ? (int) $data['id_delivery_order_from'] : null;
        $deliveryToRefID    = isset($data['id_delivery_order_to']) ? (int) $data['id_delivery_order_to'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.supplyChain.setWarehouseInboundOrder',
            'latest',
            [
            'recordID' => (int) $data['warehouseInboundOrder_RefID'],
            'entities' => [
                'documentDateTimeTZ'                => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'      => $fileID,
                'requesterWorkerJobsPosition_RefID' => (int) $careerRefID,
                'transporter_RefID'                 => (int) $data['transporter_RefID'],
                'deliveryDateTimeTZ'                => $data['deliveryDate'],
                'deliveryFrom_RefID'                => $deliveryFromRefID,
                'deliveryFrom_NonRefID'             => $data['address_delivery_order_from'],
                'deliveryTo_RefID'                  => $deliveryToRefID,
                'deliveryTo_NonRefID'               => $data['address_delivery_order_to'],
                'remarks'                           => $data['var_remark'],
                "receiveDateTimeTZ"                 => $data['receive_date'],
                "warehouse_RefID"                   => (int) $data['warehouse_id'],
                'additionalData'                    => [
                    'itemList'                      => [
                        'items'                     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}
