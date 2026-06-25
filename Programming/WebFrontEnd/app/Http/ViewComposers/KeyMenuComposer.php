<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class KeyMenuComposer
{
    public function compose(View $view)
    {
        $token = Session::get('SessionLogin');
        $branchRefID = Session::get('SessionBranch');
        $userRefID = Session::get('SessionUser_RefID');

        $cacheTTL = 28800; // 8 hrs
        $cacheKey = "menu_layout_{$branchRefID}_{$userRefID}";

        $cachedData = Helper_Redis::getValue(Helper_Environment::getUserSessionID_System(), $cacheKey);

        // Helper_Redis::delete($userRefID, $cacheKey);

        if ($cachedData === null) {
            $response = Helper_APICall::setCallAPIGateway(
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

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                Helper_Redis::setValue($userRefID, $cacheKey, json_encode([]), $cacheTTL);

                throw new \Exception('Failed to fetch Get Menu Layout');
            }

            Helper_Redis::setValue($userRefID, $cacheKey, json_encode($response['data']), $cacheTTL);
        }

        $view->with([
            'privilageMenu' => json_decode($cachedData, true)
        ]);
    }
}