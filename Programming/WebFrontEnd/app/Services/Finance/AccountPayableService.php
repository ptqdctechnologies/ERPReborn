<?php

namespace App\Services\Finance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Exception;

class AccountPayableService
{
    public function summaryReport($project, $site, $supplier, $date): mixed
    {
        $sessionToken = Session::get('SessionLogin');

        if ($date) {
            $dates      = explode(' - ', $date);
            $startDate  = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate    = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.documentForm.finance.getPaymentInstructionSummary',
            'latest',
            [
            'parameter' => [
                'CombinedBudgetCode'        => $project['code'] ? $project['code'] : NULL,
                'CombinedBudgetSectionCode' => $site['code'] ? $site['code'] : NULL,
                'Supplier_RefID'            => $supplier['id'] ? (int) $supplier['id'] : NULL,
                'StartDate'                 => $date ? $startDate : NULL,
                'EndDate'                   => $date ? $endDate : NULL,
                ]
            ]
        );
    }

    public function getDetail($paymentInstructionRefID) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getPaymentInstructionDetail',
            'latest',
            [
                'parameter' => [
                    'paymentInstruction_RefID' => (int) $paymentInstructionRefID,
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

    public function dataPickList() 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.finance.getPaymentInstruction',
            'latest',
            [
                'parameter' => []
            ],
            false
        );
    }

    public function create(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');

        $data                       = $request->storeData;
        $detailItems                = json_decode($data['account_payable_detail'], true);
        $fileID                     = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;
        $vatValue                   = $data['vat_origin'] == "yes" ? (float) str_replace(',', '', $data['ppn']) : 0;
        $categoryID                 = $data['category_id'] ? (int) $data['category_id'] : null; // 297x
        $depreciationMethod         = isset($data['depreciation_method']) && $data['depreciation_method'] ? (int) $data['depreciation_method'] : null; // 298x
        $depreciationRateYearsID    = $data['depreciation_rate_years_id'] ? (int) str_replace(',', '', $data['depreciation_rate_years_id']) : null; // 299x
        $depreciationRate           = $data['depreciation_rate_percentage'] ? (float) str_replace(',', '', $data['depreciation_rate_percentage']) : 0;
        $depreciationYears          = $data['depreciation_rate_years'] ? (float) str_replace(',', '', $data['depreciation_rate_years']) : 0;
        $depreciationCOARefID       = $data['depreciation_coa_id'] ? (int) $data['depreciation_coa_id'] : null;
        $deduction                  = $data['budget_details_deduction'] > -1 ? (float) str_replace(',', '', $data['budget_details_deduction']) : 0;

        $receiptStatus = match ($data['receipt_origin']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $contractStatus = match ($data['contract_signed']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $vatStatus = match ($data['vat_origin']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $fatPatDoStatus = match ($data['basft_origin']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $assetStatus = match ($data['asset']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setPaymentInstruction',
            'latest',
            [
            'entities' => [
                "documentDateTimeTZ"                => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"      => $fileID,
                "currency_RefID"                    => 62000000000001,
                "currencySymbol"                    => 'Rp',
                "currencyValue"                     => 15080000.00,
                "currencyExchangeRate"              => 1.00,
                "supplierInvoiceNumber"             => $data['supplier_invoice_number'],
                "supplier_RefID"                    => (int) $data['payment_transfer_id'],
                "receiptStatus"                     => $receiptStatus,
                "contractStatus"                    => $contractStatus,
                "vatStatus"                         => $vatStatus,
                "vatValue"                          => $vatValue,
                "vatNumber"                         => $data['vat_number'],
                "fatPatDoStatus"                    => $fatPatDoStatus,
                "assetStatus"                       => $assetStatus,
                "depreciationAssetCategory_RefID"   => $depreciationRateYearsID, // 299X
                'period'                            => $depreciationYears,
                'rate'                              => $depreciationRate,
                "depreciationCOA_RefID"             => $depreciationCOARefID, 
                "deduction"                         => $deduction,
                "remarks"                           => $data['account_payable_notes'],
                "additionalData"    => [
                    "itemList"      => [
                        "items"     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function updates(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');

        $data                       = $request->storeData;
        $detailItems                = json_decode($data['account_payable_detail'], true);
        $fileID                     = $data['dataInput_Log_FileUpload_1'] ? (int) $data['dataInput_Log_FileUpload_1'] : null;
        $vatValue                   = $data['vat_origin'] == "yes" ? (float) str_replace(',', '', $data['ppn']) : 0;
        $categoryID                 = $data['category_id'] ? (int) $data['category_id'] : null;
        $depreciationMethod         = isset($data['depreciation_method']) ? (int) $data['depreciation_method'] : null;
        $depreciationRateYearsID    = $data['depreciation_rate_years_id'] ? (int) str_replace(',', '', $data['depreciation_rate_years_id']) : null; // 299x
        $depreciationRate           = $data['depreciation_rate_percentage'] ? (float) str_replace(',', '', $data['depreciation_rate_percentage']) : 0;
        $depreciationYears          = $data['depreciation_rate_years'] ? (float) str_replace(',', '', $data['depreciation_rate_years']) : 0;
        $depreciationCOARefID       = $data['depreciation_coa_id'] ? (int) $data['depreciation_coa_id'] : null;
        $deduction                  = $data['budget_details_deduction'] > -1 ? (float) str_replace(',', '', $data['budget_details_deduction']) : 0;

        $receiptStatus = match ($data['receipt_origin']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $contractStatus = match ($data['contract_signed']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $vatStatus = match ($data['vat_origin']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $fatPatDoStatus = match ($data['basft_origin']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        $assetStatus = match ($data['asset']) {
            'no'        => (int) 0,
            default     => (int) 1,
        };

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setPaymentInstruction',
            'latest',
            [
            'recordID' => (int) $data['account_payable_id'],
            'entities' => [
                "documentDateTimeTZ"                => date('Y-m-d'),
                "log_FileUpload_Pointer_RefID"      => $fileID,
                "supplierInvoiceNumber"             => $data['supplier_invoice_number'],
                "supplier_RefID"                    => (int) $data['payment_transfer_id'], 
                "receiptStatus"                     => $receiptStatus,
                "contractStatus"                    => $contractStatus,
                "vatStatus"                         => $vatStatus,
                "vatValue"                          => $vatValue,
                "vatNumber"                         => $data['vat_number'],
                "fatPatDoStatus"                    => $fatPatDoStatus,
                "assetStatus"                       => $assetStatus,
                "depreciationAssetCategory_RefID"   => $depreciationRateYearsID,
                "period"                            => $depreciationYears,
                "rate"                              => $depreciationRate,
                "depreciationCOA_RefID"             => $depreciationCOARefID,
                "deduction"                         => $deduction,
                "remarks"                           => $data['account_payable_notes'],
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}