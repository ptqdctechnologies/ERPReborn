<?php

namespace App\Services\Master\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class SupplierService
{
    public function getPickList($supplierID)
    {
        $sessionToken = Session::get('SessionLogin');

        $filter = null;
        if (!empty($supplierID) && $supplierID != 'undefined') {
            $filter = '"Sys_ID" = \'' . addslashes($supplierID) . '\'';
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.supplyChain.getSupplier',
            'latest',
            [
                'parameter' => null,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => '"Code" ASC',
                    'filter' => $filter,
                    'paging' => null
                ]
            ],
            false
        );
    }
}