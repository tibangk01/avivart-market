<?php

namespace App\View\Components\Customers\Create;

use Illuminate\View\Component;
use App\Models\Region;
use App\Models\PersonRay;
use App\Models\Country;
use App\Models\Market;

class Corporation extends Component
{
    public $countries;

    public $regions;
    
    public $personRays;

    public $markets;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->countries = Country::all()->pluck(null, 'id');
        
        $this->regions = Region::all()->pluck(null, 'id');

        $this->personRays = PersonRay::all()->pluck(null, 'id');

        $this->markets = Market::all()->pluck(null, 'id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customers.create.corporation');
    }
}
