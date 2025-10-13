<?php

namespace App\Services\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class MaterialReturnService
{
    public function getDetail($materialReceiveRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.supplyChain.getWarehouseOutboundOrderDetail',
            'latest',
            [
            'parameter' => [
                'warehouseOutboundOrder_RefID' => (int) $materialReceiveRefID,
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
    
    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'dataPickList.supplyChain.getWarehouseOutboundOrder', 
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

        // $data           = $request->storeData
        $data           = $request;
        $detailItems    = json_decode($data['material_return_detail'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.supplyChain.setWarehouseOutboundOrder',
            'latest',
            [
            'entities' => [
                'documentDateTimeTZ'                => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'      => $fileID,
                'requesterWorkerJobsPosition_RefID' => (int) $careerRefID,
                'transporter_RefID'                 => (int) $data['transporter_id'],
                'remarks'                           => nl2br(e($data['remarks'])),
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function update(Request $request) 
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request;
        $detailItems    = json_decode($data['material_return_detail'], true);
        
        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'transaction.update.supplyChain.setWarehouseOutboundOrder', 
            'latest', 
            [
            'recordID' => (int) $data['warehouseOutboundOrder_RefID'],
            'entities' => [
                'documentDateTimeTZ'                => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'      => null,
                'requesterWorkerJobsPosition_RefID' => (int) $careerRefID,
                'transporter_RefID'                 => (int) $data['transporter_id'],
                'remarks'                           => $data['remarks'],
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
