<?php

namespace App\Services\Document;

class DocumentTypeMapper
{
    public static function getApiConfig(string $documentType, int $referenceId): ?array
    {
        $mapping = [
            'Advance Form' => [
                'key'       => 'transaction.read.dataList.finance.getAdvanceDetail',
                'parameter' => ['advance_RefID' => (int) $referenceId]
            ],
            'Advance Settlement Form' => [
                'key'       => 'transaction.read.dataList.finance.getAdvanceSettlementDetail',
                'parameter' => ['advanceSettlement_RefID' => (int) $referenceId]
            ],
            'Credit Note Form' => [
                'key'       => 'transaction.read.dataList.finance.getCreditNoteDetail',
                'parameter' => ['creditNote_RefID' => (int) $referenceId]
            ],
            'Delivery Order Form' => [
                'key'       => 'transaction.read.dataList.supplyChain.getDeliveryOrderDetail',
                'parameter' => ['deliveryOrder_RefID' => (int) $referenceId],
            ],
            'DO From Internal Use' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'DO From Stock Movement' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'Loan Form' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'Loan Settlement Form' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'Modify Budget Form' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'Person Business Trip Form' => [
                'key'                       => 'transaction.read.dataList.humanResource.getPersonBusinessTripSequence',
                'parameter'                 => ['personBusinessTrip_RefID' => (int) $referenceId],
            ],
            'Person Business Trip Settlement Form' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'Purchase Order Form' => [
                'key'       => 'transaction.read.dataList.supplyChain.getPurchaseOrderDetail',
                'parameter' => ['purchaseOrder_RefID' => (int) $referenceId],
            ],
            'Purchase Requisition Form' => [
                'key'       => 'transaction.read.dataList.supplyChain.getPurchaseRequisitionDetail',
                'parameter' => ['purchaseRequisition_RefID' => (int) $referenceId],
            ],
            'Reimbursement Form' => [
                'key'                       => 'transaction.read.dataList.finance.getReimbursementDetail',
                'parameter'                 => ['reimbursement_RefID' => (int) $referenceId],
            ],
            'Sallary Allocation Form' => [
                'key'                       => '',
                'parameter'                 => [],
                'businessDocument_RefID'    => (int) 74000000021494,
            ],
            'Timesheet Form' => [
                'key'                       => 'transaction.read.dataList.humanResource.getPersonWorkTimeSheetActivity',
                'parameter'                 => ['personWorkTimeSheet_RefID' => (int) $referenceId],
                'businessDocument_RefID'    => (int) 74000000021491,
            ],
            'Warehouse Inbound Order Form' => [
                'key'       => 'transaction.read.dataList.supplyChain.getWarehouseInboundOrderDetail',
                'parameter' => ['warehouseInboundOrder_RefID' => (int) $referenceId]
            ],
        ];

        return $mapping[$documentType] ?? null;
    }

