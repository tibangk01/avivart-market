<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Region;
use App\Models\Society;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::all();

        return view('agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all()->pluck(null, 'id');

        return view('agencies.create', compact('regions'));
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
                'region_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
                'email' => ['required', 'email', 'max:60'],
                'website' => ['required', 'max:60'],
                'address' => ['required', 'max:40'],
            ]);

            try {

                DB::beginTransaction();

                $enterprise = Enterprise::orderBy('id', 'DESC')->first();

                $society = Society::orderBy('id', 'DESC')->firstOrFail();

                $enterprise = Enterprise::create(array_merge($request->all(),
                    [
                        'code' => '0' . ++$enterprise->code,
                    ]
                ));

                Agency::create([
                    'region_id' => $request->region_id,
                    'society_id' => $society->id,
                    'enterprise_id' => $enterprise->id,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

            } catch (\Throwable $th) {

                DB::rollBack();

                session()->flash('error', "Une erreur s'est produite");
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        return view('agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        $regions = Region::all()->pluck(null, 'id');

        return view('agencies.edit', compact('regions', 'agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {

        if ($request->isMethod('put')) {

            $request->validate([
                'region_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'email' => ['required', 'email', 'max:60'],
                'website' => ['required', 'max:60'],
                'phone_number' => ['required', 'min:8'],
                'address' => ['required', 'max:40'],
            ]);

            try {

                DB::beginTransaction();

                $agency->update($request->only('region_id'));

                $agency->enterprise->update($request->except('region_id') );

                DB::commit();

            } catch (\Throwable $th) {

                DB::rollBack();

                session()->flash('error', "Une erreur s'est produite");

                return back();
            }

            session()->flash('success', 'Modification réussi');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
