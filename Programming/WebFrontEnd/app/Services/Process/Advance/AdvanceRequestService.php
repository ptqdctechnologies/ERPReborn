<?php

namespace App\Services\Process\Advance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class AdvanceRequestService
{
    public function getPickList($formatted)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataPickList.finance.getAdvance',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }

    public function detail($id): mixed
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.read.dataList.finance.getAdvanceDetail',
            'latest',
            [
                'parameter' => [
                    'advance_RefID' => (int) $id,
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

    public function getAdvanceSummary($budget, $subBudget, $requester, $beneficiary, $date, $limit = 10, $offset = 0)
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
            'report.form.documentForm.finance.getAdvanceSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'RequesterWorkerJobsPosition_RefID' => $requester ? $requester : NULL,
                    'BeneficiaryWorkerJobsPosition_RefID' => $beneficiary ? $beneficiary : NULL,
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

    public function create($request): mixed
    {
        $token = Session::get('SessionLogin');

        $fileID = $request->input('advance_attachment');
        $requesterID = $request->input('requester_id');
        $beneficiaryID = $request->input('beneficiary_id');
        $accountNumberID = $request->input('account_number_id');
        $remark = $request->input('remark');
        $remark = preg_replace('/[^\p{L}\p{N}\s.,\-\/()]/u', '', $remark);

        $budgetDetails = $request->input('additionalData', []);
        $items = collect($budgetDetails)
            ->filter(
                fn($entity) =>
                    filled($entity['productUnitPriceCurrencyValue'] ?? null) &&
                    filled($entity['quantity'] ?? null)
            )
            ->map(function ($entity) {
                return [
                    'entities' => [
                        'workStructure_RefID' => (int) $entity['workStructure_RefID'],
                        'combinedBudgetSectionDetail_RefID' => (int) $entity['combinedBudgetSectionDetail_RefID'],
                        'product_RefID' => (int) $entity['product_RefID'],
                        'quantity' => (float) number_format($entity['quantity'], 2),
                        'quantityUnit_RefID' => (int) $entity['quantityUnit_RefID'],
                        'productUnitPriceCurrency_RefID' => (int) $entity['productUnitPriceCurrency_RefID'],
                        'productUnitPriceCurrencyValue' => (float) str_replace(',', '', $entity['productUnitPriceCurrencyValue']),
                        'productUnitPriceCurrencyExchangeRate' => (float) number_format($entity['productUnitPriceCurrencyExchangeRate'], 2),
                        'remarks' => $entity['remarks'] ?? NULL,
                    ]
                ];
            })
            ->values()
            ->all();

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.finance.setAdvance',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID" => $fileID ? (int) $fileID : NULL,
                    "requesterWorkerJobsPosition_RefID" => (int) $requesterID,
                    "beneficiaryWorkerJobsPosition_RefID" => (int) $beneficiaryID,
                    "beneficiaryBankAccount_RefID" => (int) $accountNumberID,
                    "internalNotes" => NULL,
                    "remarks" => $remark,
                    "additionalData" => [
                        "itemList" => [
                            "items" => $items
                        ]
                    ]
                ]
            ]
        );
    }

    public function update($request, $id): mixed
    {
        $token = Session::get('SessionLogin');

        $beneficiaryID = $request->input('beneficiary_id');
        $fileID = $request->input('advance_attachment');
        $requesterID = $request->input('requester_id');
        $beneficiaryID = $request->input('beneficiary_id');
        $accountNumberID = $request->input('account_number_id');
        $remark = $request->input('remark');
        $remark = preg_replace('/[^\p{L}\p{N}\s.,\-\/()]/u', '', $remark);

        $budgetDetails = $request->input('additionalData', []);
        $items = collect($budgetDetails)
            ->filter(
                fn($entity) =>
                    filled($entity['productUnitPriceCurrencyValue'] ?? null) &&
                    filled($entity['quantity'] ?? null)
            )
            ->map(function ($entity) {
                return [
                    'recordID' => $entity['recordID'] ? (int) $entity['recordID'] : NULL,
                    'entities' => [
                        'workStructure_RefID' => (int) $entity['workStructure_RefID'],
                        'combinedBudgetSectionDetail_RefID' => (int) $entity['combinedBudgetSectionDetail_RefID'],
                        'product_RefID' => (int) $entity['product_RefID'],
                        'quantity' => (float) number_format($entity['quantity'], 2),
                        'quantityUnit_RefID' => (int) $entity['quantityUnit_RefID'],
                        'productUnitPriceCurrency_RefID' => (int) $entity['productUnitPriceCurrency_RefID'],
                        'productUnitPriceCurrencyValue' => (float) str_replace(',', '', $entity['productUnitPriceCurrencyValue']),
                        'productUnitPriceCurrencyExchangeRate' => (float) number_format($entity['productUnitPriceCurrencyExchangeRate'], 2),
                        'remarks' => $entity['remarks'] ?? NULL,
                    ]
                ];
            })
            ->values()
            ->all();

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.finance.setAdvance',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID" => $fileID ? (int) $fileID : NULL,
                    "requesterWorkerJobsPosition_RefID" => (int) $requesterID,
                    "beneficiaryWorkerJobsPosition_RefID" => (int) $beneficiaryID,
                    "beneficiaryBankAccount_RefID" => (int) $accountNumberID,
                    "internalNotes" => NULL,
                    "remarks" => $remark,
                    "additionalData" => [
                        "itemList" => [
                            "items" => $items
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
        $detailItems = json_decode($data['advanceRequestDetail'], true);
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            $careerRefID,
            $sessionToken,
            'transaction.update.finance.setAdvance',
            'latest',
            [
                'recordID' => (int) $data['advanceRequestID'],
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'log_FileUpload_Pointer_RefID' => $fileID,
                    'requesterWorkerJobsPosition_RefID' => (int) $data['requester_id'],
                    'beneficiaryWorkerJobsPosition_RefID' => (int) $data['beneficiary_id'],
                    'beneficiaryBankAccount_RefID' => (int) $data['bank_account_id'],
                    'internalNotes' => null,
                    'remarks' => $data['var_remark'],
                    'additionalData' => [
                        'itemList' => [
                            'items' => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}
