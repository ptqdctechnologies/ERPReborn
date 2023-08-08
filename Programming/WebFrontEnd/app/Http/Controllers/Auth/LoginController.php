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

    public function loginStore(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $varBranchID = (int)$request->input('branch_name');
        $varUserRoleID = (int)$request->input('user_role');

        if ($varUserRoleID != 0) {
            
            $varAPIWebToken = $request->input('varAPIWebToken');
            $personName = $request->input('personName');
            $workerCareerInternal_RefID = $request->input('workerCareerInternal_RefID');

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
            $request->session()->put('SessionLoginName', $personName);
            $request->session()->put('SessionWorkerCareerInternal_RefID', $workerCareerInternal_RefID);

            $compact = [
                'status_code' => 1,
            ];
            return response()->json($compact);
            
        } else {

            $dataAwal = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $username,
                $password
            );

            // dd($dataAwal);

            if ($dataAwal['metadata']['HTTPStatusCode'] != 200) {

                $compact = [
                    'status_code' => 0,
                ];
                return response()->json($compact);
            } else {

                $varAPIWebToken = $dataAwal['data']['APIWebToken'];

                $varDataBranch = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'authentication.userPrivilege.getInstitutionBranch',
                    'latest',
                    [
                        'parameter' => [
                            'user_RefID' => $dataAwal['data']['userIdentity']['user_RefID'],
                            'dateTimeTZ' => null
                        ]
                    ]
                );

                // dd($varDataBranch['data']);

                if ($varDataBranch['metadata']['HTTPStatusCode'] == 200) {
                    if (count($varDataBranch['data']) == 1) {

                        $varDataRole = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'authentication.userPrivilege.getRole',
                            'latest',
                            [
                                'parameter' => [
                                    'user_RefID' => $dataAwal['data']['userIdentity']['user_RefID'],
                                    'branch_RefID' => $varDataBranch['data'][0]['sys_ID'],
                                    'dateTimeTZ' => null
                                ]
                            ]
                        );

                        // dd($varDataRole);

                        $x = 

                        \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'authentication.general.setLoginBranchAndUserRole',
                            'latest',
                            [
                                'branchID' => (int)$varDataBranch['data'][0]['sys_ID'],
                                'userRoleID' => (int)$varDataRole['data'][0]['sys_ID']
                            ]
                        );

                        // dd($x);

                        $request->session()->put('SessionLogin', $varAPIWebToken);
                        $request->session()->put('SessionLoginName', $dataAwal['data']['userIdentity']['personName']);
                        $request->session()->put('SessionWorkerCareerInternal_RefID', $dataAwal['data']['userIdentity']['workerCareerInternal_RefID']);

                        $compact = [
                            'status_code' => 1,
                        ];

                        return response()->json($compact);
                    } else {

                        if ($varUserRoleID == 0) {

                            $compact = [
                                'status_code' => 2,
                                'data' => $varDataBranch['data'],
                                'user_RefID' => $dataAwal['data']['userIdentity']['user_RefID'],
                                'varAPIWebToken' => $varAPIWebToken,
                                'personName' => $dataAwal['data']['userIdentity']['personName'],
                                'workerCareerInternal_RefID' => $dataAwal['data']['userIdentity']['workerCareerInternal_RefID'],
                            ];
                            return response()->json($compact);
                        }
                    }
                }
            }
        }
    }

    public function getRoleLogin(Request $request)
    {

        $user_RefID = $request->input('user_RefID');
        $varBranchID = (int)$request->input('branch_name');
        $varAPIWebToken = $request->input('varAPIWebToken');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'authentication.userPrivilege.getRole',
            'latest',
            [
                'parameter' => [
                    'user_RefID' => 4000000000498,
                    'branch_RefID' => $varBranchID,
                    'dateTimeTZ' => null
                ]
            ]
        );

        $status = $varData['metadata']['HTTPStatusCode'];

        if ($status == '200') {
            return response()->json($varData['data']);
        } else {
            return response()->json($status);
        }
    }

    public function SessionCheckingLogout(Request $request)
    {

        $varAPIWebToken = $request->session()->has("SessionLogin");

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
        ];

        return response()->json($compact);
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
}
