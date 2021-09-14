<?php

namespace App\Http\Livewire\Purchases;

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
        return view('livewire.purchases.products');
    }

    public function addToCart(Product $product)
    {
        ShoppingCart::instance('purchaseCart')->add($product, 1, array());

        $this->emit('purchases.cartAdded');
    }
}
