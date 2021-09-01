<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\SalePlace;
use Illuminate\Http\Request;

class SalePlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale_places = SalePlace::all();
        return view('pages.dashboard.sale_places.index', compact('sale_places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all()->load('enterprise')->pluck('enterprise.name', 'id')->toArray();
        return view('pages.dashboard.sale_places.create', compact('agencies'));
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
                'agency_id' => ['required'],
                'name' => ['required', 'min:3', 'max:40'],
            ]);

            $sale_place = SalePlace::create([
                'agency_id' => $request->agency_id,
                'name' => $request->name,
            ]);

            if ($sale_place) {
                session()->flash('succes', 'Point de vente enregistrée.'); //TODO: sale place msg insertion success
            } else {
                session()->flash('error', "Une erreur s'est produite");
            }
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function show(SalePlace $salePlace)
    {
        return view('pages.dashboard.sale_places.show', compact('salePlace'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function edit(SalePlace $salePlace)
    {
        $agencies = Agency::all()->load('enterprise')->pluck('enterprise.name', 'id')->toArray();
        return view('pages.dashboard.sale_places.edit', compact('agencies', 'salePlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalePlace $salePlace)
    {
        if ($request->isMethod('put')) {

            $this->validate($request, [
                'agency_id' => ['required'],
                'name' => ['required', 'max:40'],
            ]);

            $salePlace->update($request->only('agency_id', 'name'));

            session()->flash('salePlaceUpdated', 'Point de vente mis à jour'); //TODO: msg sale palce updated

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalePlace  $salePlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePlace $salePlace)
    {
        //
    }
}
