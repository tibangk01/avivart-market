<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderDeliveryNote;
use App\Models\ProductOrder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CreateOrderDeliveryNote extends Component
{
    public $orders;

    public function mount($orders)
    {
        $this->orders = $orders;
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

        $this->orders = Order::with('products')->get();   //to refresh the table
    }
}
