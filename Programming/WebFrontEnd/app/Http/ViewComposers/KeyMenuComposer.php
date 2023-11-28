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
        $user_RefID = Session::get('SessionUser_RefID');
        $varBranchID = Session::get('SessionBranchID');
        $varUserRoleID = Session::get('SessionUserRoleID');
        
        $varKeyMenu =
        json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "KeyMenu" . $user_RefID . $varBranchID . $varUserRoleID
            ),
            true
        );

        $compact = [
            'privilageMenu' => $varKeyMenu
        ];

        $view->with($compact);


        // $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');

        // if(Redis::get("RedisGetMenu".$SessionWorkerCareerInternal_RefID) == null){
        //     $varTTL = 86400; // 24 Jam
        //     $varAPIWebToken = Session::get('SessionLogin');

        //     $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //         $varAPIWebToken,
        //         'environment.general.session.keyList.getMenu',
        //         'latest',
        //         []
        //     );

        //     //SET VALUE REDIS
        //     \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
        //         "RedisGetMenu".$SessionWorkerCareerInternal_RefID,
        //         json_encode($varData['data']['keyList']), 
        //          $varTTL
        //     );

        //     $compact = [
        //         'privilageMenu' => $varData['data']['keyList']
        //     ];

        //     $view->with($compact);
        // }
        // else{

        //     $privilageMenu = json_decode(\App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
        //             \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
        //             "RedisGetMenu".$SessionWorkerCareerInternal_RefID
        //             ),
        //             true
        //         );

        //     $compact = [
        //         'privilageMenu' => $privilageMenu
        //     ];
        //     $view->with($compact);
        // }
    }
}
