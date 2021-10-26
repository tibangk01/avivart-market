<?php

namespace App\View\Components\Providers\Printing;

use Illuminate\View\Component;

class Person extends Component
{
    public $provider;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.providers.printing.person');
    }
}
