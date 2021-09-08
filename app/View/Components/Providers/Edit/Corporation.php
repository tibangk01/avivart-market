<?php

namespace App\View\Components\Providers\Edit;

use Illuminate\View\Component;
use App\Models\Region;
use App\Models\PersonRay;

class Corporation extends Component
{
    public $regions;
    
    public $personRays;

    public $provider;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($provider)
    {
        $this->provider = $provider;

        $this->regions = Region::all()->pluck(null, 'id');

        $this->personRays = PersonRay::all()->pluck(null, 'id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.providers.edit.corporation');
    }
}
