<?php

namespace App\View\Components\Customers\Printing;

use Illuminate\View\Component;

class Person extends Component
{
    public $customer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customers.printing.person');
    }
}
