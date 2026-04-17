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
        $input = $request->all();
        dd($input);
        $count_product = count($input['var_product_id']);
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $advanceDetail = [];
        if ($count_product > 0 && isset($count_product)) {
            for ($n = 0; $n < $count_product; $n++) {
                $advanceDetail[$n] = [
                    'recordID' => ((!$input['var_recordIDDetail'][$n]) ? null : (int) $input['var_recordIDDetail'][$n]),
                    'entities' => [
                        "combinedBudgetSectionDetail_RefID" => (int) $input['var_combinedBudget'][$n],
                        "product_RefID" => (int) $input['var_product_id'][$n],
                        "quantity" => (float) $input['var_quantity'][$n],
                        "quantityUnit_RefID" => 73000000000001,
                        "productUnitPriceCurrency_RefID" => 62000000000001,
                        "productUnitPriceCurrencyValue" => (float) $input['var_price'][$n],
                        "productUnitPriceCurrencyExchangeRate" => 1,
                        "remarks" => 'Catatan'
                    ]
                ];
            }
        }
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.finance.setAdvance',
            'latest',
            [
                'recordID' => (int) $input['var_recordID'],
                'entities' => [
                    "documentDateTimeTZ" => '2022-03-07',
                    "log_FileUpload_Pointer_RefID" => (int) $input['dataInput_Log_FileUpload_Pointer_RefID'],
                    "requesterWorkerJobsPosition_RefID" => (int) $input['request_name_id'],
                    "beneficiaryWorkerJobsPosition_RefID" => 25000000000439,
                    "beneficiaryBankAccount_RefID" => 167000000000001,
                    "internalNotes" => 'My Internal Notes',
                    "remarks" => $input['var_remark'],
                    "additionalData" => [
                        "itemList" => [
                            "items" => $advanceDetail
                        ]
                    ]
                ]
            ]
        );
        $compact = [
            "status" => true,
        ];

        return response()->json($compact);
    }

    public function destroy($id)
    {
    }

    public function WorkflowRoute(Request $request)
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
            'start' => ['Aldi', 'Mul', 'Yadi', 'Utsman'],
            'intermediate' => ['Toni', 'Muhammad'],
            'end' => ['Deden', 'Agus']
        ];
        return view('Admin.Workflow.Transactions.CreateWorkflowRoute', $compact);
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
