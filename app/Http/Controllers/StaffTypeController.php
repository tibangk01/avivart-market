<?php

namespace App\Http\Controllers;

use App\Models\StaffType;
use Illuminate\Http\Request;

class StaffTypeController extends Controller
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
        $staffTypes = StaffType::all();

        return view('staff_types.index', compact('staffTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff_types.create');
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

            $staffType = StaffType::create($request->only('name'));

            if ($staffType) {
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
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     */
    public function show(StaffType $staffType)
    {
        return view('staff_types.show', compact('staffType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffType $staffType)
    {
        return view('staff_types.edit', compact('staffType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffType $staffType)
    {
        if ($request->isMethod('put')) {

            $request->validate([
                'name' => ['required', 'max:30'],
            ]);

            $staffType->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffType  $staffType
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffType $staffType)
    {
        $staffType->delete();

        return back()->withDanger('Donnée supprimée');
    }
}