<?php

namespace App\Services\Master\Product;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class ProductService
{
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
}