<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Staff;
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
        $agencyStaffs = AgencyStaff::all();

        return view('agencies_staffs.index', compact('agencyStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::with('enterprise')->get()->pluck('enterprise.name', 'id');
        $staffs = Staff::with('human.user')->get()->pluck('human.user.full_name', 'id');

        return view('agencies_staffs.create', compact('agencies', 'staffs'));
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
                'agency_id' => ['required'],
                'staff_id' => ['required'],
            ]);

            $agencyStaff = AgencyStaff::create($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
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
        $agencies = Agency::with('enterprise')->get()->pluck('enterprise.name', 'id');
        $staffs = Staff::with('human.user')->get()->pluck('human.user.full_name', 'id');

        return view('agencies_staffs.edit', compact('agencyStaff', 'agencies', 'staffs'));
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
        if ($request->isMethod('PUT')) {
            $request->validate([
                'agency_id' => ['required'],
                'staff_id' => ['required'],
            ]);

            $agencyStaff->update($request->all());

            session()->flash('success', "Donnée enregistrée");
        }

        return back();
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
