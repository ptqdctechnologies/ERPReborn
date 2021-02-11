<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
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
        if($varData['metadata']['HTTPStatusCode'] == '401'){
            return response()->json($varData['metadata']['HTTPStatusCode']);
        }
        else{
            return response()->json($varData['data']['optionList']);
            // return view('Layouts.dashboard');
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
        if($varData['metadata']['HTTPStatusCode'] == '401'){
            return response()->json($varData['metadata']['HTTPStatusCode']);
        }
        else{
            return response()->json($varData['data']['optionList'][0]['userRole']);
            // return view('Layouts.dashboard');
        }
    }
    public function loginStorex(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        if($varData['metadata']['HTTPStatusCode'] == '401'){
            return response()->json($varData['metadata']['HTTPStatusCode']);
        }
        else{
            return response()->json($varData['metadata']['HTTPStatusCode']);
        }
    }

    public function logout(Request $request) {
        // Auth::logout();
        return redirect('/');
      }
}