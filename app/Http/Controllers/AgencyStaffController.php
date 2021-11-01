<?php

namespace App\Http\Controllers;

use App\Models\AgencyStaff;
use Illuminate\Http\Request;

class AgencyStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agencies_staffs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agencies_staffs.create');
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
     * @param  \App\Models\AgencyStaff  $agencyStaff
     * @return \Illuminate\Http\Response
     */
    public function show(AgencyStaff $agencyStaff)
    {
        return view('agencies_staffs.show', compact('agencyStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgencyStaff  $agencyStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(AgencyStaff $agencyStaff)
    {
        return view('agencies_staffs.edit', compact('agencyStaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgencyStaff  $agencyStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgencyStaff $agencyStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgencyStaff  $agencyStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgencyStaff $agencyStaff)
    {
        //
    }
}
