<?php

namespace App\Services;

class DocumentTypeMapper
{
    public static function getApiConfig(string $documentType, int $referenceId): ?array
    {
        $mapping = [
            'Advance Form' => [
                'key' => 'transaction.read.dataList.finance.getAdvanceDetail',
                'parameter' => ['advance_RefID' => (int) $referenceId],
                'businessDocument_RefID' => (int) 74000000021304,
            ],
            'Delivery Order Form' => [
                'key' => 'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
                'parameter' => ['deliveryOrder_RefID' => (int) $referenceId],
            ],
            'Person Business Trip Form' => [
                'key' => '',
                'parameter' => [],
                'businessDocument_RefID' => (int) 74000000021494,
            ],
            'Purchase Order Form' => [
                'key' => 'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
                'parameter' => ['purchaseOrder_RefID' => (int) $referenceId],
                'businessDocument_RefID' => (int) 74000000021353,
            ],
            'Purchase Requisition Form' => [
                'key' => 'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
                'parameter' => ['purchaseRequisition_RefID' => (int) $referenceId],
                'businessDocument_RefID' => (int) 74000000021491,
            ],
        ];

        return $mapping[$documentType] ?? null;
    }

    public static function formatData(string $documentType, array $dataDetail): ?array
    {
        $mapping = [
            'Advance Form' => [
                'dataHeader' => [
                    'advanceNumber'     => '-',
                    'date'              => null,
                    'currency'          => $dataDetail['productUnitPriceCurrencyISOCode'] ?? '-',
                    'budgetCode'        => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'        => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'     => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'     => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'fileID'            => null,
                    'dateUpdate'        => null,
                    'requesterName'     => '-',
                    'beneficiaryName'   => '-',
                    'bankName'          => '-',
                    'accountName'       => '-',
                    'accountNumber'     => '-',
                ],
                'remarks'       => $dataDetail['remarks'] ?? '-',
                'components'    => [
                    'detail'    => 'Components.AdvanceDetailDocument',
                    'table'     => 'Components.AdvanceDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'AdvanceRequest.RevisionAdvanceIndex',
                    'name'      => 'advance_RefID',
                    'value'     => '76000000000539'
                ],
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Delivery Order Form'   => [
                'dataHeader'    => [
                    'doNumber'                  => $dataDetail['documentNumber'] ?? '-',
                    'deliveryFrom'              => $dataDetail['deliveryFrom_NonRefID']['Address'] ?? '-',
                    'deliveryTo'                => $dataDetail['deliveryTo_NonRefID']['Address'] ?? '-',
                    'budgetCode'                => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'                => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'             => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'             => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'fileID'                    => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'transporterName'           => $dataDetail['transporterName'] ?? '-',
                    'transporterContactPerson'  => $dataDetail['transporterContactPerson'] ?? '-',
                    'transporterPhone'          => $dataDetail['transporterPhone'] ?? '-',
                    'transporterHandphone'      => $dataDetail['transporterHandphone'] ?? '-',
                    'transporterFax'            => $dataDetail['transporterFax'] ?? '-',
                    'transporterAddress'        => $dataDetail['transporterAddress'] ?? '-',
                ],
                'remarks'       => $dataDetail['remarks'] ?? '-',
                'components'    => [
                    'detail'    => 'Components.DeliveryOrderDetailDocument',
                    'table'     => 'Components.DeliveryOrderDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'DeliveryOrder.RevisionDeliveryOrderIndex',
                    'name'      => 'do_RefID',
                    'value'     => $dataDetail['deliveryOrder_RefID'] ?? ''
                ],
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Person Business Trip Form' => [
                'dataHeader'            => [
                ],
                'remarks'       => '-',
                'components'    => [
                    'detail'    => 'Components.BusinessTripRequestDetailDocument',
                    'table'     => 'Components.BusinessTripRequestDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'BusinessTripRequest.RevisionBusinessTripRequestIndex',
                    'name'      => '',
                    'value'     => ''
                ],
                'businessDocument_RefID' => '',
                'css' => 'p-0'
            ],
            'Purchase Order Form'       => [
                'dataHeader'            => [
                    'poNumber'          => $dataDetail['documentNumber'] ?? '-',
                    'deliveryTo'        => '-',
                    'downPayment'       => '-',
                    'termOfPayment'     => $dataDetail['paymentTerm'] ?? '-',
                    'fileID'            => null,
                    'supplierCode'      => $dataDetail['supplierCode'] ?? '-',
                    'supplierName'      => $dataDetail['supplierName'] ?? '-',
                    'supplierAddress'   => $dataDetail['supplierAddress'] ?? '-',
                    'paymentNote'       => '-',
                    'internalNote'      => '-'
                ],
                'remarks'       => $dataDetail['remarks'] ?? '-',
                'components'    => [
                    'detail'    => 'Components.PurchaseOrderDetailDocument',
                    'table'     => 'Components.PurchaseOrderDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'PurchaseOrder.RevisionPurchaseOrder',
                    'name'      => 'purchaseOrder_RefID',
                    'value'     => $dataDetail['purchaseOrder_RefID'] ?? ''
                ],
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Purchase Requisition Form' => [
                'dataHeader'            => [
                    'prNumber'          => '-',
                    'budgetCode'        => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'        => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'     => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'     => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'fileID'            => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'deliveryTo'        => $dataDetail['deliveryTo_NonRefID'] ?? '-',
                    'dateOfDelivery'    => $dataDetail['deliveryDateTimeTZ'] ?? '-',
                    'note'              => $dataDetail['notes'] ?? '-'
                ],
                'remarks'       => $dataDetail['remarks'] ?? '-',
                'components'    => [
                    'detail'    => 'Components.PurchaseRequisitionDetailDocument',
                    'table'     => 'Components.PurchaseRequisitionDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'PurchaseRequisition.RevisionPurchaseRequest',
                    'name'      => 'modal_purchase_requisition_id',
                    'value'     => $dataDetail['purchaseRequisition_RefID'] ?? ''
                ],
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
        ];

        return $mapping[$documentType] ?? null;
    }
}