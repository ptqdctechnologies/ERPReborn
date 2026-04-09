<?php

namespace App\Services\Process\BusinessTrip;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessTripSettlementService
{
    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.humanResource.getPersonBusinessTripSettlement',
            'latest',
            [
                'parameter' => [
                ]
            ]
        );
    }

    public function getDetail($businessTripSettlementRefID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.humanResource.getPersonBusinessTripSettlementDetail',
            'latest',
            [
                'parameter' => [
                    'personBusinessTrip_RefID' => (int) $businessTripSettlementRefID,
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
        $detailItems = json_decode($data['businessTripSettlementDetail'], true);
        $fileID = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.humanResource.setPersonBusinessTripSettlement',
            'latest',
            [
                'entities' => [
                    'documentDateTimeTZ' => date('Y-m-d'),
                    'log_FileUpload_Pointer_RefID' => $fileID,
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