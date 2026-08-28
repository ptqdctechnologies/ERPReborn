<?php

namespace App\Services\Finance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class RateService
{
    public function create($request)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.master.setCurrencyExchangeRate',
            'latest',
            [
                'entities' => [
                    "currency_RefID" => (int) $request['currency_id'],
                    "rate" => (float) str_replace(',', '', $request['rate'])
                ]
            ]
        );
    }
}