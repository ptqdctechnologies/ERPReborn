<?php

namespace App\Services\Master\Bank;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BankService
{
    public function picklist($formatted)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataPickList.master.getBank',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }

    public function accountPicklist($formatted)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataPickList.master.getBankAccount',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }
}