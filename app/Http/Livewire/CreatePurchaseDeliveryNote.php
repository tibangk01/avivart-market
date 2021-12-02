<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PurchaseDeliveryNote;
use App\Models\ProductPurchase;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class CreatePurchaseDeliveryNote extends Component
{
    public $purchases;

    public function mount($purchases)
    {
        $this->purchases = $purchases;
    }

    public function render()
    {
        return view('livewire.create-purchase-delivery-note');
    }

    public function updateComment(ProductPurchase $productPurchase, string $comment)
    {
        if (mb_strlen($comment) < 10) {
            return;
        }

        try {
            DB::beginTransaction();

            $productPurchase->update([
                'comment' => $comment,
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();

            dd($ex);
        }

        $this->purchases = Purchase::with('products')->get();   //to refresh the table
    }
}
