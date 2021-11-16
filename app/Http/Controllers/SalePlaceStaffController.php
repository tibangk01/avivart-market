<?php

namespace App\Http\Controllers;

use App\Models\SalePlace;
use App\Models\Staff;
use App\Models\SalePlaceStaff;
use Illuminate\Http\Request;

class SalePlaceStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salePlaceStaffs = SalePlaceStaff::all();

        return view('sale_places_staffs.index', compact('salePlaceStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salePlaces = SalePlace::with('enterprise')->get()->pluck('enterprise.name', 'id');
        $staffs = Staff::with('human.user')->get()->pluck('human.user.full_name', 'id');

        return view('sale_places_staffs.create', compact('salePlaces', 'staffs'));
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
                'sale_place_id' => ['required'],
                'staff_id' => ['required'],
            ]);

            $salePlaceStaff = SalePlaceStaff::create($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalePlaceStaff  $salePlaceStaff
     * @return \Illuminate\Http\Response
     */
    public function show(SalePlaceStaff $salePlaceStaff)
    {
        return view('sale_places_staffs.show', compact('salePlaceStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalePlaceStaff  $salePlaceStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(SalePlaceStaff $salePlaceStaff)
    {
        $salePlaces = SalePlace::with('enterprise')->get()->pluck('enterprise.name', 'id');
        $staffs = Staff::with('human.user')->get()->pluck('human.user.full_name', 'id');

        return view('sale_places_staffs.edit', compact('salePlaceStaff', 'salePlaces', 'staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalePlaceStaff  $salePlaceStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalePlaceStaff $salePlaceStaff)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'sale_place_id' => ['required'],
                'staff_id' => ['required'],
            ]);

            $salePlaceStaff->update($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalePlaceStaff  $salePlaceStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePlaceStaff $salePlaceStaff)
    {
        $salePlaceStaff->delete();

        return back()->withDanger('Donnée supprimée');
    }
}
