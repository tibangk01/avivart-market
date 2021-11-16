<?php

namespace App\Http\Controllers;

use App\Models\StudyLevel;
use Illuminate\Http\Request;

class StudyLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studyLevels = StudyLevel::all();

        return view('study_levels.index', compact('studyLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study_levels.create');
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

            $this->_validateRequest($request);

            $studyLevel = StudyLevel::create($request->only('name'));

            if ($studyLevel) {

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
     * @param  \App\Models\StudyLevel  $studyLevel
     * @return \Illuminate\Http\Response
     */
    public function show(StudyLevel $studyLevel)
    {
        return view('study_levels.show', compact('studyLevel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyLevel  $studyLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyLevel $studyLevel)
    {
        return view('study_levels.edit', compact('studyLevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyLevel  $studyLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyLevel $studyLevel)
    {
        if ($request->isMethod('put')) {

            $this->_validateRequest($request);

            $studyLevel->update($request->only('name'));

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyLevel  $studyLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyLevel $studyLevel)
    {
        $studyLevel->delete();

        return back()->withDanger('Donnée supprimée');
    }

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param mixed $request
     * @return void
     */
    private function _validateRequest($request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
        ]);
    }
}
