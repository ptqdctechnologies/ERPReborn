<?php

namespace App\Services\Process\BusinessTrip;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessTripService
{
    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'dataPickList.humanResource.getPersonBusinessTrip', 
            'latest',
            [
            'parameter' => [
                ]
            ]
        );
    }
}