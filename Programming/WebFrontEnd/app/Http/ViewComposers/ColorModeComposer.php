<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class ColorModeComposer
{
    public function compose(View $view)
    {   
        $colorMode = "dark";

        if(Session::has('ColorMode')){
            $colorMode = Session::get('ColorMode');
        }
        $compact = [
            'ColorMode' => $colorMode
        ];
        $view->with($compact);
    }
}
