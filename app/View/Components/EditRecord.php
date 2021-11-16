<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditRecord extends Component
{
    public $routeName;

    public $routeParam;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $routeName, int $routeParam)
    {
        $this->routeName = $routeName;

        $this->routeParam = $routeParam;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-record');
    }
}
