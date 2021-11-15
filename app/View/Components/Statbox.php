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

    public $purchasesPaidCount;

    public $purchasesUnpaidCount;

    public $ordersPaidCount;

    public $ordersUnpaidCount;

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

        $this->purchasesPaidCount = Purchase::where('paid', true)->count();

        $this->purchasesUnpaidCount = Purchase::where('paid', false)->count();

        $this->ordersCount = Order::count();

        $this->ordersPaidCount = Order::where('paid', true)->count();

        $this->ordersUnpaidCount = Order::where('paid', false)->count();
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
