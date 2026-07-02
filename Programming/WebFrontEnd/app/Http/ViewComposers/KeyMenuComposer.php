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

        $cacheTTL = 28800; // 8 jam
        $cacheKey = "menu_layout_{$branchRefID}_{$userRefID}";
        $redisKey = Helper_Environment::getUserSessionID_System();

        $cachedData = Helper_Redis::getValue($redisKey, $cacheKey);

        if ($cachedData === null) {
            $response = Helper_APICall::setCallAPIGateway(
                $redisKey,
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
                throw new \Exception('Failed to fetch Get Menu Layout');
            }

            // Simpan hasil API ke variabel dan Redis
            $cachedData = json_encode($response['data']);

            Helper_Redis::setValue(
                $redisKey,
                $cacheKey,
                $cachedData,
                $cacheTTL
            );

            // Helper_Redis::delete($userRefID, $cacheKey);
        }

        $view->with([
            'privilageMenu' => json_decode($cachedData, true) ?? []
        ]);
    }
}