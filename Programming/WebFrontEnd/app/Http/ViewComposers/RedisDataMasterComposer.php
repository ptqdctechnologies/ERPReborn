<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class RedisDataMasterComposer
{
    public function compose(View $view)
    {
        if(Redis::get("RedisDataMaster") == null){
            $varTTL = 86400; // 24 Jam
            $varAPIWebToken = Session::get('SessionLogin');

            \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'redisDataMaster.redisMaster.getRedisDataMaster',
                'latest',
                [
                    'parameter' => null
                ],
                false
            );

            //SET VALUE REDIS
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::setValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), 
                "RedisDataMaster", 
                "true",
                 $varTTL
            );

            $view->with(true);
        }
    }
}
