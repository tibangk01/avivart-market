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

        return view('pages.agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::pluck('name', 'id')->toArray();

        return view('pages.agencies.create', compact('regions'));
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

                $enterprises = Enterprise::all();
                $code = (int)++$enterprises->sortBy('created_at')->last()->code;

                $enterprise = Enterprise::create([
                    'code' => '0' . $code,
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]);

                $societies = Society::all();
                $society_id = (int)$societies->sortBy('created_at')->last()->id;

                $agency = Agency::create([
                    'region_id' => $request->region_id,
                    'society_id' => $society_id,
                    'enterprise_id' => $enterprise->id,
                ]);

                if ($enterprise && $agency) DB::commit();

                session()->flash('agencyInserted', 'Agence enregistrée.');
            } catch (\Throwable $th) {

                DB::rollBack();
                session()->flash('agencyInsertionFailed', 'Erreur interne, Réessayez plus tard.');
            } finally {
                return back();
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
        return view('pages.agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        $regions = Region::pluck('name', 'id')->toArray();
        return view('pages.agencies.edit', compact('regions', 'agency'));
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
