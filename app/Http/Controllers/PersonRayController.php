<?php

namespace App\Http\Controllers;

use App\Models\PersonRay;
use Illuminate\Http\Request;

class PersonRayController extends Controller
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
        $personRays = PersonRay::all();

        return view('person_rays.index', compact('personRays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_rays.create');
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

            $personRay = PersonRay::create($request->only('name'));

            if ($personRay) {
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
     * @param  \App\Models\PersonRay  $personRay
     * @return \Illuminate\Http\Response
     */
    public function show(PersonRay $personRay)
    {
        return view('person_rays.show', compact('personRay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonRay  $personRay
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonRay $personRay)
    {
        return view('person_rays.edit', compact('personRay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonRay  $personRay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonRay $personRay)
    {
        if ($request->isMethod('put')) {

            $request->validate([
                'name' => ['required', 'max:30'],
            ]);

            $personRay->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonRay  $personRay
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonRay $personRay)
    {
        //
    }
}
