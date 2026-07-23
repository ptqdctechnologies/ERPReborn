<?php

namespace App\Services\Master\SpecializationSupplier;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class SpecializationSupplierService
{
    public function getPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.master.getSupplierSubCategory',
            'latest',
            [
                'parameter' => []
            ]
        );
    }

    public function getDetail($subCategoryCodeRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.master.getSupplierSubCategoryDetail',
            'latest',
            [
                'parameter' => [
                    'subCategoryCode' => $subCategoryCodeRefID
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

    public function create($categoryCode, $specialization)
    {
        $token = Session::get('SessionLogin');
        // $specializationDetails = json_decode($specialization, true);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.master.setSupplierSubCategory',
            'latest',
            [
                "categoryCode" => $categoryCode,
                "specializationDetails" => $specialization
            ]
        );
    }

    public function update($id, $categoryCode, $code, $name, $status)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.master.setSupplierSubCategory',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "categoryCode" => $categoryCode,
                    "code" => $code,
                    "name" => $name,
                    "status" => $status
                ]
            ]
        );
    }
}