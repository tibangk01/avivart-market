<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\QuickSale;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define can ( Create, Update and Delete ) ProductPurchase */
        Gate::define('cudProductPurchase', function(User $user, Purchase $purchase) {
           return !$purchase->paid;
        });

        /* define can ( Create, Update and Delete ) ProductOrder */
        Gate::define('cudProductOrder', function(User $user, Order $order) {
           return !$order->paid;
        });

        /* define can ( Create, Update and Delete ) QuickSale */
        Gate::define('cudQuickSale', function(User $user, QuickSale $quickSale) {
           return !$quickSale->paid;
        });
    }
}
