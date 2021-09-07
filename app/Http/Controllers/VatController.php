<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vats = Vat::all();

        return view('vats.index', compact('vats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vats.create');
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
                'percentage' => ['required'],
            ]);

            $vat = Vat::create($request->only('percentage'));

            if ($vat) {
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
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function show(Vat $vat)
    {
        return view('vats.show', compact('vat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function edit(Vat $vat)
    {
        return view('vats.edit', compact('vat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vat $vat)
    {
        if ($request->isMethod('put')) {

            $request->validate([
                'percentage' => ['required'],
            ]);

            $vat->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat)
    {
        //
    }
}
