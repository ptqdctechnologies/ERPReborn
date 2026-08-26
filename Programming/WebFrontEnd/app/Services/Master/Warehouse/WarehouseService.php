<?php

namespace App\Services\Master\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WarehouseService
{
    public function detail($warehouseCode)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataList.supplyChain.getWarehouse',
            'latest',
            [
                'parameter' => [
                    'pagination' => [
                        'pageSize' => 10,
                        'pageShow' => 1
                    ],
                    'dataFilter' => [
                        'name' => NULL,
                        'code' => $warehouseCode,
                        'warehouseType_RefID' => NULL
                    ],
                ]
            ]
        );
    }

    public function picklist($formatted)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataPickList.supplyChain.getWarehouse',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }

    public function typePicklist()
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'dataPickList.supplyChain.getWarehouseType',
            'latest',
            [
                'parameter' => []
            ]
        );
    }

    public function create($request)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.supplyChain.setWarehouse',
            'latest',
            [
                'entities' => [
                    'institutionBranch_RefID' => 124000000000001,
                    'name' => $request->warehouse_name,
                    'warehouseType_RefID' => (int) $request->warehouse_type_id,
                    'address' => $request->warehouse_address,
                    'location' => [
                        'country_code' => $request->country_code,
                        'country' => $request->country_name,
                        'province_code' => $request->province_code,
                        'province' => $request->province_name,
                        'city' => $request->city_name
                    ],
                    'code' => $request->warehouse_code
                ]
            ]
        );
    }

    public function revision($request, $id)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.supplyChain.setWarehouse',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    'institutionBranch_RefID' => 124000000000001,
                    'name' => $request->warehouse_name,
                    'warehouseType_RefID' => (int) $request->warehouse_type_id,
                    'address' => $request->warehouse_address,
                    'location' => [
                        'country_code' => $request->country_code,
                        'country' => $request->country_name,
                        'province_code' => $request->province_code,
                        'province' => $request->province_name,
                        'city' => $request->city_name
                    ],
                    'code' => $request->warehouse_code,
                    'status' => $request->warehouse_status == 1 ? true : false
                ]
            ]
        );
    }
}