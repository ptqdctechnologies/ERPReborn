<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class LoginService
{
    public function login($username, $password) 
    {
        return Helper_APICall::setCallAPIAuthentication(
            Helper_Environment::getUserSessionID_System(),
            $username, 
            $password,
            [
                'branch_RefID'      => 'AUTO',
                'userRole_RefID'    => 'AUTO'
            ]
        );
        // return Helper_APICall::setCallAPIAuthentication(
        //     Helper_Environment::getUserSessionID_System(),
        //     $username, 
        //     $password
        // );
    }

    public function setLoginBranchAndUserRole($sessionToken, $branchRefID, $userRoleRefID) 
    {
        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'authentication.general.setLoginBranchAndUserRole',
            'latest', 
            [
            'branchID'      => (int) $branchRefID,
            'userRoleID'    => (int) $userRoleRefID
            ]
        );
    }

    public function getInstitutionBranch($sessionToken, $userRefID) 
    {
        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'authentication.userPrivilege.getInstitutionBranch',
            'latest', 
            [
            'parameter' => [
                'user_RefID' => (int) $userRefID,
                'dateTimeTZ' => null
                ]
            ]
        );
    }

    public function getRole($sessionToken, $userRefID, $branchRefID)
    {
        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'authentication.userPrivilege.getRole', 
            'latest', 
            [
            'parameter' => [
                'user_RefID'    => (int) $userRefID,
                'branch_RefID'  => (int) $branchRefID,
                'dateTimeTZ'    => null
                ]
            ]
        );
    }
}