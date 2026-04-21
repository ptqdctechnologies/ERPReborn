<?php

namespace App\Services\Process\BusinessTrip;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessTripService
{
    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.humanResource.getPersonBusinessTrip',
            'latest',
            [
                'parameter' => [
                ]
            ]
        );
    }

    public function getBusinessTripSummary($budget, $subBudget, $requester, $beneficiary, $date)
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
            'report.form.documentForm.humanResource.getPersonBusinessTripSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'RequesterWorkerJobsPosition_RefID' => $requester ? $requester : NULL,
                    'BeneficiaryWorkerJobsPosition_RefID' => NULL, // $beneficiary ? $beneficiary : NULL,
                    'StartDate' => $date ? $startDate : NULL,
                    'EndDate' => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function getBusinessTripToBSFSummary($budget, $subBudget, $date, $requester, $businessTripID, $businessTripSettlementID)
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
            'report.form.documentForm.humanResource.getPersonBusinessTripToBSFSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $budget,
                    'CombinedBudgetSectionCode' => $subBudget ? $subBudget : NULL,
                    'Requester_RefID' => $requester ? $requester : NULL,
                    'BusinessTrip_RefID' => $businessTripID ? $businessTripID : NULL,
                    'BusinessTripSettlement_RefID' => $businessTripSettlementID ? $businessTripSettlementID : NULL,
                    'StartDate' => $date ? $startDate : NULL,
                    'EndDate' => $date ? $endDate : NULL
                ]
            ]
        );
    }

    public function getDetail($advanceRequestID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.humanResource.getPersonBusinessTripDetail',
            'latest',
            [
                'parameter' => [
                    'personBusinessTrip_RefID' => (int) $advanceRequestID,
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

    public function getPersonBusinessTripSequence($personBusinessTripRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.humanResource.getPersonBusinessTripSequence',
            'latest',
            [
                'parameter' => [
                    'personBusinessTrip_RefID' => (int) $personBusinessTripRefID
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

    public function getPersonBusinessTripSequenceDetail($personBusinessTripRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.humanResource.getPersonBusinessTripSequenceDetail',
            'latest',
            [
                'parameter' => [
                    'personBusinessTrip_RefID' => (int) $personBusinessTripRefID,
                    'sequence' => 1
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

    public function create(Request $request): array
    {
        $sessionToken = Session::get('SessionLogin');

        $data = $request->storeData;
        $businessTripBudgets = $data['components'];
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $result = [];
        foreach ($businessTripBudgets as $businessTripBudget) {
            if (!empty($businessTripBudget['value'])) {
                $result[] = [
                    'entities' => [
                        'businessTripCostComponentEntity_RefID' => (int) $businessTripBudget['id'],
                        'amountCurrency_RefID' => 62000000000001,
                        'amountCurrencyValue' => (float) str_replace(',', '', $businessTripBudget['value']),
                        'amountCurrencyExchangeRate' => 1,
                        'remarks' => null
                    ]
                ];
            }
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.humanResource.setPersonBusinessTrip',
            'latest',
            [
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'combinedBudgetSectionDetail_RefID' => (int) $data['combinedBudgetSectionDetail_RefID'],
                    // 'paymentDisbursementMethod_RefID'   => null, // 218000000000002
                    'additionalData' => [
                        'itemList' => [
                            'items' => [
                                [
                                    'entities' => [
                                        'sequence' => 1,
                                        'log_FileUpload_Pointer_RefID' => $fileID,
                                        'requesterWorkerJobsPosition_RefID' => (int) $data['requester_id'],
                                        'workStructure_RefID' => $data['workStructure_RefID'],
                                        'product_RefID' => $data['product_RefID'],
                                        'startDateTimeTZ' => $data['dateCommance'],
                                        'finishDateTimeTZ' => $data['dateEnd'],
                                        'departurePoint' => $data['departingFrom'],
                                        'destinationPoint' => $data['destinationTo'],
                                        'reasonToTravel' => $data['reasonTravel'],
                                        'businessTripAccommodationArrangementsType_RefID' => null, // 219000000000002
                                        'currency_RefID' => 62000000000001, // NEW
                                        'currencyExchangeRate' => 1, // NEW
                                        'paymentToVendor_amountCurrencyValue' => $data['vendor_amount'] ? (float) str_replace(',', '', $data['vendor_amount']) : null, // NEW
                                        'paymentToVendor_paymentFundingDestination_RefID' => $data['vendor_bank_account'] ? (int) $data['vendor_bank_account'] : null, // NEW
                                        'paymentToVendor_beneficiaryWorkerJobsPosition_RefID' => null, // NEW
                                        'paymentToCreditCard_amountCurrencyValue' => $data['corp_amount'] ? (float) str_replace(',', '', $data['corp_amount']) : null, // NEW
                                        'paymentToCreditCard_paymentFundingDestination_RefID' => $data['corp_bank_account'] ? (int) $data['corp_bank_account'] : null, // NEW
                                        'paymentToCreditCard_beneficiaryWorkerJobsPosition_RefID' => null, // NEW
                                        'paymentToOther_amountCurrencyValue' => $data['other_amount'] ? (float) str_replace(',', '', $data['other_amount']) : null, // NEW
                                        'paymentToOther_paymentFundingDestination_RefID' => $data['other_bank_account'] ? (int) $data['other_bank_account'] : null, // NEW
                                        'paymentToOther_beneficiaryWorkerJobsPosition_RefID' => $data['other_beneficiary'] ? (int) $data['other_beneficiary'] : null, // NEW
                                        'remarks' => null,
                                        'additionalData' => [
                                            'itemList' => [
                                                'items' => $result
                                            ]
                                        ]
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

        $data = $request->storeData;
        $businessTripBudgets = $data['components'];
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $result = [];
        foreach ($businessTripBudgets as $businessTripBudget) {
            if (!empty($businessTripBudget['value'])) {
                $result[] = [
                    'recordID' => $businessTripBudget['sys_ID'] ? (int) $businessTripBudget['sys_ID'] : null,
                    'entities' => [
                        'businessTripCostComponentEntity_RefID' => $businessTripBudget['id'] ? (int) $businessTripBudget['id'] : null,
                        'amountCurrency_RefID' => $businessTripBudget['amountCurrency_RefID'] ? (int) $businessTripBudget['amountCurrency_RefID'] : null,
                        'amountCurrencyValue' => (float) str_replace(',', '', $businessTripBudget['value']),
                        'amountCurrencyExchangeRate' => $businessTripBudget['amountCurrencyExchangeRate'] ? (int) $businessTripBudget['amountCurrencyExchangeRate'] : null,
                        // 'remarks'                               => $businessTripBudget['remarks'] ? $businessTripBudget['remarks'] : null,
                    ]
                ];
            }
        }

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.humanResource.setPersonBusinessTrip',
            'latest',
            [
                'recordID' => (int) $data['personBusinessTripRefID'],
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'combinedBudgetSectionDetail_RefID' => (int) $data['combinedBudgetSectionDetail_RefID'],
                    // 'paymentDisbursementMethod_RefID'   => null,
                    'additionalData' => [
                        'itemList' => [
                            'items' => [
                                [
                                    'recordID' => (int) $data['personBusinessTripDetailRefID'],
                                    'entities' => [
                                        'sequence' => 1,
                                        'log_FileUpload_Pointer_RefID' => $fileID,
                                        'requesterWorkerJobsPosition_RefID' => (int) $data['requester_id'],
                                        'workStructure_RefID' => $data['workStructure_RefID'],
                                        'product_RefID' => $data['product_RefID'],
                                        'startDateTimeTZ' => $data['dateCommance'],
                                        'finishDateTimeTZ' => $data['dateEnd'],
                                        'departurePoint' => $data['departingFrom'],
                                        'destinationPoint' => $data['destinationTo'],
                                        'reasonToTravel' => $data['reasonTravel'],
                                        'businessTripAccommodationArrangementsType_RefID' => null,
                                        'currency_RefID' => null, // HERE
                                        'currencyExchangeRate' => null, // HERE
                                        'paymentToVendor_amountCurrencyValue' => $data['vendor_amount'] ? (float) str_replace(',', '', $data['vendor_amount']) : null, // HERE
                                        'paymentToVendor_paymentFundingDestination_RefID' => null, // HERE
                                        'paymentToVendor_beneficiaryWorkerJobsPosition_RefID' => null, // HERE
                                        'paymentToCreditCard_amountCurrencyValue' => $data['corp_amount'] ? (float) str_replace(',', '', $data['corp_amount']) : null, // HERE
                                        'paymentToCreditCard_paymentFundingDestination_RefID' => null, // HERE
                                        'paymentToCreditCard_beneficiaryWorkerJobsPosition_RefID' => null, // HERE
                                        'paymentToOther_amountCurrencyValue' => $data['other_amount'] ? (float) str_replace(',', '', $data['other_amount']) : null, // HERE
                                        'paymentToOther_paymentFundingDestination_RefID' => null, // HERE
                                        'paymentToOther_beneficiaryWorkerJobsPosition_RefID' => null, // HERE
                                        'remarks' => null,
                                        'additionalData' => [
                                            'itemList' => [
                                                'items' => $result
                                            ],
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}