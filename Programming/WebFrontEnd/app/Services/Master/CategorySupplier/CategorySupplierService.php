<?php

namespace App\Services\Master\CategorySupplier;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CategorySupplierService
{
    public function getDetail($categorySupplierRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.master.getSupplierCategoryDetail',
            'latest',
            [
                'parameter' => [
                    'category_RefID' => $categorySupplierRefID
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

    public function update($id, $code, $name)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.master.setSupplierCategory',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "code" => $code,
                    "name" => $name
                ]
            ]
        );
    }
}