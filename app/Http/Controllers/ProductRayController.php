<?php

namespace App\Http\Controllers;

use App\Models\ProductRay;
use Illuminate\Http\Request;

class ProductRayController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productRays = ProductRay::all();

        return view('product_rays.index', compact('productRays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_rays.create');
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

            $request->validate([
                'name' => ['required', 'min:3', 'max:30'],
            ]);

            $productRay = ProductRay::create($request->only('name'));

            if ($productRay) {
                session()->flash('success', "Donnée enregistrée");
            } else {
                session()->flash('error', "Une erreur s'est produite");
            }

        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductRay  $productRay
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRay $productRay)
    {
        return view('product_rays.show', compact('productRay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductRay  $productRay
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRay $productRay)
    {
        return view('product_rays.edit', compact('productRay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductRay  $productRay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRay $productRay)
    {
        if ($request->isMethod('put')) {

            $request->validate([
                'name' => ['required', 'max:30'],
            ]);

            $productRay->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductRay  $productRay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRay $productRay)
    {
        //
    }
}
