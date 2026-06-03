<?php

namespace App\Services\Master\Product;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class ProductService
{
    public function getDetail($productID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.master.getProductDetail',
            'latest',
            [
                'parameter' => [
                    'product_RefID' => (int) $productID
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ],
            false
        );
    }

    public function create($categoryRefID, $subCategoryRefID, $productName, $unitOfMeasureRefID)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.master.setProduct',
            'latest',
            [
                'entities' => [
                    "category_RefID" => (int) $categoryRefID,
                    "subCategory_RefID" => (int) $subCategoryRefID,
                    "productName" => $productName,
                    "unitOfMeasure_RefID" => (int) $unitOfMeasureRefID
                ]
            ]
        );
    }

    public function update($productRefID, $categoryRefID, $subCategoryRefID, $productName, $unitOfMeasureRefID)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.master.setProduct',
            'latest',
            [
                'recordID' => (int) $productRefID,
                'entities' => [
                    "category_RefID" => (int) $categoryRefID,
                    "subCategory_RefID" => (int) $subCategoryRefID,
                    "productName" => $productName,
                    "unitOfMeasure_RefID" => (int) $unitOfMeasureRefID
                ]
            ]
        );
    }
}