<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\ProductPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductPurchaseRequest;
use App\Http\Requests\UpdateProductPurchaseRequest;

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

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
                'global_purchase_price' => ['required'],
                'purchase_price' => ['required'],
                'ordered_quantity' => ['required'],
                'comment' => ['nullable'],
            ]);

            try {
                DB::beginTransaction();

                $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

                $product = Product::findOrFail($request->product_id);

                $product->purchases()->sync([
                    $product->id => $request->except('_token'),
                ]);

                $this->saveInventory($exercise, $product);

                //$productPurchase = ProductPurchase::create($request->all());

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

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
                'global_purchase_price' => ['required'],
                'purchase_price' => ['required'],
                'ordered_quantity' => ['required'],
                'comment' => ['nullable'],
            ]);

            try {
                DB::beginTransaction();

                $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

                $product = Product::findOrFail($request->product_id);

                $productPurchase->update($request->all());

                $this->saveInventory($exercise, $product);

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductPurchase  $productPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPurchase $productPurchase)
    {
        $productPurchase->delete();

        return back()->withDanger('Donnée supprimée');
    }
}
