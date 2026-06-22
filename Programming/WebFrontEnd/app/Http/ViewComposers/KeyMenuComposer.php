<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class KeyMenuComposer
{
    public function compose(View $view)
    {
        $token = Session::get('SessionLogin');
        $branchRefID = Session::get('SessionBranch');
        $userRefID = Session::get("SessionUser_RefID");

        $menuLayout = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'authentication.userPrivilege.getMenuLayout',
            'latest',
            [
                'parameter' => [
                    'branch_RefID' => (int) $branchRefID,
                    'user_RefID' => (int) $userRefID
                ]
            ]
        );

        $compact = [
            'privilageMenu' => $menuLayout['data']
        ];

        $view->with($compact);
    }
}
