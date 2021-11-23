<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderState;
use App\Models\Order;
use App\Models\OrderPayment as OrderPaymentModel;
use App\Models\Payment;
use App\Models\PaymentMode;

class OrderPayment extends Component
{
    public $paymentModes;
    
    public $orderStates;

    public $orders;

    public $order;

    public $amount;

    public function mount()
    {
        $this->orderStates = OrderState::all();

        $this->orders = Order::where('paid', false)->get();

        $this->paymentModes = PaymentMode::all();

        $this->amount = 0;
    }

    public function render()
    {
        return view('livewire.order-payment');
    }

    public function setAmount(int $value)
    {
        if ($value == 0) {
            return;
        }
        
        $this->order = Order::findOrFail($value);

        $this->amount = OrderPaymentModel::remnantPayment($this->order);
    }
}
