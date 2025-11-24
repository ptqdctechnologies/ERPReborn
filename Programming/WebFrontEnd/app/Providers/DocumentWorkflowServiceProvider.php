<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\CountDocumentProcessComposer;
use App\Http\ViewComposers\DocumentWorkflowComposer;

class DocumentWorkflowServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('Partials.sidebar', CountDocumentProcessComposer::class);
        View::composer('Dashboard.index', DocumentWorkflowComposer::class);
    }
}