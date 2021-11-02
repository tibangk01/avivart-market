<?php

namespace App\Http\Controllers;

use App\Models\DayTransaction;
use App\Models\Exercise;
use Illuminate\Http\Request;

class DayTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dayTransactions = DayTransaction::all();

        return view('day_transactions.index', compact('dayTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises = Exercise::all()->pluck(null, 'id');

        return view('day_transactions.create', compact('exercises'));
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
                'exercise_id' => ['required'],
                'state' => ['required'],
            ]);

            $exercise = Exercise::findOrFail($request->input('exercise_id'));
            $lastDayTransaction = DayTransaction::where('exercise_id', $exercise->id)->orderBy('id', 'DESC')->first();

            if ($lastDayTransaction) {
                if ($lastDayTransaction->state == false) {
                    $dayTransaction = DayTransaction::create(array_merge(
                        $request->all(),
                        [
                            'day' => $lastDayTransaction->day->addDay(),
                        ]
                    ));

                    session()->flash('info', "Transaction de journée ouverte");
                } else {
                    session()->flash('warning', "Une autre transaction de journée est déjà en cours");
                }
            } else {
                $dayTransaction = DayTransaction::create(array_merge(
                    $request->all(),
                    [
                        'day' => now(),
                    ]
                ));

                session()->flash('primary', "Transaction de journée ouverte");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DayTransaction  $dayTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DayTransaction $dayTransaction)
    {
        return view('day_transactions.show', compact('dayTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DayTransaction  $dayTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DayTransaction $dayTransaction)
    {
        $exercises = Exercise::all()->pluck(null, 'id');
        
        return view('day_transactions.edit', compact('exercises', 'dayTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DayTransaction  $dayTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DayTransaction $dayTransaction)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'exercise_id' => ['required'],
                'state' => ['required'],
            ]);

            $dayTransaction->update($request->all());

            session()->flash('info', "Transaction de journée fermée");
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DayTransaction  $dayTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DayTransaction $dayTransaction)
    {
        //
    }
}
