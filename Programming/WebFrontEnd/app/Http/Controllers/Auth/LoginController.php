<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        if ($varAPIWebToken) {
            return view('Dashboard.index');
        } else {
            return view('Authentication.login');
        }
    }

    public function getRoleLogin(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        if ($varData['metadata']['HTTPStatusCode'] == '401') {
            return response()->json($varData['metadata']['HTTPStatusCode']);
        } else {
            return response()->json($varData['data']['optionList']['0']['userRole']);
        }
    }

    public function loginStore(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $varBranchID = (int)$request->input('branch_name');
        $varUserRoleID = (int)$request->input('user_role');

        $dataAwal = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );

        // dd($dataAwal);
        // dd($dataAwal['metadata']['HTTPStatusCode']);

        if ($dataAwal['metadata']['HTTPStatusCode'] != 200) {

            $compact = [
                'status_code' => 0,
            ];
            return response()->json($compact);
        } else {

            if (count($dataAwal['data']['optionList']) == 1) {
                if (count($dataAwal['data']['optionList'][0]['userRole'])) {

                    $varBranchID = (int)$dataAwal['data']['optionList']['0']['branch_RefID'];
                    $varUserRoleID = (int)$dataAwal['data']['optionList']['0']['userRole']['0']['userRole_RefID'];

                    $varAPIWebToken = $dataAwal['data']['APIWebToken'];

                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'authentication.general.setLoginBranchAndUserRole',
                        'latest',
                        [
                            'branchID' => $varBranchID,
                            'userRoleID' => $varUserRoleID
                        ]
                    );

                    $request->session()->put('SessionLogin', $varAPIWebToken);
                    $request->session()->put('SessionLoginName', $dataAwal['data']['userIdentity']['personName']);
                    $request->session()->put('SessionWorkerCareerInternal_RefID', $dataAwal['data']['userIdentity']['workerCareerInternal_RefID']);

                    $compact = [
                        'status_code' => 1,
                    ];
                    return response()->json($compact);
                }
            } else {

                if ($varUserRoleID == 0) {

                    $compact = [
                        'status_code' => 2,
                        'data' => $dataAwal['data']['optionList'],
                    ];
                    return response()->json($compact);
                }
                else{

                    $varAPIWebToken = $dataAwal['data']['APIWebToken'];

                    \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'authentication.general.setLoginBranchAndUserRole',
                        'latest',
                        [
                            'branchID' => $varBranchID,
                            'userRoleID' => $varUserRoleID
                        ]
                    );

                    $request->session()->put('SessionLogin', $varAPIWebToken);
                    $request->session()->put('SessionLoginName', $dataAwal['data']['userIdentity']['personName']);
                    $request->session()->put('SessionWorkerCareerInternal_RefID', $dataAwal['data']['userIdentity']['workerCareerInternal_RefID']);

                    $compact = [
                        'status_code' => 1,
                    ];
                    return response()->json($compact);
                }
            }
        }
    }

    public function logout(Request $request)
    {
        $status = "success";
        $message = 'Thank you for your visit';
        if ($request->input('message') == "Session_Expired") {
            $message = 'Your session expired';
            $status = "error";
        }
        $request->session()->flush();

        return redirect('/')->with([$status => $message]);
    }

    public function SessionCheckingLogout(Request $request)
    {

        $varAPIWebToken = $request->session()->has("SessionLogin");

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
        ];

        return response()->json($compact);
    }

    public function SessionCheckingEvent(Request $request)
    {
        $status = $request->input('status');

        if ($status == "No") {
            $request->session()->forget('SessionLogout');
        }

        $compact = [
            'session' => $request->session()->has('SessionLogout')
        ];
        return response()->json($compact);
    }
}
