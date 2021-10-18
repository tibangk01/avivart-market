<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Agency;
use App\Models\SalePlace;
use App\Models\Purchase;
use App\Models\Order;

class Statbox extends Component
{
    public $agenciesCount;

    public $salePlacesCount;

    public $purchasesCount;

    public $ordersCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->agenciesCount = Agency::count();

        $this->salePlacesCount = SalePlace::count();

        $this->purchasesCount = Purchase::count();

        $this->ordersCount = Order::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.statbox');
    }
}
