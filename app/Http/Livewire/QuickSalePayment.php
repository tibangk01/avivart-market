<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderState;
use App\Models\QuickSale;
use App\Models\QuickSalePayment as QuickSalePaymentModel;
use App\Models\Payment;
use App\Models\PaymentMode;

class QuickSalePayment extends Component
{
    public $paymentModes;
    
    public $orderStates;

    public $quickSales;

    public $quickSale;

    public $amount;

    public function mount()
    {
        $this->orderStates = OrderState::all();

        $this->quickSales = QuickSale::where('paid', false)->get();

        $this->paymentModes = PaymentMode::all();

        $this->amount = 0;
    }

    public function render()
    {
        return view('livewire.quick-sale-payment');
    }

    public function setAmount(int $value)
    {
        if ($value == 0) {
            return;
        }
        
        $this->quickSale = QuickSale::findOrFail($value);

        $this->amount = QuickSalePaymentModel::remnantPayment($this->quickSale);
    }
}
