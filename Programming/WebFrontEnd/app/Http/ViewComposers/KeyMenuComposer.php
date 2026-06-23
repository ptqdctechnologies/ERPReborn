<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class KeyMenuComposer
{
    public function compose(View $view)
    {
        $token = Session::get('SessionLogin');
        $branchRefID = Session::get('SessionBranch');
        $userRefID = Session::get('SessionUser_RefID');

        $cacheKey = "menu_layout_{$branchRefID}_{$userRefID}";

        $menuLayout = Cache::store('redis')->remember(
            $cacheKey,
            now()->addMinutes(30),
            function () use ($token, $branchRefID, $userRefID) {
                return Helper_APICall::setCallAPIGateway(
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
            }
        );

        $view->with([
            'privilageMenu' => $menuLayout['data']
        ]);

        // MENGHAPUS CACHE MENU LAYOUT
        // Cache::store('redis')->forget(
        //     "menu_layout_{$branchRefID}_{$userRefID}"
        // );
    }
}