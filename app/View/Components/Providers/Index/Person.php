<?php

namespace App\View\Components\Providers\Index;

use Illuminate\View\Component;
use App\Models\Provider;

class Person extends Component
{
    public $people;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->people = Provider::where('person_type_id', 2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.providers.index.person');
    }
}
