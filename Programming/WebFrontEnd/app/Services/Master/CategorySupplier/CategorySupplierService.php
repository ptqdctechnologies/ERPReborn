<?php

namespace App\Services\Master\CategorySupplier;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CategorySupplierService
{
    public function getPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.master.getSupplierCategory',
            'latest',
            [
                'parameter' => []
            ],
            false
        );
    }

    public function getPicklistWithSpecialization()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.master.getSupplierCategorySubCategory',
            'latest',
            [
                'parameter' => []
            ],
            false
        );
    }

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

    public function create($code, $name)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.master.setSupplierCategory',
            'latest',
            [
                'entities' => [
                    "code" => $code,
                    "name" => $name
                ]
            ]
        );
    }

    public function update($id, $code, $name, $status)
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
                    "name" => $name,
                    "status" => $status
                ]
            ]
        );
    }
}