<?php

namespace App\Services\Finance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class RateService
{
    public function detail($id)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.read.dataList.master.getCurrencyExchangeRateDetail',
            'latest',
            [
                'parameter' => [
                    'currencyExchangeRate_RefID' => (int) $id
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

    public function update($request, $id)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.master.setCurrencyExchangeRate',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "currency_RefID" => (int) $request['currency_id'],
                    "rate" => (float) str_replace(',', '', $request['rate'])
                ]
            ]
        );
    }
}