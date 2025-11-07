<?php

namespace App\Services\Process\BusinessTrip;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessTripService
{
    protected $advanceSettlementService, $workflowService;

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
        $sessionToken   = Session::get('SessionLogin');

        $data                   = $request->storeData;
        $businessTripBudgets    = $data['components'];
        $fileID                 = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $result = [];
        foreach ($businessTripBudgets as $businessTripBudget) {
            if (!empty($businessTripBudget['value'])) {
                $result[] = [
                    'entities' => [
                        'businessTripCostComponentEntity_RefID' => (int) $businessTripBudget['id'],
                        'amountCurrency_RefID'                  => 62000000000001,
                        'amountCurrencyValue'                   => (float) str_replace(',', '', $businessTripBudget['value']),
                        'amountCurrencyExchangeRate'            => 1,
                        'remarks'                               => null
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
                'documentDateTimeTZ'                => date('Y-m-d'),
                'combinedBudgetSectionDetail_RefID' => (int) $data['combinedBudgetSectionDetail_RefID'],
                'paymentDisbursementMethod_RefID'   => null, // 218000000000002
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => [
                                [
                                'entities'  => [
                                    'sequence'                                          => 1,
                                    'log_FileUpload_Pointer_RefID'                      => $fileID,
                                    'requesterWorkerJobsPosition_RefID'                 => (int) $data['requester_id'],
                                    'startDateTimeTZ'                                   => $data['dateCommance'],
                                    'finishDateTimeTZ'                                  => $data['dateEnd'],
                                    'departurePoint'                                    => $data['departingFrom'],
                                    'destinationPoint'                                  => $data['destinationTo'],
                                    'reasonToTravel'                                    => $data['reasonTravel'],
                                    'businessTripAccommodationArrangementsType_RefID'   => null, // 219000000000002
                                    'remarks'                                           => null,
                                    'additionalData'    => [
                                        'itemList'      => [
                                            'items'     => $result
                                            ],
                                        'paymentItemList'   => [
                                            'items'         => [
                                                    [
                                                    //---> Payment To Vendor
                                                    'entities' => [
                                                        'paymentMethod_RefID'                   => 175000000000004,
                                                        'amountCurrency_RefID'                  => 62000000000001,
                                                        'amountCurrencyValue'                   => $data['vendor_amount'] ? (float) str_replace(',', '', $data['vendor_amount']) : null,
                                                        'amountCurrencyExchangeRate'            => 1,
                                                        'paymentFundingDestination_RefID'       => $data['vendor_bank_account'] ? (int) $data['vendor_bank_account'] : null,
                                                        'beneficiaryWorkerJobsPosition_RefID'   => null
                                                        ]
                                                    ],
                                                    //---> Payment To Credit Card
                                                    [
                                                    'entities' => [
                                                        'paymentMethod_RefID'                   => 175000000000005,
                                                        'amountCurrency_RefID'                  => 62000000000001,
                                                        'amountCurrencyValue'                   => $data['corp_amount'] ? (float) str_replace(',', '', $data['corp_amount']) : null,
                                                        'amountCurrencyExchangeRate'            => 1, 
                                                        'paymentFundingDestination_RefID'       => $data['corp_bank_account'] ? (int) $data['corp_bank_account'] : null,
                                                        'beneficiaryWorkerJobsPosition_RefID'   => null
                                                        ]
                                                    ],
                                                    //---> Payment To Employee
                                                    [
                                                    'entities' => [
                                                        'paymentMethod_RefID'                   => 175000000000004,
                                                        'amountCurrency_RefID'                  => 62000000000001,
                                                        'amountCurrencyValue'                   => $data['other_amount'] ? (float) str_replace(',', '', $data['other_amount']) : null,
                                                        'amountCurrencyExchangeRate'            => 1,
                                                        'paymentFundingDestination_RefID'       => $data['other_bank_account'] ? (int) $data['other_bank_account'] : null,
                                                        'beneficiaryWorkerJobsPosition_RefID'   => $data['other_beneficiary'] ? (int) $data['other_beneficiary'] : null,
                                                        ]
                                                    ]
                                                ]
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
        $sessionToken   = Session::get('SessionLogin');

        $data                   = $request->storeData;
        $businessTripBudgets    = $data['components'];
        $fileID                 = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        $result = [];
        foreach ($businessTripBudgets as $businessTripBudget) {
            if (!empty($businessTripBudget['value'])) {
                $result[] = [
                    'recordID' => $businessTripBudget['sys_ID'] ? (int) $businessTripBudget['sys_ID'] : null,
                    'entities' => [
                        'businessTripCostComponentEntity_RefID' => $businessTripBudget['id'] ? (int) $businessTripBudget['id'] : null,
                        'amountCurrency_RefID'                  => $businessTripBudget['amountCurrency_RefID'] ? (int) $businessTripBudget['amountCurrency_RefID'] : null,
                        'amountCurrencyValue'                   => (float) str_replace(',', '', $businessTripBudget['value']),
                        'amountCurrencyExchangeRate'            => $businessTripBudget['amountCurrencyExchangeRate'] ? (int) $businessTripBudget['amountCurrencyExchangeRate'] : null,
                        'remarks'                               => $businessTripBudget['remarks'] ? $businessTripBudget['remarks'] : null,
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
                'documentDateTimeTZ'                => date('Y-m-d'),
                'combinedBudgetSectionDetail_RefID' => (int) $data['combinedBudgetSectionDetail_RefID'],
                'paymentDisbursementMethod_RefID'   => null,
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => [
                                [
                                'recordID' => (int) $data['personBusinessTripDetailRefID'],
                                'entities' => [
                                    'sequence'                                          => 1,
                                    'log_FileUpload_Pointer_RefID'                      => $fileID,
                                    'requesterWorkerJobsPosition_RefID'                 => (int) $data['requester_id'],
                                    'startDateTimeTZ'                                   => $data['dateCommance'],
                                    'finishDateTimeTZ'                                  => $data['dateEnd'],
                                    'departurePoint'                                    => $data['departingFrom'],
                                    'destinationPoint'                                  => $data['destinationTo'],
                                    'reasonToTravel'                                    => $data['reasonTravel'],
                                    'businessTripAccommodationArrangementsType_RefID'   => null,
                                    'remarks'                                           => null,
                                    'additionalData'    => [
                                        'itemList'      => [
                                            'items'     => $result
                                            ],
                                        'paymentItemList' => [
                                            'items' => [
                                                    [
                                                    //---> Payment To Vendor
                                                    'recordID' => 213000000000001,
                                                    'entities' => [
                                                        'paymentMethod_RefID'                   => 175000000000004,
                                                        'amountCurrency_RefID'                  => 62000000000001,
                                                        'amountCurrencyValue'                   => (float) str_replace(',', '', $data['vendor_amount']),
                                                        'amountCurrencyExchangeRate'            => 1,
                                                        'paymentFundingDestination_RefID'       => (int) $data['vendor_bank_account'],
                                                        'beneficiaryWorkerJobsPosition_RefID'   => null
                                                        ]
                                                    ],
                                                    //---> Payment To Credit Card
                                                    [
                                                    'recordID' => 213000000000002,
                                                    'entities' => [
                                                        'paymentMethod_RefID'                   => 175000000000005,
                                                        'amountCurrency_RefID'                  => 62000000000001,
                                                        'amountCurrencyValue'                   => (float) str_replace(',', '', $data['corp_amount']),
                                                        'amountCurrencyExchangeRate'            => 1,
                                                        'paymentFundingDestination_RefID'       => (int) $data['corp_bank_account'],
                                                        'beneficiaryWorkerJobsPosition_RefID'   => null
                                                        ]
                                                    ],
                                                    //---> Payment To Employee
                                                    [
                                                    'recordID' => 213000000000003,
                                                    'entities' => [
                                                        'paymentMethod_RefID'                   => 175000000000004,
                                                        'amountCurrency_RefID'                  => 62000000000001,
                                                        'amountCurrencyValue'                   => (float) str_replace(',', '', $data['other_amount']),
                                                        'amountCurrencyExchangeRate'            => 1,
                                                        'paymentFundingDestination_RefID'       => (int) $data['other_bank_account'],
                                                        'beneficiaryWorkerJobsPosition_RefID'   => (int) $data['other_beneficiary'],
                                                        ]
                                                    ]
                                                ]
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
}