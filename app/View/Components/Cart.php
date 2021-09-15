<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Provider;
use App\Models\Customer;
use App\Models\Vat;
use App\Models\Discount;

class Cart extends Component
{
    public $instance;

    public $providers;

    public $customers;

    public $vats;

    public $discounts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($instance)
    {
        $this->instance = $instance;

        $this->providers = Provider::all();

        $this->customers = Customer::all();

        $this->vats = Vat::all()->pluck(null, 'id');

        $this->discounts = Discount::all()->pluck(null, 'id');
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
