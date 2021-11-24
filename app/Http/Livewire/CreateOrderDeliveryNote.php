<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\DB;

class CreateOrderDeliveryNote extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.create-order-delivery-note');
    }

    public function updateComment(ProductOrder $productOrder, string $comment)
    {
        if (mb_strlen($comment) < 10) {
            return;
        }

        try {
            DB::beginTransaction();

            $productOrder->update([
                'comment' => $comment,
            ]);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();

            dd($ex);
        }
    }
}
