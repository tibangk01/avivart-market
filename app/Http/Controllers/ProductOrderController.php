<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck(null, 'id');
        $orders = Order::all()->pluck(null, 'id');

        return view('product_order.create', compact('products', 'orders'));
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
            $request->validate([
                'product_id' => ['required'],
                'order_id' => ['required'],
                'quantity' => ['required'],
                'comment' => ['nullable'],
            ]);

            $productOrder = ProductOrder::create($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOrder $productOrder)
    {
        return view('product_order.show', compact('productOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOrder $productOrder)
    {
        $products = Product::all()->pluck(null, 'id');

        $orders = Order::all()->pluck(null, 'id');

        return view('product_order.edit', compact('productOrder', 'products', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOrder $productOrder)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'product_id' => ['required'],
                'order_id' => ['required'],
                'quantity' => ['required'],
                'comment' => ['nullable'],
            ]);

            $productOrder->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOrder $productOrder)
    {
        //
    }
}
