<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\OrderDeliveryNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDeliveryNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDeliveryNotes = OrderDeliveryNote::all();

        return view('order_delivery_notes.index', compact('orderDeliveryNotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::with('products')->get();

        return view('order_delivery_notes.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $productOrder = ProductOrder::findOrFail($request->input('product_order_id'));

            try {
                DB::beginTransaction();

                $productOrder->update([
                    'comment' => $request->input('comment'),
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');
            } catch (\Exception $ex) {
                DB::rollback();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  OrderDeliveryNote  $orderDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDeliveryNote $orderDeliveryNote)
    {
        return view('order_delivery_notes.show', compact('orderDeliveryNote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  OrderDeliveryNote  $orderDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDeliveryNote $orderDeliveryNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  OrderDeliveryNote  $orderDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDeliveryNote $orderDeliveryNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OrderDeliveryNote  $orderDeliveryNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDeliveryNote $orderDeliveryNote)
    {
        //
    }
}
