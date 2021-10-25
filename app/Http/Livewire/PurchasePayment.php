<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Purchase;

class PurchasePayment extends Component
{
    public $purchases;

    public $purchase;

    public $amount;

    public function mount()
    {
        $this->purchases = Purchase::where('paid', false)->get();
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
