<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class KeyMenuComposer
{
    public function compose(View $view)
    {

        $varDataRole = Session::get("SessionRoleLogin");
        $SessionUser_RefID =  Session::get('SessionUser_RefID');
        $varAPIWebToken = Session::get('SessionLogin');
        $varTTL = 32400; // 9 Jam

        for ($i = 0; $i < count($varDataRole); $i++) {

            if (Redis::get("RedisSetMenu" . $varDataRole[$i]) == null) {

                //SET REDIS MENU

                \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    "RedisSetMenu" . $varDataRole[$i],
                    true,
                    $varTTL
                );

                //GET REDIS MENU
                
                \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.sysConfig.getAppObject_MenuLayout',
                    'latest',
                    [
                        'parameter' => [
                            'recordID' => $SessionUser_RefID
                        ]
                    ],
                    false
                );
                
            }
        }

        $privilageMenu = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "RedisGetMenu" . $SessionUser_RefID
            ),
            true,
            $varTTL
        );

        // dd($privilageMenu);

        $compact = [
            'privilageMenu' => $privilageMenu
        ];
        $view->with($compact);
    }
}
