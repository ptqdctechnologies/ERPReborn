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
        // $SessionUser_RefID =  Session::get('SessionUser_RefID');
        // $privilageMenu = json_decode(
        //     \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //         "RedisGetMenu" . $SessionUser_RefID
        //     ),
        //     true
        // );

        // // dd($privilageMenu);

        // $compact = [
        //     'privilageMenu' => $privilageMenu
        // ];
        // $view->with($compact);
    }
}
