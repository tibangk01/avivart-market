<?php

namespace App\Http\Livewire\Proformas;

use Livewire\Component;
use \Cart as ShoppingCart;

class Cart extends Component
{
    public $quantity;

    protected $listeners = [
        'proformas.cartAdded' => 'refresh',
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
        $cartContent = ShoppingCart::instance('proformaCart')->content();

        return view('livewire.proformas.cart', compact('cartContent'));
    }

    public function remove($row)
    {
        ShoppingCart::instance('proformaCart')->remove($row);

        return $this->refresh();
    }

    public function update($row)
    {
        ShoppingCart::instance('proformaCart')->update($row, $this->quantity);

        return $this->refresh();
    }

    public function truncate()
    {
        ShoppingCart::instance('proformaCart')->destroy();

        return $this->refresh();
    }

    public function checkout()
    {
        dd('ok');
    }
}
