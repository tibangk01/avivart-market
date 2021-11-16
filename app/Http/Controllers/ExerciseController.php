<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Exercise;
use App\Models\Product;
use App\Models\ExerciseProduct;
use Illuminate\Http\Request;
use BarryvdhDomPDF as PDF;

class ExerciseController extends Controller
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
        $exercises = Exercise::all();

        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::all()->pluck(null, 'id');

        return view('exercises.create', compact('currencies'));
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
                'currency_id' => ['required'],
                'title' => ['required', 'min:10', 'max:255'],
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);

            $exercise = Exercise::create($request->all());

            if ($exercise) {
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
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        $currencies = Currency::all()->pluck(null, 'id');

        return view('exercises.edit', compact('exercise', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        if ($request->isMethod('put')) {

            $request->validate([
                'currency_id' => ['required'],
                'title' => ['required', 'min:10', 'max:255'],
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);

            $exercise->update($request->all());

            session()->flash('success', 'Modification réussi');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return back()->withDanger('Donnée supprimée');
    }

    public function inventory(Request $request, Exercise $exercise)
    {
        $pdf = PDF::loadView('exercises.printing.inventory', compact('exercise'));
        $pdf->setPaper('a4', 'landscape');
        $pdf->save(public_path("libraries/docs/inventory_{$exercise->id}.pdf"));

        return $pdf->stream("inventory_{$exercise->id}.pdf");
    }
}
