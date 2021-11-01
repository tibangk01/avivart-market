<?php

namespace App\Http\Controllers;

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
        return view('sale_places_staffs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale_places_staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('sale_places_staffs.edit', compact('salePlaceStaff'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalePlaceStaff  $salePlaceStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalePlaceStaff $salePlaceStaff)
    {
        //
    }
}
