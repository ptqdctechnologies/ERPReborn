<?php

namespace App\Http\Controllers\Admin\Workflow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Illuminate\Support\Facades\Log;
use App\Services\WorkflowService;

class WorkflowController extends Controller
{
    protected $workflowService;

    public function __construct(WorkflowService $workflowService)
    {
        $this->workflowService = $workflowService;
    }

    public function index(Request $request)
    {
        return view('Admin.Workflow.Transactions.index');
    }

    public function create()
    {
        return view('Admin.Workflow.Transactions.create');
    }

    public function store(Request $request)
    {
        try {
            $response = $this->workflowService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Workflow => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'] ?? '',
                "status" => $response['metadata']['HTTPStatusCode'] // $responseWorkflow['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Workflow Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function userAllowedToSubmit(Request $request)
    {
        $token = Session::get('SessionLogin');
        $sessionUserRefID = Session::get('SessionUser_RefID');
        $businessDocumentTypeRefID = $request->input('businessDocumentType_RefID');
        $combinedBudgetRefID = $request->input('combinedBudget_RefID');

        $response = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'userAction.documentWorkFlow.userPrivilege.isUserAllowedToSubmit',
            'latest',
            [
                'parameter' => [
                    'user_RefID' => (int) $sessionUserRefID,
                    'businessDocumentType_RefID' => (int) $businessDocumentTypeRefID,
                    'combinedBudget_RefID' => (int) $combinedBudgetRefID
                ]
            ],
            false
        );

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data']['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }

    public function userAllowedToApprove(Request $request)
    {
        $token = Session::get('SessionLogin');
        $sessionUserRefID = Session::get('SessionUser_RefID');
        $businessDocumentTypeRefID = $request->input('businessDocumentType_RefID');
        $combinedBudgetRefID = $request->input('combinedBudget_RefID');

        $response = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'userAction.documentWorkFlow.userPrivilege.isUserAllowedToApprove',
            'latest',
            [
                'parameter' => [
                    'user_RefID' => (int) $sessionUserRefID,
                    'businessDocumentType_RefID' => (int) $businessDocumentTypeRefID,
                    'combinedBudget_RefID' => (int) $combinedBudgetRefID
                ]
            ],
            false
        );

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data']['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }

    public function userAllowedToInvolve(Request $request)
    {
        $token = Session::get('SessionLogin');
        $sessionUserRefID = Session::get('SessionUser_RefID');
        $businessDocumentTypeRefID = $request->businessDocumentType_RefID;
        $combinedBudgetRefID = $request->combinedBudget_RefID;

        $response = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'userAction.documentWorkFlow.userPrivilege.isUserAllowedToInvolve',
            'latest',
            [
                'parameter' => [
                    'user_RefID' => (int) $sessionUserRefID,
                    'businessDocumentType_RefID' => (int) $businessDocumentTypeRefID,
                    'combinedBudget_RefID' => (int) $combinedBudgetRefID
                ]
            ],
            false
        );

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data']['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }
}
