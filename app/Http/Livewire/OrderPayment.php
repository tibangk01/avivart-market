<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderState;
use App\Models\Order;

class OrderPayment extends Component
{
    public $orderStates;

    public $orders;

    public $order;

    public $amount;

    public function mount()
    {
        $this->orderStates = OrderState::all();

        $this->orders = Order::where('paid', false)->get();
    }

    public function render()
    {
        return view('livewire.order-payment');
    }

    public function setAmount(int $value)
    {
        $this->order = Order::findOrFail($value);

        $this->amount = $this->order->totalTTC();
    }
}
