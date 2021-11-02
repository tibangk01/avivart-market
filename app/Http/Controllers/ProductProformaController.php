<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Proforma;
use App\Models\ProductProforma;
use Illuminate\Http\Request;

class ProductProformaController extends Controller
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
        $proformas = Proforma::all()->pluck(null, 'id');

        return view('product_proforma.create', compact('products', 'proformas'));
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
                'proforma_id' => ['required'],
                'quantity' => ['required'],
            ]);

            $productProforma = ProductProforma::create($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductProforma  $productProforma
     * @return \Illuminate\Http\Response
     */
    public function show(ProductProforma $productProforma)
    {
        return view('product_proforma.show', compact('productProforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductProforma  $productProforma
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductProforma $productProforma)
    {
        $products = Product::all()->pluck(null, 'id');

        $proformas = Proforma::all()->pluck(null, 'id');

        return view('product_proforma.edit', compact('productProforma', 'products', 'proformas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductProforma  $productProforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductProforma $productProforma)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'product_id' => ['required'],
                'proforma_id' => ['required'],
                'quantity' => ['required'],
            ]);

            $productProforma->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductProforma  $productProforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductProforma $productProforma)
    {
        //
    }
}
