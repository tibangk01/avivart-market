<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\PaymentMode;

class PurchasePayment extends Component
{
    public $paymentModes;

    public $purchases;

    public $purchase;

    public $amount;

    public function mount()
    {
        $this->purchases = Purchase::where('paid', false)->get();

        $this->paymentModes = PaymentMode::all();
    }

    public function render()
    {
        return view('livewire.purchase-payment');
    }

    public function setAmount(int $value)
    {
        $this->purchase = Purchase::findOrFail($value);

        $this->amount = $this->purchase->totalTTC();
    }
}
