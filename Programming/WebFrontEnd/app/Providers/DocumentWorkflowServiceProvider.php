<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\CountDocumentProcessComposer;

class DocumentWorkflowServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('Partials.sidebar', CountDocumentProcessComposer::class);
    }
}