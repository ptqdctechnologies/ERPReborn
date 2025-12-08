<?php

namespace App\Services\Process\Advance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class AdvanceSettlementService
{
    public function dataPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'dataPickList.finance.getAdvanceSettlement', 
            'latest',
            [
            'parameter' => [
                ]
            ]
        );
    }

    public function getDetail($advanceSettlementID)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.read.dataList.finance.getAdvanceSettlementDetail',
            'latest',
            [
            'parameter' => [
                'advanceSettlement_RefID' => (int) $advanceSettlementID,
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

    public function updates(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $careerRefID    = Session::get('SessionWorkerCareerInternal_RefID');

        $data           = $request->storeData;
        $detailItems    = json_decode($data['advanceSettlementDetail'], true);
        $fileID         = isset($data['dataInput_Log_FileUpload_1']) ? (int) $data['dataInput_Log_FileUpload_1'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.update.finance.setAdvanceSettlement',
            'latest',
            [
            'recordID' => (int) $detailItems[0]['advanceSettlement_RefID'],
            'entities' => [
                'documentDateTimeTZ'                => date('Y-m-d'),
                'log_FileUpload_Pointer_RefID'      => $fileID,
                'requesterWorkerJobsPosition_RefID' => (int) $careerRefID,
                'remarks'                           => $data['var_remark'],
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function getAdvanceSettlementSummary($budget, $subBudget) 
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'report.form.documentForm.finance.getAdvanceSettlementSummary', 
            'latest',
            [
                'parameter'     => [
                    'CombinedBudgetCode'        => $budget,
                    'CombinedBudgetSectionCode' => $subBudget
                ],
                'SQLStatement'  => [
                    'pick'      => null,
                    'sort'      => null,
                    'filter'    => null,
                    'paging'    => null
                ]
            ]
        );
    }
}
