<?php

namespace App\Services\Master\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WarehouseService
{
    public function picklist()
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'dataPickList.supplyChain.getWarehouse',
            'latest',
            [
                'parameter' => []
            ]
        );
    }
}