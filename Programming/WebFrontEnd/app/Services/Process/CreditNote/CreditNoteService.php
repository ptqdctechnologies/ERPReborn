<?php

namespace App\Services\Process\CreditNote;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CreditNoteService
{
    public function getDetail($creditNoteRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getCreditNoteDetail',
            'latest',
            [
            'parameter' => [
                'creditNote_RefID' => (int) $creditNoteRefID
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

    public function create(Request $request)
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['creditNoteDetail'], true);
        $fileID         = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setCreditNote',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "customer_RefID"                => 125000000000001,
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => null,
                "workflow_Status"               => null,
                "additionalData"                => [
                    "itemList"      => [
                        "items"     => $detailItems
                            // [
                            // "entities" => [
                            //     "combinedBudgetSectionDetail_RefID" => 169000000000001,
                            //     "product_RefID" => 88000000000002,
                            //     "quantity" => 10,
                            //     "quantityUnit_RefID" => 73000000000001,
                            //     "productUnitPriceCurrency_RefID" => 62000000000001,
                            //     "productUnitPriceCurrencyValue" => 30000,
                            //     "productUnitPriceCurrencyExchangeRate" => 1,
                            //     "chartOfAccount_RefID" => 65000000000005
                            //     ]
                            // ],
                        ]
                    ]
                ]
            ]
        );
    }

    public function update(Request $request) 
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['creditNoteDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setCreditNote',
            'latest',
            [
            'recordID'  => (int) $data['creditNote_RefID'],
            'entities'  => [
                "documentDateTimeTZ"            => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"  => $fileID,
                "remarks"                       => null,
                "workflow_Status"               => null,
                "additionalData"                => [
                    "itemList"  => [
                        "items" => $detailItems
                            // [
                            // "recordID" => 243000000000014,
                            // "entities" => [
                            //     "combinedBudgetSectionDetail_RefID" => 169000000000001,
                            //     "product_RefID" => 88000000000002,
                            //     "quantity" => 4,
                            //     "quantityUnit_RefID" => 73000000000001,
                            //     "productUnitPriceCurrency_RefID" => 62000000000001,
                            //     "productUnitPriceCurrencyValue" => 30000,
                            //     "productUnitPriceCurrencyExchangeRate"  => 1,
                            //     "chartOfAccount_RefID" => 65000000000005
                            //     ]
                            // ]
                        ]
                    ]
                ]
            ]
        );
    }
}