<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Using class based composers...
        View::composer(
            ['Partials.sidebar', 'Advance.Advance.Functions.Menu.MenuAdvanceRequest', 'Advance.Advance.Functions.Menu.MenuAdvanceSettlement', 'Advance.BusinessTrip.Functions.Menu.MenuBusinessTripRequest', 'Advance.BusinessTrip.Functions.Menu.MenuBusinessTripSettlement', 'Purchase.Purchase.Functions.Menu.MenuPurchaseOrder', 'Purchase.PurchaseRequisition.Functions.Menu.MenuProcReq'],
            'App\Http\ViewComposers\UserComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}