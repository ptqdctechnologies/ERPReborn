<?php

namespace App\Services\Purchase;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PurchaseOrderService
{
    public function getPickList($formatted)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataPickList.supplyChain.getPurchaseOrder',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }

    public function getDetail($purchaseOrderRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
            'latest',
            [
                'parameter' => [
                    'purchaseOrder_RefID' => (int) $purchaseOrderRefID
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

    public function getPurchaseOrderSummary($budget, $subBudget, $date, $supplier, $limit = 10, $offset = 0)
    {
        $sessionToken = Session::get('SessionLogin');
        $formatLimit = $limit == -1 ? 'ALL' : $limit;

        if ($date) {
            $dates = explode(' - ', $date);
            $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.documentForm.supplyChain.getPurchaseOrderSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'Supplier_RefID' => $supplier ? $supplier : NULL,
                    'StartDate' => $date ? $startDate : NULL,
                    'EndDate' => $date ? $endDate : NULL
                ],
                'SQLStatement' => [
                    'paging' => [
                        'limit' => $formatLimit,
                        'offset' => (int) $offset
                    ]
                ]
            ]
        );
    }

    public function getPurchaseOrderToDeliveryOrder($budget, $subBudget, $date, $limit = 10, $offset = 0)
    {
        $sessionToken = Session::get('SessionLogin');

        if ($date) {
            $dates = explode(' - ', $date);
            $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.documentForm.supplyChain.getPurchaseOrderToDeliveryOrderSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'StartDate' => $date ? $startDate : NULL,
                    'EndDate' => $date ? $endDate : NULL
                ],
                'SQLStatement' => [
                    'paging' => [
                        'limit' => $limit,
                        'offset' => (int) $offset
                    ]
                ]
            ]
        );
    }

    public function getPurchaseOrderToAccountPayable($budget, $subBudget, $date, $supplier, $purchaseOrder, $accountPayable, $limit = 10, $offset = 0)
    {
        $token = Session::get('SessionLogin');

        if ($date) {
            $dates = explode(' - ', $date);
            $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.documentForm.supplyChain.getPurchaseOrderToPaymentInstructionSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'Supplier_RefID' => $supplier ? $supplier : NULL,
                    'PurchaseOrder_RefID' => $purchaseOrder ? $purchaseOrder : NULL,
                    'AccountPayable_RefID' => $accountPayable ? $accountPayable : NULL,
                    'StartDate' => $date ? $startDate : NULL,
                    'EndDate' => $date ? $endDate : NULL
                ],
                'SQLStatement' => [
                    'paging' => [
                        'limit' => $limit,
                        'offset' => (int) $offset
                    ]
                ]
            ]
        );
    }

    public function create($request): mixed
    {
        $token = Session::get('SessionLogin');
        $requesterWorkerJobsPositionID = Session::get('SessionWorkerCareerInternal_RefID');

        $fileID = $request->input('purchase_order_attachment');
        $supplierID = $request->input('supplier_id');
        $deliveryDate = $request->input('date_of_delivery');
        $deliveryDestinationID = $request->input('delivery_to_id');
        $remarks = $request->input('remark');
        $deliveryDestinationManualAddress = $request->input('delivery_to');
        $paymentNotes = $request->input('payment_notes');
        $internalNotes = $request->input('internal_note');
        $downPayment = $request->input('down_payment');
        $termOfPaymentID = $request->input('term_of_payment_value');
        $ppnPercentage = $request->input('ppn_percentage_value');
        $currencyID = $request->input('currency_id');
        $exchangeRate = $request->input('exchange_rate');
        $tariffCurrencyValue = $request->input('tariff_currency_value');

        $purchaseRequisitionDetails = $request->input('additionalData', []);
        $items = collect($purchaseRequisitionDetails)
            ->filter(
                fn($entity) =>
                    filled($entity['productUnitPriceCurrencyValue'] ?? null) &&
                    filled($entity['quantity'] ?? null)
            )
            ->map(function ($entity) {
                return [
                    'entities' => [
                        'purchaseRequisitionDetail_RefID' => (int) $entity['purchaseRequisitionDetail_RefID'],
                        'workStructure_RefID' => (int) $entity['workStructure_RefID'],
                        'quantity' => (float) str_replace(',', '', $entity['quantity']),
                        'quantityUnit_RefID' => (int) $entity['quantityUnit_RefID'],
                        'productUnitPriceCurrency_RefID' => (int) $entity['productUnitPriceCurrency_RefID'],
                        'productUnitPriceCurrencyValue' => (float) str_replace(',', '', $entity['productUnitPriceCurrencyValue']),
                        'productUnitPriceCurrencyExchangeRate' => (float) str_replace(',', '', $entity['productUnitPriceCurrencyExchangeRate']),
                        'productUnitPriceDiscountCurrency_RefID' => (int) $entity['productUnitPriceDiscountCurrency_RefID'],
                        'productUnitPriceDiscountCurrencyValue' => (float) str_replace(',', '', $entity['productUnitPriceDiscountCurrencyValue']),
                        'productUnitPriceDiscountCurrencyExchangeRate' => (float) str_replace(',', '', $entity['productUnitPriceDiscountCurrencyExchangeRate']),
                        'remarks' => $entity['remarks'] ?? NULL,
                        'asset' => (int) $entity['asset']
                    ]
                ];
            })
            ->values()
            ->all();

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.supplyChain.setPurchaseOrder',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID" => $fileID,
                    "requesterWorkerJobsPosition_RefID" => (int) $requesterWorkerJobsPositionID,
                    "supplier_RefID" => (int) $supplierID,
                    "deliveryDateTimeTZ" => Carbon::createFromFormat('m/d/Y', $deliveryDate)->format('Y-m-d'),
                    "deliveryDestination_RefID" => $deliveryDestinationID ? (int) $deliveryDestinationID : NULL,
                    "supplierInvoiceBillingPurpose_RefID" => null,
                    "remarks" => preg_replace('/[^\p{L}\p{N}\s.,\-\/()]/u', '', $remarks),
                    "deliveryDestinationManualAddress" => $deliveryDestinationManualAddress,
                    "paymentNotes" => $paymentNotes,
                    "internalNotes" => $internalNotes,
                    "downPayment" => (float) str_replace(',', '', $downPayment),
                    "termOfPayment_RefID" => (int) $termOfPaymentID,
                    "vatRatio" => isset($ppnPercentage) && $ppnPercentage != "Select a VAT" ? $ppnPercentage : 0,
                    "currency_RefID" => (int) $currencyID,
                    "exchangeRateValue" => (float) str_replace(',', '', $exchangeRate),
                    "additionalData" => [
                        "itemList" => [
                            "items" => $items
                        ],
                        "transactionTaxItemList" => [
                            "items" => [
                                [
                                    "entities" => [
                                        "taxType_RefID" => null,
                                        "tariffCurrency_RefID" => null,
                                        "tariffCurrencyValue" => (float) str_replace(',', '', $tariffCurrencyValue ?? 0),
                                        "tariffCurrencyExchangeRate" => null,
                                        "remarks" => null
                                    ]
                                ],
                            ]
                        ],
                        "additionalCostItemList" => [
                            "items" => [
                                [
                                    "entities" => [
                                        "transactionAdditionalCostType_RefID" => null,
                                        "priceCurrency_RefID" => null,
                                        "priceCurrencyValue" => null,
                                        "priceCurrencyExchangeRate" => null,
                                        "remarks" => null
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request): array
    {
        $sessionToken = Session::get('SessionLogin');
        $careerRefID = Session::get('SessionWorkerCareerInternal_RefID');

        $data = $request->storeData;
        $detailItems = json_decode($data['purchaseOrderDetail'], true);
        $vatRatio = $data['vatValue'] && $data['vatValue'] != "Select a VAT" ? $data['vatValue'] : 0;
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;
        $deliveryDestinationRefID = isset($data['delivery_to_id']) && $data['delivery_to_id'] ? (int) $data['delivery_to_id'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.supplyChain.setPurchaseOrder',
            'latest',
            [
                'recordID' => (int) $data['purchaseOrderRecord_RefID'],
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'log_FileUpload_Pointer_RefID' => $fileID,
                    'requesterWorkerJobsPosition_RefID' => (int) $careerRefID,
                    'supplier_RefID' => (int) $data['supplier_id'],
                    "deliveryDateTimeTZ" => $data['dateOfDelivery'],
                    "deliveryDestination_RefID" => $deliveryDestinationRefID,
                    "supplierInvoiceBillingPurpose_RefID" => null,
                    "remarks" => $data['remarkPO'],
                    "deliveryDestinationManualAddress" => $data['delivery_to'],
                    "paymentNotes" => $data['paymentNotes'],
                    "internalNotes" => $data['internalNote'],
                    "downPayment" => (float) str_replace(',', '', $data['downPaymentValue']),
                    "termOfPayment_RefID" => (int) $data['termOfPaymentValue'],
                    "vatRatio" => $vatRatio,
                    "currency_RefID" => (int) $data['currency_id'],
                    "exchangeRateValue" => (float) str_replace(',', '', $data['exchange_rate']),
                    'additionalData' => [
                        'itemList' => [
                            'items' => $detailItems
                        ]
                    ],
                    "transactionTaxItemList" => [
                        "items" => [
                            [
                                "recordID" => (int) $data['transactionTaxDetail_RefID'],
                                "entities" => [
                                    "taxType_RefID" => null,
                                    "tariffCurrency_RefID" => null,
                                    "tariffCurrencyValue" => (float) str_replace(',', '', $data['tariffCurrencyValue']),
                                    "tariffCurrencyExchangeRate" => null,
                                    "remarks" => null
                                ]
                            ],
                        ]
                    ],
                    "additionalCostItemList" => [
                        "items" => [
                            [
                                "recordID" => null,
                                "entities" => [
                                    "purchaseOrderAdditionalCostType_RefID" => null,
                                    "priceCurrency_RefID" => null,
                                    "priceCurrencyValue" => null,
                                    "priceCurrencyExchangeRate" => null,
                                    "remarks" => null
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        );
    }
}
