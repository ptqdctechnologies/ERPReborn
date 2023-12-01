<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // FUNCTION INDEX LOGIN 
    public function index(Request $request)
    {
        // dd(Redis::keys("*"));
        // dd(Redis::flushDB());    
        $varAPIWebToken = Session::get('SessionLogin');
        if ($varAPIWebToken) {
            return view('Dashboard.index');
        } else {
            return view('Authentication.login');
        }
    }

    // FUNCTION ROLE FUNCTION 
    public function GetRoleFunction($varBranchID, $user_RefID)
    {

        $varDataRole = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Role" . $user_RefID
            ),
            true
        );
        if ($varDataRole['CountBranch'] == 1) {
            return $varDataRole['Data'];
        } else {
            $num = 0;
            $filteredArray = [];
            for ($i = 0; $i < count($varDataRole['Data']); $i++) {
                if ($varDataRole['Data'][$i]['Branch_ID'] == $varBranchID) {
                    $filteredArray[$num] = $varDataRole['Data'][$i];
                    $num++;
                }
            }
            if ($filteredArray != []) {
                Session::put("SessionCompanyName", $filteredArray[0]['BranchName']);
            }

            return $filteredArray;
        }
    }

    // FUNCTION GET BRANCH
    public function GetInstitutionBranchFunction($user_RefID)
    {
        $varDataBranch = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Branch" . $user_RefID
            ),
            true
        );
        return $varDataBranch;
    }

    // FUNCTION BRANC AND ROLE USER 
    public function SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varBranchID, $varUserRoleID, $personName, $workerCareerInternal_RefID, $user_RefID, $organizationalDepartmentName)
    {
        // if (Redis::get("KeyMenu" . $user_RefID . $varBranchID . $varUserRoleID) == null) {
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
        // }

        Session::put('SessionLogin', $varAPIWebToken);
        Session::put('SessionOrganizationalDepartmentName', $organizationalDepartmentName);
        Session::put('SessionLoginName', $personName);
        Session::put('SessionWorkerCareerInternal_RefID', $workerCareerInternal_RefID);
        // Session::put('SessionCountMyDocument', $this->GetCountMyDocument());


        $compact = [
            'status_code' => 1,
        ];

        return response()->json($compact);
    }

    // FUNCTION STORE WHEN CLICK SUBMIT BUTTON IN PAGE 
    public function loginStore(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $varBranchID = (int)$request->input('branch_id');
        $varUserRoleID = (int)$request->input('role_id');


        if ($varUserRoleID != 0) {

            $varAPIWebToken = $request->input('varAPIWebToken');
            $personName = $request->input('personName');
            $user_RefID = $request->input('user_RefID');
            $workerCareerInternal_RefID = $request->input('workerCareerInternal_RefID');
            $organizationalDepartmentName = $request->input('organizationalDepartmentName');

            return $this->SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varBranchID, $varUserRoleID, $personName, $workerCareerInternal_RefID, $user_RefID, $organizationalDepartmentName);
        } else {

            $dataAwal = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $username,
                $password
            );

            // dd(Redis::keys("*"));
            // dd(json_decode(Redis::get("nama"), true));
            // dd(Redis::get("nama"));
            // dd(Redis::keys("*"));
            // dd($dataAwal);

            if ($dataAwal['metadata']['HTTPStatusCode'] != 200) {

                $compact = [
                    'status_code' => 0,
                ];
                return response()->json($compact);
            } else {

                $varAPIWebToken = $dataAwal['data']['APIWebToken'];

                // CALL GET INSTRUCTION BRANCH FUNCTION 
                $varDataBranch = $this->GetInstitutionBranchFunction($dataAwal['data']['userIdentity']['user_RefID']);

                if (count($varDataBranch) == 1) {

                    // CALL GET ROLE FUNCTION 
                    $varDataRole = $this->GetRoleFunction($varDataBranch[0]['Sys_ID'], $dataAwal['data']['userIdentity']['user_RefID']);

                    // CALL SET LOGIN BRANCH AND USER ROLE FUNCTION
                    return $this->SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varDataBranch[0]['Sys_ID'], $varDataRole[0]['Sys_ID'], $dataAwal['data']['userIdentity']['personName'], $dataAwal['data']['userIdentity']['workerCareerInternal_RefID'], $dataAwal['data']['userIdentity']['user_RefID'], $dataAwal['data']['userIdentity']['organizationalDepartmentName']);
                } else {

                    if ($varUserRoleID == 0) {

                        $compact = [
                            'status_code' => 2,
                            'data' => $varDataBranch,
                            'user_RefID' => $dataAwal['data']['userIdentity']['user_RefID'],
                            'varAPIWebToken' => $varAPIWebToken,
                            'personName' => $dataAwal['data']['userIdentity']['personName'],
                            'workerCareerInternal_RefID' => $dataAwal['data']['userIdentity']['workerCareerInternal_RefID'],
                            'organizationalDepartmentName' => $dataAwal['data']['userIdentity']['organizationalDepartmentName']
                        ];
                        return response()->json($compact);
                    }
                }
            }
        }
    }

    // FUNCTION GET ROLE WHEN SELECT ROLE IN LOGIN PAGE 
    public function getRoleLogin(Request $request)
    {
        $varBranchID = (int)$request->input('branch_id');
        $user_RefID = (int)$request->input('user_RefID');

        // CALL GET ROLE FUNCTION         
        $varData = $this->GetRoleFunction($varBranchID, $user_RefID);

        if (count($varData) > 0) {

            $compact = [
                'length' => count($varData),
                'data' => $varData,
                'status' => 200
            ];

            return response()->json($compact);
        } else {

            $compact = [
                'status' => 401
            ];

            return response()->json($compact);
        }
    }

    // FUNCTION LOGOUT 
    public function logout(Request $request)
    {
        // DELETE API WEB TOKEN FROM REDIS
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
        // Redis::flushDB();

        return redirect('/')->with([$status => $message]);
    }

    // FUNCTION FOR CHECKING LOGOUT 
    public function SessionCheckingLogout()
    {

        $varAPIWebToken = Session::has("SessionLogin");

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
        ];

        return response()->json($compact);
    }

    public function FlushCache()
    {

        Cache::flush();
        Session::flush();
        Redis::flushDB();
        return redirect()->back();
    }
}
