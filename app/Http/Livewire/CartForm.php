<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Cart as ShoppingCart;
use Gloudemans\Shoppingcart\CartItem;

class CartForm extends Component
{
    public $cartInstance;

    public $rowId;

    public $quantity;

    public function mount(string $cartInstance, CartItem $cartItem)
    {
        $this->fill([
            'cartInstance' => $cartInstance,
            'rowId' => $cartItem->rowId,
            'quantity' => $cartItem->qty,
        ]);
    }

    public function render()
    {
        return view('livewire.cart-form');
    }

    public function decrement()
    {
        $this->quantity--;

        ShoppingCart::instance($this->cartInstance)->update($this->rowId, $this->quantity);

        $this->emit($this->cartInstance . '.refresh');
    }

    public function increment()
    {
        $this->quantity++;

        ShoppingCart::instance($this->cartInstance)->update($this->rowId, $this->quantity);

        $this->emit($this->cartInstance . '.refresh');
    }
}
