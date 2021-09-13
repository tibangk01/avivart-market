<?php

namespace App\View\Components\Customers\Edit;

use Illuminate\View\Component;
use App\Models\Civility;
use App\Models\PersonRay;
use App\Models\Country;

class Person extends Component
{
    public $countries;

    public $civilities;

    public $personRays;

    public $customer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;

        $this->countries = Country::all()->pluck(null, 'id');

        $this->civilities = Civility::all()->pluck(null, 'id');

        $this->personRays = PersonRay::all()->pluck(null, 'id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customers.edit.person');
    }
}
