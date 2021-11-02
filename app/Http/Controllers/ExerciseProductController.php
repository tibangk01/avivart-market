<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Product;
use App\Models\ExerciseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $exerciseProduct = ExerciseProduct::create($request->all());

            session()->flash('success', "Donnée enregistrée");
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

            $exerciseProduct->update($request->all());

            session()->flash('success', "Donnée enregistrée");
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
        //
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
