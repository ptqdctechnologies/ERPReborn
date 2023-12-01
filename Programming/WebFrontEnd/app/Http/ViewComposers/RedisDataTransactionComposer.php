<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class RedisDataTransactionComposer
{
    public function compose(View $view)
    {
        // if(Redis::get("RedisDataTransaction") == null){
        //     $varTTL = 86400; // 24 Jam
        //     $varAPIWebToken = Session::get('SessionLogin');

        //     \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //         $varAPIWebToken,
        //         'redisDataTransaction.redisTransaction.getRedisDataTransaction',
        //         'latest',
        //         [
        //             'parameter' => null
        //         ],
        //         false
        //     );

        //     //SET VALUE REDIS
        //     \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
        //         \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
        //         "RedisDataTransaction", 
        //         "true",
        //          $varTTL
        //     );

        //     $view->with(true);
        // }
    }
}
