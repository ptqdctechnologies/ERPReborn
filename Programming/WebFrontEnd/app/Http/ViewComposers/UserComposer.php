<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Session;

class UserComposer
{
    public function compose(View $view)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'environment.general.session.keyList.getMenu', 
            'latest', 
            [
            ]
            );        

        $compact = [
            'privilageMenu' => $varData['data']['keyList']
        ];
        
        $view->with($compact);
    }
}