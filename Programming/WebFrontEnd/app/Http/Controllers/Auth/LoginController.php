<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Cache, Log, Redis, Session};
use App\Helpers\ZhtHelper\{Cache\Helper_Redis, System\Helper_Environment, System\FrontEnd\Helper_APICall};

class LoginController extends Controller
{
    private const SESSION_KEYS = [
        'LOGIN'         => 'SessionLogin',
        'DEPT_NAME'     => 'SessionOrganizationalDepartmentName',
        'LOGIN_NAME'    => 'SessionLoginName',
        'WORKER_REF_ID' => 'SessionWorkerCareerInternal_RefID',
        'USER_REF_ID'   => 'SessionUser_RefID',
        'ROLE_LOGIN'    => 'SessionRoleLogin'
    ];

    public function index()
    {
        try {
            return Session::get(self::SESSION_KEYS['LOGIN']) 
                ? view('Dashboard.index')
                : view('Authentication.login');
        } catch (\Throwable $th) {
            Log::error("Error in index: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    private function getRedisData($prefix, $user_RefID)
    {
        $sessionID  = Helper_Environment::getUserSessionID_System();
        $redisKey   = "{$prefix}{$user_RefID}";
        
        return json_decode(Helper_Redis::getValue($sessionID, $redisKey), true) ?? [];
    }

    public function GetRoleFunction($varBranchID, $user_RefID)
    {
        try {
            return $this->getRedisData("Role", $user_RefID);
        } catch (\Throwable $th) {
            Log::error("Error in GetRoleFunction: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function GetInstitutionBranchFunction($user_RefID)
    {
        try {
            return $this->getRedisData("Branch", $user_RefID);
        } catch (\Throwable $th) {
            Log::error("Error in GetInstitutionBranchFunction: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varBranchID, $varUserRoleID, $personName, $workerCareerInternal_RefID, $user_RefID, $organizationalDepartmentName)
    {
        try {
            $sessionID  = Helper_Environment::getUserSessionID_System();
            $checking   = Helper_APICall::setCallAPIGateway(
                $sessionID,
                $varAPIWebToken,
                'authentication.general.setLoginBranchAndUserRole',
                'latest',
                compact('varBranchID', 'varUserRoleID')
            );

            if ($checking['metadata']['HTTPStatusCode'] === 200) {
                $this->setSessionData([
                    self::SESSION_KEYS['LOGIN'] => $varAPIWebToken,
                    self::SESSION_KEYS['DEPT_NAME'] => $organizationalDepartmentName,
                    self::SESSION_KEYS['LOGIN_NAME'] => $personName,
                    self::SESSION_KEYS['WORKER_REF_ID'] => $workerCareerInternal_RefID,
                    self::SESSION_KEYS['USER_REF_ID'] => $user_RefID,
                ]);

                Session::push(self::SESSION_KEYS['ROLE_LOGIN'], $varUserRoleID);
                
                return response()->json(['status_code' => 1]);
            }
            
            return response()->json(['status_code' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 0]);
        }
    }

    private function setSessionData(array $data)
    {
        foreach ($data as $key => $value) {
            Session::put($key, $value);
        }
    }

    public function loginStore(Request $request)
    {
        try {
            $varUserRoleID = (int)$request->input('role_id');

            if ($varUserRoleID !== 0) {
                return $this->handleExistingUserLogin($request);
            }

            return $this->handleNewUserLogin($request);
        } catch (\Throwable $th) {
            return response()->json(['status_code' => 0]);
        }
    }

    private function handleExistingUserLogin(Request $request)
    {
        $data = $request->only(
            [
                'varAPIWebToken', 
                'branch_id', 
                'role_id', 
                'personName',
                'workerCareerInternal_RefID',
                'user_RefID',
                'organizationalDepartmentName'
            ]
        );
        
        return $this->SetLoginBranchAndUserRoleFunction(
            $data['varAPIWebToken'], 
            (int)$data['branch_id'], 
            (int)$data['role_id'],
            $data['personName'], 
            $data['workerCareerInternal_RefID'],
            $data['user_RefID'],
            $data['organizationalDepartmentName']
        );
    }

    private function handleNewUserLogin(Request $request)
    {
        $credentials    = $request->only(['username', 'password']);
        $sessionID      = Helper_Environment::getUserSessionID_System();
        
        $dataAwal = Helper_APICall::setCallAPIAuthentication(
            $sessionID,
            $credentials['username'],
            $credentials['password']
        );

        if ($dataAwal['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json(['status_code' => 0]);
        }

        $userIdentity   = $dataAwal['data']['userIdentity'];
        $varDataBranch  = $this->GetInstitutionBranchFunction($userIdentity['user_RefID']);

        if (count($varDataBranch) === 1) {
            return $this->handleSingleBranchLogin($dataAwal, $varDataBranch, $userIdentity);
        }

        return $this->handleMultipleBranchLogin($dataAwal, $varDataBranch, $userIdentity);
    }

    private function handleSingleBranchLogin($dataAwal, $varDataBranch, $userIdentity)
    {
        $varDataRole = $this->GetRoleFunction($varDataBranch[0]['Sys_ID'], $userIdentity['user_RefID']);

        foreach ($varDataRole as $role) {
            Session::push(self::SESSION_KEYS['ROLE_LOGIN'], $role['Sys_ID']);
        }

        $this->setSessionData([
            self::SESSION_KEYS['LOGIN'] => $dataAwal['data']['APIWebToken'],
            self::SESSION_KEYS['DEPT_NAME'] => $userIdentity['organizationalDepartmentName'],
            self::SESSION_KEYS['LOGIN_NAME'] => $userIdentity['personName'],
            self::SESSION_KEYS['WORKER_REF_ID'] => $userIdentity['workerCareerInternal_RefID'],
            self::SESSION_KEYS['USER_REF_ID'] => $userIdentity['user_RefID'],
        ]);

        return response()->json(['status_code' => 1]);
    }

    private function handleMultipleBranchLogin($dataAwal, $varDataBranch, $userIdentity)
    {
        return response()->json([
            'status_code'                   => 2,
            'data'                          => $varDataBranch,
            'user_RefID'                    => $userIdentity['user_RefID'],
            'varAPIWebToken'                => $dataAwal['data']['APIWebToken'],
            'personName'                    => $userIdentity['personName'],
            'workerCareerInternal_RefID'    => $userIdentity['workerCareerInternal_RefID'],
            'organizationalDepartmentName'  => $userIdentity['organizationalDepartmentName']
        ]);
    }

    public function getRoleLogin(Request $request)
    {
        try {
            $varBranchID    = (int)$request->input('branch_id');
            $user_RefID     = (int)$request->input('user_RefID');
            
            $varData = $this->GetRoleFunction($varBranchID, $user_RefID);
            
            return response()->json([
                'length'    => count($varData),
                'data'      => $varData,
                'status'    => count($varData) > 0 ? 200 : 401
            ]);
        } catch (\Throwable $th) {
            Log::error("Error in getRoleLogin: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function logout(Request $request)
    {
        try {
            $varAPIWebToken = Session::get(self::SESSION_KEYS['LOGIN']);
            Redis::del("ERPReborn::APIWebToken::" . $varAPIWebToken);
            
            $message = $request->input('message') === "Session_Expired" 
                ? ['error' => 'Your session expired']
                : ['success' => 'Thank you for your visit'];

            Cache::flush();
            Session::flush();
            
            return redirect('/')->with($message);
        } catch (\Throwable $th) {
            Log::error("Error in logout: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function SessionCheckingLogout()
    {
        try {
            return response()->json([
                'varAPIWebToken' => Session::has(self::SESSION_KEYS['LOGIN'])
            ]);
        } catch (\Throwable $th) {
            Log::error("Error in SessionCheckingLogout: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }

    public function FlushCache()
    {
        Cache::flush();
        Session::flush();
        Redis::flushDB();
        return redirect()->back();
    }
}