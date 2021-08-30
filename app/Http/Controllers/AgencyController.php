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

        return view('pages.dashboard.agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all()->pluck(null, 'id');

        return view('pages.dashboard.agencies.create', compact('regions'));
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

            $this->validate($request, [
                'region_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
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

                $agency = Agency::create([
                    'region_id' => $request->region_id,
                    'society_id' => $society->id,
                    'enterprise_id' => $enterprise->id,
                ]);

                DB::commit();

                session()->flash('agencyInserted', 'Agence enregistrée.'); //TODO: msg agency inserted
            } catch (\Throwable $th) {
                DB::rollBack();
                session()->flash('agencyInsertionFailed', 'Erreur interne, Réessayez plus tard.');
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
        return view('pages.dashboard.agencies.show', compact('agency'));
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

        return view('pages.dashboard.agencies.edit', compact('regions', 'agency'));
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

            $this->validate($request, [
                'region_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
                'address' => ['required', 'max:40'],
            ]);

            try {
                DB::beginTransaction();

                $agency->update($request->only('region_id'));
                $agency->enterprise->update($request->only('name', 'phone_number', 'address'));
                
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                session()->flash('agencyUpdateFailed', 'Une erreur s\'est produite'); //TODO: define message for agency update error.
                return back();
            }

            session()->flash('agencyUpdated', 'Agence modifier.'); //TODO: message update agency ok.
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
