<?php

namespace App\Services\Master\Bank;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BankService
{
    public function picklist($formatted)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.dataList.master.getBank',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }
}