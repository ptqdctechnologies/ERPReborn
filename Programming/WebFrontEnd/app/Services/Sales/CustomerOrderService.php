<?php

namespace App\Services\Sales;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CustomerOrderService
{
    public function getPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.customerRelation.getSalesContract',
            'latest',
            [
                'parameter' => null
            ],
            false
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

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.customerRelation.setSalesContract',
            'latest',
            [
                'entities' => [
                    "log_FileUpload_Pointer_RefID" => $fileID,
                    "combinedBudget_RefID" => $data['combinedBudgetRefID'],
                    "currency_RefID" => $data['currencyRefID'],
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "additionalData" => [
                        "itemList" => [
                            "items" => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function update($id, $request)
    {
        $sessionToken = Session::get('SessionLogin');
        $data = $request->storeData;
        $detailItems = json_decode($data['customerOrderDetail'], true);
        $fileID = isset($data['logFileUploadPointerRefID']) ? (int) $data['logFileUploadPointerRefID'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.customerRelation.setSalesContract',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "log_FileUpload_Pointer_RefID" => $fileID,
                    "combinedBudget_RefID" => (int) $data['combinedBudgetRefID'],
                    "currency_RefID" => (int) $data['currencyRefID'],
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "additionalData" => [
                        "itemList" => [
                            "items" => $detailItems
                        ]
                    ]
                ]
            ]
        );
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
