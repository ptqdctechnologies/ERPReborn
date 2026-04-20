<?php

namespace App\Http\Controllers\Admin\Workflow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WorkflowController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $request->session()->forget("SessionAdvance");

        $var = 0;
        if (!empty($_GET['var'])) {
            $var = $_GET['var'];
        }
        $compact = [
            'var' => $var,
            'varAPIWebToken' => $varAPIWebToken,
        ];
        return view('Admin.Workflow.Transactions.CreateWorkflow', $compact);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
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

    public function WorkflowRoute(Request $request)
    {
        $var = $request->query('var', 0);

        return view('Admin.Workflow.Transactions.CreateWorkflowRoute', [
            'var' => $var
        ]);
    }

    public function WorkflowRouteStore(Request $request)
    {
        $input = $request->all();
        dd($input);
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
            $data = $response['data'] ?? [];
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
            $data = $response['data'] ?? [];
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
                    'user_RefID' => (int) 4000000000029,
                    'businessDocumentType_RefID' => (int) $businessDocumentTypeRefID,
                    'combinedBudget_RefID' => (int) $combinedBudgetRefID
                ]
            ],
            false
        );

        $status = $response['metadata']['HTTPStatusCode'];
        $data = [];

        if ($status == 200) {
            $data = $response['data'] ?? [];
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ]);
    }
}
