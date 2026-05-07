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
    public function create(Request $request)
    {
        $token = Session::get('SessionLogin');

        $detailItems = [];
        foreach ($request->specialization as $category => $specs) {
            foreach ($specs as $spec) {
                $detailItems[] = [
                    "entities" => [
                        "category_RefID" => (int) $category,
                        "specialization_RefID" => (int) $spec
                    ]
                ];
            }
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.supplyChain.setSupplier',
            'latest',
            [
                'entities' => [
                    "supplierName" => $request->supplier_name,
                    "taxID" => $request->tax_id,
                    "phoneNumber" => $request->phone_number,
                    "email" => $request->email,
                    "country" => $request->country_name,
                    "province" => $request->province_name,
                    "city" => $request->city_name,
                    "address" => $request->address,
                    "contactPerson" => $request->contact_person,
                    "bank_RefID" => $request->bank_id,
                    "accountNumber" => $request->account_number,
                    "accountName" => $request->account_name,
                    "remark" => $request->remark,
                    "institutionType_RefID" => $request->legal_entity_value,
                    "log_FileUpload_Pointer_RefID" => null,
                    "additionalData" => [
                        "itemList" => [
                            "items" => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}