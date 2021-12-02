<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;
use App\Models\QuickSale;
use App\Models\Purchase;
use App\Models\Order;

class Statbox extends Component
{
    public $productsCount;
    public $servicesCount;

    public $quickSalesPaidCount;
    public $quickSalesUnpaidCount;

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
        $this->productsCount = Product::where('status', false)->count();
        $this->servicesCount = Product::where('status', true)->count();

        $this->quickSalesPaidCount = QuickSale::where('paid', true)->count();
        $this->quickSalesUnpaidCount = QuickSale::where('paid', false)->count();

        $this->purchasesPaidCount = Purchase::where('paid', true)->count();
        $this->purchasesUnpaidCount = Purchase::where('paid', false)->count();

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
