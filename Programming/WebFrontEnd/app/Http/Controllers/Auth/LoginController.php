<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Authentication.login');
    }

    public function loginStore(Request $request)
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
            return response()->json($varData['data']['optionList']);
        }
    }


    public function loginStores(Request $request)
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

    public function login(Request $request)
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

            // $data = $request->session()->get('SessionLogin');

            // if($data != NULL){
            //     // unset($data['0']);
            //     // $newClass = array_values($data);
            //     // $request->session()->put('SessionLogin', $newClass);
            //     // $request->session()->push('SessionLogin', $varAPIWebToken);
            //     $request->session()->put('SessionLogin', $varAPIWebToken);
            // }
            // else{
            //     $request->session()->put('SessionLogin', $varAPIWebToken);
            // }
            $request->session()->put('SessionLogin', $varAPIWebToken);
            return redirect('/projectDashboard');
        }
        return redirect('/')->with('message', 'Login Failed');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with(['success' => 'Thank you for your visit']);
    }
}
