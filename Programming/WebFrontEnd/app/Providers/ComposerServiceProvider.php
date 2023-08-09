<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            [
                'Partials.sidebar', 
                'Advance.Advance.Functions.Menu.MenuAdvanceRequest', 
                'Advance.Advance.Functions.Menu.MenuAdvanceSettlement', 
                'Advance.BusinessTrip.Functions.Menu.MenuBusinessTripRequest', 
                'Advance.BusinessTrip.Functions.Menu.MenuBusinessTripSettlement', 
                'Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder', 
                'Purchase.PurchaseRequisition.Functions.Menu.MenuProcReq', 
                'Documents.Functions.Menu.MenuMyDocument'
            ],
            'App\Http\ViewComposers\UserComposer'
        );
    }
}