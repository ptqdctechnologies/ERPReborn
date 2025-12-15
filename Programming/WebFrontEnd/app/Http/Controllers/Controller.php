<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function GetBusinessDocumentsTypeFromRedis($businessDocumentName) 
    {
        $sessionUserRefID           = Session::get('SessionUser_RefID');
        $dataBusinessDocumentsType  = json_decode(Helper_Redis::getValue($sessionUserRefID, 'BusinessDocumentType'), true);

        $result = null;
        if (!empty($dataBusinessDocumentsType)) {
            $result = collect($dataBusinessDocumentsType)->firstWhere('name', $businessDocumentName);
            $result = $result['sys_ID'];
        }

        return $result;
    }

    public function GetBusinessDocumentsType($businessDocumentName)
    {
        try {
            $sessionToken = Session::get('SessionLogin');

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $sessionToken,
                'transaction.read.dataList.master.getBusinessDocumentType',
                'latest',
                [
                    'parameter'     => [],
                    'SQLStatement'  => [
                        'pick'      => null,
                        'sort'      => null,
                        'filter'    => "\"Name\" = '$businessDocumentName'",
                        'paging'    => null
                    ]
                ],
                false
            );

            $documentTypes = $response['data']['data'] ?? [];

            if ($response['metadata']['HTTPStatusCode'] !== 200 || empty($documentTypes)) {
                throw new \Exception('Failed to fetch Get Business Documents Type');
            }

            return $documentTypes[0]['sys_ID'];
        } catch (\Throwable $th) {
            Log::error("GetBusinessDocumentType Controller Function Error: " . $th->getMessage());

            return null;
        }
    }

    public function GetPrivilageMenu()
    {
        $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');
        $privilageMenu = json_decode(
            Helper_Redis::getValue(
                Helper_Environment::getUserSessionID_System(),
                "RedisGetMenu" . $SessionWorkerCareerInternal_RefID
            ),
            true
        );

        return $privilageMenu;
    
    }

    public function SelectWorkFlow(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

            $dataInput = $request->all();
            Log::error("dataInput at ", [$dataInput, $SessionWorkerCareerInternal_RefID]);
            if (isset($dataInput['dataInput_Log_FileUpload_Pointer_RefID_Action'])) {
                unset($dataInput['dataInput_Log_FileUpload_Pointer_RefID_Action']);
            }
            $DocumentTypeID = $dataInput['DocumentTypeID'];
            $Sys_ID_Advance = 0;
            if (isset($dataInput['Sys_ID_Advance'])) {
                $Sys_ID_Advance = $dataInput['Sys_ID_Advance'];
                // Session::put('dataInputUpdate' . $DocumentTypeID . $dataInput['Sys_ID_Advance'], $dataInput);
            } else {
                // Session::put('dataInputStore' . $DocumentTypeID, $dataInput);
            }

            // if (Redis::get("BusinessDocumentTypeWorkFlowPath" . $DocumentTypeID) == null) {
                // $varAPIWebToken = Session::get('SessionLogin');
                $VarSelectWorkFlow = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
                    'latest',
                    [
                        'parameter' => [
                            'businessDocumentType_RefID' => (int)$DocumentTypeID,
                            'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                            'combinedBudget_RefID' => (int)$dataInput['var_combinedBudget_RefID']
                        ]
                    ],
                    false
                );
            // }

            Log::error("VarSelectWorkFlow at ", [$VarSelectWorkFlow]);

            if ($VarSelectWorkFlow['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            $BusinessDocumentTypeWorkFlowPath = $VarSelectWorkFlow['data'];

            // $BusinessDocumentTypeWorkFlowPath = json_decode(
            //     Helper_Redis::getValue(
            //         Helper_Environment::getUserSessionID_System(),
            //         "BusinessDocumentTypeWorkFlowPath" . $DocumentTypeID
            //     ),
            //     true
            // );

            $collection = collect($BusinessDocumentTypeWorkFlowPath);

            $collection = $collection->where('combinedBudget_RefID', $dataInput['var_combinedBudget_RefID']);
            $collection = $collection->where('submitterEntity_RefID', $SessionWorkerCareerInternal_RefID);

            $VarSelectWorkFlow = [];
            $i = 0;
            foreach ($collection->all() as $collections) {
                $VarSelectWorkFlow[$i] = $collections;
                // $tamp = json_decode($collections['nextApproverPath'], true);
                $tamp = $collections['nextApproverPath'];
                $VarSelectWorkFlow[$i]['NextApprover_RefID'] = $tamp[0]['entities']['approverEntity_RefID'];
                $i++;
            }

            if (count($VarSelectWorkFlow) == 0) {

                $compact = [
                    "message" => "WorkflowError"
                ];

                return response()->json($compact);
            } else {
                $dataStore = Arr::except($dataInput, '_token');

                if (count($VarSelectWorkFlow) > 1) {
                    $message =  "MoreThanOne";
                } else {
                    $message =  "OnlyOne";
                }
                $compact = [
                    "data"                  => $VarSelectWorkFlow,
                    "workFlowPath_RefID"    => $VarSelectWorkFlow[0]['sys_ID'],
                    "nextApprover_RefID"    => $VarSelectWorkFlow[0]['nextApprover_RefID'],
                    "approverEntity_RefID"  => $SessionWorkerCareerInternal_RefID,
                    "documentTypeID"        => $DocumentTypeID,
                    "Sys_ID_Advance"        => $Sys_ID_Advance,
                    "message"               => $message,
                    "storeData"             => $dataStore
                ];

                return response()->json($compact);
            }
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function SubmitWorkflow($businessDocument_RefID, $workFlowPath_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber)
    {
        try {
            // Log::info("SubmitWorkflow", [
            //     'businessDocument_RefID'    => $businessDocument_RefID, 
            //     'workFlowPath_RefID'        => $workFlowPath_RefID, 
            //     'comment'                   => $comment, 
            //     'approverEntity_RefID'      => $approverEntity_RefID, 
            //     'nextApprover_RefID'        => $nextApprover_RefID, 
            //     'documentNumber'            => $documentNumber
            // ]);

            $varAPIWebToken = Session::get('SessionLogin');

            $VarSubmitWorkflow = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.setUserSubmission',
                'latest',
                [
                    'entities' => [
                        "businessDocument_RefID"    => (int)$businessDocument_RefID,
                        "workFlowPath_RefID"        => (int)$workFlowPath_RefID,
                        "remarks"                   => $comment,
                        "approverEntity_RefID"      => (int)$approverEntity_RefID
                    ]
                ]
            );

            $compact = [
                "documentNumber" => $documentNumber,
                "status" => $VarSubmitWorkflow['metadata']['HTTPStatusCode'],
            ];

            if ($compact['status'] == 200) {


                //RESET REDIS DATA LIST ADVANCE
                // $this->FunctionResetRedisAdvance();

                //RESET REDIS SHOW DOCUMENT APPROVAL
                $this->FunctionResetRedisDocumentApproval($nextApprover_RefID, $businessDocument_RefID);
            }

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function ResubmitWorkflow($businessDocument_RefID, $comment, $approverEntity_RefID, $nextApprover_RefID, $documentNumber)
    {
        try {
            Log::info("ResubmitWorkflow", [
                'businessDocument_RefID'    => $businessDocument_RefID, 
                'comment'                   => $comment, 
                'approverEntity_RefID'      => $approverEntity_RefID, 
                'nextApprover_RefID'        => $nextApprover_RefID, 
                'documentNumber'            => $documentNumber
            ]);

            $varAPIWebToken = Session::get('SessionLogin');

            $VarResubmitWorkflow = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.approvalStage.setUserResubmission',
                'latest',
                [
                    'entities' => [
                        "businessDocument_RefID"    => (int) $businessDocument_RefID,
                        "remarks"                   => $comment,
                        "approverEntity_RefID"      => (int) $approverEntity_RefID
                    ]
                ]
            );

            Log::error("VarResubmitWorkflow: ", $VarResubmitWorkflow);

            $compact = [
                "documentNumber"    => $documentNumber,
                "status"            => $VarResubmitWorkflow['metadata']['HTTPStatusCode'],
            ];

            if ($compact['status'] == 200) {

                //RESET REDIS DATA LIST ADVANCE
                // $this->FunctionResetRedisAdvance();

                //RESET REDIS SHOW DOCUMENT APPROVAL
                $this->FunctionResetRedisDocumentApproval($approverEntity_RefID, $businessDocument_RefID);
                $this->FunctionResetRedisDocumentApproval($nextApprover_RefID, $businessDocument_RefID);
            }

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function FunctionResetRedisDocumentApproval($nextApprover_RefID, $businessDocument_RefID)
    {
        try {

            Redis::del("RedisGetMyDocument" . $nextApprover_RefID);
            Redis::del("ShowMyDocumentListData" . $nextApprover_RefID);
            Redis::del("ApprovementHistoryList" . $businessDocument_RefID);

            return true;
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function CheckingWorkflow(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $documentTypeID = $request->documentTypeID;
            $combinedBudget_RefID = $request->combinedBudget_RefID;

            $SessionWorkerCareerInternal_RefID = Session::get('SessionWorkerCareerInternal_RefID');

            // Log::error("Request at ", [
            //     'businessDocumentType_RefID'    => (int)$documentTypeID,
            //     'submitterEntity_RefID'         => (int)$SessionWorkerCareerInternal_RefID,
            //     'combinedBudget_RefID'          => (int)$combinedBudget_RefID
            // ]);

            // if (Redis::get("BusinessDocumentTypeWorkFlowPath" . $documentTypeID) == null) {
                // $varAPIWebToken = Session::get('SessionLogin');
                $VarSelectWorkFlow = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
                    'latest',
                    [
                        'parameter' => [
                            'businessDocumentType_RefID' => (int)$documentTypeID,
                            'submitterEntity_RefID' => (int)$SessionWorkerCareerInternal_RefID,
                            'combinedBudget_RefID' => (int)$combinedBudget_RefID
                        ]
                    ],
                    false
                );

                Log::error("VarSelectWorkFlow at ", [$VarSelectWorkFlow]);

            // }

            if ($VarSelectWorkFlow['metadata']['HTTPStatusCode'] !== 200) {
                return redirect()->back()->with('NotFound', 'Process Error');
            }

            $BusinessDocumentTypeWorkFlowPath = $VarSelectWorkFlow['data'];

            // $BusinessDocumentTypeWorkFlowPath = json_decode(
            //     Helper_Redis::getValue(
            //         Helper_Environment::getUserSessionID_System(),
            //         "BusinessDocumentTypeWorkFlowPath" . $documentTypeID
            //     ),
            //     true
            // );

            // Log::error("Error at ", [$BusinessDocumentTypeWorkFlowPath]);

            $collection = collect($BusinessDocumentTypeWorkFlowPath);

            $collection = $collection->where('combinedBudget_RefID', $combinedBudget_RefID);
            $collection = $collection->where('submitterEntity_RefID', $SessionWorkerCareerInternal_RefID);

            $countWorkflow = count($collection);

            return response()->json($countWorkflow);
        } catch (\Throwable $th) {
            Log::error("Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    protected function SyncDataWithRedis($userSessionID, $redisKey, $apiData, $redisTTL = null)
    {
        $existingRedisData = json_decode(Helper_Redis::getValue($userSessionID, $redisKey), true) ?? [];
        
        $dataChanged = false;

        if (count($apiData) !== count($existingRedisData)) {
            $dataChanged = true;
        } else {
            foreach ($apiData as $apiIndex => $apiItem) {
                $redisItem = $existingRedisData[$apiIndex] ?? null;
                
                if ($redisItem !== $apiItem) {
                    $dataChanged = true;
                    break;
                }
            }
        }

        if ($dataChanged) {
            Helper_Redis::setValue(
                $userSessionID, 
                $redisKey, 
                json_encode($apiData),
                $redisTTL
            );
            return $apiData;
        } 
        
        return $existingRedisData;
    }

    public function GetWorkflow(Request $request) 
    {
        try {
            $varAPIWebToken             = Session::get('SessionLogin');
            $workerCareerInternalRefID  = Session::get('SessionWorkerCareerInternal_RefID');
            $businessDocumentTypeRefID  = $request->businessDocumentType_RefID;
            $combinedBudgetRefID        = $request->combinedBudget_RefID;

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'userAction.documentWorkFlow.general.getBusinessDocumentTypeWorkFlowPathBySubmitterEntityIDAndCombinedBudgetID',
                'latest',
                [
                    'parameter' => [
                        'businessDocumentType_RefID'    => (int) $businessDocumentTypeRefID,
                        'submitterEntity_RefID'         => (int) $workerCareerInternalRefID,
                        'combinedBudget_RefID'          => (int) $combinedBudgetRefID
                    ]
                ],
                false
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Business Document Type WorkFlow Path By Submitter EntityID And CombinedBudgetID');
            }

            $compact = [
                'status'    => $response['metadata']['HTTPStatusCode'],
                'data'      => $response['data']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Get Workflow Function Error " . $th->getMessage());

            $compact = [
                'status'    => 500,
                'data'      => []
            ];

            return response()->json($compact);
        }
    }
}
