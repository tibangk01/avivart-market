<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\PurchaseDeliveryNote;
use App\Models\ProductPurchase;
use Illuminate\Support\Facades\DB;

class CreatePurchaseDeliveryNote extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
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
    }
}
