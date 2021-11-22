<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\PurchasePayment as PurchasePaymentModel;
use App\Models\Payment;
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

        $this->amount = 0;
    }

    public function render()
    {
        return view('livewire.purchase-payment');
    }

    public function setAmount(int $value)
    {
        if ($value == 0) {
            return;
        }

        $this->purchase = Purchase::findOrFail($value);

        $this->amount = $this->purchase->totalTTC();
    }
}
