<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Region;
use App\Models\Society;
use App\Models\Enterprise;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
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
        $societies = Society::all()->load('enterprise')->pluck('enterprise.name', 'id');
        $regions = Region::all()->pluck(null, 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('agencies.create', compact('societies', 'regions', 'countries'));
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
                'country_id' => ['required'],
                'region_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
                'email' => ['required', 'email', 'max:60'],
                'website' => ['required', 'max:60'],
                'address' => ['required', 'max:40'],
            ]);

            try {

                DB::beginTransaction();

                $society = Society::findOrFail($request->society_id);

                //get the last agency in database : very important here
                $agency = Agency::orderBy('id', 'DESC')->first();

                $code = 1;

                if ($agency) {
                    $code = ++$agency->enterprise->code;
                }

                $enterprise = Enterprise::create(array_merge($request->except('society_id'),
                    [
                        'code' => self::BEGIN_CODE . ($society->code + $code),
                        'is_corporation' => false,
                    ]
                ));

                Agency::create([
                    'enterprise_id' => $enterprise->id,
                    'society_id' => $society->id,
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
        $societies = Society::all()->load('enterprise')->pluck('enterprise.name', 'id');
        $regions = Region::all()->pluck(null, 'id');
        $countries = Country::all()->pluck(null, 'id');

        return view('agencies.edit', compact('societies', 'regions', 'countries', 'agency'));
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
        if ($request->isMethod('PUT')) {

            $request->validate([
                'country_id' => ['required'],
                'name' => ['required', 'min:3', 'max:50'],
                'phone_number' => ['required', 'min:8'],
                'email' => ['required', 'email', 'max:60'],
                'website' => ['required', 'max:60'],
                'address' => ['required', 'max:40'],
            ]);

            try {

                DB::beginTransaction();

                //$agency->update($request->only('society_id'));

                $agency->enterprise->update($request->except('society_id'));

                DB::commit();

                session()->flash('success', 'Modification réussi');

            } catch (\Throwable $th) {

                DB::rollBack();

                session()->flash('error', "Une erreur s'est produite");
            }
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
