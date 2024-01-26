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
        // $varAPIWebToken = Session::get('SessionLogin');
        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'environment.general.session.keyList.getMenu', 
        //     'latest', 
        //     [
        //     ]
        //     );
        // dd($varData);
        
        $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');
        $privilageMenu = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "RedisGetMenu" . $SessionWorkerCareerInternal_RefID
            ),
            true
        );

        $compact = [
            'privilageMenu' => $privilageMenu
        ];
        $view->with($compact);
    }
}
