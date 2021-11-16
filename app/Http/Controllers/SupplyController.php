<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\ProductPurchase;
use App\Models\Product;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supply::all();

        return view('supplies.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchases = Purchase::with('products')->get();

        return view('supplies.create', compact('purchases'));
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
                'delivered_quantity' => ['required'],
            ]);

            $productPurchase = ProductPurchase::findOrFail($request->input('product_purchase_id'));

            $quantity = intval($request->input('delivered_quantity'));

            abort_if($quantity > ($productPurchase->ordered_quantity - $productPurchase->delivered_quantity), 403, "Impossible de faire cet enregistrement");

            try {
                DB::beginTransaction();

                $productPurchase->update([
                    'delivered_quantity' => $productPurchase->delivered_quantity + $quantity,
                ]);

                $productPurchase->product->update([
                    'stock_quantity' => $productPurchase->product->stock_quantity +  + $quantity,
                ]);

                $supply = Supply::create([
                    'product_purchase_id' => $request->input('product_purchase_id'),
                    'quantity' => $quantity,
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
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        return view('supplies.show', compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        return view('supplies.edit', compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'quantity' => ['required'],
            ]);

            $supply->update($request->all());

            session()->flash('success', 'Donnée enregistrée.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        //$supply->delete();

        return back()->withDanger('Donnée supprimée');
    }
}
