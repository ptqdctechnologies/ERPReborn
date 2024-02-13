<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ColorModeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            [
                'Partials.sidebar',
                'Dashboard.index'
            ],
            'App\Http\ViewComposers\ColorModeComposer'
        );
    }
}