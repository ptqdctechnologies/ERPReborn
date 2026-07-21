<?php

namespace App\Services\Sales;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CustomerOrderService
{
    public function picklist($formatted)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataPickList.customerRelation.getSalesContract',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }

    public function getDetail($customerOrderRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.customerRelation.getSalesContractDetail',
            'latest',
            [
                'parameter' => [
                    'salesContract_RefID' => (int) $customerOrderRefID,
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

    public function create(Request $request): array
    {
        $sessionToken = Session::get('SessionLogin');
        $data = $request->storeData;
        $detailItems = json_decode($data['customerOrderDetail'], true);
        $fileID = isset($data['logFileUploadPointerRefID']) ? (int) $data['logFileUploadPointerRefID'] : null;

        if ($data['coType'] == "SUB_BUDGET_BASE") {
            return Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $sessionToken,
                'transaction.create.customerRelation.setSalesContractSubBudgetBase',
                'latest',
                [
                    'entities' => [
                        "log_FileUpload_Pointer_RefID" => $fileID,
                        "combinedBudget_RefID" => $data['combinedBudgetRefID'],
                        "currency_RefID" => $data['currencyRefID'],
                        "documentDateTimeTZ" => date('Y-m-d'),
                        "type" => 'SUB_BUDGET_BASE',
                        "vatStatus" => $data['coVat'],
                        "vatRatio" => $data['coRatio'],
                        "additionalData" => [
                            "itemList" => [
                                "items" => $detailItems
                            ]
                        ]
                    ]
                ]
            );
        } else {
            return Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $sessionToken,
                'transaction.create.customerRelation.setSalesContractProductBase',
                'latest',
                [
                    'entities' => [
                        "log_FileUpload_Pointer_RefID" => $fileID,
                        "combinedBudget_RefID" => $data['combinedBudgetRefID'],
                        "currency_RefID" => $data['currencyRefID'],
                        "documentDateTimeTZ" => date('Y-m-d'),
                        "type" => 'PRODUCT_BASE',
                        "vatStatus" => $data['coVat'],
                        "vatRatio" => $data['coRatio'],
                        "additionalData" => [
                            "itemList" => [
                                "items" => $detailItems
                            ]
                        ]
                    ]
                ]
            );
        }
    }

    public function update($id, $request)
    {
        $sessionToken = Session::get('SessionLogin');
        $data = $request->storeData;
        $detailItems = json_decode($data['customerOrderDetail'], true);
        $fileID = isset($data['logFileUploadPointerRefID']) ? (int) $data['logFileUploadPointerRefID'] : null;

        if ($data['coType'] == "SUB_BUDGET_BASE") {
            return Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $sessionToken,
                'transaction.update.customerRelation.setSalesContractSubBudgetBase',
                'latest',
                [
                    'recordID' => (int) $id,
                    'entities' => [
                        "log_FileUpload_Pointer_RefID" => $fileID,
                        "combinedBudget_RefID" => (int) $data['combinedBudgetRefID'],
                        "currency_RefID" => (int) $data['currencyRefID'],
                        "documentDateTimeTZ" => date('Y-m-d'),
                        "type" => 'SUB_BUDGET_BASE',
                        "vatStatus" => $data['coVat'],
                        "vatRatio" => $data['coRatio'],
                        "additionalData" => [
                            "itemList" => [
                                "items" => $detailItems
                            ]
                        ]
                    ]
                ]
            );
        } else {
            return Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $sessionToken,
                'transaction.update.customerRelation.setSalesContractProductBase',
                'latest',
                [
                    'recordID' => (int) $id,
                    'entities' => [
                        "log_FileUpload_Pointer_RefID" => $fileID,
                        "combinedBudget_RefID" => (int) $data['combinedBudgetRefID'],
                        "currency_RefID" => (int) $data['currencyRefID'],
                        "documentDateTimeTZ" => date('Y-m-d'),
                        "type" => 'PRODUCT_BASE',
                        "vatStatus" => $data['coVat'],
                        "vatRatio" => $data['coRatio'],
                        "additionalData" => [
                            "itemList" => [
                                "items" => $detailItems
                            ]
                        ]
                    ]
                ]
            );
        }
    }

    public function summary(
        $combinedBudgetCode,
        $combinedBudgetSectionCode,
        $date,
        $limit = 10,
        $offset = 0
    ) {
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
            'report.form.documentForm.customerRelation.getSalesContractSummary',
            'latest',
            [
                'parameter' => [
                    'CombinedBudgetCode' => $combinedBudgetCode,
                    'CombinedBudgetSectionCode' => $combinedBudgetSectionCode ? $combinedBudgetSectionCode : NULL,
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
}
