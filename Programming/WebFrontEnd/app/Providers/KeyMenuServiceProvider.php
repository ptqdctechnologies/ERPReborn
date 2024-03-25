<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class KeyMenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            [
                'Partials.sidebar'
            ],
            'App\Http\ViewComposers\KeyMenuComposer'
        );
    }
}