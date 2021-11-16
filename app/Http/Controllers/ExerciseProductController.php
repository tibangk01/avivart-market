<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Product;
use App\Models\ExerciseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreExerciseProductRequest;
use App\Http\Requests\UpdateExerciseProductRequest;

class ExerciseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exerciseProducts = ExerciseProduct::all();

        return view('exercises_products.index', compact('exerciseProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises = Exercise::all()->pluck(null, 'id');
        $products = Product::all()->pluck(null, 'id');

        return view('exercises_products.create', compact('exercises', 'products'));
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
            
            $this->_validateRequest($request);

            $product = Product::findOrFail($request->product_id);

            try {

                DB::beginTransaction();

                $exerciseProduct = ExerciseProduct::create($request->all());

                $product->update([
                    'stock_quantity' => $product->stock_quantity - $exerciseProduct->loss,
                ]);

                DB::commit();

                session()->flash('success', "Donnée enregistrée");

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExerciseProduct  $exerciseProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ExerciseProduct $exerciseProduct)
    {
        return view('exercises_products.show', compact('exerciseProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExerciseProduct  $exerciseProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ExerciseProduct $exerciseProduct)
    {
        $exercises = Exercise::all()->pluck(null, 'id');
        $products = Product::all()->pluck(null, 'id');

        return view('exercises_products.edit', compact('exerciseProduct', 'exercises', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExerciseProduct  $exerciseProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExerciseProduct $exerciseProduct)
    {
        if ($request->isMethod('PUT')) {

            $this->_validateRequest($request);

            $product = Product::findOrFail($request->product_id);

            try {

                DB::beginTransaction();

                $product->update([
                    'stock_quantity' => $product->stock_quantity + $exerciseProduct->loss,
                ]);

                $exerciseProduct->update($request->all());

                $product->update([
                    'stock_quantity' => $product->stock_quantity - $exerciseProduct->loss,
                ]);

                DB::commit();

                session()->flash('success', "Donnée enregistrée");

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExerciseProduct  $exerciseProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExerciseProduct $exerciseProduct)
    {
        $exerciseProduct->delete();

        return back()->withDanger('Donnée supprimée');
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function _validateRequest($request)
    {
        $request->validate([
            'exercise_id' => ['required'],
            'product_id' => ['required'],
            'initial_stock' => ['required', 'numeric'],
            'final_stock' => ['required', 'numeric'],
            'global_purchase_price' => ['required'],
            'purchase_price' => ['required'],
            'global_selling_price' => ['required'],
            'selling_price' => ['required'],
            'global_rental_price' => ['required'],
            'rental_price' => ['required'],
            'loss' => ['required', 'numeric'],
        ]);
    }
}
