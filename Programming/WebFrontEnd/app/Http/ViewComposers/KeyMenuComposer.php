<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class KeyMenuComposer
{
    public function compose(View $view)
    {
        $getMenu = Cache::remember('getMenu', 480, function () {

            $varAPIWebToken = Session::get('SessionLogin');

            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'environment.general.session.keyList.getMenu',
                'latest',
                []
            );

            $compact = [
                'privilageMenu' => $varData['data']['keyList']
            ];

            return $compact;
        });

        $view->with($getMenu);
    }
}
