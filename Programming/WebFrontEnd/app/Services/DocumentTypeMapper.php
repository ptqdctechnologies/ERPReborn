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
            'Advance Settlement Form' => [
                'key' => '',
                'parameter' => [],
                'businessDocument_RefID' => (int) 74000000021552,
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
            'Warehouse Inbound Order Form' => [
                'key' => '',
                'parameter' => [],
                'businessDocument_RefID' => (int) 74000000021336,
            ],
        ];

        return $mapping[$documentType] ?? null;
    }

    public static function formatData(string $documentType, array $dataDetail): ?array
    {
        $mapping = [
            'Advance Form'      => [
                'dataHeader'    => [
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
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'        => [
                    'detail'        => 'Components.AdvanceDetailDocument',
                    'table'         => 'Components.AdvanceDetailDocumentTable',
                ],
                'resubmit'  => [
                    'url'   => 'AdvanceRequest.RevisionAdvanceIndex',
                    'name'  => 'advance_RefID',
                    'value' => '76000000000539'
                ],
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Advance Settlement Form' => [
                'dataHeader'        => [
                    'advanceNumber'     => 'AdvStl/QDC/2025/000030',
                    'beneficiaryName'   => 'Agus Nuryadi',
                    'bankName'          => 'BCA',
                    'bankAccount'       => '2670159496',
                    'budgetCode'        => $dataDetail['combinedBudgetCode'] ?? 'Q000062',
                    'budgetName'        => $dataDetail['combinedBudgetName'] ?? 'XL Microcell 2007',
                    'subBudgetCode'     => $dataDetail['combinedBudgetSectionCode'] ?? '235',
                    'subBudgetName'     => $dataDetail['combinedBudgetSectionName'] ?? 'Ampang Kuranji - Padang',
                    'fileID'            => null,
                    'dateUpdate'        => null,
                ],
                'components'        => [
                    'detail'        => 'Components.AdvanceSettlementDocument',
                    'table'         => 'Components.AdvanceSettlementDocumentTable',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'resubmit'  => [
                    'url'   => 'AdvanceSettlement.RevisionAdvanceSettlementIndex',
                    'name'  => '',
                    'value' => ''
                ],
                'businessDocument_RefID' => 74000000021552,
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
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
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
                    'btNumber'              => 'BT/QDC/2025/000008',
                    'budgetCode'            => 'Q000196',
                    'budgetName'            => 'XL Microcell 2007',
                    'subBudgetCode'         => '235',
                    'subBudgetName'         => 'Ampang Kuranji - Padang',
                    'fileID'                => null,
                    'description'           => '820005-0000 (Travel & Fares/Business Trip)',
                    'dateCommenceTravel'    => '2025-12-18',
                    'dateEndTravel'         => '2025-12-20',
                    'brfDate'               => '2025-12-12',
                    'contactPhone'          => '0896734873',
                    'bankAccount'           => 'PT QDC Technologies',
                    'bankName'              => 'BCA',
                    'accountNumber'         => '0063032911',
                    'requesterName'         => 'Abdollah Syani Siregar',
                    'beneficiaryName'       => 'Abdul Rachman',
                    'departingFrom'         => 'Jakarta',
                    'destinationTo'         => 'Batam',
                ],
                'dataAdditional'    => [
                    'allowance'     => '240000.00',
                    'transport'     => '3450000.00',
                    'entertainment' => '100000.00',
                    'accommodation' => '0.00',
                    'other'         => '100000.00',
                    'totalBRF'      => '3890000.00'
                ],
                'textAreaFields'    => [
                    'title'         => 'Reason to Travel',
                    'text'          => '-',
                ],
                'components'        => [
                    'detail'        => 'Components.BusinessTripRequestDetailDocument',
                    'table'         => 'Components.BusinessTripRequestDetailDocumentTable',
                    'additional'    => 'Components.BusinessTripRequestCostDetailDocument'
                ],
                'resubmit'      => [
                    'url'       => 'BusinessTripRequest.RevisionBusinessTripRequestIndex',
                    'name'      => '',
                    'value'     => ''
                ],
                'businessDocument_RefID' => '',
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
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
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
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
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
            'Warehouse Inbound Order Form' => [
                'dataHeader'            => [
                    'mrNumber'      => 'WHIn/QDC/2025/000027',
                    'deliveryFrom'  => 'Jakarta',
                    'deliveryTo'    => 'Batam',
                    'fileID'        => null
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'    => [
                    'detail'    => 'Components.MaterialReceiveDetailDocument',
                    'table'     => 'Components.MaterialReceiveDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'MaterialReceive.RevisionMaterialReceiveIndex',
                    'name'      => '',
                    'value'     => ''
                ],
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
        ];

        return $mapping[$documentType] ?? null;
    }
}