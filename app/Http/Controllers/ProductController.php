<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Currency;
use App\Models\Conversion;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('pages.dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all()->pluck(null, 'id');
        $conversions = Conversion::all()->pluck(null, 'id');
        $currencies = Currency::all()->pluck(null, 'id');

        return view('pages.dashboard.products.create', compact('product_categories', 'conversions', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'product_category_id' => ['required'],
                'conversion_id' => ['required'],
                'currency_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'price' => ['required', 'numeric'],
                'stock_quantity' => ['required', 'numeric'],
                'sold_quantity' => ['required', 'numeric'],
            ]);

            try {

                DB::beginTransaction();

                $library = Library::create([
                    'library_type_id' => 1,
                    'folder' => 'products',
                    'local' => 'default.png',
                    'remote' => env('UPLOADS_PATH') .'images/products/default.png',
                ]);

                $product = Product::create(array_merge($request->all(), ['library_id' => $library->id]));

                DB::commit();

                session()->flash('success', 'Le produit a été enregistré.');

                return redirect()->route('product.show', ['product' => $product]);
            } catch (\Throwable $th) {
                DB::rollBack();
                session()->flash('error', 'Erreur, Réessayez plus tard.');
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_categories = ProductCategory::all()->pluck(null, 'id');
        $conversions = Conversion::all()->pluck(null, 'id');
        $currencies = Currency::all()->pluck(null, 'id');

        return view('pages.dashboard.products.edit', compact('product', 'product_categories', 'conversions', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->isMethod('put')) {

            $this->validate($request, [
                'product_category_id' => ['required'],
                'conversion_id' => ['required'],
                'currency_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'price' => ['required', 'numeric'],
                'stock_quantity' => ['required', 'numeric'],
                'sold_quantity' => ['required', 'numeric'],
            ]);

            $product->update($request->all());

            session()->flash('success', 'le produit a été modfier.');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
