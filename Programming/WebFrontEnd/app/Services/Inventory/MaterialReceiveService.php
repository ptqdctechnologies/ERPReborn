<?php

namespace App\Services\Inventory;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class MaterialReceiveService
{
    public function detail($materialReceiveRefID)
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
}
