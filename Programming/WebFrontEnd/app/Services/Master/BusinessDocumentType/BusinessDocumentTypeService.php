<?php

namespace App\Services\Master\BusinessDocumentType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessDocumentTypeService
{
    public function getDetail($params)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.master.getBusinessDocumentType',
            'latest',
            [
                'parameter'     => $params['parameter'],
                'SQLStatement'  => $params['SQLStatement']
            ],
            false
        );
    }
}