<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    protected $token, $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    // FUNCTION INDEX LOGIN 
    public function index(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');

            if ($varAPIWebToken) {
                return view('Dashboard.index');
            } else {
                return view('Authentication.login');
            }
        } catch (\Throwable $th) {
            Log::error("Error at Index LoginController: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    private function performLogin($username, $password)
    {
        $response = $this->loginService->login($username, $password);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            throw new \Exception('Login failed');
        }

        $loginData = $response['data'];

        $this->token = $loginData['APIWebToken'];

        return $loginData;
    }

    private function fetchInstitutionBranch($userRefID)
    {
        $response = $this->loginService->getInstitutionBranch($this->token, $userRefID);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            throw new \Exception('Failed to fetch institution branch');
        }

        return $response['data'];
    }

    private function fetchUserRole($userRefID, $institutionBranchID)
    {
        $response = $this->loginService->getRole($this->token, $userRefID, $institutionBranchID);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            throw new \Exception('Failed to fetch user role');
        }

        return $response['data'];
    }

    private function setLoginBranchAndRole($branchID, $roleID)
        {
        $response = $this->loginService->setLoginBranchAndUserRole($this->token, $branchID, $roleID);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            throw new \Exception('Failed to set login branch and role');
        }

        return $response['data'];
    }

    private function storeSessionData(array $loginData, array $roleData)
    {
        $userIdentity = $loginData['userIdentity'];
        Session::put('SessionLogin', $loginData['APIWebToken']);
        Session::put('SessionOrganizationalDepartmentName', $userIdentity['organizationalDepartmentName']);
        Session::put('SessionLoginName', $userIdentity['personName']);
        Session::put('SessionWorkerCareerInternal_RefID', $userIdentity['workerCareerInternal_RefID']);
        Session::put('SessionUser_RefID', $userIdentity['user_RefID']);

        $userRole = array_column($roleData, 'sys_ID');
        Session::put('SessionRoleLogin', $userRole);
    }

    // FUNCTION STORE WHEN CLICK SUBMIT BUTTON IN PAGE 
    public function loginStore(Request $request) 
    {
        try {
            $username   = $request->input('username');
            $password   = $request->input('password');

            $loginData = $this->performLogin($username, $password);
            $userRefID = $loginData['userIdentity']['user_RefID'];

            $institutionBranchData = $this->fetchInstitutionBranch($userRefID);
            $institutionBranchID   = $institutionBranchData[0]['sys_ID'];

            $roleData = $this->fetchUserRole($userRefID, $institutionBranchID);
            $roleSysID = $roleData[0]['sys_ID'];

            $setLoginData = $this->setLoginBranchAndRole($institutionBranchID, $roleSysID);

            $this->storeSessionData($loginData, $roleData);

            return response()->json([
                'responseDataLogin'                     => $loginData['userIdentity'], 
                'responseDataInstitutionBranch'         => $institutionBranchData,
                'responseDataRole'                      => $roleData,
                'responseDataSetLoginBranchAndUserRole' => $setLoginData
            ]);

        } catch (\Throwable $th) {
            Log::error("Error at LoginStore: " . $th->getMessage());

            $compact = [
                'statusCode'    => 500,
                'message'       => 'Terjadi kesalahan saat memproses login. Silakan coba lagi nanti.'
            ];

            return response()->json($compact);
        }
    }

    // FUNCTION LOGOUT 
    public function logout(Request $request)
    {
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            Redis::del("ERPReborn::APIWebToken::" . $varAPIWebToken);

            $status = "success";
            $message = 'Thank you for your visit';
            if ($request->input('message') == "Session_Expired") {
                $message = 'Your session expired';
                $status = "error";
            }

            Cache::flush();
            Session::flush();
            Redis::flushDB();

            return redirect('/')->with([$status => $message]);
        } catch (\Throwable $th) {
            Log::error("Error at logout: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // FUNCTION FOR CHECKING LOGOUT 
    public function SessionCheckingLogout()
    {
        try {
            $varAPIWebToken = Session::has("SessionLogin");

            $compact = [
                'varAPIWebToken' => $varAPIWebToken,
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at SessionCheckingLogout: " . $th->getMessage());

            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    // FUNCTION REMOVE CACHE, SESSION, REDIS
    public function FlushCache()
    {
        Cache::flush();
        Session::flush();
        Redis::flushDB();

        return redirect()->back();
    }
}