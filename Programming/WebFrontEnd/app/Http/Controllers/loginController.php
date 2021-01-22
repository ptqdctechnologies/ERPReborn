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
        echo $username = $request->input('username');
        echo $password = $request->input('password');die;
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );

        dd($varData);
        // if($varData){
        //     return view('Layouts.dashboard');
        // }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}