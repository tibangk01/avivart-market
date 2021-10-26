<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Provider;
use App\Models\Customer;
use App\Models\Vat;
use App\Models\Discount;
use App\Models\OrderState;

class Cart extends Component
{
    public $instance;

    public $providers;

    public $customers;

    public $vats;

    public $discounts;

    public $orderStates;

    public $routeName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($instance)
    {
        $this->instance = $instance;

        $this->providers = Provider::all()->pluck(null, 'id');

        $this->customers = Customer::all()->pluck(null, 'id');

        $this->vats = Vat::all()->pluck(null, 'id');

        $this->discounts = Discount::all()->pluck(null, 'id');

        $this->orderStates = OrderState::all()->pluck(null, 'id');

        switch ($this->instance) {
            case 'purchase':
                $this->routeName = 'purchase.store';
                break;

            case 'proforma':
                $this->routeName = 'proforma.store';
                break;

            case 'order':
                $this->routeName = 'order.store';
                break;
            
            default:
                $this->routeName = 'cart.checkout';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart');
    }
}
