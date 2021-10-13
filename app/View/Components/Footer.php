<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Footer extends Component
{
    public $staffStatusBarInfo = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->staffStatusBarInfo = session('staff')->cash_register_transactions()
        ->orderBy('id', 'DESC')
        ->first();

        session()->put('staffStatusBarInfo', $this->staffStatusBarInfo);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
