<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class MasterDataService
{
    public function transporter()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'dataPickList.supplyChain.getTransporter', 
            'latest',
            [
            'parameter' => [
                ]
            ]
        );
    }
}