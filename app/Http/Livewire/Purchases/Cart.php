<?php

namespace App\Http\Livewire\Purchases;

use Livewire\Component;
use \Cart as ShoppingCart;

class Cart extends Component
{
    public $quantity;

    protected $listeners = [
        'purchases.cartAdded' => 'refresh',
    ];

    public function mount()
    {
        
    }

    public function refresh()
    {
        return;
    }

    public function render()
    {
        $cartContent = ShoppingCart::instance('purchaseCart')->content();

        return view('livewire.purchases.cart', compact('cartContent'));
    }

    public function remove($row)
    {
        dd($row);

        ShoppingCart::instance('purchaseCart')->remove($row);

        return $this->refresh();
    }

    public function update($row)
    {
        ShoppingCart::instance('purchaseCart')->update($row, $this->quantity);

        return $this->refresh();
    }

    public function truncate()
    {
        ShoppingCart::instance('purchaseCart')->destroy();

        return $this->refresh();
    }

    public function checkout()
    {
        dd('ok');
    }
}
