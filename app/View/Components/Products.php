<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;

    public $instance;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($instance)
    {
        $this->products = Product::where('stock_quantity', '>', 0)->get();

        $this->instance = $instance;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.products');
    }
}