    public static function formatData(string $documentType, array $dataDetail): ?array
    {
        $mapping = [
            'Advance Form'      => [
                'dataHeader'    => [
                    'advance_RefID'     => $dataDetail['advance_RefID'] ?? '-',
                    'advanceNumber'     => $dataDetail['businessDocumentNumber'] ?? '-',
                    'date'              => $dataDetail['date'] ?? '-',
                    'currency'          => $dataDetail['productUnitPriceCurrencyISOCode'] ?? '-',
                    'budgetCode'        => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'        => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'     => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'     => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'fileID'            => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'dateUpdate'        => $dataDetail['dateUpdate'] ?? null,
                    'requesterName'     => $dataDetail['requesterWorkerName'] ?? '-',
                    'beneficiaryName'   => $dataDetail['beneficiaryWorkerName'] ?? '-',
                    'bankName'          => $dataDetail['beneficiaryBankAcronym'] ?? '-',
                    'accountName'       => $dataDetail['beneficiaryBankAccountName'] ?? '',
                    'accountNumber'     => $dataDetail['beneficiaryBankAccountNumber'] ?? '',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'        => [
                    'detail'            => 'Components.AdvanceDetailDocument',
                    'headerRevision'    => 'Components.AdvanceDetailDocumentHeaderRevision',
                    'revision'          => 'Components.AdvanceDetailDocumentRevision',
                    'table'             => 'Components.AdvanceDetailDocumentTable',
                ],
                'resubmit'  => [
                    'url'   => 'AdvanceRequest.RevisionAdvanceIndex',
                    'name'  => 'advance_RefID',
                    'value' => $dataDetail['advance_RefID'] ?? '-',
                ],
                'transactionType'        => 'ADVANCE REQUEST',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Advance Settlement Form' => [
                'dataHeader'        => [
                    'advanceSettlement_RefID'   => $dataDetail['advanceSettlement_RefID'] ?? '-',
                    'advanceNumber'             => $dataDetail['documentNumber'] ?? '-',
                    'beneficiaryName'           => $dataDetail['beneficiaryName'] ?? '-',
                    'bankName'                  => $dataDetail['bankNameAcronym'] ?? '-',
                    'bankAccount'               => $dataDetail['bankAccount'] ?? '-',
                    'budgetCode'                => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'                => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'             => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'             => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'fileID'                    => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'dateUpdate'                => $dataDetail['dateUpdate'] ?? null,
                ],
                'components'        => [
                    'detail'            => 'Components.AdvanceSettlementDocument',
                    'headerRevision'    => 'Components.AdvanceSettlementDocumentHeaderRevision',
                    'revision'          => 'Components.AdvanceSettlementDocumentRevision',
                    'table'             => 'Components.AdvanceSettlementDocumentTable',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'resubmit'  => [
                    'url'   => 'AdvanceSettlement.RevisionAdvanceSettlementIndex',
                    'name'  => 'advance_settlement_id',
                    'value' => $dataDetail['advanceSettlement_RefID'] ?? '-',
                ],
                'transactionType'        => 'ADVANCE SETTLEMENT',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '-',
            ],
            'Credit Note Form'          => [
                'dataHeader'            => [
                    'cnNumber'          => $dataDetail['BusinessDocumentNumber'] ?? '',
                    'date'              => $dataDetail['Date'] ?? '',
                    'dateUpdate'        => $dataDetail['DateUpdate'] ?? null,
                    'fileID'            => $dataDetail['Log_FileUpload_Pointer_RefID'] ?? '',
                    'budgetCode'        => $dataDetail['CombinedBudgetCode'] ?? '',
                    'budgetName'        => $dataDetail['CombinedBudgetName'] ?? '',
                    'subBudgetCode'     => $dataDetail['CombinedBudgetSectionCode'] ?? '',
                    'subBudgetName'     => $dataDetail['CombinedBudgetSectionName'] ?? '',
                    'customerCode'      => $dataDetail['CustomerCode'] ?? '',
                    'customerName'      => $dataDetail['CustomerName'] ?? '',
                ],
                'components'            => [
                    'detail'            => 'Components.CreditNoteDetailDocument',
                    'revision'          => 'Components.CreditNoteDocumentRevision',
                    'table'             => 'Components.CreditNoteDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'AdvanceSettlement.RevisionAdvanceSettlementIndex',
                    'name'      => '',
                    'value'     => $dataDetail['deliveryOrder_RefID'] ?? ''
                ],
                'transactionType'       => 'CREDIT NOTE',
                'businessDocument_RefID' => $dataDetail['BusinessDocument_RefID'] ?? '',
            ],
            'Delivery Order Form'   => [
                'dataHeader'    => [
                    'deliveryOrderRefID'        => $dataDetail['deliveryOrder_RefID'] ?? '',
                    'doNumber'                  => $dataDetail['documentNumber'] ?? '-',
                    'date'                      => $dataDetail['sys_Data_Entry_DateTimeTZ'] ?? null,
                    'dateUpdate'                => $dataDetail['sys_Data_Edit_DateTimeTZ'] ?? null,
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
                    'detail'            => 'Components.DeliveryOrderDetailDocument',
                    'table'             => 'Components.DeliveryOrderDetailDocumentTable',
                    'headerRevision'    => 'Components.DeliveryOrderDetailDocumentHeaderRevision',
                    'revision'          => 'Components.DeliveryOrderDetailDocumentRevision',
                ],
                'resubmit'      => [
                    'url'       => 'DeliveryOrder.RevisionDeliveryOrderIndex',
                    'name'      => 'do_RefID',
                    'value'     => $dataDetail['deliveryOrder_RefID'] ?? ''
                ],
                'transactionType'        => 'DELIVERY ORDER',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'DO From Internal Use'   => [
                'dataHeader'    => [
                    'deliveryOrderRefID'        => $dataDetail['deliveryOrder_RefID'] ?? '',
                    'doNumber'                  => $dataDetail['documentNumber'] ?? '-',
                    'date'                      => $dataDetail['sys_Data_Entry_DateTimeTZ'] ?? null,
                    'dateUpdate'                => $dataDetail['sys_Data_Edit_DateTimeTZ'] ?? null,
                    'deliveryFrom'              => $dataDetail['deliveryFrom_NonRefID']['Address'] ?? '(VDR0005) Alpine Cool Utama - Jl. Pangeran jayakarta No. 87',
                    'deliveryTo'                => $dataDetail['deliveryTo_NonRefID']['Address'] ?? 'Head Office - Gudang Mampang',
                    'budgetCode'                => $dataDetail['combinedBudgetCode'] ?? 'Q000062',
                    'budgetName'                => $dataDetail['combinedBudgetName'] ?? 'XL Microcell 2007',
                    'subBudgetCode'             => $dataDetail['combinedBudgetSectionCode'] ?? '240',
                    'subBudgetName'             => $dataDetail['combinedBudgetSectionName'] ?? 'Cendana Andalas',
                    'fileID'                    => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'transporterName'           => $dataDetail['transporterName'] ?? 'Alumagada Jaya Mandiri',
                    'transporterContactPerson'  => $dataDetail['transporterContactPerson'] ?? 'alumagada.mandiri@gmail.com',
                    'transporterPhone'          => $dataDetail['transporterPhone'] ?? '+62 818-2166-7499-99',
                    'transporterHandphone'      => $dataDetail['transporterHandphone'] ?? '+62 21 791-9123-4 Ext 1417',
                    'transporterFax'            => $dataDetail['transporterFax'] ?? '+62 821-1480-0364',
                    'transporterAddress'        => $dataDetail['transporterAddress'] ?? '-',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'    => [
                    'detail'    => 'Components.DeliveryOrderFromInternalUseDetailDocument',
                    'table'     => 'Components.DeliveryOrderFromInternalUseDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => $dataDetail['deliveryOrder_RefID'] ?? ''
                ],
                'transactionType'        => 'DELIVERY ORDER',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'DO From Stock Movement'   => [
                'dataHeader'    => [
                    'deliveryOrderRefID'        => $dataDetail['deliveryOrder_RefID'] ?? '',
                    'doNumber'                  => $dataDetail['documentNumber'] ?? '-',
                    'date'                      => $dataDetail['sys_Data_Entry_DateTimeTZ'] ?? null,
                    'dateUpdate'                => $dataDetail['sys_Data_Edit_DateTimeTZ'] ?? null,
                    'deliveryFrom'              => $dataDetail['deliveryFrom_NonRefID']['Address'] ?? '(VDR0005) Alpine Cool Utama - Jl. Pangeran jayakarta No. 87',
                    'deliveryTo'                => $dataDetail['deliveryTo_NonRefID']['Address'] ?? 'Head Office - Gudang Mampang',
                    'budgetCode'                => $dataDetail['combinedBudgetCode'] ?? 'Q000062',
                    'budgetName'                => $dataDetail['combinedBudgetName'] ?? 'XL Microcell 2007',
                    'subBudgetCode'             => $dataDetail['combinedBudgetSectionCode'] ?? '240',
                    'subBudgetName'             => $dataDetail['combinedBudgetSectionName'] ?? 'Cendana Andalas',
                    'fileID'                    => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'transporterName'           => $dataDetail['transporterName'] ?? 'Alumagada Jaya Mandiri',
                    'transporterContactPerson'  => $dataDetail['transporterContactPerson'] ?? 'alumagada.mandiri@gmail.com',
                    'transporterPhone'          => $dataDetail['transporterPhone'] ?? '+62 818-2166-7499-99',
                    'transporterHandphone'      => $dataDetail['transporterHandphone'] ?? '+62 21 791-9123-4 Ext 1417',
                    'transporterFax'            => $dataDetail['transporterFax'] ?? '+62 821-1480-0364',
                    'transporterAddress'        => $dataDetail['transporterAddress'] ?? '-',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'    => [
                    'detail'    => 'Components.DeliveryOrderFromStockMovementDetailDocument',
                    'table'     => 'Components.DeliveryOrderFromStockMovementDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => $dataDetail['deliveryOrder_RefID'] ?? ''
                ],
                'transactionType'        => 'DELIVERY ORDER',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Loan Form' => [
                'dataHeader'    => [
                    'dateUpdate'    => null,
                    'loanNumber'    => 'LN/QDC/2025/000001',
                    'loanType'      => '-',
                    'creditors'     => 'Ajeng Supratna',
                    'debtor'        => 'Timothy Fajar',
                    'bankName'      => 'BCA',
                    'bankAccount'   => '32382231293',
                    'principalLoan' => 'Dadang Surana',
                    'landingRate'   => 20000.32,
                    'totalRate'     => 30233.94,
                    'loanTerm'      => '-',
                    'COA'           => 50234.26,
                ],
                'textAreaFields'    => [
                    'title'         => 'Notes',
                    'text'          => '-',
                ],
                'components'    => [
                    'detail'    => 'Components.LoanDetailDocument',
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => ''
                ],
                'transactionType'        => 'LOAN',
                'businessDocument_RefID' => '',
            ],
            'Loan Settlement Form' => [
                'dataHeader'    => [
                    'loanSettlementNumber' => 'LNS/QDC/2025/000001',
                ],
                'dataAdditional'        => [
                    'penaltyValue'      => 4150000.00,
                    'penaltyCOA'        => 8040000.00,
                    'interestValue'     => 5770000.00,
                    'interestCOA'       => 7370000.00,
                    'totalSettlement'   => 67000000.00
                ],
                'textAreaFields'    => [
                    'title'         => 'Notes',
                    'text'          => '-',
                ],
                'components'    => [
                    'detail'        => 'Components.LoanSettlementDetailDocument',
                    'table'         => 'Components.LoanSettlementDetailDocumentTable',
                    // 'additional'    => 'Components.LoanSettlementAddtionalDocument'
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => ''
                ],
                'transactionType'        => 'LOAN SETTLEMENT',
                'businessDocument_RefID' => '',
            ],
            'Modify Budget Form' => [
                'components'    => [
                    'customDetail'  => 'Components.ModifyBudget',
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => ''
                ],
                'transactionType'        => 'MODIFY BUDGET',
                'businessDocument_RefID' => '',
            ],
            'Person Business Trip Form' => [
                'dataHeader'            => [
                    'btNumber'              => $dataDetail['documentNumber'] ?? '-',
                    'budgetCode'            => $dataDetail['combinedBudgetCode'] ?? '-',
                    'budgetName'            => $dataDetail['combinedBudgetName'] ?? '-',
                    'subBudgetCode'         => $dataDetail['combinedBudgetSectionCode'] ?? '-',
                    'subBudgetName'         => $dataDetail['combinedBudgetSectionName'] ?? '-',
                    'description'           => '-',
                    'dateCommenceTravel'    => $dataDetail['startDateTimeTZ'] ?? '-',
                    'dateEndTravel'         => $dataDetail['finishDateTimeTZ'] ?? '-',
                    'brfDate'               => $dataDetail['documentDateTimeTZ'] ?? '-',
                    'dateUpdate'            => null,
                    'date'                  => null,
                    'fileID'                => null,
                    'contactPhone'          => '-',
                    'bankAccount'           => '-',
                    'bankName'              => '-',
                    'accountNumber'         => '',
                    'requesterName'         => $dataDetail['requesterWorkerName'] ?? '-',
                    'beneficiaryName'       => '-',
                    'departingFrom'         => '-',
                    'destinationTo'         => '-',
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
                'transactionType'        => 'BUSINESS TRIP',
                'businessDocument_RefID' => '',
            ],
            'Person Business Trip Settlement Form' => [
                'dataHeader'            => [
                    'btNumber'              => 'BTStl/QDC/2025/000008',
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
                    'detail'        => 'Components.BusinessTripSettlementDetailDocument',
                    'table'         => 'Components.BusinessTripSettlementDetailDocumentTable',
                    'additional'    => 'Components.BusinessTripSettlementCostDetailDocument'
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => ''
                ],
                'transactionType'        => 'BUSINESS TRIP SETTLEMENT',
                'businessDocument_RefID' => '',
            ],
            'Purchase Order Form'       => [
                'dataHeader'            => [
                    'date'                  => $dataDetail['date'] ?? '-',
                    'dateUpdate'            => $dataDetail['dateUpdate'] ?? null,
                    'purchaseOrderRefID'    => $dataDetail['purchaseOrder_RefID'] ?? '-',
                    'poNumber'              => $dataDetail['documentNumber'] ?? '-',
                    'budgetCode'            => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'            => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'         => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'         => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'deliveryTo'            => $dataDetail['deliveryTo_NonRefID']['Address'] ?? '-',
                    'downPayment'           => $dataDetail['downPayment'] ?? '-',
                    'termOfPayment'         => $dataDetail['termOfPaymentName'] ?? '-',
                    'fileID'                => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'supplierCode'          => $dataDetail['supplierCode'] ?? '-',
                    'supplierName'          => $dataDetail['supplierName'] ?? '',
                    'supplierAddress'       => $dataDetail['supplierAddress'] ?? '',
                    'paymentNote'           => $dataDetail['paymentNotes'] ?? '-',
                    'internalNote'          => $dataDetail['internalNotes'] ?? '-',
                    'ppn'                   => $dataDetail['vatRatio'] ?? '-',
                    'totalPPN'              => $dataDetail['tariffCurrencyValue'] ?? '-',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'    => [
                    'detail'            => 'Components.PurchaseOrderDetailDocument',
                    'table'             => 'Components.PurchaseOrderDetailDocumentTable',
                    'headerRevision'    => 'Components.PurchaseOrderDetailDocumentHeaderRevision',
                    'revision'          => 'Components.PurchaseOrderDetailDocumentRevision',
                ],
                'resubmit'      => [
                    'url'       => 'PurchaseOrder.RevisionPurchaseOrder',
                    'name'      => 'purchaseOrder_RefID',
                    'value'     => $dataDetail['purchaseOrder_RefID'] ?? ''
                ],
                'transactionType'        => 'PURCHASE ORDER',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Purchase Requisition Form' => [
                'dataHeader'            => [
                    'purchaseRequestRefID'  => $dataDetail['purchaseRequisition_RefID'] ?? null,
                    'dateUpdate'            => $dataDetail['dateUpdate'] ?? null,
                    'prNumber'              => $dataDetail['documentNumber'] ?? '-',
                    'budgetCode'            => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'            => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'         => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'         => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'fileID'                => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                    'deliveryToCode'        => $dataDetail['deliveryToCode'] ?? '-',
                    'deliveryToName'        => $dataDetail['deliveryToName'] ?? '-',
                    'dateOfDelivery'        => $dataDetail['deliveryDateTimeTZ'] ?? '-',
                    'note'                  => $dataDetail['notes'] ?? '-'
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'    => [
                    'detail'            => 'Components.PurchaseRequisitionDetailDocument',
                    'table'             => 'Components.PurchaseRequisitionDetailDocumentTable',
                    'headerRevision'    => 'Components.PurchaseRequisitionDetailDocumentHeaderRevision',
                    'revision'          => 'Components.PurchaseRequisitionDetailDocumentRevision'
                ],
                'resubmit'      => [
                    'url'       => 'PurchaseRequisition.RevisionPurchaseRequest',
                    'name'      => 'modal_purchase_requisition_id',
                    'value'     => $dataDetail['purchaseRequisition_RefID'] ?? ''
                ],
                'transactionType'        => 'PURCHASE REQUEST',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
            'Reimbursement Form'       => [
                'dataHeader'            => [
                    'remNumber'             => $dataDetail['BusinessDocumentNumber'] ?? '-',
                    'date'                  => $dataDetail['Date'] ?? '-',
                    'dateUpdate'            => $dataDetail['DateUpdate'] ?? null,
                    'fileID'                => $dataDetail['Log_FileUpload_Pointer_RefID'] ?? null,
                    'customerVendorProject' => $dataDetail['RequesterCode'] ?? null,
                    'customerVendorName'    => $dataDetail['RequesterName'] ?? null,
                    'currency'              => $dataDetail['ProductUnitPriceCurrencyISOCode'] ?? null,
                    'budgetCode'            => $dataDetail['CombinedBudgetCode'] ?? null,
                    'budgetName'            => $dataDetail['CombinedBudgetName'] ?? null,
                    'subBudgetCode'         => $dataDetail['CombinedBudgetSectionCode'] ?? null,
                    'subBudgetName'         => $dataDetail['CombinedBudgetSectionName'] ?? null,
                    'beneficiaryName'       => $dataDetail['BeneficiaryName'] ?? '-',
                    'bankName'              => $dataDetail['BeneficiaryBankAcronym'] ?? '-',
                    'accountName'           => $dataDetail['BeneficiaryBankAccountName'] ?? '',
                    'accountNumber'         => $dataDetail['BeneficiaryBankAccountNumber'] ?? '',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['Remarks_Header'] ?? null,
                ],
                'components'    => [
                    'detail'            => 'Components.ReimbursementDetailDocument',
                    'table'             => 'Components.ReimbursementDetailDocumentTable',
                    'headerRevision'    => 'Components.ReimbursementDetailDocumentHeaderRevision',
                    'revision'          => 'Components.ReimbursementDetailDocumentRevision'
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => ''
                ],
                'transactionType'        => 'REIMBURSEMENT',
                'businessDocument_RefID' => $dataDetail['BusinessDocument_RefID'] ?? '',
            ],
            'Sallary Allocation Form'       => [
                'dataHeader'            => [
                    'pic'           => 'Suyanto',
                    'date'          => '2025-06-04 10:47:11.993084+07',
                    'currency'      => 'IDR',
                    'budgetCode'    => 'Q000062',
                    'budgetName'    => 'XL Microcell 2007',
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => '-',
                ],
                'components'    => [
                    'detail'    => 'Components.SallaryAllocationDetailDocument',
                    'table'     => 'Components.SallaryAllocationDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => '',
                    'name'      => '',
                    'value'     => ''
                ],
                'transactionType'        => 'SALLARY ALLOCATION',
                'businessDocument_RefID' => '',
            ],
            'Timesheet Form' => [
                'dataHeader'        => [
                    'date'              => $dataDetail['date'] ?? null,
                    'dateUpdate'        => $dataDetail['dateUpdate'] ?? null,
                    'authorizedCode'    => $dataDetail['combinedBudgetCode_Header'] ?? '',
                    'authorizedName'    => $dataDetail['combinedBudgetName_Header'] ?? '',
                    'timesheetNUmber'   => $dataDetail['businessDocumentNumber'] ?? '-',
                    'onBehalfOf'        => $dataDetail['personName'] ?? '-',
                ],
                'components'    => [
                    'detail'    => 'Components.TimesheetDetailDocument',
                    'table'     => 'Components.TimesheetDetailDocumentTable',
                ],
                'resubmit'      => [
                    'url'       => 'RevisionTimesheet.index',
                    'name'      => 'timesheet_RefID',
                    'value'     => ''
                ],
                'transactionType'        => 'TIMESHEET',
                'businessDocument_RefID' => '74000000021491',
            ],
            'Warehouse Inbound Order Form' => [
                'dataHeader'            => [
                    'budgetCode'            => $dataDetail['combinedBudgetCode'] ?? null,
                    'budgetName'            => $dataDetail['combinedBudgetName'] ?? null,
                    'subBudgetCode'         => $dataDetail['combinedBudgetSectionCode'] ?? null,
                    'subBudgetName'         => $dataDetail['combinedBudgetSectionName'] ?? null,
                    'materialReceive_RefID' => $dataDetail['warehouseInboundOrder_RefID'] ?? '-',
                    'date'                  => $dataDetail['date'] ?? '-',
                    'dateUpdate'            => $dataDetail['dateUpdate'] ?? null,
                    'mrNumber'              => $dataDetail['businessDocumentNumber'] ?? '-',
                    'doNumber'              => $dataDetail['deliveryOrderNumber'] ?? '-',
                    'deliveryFrom'          => $dataDetail['deliveryFrom_NonRefID']['Address'] ?? '-',
                    'deliveryTo'            => $dataDetail['deliveryTo_NonRefID']['Address'] ?? '-',
                    'fileID'                => $dataDetail['log_FileUpload_Pointer_RefID'] ?? null,
                ],
                'textAreaFields'    => [
                    'title'         => 'Remark',
                    'text'          => $dataDetail['remarks'] ?? '-',
                ],
                'components'    => [
                    'detail'            => 'Components.MaterialReceiveDetailDocument',
                    'table'             => 'Components.MaterialReceiveDetailDocumentTable',
                    'headerRevision'    => 'Components.MaterialReceiveDetailDocumentHeaderRevision',
                    'revision'          => 'Components.MaterialReceiveDetailDocumentRevision'
                ],
                'resubmit'      => [
                    'url'       => 'MaterialReceive.RevisionMaterialReceiveIndex',
                    'name'      => 'modal_material_receive_id',
                    'value'     => $dataDetail['warehouseInboundOrder_RefID'] ?? '-',
                ],
                'transactionType'        => 'MATERIAL RECEIVE',
                'businessDocument_RefID' => $dataDetail['businessDocument_RefID'] ?? '',
            ],
        ];

        return $mapping[$documentType] ?? null;
    }

    public static function getHistoryPage(string $documentType): string
    {
        $mapping = [
            'Advance Form'                  => 'Documents.Transactions.LogTransaction.LogTransactionAdvance',
            'Advance Settlement Form'       => 'Documents.Transactions.LogTransaction.LogTransactionAdvanceSettlement',
            'Credit Note Form'              => 'Documents.Transactions.LogTransaction.LogTransactionCreditNote',
            'Delivery Order Form'           => 'Documents.Transactions.LogTransaction.LogTransactionDeliveryOrder',
            'Purchase Order Form'           => 'Documents.Transactions.LogTransaction.LogTransactionPurchaseOrder',
            'Purchase Requisition Form'     => 'Documents.Transactions.LogTransaction.LogTransactionPurchaseRequisition',
            'Reimbursement Form'            => 'Documents.Transactions.LogTransaction.LogTransactionReimbursement',
            'Warehouse Inbound Order Form'  => 'Documents.Transactions.LogTransaction.LogTransactionMaterialReceive'
        ];

        return $mapping[$documentType] ?? null;
    }
}