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
        $societies = Society::with('enterprise')->get()->pluck('enterprise.name', 'id');
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

            $this->_validateRequest($request, 'post');

            try {

                DB::beginTransaction();

                $society = Society::findOrFail($request->society_id);

                $region = Region::findOrFail($request->region_id);

                $code = $society->agencies->load('enterprise')->where('enterprise.region_id', $region->id)->count()
                    ? $society->agencies->load('enterprise')->where('enterprise.region_id', $region->id)->count() + 1
                    : 1;
                $code = ($code < 10) ? '0' . $code : $code;

                $enterprise = Enterprise::create(array_merge(
                    $request->except('society_id'),
                    [
                        'code' => $region->code . $society->enterprise->code . $code,
                        'is_corporation' => false,
                    ]
                ));

                $agency = Agency::create([
                    'enterprise_id' => $enterprise->id,
                    'society_id' => $society->id,
                ]);

                DB::commit();

                session()->flash('success', 'Donnée enregistrée.');

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

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
        $societies = Society::with('enterprise')->get()->pluck('enterprise.name', 'id');
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

            $this->_validateRequest($request, 'put');

            try {

                DB::beginTransaction();

                $society = Society::findOrFail($request->society_id);

                $region = Region::findOrFail($request->region_id);

                $code = $society->agencies->load('enterprise')->where('enterprise.region_id', $region->id)->count()
                    ? $society->agencies->load('enterprise')->where('enterprise.region_id', $region->id)->count() + 1
                    : 1;
                $code = ($code < 10) ? '0' . $code : $code;

                $agency->enterprise->update(array_merge(
                    $request->except('society_id'),
                    [
                        'code' => $region->code . $society->enterprise->code . $code,
                    ]
                ));

                $agency->update($request->only('society_id'));

                DB::commit();

                session()->flash('success', 'Modification réussi');

            } catch (\Exception $ex) {
                DB::rollBack();

                dd($ex);

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

    /**
     * validateRequest
     *
     * Validate creation and edition incomming data
     *
     * @param mixed $request
     * @return void
     */
    private function _validateRequest(Request $request, string $method)
    {
        $formData = [
            'country_id' => ['required'],
            'region_id' => ['required'],
            'name' => ['required', 'min:3', 'max:50'],
            'phone_number' => ['required', 'min:8'],
            'email' => ['required', 'email', 'max:40'],
            'website' => ['nullable', 'max:50'],
            'address' => ['nullable', 'max:50'],
            'postal_code' => ['nullable', 'max:10'],
        ];

        if(mb_strtolower($method) == 'post'){
            $formData += [
            ];
        }

        $request->validate($formData);
    }
}
