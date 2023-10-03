<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // FUNCTION INDEX LOGIN 
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        if ($varAPIWebToken) {
            return view('Dashboard.index');
        } else {
            return view('Authentication.login');
        }
    }

    // FUNCTION FOR PRIVILAGE MENU USER 
    public function UserPrivilageMenuFunction()
    {
        $varAPIWebToken = Session::get('SessionLogin');
        
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'environment.general.session.keyList.getMenu', 
            'latest', 
            [
            ]
            );        

        $privilageMenu = $varData['data']['keyList'];

        return $privilageMenu;
    }

    // FUNCTION ROLE FUNCTION 
    public function GetRoleFunction($varAPIWebToken, $user_RefID, $branch_RefID)
    {
        $varDataRole = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'authentication.userPrivilege.getRole',
            'latest',
            [
                'parameter' => [
                    'user_RefID' => $user_RefID,
                    'branch_RefID' => $branch_RefID,
                    'dateTimeTZ' => null
                ]
            ]
        );

        return $varDataRole;
    }

    // FUNCTION GET BRANCH
    public function GetInstitutionBranchFunction($varAPIWebToken, $user_RefID)
    {
        $varDataBranch = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'authentication.userPrivilege.getInstitutionBranch',
            'latest',
            [
                'parameter' => [
                    'user_RefID' => $user_RefID,
                    'dateTimeTZ' => null
                ]
            ]
        );

        return $varDataBranch;
    }

    // FUNCTION FOR COUNT SUM OF WORKFLOW 
    public function SumDocumentWorkflowFunction($varAPIWebToken, $SessionWorkerCareerInternal_RefID)
    {
        if(isset($SessionWorkerCareerInternal_RefID)){
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'report.form.resume.master.getBusinessDocumentIssuanceDispositionCount', 
                'latest',
                [
                'parameter' => [
                    'recordID' => (int)$SessionWorkerCareerInternal_RefID    
                    ]
                ]
                );
                // $SumDocumentWorkflow = 0;
        
                // if ($varData['metadata']['HTTPStatusCode'] == 200) {
                //     $SumDocumentWorkflow = $varData['data']['0']['document']['content']['dataCount'];
                // }
                
                $SumDocumentWorkflow = $varData['data']['0']['document']['content']['dataCount'];

                return $SumDocumentWorkflow;
        }
        else{
            return 0;
        }
    }

    // FUNCTION BRANC AND ROLE USER 
    public function SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varBranchID, $varUserRoleID, $personName, $workerCareerInternal_RefID)
    {
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

        Session::put('SessionLogin', $varAPIWebToken);
        Session::put('SessionLoginName', $personName);
        Session::put('SessionWorkerCareerInternal_RefID', $workerCareerInternal_RefID);

        // CALL SUM DOCUMENT WORKFLOW FUNCTION 
        $SumDocumentWorkflow = $this->SumDocumentWorkflowFunction($varAPIWebToken, $workerCareerInternal_RefID);
        Session::put('SumDocumentWorkflow', $SumDocumentWorkflow);

        // CALL PRIVILAGE MENU FUNCTION 
        $UserPrivilageMenu = $this->UserPrivilageMenuFunction();
        Session::put('privilageMenu', $UserPrivilageMenu);

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
        $varBranchID = (int)$request->input('branch_name');
        $varUserRoleID = (int)$request->input('user_role');

        if ($varUserRoleID != 0) {
            
            $varAPIWebToken = $request->input('varAPIWebToken');
            $personName = $request->input('personName');
            $workerCareerInternal_RefID = $request->input('workerCareerInternal_RefID');

            return $this->SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varBranchID, $varUserRoleID, $personName, $workerCareerInternal_RefID);
            
        } else {

            $dataAwal = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $username,
                $password
            );

            if ($dataAwal['metadata']['HTTPStatusCode'] != 200) {

                $compact = [
                    'status_code' => 0,
                ];
                return response()->json($compact);

            } else {

                $varAPIWebToken = $dataAwal['data']['APIWebToken'];

                // CALL GET INSTRUCTION BRANCH FUNCTION 
                $varDataBranch = $this->GetInstitutionBranchFunction($varAPIWebToken,$dataAwal['data']['userIdentity']['user_RefID']);

                if ($varDataBranch['metadata']['HTTPStatusCode'] == 200) {
                    if (count($varDataBranch['data']) == 1) {
                    
                        // CALL GET ROLE FUNCTION 
                        $varDataRole = $this->GetRoleFunction($varAPIWebToken,$dataAwal['data']['userIdentity']['user_RefID'], $varDataBranch['data'][0]['sys_ID']);

                        // CALL SET LOGIN BRANCH AND USER ROLE FUNCTION
                        return $this->SetLoginBranchAndUserRoleFunction($varAPIWebToken, $varDataBranch['data'][0]['sys_ID'], $varDataRole['data'][0]['sys_ID'], $dataAwal['data']['userIdentity']['personName'], $dataAwal['data']['userIdentity']['workerCareerInternal_RefID']);

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

    // FUNCTION GET ROLE WHEN SELECT ROLE IN LOGIN PAGE 
    public function getRoleLogin(Request $request)
    {

        $user_RefID = (int)$request->input('user_RefID');
        $varBranchID = (int)$request->input('branch_name');
        $varAPIWebToken = $request->input('varAPIWebToken');
        
        // CALL GET ROLE FUNCTION         
        $varData = $this->GetRoleFunction($varAPIWebToken,$user_RefID, $varBranchID);

        $status = $varData['metadata']['HTTPStatusCode'];

        if ($status == '200') {
            return response()->json($varData['data']);
        } else {
            return response()->json($status);
        }
    }


    // FUNCTION LOGOUT 
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

    // FUNCTION FOR CHECKING LOGOUT 
    public function SessionCheckingLogout(Request $request)
    {

        $varAPIWebToken = $request->session()->has("SessionLogin");

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
        ];

        return response()->json($compact);
    }
}
