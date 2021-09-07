<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use Illuminate\Http\Request;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversions = Conversion::all();

        return view('conversions.index', compact('conversions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conversions.create');
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

            $conversions = Conversion::create($request->only('name'));

            if ($conversions) {
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
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function show(Conversion $conversion)
    {
        return view('conversions.show', compact('conversion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversion $conversion)
    {
        return view('conversions.edit', compact('conversion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversion $conversion)
    {
        if ($request->isMethod('put')) {

            $request->validate([
                'name' => ['required', 'max:30'],
            ]);

            $conversion->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversion $conversion)
    {
        //
    }
}
