<?php

namespace App\Http\Livewire\Proformas;

use Livewire\Component;
use App\Models\Product;
use \Cart as ShoppingCart;

class Products extends Component
{
    public $products;
    
    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.proformas.products');
    }

    public function addToCart(Product $product)
    {
        ShoppingCart::instance('proformaCart')->add($product, 1, array());

        $this->emit('proformas.cartAdded');
    }
}
