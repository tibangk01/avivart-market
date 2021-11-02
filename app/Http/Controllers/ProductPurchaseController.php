<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\ProductPurchase;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
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
        $purchases = Purchase::all()->pluck(null, 'id');

        return view('product_purchase.create', compact('products', 'purchases'));
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
                'purchase_id' => ['required'],
                'ordered_quantity' => ['required'],
                'comment' => ['nullable'],
            ]);

            $productPurchase = ProductPurchase::create($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductPurchase  $productPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPurchase $productPurchase)
    {
        return view('product_purchase.show', compact('productPurchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductPurchase  $productPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPurchase $productPurchase)
    {
        $products = Product::all()->pluck(null, 'id');

        $purchases = Purchase::all()->pluck(null, 'id');

        return view('product_purchase.edit', compact('productPurchase', 'products', 'purchases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductPurchase  $productPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPurchase $productPurchase)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'product_id' => ['required'],
                'purchase_id' => ['required'],
                'ordered_quantity' => ['required'],
                'comment' => ['nullable'],
            ]);

            $productPurchase->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductPurchase  $productPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPurchase $productPurchase)
    {
        //
    }
}
