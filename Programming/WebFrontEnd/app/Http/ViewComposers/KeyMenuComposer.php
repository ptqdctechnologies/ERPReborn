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
        $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');
        $privilageMenu = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "RedisGetMenu" . $SessionWorkerCareerInternal_RefID
            ),
            true
        );

        // dd($privilageMenu);

        $MenuGroup = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "MenuGroup"
            ),
            true
        );

        // dd($MenuGroup);

        $compact = [
            'privilageMenu' => $privilageMenu,
            'MenuGroup' => $MenuGroup
        ];
        $view->with($compact);
    }
}
