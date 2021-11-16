<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductOrderRequest;
use App\Http\Requests\UpdateProductOrderRequest;

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

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

            try {
                DB::beginTransaction();

                $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

                $product = Product::findOrFail($request->product_id);

                $product->orders()->sync([
                    $product->id => $request->except('_token'),
                ]);

                $product->update([
                    'stock_quantity' => $product->stock_quantity - $request->quantity,
                ]);

                $this->saveInventory($exercise, $product);

                //$productOrder = ProductOrder::create($request->all());

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
        abort_if((session('staffStatusBarInfo') === null), 403, "Veuillez ouvrir votre caisse");

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

            try {
                DB::beginTransaction();

                $exercise = session('staffStatusBarInfo')->day_transaction->exercise;

                $product = Product::findOrFail($request->product_id);

                $product->update([
                    'stock_quantity' => $product->stock_quantity + $productOrder->quantity,
                ]);

                $productOrder->update($request->all());

                $product->update([
                    'stock_quantity' => $product->stock_quantity - $request->quantity,
                ]);

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
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOrder $productOrder)
    {
        $productOrder->delete();

        return back()->withDanger('Donnée supprimée');
    }
}
