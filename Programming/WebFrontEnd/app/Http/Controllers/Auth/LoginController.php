<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        if($varAPIWebToken){
            return view('Layouts.dashboard');
        }
        else{
            return view('Authentication.login');
        }
    }

    public function getBranchLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        // dd($varData);
        if(count($varData['data']['optionList']) == 1){
            if(count($varData['data']['optionList'][0]['userRole'])){

                $varBranchID = (int)$varData['data']['optionList']['0']['branch_RefID'];
                $varUserRoleID = (int)$varData['data']['optionList']['0']['userRole']['0']['userRole_RefID'];
                
                $varAPIWebToken = $varData['data']['APIWebToken'];

                //---Core---
                $varDatas = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
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
                $request->session()->put('SessionLoginName', $varData['data']['userIdentity']['personName']);
                
                $request->session()->put('SessionWorkerCareerInternal_RefID', $varData['data']['userIdentity']['workerCareerInternal_RefID']);
                return response()->json($varDatas['metadata']['HTTPStatusCode']);
                
            }
        }

        if ($varData['metadata']['HTTPStatusCode'] == '401') {
            return response()->json($varData['metadata']['HTTPStatusCode']);
        } else {
            return response()->json($varData['data']['optionList']);
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
        $varAPIWebToken = $dataAwal['data']['APIWebToken'];

        //---Core---

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'authentication.general.setLoginBranchAndUserRole', 
            'latest', 
            [
            'branchID' => $varBranchID,
            'userRoleID' => $varUserRoleID
            ]
        );

        if ($varData['metadata']['HTTPStatusCode'] == '200') {
            $request->session()->put('SessionLogin', $varAPIWebToken);
            $request->session()->put('SessionLoginName', $dataAwal['data']['userIdentity']['personName']);
            return redirect('/dashboard');
        }
        return redirect('/')->with('message', 'Login Failed');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with(['success' => 'Thank you for your visit']);
    }
}
