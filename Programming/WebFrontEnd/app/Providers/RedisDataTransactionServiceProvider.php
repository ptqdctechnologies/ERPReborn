<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class RedisDataTransactionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            [
                'Partials.app'
            ],
            'App\Http\ViewComposers\RedisDataTransactionComposer'
        );
    }
}
