<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use \Cart as ShoppingCart;

class Cart extends Component
{
    public $quantity;

    protected $listeners = [
        'orders.cartAdded' => 'refresh',
    ];

    public function mount()
    {
        $this->fill([
            'quantity' => 1,
        ]);
    }

    public function refresh()
    {
        return;
    }

    public function render()
    {
        $cartContent = ShoppingCart::instance('orderCart')->content();

        return view('livewire.orders.cart', compact('cartContent'));
    }

    public function remove($row)
    {
        ShoppingCart::instance('orderCart')->remove($row);

        return $this->refresh();
    }

    public function update($row)
    {
        ShoppingCart::instance('orderCart')->update($row, $this->quantity);

        return $this->refresh();
    }

    public function truncate()
    {
        ShoppingCart::instance('orderCart')->destroy();

        return $this->refresh();
    }

    public function checkout()
    {
        dd('ok');
    }
}
