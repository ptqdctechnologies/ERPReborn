<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PurchaseOrderService
{
    public function updates(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data                       = $request->storeData;
        $detailItems                = json_decode($data['purchaseOrderDetail'], true);
        $fileID                     = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;
        $deliveryDestinationRefID   = isset($data['delivery_to_id']) ? (int) $data['delivery_to_id'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.supplyChain.setPurchaseOrder',
            'latest',
            [
            'recordID' => (int) $data['purchaseOrderRecord_RefID'],
            'entities' => [
                'documentDateTimeTZ'                    => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'          => $fileID,
                'requesterWorkerJobsPosition_RefID'     => (int) $careerRefID,
                'supplier_RefID'                        => (int) $data['supplier_id'],
                "deliveryDateTimeTZ"                    => null,
                "deliveryDestination_RefID"             => $deliveryDestinationRefID,
                "supplierInvoiceBillingPurpose_RefID"   => null,
                "remarks"                               => $data['remarkPO'],
                "deliveryDestinationManualAddress"      => $data['delivery_to'],
                "paymentNotes"                          => $data['paymentNotes'],
                "internalNotes"                         => $data['internalNote'],
                "downPayment"                           => (float) str_replace(',', '', $data['downPaymentValue']),
                "termOfPayment_RefID"                   => (int) $data['termOfPaymentValue'],
                "vatRatio"                              => (float) str_replace(',', '', $data['vatValue']),
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $detailItems
                        ]
                    ],
                    "transactionTaxItemList"    => [
                        "items"                 => [
                            [
                                "recordID" => null,
                                "entities" => [
                                    "taxType_RefID"                 => null,
                                    "tariffCurrency_RefID"          => null,
                                    "tariffCurrencyValue"           => (float) str_replace(',', '', $data['tariffCurrencyValue']),
                                    "tariffCurrencyExchangeRate"    => null,
                                    "remarks"                       => null
                                ]
                            ],
                        ]
                    ],
                    "additionalCostItemList"    => [
                        "items"                 => [
                            [
                                "recordID" => null,
                                "entities" => [
                                    "purchaseOrderAdditionalCostType_RefID" => null,
                                    "priceCurrency_RefID"                   => null,
                                    "priceCurrencyValue"                    => null,
                                    "priceCurrencyExchangeRate"             => null,
                                    "remarks"                               => null
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        );
    }
}
