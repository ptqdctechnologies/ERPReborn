<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class AdvanceSettlementService
{
    public function create(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['advanceSettlementDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.finance.setAdvanceSettlement',
            'latest',
            [
                'entities' => [
                    "documentDateTimeTZ"                => date('Y-m-d'),
                    "log_FileUpload_Pointer_RefID"      => $fileID,
                    "requesterWorkerJobsPosition_RefID" => (int) $careerRefID,
                    "remarks"                           => $data['var_remark'],
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
