<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Supply;
use App\Models\ProductPurchase;
use Illuminate\Support\Facades\DB;

class CreateSupply extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.create-supply');
    }

    public function updateQuantity(ProductPurchase $productPurchase, int $quantity)
    {
        if($quantity > ($productPurchase->ordered_quantity - $productPurchase->delivered_quantity)) {
            return;
        }

        try {
            DB::beginTransaction();

            $productPurchase->update([
                'delivered_quantity' => $productPurchase->delivered_quantity + $quantity,
            ]);

            $productPurchase->product->update([
                'stock_quantity' => $productPurchase->product->stock_quantity + $quantity,
            ]);

            $supply = Supply::create([
                'product_purchase_id' => $productPurchase->id,
                'quantity' => $quantity,
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();

            dd($ex);
        }
    }
}
